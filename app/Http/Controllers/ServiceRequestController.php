<?php

namespace App\Http\Controllers;

use App\Models\ServiceRequest;
use App\Models\ReqDetailZoom;
use App\Models\ReqDetailAkun;
use App\Models\ReqDetailPeminjaman;
use App\Models\Bidang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
     * Daftar semua request (untuk teknisi/admin)
     */
    public function all(Request $request)
    {
        $query = ServiceRequest::with(['user']);

        if ($request->filled('status')) {
            $validStatuses = ['Diajukan', 'Diproses', 'Selesai', 'Ditolak'];
            $status = $request->string('status')->toString();
            if (in_array($status, $validStatuses, true)) {
                $query->where('status', $status);
            }
        }

        if ($request->filled('q')) {
            $term = $request->string('q')->toString();
            $query->where(function ($q) use ($term) {
                $q->where('nomor_request', 'like', "%{$term}%")
                  ->orWhere('layanan', 'like', "%{$term}%");
            });
        }

        $requests = $query->latest('created_at')->paginate(15)->withQueryString();

        return view('requests.all', compact('requests'));
    }

    /**
     * Menampilkan form create request
     */
    public function create()
    {
        $bidangs = Bidang::all();

        // 1. Integrasi lokasi otomatis berdasarkan bidang pegawai yang sedang login
        $user = auth()->user()->load('bidang');
        $bidangUser = $user->bidang?->nama_bidang;

        $defaultLokasi = match (true) {
            str_contains(strtolower($bidangUser ?? ''), 'tata usaha') || str_contains(strtolower($bidangUser ?? ''), 'umum') => 'Ruang Staff Tata Usaha',
            str_contains(strtolower($bidangUser ?? ''), 'pengawasan') => 'Ruang Staff Pengawasan',
            str_contains(strtolower($bidangUser ?? ''), 'regulasi') => 'Ruang Staff Regulasi',
            str_contains(strtolower($bidangUser ?? ''), 'sumber daya') || str_contains(strtolower($bidangUser ?? ''), 'sdm') => 'Ruang Staff SDM',
            !empty($bidangUser) => 'Ruang Staff ' . $bidangUser,
            default => 'Ruang Staff Tata Usaha',
        };

        // 2. Daftar seluruh ruangan staff dan fasilitas bersama
        $lokasiStaff = [
            'Ruang Staff Tata Usaha',
            'Ruang Staff Pengawasan',
            'Ruang Staff Regulasi',
            'Ruang Staff SDM',
        ];

        $lokasiUmum = [
            'Ruang Rapat Utama',
            'Ruang Rapat Bidang Pengawasan',
            'Ruang Rapat Bidang Regulasi',
            'Aula BPOM',
            'Luar Kantor',
        ];

        // Gabungkan dan pastikan lokasi default pegawai ada di urutan teratas
        $allLokasi = array_merge([$defaultLokasi], $lokasiStaff, $lokasiUmum);
        $lokasis = array_values(array_unique($allLokasi));

        return view('requests.create', compact('bidangs', 'lokasis', 'defaultLokasi'));
    }

    /**
     * Menyimpan data request baru ke database
     */
    public function store(Request $request)
    {
        // Nama tabel diambil dari model supaya aturan exists selalu cocok
        $bidangTable = (new Bidang)->getTable();

        // 1. Validasi Bersyarat ('lainnya' adalah default layanan)
        $validated = $request->validate([
            'layanan' => 'required|in:lainnya,zoom,akun,peminjaman,konsultasi,operator',
            'lokasi' => 'required|string|max:100',
            'deskripsi' => 'required_if:layanan,lainnya|nullable|string',

            // Validasi khusus Zoom
            'bidang_id' => "required_if:layanan,zoom|nullable|exists:{$bidangTable},id",
            'nama_acara' => 'required_if:layanan,zoom|nullable|string|max:255',
            'jam_mulai' => 'required_if:layanan,zoom|nullable|date_format:H:i',
            'jam_selesai' => 'required_if:layanan,zoom|nullable|date_format:H:i|after:jam_mulai',
            'jenis_acara' => 'required_if:layanan,zoom|nullable|in:Rapat,Webinar,Hybrid',
            'butuh_operator' => 'required_if:layanan,zoom|nullable|in:Ya,Tidak',
            'bentuk_ruangan' => 'required_if:layanan,zoom|nullable|in:Classroom,Shape U,Theater',
            'jumlah_kursi' => 'required_if:layanan,zoom|nullable|integer|min:1',

            // Validasi khusus Akun
            'jenis_pengajuan' => 'required_if:layanan,akun|nullable|in:Reset Password,Buat Akun Baru',
            'sistem_tujuan' => 'required_if:layanan,akun|nullable|in:Srikandi,SIPT',
            'nip_terkait' => 'required_if:layanan,akun|nullable|string|max:50',

            // Validasi khusus Peminjaman
            'jenis_perangkat' => 'required_if:layanan,peminjaman|nullable|string|max:255',
            'tgl_mulai' => 'required_if:layanan,peminjaman|nullable|date',
            'tgl_kembali' => 'required_if:layanan,peminjaman|nullable|date|after_or_equal:tgl_mulai',
            'keperluan' => 'required_if:layanan,peminjaman|nullable|string',
            'lokasi_penggunaan' => 'required_if:layanan,peminjaman|nullable|string|max:100',
        ], [
            'deskripsi.required_if' => 'Mohon jelaskan rincian permintaan atau kebutuhan Anda pada kolom deskripsi.',
            'lokasi.required' => 'Lokasi wajib dipilih.',
            'layanan.required' => 'Jenis layanan wajib dipilih.',
        ]);

        // 2. Database Transaction
        DB::beginTransaction();
        try {
            // Generate Nomor Request Otomatis (dikunci agar tidak bentrok saat submit bersamaan)
            $date = Carbon::now()->format('Ymd');
            $lastReq = ServiceRequest::where('nomor_request', 'like', "REQ-{$date}-%")
                ->orderBy('nomor_request', 'desc')
                ->lockForUpdate()
                ->first();
            $sequence = $lastReq ? ((int) substr($lastReq->nomor_request, -4)) + 1 : 1;
            $nomorRequest = 'REQ-' . $date . '-' . str_pad($sequence, 4, '0', STR_PAD_LEFT);

            // Insert ke tabel utama
            $serviceRequest = ServiceRequest::create([
                'nomor_request' => $nomorRequest,
                'user_id' => auth()->id(),
                'layanan' => $validated['layanan'],
                'tgl_request' => Carbon::now(),
                'lokasi' => $validated['lokasi'],
                'deskripsi' => $validated['deskripsi'] ?? null,
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

        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Gagal membuat request layanan', [
                'user_id' => auth()->id(),
                'message' => $e->getMessage(),
                'file' => $e->getFile() . ':' . $e->getLine(),
            ]);

            // Pesan teknis tetap ditampilkan selama tahap debugging;
            // ganti ke pesan umum kalau sudah production.
            return back()->withInput()->with('error', 'Gagal membuat request: ' . $e->getMessage());
        }
    }

    /**
     * Menampilkan detail satu request
     */
    public function show($id)
    {
        $req = ServiceRequest::with([
            'user.bidang',
            'detailZoom.bidang',
            'detailAkun',
            'detailPeminjaman',
            'resolution.petugas'
        ])->findOrFail($id);

        // Pelapor hanya boleh melihat request miliknya sendiri
        if (auth()->user()->isPelapor() && $req->user_id !== auth()->id()) {
            abort(403, 'Anda tidak memiliki akses ke request ini.');
        }

        // Daftar teknisi/admin untuk dropdown petugas
        $petugasList = (auth()->user()->isTeknisi() || auth()->user()->isAdmin())
            ? \App\Models\User::whereIn('role', ['teknisi', 'admin'])->orderBy('nama')->get(['id', 'nip', 'nama'])
            : collect();

        return view('requests.show', compact('req', 'petugasList'));
    }

    /**
     * Update status dan simpan data tindak lanjut service request (hanya teknisi/admin)
     */
    public function update(Request $request, $id)
    {
        if (!auth()->user()->isTeknisi() && !auth()->user()->isAdmin()) {
            abort(403, 'Anda tidak memiliki akses untuk memproses request ini.');
        }

        $req = ServiceRequest::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|in:Diproses,Selesai,Ditolak',
            'petugas_id' => 'required|exists:users,id',
            'tgl_tindak_lanjut' => 'required|date',
            'tindak_lanjut' => 'required_unless:status,Ditolak|nullable|string',
            'alasan_penolakan' => 'required_if:status,Ditolak|nullable|string',

            // Layanan Zoom (opsional/kondisional)
            'zoom_link' => 'nullable|string|max:500',
            'zoom_meeting_id' => 'nullable|string|max:100',
            'zoom_passcode' => 'nullable|string|max:100',

            // Layanan Akun (2 field sesuai request user)
            'akun_password_baru' => 'nullable|string|max:255',
            'akun_instruksi_login' => 'nullable|string',

            // Layanan Peminjaman
            'pinjam_perangkat_diserahkan' => 'nullable|string|max:255',
            'pinjam_catatan_pengembalian' => 'nullable|string',
        ], [
            'petugas_id.required' => 'Petugas penindak lanjut wajib dipilih.',
            'tgl_tindak_lanjut.required' => 'Tanggal tindak lanjut wajib diisi.',
            'tindak_lanjut.required_unless' => 'Catatan tindakan tim IT wajib diisi jika tidak ditolak.',
            'alasan_penolakan.required_if' => 'Alasan penolakan wajib diisi jika status Ditolak.',
        ]);

        DB::beginTransaction();
        try {
            // 1. Simpan atau perbarui data resolusi tindak lanjut
            $req->resolution()->updateOrCreate(
                ['request_id' => $req->id],
                [
                    'petugas_id' => $validated['petugas_id'],
                    'tgl_tindak_lanjut' => $validated['tgl_tindak_lanjut'],
                    'tindak_lanjut' => $validated['tindak_lanjut'] ?? null,
                    'alasan_penolakan' => $validated['alasan_penolakan'] ?? null,
                    'zoom_link' => $validated['zoom_link'] ?? null,
                    'zoom_meeting_id' => $validated['zoom_meeting_id'] ?? null,
                    'zoom_passcode' => $validated['zoom_passcode'] ?? null,
                    'akun_password_baru' => $validated['akun_password_baru'] ?? null,
                    'akun_instruksi_login' => $validated['akun_instruksi_login'] ?? null,
                    'pinjam_perangkat_diserahkan' => $validated['pinjam_perangkat_diserahkan'] ?? null,
                    'pinjam_catatan_pengembalian' => $validated['pinjam_catatan_pengembalian'] ?? null,
                ]
            );

            // 2. Perbarui status request
            $oldStatus = $req->status;
            $req->update(['status' => $validated['status']]);

            DB::commit();

            Log::info('Service request ditindaklanjuti', [
                'request_id' => $req->id,
                'nomor_request' => $req->nomor_request,
                'old_status' => $oldStatus,
                'new_status' => $validated['status'],
                'petugas' => auth()->user()->nama,
            ]);

            return redirect()->route('requests.show', $req->id)
                ->with('success', 'Tindak lanjut request berhasil disimpan dengan status "' . $validated['status'] . '".');

        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Gagal menyimpan tindak lanjut request', [
                'request_id' => $req->id,
                'message' => $e->getMessage(),
            ]);
            return back()->withInput()->with('error', 'Gagal menyimpan tindak lanjut: ' . $e->getMessage());
        }
    }
}