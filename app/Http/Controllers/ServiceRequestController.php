<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequestRequest;
use App\Models\Bidang;
use App\Models\ServiceRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ServiceRequestController extends Controller
{
    public function create()
    {
        // Ambil data untuk dropdown
        $bidangs = Bidang::orderBy('nama_bidang')->get();
        
        // Opsi lokasi (Sesuaikan jika lokasi diambil dari tabel assets atau master lokasi)
        // Untuk contoh ini, saya asumsikan Anda punya array statis atau tabel lokasi.
        // Jika dari tabel assets: $lokasis = Asset::select('lokasi')->distinct()->pluck('lokasi');
        $lokasis = ['R. Tata Usaha', 'R. Rapat Utama', 'Aula BPOM', 'Lobby']; 

        return view('requests.create', compact('bidangs', 'lokasis'));
    }

    public function store(StoreServiceRequestRequest $request)
    {
        DB::beginTransaction();
        try {
            // 1. Generate Nomor Request (Format: REQ-YYYYMMDD-XXXX)
            $date = Carbon::now()->format('Ymd');
            $lastReq = ServiceRequest::where('nomor_request', 'like', "REQ-{$date}-%")->latest('id')->first();
            $sequence = $lastReq ? (int) Str::afterLast($lastReq->nomor_request, '-') + 1 : 1;
            $nomorRequest = 'REQ-' . $date . '-' . str_pad($sequence, 4, '0', STR_PAD_LEFT);

            // 2. Simpan ke tabel utama service_requests
            $serviceRequest = ServiceRequest::create([
                'nomor_request' => $nomorRequest,
                'user_id' => Auth::id(),
                'layanan' => $request->layanan,
                'tgl_request' => Carbon::now(),
                'lokasi' => $request->lokasi,
                'deskripsi' => $request->deskripsi,
                'status' => 'Diajukan',
            ]);

            // 3. Simpan ke tabel detail berdasarkan jenis layanan (Conditional)
            $layanan = $request->layanan;

            if ($layanan === 'zoom') {
                $serviceRequest->detailZoom()->create([
                    'bidang_id' => $request->bidang_id,
                    'nama_acara' => $request->nama_acara,
                    'jam_mulai' => $request->jam_mulai,
                    'jam_selesai' => $request->jam_selesai,
                    'jenis_acara' => $request->jenis_acara,
                    'butuh_operator' => $request->butuh_operator,
                    'bentuk_ruangan' => $request->bentuk_ruangan,
                    'jumlah_kursi' => $request->jumlah_kursi,
                ]);
            } elseif ($layanan === 'akun') {
                $serviceRequest->detailAkun()->create([
                    'jenis_pengajuan' => $request->jenis_pengajuan,
                    'sistem_tujuan' => $request->sistem_tujuan,
                    'nip_terkait' => $request->nip_terkait,
                ]);
            } elseif ($layanan === 'peminjaman') {
                $serviceRequest->detailPeminjaman()->create([
                    'jenis_perangkat' => $request->jenis_perangkat,
                    'tgl_mulai' => $request->tgl_mulai,
                    'tgl_kembali' => $request->tgl_kembali,
                    'keperluan' => $request->keperluan,
                    'lokasi_penggunaan' => $request->lokasi_penggunaan,
                ]);
            }
            // Jika 'konsultasi' atau 'operator', tidak ada tabel detail khusus, cukup simpan di deskripsi utama.

            DB::commit();
            return redirect()->route('requests.index')->with('success', 'Permintaan layanan berhasil dibuat dengan Nomor: ' . $nomorRequest);

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal membuat permintaan: ' . $e->getMessage())->withInput();
        }
    }
}