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

class IncidentController extends Controller
{
    public function index(Request $request)
    {
        $query = Ticket::with(['asset', 'pelapor.bidang']);

        // Pelapor hanya bisa melihat aduannya sendiri
        if (auth()->user()->isPelapor()) {
            $query->where('pelapor_id', auth()->id());
        } else {
            // Admin/Tim IT di halaman 'Aduan Saya' (jika ada form/menu khusus),
            // sebenarnya 'incidents.index' dibuat untuk user yang login saat ini
            // Agar membedakan dengan Semua Aduan, kita set agar Admin melihat miliknya saja di sini.
            $query->where('pelapor_id', auth()->id());
        }

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

        $tickets = $query->latest('created_at')->paginate(15)->withQueryString();

        return view('incidents.index', compact('tickets'));
    }

    public function all(Request $request)
    {
        $query = Ticket::with(['asset', 'pelapor.bidang']);

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

        $tickets = $query->latest('created_at')->paginate(15)->withQueryString();

        return view('incidents.all', compact('tickets'));
    }

    public function create()
    {
        $assets = Asset::select('id', 'kode_barang', 'nama_barang', 'nup', 'lokasi')
                       ->orderBy('nama_barang')
                       ->get();

        return view('incidents.create', compact('assets'));
    }

    public function store(StoreIncidentRequest $request)
    {
        DB::beginTransaction();
        try {
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

            $ticket = Ticket::create([
                'nomor_aduan' => $nomorAduan,
                'asset_id' => $request->asset_id,
                'pelapor_id' => auth()->id(),
                'tgl_pelaporan' => Carbon::now(),
                'deskripsi_masalah' => $request->deskripsi_masalah,
                'foto_kendala' => $fotoPath,
                'status' => 'Belum diperiksa',
            ]);

            TicketHistory::create([
                'ticket_id' => $ticket->id,
                'status_label' => 'aduan dibuat',
                'keterangan' => 'Tiket dibuat oleh ' . auth()->user()->nama . '.',
            ]);

            // Notify Admin & Teknisi
            $staffs = User::whereIn('role', ['teknisi', 'admin'])->get();
            $avatar = auth()->user()->foto_profil ? asset('storage/' . auth()->user()->foto_profil) : asset('images/user/owner.png');
            Notification::send($staffs, new NewTicketNotification(
                'Laporan Kendala Baru',
                auth()->user()->nama . ' membuat laporan kendala baru (' . $nomorAduan . ').',
                route('incidents.show', $ticket->id),
                auth()->user()->nama,
                $avatar
            ));

            DB::commit();
            return redirect()
                ->route('incidents.index')
                ->with('success', 'Laporan kendala berhasil dibuat dengan Nomor Aduan: ' . $nomorAduan);

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

    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        if (!auth()->user()->isTeknisi() && !auth()->user()->isAdmin()) {
            abort(403);
        }

        DB::beginTransaction();
        try {
            // 1. Upload surat justifikasi (jika ada)
            $filePath = $ticket->resolution?->file_surat_justifikasi;
            if ($request->hasFile('file_surat_justifikasi')) {
                if ($filePath && Storage::disk('public')->exists($filePath)) {
                    Storage::disk('public')->delete($filePath);
                }
                $filePath = $request->file('file_surat_justifikasi')->store('justifikasi', 'public');
            }

            // Jika internal, data vendor tidak relevan
            $isPihak3 = $request->jenis_penyelesaian === 'Pihak ke-3';

            // 2. Simpan resolusi (one-to-one)
            $ticket->resolution()->updateOrCreate(
                ['ticket_id' => $ticket->id],
                [
                    'pemeriksa_id' => $request->pemeriksa_id ?? auth()->id(),
                    'jenis_penyelesaian' => $request->jenis_penyelesaian,
                    'vendor' => $isPihak3 ? $request->vendor : null,
                    'estimasi_biaya' => $isPihak3 ? $request->estimasi_biaya : null,
                    'tgl_analisa' => $request->tgl_analisa,
                    'analisa_teknis' => $request->analisa_teknis,
                    'tgl_tindak_lanjut' => $request->tgl_tindak_lanjut,
                    'tindak_lanjut_teknis' => $request->tindak_lanjut_teknis,
                    'tgl_hasil' => $request->tgl_hasil,
                    'hasil' => $request->hasil,
                    'file_surat_justifikasi' => $filePath,
                ]
            );

            // 3. Update status
            $oldStatus = $ticket->status;
            $ticket->update(['status' => $request->status]);

            // 4. Catat history
            if ($oldStatus !== $request->status) {
                TicketHistory::create([
                    'ticket_id' => $ticket->id,
                    'status_label' => 'status diubah',
                    'keterangan' => 'Status diubah dari "' . $oldStatus . '" menjadi "' . $request->status . '" oleh ' . auth()->user()->nama . '.',
                ]);

                // Notify Pelapor
                if ($ticket->pelapor) {
                    $avatar = auth()->user()->foto_profil ? asset('storage/' . auth()->user()->foto_profil) : asset('images/user/owner.png');
                    $ticket->pelapor->notify(new TicketStatusUpdatedNotification(
                        'Status Aduan Diperbarui',
                        'Aduan Anda (' . $ticket->nomor_aduan . ') kini berstatus: ' . $request->status,
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
            return redirect()->route('incidents.show', $ticket)
                             ->with('success', 'Tiket berhasil diproses dan diperbarui.');

        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Gagal memproses tiket', ['ticket_id' => $ticket->id, 'message' => $e->getMessage()]);
            return back()->withInput()->with('error', 'Gagal memproses tiket: ' . $e->getMessage());
        }
    }

    /**
     * Form edit data aduan (hanya teknisi/admin).
     */
    public function edit(Ticket $ticket)
    {
        if (!auth()->user()->isTeknisi() && !auth()->user()->isAdmin()) {
            abort(403);
        }

        $ticket->load(['asset', 'pelapor']);

        $assets = Asset::select('id', 'kode_barang', 'nama_barang', 'nup', 'lokasi')
                       ->orderBy('nama_barang')
                       ->get();

        return view('incidents.edit', compact('ticket', 'assets'));
    }

    /**
     * Simpan perubahan data aduan (aset, deskripsi, foto).
     * Berbeda dengan update() yang dipakai untuk memproses/tindak lanjut.
     */
    public function updateData(Request $request, Ticket $ticket)
    {
        if (!auth()->user()->isTeknisi() && !auth()->user()->isAdmin()) {
            abort(403);
        }

        $validated = $request->validate([
            'asset_id' => 'required|exists:assets,id',
            'deskripsi_masalah' => 'required|string|min:10',
            'foto_kendala' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
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

            $ticket->update([
                'asset_id' => $validated['asset_id'],
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
            return redirect()->route('incidents.index')
                             ->with('success', 'Aduan ' . $ticket->nomor_aduan . ' berhasil dihapus.');

        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Gagal menghapus aduan', ['ticket_id' => $ticket->id, 'message' => $e->getMessage()]);
            return back()->with('error', 'Gagal menghapus aduan: ' . $e->getMessage());
        }
    }


    /**
     * Halaman cetak Surat Justifikasi (hanya untuk penyelesaian Pihak ke-3).
     */
    public function justifikasi(Ticket $ticket)
    {
        if (!auth()->user()->isTeknisi() && !auth()->user()->isAdmin()) {
            abort(403);
        }

        $ticket->load(['asset.penanggungJawab', 'pelapor.bidang', 'resolution.pemeriksa']);

        if (!$ticket->resolution || $ticket->resolution->jenis_penyelesaian !== 'Pihak ke-3') {
            return redirect()->route('incidents.show', $ticket)
                ->with('error', 'Simpan data tindak lanjut dengan jenis penyelesaian Pihak ke-3 terlebih dahulu.');
        }

        return view('incidents.justifikasi', compact('ticket'));
    }
}