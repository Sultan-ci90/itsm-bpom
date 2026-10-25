<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIncidentRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Models\Asset;
use App\Models\Ticket;
use App\Models\TicketHistory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Notifications\NewTicketNotification;
use App\Notifications\TicketStatusUpdatedNotification;
use Illuminate\Support\Facades\Notification;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Services\FonnteService;

class IncidentController extends Controller
{
    public function index(Request $request)
    {
        // Admin & Teknisi selalu diarahkan ke semua Aduan Kendala TIK
        if (auth()->user()->isTeknisi() || auth()->user()->isAdmin()) {
            return redirect()->route('incidents.all', $request->query());
        }

        $query = Ticket::with(['asset', 'pelapor.bidang', 'resolution']);
        $query->where('pelapor_id', auth()->id());

        if ($request->filled('q')) {
            $term = $request->string('q')->toString();
            $query->where(function ($q) use ($term) {
                $q->where('nomor_aduan', 'like', "%{$term}%")
                  ->orWhere('deskripsi_masalah', 'like', "%{$term}%");
            });
        }

        if ($request->filled('status')) {
            $validStatuses = ['Belum diperiksa', 'Sedang diproses', 'Selesai', 'Ditolak'];
            $status = $request->string('status')->toString();
            if (in_array($status, $validStatuses, true)) {
                $query->where('status', $status);
            }
        }

        if ($request->filled('jenis_penyelesaian')) {
            $validJenis = ['mandiri', 'Pihak ke-3'];
            $jenis = $request->string('jenis_penyelesaian')->toString();
            if (in_array($jenis, $validJenis, true)) {
                $query->whereHas('resolution', function ($q) use ($jenis) {
                    $q->where('jenis_penyelesaian', $jenis);
                });
            }
        }

        $tickets = $query->latest('created_at')->paginate(15)->withQueryString();

        return view('incidents.index', compact('tickets'));
    }

    public function all(Request $request)
    {
        $query = Ticket::with(['asset', 'pelapor.bidang', 'resolution']);

        if ($request->filled('q')) {
            $term = $request->string('q')->toString();
            $query->where(function ($q) use ($term) {
                $q->where('nomor_aduan', 'like', "%{$term}%")
                  ->orWhere('deskripsi_masalah', 'like', "%{$term}%");
            });
        }

        if ($request->filled('status')) {
            $validStatuses = ['Belum diperiksa', 'Sedang diproses', 'Selesai', 'Ditolak'];
            $status = $request->string('status')->toString();
            if (in_array($status, $validStatuses, true)) {
                $query->where('status', $status);
            }
        }

        if ($request->filled('jenis_penyelesaian')) {
            $validJenis = ['mandiri', 'Pihak ke-3'];
            $jenis = $request->string('jenis_penyelesaian')->toString();
            if (in_array($jenis, $validJenis, true)) {
                $query->whereHas('resolution', function ($q) use ($jenis) {
                    $q->where('jenis_penyelesaian', $jenis);
                });
            }
        }

        $tickets = $query->latest('created_at')->paginate(15)->withQueryString();

        return view('incidents.all', compact('tickets'));
    }

    public function create()
    {
        $assets = Asset::select('id', 'kode_barang', 'nama_barang', 'nup', 'lokasi')
                       ->orderBy('nama_barang')
                       ->get();

        $user = auth()->user();
        $isStaff = $user->isTeknisi() || $user->isAdmin();

        $users = $isStaff
            ? User::with('bidang')->select('id', 'nama', 'nip', 'bidang_id')->orderBy('nama')->get()
            : collect();

        return view('incidents.create', compact('assets', 'isStaff', 'users'));
    }

