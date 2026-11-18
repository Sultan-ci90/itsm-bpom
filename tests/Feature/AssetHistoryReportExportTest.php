<?php

use App\Models\Asset;
use App\Models\Bidang;
use App\Models\Ticket;
use App\Models\TicketResolution;
use App\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Schema;
use PhpOffice\PhpSpreadsheet\IOFactory;

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
            'service_requests',
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

function createReportUser(string $role, string $suffix, ?int $bidangId = null): User
{
    return User::create([
        'nip' => '19900101' . $suffix,
        'nama' => 'Pegawai ' . $suffix,
        'email' => 'report-' . $suffix . '@bpom.test',
        'password' => Hash::make('password'),
        'bidang_id' => $bidangId,
        'role' => $role,
        'tempat_lahir' => 'Banjarbaru',
        'tanggal_lahir' => '1990-01-01',
        'jenkel' => 'L',
        'status_kepegawaian' => 'PNS',
        'status_pernikahan' => 'Belum Menikah',
        'no_telp' => '081200000002',
        'alamat' => 'Banjarbaru',
    ]);
}

function createSampleAsset(string $kode, string $nama, string $nup, string $kondisi = 'Baik'): Asset
{
    return Asset::create([
        'kode_barang' => $kode,
        'nama_barang' => $nama,
        'merk_type' => 'ThinkPad T14',
        'nup' => $nup,
        'tgl_terima' => '2021-03-01',
        'jenis_barang' => 'Laptop',
        'satuan' => 'Unit',
        'lokasi' => 'Ruang Tata Usaha',
        'status_kondisi' => $kondisi,
    ]);
}

test('admin sees riwayat kerusakan report option and all searchable BMN assets while pelapor is forbidden', function () {
    $bidang = Bidang::create(['nama_bidang' => 'Tata Usaha']);
    $admin = createReportUser('admin', '001', $bidang->id);
    $pelapor = createReportUser('pelapor', '002', $bidang->id);

    $assetWithHistory = createSampleAsset('3.10.01.02.001', 'Laptop Dinas A', '1');
    $assetWithoutHistory = createSampleAsset('3.10.01.02.002', 'Printer Belum Pernah Rusak', '7');

    $this->actingAs($pelapor)->get(route('reports.index'))->assertForbidden();

    $response = $this->actingAs($admin)->get(route('reports.index'));

    $response->assertOk()
        ->assertSee('value="riwayat_kerusakan"', false)
        ->assertSee('Laporan Riwayat Kerusakan')
        ->assertSee('id="report_asset_select"', false)
        ->assertSee('data-searchable-select', false)
        ->assertSee('3.10.01.02.001 - Laptop Dinas A (NUP: 1)')
        ->assertSee('3.10.01.02.002 - Printer Belum Pernah Rusak (NUP: 7)')
        ->assertSee('Seluruh Periode');
});

test('export validation requires asset_id for riwayat_kerusakan without requiring periode', function () {
    $admin = createReportUser('admin', '003');

    $this->actingAs($admin)
        ->from(route('reports.index'))
        ->post(route('reports.export'), [
            'jenis' => 'riwayat_kerusakan',
        ])
        ->assertRedirect(route('reports.index'))
        ->assertSessionHasErrors('asset_id');
});

test('existing report types still require periode', function () {
    $admin = createReportUser('admin', '004');

    $this->actingAs($admin)
        ->from(route('reports.index'))
        ->post(route('reports.export'), [
            'jenis' => 'kerusakan',
        ])
        ->assertRedirect(route('reports.index'))
        ->assertSessionHasErrors('periode');
});

