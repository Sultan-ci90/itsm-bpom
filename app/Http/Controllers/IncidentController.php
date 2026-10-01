<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIncidentRequest;
use App\Models\Asset;
use App\Models\Ticket;
use App\Models\TicketHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Requests\UpdateTicketRequest;
use App\Models\TicketResolution;

class IncidentController extends Controller
{
    public function index(Request $request)
    {
        $query = Ticket::with(['asset', 'pelapor.bidang']);

        if (auth()->user()->isPelapor()) {
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
            $lastTicket = Ticket::where('nomor_aduan', 'like', "TIK-{$date}-%")
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

            DB::commit();
            return redirect()
                ->route('incidents.index')
                ->with('success', 'Laporan kendala berhasil dibuat dengan Nomor Aduan: ' . $nomorAduan);

        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            if ($e->getCode() === '23000') {
                return back()->withInput()->with('error', 'Terjadi konflik nomor aduan. Silakan coba submit ulang.');
            }
            return back()->withInput()->with('error', 'Gagal membuat laporan: ' . $e->getMessage());
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Gagal membuat laporan: ' . $e->getMessage());
        }
    }



// ... di dalam class IncidentController

public function show(Ticket $ticket)
{
    // KRITIS: Pelapor hanya boleh melihat tiket miliknya sendiri
    if (auth()->user()->isPelapor() && $ticket->pelapor_id !== auth()->id()) {
        abort(403, 'Anda tidak memiliki akses ke tiket ini.');
    }

    // Eager loading untuk mencegah N+1 query
    $ticket->load([
        'asset', 
        'pelapor.bidang', 
        'resolution', 
        'histories' => fn($q) => $q->latest('created_at')
    ]);

    return view('incidents.show', compact('ticket'));
}

public function update(UpdateTicketRequest $request, Ticket $ticket)
{
    // Authorization sudah ditangani di UpdateTicketRequest, tapi kita double check
    if (!auth()->user()->isTeknisi() && !auth()->user()->isAdmin()) {
        abort(403);
    }

    DB::beginTransaction();
    try {
        // 1. Handle Upload Surat Justifikasi (Jika ada)
        $filePath = $ticket->resolution?->file_surat_justifikasi;
        if ($request->hasFile('file_surat_justifikasi')) {
            // Hapus file lama jika ada
            if ($filePath && \Storage::disk('public')->exists($filePath)) {
                \Storage::disk('public')->delete($filePath);
            }
            $filePath = $request->file('file_surat_justifikasi')->store('justifikasi', 'public');
        }

        // 2. Update / Insert ke tabel ticket_resolutions (One-to-One)
        $ticket->resolution()->updateOrCreate(
            ['ticket_id' => $ticket->id],
            [
                'pemeriksa_id' => auth()->id(),
                'jenis_penyelesaian' => $request->jenis_penyelesaian,
                'vendor' => $request->vendor,
                'estimasi_biaya' => $request->estimasi_biaya,
                'tgl_analisa' => $request->tgl_analisa,
                'analisa_teknis' => $request->analisa_teknis,
                'tgl_tindak_lanjut' => $request->tgl_tindak_lanjut,
                'tindak_lanjut_teknis' => $request->tindak_lanjut_teknis,
                'tgl_hasil' => $request->tgl_hasil,
                'hasil' => $request->hasil,
                'file_surat_justifikasi' => $filePath,
            ]
        );

        // 3. Update Status di tabel utama tickets
        $oldStatus = $ticket->status;
        $ticket->update(['status' => $request->status]);

        // 4. Catat History Perubahan
        if ($oldStatus !== $request->status) {
            TicketHistory::create([
                'ticket_id' => $ticket->id,
                'status_label' => 'status diubah',
                'keterangan' => 'Status diubah dari "' . $oldStatus . '" menjadi "' . $request->status . '" oleh ' . auth()->user()->nama . '.',
            ]);
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

    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', 'Gagal memproses tiket: ' . $e->getMessage());
    }
}
}