    public function store(StoreIncidentRequest $request)
    {
        DB::beginTransaction();
        try {
            $currentUser = auth()->user();
            $isStaff = $currentUser->isTeknisi() || $currentUser->isAdmin();

            // Tentukan siapa pemilik laporan (pelapor_id) dan siapa yang men-submit (reported_by)
            $targetPelaporId = $currentUser->id;
            $reportedById = null;

            if ($isStaff && $request->filled('pelapor_id')) {
                $inputPelaporId = (int) $request->pelapor_id;
                if ($inputPelaporId !== $currentUser->id) {
                    $targetPelaporId = $inputPelaporId;
                    $reportedById = $currentUser->id;
                }
            }

            $date = Carbon::now()->format('Ymd');
            $lastTicket = Ticket::withTrashed()->where('nomor_aduan', 'like', "TIK-{$date}-%")
                                ->lockForUpdate()
                                ->latest('id')
                                ->first();
            $sequence = $lastTicket ? (int) Str::afterLast($lastTicket->nomor_aduan, '-') + 1 : 1;
            $nomorAduan = 'TIK-' . $date . '-' . str_pad($sequence, 4, '0', STR_PAD_LEFT);

            $fotoPath = null;
            if ($request->hasFile('foto_kendala')) {
                $fotoPath = $request->file('foto_kendala')->store('kendala_photos', 'public');
            }

            $jenisKendala = $request->input('jenis_kendala', 'lainnya');
            $assetId = ($jenisKendala === 'aset') ? $request->asset_id : null;

            $ticket = Ticket::create([
                'nomor_aduan' => $nomorAduan,
                'jenis_kendala' => $jenisKendala,
                'asset_id' => $assetId,
                'pelapor_id' => $targetPelaporId,
                'reported_by' => $reportedById,
                'tgl_pelaporan' => Carbon::now(),
                'deskripsi_masalah' => $request->deskripsi_masalah,
                'foto_kendala' => $fotoPath,
                'status' => 'Belum diperiksa',
            ]);

            $pelaporUser = User::find($targetPelaporId);
            $keteranganHistory = $reportedById
                ? 'Tiket dibuat oleh ' . $currentUser->nama . ' atas nama ' . ($pelaporUser->nama ?? 'Pegawai lain') . '.'
                : 'Tiket dibuat oleh ' . $currentUser->nama . '.';

            TicketHistory::create([
                'ticket_id' => $ticket->id,
                'status_label' => 'aduan dibuat',
                'keterangan' => $keteranganHistory,
            ]);

            // Notify Admin & Teknisi
            $staffs = User::whereIn('role', ['teknisi', 'admin'])->get();
            $avatar = auth()->user()->foto_profil ? asset('storage/' . auth()->user()->foto_profil) : asset('images/user/owner.png');
            Notification::send($staffs, new NewTicketNotification(
                'Aduan Kendala Baru',
                auth()->user()->nama . ' membuat aduan kendala baru (' . $nomorAduan . ').',
                route('incidents.show', $ticket->id),
                auth()->user()->nama,
                $avatar
            ));

            DB::commit();

            // WhatsApp Notification via Fonnte
            try {
                app(FonnteService::class)->sendNewTicketNotification($ticket);
            } catch (\Throwable $e) {
                Log::warning('Fonnte sendNewTicketNotification error: ' . $e->getMessage());
            }

            $targetRoute = (auth()->user()->isTeknisi() || auth()->user()->isAdmin()) ? 'incidents.all' : 'incidents.index';
            return redirect()
                ->route($targetRoute)
                ->with('success', 'Aduan kendala berhasil dibuat dengan Nomor Aduan: ' . $nomorAduan);

        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            if ($e->getCode() === '23000') {
                return back()->withInput()->with('error', 'Terjadi konflik nomor aduan. Silakan coba submit ulang.');
            }
            Log::error('Gagal membuat tiket', ['message' => $e->getMessage()]);
            return back()->withInput()->with('error', 'Gagal membuat laporan: ' . $e->getMessage());
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Gagal membuat tiket', ['message' => $e->getMessage()]);
            return back()->withInput()->with('error', 'Gagal membuat laporan: ' . $e->getMessage());
        }
    }

