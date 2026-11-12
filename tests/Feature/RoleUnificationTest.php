<?php

use App\Models\Asset;
use App\Models\Bidang;
use App\Models\ServiceRequest;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

beforeEach(function () {
    if (DB::getDriverName() === 'sqlite') {
        $pdo = DB::connection()->getPdo();
        $pdo->sqliteCreateFunction('DATE_FORMAT', function (?string $date, string $format): ?string {
            if ($date === null) {
                return null;
            }
            $phpFormat = str_replace(['%Y', '%m', '%d'], ['Y', 'm', 'd'], $format);
            return date($phpFormat, strtotime($date));
        }, 2);

        $tables = [
            'notifications',
            'settings',
            'lokasis',
            'req_detail_peminjaman',
            'req_detail_akun',
            'req_detail_zoom',
            'service_request_resolutions',
            'service_requests',
            'ticket_histories',
            'ticket_resolutions',
            'tickets',
            'assets',
            'users',
            'panggol',
            'jabatan',
            'bidang',
            'cache',
        ];

        foreach ($tables as $table) {
            Schema::dropIfExists($table);
        }

        Schema::create('cache', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->text('value');
            $table->integer('expiration');
        });

        Schema::create('bidang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bidang', 100);
        });

        Schema::create('jabatan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jabatan', 150);
        });

        Schema::create('panggol', function (Blueprint $table) {
            $table->id();
            $table->string('pangkat', 100);
            $table->string('golongan', 20);
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 30)->unique();
            $table->string('nama', 150);
            $table->string('email', 150)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('foto_profil')->nullable();
            $table->rememberToken();
            $table->string('tempat_lahir', 100)->default('-');
            $table->date('tanggal_lahir')->default('1990-01-01');
            $table->string('jenkel', 1)->default('L');
            $table->string('status_kepegawaian', 30)->default('PNS');
            $table->string('status_pernikahan', 30)->default('Belum Menikah');
            $table->string('no_telp', 20)->default('081200000000');
            $table->text('alamat')->default('-');
            $table->string('jabatan_fungsional', 150)->nullable();
            $table->unsignedBigInteger('bidang_id')->nullable();
            $table->unsignedBigInteger('jabatan_id')->nullable();
            $table->unsignedBigInteger('panggol_id')->nullable();
            $table->string('role', 20)->default('pelapor');
            $table->timestamps();
        });

        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang', 50);
            $table->string('nama_barang', 150);
            $table->string('merk_type', 100)->nullable();
            $table->string('nup', 50);
            $table->date('tgl_terima')->nullable();
            $table->string('jenis_barang', 100)->nullable();
            $table->string('satuan', 30)->default('buah');
            $table->string('lokasi', 150)->nullable();
            $table->unsignedBigInteger('penanggung_jawab_id')->nullable();
            $table->string('status_kondisi', 20)->default('Baik');
            $table->text('spesifikasi')->nullable();
            $table->string('foto_barang', 255)->nullable();
        });

        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_aduan', 50)->unique();
            $table->string('jenis_kendala', 20)->default('aset');
            $table->unsignedBigInteger('asset_id')->nullable();
            $table->unsignedBigInteger('pelapor_id');
            $table->unsignedBigInteger('reported_by')->nullable();
            $table->date('tgl_pelaporan');
            $table->text('deskripsi_masalah');
            $table->string('foto_kendala', 255)->nullable();
            $table->string('status', 30)->default('Belum diperiksa');
            $table->timestamp('completed_at')->nullable();
            $table->timestamp('konfirmasi_selesai_at')->nullable();
            $table->boolean('is_konfirmasi_otomatis')->default(false);
            $table->timestamp('created_at')->nullable();
            $table->softDeletes();
        });

        Schema::create('ticket_resolutions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ticket_id')->unique();
            $table->unsignedBigInteger('pemeriksa_id')->nullable();
            $table->string('jenis_penyelesaian', 50)->default('mandiri');
            $table->date('tgl_analisa')->nullable();
            $table->text('analisa_teknis')->nullable();
            $table->date('tgl_tindak_lanjut')->nullable();
            $table->text('tindak_lanjut_teknis')->nullable();
            $table->date('tgl_hasil')->nullable();
            $table->text('hasil')->nullable();
            $table->string('file_surat_justifikasi', 255)->nullable();
        });

        Schema::create('ticket_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ticket_id');
            $table->string('status_label', 100);
            $table->text('keterangan')->nullable();
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('service_requests', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_request', 50)->unique();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('reported_by')->nullable();
            $table->string('layanan', 100);
            $table->date('tgl_request');
            $table->text('deskripsi')->nullable();
            $table->string('status', 30)->default('Diajukan');
            $table->timestamp('completed_at')->nullable();
            $table->timestamp('konfirmasi_selesai_at')->nullable();
            $table->boolean('is_konfirmasi_otomatis')->default(false);
            $table->boolean('is_chat_closed')->default(false);
            $table->timestamp('chat_closed_at')->nullable();
            $table->unsignedBigInteger('chat_closed_by')->nullable();
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('service_request_resolutions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('request_id')->unique();
            $table->unsignedBigInteger('petugas_id')->nullable();
            $table->date('tgl_tindak_lanjut')->nullable();
            $table->text('tindak_lanjut')->nullable();
            $table->text('alasan_penolakan')->nullable();
            $table->string('zoom_link', 500)->nullable();
            $table->string('zoom_meeting_id', 100)->nullable();
            $table->string('zoom_passcode', 100)->nullable();
            $table->string('akun_password_baru', 255)->nullable();
            $table->text('akun_instruksi_login')->nullable();
            $table->string('pinjam_perangkat_diserahkan', 255)->nullable();
            $table->text('pinjam_catatan_pengembalian')->nullable();
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('req_detail_zoom', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('request_id')->unique();
            $table->unsignedBigInteger('bidang_id')->nullable();
            $table->string('nama_acara', 255)->nullable();
            $table->date('tgl_acara')->nullable();
            $table->string('jam_mulai', 20)->nullable();
            $table->string('jam_selesai', 20)->nullable();
            $table->string('butuh_operator', 10)->default('Tidak');
        });

        Schema::create('req_detail_akun', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('request_id')->unique();
            $table->string('jenis_pengajuan', 100)->nullable();
            $table->string('sistem_tujuan', 100)->nullable();
            $table->string('email', 150)->nullable();
            $table->string('password_sementara', 255)->nullable();
        });

        Schema::create('req_detail_peminjaman', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('request_id')->unique();
            $table->string('jenis_perangkat', 255)->nullable();
            $table->date('tgl_mulai')->nullable();
            $table->date('tgl_kembali')->nullable();
        });

        Schema::create('lokasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lokasi', 150);
            $table->unsignedBigInteger('bidang_id')->nullable();
            $table->timestamps();
        });

        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->string('group')->default('general');
            $table->string('type')->default('string');
            $table->string('description')->nullable();
            $table->timestamps();
        });

        Schema::create('notifications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('type');
            $table->morphs('notifiable');
            $table->text('data');
            $table->timestamp('read_at')->nullable();
            $table->timestamps();
        });
    }

    Cache::flush();
    Http::fake();
    config(['fonnte.token' => '']);

    $this->withoutVite();
});

