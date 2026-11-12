<?php

use App\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Schema;

beforeEach(function () {
    Http::preventStrayRequests();

    if (DB::getDriverName() === 'sqlite') {
        $tables = [
            'notifications',
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

        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang', 50);
            $table->string('nama_barang', 150);
            $table->string('nup', 50);
            $table->string('lokasi', 150)->nullable();
        });

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
            $table->string('sibob_id', 64)->nullable()->unique();
            $table->string('nip', 30)->nullable()->unique();
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
            $table->string('no_telp', 20)->default('-');
            $table->text('alamat')->default('-');
            $table->string('jabatan_fungsional', 150)->nullable();
            $table->unsignedBigInteger('bidang_id')->nullable();
            $table->unsignedBigInteger('jabatan_id')->nullable();
            $table->unsignedBigInteger('panggol_id')->nullable();
            $table->string('role', 20)->default('pelapor');
            $table->timestamp('sibob_synced_at')->nullable();
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
    config([
        'sibob.enabled' => true,
        'sibob.base_url' => 'https://sibob.bbpombanjarmasin.com',
        'sibob.allow_local_fallback_on_outage' => true,
        'sibob.service_token' => null,
        'sibob.service_email' => null,
        'sibob.service_password' => null,
    ]);
    $this->withoutVite();
});

function createSibobLocalUser(array $overrides = []): User
{
    return User::create(array_merge([
        'nip' => '199001012020011001',
        'nama' => 'Pegawai Lokal',
        'email' => 'lokal@bpom.test',
        'password' => Hash::make('secret123'),
        'role' => 'pelapor',
        'tempat_lahir' => 'Banjarmasin',
        'tanggal_lahir' => '1990-01-01',
        'jenkel' => 'L',
        'status_kepegawaian' => 'PNS',
        'status_pernikahan' => 'Menikah',
        'no_telp' => '081200000001',
        'alamat' => 'Banjarmasin',
    ], $overrides));
}

function validCaptchaSession(): array
{
    return [
        'captcha_answer' => 'bujur',
        'captcha_expires_at' => now()->addMinutes(2)->timestamp,
    ];
}

test('sibob login creates new pelapor, fetches profile, overwrites existing profile while keeping admin role, and enforces captcha', function () {
    Http::fake([
        'https://sibob.bbpombanjarmasin.com/api/v1/login' => Http::sequence()
            ->push(['access_token' => 'tok-new-1'])
            ->push(['access_token' => 'tok-admin-2']),
        'https://sibob.bbpombanjarmasin.com/api/v1/profile' => Http::sequence()
            ->push([
                'data' => [
                    'id' => 901,
                    'name' => 'Siti Baru',
                    'nip' => '199505052020012001',
                    'email' => 'siti.baru@bpom.go.id',
                    'bidang' => ['nama_bidang' => 'Infokom'],
                    'jabatan' => 'Pranata Komputer',
                    'panggol' => 'Penata (III/c)',
                    'avatar' => 'https://sibob.bbpombanjarmasin.com/storage/avatars/901.jpg',
                    'phone' => '081299998888',
                    'address' => 'Banjarbaru',
                    'gender' => 'Perempuan',
                ],
            ])
            ->push([
                'data' => [
                    'id' => 902,
                    'nama' => 'Admin Updated From SIBOB',
                    'nip' => '198808082015011002',
                    'email' => 'admin.sibob@bpom.go.id',
                    'no_telp' => '081377776666',
                    'alamat' => 'Jl. Brigjen H. Hasan Basry',
                    'foto_profil' => 'https://sibob.bbpombanjarmasin.com/storage/avatars/902.png',
                ],
            ]),
    ]);

    // Captcha salah tidak boleh menghubungi API SIBOB
    $this->withSession(validCaptchaSession())
        ->post('/signin', [
            'email' => 'siti.baru@bpom.go.id',
            'password' => 'pass123',
            'captcha' => 'salah',
        ])
        ->assertSessionHasErrors('captcha');

    Http::assertNothingSent();

    // Login user baru via SIBOB
    $this->withSession(validCaptchaSession())
        ->post('/signin', [
            'email' => 'siti.baru@bpom.go.id',
            'password' => 'PassSibob!1',
            'captcha' => 'bujur',
        ])
        ->assertRedirect(route('home'));

    $created = User::where('email', 'siti.baru@bpom.go.id')->with(['bidang', 'jabatan', 'panggol'])->first();
    expect($created)->not->toBeNull()
        ->and($created->sibob_id)->toBe('901')
        ->and($created->role)->toBe('pelapor')
        ->and($created->nama)->toBe('Siti Baru')
        ->and($created->jenkel)->toBe('P')
        ->and($created->bidang?->nama_bidang)->toBe('Infokom')
        ->and($created->jabatan?->nama_jabatan)->toBe('Pranata Komputer')
        ->and($created->panggol?->golongan)->toBe('III/c')
        ->and($created->avatarUrl())->toBe('https://sibob.bbpombanjarmasin.com/storage/avatars/901.jpg');

    auth()->logout();

    // Admin eksisting ditimpa profilnya namun role 'admin' dipertahankan
    createSibobLocalUser([
        'nip' => '198808082015011002',
        'nama' => 'Admin Lama',
        'email' => 'admin.sibob@bpom.go.id',
        'role' => 'admin',
        'no_telp' => '080000000000',
        'foto_profil' => 'profiles/old-local.jpg',
    ]);

    $this->withSession(validCaptchaSession())
        ->post('/signin', [
            'email' => 'admin.sibob@bpom.go.id',
            'password' => 'PassAdmin!1',
            'captcha' => 'bujur',
        ])
        ->assertRedirect(route('dashboard'));

    $updatedAdmin = User::where('email', 'admin.sibob@bpom.go.id')->first();
    expect($updatedAdmin->role)->toBe('admin')
        ->and($updatedAdmin->sibob_id)->toBe('902')
        ->and($updatedAdmin->nama)->toBe('Admin Updated From SIBOB')
        ->and($updatedAdmin->no_telp)->toBe('081377776666')
        ->and($updatedAdmin->foto_profil)->toBe('https://sibob.bbpombanjarmasin.com/storage/avatars/902.png');
});