    public function show(Ticket $ticket)
    {
        // Pelapor hanya boleh melihat tiket miliknya sendiri
        if (auth()->user()->isPelapor() && $ticket->pelapor_id !== auth()->id()) {
            abort(403, 'Anda tidak memiliki akses ke tiket ini.');
        }

        $ticket->load([
            'asset.penanggungJawab',
            'pelapor.bidang',
            'resolution.pemeriksa',
            'histories' => fn($q) => $q->latest('created_at'),
        ]);

        // Daftar pemeriksa (dropdown) hanya dibutuhkan oleh teknisi/admin
        $pemeriksas = (auth()->user()->isTeknisi() || auth()->user()->isAdmin())
            ? User::whereIn('role', ['teknisi', 'admin'])->orderBy('nama')->get(['id', 'nip', 'nama'])
            : collect();

        return view('incidents.show', compact('ticket', 'pemeriksas'));
    }

    /**
     * Ambil (take) tiket aduan untuk ditangani langsung oleh teknisi yang login.
     */
    public function take(Ticket $ticket)
    {
        if (!auth()->user()->isTeknisi() && !auth()->user()->isAdmin()) {
            abort(403);
        }

        if ($ticket->status !== 'Belum diperiksa' || !empty($ticket->resolution?->pemeriksa_id)) {
            return redirect()->route('incidents.show', $ticket)
                ->with('error', 'Tiket ini sudah diambil atau sedang diproses oleh teknisi lain.');
        }

        DB::beginTransaction();
        try {
            $ticket->update(['status' => 'Sedang diproses']);

            $ticket->resolution()->updateOrCreate(
                ['ticket_id' => $ticket->id],
                [
                    'pemeriksa_id' => auth()->id(),
                    'tgl_tindak_lanjut' => Carbon::now(),
                ]
            );

            TicketHistory::create([
                'ticket_id' => $ticket->id,
                'status_label' => 'status diubah',
                'keterangan' => 'Tiket diambil dan mulai ditangani oleh ' . auth()->user()->nama . '.',
            ]);

            DB::commit();

            return redirect()->route('incidents.show', $ticket)
                ->with('success', 'Tiket aduan berhasil diambil. Anda ditugaskan sebagai pemeriksa.');

        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Gagal mengambil tiket', ['ticket_id' => $ticket->id, 'message' => $e->getMessage()]);
            return redirect()->route('incidents.show', $ticket)
                ->with('error', 'Gagal mengambil tiket: ' . $e->getMessage());
        }
    }

    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        if (!auth()->user()->isTeknisi() && !auth()->user()->isAdmin()) {
            abort(403);
        }

        $res = $ticket->resolution;
        if ($res && !empty($res->pemeriksa_id) && $res->pemeriksa_id !== auth()->id()) {
            abort(403, 'Tiket ini sedang ditangani oleh teknisi lain.');
        }