function createUser(string $role, string $suffix): User
{
    return User::create([
        'nip' => 'NIP-' . $suffix,
        'nama' => 'User ' . $suffix,
        'email' => $suffix . '@bpom.test',
        'password' => Hash::make('password'),
        'role' => $role,
        'tempat_lahir' => 'Banjarmasin',
        'tanggal_lahir' => '1990-01-01',
        'jenkel' => 'L',
        'status_kepegawaian' => 'PNS',
        'status_pernikahan' => 'Belum Menikah',
        'no_telp' => '081200000001',
        'alamat' => 'Banjarmasin',
    ]);
}

test('User role helpers treat admin and deprecated isTeknisi identically', function () {
    $admin = createUser('admin', 'admin1');
    $pelapor = createUser('pelapor', 'pelapor1');

    expect($admin->isAdmin())->toBeTrue()
        ->and($admin->isTeknisi())->toBeTrue()
        ->and($admin->isPelapor())->toBeFalse();

    expect($pelapor->isAdmin())->toBeFalse()
        ->and($pelapor->isTeknisi())->toBeFalse()
        ->and($pelapor->isPelapor())->toBeTrue();
});

test('No registered route uses the removed teknisi role middleware', function () {
    $staleRoutes = collect(Route::getRoutes()->getRoutes())
        ->filter(function ($route) {
            return collect($route->gatherMiddleware())->contains(fn ($m) => str_contains($m, 'role:') && str_contains($m, 'teknisi'));
        })
        ->map->uri()
        ->values()
        ->all();

    expect($staleRoutes)->toBeEmpty();
});