test('export riwayat_kerusakan succeeds for asset with zero tickets and produces clean zero summary', function () {
    $admin = createReportUser('admin', '005');
    $emptyAsset = createSampleAsset('3.10.01.02.099', 'Scanner Baru', '0');

    $response = $this->actingAs($admin)
        ->from(route('reports.index'))
        ->post(route('reports.export'), [
            'jenis' => 'riwayat_kerusakan',
            'asset_id' => $emptyAsset->id,
        ]);

    $response->assertOk();

    $spreadsheet = IOFactory::load($response->getFile()->getPathname());
    $ringkasanRows = $spreadsheet->getSheetByName('Ringkasan')->toArray();
    $detailRows = $spreadsheet->getSheetByName('Detail')->toArray();

    // Sheet Ringkasan memuat Total Laporan: 0
    $totalLaporanRow = collect($ringkasanRows)->first(fn ($r) => ($r[0] ?? '') === 'Total Laporan');
    expect($totalLaporanRow[1] ?? null)->toBe('0');

    // Sheet Detail hanya berisi baris header (1 baris), tanpa baris data
    expect($detailRows)->toHaveCount(1)
        ->and($detailRows[0][0])->toBe('No')
        ->and($detailRows[0][1])->toBe('Nomor Aduan');
});

test('export riwayat_kerusakan downloads full multi-year excel workbook filtered strictly to selected asset', function () {
    $bidang = Bidang::create(['nama_bidang' => 'Pengujian']);
    $admin = createReportUser('admin', '006', $bidang->id);
    $pelapor = createReportUser('pelapor', '007', $bidang->id);

    $targetAsset = createSampleAsset('3.10.01.02/005', 'Laptop Uji Lab', '12', 'Rusak');
    $otherAsset = createSampleAsset('3.10.01.02.006', 'PC Lain', '3', 'Baik');

    // 3 tiket aktif lintas > 2 tahun (2022, 2024, 2026) termasuk Ditolak
    $tOld = Ticket::create([
        'nomor_aduan' => 'ADU-2022-001',
        'jenis_kendala' => 'aset',
        'asset_id' => $targetAsset->id,
        'pelapor_id' => $pelapor->id,
        'tgl_pelaporan' => '2022-02-14',
        'deskripsi_masalah' => 'SSD gagal terbaca saat booting.',
        'status' => 'Selesai',
    ]);
    TicketResolution::create([
        'ticket_id' => $tOld->id,
        'pemeriksa_id' => $admin->id,
        'jenis_penyelesaian' => 'mandiri',
        'tgl_analisa' => '2022-02-14',
        'analisa_teknis' => 'Konektor SSD longgar.',
        'tgl_tindak_lanjut' => '2022-02-15',
        'tindak_lanjut_teknis' => 'Reseat SSD dan uji boot.',
        'tgl_hasil' => '2022-02-15',
        'hasil' => 'Perangkat normal kembali.',
    ]);

    $tMid = Ticket::create([
        'nomor_aduan' => 'ADU-2024-010',
        'jenis_kendala' => 'aset',
        'asset_id' => $targetAsset->id,
        'pelapor_id' => $pelapor->id,
        'tgl_pelaporan' => '2024-07-08',
        'deskripsi_masalah' => 'Layar bergaris vertikal.',
        'status' => 'Sedang diproses',
    ]);
    TicketResolution::create([
        'ticket_id' => $tMid->id,
        'pemeriksa_id' => $admin->id,
        'jenis_penyelesaian' => 'Pihak ke-3',
        'tgl_analisa' => '2024-07-09',
        'analisa_teknis' => 'Panel LCD rusak.',
        'tgl_tindak_lanjut' => '2024-07-10',
        'tindak_lanjut_teknis' => 'Diajukan ke vendor servis.',
        'tgl_hasil' => null,
        'hasil' => null,
    ]);

    Ticket::create([
        'nomor_aduan' => 'ADU-2026-003',
        'jenis_kendala' => 'aset',
        'asset_id' => $targetAsset->id,
        'pelapor_id' => $pelapor->id,
        'tgl_pelaporan' => '2026-11-10',
        'deskripsi_masalah' => 'Baterai drop (laporan duplikat).',
        'status' => 'Ditolak',
    ]);

    // Tiket terhapus (soft delete) milik targetAsset — harus dikecualikan
    $tDeleted = Ticket::create([
        'nomor_aduan' => 'ADU-2023-DEL',
        'jenis_kendala' => 'aset',
        'asset_id' => $targetAsset->id,
        'pelapor_id' => $pelapor->id,
        'tgl_pelaporan' => '2023-05-01',
        'deskripsi_masalah' => 'Tiket salah input dan sudah dihapus.',
        'status' => 'Belum diperiksa',
    ]);
    $tDeleted->delete();

    // Tiket milik aset lain — harus dikecualikan
    Ticket::create([
        'nomor_aduan' => 'ADU-2025-OTHER',
        'jenis_kendala' => 'aset',
        'asset_id' => $otherAsset->id,
        'pelapor_id' => $pelapor->id,
        'tgl_pelaporan' => '2025-03-20',
        'deskripsi_masalah' => 'RAM error pada PC Lain.',
        'status' => 'Selesai',
    ]);

    $response = $this->actingAs($admin)->post(route('reports.export'), [
        'jenis' => 'riwayat_kerusakan',
        'asset_id' => $targetAsset->id,
    ]);

    $response->assertOk();
    $disposition = $response->headers->get('content-disposition');
    expect($disposition)->toContain('Laporan_Riwayat_Kerusakan_3_10_01_02_005_NUP_12_Seluruh_Periode.xlsx');

    $spreadsheet = IOFactory::load($response->getFile()->getPathname());
    expect($spreadsheet->getSheetNames())->toBe(['Ringkasan', 'Detail']);

    $ringkasanValues = $spreadsheet->getSheetByName('Ringkasan')->toArray();
    $ringkasanFlat = collect($ringkasanValues)->flatten()->map(fn ($v) => (string) $v)->all();

    expect($ringkasanFlat)->toContain('LAPORAN RIWAYAT KERUSAKAN ASET BMN (ITSM BPOM)')
        ->and($ringkasanFlat)->toContain('Seluruh Periode')
        ->and($ringkasanFlat)->toContain('3.10.01.02/005')
        ->and($ringkasanFlat)->toContain('Laptop Uji Lab (ThinkPad T14)')
        ->and($ringkasanFlat)->toContain('Jenis Penyelesaian')
        ->and($ringkasanFlat)->toContain('Ditolak');

    $detailRows = $spreadsheet->getSheetByName('Detail')->toArray();
    // 1 baris header + 3 baris tiket aktif milik targetAsset (2022, 2024, 2026)
    expect($detailRows)->toHaveCount(4)
        ->and($detailRows[0])->toBe([
            'No',
            'Nomor Aduan',
            'Tanggal Pelaporan',
            'Nama Pelapor',
            'Kode Barang',
            'Nama Barang',
            'Deskripsi Masalah',
            'Petugas Pemeriksa',
            'Jenis Penyelesaian',
            'Tgl Analisa',
            'Hasil Analisa',
            'Tgl Tindak Lanjut',
            'Hasil Tindak Lanjut',
            'Tanggal Hasil',
            'Hasil',
        ])
        ->and($detailRows[0])->not->toContain('Jenis Kendala')
        ->and($detailRows[0])->not->toContain('Status');

    // Verifikasi isi baris pertama (tiket selesai 2022) dan kedua (draft Pihak ke-3 2024) sejajar 15 kolom
    expect($detailRows[1][1])->toBe('ADU-2022-001')
        ->and($detailRows[1][4])->toBe('3.10.01.02/005')
        ->and($detailRows[1][5])->toBe('Laptop Uji Lab')
        ->and($detailRows[1][6])->toBe('SSD gagal terbaca saat booting.')
        ->and($detailRows[1][7])->toBe('Pegawai 006')
        ->and($detailRows[1][8])->toBe('mandiri')
        ->and($detailRows[1][9])->toBe('14/02/2022')
        ->and($detailRows[1][10])->toBe('Konektor SSD longgar.')
        ->and($detailRows[1][11])->toBe('15/02/2022')
        ->and($detailRows[1][12])->toBe('Reseat SSD dan uji boot.')
        ->and($detailRows[1][13])->toBe('15/02/2022')
        ->and($detailRows[1][14])->toBe('Perangkat normal kembali.');

    expect($detailRows[2][1])->toBe('ADU-2024-010')
        ->and($detailRows[2][8])->toBe('Pihak ke-3')
        ->and($detailRows[2][9])->toBe('09/07/2024')
        ->and($detailRows[2][10])->toBe('Panel LCD rusak.')
        ->and($detailRows[2][11])->toBe('10/07/2024')
        ->and($detailRows[2][12])->toBe('Diajukan ke vendor servis.')
        ->and($detailRows[2][13])->toBe('-')
        ->and($detailRows[2][14])->toBe('-');

    $nomorAduanList = array_column(array_slice($detailRows, 1), 1);
    expect($nomorAduanList)->toBe([
        'ADU-2022-001',
        'ADU-2024-010',
        'ADU-2026-003',
    ]);

    // Laporan Kerusakan reguler tetap mempertahankan kolom Jenis Kendala dan Status (13 kolom)
    $regularResponse = $this->actingAs($admin)->post(route('reports.export'), [
        'jenis' => 'kerusakan',
        'periode' => 'bulan',
        'bulan_awal' => '2024-07',
        'bulan_akhir' => '2024-07',
    ]);
    $regularResponse->assertOk();

    $regularSheet = IOFactory::load($regularResponse->getFile()->getPathname())->getSheetByName('Detail')->toArray();
    expect($regularSheet[0])->toHaveCount(13)
        ->and($regularSheet[0][4])->toBe('Jenis Kendala')
        ->and($regularSheet[0][8])->toBe('Status');
});

