<?php

use App\Models\Bidang;
use App\Models\ServiceRequest;
use App\Models\Ticket;
use App\Models\TicketResolution;
use App\Models\User;
use App\Services\FonnteService;
use App\Support\DocumentNumberGenerator;
use Carbon\Carbon;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Schema;

beforeEach(function () {
    if (DB::getDriverName() !== 'sqlite') {
        $this->markTestSkipped('Requires SQLite in-memory database.');
    }

    Schema::dropAllTables();

    Schema::create('bidang', function (Blueprint $table) {
        $table->id();
        $table->string('nama_bidang', 100);
    });

    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('nip', 30)->unique();
        $table->string('nama', 150);
        $table->string('email', 150)->unique();
        $table->string('password');
        $table->string('tempat_lahir', 100)->default('Banjarbaru');
        $table->date('tanggal_lahir')->default('1990-01-01');
        $table->string('jenkel', 1)->default('L');
        $table->string('status_kepegawaian', 30)->default('PNS');
        $table->string('status_pernikahan', 30)->default('Menikah');
        $table->string('no_telp', 20)->default('08123456789');
        $table->text('alamat')->default('Banjarbaru');
        $table->foreignId('bidang_id')->nullable();
        $table->string('role', 20)->default('pelapor');
        $table->string('foto_profil')->nullable();
        $table->timestamps();
    });

    Schema::create('assets', function (Blueprint $table) {
        $table->id();
        $table->string('kode_barang', 50);
        $table->string('nama_barang', 150);
        $table->string('nup', 50);
        $table->string('jenis_barang', 100)->nullable();
        $table->string('lokasi', 150)->nullable();
        $table->foreignId('penanggung_jawab_id')->nullable();
    });

    Schema::create('tickets', function (Blueprint $table) {
        $table->id();
        $table->string('nomor_aduan', 50)->unique();
        $table->string('jenis_kendala', 50)->default('lainnya');
        $table->foreignId('asset_id')->nullable();
        $table->foreignId('pelapor_id');
        $table->foreignId('reported_by')->nullable();
        $table->date('tgl_pelaporan');
        $table->text('deskripsi_masalah');
        $table->string('foto_kendala')->nullable();
        $table->string('status', 50)->default('Belum diperiksa');
        $table->timestamp('completed_at')->nullable();
        $table->timestamp('konfirmasi_selesai_at')->nullable();
        $table->boolean('is_konfirmasi_otomatis')->default(false);
        $table->timestamp('created_at')->nullable();
        $table->softDeletes();
    });

    Schema::create('ticket_histories', function (Blueprint $table) {
        $table->id();
        $table->foreignId('ticket_id');
        $table->string('status_label', 100);
        $table->text('keterangan')->nullable();
        $table->timestamp('created_at')->nullable();
    });

    Schema::create('ticket_resolutions', function (Blueprint $table) {
        $table->id();
        $table->foreignId('ticket_id')->unique();
        $table->foreignId('pemeriksa_id')->nullable();
        $table->string('jenis_penyelesaian', 50)->default('mandiri');
        $table->date('tgl_analisa')->nullable();
        $table->text('analisa_teknis')->nullable();
        $table->date('tgl_tindak_lanjut')->nullable();
        $table->text('tindak_lanjut_teknis')->nullable();
        $table->date('tgl_hasil')->nullable();
        $table->text('hasil')->nullable();
        $table->string('file_surat_justifikasi')->nullable();
    });

    Schema::create('service_requests', function (Blueprint $table) {
        $table->id();
        $table->string('nomor_request', 50)->unique();
        $table->foreignId('user_id');
        $table->foreignId('reported_by')->nullable();
        $table->string('layanan', 100);
        $table->date('tgl_request');
        $table->text('deskripsi')->nullable();
        $table->string('status', 50)->default('Diajukan');
        $table->timestamp('completed_at')->nullable();
        $table->timestamp('konfirmasi_selesai_at')->nullable();
        $table->boolean('is_konfirmasi_otomatis')->default(false);
        $table->boolean('is_chat_closed')->default(false);
        $table->timestamp('chat_closed_at')->nullable();
        $table->foreignId('chat_closed_by')->nullable();
        $table->timestamp('created_at')->nullable();
    });

    Schema::create('notifications', function (Blueprint $table) {
        $table->uuid('id')->primary();
        $table->string('type');
        $table->morphs('notifiable');
        $table->text('data');
        $table->timestamp('read_at')->nullable();
        $table->timestamps();
    });

    $this->mock(FonnteService::class, function ($mock) {
        $mock->shouldReceive('sendNewTicketNotification')->andReturnNull();
    });
    Notification::fake();
});

