<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequestRequest;
use App\Models\Asset;
use App\Models\ServiceRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ServiceRequestController extends Controller
{
    /**
     * Daftar request milik user yang login (Request Saya).
     */
    public function index()
    {
        $requests = ServiceRequest::with(['asset', 'teknisi'])
            ->where('pemohon_id', Auth::id())
            ->latest()
            ->get();

        return view('requests.index', compact('requests'));
    }

    /**
     * Semua request (khusus IT Support / Admin).
     */
    public function all()
    {
        $this->ensureSupportRole();

        $requests = ServiceRequest::with(['asset', 'pemohon', 'teknisi'])
            ->latest()
            ->get();

        return view('requests.all', compact('requests'));
    }

    /**
     * Form buat request baru.
     */
    public function create()
    {
        $assets = Asset::select('id', 'kode_barang', 'nama_barang', 'nup', 'lokasi')
            ->orderBy('nama_barang')
            ->get();

        return view('requests.create', compact('assets'));
    }

    /**
     * Simpan request baru.
     */
    public function store(StoreServiceRequestRequest $request)
    {
        // Generate Nomor Request otomatis (format: REQ-YYYYMMDD-XXXX)
        $date = Carbon::now()->format('Ymd');
        $last = ServiceRequest::where('nomor_request', 'like', "REQ-{$date}-%")
            ->latest('id')
            ->first();
        $sequence = $last ? (int) Str::afterLast($last->nomor_request, '-') + 1 : 1;
        $nomorRequest = 'REQ-' . $date . '-' . str_pad($sequence, 4, '0', STR_PAD_LEFT);

        ServiceRequest::create([
            'nomor_request' => $nomorRequest,
            'judul_permintaan' => $request->judul_permintaan,
            'kategori' => $request->kategori,
            'prioritas' => $request->prioritas,
            'asset_id' => $request->asset_id ?: null,
            'deskripsi' => $request->deskripsi,
            'pemohon_id' => Auth::id(),
            'status' => 'baru',
            'tgl_permintaan' => Carbon::now(),
        ]);

        return redirect()
            ->route('requests.index')
            ->with('success', 'Permintaan berhasil dibuat dengan Nomor: ' . $nomorRequest);
    }

    /**
     * Detail satu request.
     */
    public function show($id)
    {
        $req = ServiceRequest::with(['asset', 'pemohon', 'teknisi'])->findOrFail($id);

        // Hanya pemilik atau IT Support/Admin yang boleh melihat
        if ($req->pemohon_id !== Auth::id() && !$this->isSupport()) {
            abort(403, 'Anda tidak berhak melihat permintaan ini.');
        }

        return view('requests.show', compact('req'));
    }

    protected function isSupport(): bool
    {
        $roleName = optional(Auth::user()->role)->name ?? '';
        return in_array(strtolower($roleName), ['it support', 'admin']);
    }

    protected function ensureSupportRole(): void
    {
        if (!$this->isSupport()) {
            abort(403, 'Halaman ini hanya untuk IT Support / Admin.');
        }
    }
}