test('sibob login rejects sibob-linked account on 401 while allowing non-sibob local account fallback', function () {
    Http::fake([
        'https://sibob.bbpombanjarmasin.com/api/v1/login' => Http::response(['message' => 'Unauthorized'], 401),
    ]);

    createSibobLocalUser([
        'sibob_id' => '55',
        'nip' => '199101012020011005',
        'email' => 'linked@bpom.go.id',
        'password' => Hash::make('old-password'),
    ]);

    createSibobLocalUser([
        'sibob_id' => null,
        'nip' => '001',
        'email' => 'admin@bpom.test',
        'password' => Hash::make('password'),
        'role' => 'admin',
    ]);

    // Akun tertaut SIBOB tidak boleh fallback jika SIBOB secara eksplisit menolak 401
    $this->withSession(validCaptchaSession())
        ->post('/signin', [
            'email' => 'linked@bpom.go.id',
            'password' => 'old-password',
            'captcha' => 'bujur',
        ])
        ->assertSessionHasErrors('email');

    $this->assertGuest();

    // Akun lokal non-SIBOB tetap bisa masuk
    $this->withSession(validCaptchaSession())
        ->post('/signin', [
            'email' => 'admin@bpom.test',
            'password' => 'password',
            'captcha' => 'bujur',
        ])
        ->assertRedirect(route('dashboard'));

    $this->assertAuthenticated();
});

test('sibob login respects outage fallback policy when sibob server returns 503', function () {
    Http::fake([
        'https://sibob.bbpombanjarmasin.com/api/v1/login' => Http::response(['message' => 'Service Unavailable'], 503),
    ]);

    createSibobLocalUser([
        'sibob_id' => '77',
        'nip' => '199202022020011007',
        'email' => 'outage.user@bpom.go.id',
        'password' => Hash::make('cached-sibob-pass'),
        'role' => 'pelapor',
    ]);

    // Fallback aktif -> bisa login dengan hash tersimpan
    $this->withSession(validCaptchaSession())
        ->post('/signin', [
            'email' => 'outage.user@bpom.go.id',
            'password' => 'cached-sibob-pass',
            'captcha' => 'bujur',
        ])
        ->assertRedirect(route('home'));

    auth()->logout();

    // Fallback dimatikan -> login ditolak ramah
    config(['sibob.allow_local_fallback_on_outage' => false]);

    $this->withSession(validCaptchaSession())
        ->post('/signin', [
            'email' => 'outage.user@bpom.go.id',
            'password' => 'cached-sibob-pass',
            'captcha' => 'bujur',
        ])
        ->assertSessionHasErrors('email');

    $this->assertGuest();
});

