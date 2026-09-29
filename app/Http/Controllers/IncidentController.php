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

class IncidentController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with(['asset', 'pelapor'])
                         ->where('pelapor_id', Auth::id())
                         ->latest()
                         ->get();

        return view('incidents.index', compact('tickets'));
    }

    public function create()
    {
        // Ambil data aset untuk dropdown
        $assets = Asset::select('id', 'kode_barang', 'nama_barang', 'nup', 'lokasi')
                       ->orderBy('nama_barang')
                       ->get();

        return view('incidents.create', compact('assets'));
    }

    // Endpoint AJAX untuk mendapatkan detail aset (Auto-fill Lokasi)
    public function getAssetDetail($id)
    {
        $asset = Asset::select('id', 'lokasi', 'penanggung_jawab_id')->find($id);
        return response()->json($asset);
    }

    public function store(StoreIncidentRequest $request)
    {
        DB::beginTransaction();
        try {
            // 1. Generate Nomor Aduan Otomatis (Format: TIK-YYYYMMDD-XXXX)
            $date = Carbon::now()->format('Ymd');
            $lastTicket = Ticket::where('nomor_aduan', 'like', "TIK-{$date}-%")->latest('id')->first();
            $sequence = $lastTicket ? (int) Str::afterLast($lastTicket->nomor_aduan, '-') + 1 : 1;
            $nomorAduan = 'TIK-' . $date . '-' . str_pad($sequence, 4, '0', STR_PAD_LEFT);

            // 2. Handle Upload Foto (Jika ada)
            $fotoPath = null;
            if ($request->hasFile('foto_kendala')) {
                $fotoPath = $request->file('foto_kendala')->store('kendala_photos', 'public');
            }

            // 3. Simpan ke Tabel Tickets
            $ticket = Ticket::create([
                'nomor_aduan' => $nomorAduan,
                'asset_id' => $request->asset_id,
                'pelapor_id' => Auth::id(), // Otomatis dari user yang login
                'tgl_pelaporan' => Carbon::now(), // Otomatis hari ini
                'deskripsi_masalah' => $request->deskripsi_masalah,
                'foto_kendala' => $fotoPath,
                'status' => 'Belum diperiksa',
            ]);

            // 4. Catat History Awal
            TicketHistory::create([
                'ticket_id' => $ticket->id,
                'status_label' => 'aduan dibuat',
                'keterangan' => 'Tiket dibuat oleh pelapor.',
            ]);

            DB::commit();
            return redirect()->route('incidents.index')->with('success', 'Laporan kendala berhasil dibuat dengan Nomor Aduan: ' . $nomorAduan);

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal membuat laporan: ' . $e->getMessage());
        }
    }
}