afterEach(function () {
    Carbon::setTestNow();
});

test('document number generator starts at 001 ignoring legacy formats, continues across months, and resets yearly', function () {
    $bidang = Bidang::create(['nama_bidang' => 'Tata Usaha']);
    $user = User::create([
        'nip' => '199001012020011001',
        'nama' => 'Pelapor Uji',
        'email' => 'pelapor@bpom.test',
        'password' => 'password',
        'bidang_id' => $bidang->id,
        'role' => 'pelapor',
    ]);

    // Data lama tidak boleh memengaruhi antrian format baru
    Ticket::create([
        'nomor_aduan' => 'TIK-20261101-0114',
        'jenis_kendala' => 'lainnya',
        'pelapor_id' => $user->id,
        'tgl_pelaporan' => '2026-11-01',
        'deskripsi_masalah' => 'Data lama',
        'status' => 'Selesai',
    ]);

    $first = DocumentNumberGenerator::generateYearly(
        Ticket::withTrashed(),
        'nomor_aduan',
        'SPTIK',
        Carbon::create(2026, 6, 15)
    );
    expect($first)->toBe('001/SPTIK/BBPOM/06/2026');

    $ticket1 = Ticket::create([
        'nomor_aduan' => '014/SPTIK/BBPOM/06/2026',
        'jenis_kendala' => 'lainnya',
        'pelapor_id' => $user->id,
        'tgl_pelaporan' => '2026-06-15',
        'deskripsi_masalah' => 'Kendala ke-14',
        'status' => 'Belum diperiksa',
    ]);

    // Soft-delete tidak boleh membuat nomor terpakai ulang
    $ticket1->delete();

    // Lintas bulan (Juni -> Desember) dalam tahun yang sama tetap melanjutkan ke 015
    $fifteenth = DocumentNumberGenerator::generateYearly(
        Ticket::withTrashed(),
        'nomor_aduan',
        'SPTIK',
        Carbon::create(2026, 12, 1)
    );
    expect($fifteenth)->toBe('015/SPTIK/BBPOM/12/2026');

    // Antrian >= 1000 tetap akurat (tidak kalah alfabetis dari 999)
    Ticket::create([
        'nomor_aduan' => '999/SPTIK/BBPOM/12/2026',
        'jenis_kendala' => 'lainnya',
        'pelapor_id' => $user->id,
        'tgl_pelaporan' => '2026-12-20',
        'deskripsi_masalah' => 'Kendala 999',
        'status' => 'Belum diperiksa',
    ]);
    expect(DocumentNumberGenerator::generateYearly(
        Ticket::withTrashed(),
        'nomor_aduan',
        'SPTIK',
        Carbon::create(2026, 12, 21)
    ))->toBe('1000/SPTIK/BBPOM/12/2026');

    Ticket::create([
        'nomor_aduan' => '1000/SPTIK/BBPOM/12/2026',
        'jenis_kendala' => 'lainnya',
        'pelapor_id' => $user->id,
        'tgl_pelaporan' => '2026-12-21',
        'deskripsi_masalah' => 'Kendala 1000',
        'status' => 'Belum diperiksa',
    ]);
    expect(DocumentNumberGenerator::generateYearly(
        Ticket::withTrashed(),
        'nomor_aduan',
        'SPTIK',
        Carbon::create(2026, 12, 22)
    ))->toBe('1001/SPTIK/BBPOM/12/2026');

    // Berganti tahun -> reset menjadi 001
    $nextYear = DocumentNumberGenerator::generateYearly(
        Ticket::withTrashed(),
        'nomor_aduan',
        'SPTIK',
        Carbon::create(2027, 1, 2)
    );
    expect($nextYear)->toBe('001/SPTIK/BBPOM/01/2027');
});

