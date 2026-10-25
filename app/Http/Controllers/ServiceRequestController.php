<?php

namespace App\Http\Controllers;

use App\Models\ServiceRequest;
use App\Models\ReqDetailZoom;
use App\Models\ReqDetailAkun;
use App\Models\ReqDetailPeminjaman;
use App\Models\Bidang;
use App\Models\Lokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Notifications\NewTicketNotification;
use App\Notifications\TicketStatusUpdatedNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use App\Models\ServiceRequestChat;
use App\Events\ServiceRequestChatMessageSent;
use App\Events\ServiceRequestChatStatusChanged;
use App\Services\FonnteService;

class ServiceRequestController extends Controller
{
    /**
     * Menampilkan daftar request (index)
     */
    public function index(Request $request)
    {
        // Admin & Teknisi selalu diarahkan ke Semua Permintaan Layanan TIK
        if (auth()->user()->isTeknisi() || auth()->user()->isAdmin()) {
            return redirect()->route('requests.all', $request->query());
        }

        $query = ServiceRequest::with(['user']);

        // 'Request Saya' selalu menampilkan milik user yang sedang login
        $query->where('user_id', auth()->id());

        $validStatuses = ['Diajukan', 'Diproses', 'Selesai', 'Ditolak'];

        // Filter berdasarkan status
        if ($request->filled('status')) {
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

        return view('requests.index', [
            'requests' => $requests,
            'statuses' => $validStatuses
        ]);
    }

    /**
     * Daftar semua request (untuk teknisi/admin)
     */
    public function all(Request $request)
    {
        $query = ServiceRequest::with(['user']);

        $validStatuses = ['Diajukan', 'Diproses', 'Selesai', 'Ditolak'];
        $layananOptions = [
            'zoom'           => 'Permintaan Link Zoom Meeting',
            'reset_password' => 'Reset Password Akun Aplikasi',
            'tambah_akun'    => 'Tambah / Pembuatan Akun Baru',
            'peminjaman'     => 'Peminjaman Perangkat IT',
            'konsultasi'     => 'Konsultasi / Asistensi IT',
            'operator'       => 'Permintaan Operator Kegiatan',
            'lainnya'        => 'Lainnya',
        ];

        if ($request->filled('status')) {
            $status = $request->string('status')->toString();
            if (in_array($status, $validStatuses, true)) {
                $query->where('status', $status);
            }
        }

        if ($request->filled('layanan')) {
            $layanan = $request->string('layanan')->toString();
            if (array_key_exists($layanan, $layananOptions)) {
                $query->where('layanan', $layanan);
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

        return view('requests.all', [
            'requests' => $requests,
            'statuses' => $validStatuses,
            'layananOptions' => $layananOptions,
        ]);
    }

    /**
     * Menampilkan form create request
     */
    public function create()
    {
        $bidangs = Bidang::all();

        // 1. Ambil master lokasi urut alfabetis A-Z (independen, tanpa keterikatan bidang)
        $user = auth()->user();
        $lokasis = Lokasi::orderBy('nama_lokasi', 'asc')->pluck('nama_lokasi')->toArray();

        // Jika database belum memiliki lokasi, fallback ke daftar default
        if (empty($lokasis)) {
            $lokasis = ['Ruang Staff Tata Usaha', 'Aula BPOM', 'Ruang Rapat Utama'];
        }
        $defaultLokasi = $lokasis[0] ?? '';

        $isStaff = $user->isTeknisi() || $user->isAdmin();

        $users = $isStaff
            ? User::with('bidang')->select('id', 'nama', 'nip', 'bidang_id')->orderBy('nama')->get()
            : collect();

        return view('requests.create', compact('bidangs', 'lokasis', 'defaultLokasi', 'isStaff', 'users'));
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
            'pelapor_id' => 'nullable|exists:users,id',
            'layanan' => 'required|in:lainnya,zoom,reset_password,tambah_akun,akun,peminjaman,konsultasi,operator',
            'lokasi' => 'required|string|max:100',
            'deskripsi' => 'required_if:layanan,lainnya|nullable|string',

            // Validasi khusus Zoom
            'bidang_id' => "required_if:layanan,zoom|nullable|exists:{$bidangTable},id",
            'nama_acara' => 'required_if:layanan,zoom|nullable|string|max:255',
            'tgl_acara' => 'required_if:layanan,zoom|nullable|date',
            'jam_mulai' => 'required_if:layanan,zoom|nullable|date_format:H:i',
            'jam_selesai' => 'required_if:layanan,zoom|nullable|date_format:H:i|after:jam_mulai',
            'jenis_acara' => 'required_if:layanan,zoom|nullable|in:Rapat,Webinar,Hybrid',
            'butuh_operator' => 'required_if:layanan,zoom|nullable|in:Ya,Tidak',

            // Validasi khusus Akun (Reset Password / Tambah Akun)
            'sistem_tujuan' => 'required_if:layanan,reset_password,tambah_akun,akun|nullable|string|max:100',
            'nip_terkait' => 'required_if:layanan,reset_password,tambah_akun,akun|nullable|regex:/^[0-9]+$/|max:50',
            'email' => 'required_if:layanan,reset_password,tambah_akun|nullable|email|max:150',
            'password' => 'required_if:layanan,reset_password,tambah_akun|nullable|string|max:255',

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
            'nip_terkait.regex' => 'NIP hanya boleh berisi angka.',
            'email.email' => 'Format email tidak valid.',
        ]);

        // 2. Database Transaction
        DB::beginTransaction();
        try {
            $currentUser = auth()->user();
            $isStaff = $currentUser->isTeknisi() || $currentUser->isAdmin();

            // Tentukan user pemilik request (user_id) dan user pen-submit (reported_by)
            $targetUserId = $currentUser->id;
            $reportedById = null;

            if ($isStaff && $request->filled('pelapor_id')) {
                $inputPelaporId = (int) $request->pelapor_id;
                if ($inputPelaporId !== $currentUser->id) {
                    $targetUserId = $inputPelaporId;
                    $reportedById = $currentUser->id;
                }
            }

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
                'user_id' => $targetUserId,
                'reported_by' => $reportedById,
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
                    'tgl_acara' => $validated['tgl_acara'] ?? null,
                    'nama_acara' => $validated['nama_acara'],
                    'jam_mulai' => $validated['jam_mulai'],
                    'jam_selesai' => $validated['jam_selesai'],
                    'jenis_acara' => $validated['jenis_acara'],
                    'butuh_operator' => $validated['butuh_operator'],
                ]);
            } elseif (in_array($validated['layanan'], ['reset_password', 'tambah_akun', 'akun'])) {
                $jenisPengajuan = match($validated['layanan']) {
                    'reset_password' => 'Reset Password',
                    'tambah_akun' => 'Tambah Akun Baru',
                    default => ($request->input('jenis_pengajuan') ?? 'Reset Password'),
                };

                ReqDetailAkun::create([
                    'request_id' => $serviceRequest->id,
                    'jenis_pengajuan' => $jenisPengajuan,
                    'sistem_tujuan' => $validated['sistem_tujuan'] ?? $request->input('sistem_tujuan'),
                    'nip_terkait' => $validated['nip_terkait'] ?? $request->input('nip_terkait'),
                    'email' => $request->input('email'),
                    'password' => $request->input('password'),
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

            // Notify Admin & Teknisi
            $staffs = User::whereIn('role', ['teknisi', 'admin'])->get();
            $targetUser = User::find($targetUserId);
            $namaPelaporText = $reportedById
                ? $currentUser->nama . ' (atas nama ' . ($targetUser->nama ?? 'Pegawai lain') . ')'
                : $currentUser->nama;

            $avatar = $currentUser->foto_profil ? asset('storage/' . $currentUser->foto_profil) : asset('images/user/owner.png');
            Notification::send($staffs, new NewTicketNotification(
                'Permintaan Layanan Baru',
                $namaPelaporText . ' mengajukan permintaan layanan baru (' . $nomorRequest . ').',
                route('requests.show', $serviceRequest->id),
                $currentUser->nama,
                $avatar
            ));

            DB::commit();

            // WhatsApp Notification via Fonnte
            try {
                app(FonnteService::class)->sendNewTicketNotification($serviceRequest);
            } catch (\Throwable $e) {
                Log::warning('Fonnte sendNewTicketNotification error: ' . $e->getMessage());
            }

            $targetRoute = (auth()->user()->isTeknisi() || auth()->user()->isAdmin()) ? 'requests.all' : 'requests.index';
            return redirect()->route($targetRoute)
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
     * Tampilkan form edit request
     */
    public function edit(ServiceRequest $req)
    {
        $user = auth()->user();

        if (!$user->isTeknisi() && !$user->isAdmin()) {
            if ($req->user_id !== $user->id) {
                abort(403, 'Anda tidak memiliki akses untuk mengedit request ini.');
            }
            if ($req->status !== 'Diajukan') {
                return redirect()->route('requests.show', $req->id)
                                 ->with('error', 'Maaf, request sudah diproses dan tidak dapat diubah lagi.');
            }
        }

        $bidangs = \App\Models\Bidang::all();
        $lokasis = Lokasi::orderBy('nama_lokasi', 'asc')->pluck('nama_lokasi')->toArray();
        if (empty($lokasis)) {
            $lokasis = ['Ruang Staff Tata Usaha', 'Aula BPOM', 'Ruang Rapat Utama'];
        }
        return view('requests.edit', compact('req', 'bidangs', 'lokasis'));
    }

    /**
     * Proses update data request (oleh admin)
     */
    public function updateData(Request $request, ServiceRequest $req)
    {
        $user = auth()->user();

        if (!$user->isTeknisi() && !$user->isAdmin()) {
            if ($req->user_id !== $user->id) {
                abort(403, 'Anda tidak memiliki akses untuk mengedit request ini.');
            }
            if ($req->status !== 'Diajukan') {
                return redirect()->route('requests.show', $req->id)
                                 ->with('error', 'Maaf, request sudah diproses dan tidak dapat diubah lagi.');
            }
        }

        $validated = $request->validate([
            'layanan' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        DB::beginTransaction();
        try {
            // Update tabel utama
            $req->update($validated);

            // Update tabel relasi sesuai jenis layanan
            if ($validated['layanan'] === 'zoom') {
                $zoomData = $request->validate([
                    'nama_acara' => 'required|string|max:255',
                    'tgl_acara' => 'required|date',
                    'bidang_id' => 'required|exists:bidang,id',
                    'jenis_acara' => 'required|string',
                    'jam_mulai' => 'required',
                    'jam_selesai' => 'required',
                    'butuh_operator' => 'required|string',
                ]);
                if ($req->detailZoom) {
                    $req->detailZoom->update($zoomData);
                } else {
                    $req->detailZoom()->create($zoomData);
                }
            } elseif (in_array($validated['layanan'], ['reset_password', 'tambah_akun', 'akun'])) {
                $akunData = $request->validate([
                    'sistem_tujuan' => 'required|string|max:100',
                    'nip_terkait' => 'required|regex:/^[0-9]+$/|max:50',
                    'email' => 'nullable|email|max:150',
                    'password' => 'nullable|string|max:255',
                ], [
                    'nip_terkait.regex' => 'NIP hanya boleh berisi angka.',
                    'email.email' => 'Format email tidak valid.',
                ]);

                $akunData['jenis_pengajuan'] = match($validated['layanan']) {
                    'reset_password' => 'Reset Password',
                    'tambah_akun' => 'Tambah Akun Baru',
                    default => ($request->input('jenis_pengajuan') ?? 'Reset Password'),
                };

                if ($req->detailAkun) {
                    $req->detailAkun->update($akunData);
                } else {
                    $req->detailAkun()->create($akunData);
                }
            } elseif ($validated['layanan'] === 'peminjaman') {
                $pinjamData = $request->validate([
                    'jenis_perangkat' => 'required|string',
                    'tgl_mulai' => 'required|date',
                    'tgl_kembali' => 'required|date|after_or_equal:tgl_mulai',
                    'keperluan' => 'required|string',
                    'lokasi_penggunaan' => 'nullable|string',
                ]);
                if ($req->detailPeminjaman) {
                    $req->detailPeminjaman->update($pinjamData);
                } else {
                    $req->detailPeminjaman()->create($pinjamData);
                }
            }

            DB::commit();
            return redirect()->route('requests.show', $req->id)->with('success', 'Data request berhasil diperbarui.');
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Gagal update request', ['request_id' => $req->id, 'message' => $e->getMessage()]);
            return back()->withInput()->with('error', 'Gagal memperbarui request: ' . $e->getMessage());
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
            'resolution.petugas',
            'chats.user.bidang',
            'closedByUser'
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
     * Ambil (take) permintaan layanan untuk ditangani langsung oleh staf IT / teknisi yang login.
     */
    public function take($id)
    {
        if (!auth()->user()->isTeknisi() && !auth()->user()->isAdmin()) {
            abort(403);
        }

        $req = ServiceRequest::findOrFail($id);

        if ($req->status !== 'Diajukan' || !empty($req->resolution?->petugas_id)) {
            return redirect()->route('requests.show', $req->id)
                ->with('error', 'Permintaan layanan ini sudah diambil atau sedang diproses oleh petugas lain.');
        }

        DB::beginTransaction();
        try {
            $req->update(['status' => 'Diproses']);

            $req->resolution()->updateOrCreate(
                ['request_id' => $req->id],
                [
                    'petugas_id' => auth()->id(),
                    'tgl_tindak_lanjut' => Carbon::now(),
                ]
            );

            DB::commit();

            return redirect()->route('requests.show', $req->id)
                ->with('success', 'Permintaan layanan berhasil diambil. Anda ditugaskan sebagai petugas penindak lanjut.');

        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Gagal mengambil permintaan layanan', ['request_id' => $req->id, 'message' => $e->getMessage()]);
            return redirect()->route('requests.show', $req->id)
                ->with('error', 'Gagal mengambil permintaan layanan: ' . $e->getMessage());
        }
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
        $res = $req->resolution;

        if ($res && !empty($res->petugas_id) && $res->petugas_id !== auth()->id()) {
            abort(403, 'Permintaan layanan ini sedang ditangani oleh petugas lain.');
        }

        $validated = $request->validate([
            'status' => 'required|in:Diproses,Selesai,Ditolak',
            'petugas_id' => 'nullable|exists:users,id',
            'tgl_tindak_lanjut' => 'required|date',
            'tindak_lanjut' => 'required_unless:status,Ditolak|nullable|string',
            'alasan_penolakan' => 'required_if:status,Ditolak|nullable|string',

            // Layanan Zoom (opsional/kondisional)
            'zoom_link' => 'nullable|string|max:500',
            'zoom_meeting_id' => 'nullable|string|regex:/^[0-9\s-]+$/|max:50',
            'zoom_passcode' => 'nullable|string|max:100',
        ], [
            'tgl_tindak_lanjut.required' => 'Tanggal tindak lanjut wajib diisi.',
            'tindak_lanjut.required_unless' => 'Catatan tindakan tim IT wajib diisi jika tidak ditolak.',
            'alasan_penolakan.required_if' => 'Alasan penolakan wajib diisi jika status Ditolak.',
            'zoom_meeting_id.regex' => 'Meeting ID Zoom hanya boleh berisi angka, spasi, atau tanda strip (-).',
        ]);

        DB::beginTransaction();
        try {
            // 1. Simpan atau perbarui data resolusi tindak lanjut (petugas terkunci permanen)
            $req->resolution()->updateOrCreate(
                ['request_id' => $req->id],
                [
                    'petugas_id' => $res?->petugas_id ?? auth()->id(),
                    'tgl_tindak_lanjut' => $validated['tgl_tindak_lanjut'],
                    'tindak_lanjut' => $validated['tindak_lanjut'] ?? null,
                    'alasan_penolakan' => $validated['alasan_penolakan'] ?? null,
                    'zoom_link' => $validated['zoom_link'] ?? null,
                    'zoom_meeting_id' => $validated['zoom_meeting_id'] ?? null,
                    'zoom_passcode' => $validated['zoom_passcode'] ?? null,
                ]
            );

            // 2. Perbarui status request & timestamp penyelesaian
            $oldStatus = $req->status;
            $statusUpdateData = ['status' => $validated['status']];
            if ($validated['status'] === 'Selesai' && !$req->completed_at) {
                $statusUpdateData['completed_at'] = now();
            } elseif ($validated['status'] !== 'Selesai') {
                $statusUpdateData['completed_at'] = null;
                $statusUpdateData['is_chat_closed'] = false;
            }
            $req->update($statusUpdateData);

            // Notify Pelapor
            if ($oldStatus !== $validated['status'] && $req->user) {
                $avatar = auth()->user()->foto_profil ? asset('storage/' . auth()->user()->foto_profil) : asset('images/user/owner.png');
                $req->user->notify(new TicketStatusUpdatedNotification(
                    'Status Request Diperbarui',
                    'Request Anda (' . $req->nomor_request . ') kini berstatus: ' . $validated['status'],
                    route('requests.show', $req->id),
                    auth()->user()->nama,
                    $avatar
                ));
            }

            DB::commit();

            // WhatsApp Notification via Fonnte saat request diselesaikan
            if ($validated['status'] === 'Selesai') {
                try {
                    app(FonnteService::class)->sendTicketCompletedNotification($req);
                } catch (\Throwable $e) {
                    Log::warning('Fonnte sendTicketCompletedNotification error: ' . $e->getMessage());
                }
            }

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

    /**
     * Halaman edit tindak lanjut untuk Service Request.
     */
    public function editResolution(ServiceRequest $req)
    {
        if (!auth()->user()->isTeknisi() && !auth()->user()->isAdmin()) {
            abort(403);
        }

        if ($req->resolution?->petugas_id && $req->resolution->petugas_id !== auth()->id()) {
            abort(403, 'Hanya petugas yang menangani request ini yang dapat merevisi tindak lanjut.');
        }

        if ($req->status !== 'Selesai') {
            return redirect()->route('requests.show', $req->id)
                ->with('error', 'Hanya request dengan status Selesai yang tindak lanjutnya dapat diedit melalui rute ini.');
        }

        $req->load(['user.bidang', 'detailZoom.bidang', 'detailAkun', 'detailPeminjaman', 'resolution.petugas']);

        $petugasList = User::whereIn('role', ['teknisi', 'admin'])->orderBy('nama')->get(['id', 'nip', 'nama']);

        return view('requests.edit-resolution', compact('req', 'petugasList'));
    }

    /**
     * Proses update data resolusi (tindak lanjut) Service Request.
     */
    public function updateResolution(Request $request, ServiceRequest $req)
    {
        if (!auth()->user()->isTeknisi() && !auth()->user()->isAdmin()) {
            abort(403);
        }

        if ($req->resolution?->petugas_id && $req->resolution->petugas_id !== auth()->id()) {
            abort(403, 'Hanya petugas yang menangani request ini yang dapat merevisi tindak lanjut.');
        }

        if ($req->status !== 'Selesai') {
            return redirect()->route('requests.show', $req->id)
                ->with('error', 'Tindak lanjut hanya dapat diedit saat status Selesai.');
        }

        $validated = $request->validate([
            'petugas_id' => 'nullable|exists:users,id',
            'tgl_tindak_lanjut' => 'required|date',
            'tindak_lanjut' => 'required|string',

            // Layanan Zoom
            'zoom_link' => 'nullable|string|max:500',
            'zoom_meeting_id' => 'nullable|string|regex:/^[0-9\s-]+$/|max:50',
            'zoom_passcode' => 'nullable|string|max:100',
        ], [
            'zoom_meeting_id.regex' => 'Meeting ID Zoom hanya boleh berisi angka, spasi, atau tanda strip (-).',
        ]);

        DB::beginTransaction();
        try {
            $req->resolution()->updateOrCreate(
                ['request_id' => $req->id],
                [
                    'petugas_id' => $req->resolution?->petugas_id ?? auth()->id(),
                    'tgl_tindak_lanjut' => $validated['tgl_tindak_lanjut'],
                    'tindak_lanjut' => $validated['tindak_lanjut'],
                    'zoom_link' => $validated['zoom_link'] ?? null,
                    'zoom_meeting_id' => $validated['zoom_meeting_id'] ?? null,
                    'zoom_passcode' => $validated['zoom_passcode'] ?? null,
                ]
            );

            DB::commit();
            return redirect()->route('requests.show', $req->id)
                ->with('success', 'Catatan tindak lanjut berhasil direvisi.');

        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Gagal merevisi tindak lanjut request', ['request_id' => $req->id, 'message' => $e->getMessage()]);
            return back()->withInput()->with('error', 'Gagal merevisi tindak lanjut: ' . $e->getMessage());
        }
    }

    /**
     * Menyimpan pesan chat / diskusi tiket request
     */
    public function storeChat(Request $request, $id)
    {
        $req = ServiceRequest::findOrFail($id);
        $user = auth()->user();

        // Otorisasi: hanya pelapor request ini atau staf IT (teknisi/admin) yang boleh chat
        if ($user->isPelapor() && $req->user_id !== $user->id) {
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json(['success' => false, 'message' => 'Anda tidak berhak mengirim pesan pada request ini.'], 403);
            }
            abort(403, 'Anda tidak berhak mengirim pesan pada request ini.');
        }

        // Fitur chat hanya aktif jika status tiket sudah Selesai
        if ($req->status !== 'Selesai') {
            $statusMsg = 'Fitur diskusi hanya tersedia untuk permohonan layanan yang telah berstatus Selesai.';
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json(['success' => false, 'message' => $statusMsg], 403);
            }
            return back()->with('error', $statusMsg);
        }

        // Cek apakah sesi chat masih aktif
        if (!$req->isChatActive()) {
            $reason = $req->is_chat_closed 
                ? 'Sesi diskusi telah dihentikan oleh operator.' 
                : 'Sesi diskusi telah berakhir (maksimal 2 hari setelah status tiket selesai).';
            
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json(['success' => false, 'message' => $reason], 403);
            }
            return back()->with('error', $reason);
        }

        $validated = $request->validate([
            'pesan' => 'required|string|max:2000',
        ], [
            'pesan.required' => 'Pesan tidak boleh kosong.',
            'pesan.max' => 'Pesan maksimal 2000 karakter.',
        ]);

        DB::beginTransaction();
        try {
            // 1. Simpan pesan chat
            $chat = ServiceRequestChat::create([
                'request_id' => $req->id,
                'user_id' => $user->id,
                'pesan' => trim($validated['pesan']),
                'is_system' => false,
            ]);

            // Status tiket tetap 'Selesai' (chat murni pendampingan/asistensi pasca penyelesaian)
            $wasReopened = false;
            $sysChat = null;

            DB::commit();

            // Load user data untuk payload event
            $chat->load('user');

            // Broadcast via WebSocket Reverb (dibungkus try-catch agar jika server Reverb belum aktif, chat tetap tersimpan di DB)
            try {
                broadcast(new ServiceRequestChatMessageSent(
                    $chat, 
                    false, 
                    null
                ))->toOthers();
            } catch (\Throwable $bErr) {
                Log::warning('WebSocket broadcast failed (Reverb offline?): ' . $bErr->getMessage());
            }

            $msg = 'Pesan berhasil dikirim ke ruang diskusi.';

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => $msg,
                    'chat' => [
                        'id' => $chat->id,
                        'pesan' => $chat->pesan,
                        'user_id' => $user->id,
                        'user_nama' => $user->nama,
                        'user_avatar' => $user->foto_profil ? asset('storage/' . $user->foto_profil) : null,
                        'is_staff' => $user->isTeknisi() || $user->isAdmin(),
                        'is_me' => true,
                        'created_time' => $chat->created_at?->format('H:i') ?? now()->format('H:i'),
                        'created_datetime' => $chat->created_at?->format('H:i, d M') ?? now()->format('H:i, d M'),
                    ],
                    'sys_chat' => null,
                    'was_reopened' => false,
                ]);
            }

            return redirect()->to(route('requests.show', $req->id) . '#diskusi')
                             ->with('success', $msg);

        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Gagal mengirim pesan chat request', ['request_id' => $req->id, 'message' => $e->getMessage()]);

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json(['success' => false, 'message' => 'Gagal mengirim pesan: ' . $e->getMessage()], 500);
            }
            return back()->with('error', 'Gagal mengirim pesan: ' . $e->getMessage());
        }
    }

    /**
     * Mengunci atau membuka kembali sesi chat oleh operator (teknisi/admin)
     */
    public function toggleChatStatus(Request $request, $id)
    {
        $user = auth()->user();
        if (!$user->isTeknisi() && !$user->isAdmin()) {
            abort(403, 'Hanya tim IT (teknisi/admin) yang dapat mengubah status sesi diskusi.');
        }

        $req = ServiceRequest::findOrFail($id);

        if ($req->status !== 'Selesai') {
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json(['success' => false, 'message' => 'Pengaturan sesi diskusi hanya dapat dilakukan untuk permohonan berstatus Selesai.'], 422);
            }
            return back()->with('error', 'Pengaturan sesi diskusi hanya dapat dilakukan untuk permohonan berstatus Selesai.');
        }

        $newClosedState = !$req->is_chat_closed;

        DB::beginTransaction();
        try {
            if ($newClosedState) {
                // Kunci chat
                $req->update([
                    'is_chat_closed' => true,
                    'chat_closed_at' => now(),
                    'chat_closed_by' => $user->id,
                ]);

                $sysNotice = 'Sesi diskusi telah dihentikan/dikunci oleh Operator (' . $user->nama . ').';
            } else {
                // Buka kembali chat
                $updateData = [
                    'is_chat_closed' => false,
                    'chat_closed_at' => null,
                    'chat_closed_by' => null,
                ];
                // Jika sebelumnya kadaluwarsa karena tiket Selesai > 2 hari, reset timer
                if ($req->isChatExpired()) {
                    $updateData['completed_at'] = now();
                }
                $req->update($updateData);

                $sysNotice = 'Sesi diskusi telah dibuka kembali oleh Operator (' . $user->nama . ').';
            }

            $sysChat = ServiceRequestChat::create([
                'request_id' => $req->id,
                'user_id' => null,
                'pesan' => $sysNotice,
                'is_system' => true,
            ]);

            DB::commit();

            // Broadcast status change & system message
            try {
                broadcast(new ServiceRequestChatStatusChanged(
                    $req->id,
                    $req->is_chat_closed,
                    $req->isChatActive(),
                    $user->nama,
                    $sysNotice
                ));

                broadcast(new ServiceRequestChatMessageSent($sysChat));
            } catch (\Throwable $bErr) {
                Log::warning('WebSocket broadcast failed (Reverb offline?): ' . $bErr->getMessage());
            }

            $msg = $newClosedState 
                ? 'Sesi diskusi berhasil dihentikan.' 
                : 'Sesi diskusi berhasil dibuka kembali.';

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => $msg,
                    'is_chat_closed' => $req->is_chat_closed,
                    'is_chat_active' => $req->isChatActive(),
                    'sys_chat' => [
                        'id' => $sysChat->id,
                        'pesan' => $sysChat->pesan,
                        'created_time' => $sysChat->created_at?->format('H:i') ?? now()->format('H:i'),
                    ]
                ]);
            }