test('admin can sync paginated /api/v1/users from Setup Petugas and artisan command while pelapor receives 403', function () {
    config([
        'sibob.service_email' => 'sync-service@bpom.go.id',
        'sibob.service_password' => 'service-secret',
    ]);

    Http::fake([
        'https://sibob.bbpombanjarmasin.com/api/v1/login' => Http::response([
            'token' => 'svc-token-123',
            'user' => [
                'id' => 1,
                'email' => 'sync-service@bpom.go.id',
                'nama' => 'Service Sync',
            ],
        ]),
        'https://sibob.bbpombanjarmasin.com/api/v1/profile' => Http::response([]),
        'https://sibob.bbpombanjarmasin.com/api/v1/users' => Http::response([
            'data' => [
                [
                    'id' => 101,
                    'nip' => '198501012010011001',
                    'nama' => 'Pegawai Satu Sync',
                    'email' => 'satu@bpom.go.id',
                    'bidang' => 'Pengawasan',
                    'jabatan' => 'PFM Ahli Muda',
                    'pangkat' => 'Penata Tk.I',
                    'golongan' => 'III/d',
                    'status_kepegawaian' => 'PNS',
                ],
                [
                    // Baris cacat tanpa id maupun email -> harus dilewati (skipped)
                    'nama' => 'Tanpa ID Dan Email',
                ],
            ],
            'next_page_url' => 'https://sibob.bbpombanjarmasin.com/api/v1/users?page=2',
        ]),
        'https://sibob.bbpombanjarmasin.com/api/v1/users?page=2' => Http::response([
            'data' => [
                [
                    'id' => 102,
                    'nip' => '199303032020012002',
                    'nama' => 'Pegawai Dua Sync',
                    'email' => 'dua@bpom.go.id',
                    'bidang' => 'Tata Usaha',
                ],
            ],
            'next_page_url' => null,
        ]),
    ]);

    // Admin eksisting dengan email satu@bpom.go.id tidak boleh turun ke pelapor saat di-sync
    $admin = createSibobLocalUser([
        'nip' => '198501012010011001',
        'nama' => 'Nama Sebelum Sync',
        'email' => 'satu@bpom.go.id',
        'role' => 'admin',
    ]);

    $pelapor = createSibobLocalUser([
        'nip' => '199909092022011009',
        'nama' => 'Pelapor Biasa',
        'email' => 'pelapor.biasa@bpom.go.id',
        'role' => 'pelapor',
    ]);

    // Pelapor ditolak 403
    $this->actingAs($pelapor)
        ->post(route('master.petugas.sync_sibob'))
        ->assertForbidden();

    // Admin berhasil sinkronisasi 2 halaman penuh
    $this->actingAs($admin)
        ->post(route('master.petugas.sync_sibob'))
        ->assertRedirect(route('master.petugas.index'))
        ->assertSessionHas('success');

    $syncedAdmin = User::where('email', 'satu@bpom.go.id')->with(['bidang', 'jabatan', 'panggol'])->first();
    $syncedNew = User::where('email', 'dua@bpom.go.id')->with('bidang')->first();

    expect($syncedAdmin->role)->toBe('admin')
        ->and($syncedAdmin->sibob_id)->toBe('101')
        ->and($syncedAdmin->nama)->toBe('Pegawai Satu Sync')
        ->and($syncedAdmin->bidang?->nama_bidang)->toBe('Pengawasan')
        ->and($syncedAdmin->jabatan?->nama_jabatan)->toBe('PFM Ahli Muda')
        ->and($syncedAdmin->panggol?->golongan)->toBe('III/d');

    expect($syncedNew)->not->toBeNull()
        ->and($syncedNew->role)->toBe('pelapor')
        ->and($syncedNew->sibob_id)->toBe('102')
        ->and($syncedNew->bidang?->nama_bidang)->toBe('Tata Usaha');

    // UI Setup Petugas merender tombol sinkronisasi dan badge SIBOB
    $this->actingAs($admin)
        ->get(route('master.petugas.index'))
        ->assertOk()
        ->assertSee('Sinkronisasi Pegawai SIBOB')
        ->assertSee('SIBOB');

    // Command Artisan CLI
    $this->artisan('sibob:sync-users')->assertSuccessful();
});