test('Admin can access all unified management routes and edit Selesai tickets directly', function () {
    $admin = createUser('admin', 'admin2');
    $pelapor = createUser('pelapor', 'pelapor2');
    $bidang = Bidang::create(['nama_bidang' => 'Tata Usaha']);
    $asset = Asset::create([
        'kode_barang' => '3100102001',
        'nama_barang' => 'PC Desktop',
        'nup' => '1',
    ]);

    $ticket = Ticket::create([
        'nomor_aduan' => 'ADU-2026-001',
        'jenis_kendala' => 'aset',
        'asset_id' => $asset->id,
        'pelapor_id' => $pelapor->id,
        'tgl_pelaporan' => '2026-11-11',
        'deskripsi_masalah' => 'Komputer tidak bisa menyala saat dinyalakan pagi hari.',
        'status' => 'Selesai',
        'completed_at' => now(),
    ]);

    $req = ServiceRequest::create([
        'nomor_request' => 'REQ-2026-001',
        'user_id' => $pelapor->id,
        'layanan' => 'lainnya',
        'tgl_request' => '2026-11-11',
        'deskripsi' => 'Permintaan asistensi instalasi aplikasi internal.',
        'status' => 'Selesai',
        'completed_at' => now(),
    ]);

    $this->actingAs($admin)->get('/dashboard')->assertOk();
    $this->actingAs($admin)->get('/master/lokasi')->assertOk();
    $this->actingAs($admin)->get('/reports')->assertOk();
    $this->actingAs($admin)->get('/settings/whatsapp')->assertOk();

    $this->actingAs($admin)
        ->get('/master/petugas')
        ->assertOk()
        ->assertSee('Administrator / Tim IT')
        ->assertDontSee('Hanya Tim IT (Teknisi)');

    $this->actingAs($admin)
        ->get('/profile')
        ->assertOk()
        ->assertSee('Administrator / Tim IT');

    $this->actingAs($admin)
        ->get('/incidents/all')
        ->assertOk()
        ->assertSee(route('incidents.edit', $ticket), false);

    $this->actingAs($admin)
        ->get('/requests/all')
        ->assertOk()
        ->assertSee(route('requests.edit', $req->id), false);

    $this->actingAs($admin)->get(route('incidents.edit', $ticket))->assertOk();
    $this->actingAs($admin)->get(route('requests.edit', $req->id))->assertOk();
});

test('Pelapor receives 403 on all unified admin endpoints and is redirected from dashboard', function () {
    $pelapor = createUser('pelapor', 'pelapor3');

    $this->actingAs($pelapor)->get('/dashboard')->assertRedirect(route('home'));
    $this->actingAs($pelapor)->get('/incidents/all')->assertForbidden();
    $this->actingAs($pelapor)->get('/requests/all')->assertForbidden();
    $this->actingAs($pelapor)->get('/master/petugas')->assertForbidden();
    $this->actingAs($pelapor)->get('/master/lokasi')->assertForbidden();
    $this->actingAs($pelapor)->get('/reports')->assertForbidden();
    $this->actingAs($pelapor)->get('/settings/whatsapp')->assertForbidden();
});

test('PetugasController rejects teknisi role and accepts admin role', function () {
    $admin = createUser('admin', 'admin4');
    $target = createUser('pelapor', 'target4');

    $this->actingAs($admin)
        ->put(route('master.petugas.update', $target), ['role' => 'teknisi'])
        ->assertSessionHasErrors('role');

    expect($target->fresh()->role)->toBe('pelapor');

    $this->actingAs($admin)
        ->put(route('master.petugas.update', $target), ['role' => 'admin'])
        ->assertSessionHasNoErrors()
        ->assertRedirect();

    expect($target->fresh()->role)->toBe('admin');

    $this->actingAs($admin)
        ->post(route('master.petugas.store'), [
            'mode' => 'promote',
            'user_id' => $target->id,
            'role' => 'teknisi',
        ])
        ->assertSessionHasErrors('role');
});