test('master asset history page shows Ekspor Excel shortcut and direct export route matches RBAC', function () {
    $bidang = Bidang::create(['nama_bidang' => 'Tata Usaha']);
    $admin = createReportUser('admin', '008', $bidang->id);
    $pelapor = createReportUser('pelapor', '009', $bidang->id);

    $assetWithTicket = createSampleAsset('3.10.01.02.010', 'Laptop Shortcut', '4');
    $assetEmpty = createSampleAsset('3.10.01.02.011', 'Laptop Tanpa Tiket', '5');

    Ticket::create([
        'nomor_aduan' => 'ADU-2025-900',
        'jenis_kendala' => 'aset',
        'asset_id' => $assetWithTicket->id,
        'pelapor_id' => $pelapor->id,
        'tgl_pelaporan' => '2025-08-17',
        'deskripsi_masalah' => 'Keyboard macet.',
        'status' => 'Selesai',
    ]);

    // Pelapor dilarang mengakses rute pintasan ekspor master
    $this->actingAs($pelapor)
        ->get(route('master.asset_history.export', $assetWithTicket))
        ->assertForbidden();

    // Halaman detail aset bertiket menampilkan tombol pintasan Ekspor Excel
    $this->actingAs($admin)
        ->get(route('master.asset_history.show', $assetWithTicket))
        ->assertOk()
        ->assertSee(route('master.asset_history.export', $assetWithTicket), false)
        ->assertSee('Ekspor Excel');

    // Halaman detail aset kosong tetap menampilkan tombol pintasan Ekspor Excel
    $this->actingAs($admin)
        ->get(route('master.asset_history.show', $assetEmpty))
        ->assertOk()
        ->assertSee(route('master.asset_history.export', $assetEmpty), false)
        ->assertSee('Ekspor Excel');

    // Ekspor langsung dari rute master berhasil mengunduh Excel
    $exportResponse = $this->actingAs($admin)
        ->get(route('master.asset_history.export', $assetWithTicket));
    $exportResponse->assertOk();

    $spreadsheet = IOFactory::load($exportResponse->getFile()->getPathname());
    $detailRows = $spreadsheet->getSheetByName('Detail')->toArray();
    expect($detailRows)->toHaveCount(2)
        ->and($detailRows[0])->not->toContain('Jenis Kendala')
        ->and($detailRows[0])->not->toContain('Status')
        ->and($detailRows[1][1])->toBe('ADU-2025-900');

    // Memanggil rute ekspor langsung pada aset kosong juga berhasil mengunduh Excel
    $exportEmptyResponse = $this->actingAs($admin)
        ->get(route('master.asset_history.export', $assetEmpty));
    $exportEmptyResponse->assertOk();

    $spreadsheetEmpty = IOFactory::load($exportEmptyResponse->getFile()->getPathname());
    $detailEmptyRows = $spreadsheetEmpty->getSheetByName('Detail')->toArray();
    expect($detailEmptyRows)->toHaveCount(1)
        ->and($detailEmptyRows[0][0])->toBe('No');
});