test('artisan sibob:sync-users fails cleanly when SIBOB API returns server error', function () {
    config(['sibob.service_token' => 'broken-token']);

    Http::fake([
        'https://sibob.bbpombanjarmasin.com/api/v1/users' => Http::response(['message' => 'Error'], 500),
    ]);

    $this->artisan('sibob:sync-users')->assertFailed();
});

test('User avatarUrl handles external SIBOB URLs and local storage paths cleanly', function () {
    $remoteUser = new User(['foto_profil' => 'https://sibob.bbpombanjarmasin.com/storage/photo.png']);
    $localUser = new User(['foto_profil' => 'profiles/avatar.jpg']);
    $emptyUser = new User(['foto_profil' => null]);

    expect($remoteUser->avatarUrl())->toBe('https://sibob.bbpombanjarmasin.com/storage/photo.png')
        ->and($localUser->avatarUrl())->toContain('/storage/profiles/avatar.jpg')
        ->and($emptyUser->avatarUrl('fallback.png'))->toBe('fallback.png');
});

test('syncs direct /api/v1/users list lacking email and nip, then preserves real email and photo across login and re-sync', function () {
    config(['sibob.service_token' => 'svc-live-token']);

    Http::fake([
        'https://sibob.bbpombanjarmasin.com/api/v1/users' => Http::response([
            [
                'id' => 14,
                'nip' => null,
                'name' => 'Rayhana, S.H., M.H.',
                'jenis_kelamin' => 'P',
                'divisi_id' => 5,
                'divisi_name' => 'Informasi dan Komunikasi',
                'jabasn_id' => 15,
                'jabasn_name' => 'Pengawas Farmasi dan Makanan Ahli Muda',
                'golongan' => 'III/c',
            ],
        ]),
        'https://sibob.bbpombanjarmasin.com/api/v1/login' => Http::response([
            'status' => 'success',
            'data' => [
                'token' => 'user-tok-14',
                'user' => [
                    'id' => 14,
                    'no_pegawai' => '198601012010012001',
                    'name' => 'Rayhana, S.H., M.H.',
                    'email' => 'rayhana@bpom.go.id',
                    'tempat_lhr' => 'Banjarmasin',
                    'tgl_lhr' => '1986-01-01',
                    'alamat' => 'Jl. Brigjen Hasan Basry',
                    'nikah' => 'Y',
                    'jkel' => 'P',
                    'telp' => '081233334444',
                    'status' => 'PNS',
                    'foto' => '',
                ],
            ],
        ]),
        'https://sibob.bbpombanjarmasin.com/api/v1/profile' => Http::response([
            'status' => 'success',
            'data' => [
                'user' => [
                    'id' => 14,
                    'name' => 'Rayhana, S.H., M.H.',
                    'email' => 'rayhana@bpom.go.id',
                    'foto' => 'https://sibob.bbpombanjarmasin.com/image/users/14.jpg',
                    'divisi' => 'Informasi dan Komunikasi',
                    'jabasn' => 'Pengawas Farmasi dan Makanan Ahli Muda',
                ],
            ],
        ]),
    ]);

    // 1. Sync awal dari /api/v1/users tanpa email/nip membuat placeholder unik yang aman
    $this->artisan('sibob:sync-users')->assertSuccessful();

    $synced = User::where('sibob_id', '14')->with(['bidang', 'jabatan', 'panggol'])->first();
    expect($synced)->not->toBeNull()
        ->and($synced->email)->toBe('sibob-14@sibob.local')
        ->and($synced->nip)->toBeNull()
        ->and($synced->displayLabel())->toBe('- || Rayhana, S.H., M.H.')
        ->and($synced->jenkel)->toBe('P')
        ->and($synced->bidang?->nama_bidang)->toBe('Informasi dan Komunikasi')
        ->and($synced->jabatan?->nama_jabatan)->toBe('Pengawas Farmasi dan Makanan Ahli Muda')
        ->and($synced->panggol?->golongan)->toBe('III/c');

    // 2. Saat pegawai login, data login + /profile digabung memperbarui email, nip, status pernikahan, dan foto
    $this->withSession(validCaptchaSession())
        ->post('/signin', [
            'email' => 'rayhana@bpom.go.id',
            'password' => 'Pass123!',
            'captcha' => 'bujur',
        ])
        ->assertRedirect(route('home'));

    $loggedIn = User::where('sibob_id', '14')->first();
    expect($loggedIn->id)->toBe($synced->id)
        ->and($loggedIn->email)->toBe('rayhana@bpom.go.id')
        ->and($loggedIn->nip)->toBe('198601012010012001')
        ->and($loggedIn->displayLabel())->toBe('198601012010012001 || Rayhana, S.H., M.H.')
        ->and($loggedIn->tempat_lahir)->toBe('Banjarmasin')
        ->and($loggedIn->status_kepegawaian)->toBe('PNS')
        ->and($loggedIn->status_pernikahan)->toBe('Menikah')
        ->and($loggedIn->no_telp)->toBe('081233334444')
        ->and($loggedIn->foto_profil)->toBe('https://sibob.bbpombanjarmasin.com/image/users/14.jpg');

    // 3. Re-sync /api/v1/users berikutnya TIDAK menghapus email/nip/foto/alamat yang sudah lengkap
    $this->artisan('sibob:sync-users')->assertSuccessful();

    $reSynced = User::where('sibob_id', '14')->first();
    expect($reSynced->email)->toBe('rayhana@bpom.go.id')
        ->and($reSynced->nip)->toBe('198601012010012001')
        ->and($reSynced->foto_profil)->toBe('https://sibob.bbpombanjarmasin.com/image/users/14.jpg')
        ->and($reSynced->no_telp)->toBe('081233334444');
});