        DB::beginTransaction();
        try {
            $isDraft = $request->input('action_type') === 'draft';
            $newStatus = $isDraft ? 'Sedang diproses' : 'Selesai';

            // 1. Simpan data resolusi (pemeriksa terkunci permanen)
            $resolutionData = [
                'pemeriksa_id' => $res?->pemeriksa_id ?? auth()->id(),
                'tgl_analisa' => $request->tgl_analisa,
                'analisa_teknis' => $request->analisa_teknis,
                'tgl_tindak_lanjut' => $request->tgl_tindak_lanjut,
                'tindak_lanjut_teknis' => $request->tindak_lanjut_teknis,
            ];

            if (!$isDraft) {
                $resolutionData['jenis_penyelesaian'] = $request->jenis_penyelesaian ?? 'mandiri';
                $resolutionData['tgl_hasil'] = $request->tgl_hasil;
                $resolutionData['hasil'] = $request->hasil;
            } else {
                $resolutionData['jenis_penyelesaian'] = $request->input('jenis_penyelesaian', $ticket->resolution?->jenis_penyelesaian ?? 'mandiri');
                if ($request->filled('tgl_hasil')) $resolutionData['tgl_hasil'] = $request->tgl_hasil;
                if ($request->filled('hasil')) $resolutionData['hasil'] = $request->hasil;
            }

            $ticket->resolution()->updateOrCreate(
                ['ticket_id' => $ticket->id],
                $resolutionData
            );

            // 2. Update status sesuai pilihan aksi
            $oldStatus = $ticket->status;
            $ticket->update(['status' => $newStatus]);

            // 3. Catat history
            if ($oldStatus !== $newStatus) {
                TicketHistory::create([
                    'ticket_id' => $ticket->id,
                    'status_label' => 'status diubah',
                    'keterangan' => 'Status diubah dari "' . $oldStatus . '" menjadi "' . $newStatus . '" oleh ' . auth()->user()->nama . '.',
                ]);

                // Notify Pelapor
                if ($ticket->pelapor) {
                    $avatar = auth()->user()->foto_profil ? asset('storage/' . auth()->user()->foto_profil) : asset('images/user/owner.png');
                    $ticket->pelapor->notify(new TicketStatusUpdatedNotification(
                        'Status Aduan Diperbarui',
                        'Aduan Anda (' . $ticket->nomor_aduan . ') kini berstatus: ' . $newStatus,
                        route('incidents.show', $ticket->id),
                        auth()->user()->nama,
                        $avatar
                    ));
                }
            } else {
                TicketHistory::create([
                    'ticket_id' => $ticket->id,
                    'status_label' => 'tindak lanjut diperbarui',
                    'keterangan' => 'Data analisa dan tindak lanjut diperbarui oleh ' . auth()->user()->nama . '.',
                ]);
            }

            DB::commit();

            // WhatsApp Notification via Fonnte saat tiket diselesaikan
            if ($newStatus === 'Selesai') {
                try {
                    app(FonnteService::class)->sendTicketCompletedNotification($ticket);
                } catch (\Throwable $e) {
                    Log::warning('Fonnte sendTicketCompletedNotification error: ' . $e->getMessage());
                }
            }

            $msg = $isDraft 
                ? 'Draft penanganan aduan berhasil disimpan. Tiket kini berstatus "Sedang diproses".' 
                : 'Aduan berhasil diselesaikan! Tiket kini berstatus "Selesai".';

            return redirect()->route('incidents.show', $ticket)->with('success', $msg);

        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Gagal memproses tiket', ['ticket_id' => $ticket->id, 'message' => $e->getMessage()]);
            return back()->withInput()->with('error', 'Gagal memproses tiket: ' . $e->getMessage());
        }
    }

    public function edit(Ticket $ticket)
    {
        $user = auth()->user();

        if (!$user->isTeknisi() && !$user->isAdmin()) {
            if ($ticket->pelapor_id !== $user->id) {
                abort(403, 'Anda tidak memiliki akses untuk mengedit tiket ini.');
            }
            if ($ticket->status !== 'Belum diperiksa') {
                return redirect()->route('incidents.show', $ticket)
                                 ->with('error', 'Maaf, laporan sudah diproses dan tidak dapat diubah lagi.');
            }
        }

        $ticket->load(['asset', 'pelapor']);

        $assets = Asset::select('id', 'kode_barang', 'nama_barang', 'nup', 'lokasi')
                       ->orderBy('nama_barang')
                       ->get();

        return view('incidents.edit', compact('ticket', 'assets'));
    }

    public function updateData(Request $request, Ticket $ticket)
    {
        $user = auth()->user();

        if (!$user->isTeknisi() && !$user->isAdmin()) {
            if ($ticket->pelapor_id !== $user->id) {
                abort(403, 'Anda tidak memiliki akses untuk mengedit tiket ini.');
            }
            if ($ticket->status !== 'Belum diperiksa') {
                return redirect()->route('incidents.show', $ticket)
                                 ->with('error', 'Maaf, laporan sudah diproses dan tidak dapat diubah lagi.');
            }
        }

        $validated = $request->validate([
            'jenis_kendala' => 'required|in:aset,lainnya',
            'asset_id' => 'required_if:jenis_kendala,aset|nullable|exists:assets,id',
            'deskripsi_masalah' => 'required|string|min:10',
            'foto_kendala' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'jenis_kendala.required' => 'Silakan pilih jenis kendala.',
            'asset_id.required_if' => 'Silakan pilih aset/barang TIK terlebih dahulu.',
            'deskripsi_masalah.required' => 'Deskripsi masalah wajib diisi.',
            'deskripsi_masalah.min' => 'Deskripsi masalah minimal 10 karakter.',
        ]);

        DB::beginTransaction();
        try {
            $fotoPath = $ticket->foto_kendala;
            if ($request->hasFile('foto_kendala')) {
                if ($fotoPath && Storage::disk('public')->exists($fotoPath)) {
                    Storage::disk('public')->delete($fotoPath);
                }
                $fotoPath = $request->file('foto_kendala')->store('kendala_photos', 'public');
            }

            $jenisKendala = $validated['jenis_kendala'];
            $assetId = ($jenisKendala === 'aset') ? $validated['asset_id'] : null;

            $ticket->update([
                'jenis_kendala' => $jenisKendala,
                'asset_id' => $assetId,
                'deskripsi_masalah' => $validated['deskripsi_masalah'],
                'foto_kendala' => $fotoPath,
            ]);

            TicketHistory::create([
                'ticket_id' => $ticket->id,
                'status_label' => 'data diperbarui',
                'keterangan' => 'Data aduan diperbarui oleh ' . auth()->user()->nama . '.',
            ]);

            DB::commit();
            return redirect()->route('incidents.show', $ticket)
                             ->with('success', 'Data aduan berhasil diperbarui.');

        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Gagal memperbarui data aduan', ['ticket_id' => $ticket->id, 'message' => $e->getMessage()]);
            return back()->withInput()->with('error', 'Gagal memperbarui data: ' . $e->getMessage());
        }
    }

    /**
     * Hapus aduan (soft delete: data tetap ada di database sebagai arsip).
     */
    public function destroy(Ticket $ticket)
    {
        if (!auth()->user()->isTeknisi() && !auth()->user()->isAdmin()) {
            abort(403);
        }

        DB::beginTransaction();
        try {
            TicketHistory::create([
                'ticket_id' => $ticket->id,
                'status_label' => 'tiket dihapus',
                'keterangan' => 'Tiket dihapus oleh ' . auth()->user()->nama . '.',
            ]);

            $ticket->delete();

            DB::commit();
            return redirect()->route('incidents.all')
                             ->with('success', 'Aduan ' . $ticket->nomor_aduan . ' berhasil dihapus.');

        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Gagal menghapus aduan', ['ticket_id' => $ticket->id, 'message' => $e->getMessage()]);
            return back()->with('error', 'Gagal menghapus aduan: ' . $e->getMessage());
        }
    }


    /**
     * Halaman edit tindak lanjut (khusus admin, tiket status Selesai).
     */
    public function editResolution(Ticket $ticket)
    {
        if (!auth()->user()->isTeknisi() && !auth()->user()->isAdmin()) {
            abort(403);
        }

        if ($ticket->resolution?->pemeriksa_id && $ticket->resolution->pemeriksa_id !== auth()->id()) {
            abort(403, 'Hanya teknisi yang menangani tiket ini yang dapat merevisi tindak lanjut.');
        }

        if ($ticket->status !== 'Selesai') {
            return redirect()->route('incidents.show', $ticket)
                ->with('error', 'Hanya tiket dengan status Selesai yang tindak lanjutnya dapat diedit melalui rute ini.');
        }

        $ticket->load(['asset.penanggungJawab', 'pelapor.bidang', 'resolution.pemeriksa']);
        
        $pemeriksas = User::whereIn('role', ['teknisi', 'admin'])->orderBy('nama')->get(['id', 'nip', 'nama']);

        return view('incidents.edit-resolution', compact('ticket', 'pemeriksas'));
    }

    /**
     * Proses update data resolusi (tindak lanjut).
     */
    public function updateResolution(Request $request, Ticket $ticket)
    {
        if (!auth()->user()->isTeknisi() && !auth()->user()->isAdmin()) {
            abort(403);
        }

        if ($ticket->resolution?->pemeriksa_id && $ticket->resolution->pemeriksa_id !== auth()->id()) {
            abort(403, 'Hanya teknisi yang menangani tiket ini yang dapat merevisi tindak lanjut.');
        }

        if ($ticket->status !== 'Selesai') {
            return redirect()->route('incidents.show', $ticket)
                ->with('error', 'Tindak lanjut hanya dapat diedit saat status Selesai.');
        }

        $validated = $request->validate([
            'pemeriksa_id' => 'nullable|exists:users,id',
            'jenis_penyelesaian' => 'required|in:mandiri,Pihak ke-3',
            'tgl_analisa' => 'nullable|date',
            'analisa_teknis' => 'nullable|string',
            'tgl_tindak_lanjut' => 'required|date',
            'tindak_lanjut_teknis' => 'required|string|min:5',
            'tgl_hasil' => 'nullable|date',
            'hasil' => 'nullable|string|min:10',
            'file_surat_justifikasi' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:4096',
        ], [
            'jenis_penyelesaian.required' => 'Jenis penyelesaian wajib dipilih.',
            'tgl_tindak_lanjut.required' => 'Tanggal tindak lanjut wajib diisi.',
            'tindak_lanjut_teknis.required' => 'Tindak lanjut teknis wajib diisi.',
            'tindak_lanjut_teknis.min' => 'Tindak lanjut teknis minimal 5 karakter.',
        ]);

        DB::beginTransaction();
        try {
            $ticket->resolution()->updateOrCreate(
                ['ticket_id' => $ticket->id],
                [
                    'pemeriksa_id' => $ticket->resolution?->pemeriksa_id ?? auth()->id(),
                    'jenis_penyelesaian' => $validated['jenis_penyelesaian'],
                    'tgl_analisa' => $validated['tgl_analisa'],
                    'analisa_teknis' => $validated['analisa_teknis'],
                    'tgl_tindak_lanjut' => $validated['tgl_tindak_lanjut'],
                    'tindak_lanjut_teknis' => $validated['tindak_lanjut_teknis'],
                    'tgl_hasil' => $validated['tgl_hasil'] ?? null,
                    'hasil' => $validated['hasil'] ?? null,
                ]
            );

            TicketHistory::create([
                'ticket_id' => $ticket->id,
                'status_label' => 'tindak lanjut direvisi',
                'keterangan' => 'Catatan tindak lanjut direvisi oleh ' . auth()->user()->nama . '.',
            ]);

            DB::commit();
            return redirect()->route('incidents.show', $ticket)
                             ->with('success', 'Catatan tindak lanjut berhasil direvisi.');

        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Gagal merevisi tindak lanjut tiket', ['ticket_id' => $ticket->id, 'message' => $e->getMessage()]);
            return back()->withInput()->with('error', 'Gagal merevisi tindak lanjut: ' . $e->getMessage());
        }
    }

    /**
     * Cetak Surat Permintaan Perbaikan BMN (hanya untuk penyelesaian Pihak ke-3) dalam format PDF.
     */
    public function justifikasi(Ticket $ticket)
    {
        if (!auth()->user()->isTeknisi() && !auth()->user()->isAdmin()) {
            abort(403);
        }

        if (!$ticket->resolution || $ticket->resolution->jenis_penyelesaian !== 'Pihak ke-3') {
            return redirect()->route('incidents.show', $ticket)
                ->with('error', 'Surat Permohonan Perbaikan hanya dapat diunduh jika penanganan telah disimpan dengan jenis penyelesaian "Pihak ke-3".');
        }

        $ticket->load([
            'pelapor.bidang',
            'asset.penanggungJawab',
            'resolution.pemeriksa',
        ]);

        $kabag = (object) config('itsm.kabag_tu', [
            'nama' => 'Kepala Bagian Tata Usaha',
            'nip'  => '19750101 200003 1 001',
        ]);
        $pemeriksa = $ticket->resolution?->pemeriksa ?? auth()->user();

        $pdf = Pdf::loadView('pdf.surat-perbaikan-bmn', [
            'ticket'    => $ticket,
            'kabag'     => $kabag,
            'pemeriksa' => $pemeriksa,
        ])->setPaper('a4', 'portrait');

        return $pdf->stream("surat-perbaikan-{$ticket->nomor_aduan}.pdf");
    }

    /**
     * Alias method untuk cetak surat sesuai referensi fungsi cetakSurat.
     */
    public function cetakSurat(Ticket $ticket)
    {
        return $this->justifikasi($ticket);
    }
}
