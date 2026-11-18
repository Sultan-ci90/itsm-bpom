<?php

use App\Helpers\MenuHelper;
use App\Models\Asset;
use App\Models\Bidang;
use App\Models\Ticket;
use App\Models\TicketHistory;
use App\Models\TicketResolution;
use App\Models\User;
use App\Support\WitaTime;
use Carbon\Carbon;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Schema;

beforeEach(function () {
    if (DB::getDriverName() === 'sqlite') {
        $tables = [
            'notifications',
            'ticket_histories',
            'ticket_resolutions',
            'tickets',
            'assets',
            'users',
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

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 30)->unique();
            $table->string('nama', 150);
            $table->string('email', 150)->unique();
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
    $this->withoutVite();
});

function createHistoryUser(string $role, string $suffix, ?int $bidangId = null): User
{
    return User::create([
        'nip' => 'NIP-AH-' . $suffix,
        'nama' => 'Nama ' . $suffix,
        'email' => 'ah-' . $suffix . '@bpom.test',
        'password' => Hash::make('password'),
        'bidang_id' => $bidangId,
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

test('only admin can access asset history routes and view the sidebar submenu', function () {
    $admin = createHistoryUser('admin', 'admin1');
    $pelapor = createHistoryUser('pelapor', 'pelapor1');

    $asset = Asset::create([
        'kode_barang' => '3100102001',
        'nama_barang' => 'Laptop Pengawasan',
        'nup' => '1',
    ]);

    $this->actingAs($pelapor)->get(route('master.asset_history.index'))->assertForbidden();
    $this->actingAs($pelapor)->get(route('master.asset_history.show', $asset))->assertForbidden();

    $this->actingAs($pelapor);
    $pelaporPaths = collect(MenuHelper::getMenuGroups()[0]['items'])
        ->flatMap(fn ($item) => isset($item['subItems']) ? collect($item['subItems'])->pluck('path') : [$item['path'] ?? null])
        ->filter()
        ->all();
    expect($pelaporPaths)->not->toContain('/master/riwayat-kerusakan');

    $this->actingAs($admin)->get(route('master.asset_history.index'))->assertOk();
    $this->actingAs($admin)->get(route('master.asset_history.show', $asset))->assertOk();

    $adminPaths = collect(MenuHelper::getMenuGroups()[0]['items'])
        ->flatMap(fn ($item) => isset($item['subItems']) ? collect($item['subItems'])->pluck('path') : [$item['path'] ?? null])
        ->filter()
        ->all();
    expect($adminPaths)->toContain('/master/riwayat-kerusakan');

    // Prefix matching saat berada di halaman detail aset
    $this->actingAs($admin)->get('/master/riwayat-kerusakan/' . $asset->id)->assertOk();
    expect(MenuHelper::isActive('/master/riwayat-kerusakan'))->toBeTrue();
});

test('asset history excludes rejected non-asset and soft-deleted tickets while formatting WITA timestamps safely', function () {
    $bidang = Bidang::create(['nama_bidang' => 'Pengujian']);
    $admin = createHistoryUser('admin', 'pemeriksa', $bidang->id);
    $pelapor = createHistoryUser('pelapor', 'pelapor2', $bidang->id);

    $assetSering = Asset::create([
        'kode_barang' => '3100102010',
        'nama_barang' => 'Printer Laser A',
        'merk_type' => 'HP LaserJet',
        'nup' => '10',
        'lokasi' => 'Ruang Pengujian',
        'status_kondisi' => 'Rusak',
        'penanggung_jawab_id' => $pelapor->id,
    ]);

    $assetSekali = Asset::create([
        'kode_barang' => '3100102020',
        'nama_barang' => 'Scanner Dokumen B',
        'merk_type' => 'Epson DS',
        'nup' => '20',
        'lokasi' => 'Ruang Tata Usaha',
        'status_kondisi' => 'Baik',
    ]);

    $assetDitolakSaja = Asset::create([
        'kode_barang' => '3100102030',
        'nama_barang' => 'Monitor C',
        'merk_type' => 'Dell 24',
        'nup' => '30',
        'lokasi' => 'Ruang Infokom',
        'status_kondisi' => 'Baik',
    ]);

    $assetSehat = Asset::create([
        'kode_barang' => '3100102040',
        'nama_barang' => 'UPS D',
        'merk_type' => 'APC 1200VA',
        'nup' => '40',
        'lokasi' => 'Ruang Server',
        'status_kondisi' => 'Baik',
    ]);

    $t1Time = Carbon::create(2026, 10, 10, 2, 0, 0, 'UTC');
    $t2Time = Carbon::create(2026, 11, 5, 3, 30, 0, 'UTC');

    // Asset A: 1 Selesai Mandiri + 1 Sedang diproses (Pihak ke-3) + 1 Ditolak + 1 Soft-deleted -> valid = 2
    $t1 = Ticket::forceCreate([
        'nomor_aduan' => '001/SPTIK/BBPOM/10/2026',
        'jenis_kendala' => 'aset',
        'asset_id' => $assetSering->id,
        'pelapor_id' => $pelapor->id,
        'tgl_pelaporan' => '2026-10-10',
        'deskripsi_masalah' => 'Paper jam berulang pada tray utama.',
        'status' => 'Selesai',
        'completed_at' => $t1Time,
        'created_at' => $t1Time,
    ]);
    TicketResolution::create([
        'ticket_id' => $t1->id,
        'pemeriksa_id' => $admin->id,
        'jenis_penyelesaian' => 'mandiri',
        'tgl_analisa' => '2026-10-10',
        'analisa_teknis' => 'Roller penarik kertas kotor',
        'tgl_tindak_lanjut' => '2026-10-10',
        'tindak_lanjut_teknis' => 'Pembersihan roller dan kalibrasi',
        'tgl_hasil' => '2026-10-10',
        'hasil' => 'Printer kembali normal',
    ]);

    $t2 = Ticket::forceCreate([
        'nomor_aduan' => '002/SPTIK/BBPOM/11/2026',
        'jenis_kendala' => 'aset',
        'asset_id' => $assetSering->id,
        'pelapor_id' => $pelapor->id,
        'tgl_pelaporan' => '2026-11-05',
        'deskripsi_masalah' => 'Fuser error ketika mencetak dokumen tebal.',
        'status' => 'Sedang diproses',
        'created_at' => $t2Time,
    ]);
    TicketResolution::create([
        'ticket_id' => $t2->id,
        'pemeriksa_id' => $admin->id,
        'jenis_penyelesaian' => 'Pihak ke-3',
        'tgl_analisa' => '2026-11-05',
        'analisa_teknis' => 'Fuser unit aus dan perlu penggantian vendor',
        'tgl_tindak_lanjut' => '2026-11-05',
        'tindak_lanjut_teknis' => 'Pengajuan surat perbaikan ke vendor',
    ]);

    $tRejectedA = Ticket::forceCreate([
        'nomor_aduan' => '003/SPTIK/BBPOM/11/2026',
        'jenis_kendala' => 'aset',
        'asset_id' => $assetSering->id,
        'pelapor_id' => $pelapor->id,
        'tgl_pelaporan' => '2026-11-06',
        'deskripsi_masalah' => 'Salah pilih aset printer.',
        'status' => 'Ditolak',
        'created_at' => $t2Time->copy()->addDay(),
    ]);
    TicketHistory::create([
        'ticket_id' => $tRejectedA->id,
        'status_label' => 'status diubah',
        'keterangan' => 'Aduan ditolak karena salah pilih kode BMN.',
        'created_at' => $t2Time->copy()->addDay(),
    ]);

    $tDeleted = Ticket::forceCreate([
        'nomor_aduan' => '004/SPTIK/BBPOM/11/2026',
        'jenis_kendala' => 'aset',
        'asset_id' => $assetSering->id,
        'pelapor_id' => $pelapor->id,
        'tgl_pelaporan' => '2026-11-07',
        'deskripsi_masalah' => 'Tiket duplikat yang sudah dihapus.',
        'status' => 'Selesai',
        'created_at' => $t2Time->copy()->addDays(2),
    ]);
    $tDeleted->delete();

    // Asset B: 1 Belum diperiksa -> valid = 1
    Ticket::forceCreate([
        'nomor_aduan' => '005/SPTIK/BBPOM/11/2026',
        'jenis_kendala' => 'aset',
        'asset_id' => $assetSekali->id,
        'pelapor_id' => $pelapor->id,
        'tgl_pelaporan' => '2026-11-08',
        'deskripsi_masalah' => 'Kabel USB scanner longgar.',
        'status' => 'Belum diperiksa',
        'created_at' => Carbon::create(2026, 11, 8, 1, 0, 0, 'UTC'),
    ]);

    // Asset C: hanya tiket Ditolak -> valid = 0
    Ticket::forceCreate([
        'nomor_aduan' => '006/SPTIK/BBPOM/11/2026',
        'jenis_kendala' => 'aset',
        'asset_id' => $assetDitolakSaja->id,
        'pelapor_id' => $pelapor->id,
        'tgl_pelaporan' => '2026-11-09',
        'deskripsi_masalah' => 'Monitor normal hanya kabel terlepas.',
        'status' => 'Ditolak',
        'created_at' => Carbon::create(2026, 11, 9, 1, 0, 0, 'UTC'),
    ]);

    // Tiket Non-Aset -> tidak boleh masuk hitungan aset mana pun
    Ticket::forceCreate([
        'nomor_aduan' => '007/SPTIK/BBPOM/11/2026',
        'jenis_kendala' => 'lainnya',
        'asset_id' => null,
        'pelapor_id' => $pelapor->id,
        'tgl_pelaporan' => '2026-11-09',
        'deskripsi_masalah' => 'WiFi ruang rapat lambat.',
        'status' => 'Sedang diproses',
        'created_at' => Carbon::create(2026, 11, 9, 2, 0, 0, 'UTC'),
    ]);

    // 1. Default cakupan (Semua Barang): tampil seluruh 4 aset termasuk Monitor C (hanya ditolak) dan UPS D (tanpa tiket), disertai WITA format tanpa TypeError
    $responseDefault = $this->actingAs($admin)->get(route('master.asset_history.index'));
    $responseDefault->assertOk()
        ->assertSee('Printer Laser A')
        ->assertSee('2x rusak')
        ->assertSee('Mandiri: 1 • Pihak ke-3: 1')
        ->assertSee('1 sedang ditangani')
        ->assertSee(WitaTime::format($t2Time))
        ->assertSee('Scanner Dokumen B')
        ->assertSee('1x rusak')
        ->assertSee('Monitor C')
        ->assertSee('UPS D')
        ->assertSee('0x rusak')
        ->assertViewHas('totalAset', 4)
        ->assertViewHas('totalPernahRusak', 2)
        ->assertViewHas('totalSedangDitangani', 2)
        ->assertViewHas('totalSeringRusak', 1);

    // 2. Cakupan pernah_rusak (>= 1x): hanya Asset A & Asset B
    $this->actingAs($admin)
        ->get(route('master.asset_history.index', ['cakupan' => 'pernah_rusak']))
        ->assertOk()
        ->assertSee('Printer Laser A')
        ->assertSee('Scanner Dokumen B')
        ->assertDontSee('Monitor C')
        ->assertDontSee('UPS D');

    // 3. Cakupan belum_rusak (0x): hanya Monitor C & UPS D
    $this->actingAs($admin)
        ->get(route('master.asset_history.index', ['cakupan' => 'belum_rusak']))
        ->assertOk()
        ->assertDontSee('Printer Laser A')
        ->assertDontSee('Scanner Dokumen B')
        ->assertSee('Monitor C')
        ->assertSee('UPS D');

    // 4. Cakupan sering_rusak (>= 2x): hanya Asset A
    $this->actingAs($admin)
        ->get(route('master.asset_history.index', ['cakupan' => 'sering_rusak']))
        ->assertOk()
        ->assertSee('Printer Laser A')
        ->assertDontSee('Scanner Dokumen B')
        ->assertDontSee('Monitor C')
        ->assertDontSee('UPS D');

    // 5. Cakupan semua: tampil seluruh 4 aset termasuk Monitor C dan UPS D
    $this->actingAs($admin)
        ->get(route('master.asset_history.index', ['cakupan' => 'semua']))
        ->assertOk()
        ->assertSee('Printer Laser A')
        ->assertSee('Scanner Dokumen B')
        ->assertSee('Monitor C')
        ->assertSee('UPS D');

    // 4. Filter kondisi + pencarian tetap menjaga KPI global akurat
    $this->actingAs($admin)
        ->get(route('master.asset_history.index', ['cakupan' => 'semua', 'kondisi' => 'Rusak', 'search' => '3100102010']))
        ->assertOk()
        ->assertSee('Printer Laser A')
        ->assertDontSee('Scanner Dokumen B')
        ->assertViewHas('totalAset', 4);

    // 5. Halaman detail timeline aset A: tampilkan tiket valid & Ditolak (dengan catatan histori), abaikan tiket soft-deleted
    $this->actingAs($admin)
        ->get(route('master.asset_history.show', $assetSering))
        ->assertOk()
        ->assertSee('Printer Laser A')
        ->assertSee('001/SPTIK/BBPOM/10/2026')
        ->assertSee('002/SPTIK/BBPOM/11/2026')
        ->assertSee('003/SPTIK/BBPOM/11/2026')
        ->assertSee('Tidak dihitung dalam frekuensi kerusakan')
        ->assertSee('Aduan ditolak karena salah pilih kode BMN.')
        ->assertSee('Nama pemeriksa')
        ->assertSee(route('incidents.justifikasi', $t2), false)
        ->assertSee(route('incidents.show', $t1), false)
        ->assertDontSee('004/SPTIK/BBPOM/11/2026');
});