test('employee dropdowns and search API display only NIP || Nama format without bidang or star marker', function () {
    $bidang = \App\Models\Bidang::create(['nama_bidang' => 'Tata Usaha']);

    $admin = createSibobLocalUser([
        'nip' => '00201290192309',
        'nama' => 'Ziad Sultan Rafi',
        'email' => 'ziad@bpom.test',
        'bidang_id' => $bidang->id,
        'role' => 'admin',
    ]);

    $tanpaNip = createSibobLocalUser([
        'nip' => null,
        'nama' => 'Hendra Setiawan',
        'email' => 'hendra@sibob.local',
        'bidang_id' => $bidang->id,
        'role' => 'pelapor',
    ]);

    expect($admin->displayLabel())->toBe('00201290192309 || Ziad Sultan Rafi')
        ->and($tanpaNip->displayLabel())->toBe('- || Hendra Setiawan');

    $this->actingAs($admin)
        ->get(route('incidents.create'))
        ->assertOk()
        ->assertSee('00201290192309 || Ziad Sultan Rafi')
        ->assertSee('- || Hendra Setiawan')
        ->assertSee('data-searchable-select', false)
        ->assertDontSee('const ASSET_LOKASI', false)
        ->assertDontSee('tom-select@2.4.1', false)
        ->assertDontSee('★ (Anda)')
        ->assertDontSee('• Tata Usaha');

    $this->actingAs($admin)
        ->get(route('requests.create'))
        ->assertOk()
        ->assertSee('00201290192309 || Ziad Sultan Rafi')
        ->assertSee('- || Hendra Setiawan')
        ->assertSee('data-searchable-select', false)
        ->assertSee('data-bidang-id="' . $bidang->id . '"', false)
        ->assertDontSee('const USER_BIDANG', false)
        ->assertDontSee('tom-select@2.4.1', false)
        ->assertDontSee('★ (Anda)')
        ->assertDontSee('• Tata Usaha');

    $this->actingAs($admin)
        ->get(route('master.petugas.index'))
        ->assertOk()
        ->assertSee('- || Hendra Setiawan')
        ->assertSee('data-searchable-select', false)
        ->assertDontSee('(NIP: -)');

    $this->actingAs($admin)
        ->getJson(route('api.users.search'))
        ->assertOk()
        ->assertJsonFragment(['label' => '00201290192309 || Ziad Sultan Rafi'])
        ->assertJsonFragment(['label' => '- || Hendra Setiawan']);
});