test('incident and service request controllers generate independent yearly numbers via http endpoints', function () {
    $bidang = Bidang::create(['nama_bidang' => 'Pengujian']);
    $pelapor = User::create([
        'nip' => '199102022020011002',
        'nama' => 'Pegawai Pemohon',
        'email' => 'pegawai@bpom.test',
        'password' => 'password',
        'bidang_id' => $bidang->id,
        'role' => 'pelapor',
    ]);

    Carbon::setTestNow(Carbon::create(2026, 11, 11, 9, 0, 0));

    $this->actingAs($pelapor)->post('/incidents', [
        'jenis_kendala' => 'lainnya',
        'deskripsi_masalah' => 'Koneksi VPN bermasalah saat membuka aplikasi internal',
    ])->assertRedirect(route('incidents.index'));

    $this->actingAs($pelapor)->post('/requests', [
        'layanan' => 'konsultasi',
        'deskripsi' => 'Konsultasi integrasi aplikasi pelaporan',
    ])->assertRedirect(route('requests.index'));

    expect(Ticket::first()->nomor_aduan)->toBe('001/SPTIK/BBPOM/11/2026');
    expect(ServiceRequest::first()->nomor_request)->toBe('001/PLTIK/BBPOM/11/2026');

    // Pergantian tahun 2027 mereset kedua antrian ke 001
    Carbon::setTestNow(Carbon::create(2027, 1, 5, 10, 0, 0));

    $this->actingAs($pelapor)->post('/incidents', [
        'jenis_kendala' => 'lainnya',
        'deskripsi_masalah' => 'Aduan pertama di tahun 2027',
    ])->assertRedirect(route('incidents.index'));

    $this->actingAs($pelapor)->post('/requests', [
        'layanan' => 'konsultasi',
        'deskripsi' => 'Permintaan pertama di tahun 2027',
    ])->assertRedirect(route('requests.index'));

    expect(Ticket::latest('id')->first()->nomor_aduan)->toBe('001/SPTIK/BBPOM/01/2027');
    expect(ServiceRequest::latest('id')->first()->nomor_request)->toBe('001/PLTIK/BBPOM/01/2027');
});

test('pdf surat perbaikan streams cleanly with sanitized filename and updated nomor formulir', function () {
    $bidang = Bidang::create(['nama_bidang' => 'Tata Usaha']);
    $pelapor = User::create([
        'nip' => '199203032020011003',
        'nama' => 'Budi Santoso',
        'email' => 'budi@bpom.test',
        'password' => 'password',
        'bidang_id' => $bidang->id,
        'role' => 'pelapor',
    ]);
    $teknisi = User::create([
        'nip' => '198804042015011004',
        'nama' => 'Teknisi TI',
        'email' => 'teknisi@bpom.test',
        'password' => 'password',
        'bidang_id' => $bidang->id,
        'role' => 'admin',
    ]);

    $ticket = Ticket::create([
        'nomor_aduan' => '015/SPTIK/BBPOM/06/2026',
        'jenis_kendala' => 'lainnya',
        'pelapor_id' => $pelapor->id,
        'tgl_pelaporan' => '2026-06-15',
        'deskripsi_masalah' => 'Printer jaringan mati total',
        'status' => 'Sedang diproses',
    ]);

    TicketResolution::create([
        'ticket_id' => $ticket->id,
        'pemeriksa_id' => $teknisi->id,
        'jenis_penyelesaian' => 'Pihak ke-3',
        'tgl_analisa' => '2026-06-16',
        'analisa_teknis' => 'Mainboard rusak',
        'tgl_tindak_lanjut' => '2026-06-16',
        'tindak_lanjut_teknis' => 'Perbaikan vendor resmi',
    ]);

    // Verifikasi HTML lembar cetak memiliki Nomor Formulir terbaru dan nomor aduan baru
    $html = view('pdf.surat-perbaikan-bmn', [
        'ticket' => $ticket->load(['pelapor.bidang', 'asset.penanggungJawab', 'resolution.pemeriksa']),
        'kabag' => (object) ['nama' => 'Kepala TU', 'nip' => '19750101'],
        'pemeriksa' => $teknisi,
    ])->render();

    expect($html)
        ->toContain('Nomor Formulir: POM-14.01/CFM.01/SOP.01/IK.43B.01.F.01')
        ->toContain('No. 015/SPTIK/BBPOM/06/2026')
        ->not->toContain('IK.17A');

    // Verifikasi streaming PDF lewat HTTP tidak crash akibat karakter '/' pada nomor_aduan
    $response = $this->actingAs($teknisi)->get(route('incidents.justifikasi', $ticket));

    $response->assertStatus(200)
        ->assertHeader('Content-Type', 'application/pdf');

    expect($response->headers->get('Content-Disposition'))
        ->toContain('surat-perbaikan-015-SPTIK-BBPOM-06-2026.pdf');
});