            return redirect()->to(route('requests.show', $req->id) . '#diskusi')->with('success', $msg);

        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Gagal mengubah status chat request', ['request_id' => $req->id, 'message' => $e->getMessage()]);

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json(['success' => false, 'message' => 'Gagal mengubah status sesi: ' . $e->getMessage()], 500);
            }
            return back()->with('error', 'Gagal mengubah status sesi: ' . $e->getMessage());
        }
    }

    /**
     * Konfirmasi penerimaan layanan selesai oleh Pelapor / Pembuat request.
     */
    public function confirmCompleted(ServiceRequest $req)
    {
        $userId = auth()->id();

        // Hanya pelapor atau yang membuat request atas nama yang boleh mengonfirmasi
        if ($req->user_id !== $userId && $req->reported_by !== $userId && !auth()->user()->isAdmin()) {
            abort(403, 'Hanya pemohon layanan yang dapat mengonfirmasi penyelesaian.');
        }

        if ($req->status !== 'Selesai') {
            return back()->with('error', 'Konfirmasi penyelesaian hanya dapat dilakukan jika permohonan berstatus Selesai.');
        }

        try {
            $req->update([
                'konfirmasi_selesai_at' => now(),
            ]);

            return redirect()->route('requests.show', $req->id)
                             ->with('success', 'Terima kasih! Anda telah berhasil mengonfirmasi bahwa layanan TI telah selesai dan diterima dengan baik.');
        } catch (\Throwable $e) {
            Log::error('Gagal konfirmasi selesai request', ['request_id' => $req->id, 'message' => $e->getMessage()]);
            return back()->with('error', 'Gagal memproses konfirmasi: ' . $e->getMessage());
        }
    }

    /**
     * Hapus request (soft delete)
     */
    public function destroy($id)
    {
        if (!auth()->user()->isTeknisi() && !auth()->user()->isAdmin()) {
            abort(403);
        }

        DB::beginTransaction();
        try {
            $req = ServiceRequest::findOrFail($id);
            $req->delete();
            
            DB::commit();
            return redirect()->route('requests.all')
                             ->with('success', 'Request ' . $req->nomor_request . ' berhasil dihapus.');

        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Gagal menghapus request', ['request_id' => $id, 'message' => $e->getMessage()]);
            return back()->with('error', 'Gagal menghapus request: ' . $e->getMessage());
        }
    }
}