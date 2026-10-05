<?php

namespace App\Http\Controllers;

use App\Models\ServiceRequest;
use App\Models\ReqDetailZoom;
use App\Models\ReqDetailAkun;
use App\Models\ReqDetailPeminjaman;
use App\Models\Bidang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ServiceRequestController extends Controller
{
    /**
     * Menampilkan daftar request (index)
     */
    public function index(Request $request)
    {
        $query = ServiceRequest::with(['user']);

        // Jika user adalah pelapor, hanya tampilkan request miliknya sendiri
        if (auth()->user()->isPelapor()) {
            $query->where('user_id', auth()->id());
        }

        // Filter berdasarkan status
        if ($request->filled('status')) {
            $validStatuses = ['Diajukan', 'Diproses', 'Selesai', 'Ditolak'];
            $status = $request->string('status')->toString();
            if (in_array($status, $validStatuses, true)) {
                $query->where('status', $status);
            }
        }

        // Pencarian berdasarkan nomor request atau layanan
        if ($request->filled('q')) {
            $term = $request->string('q')->toString();
            $query->where(function ($q) use ($term) {
                $q->where('nomor_request', 'like', "%{$term}%")
                  ->orWhere('layanan', 'like', "%{$term}%");
            });
        }

        $requests = $query->latest('created_at')->paginate(10)->withQueryString();

        return view('requests.index', compact('requests'));
    }

    /**
     * Menampilkan form create request
     */
    public function create()
    {
        $bidangs = Bidang::all();
        $lokasis = [
            'Ruang Rapat Utama',
            'Ruang Rapat Bidang Pengawasan',
            'Ruang Rapat Bidang Regulasi',
            'Aula BPOM',
            'Ruang Tata Usaha',
            'Luar Kantor'
        ];

        return view('requests.create', compact('bidangs', 'lokasis'));
    }

    /**
     * Menyimpan data request baru ke database
     */
    public function store(Request $request)
    {
        // 1. Validasi Bersyarat
        $validated = $request->validate([
            'layanan' => 'required|in:zoom,akun,peminjaman,konsultasi,operator',
            'lokasi' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            
            // Validasi khusus Zoom
            'bidang_id' => 'required_if:layanan,zoom|exists:bidang,id',
            'nama_acara' => 'required_if:layanan,zoom|string|max:255',
            'jam_mulai' => 'required_if:layanan,zoom|date_format:H:i',
            'jam_selesai' => 'required_if:layanan,zoom|date_format:H:i|after:jam_mulai',
            'jenis_acara' => 'required_if:layanan,zoom|in:Rapat,Webinar,Hybrid',
            'butuh_operator' => 'required_if:layanan,zoom|in:Ya,Tidak',
            'bentuk_ruangan' => 'required_if:layanan,zoom|in:Classroom,Shape U,Theater',
            'jumlah_kursi' => 'required_if:layanan,zoom|integer|min:1',

            // Validasi khusus Akun
            'jenis_pengajuan' => 'required_if:layanan,akun|in:Reset Password,Buat Akun Baru',
            'sistem_tujuan' => 'required_if:layanan,akun|in:Srikandi,SIPT',
            'nip_terkait' => 'required_if:layanan,akun|string|max:50',

            // Validasi khusus Peminjaman
            'jenis_perangkat' => 'required_if:layanan,peminjaman|string|max:255',
            'tgl_mulai' => 'required_if:layanan,peminjaman|date',
            'tgl_kembali' => 'required_if:layanan,peminjaman|date|after_or_equal:tgl_mulai',
            'keperluan' => 'required_if:layanan,peminjaman|string',
            'lokasi_penggunaan' => 'required_if:layanan,peminjaman|string|max:100',
        ]);

        // 2. Database Transaction
        DB::beginTransaction();
        try {
            // Generate Nomor Request Otomatis
            $date = Carbon::now()->format('Ymd');
            $lastReq = ServiceRequest::where('nomor_request', 'like', "REQ-{$date}-%")->latest('id')->first();
            $sequence = $lastReq ? (int) substr($lastReq->nomor_request, -4) + 1 : 1;
            $nomorRequest = 'REQ-' . $date . '-' . str_pad($sequence, 4, '0', STR_PAD_LEFT);

            // Insert ke tabel utama
            $serviceRequest = ServiceRequest::create([
                'nomor_request' => $nomorRequest,
                'user_id' => auth()->id(),
                'layanan' => $validated['layanan'],
                'tgl_request' => Carbon::now(),
                'lokasi' => $validated['lokasi'],
                'deskripsi' => $validated['deskripsi'],
                'status' => 'Diajukan',
            ]);

            // 3. Insert ke tabel detail berdasarkan jenis layanan
            if ($validated['layanan'] === 'zoom') {
                ReqDetailZoom::create([
                    'request_id' => $serviceRequest->id,
                    'bidang_id' => $validated['bidang_id'],
                    'nama_acara' => $validated['nama_acara'],
                    'jam_mulai' => $validated['jam_mulai'],
                    'jam_selesai' => $validated['jam_selesai'],
                    'jenis_acara' => $validated['jenis_acara'],
                    'butuh_operator' => $validated['butuh_operator'],
                    'bentuk_ruangan' => $validated['bentuk_ruangan'],
                    'jumlah_kursi' => $validated['jumlah_kursi'],
                ]);
            } elseif ($validated['layanan'] === 'akun') {
                ReqDetailAkun::create([
                    'request_id' => $serviceRequest->id,
                    'jenis_pengajuan' => $validated['jenis_pengajuan'],
                    'sistem_tujuan' => $validated['sistem_tujuan'],
                    'nip_terkait' => $validated['nip_terkait'],
                ]);
            } elseif ($validated['layanan'] === 'peminjaman') {
                ReqDetailPeminjaman::create([
                    'request_id' => $serviceRequest->id,
                    'jenis_perangkat' => $validated['jenis_perangkat'],
                    'tgl_mulai' => $validated['tgl_mulai'],
                    'tgl_kembali' => $validated['tgl_kembali'],
                    'keperluan' => $validated['keperluan'],
                    'lokasi_penggunaan' => $validated['lokasi_penggunaan'],
                ]);
            }

            DB::commit();
            return redirect()->route('requests.index')
                ->with('success', 'Permintaan layanan berhasil diajukan dengan Nomor: ' . $nomorRequest);

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Gagal membuat request: ' . $e->getMessage());
        }
    }
}