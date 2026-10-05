<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class DummyDataSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        // Ambil ID yang valid dari database
        $assetIds = DB::table('assets')->pluck('id')->toArray();
        $userIds = DB::table('users')->pluck('id')->toArray();
        $bidangIds = DB::table('bidang')->pluck('id')->toArray();
        $teknisiIds = DB::table('users')->whereIn('role', ['admin', 'teknisi'])->pluck('id')->toArray();

        // Distribusi status yang realistis
        $ticketStatuses = ['Belum diperiksa', 'Sedang diproses', 'Selesai', 'Ditolak'];
        $ticketWeights = [20, 30, 40, 10]; 
        
        $requestStatuses = ['Diajukan', 'Diproses', 'Selesai', 'Ditolak'];
        $requestWeights = [15, 25, 50, 10];

        $layanans = ['zoom', 'akun', 'peminjaman'];

        DB::beginTransaction();
        try {
            // =========================================================
            // 1. GENERATE 100 INCIDENT (TICKETS)
            // =========================================================
            for ($i = 1; $i <= 100; $i++) {
                $status = $faker->randomElement($ticketStatuses, $ticketWeights);
                $tglPelaporan = $faker->dateTimeBetween('-6 months', 'now');
                $nomorAduan = 'TIK-' . $tglPelaporan->format('Ymd') . '-' . str_pad($i, 4, '0', STR_PAD_LEFT);
                $pelaporId = $faker->randomElement($userIds);
                $assetId = $faker->randomElement($assetIds);

                // Insert Ticket (TANPA updated_at)
                $ticketId = DB::table('tickets')->insertGetId([
                    'nomor_aduan' => $nomorAduan,
                    'asset_id' => $assetId,
                    'pelapor_id' => $pelaporId,
                    'tgl_pelaporan' => $tglPelaporan->format('Y-m-d'),
                    'deskripsi_masalah' => $faker->paragraph(3),
                    'foto_kendala' => $faker->boolean(20) ? 'dummy_' . $faker->uuid . '.jpg' : null,
                    'status' => $status,
                    'created_at' => $tglPelaporan,
                ]);

                // Insert History Awal
                DB::table('ticket_histories')->insert([
                    'ticket_id' => $ticketId,
                    'status_label' => 'aduan dibuat',
                    'keterangan' => 'Tiket dibuat oleh sistem (dummy data).',
                    'created_at' => $tglPelaporan,
                ]);

                // Jika status bukan 'Belum diperiksa' dan bukan 'Ditolak', buat Resolution
                if (in_array($status, ['Sedang diproses', 'Selesai'])) {
                    $jenisPenyelesaian = $faker->randomElement(['Internal', 'Pihak ke-3']);
                    $tglAnalisa = $faker->dateTimeBetween($tglPelaporan, now());
                    
                    DB::table('ticket_resolutions')->insert([
                        'ticket_id' => $ticketId,
                        'pemeriksa_id' => $faker->randomElement($teknisiIds),
                        'jenis_penyelesaian' => $jenisPenyelesaian,
                        'vendor' => $jenisPenyelesaian === 'Pihak ke-3' ? $faker->company() : null,
                        'estimasi_biaya' => $jenisPenyelesaian === 'Pihak ke-3' ? $faker->numberBetween(500000, 15000000) : null,
                        'tgl_analisa' => $tglAnalisa->format('Y-m-d'),
                        'analisa_teknis' => $faker->paragraph(2),
                        'tgl_tindak_lanjut' => $tglAnalisa->modify('+2 days')->format('Y-m-d'),
                        'tindak_lanjut_teknis' => $faker->paragraph(2),
                        'tgl_hasil' => $status === 'Selesai' ? $tglAnalisa->modify('+5 days')->format('Y-m-d') : null,
                        'hasil' => $status === 'Selesai' ? $faker->paragraph(2) : null,
                        'file_surat_justifikasi' => $jenisPenyelesaian === 'Pihak ke-3' ? 'justifikasi_' . $faker->uuid . '.pdf' : null,
                    ]);

                    DB::table('ticket_histories')->insert([
                        'ticket_id' => $ticketId,
                        'status_label' => 'status diubah',
                        'keterangan' => "Status diubah menjadi '{$status}' oleh teknisi.",
                        'created_at' => now(),
                    ]);
                }
            }

            // =========================================================
            // 2. GENERATE 100 SERVICE REQUESTS
            // =========================================================
            for ($i = 1; $i <= 100; $i++) {
                $status = $faker->randomElement($requestStatuses, $requestWeights);
                $layanan = $faker->randomElement($layanans);
                $tglRequest = $faker->dateTimeBetween('-6 months', 'now');
                $nomorRequest = 'REQ-' . $tglRequest->format('Ymd') . '-' . str_pad($i, 4, '0', STR_PAD_LEFT);
                $userId = $faker->randomElement($userIds);

                // Insert Service Request (TANPA updated_at)
                $requestId = DB::table('service_requests')->insertGetId([
                    'nomor_request' => $nomorRequest,
                    'user_id' => $userId,
                    'layanan' => $layanan,
                    'tgl_request' => $tglRequest->format('Y-m-d'),
                    'lokasi' => $faker->randomElement(['Ruang Rapat Utama', 'Ruang Tata Usaha', 'Ruang IT', 'Aula BPOM']),
                    'deskripsi' => $faker->sentence(5),
                    'status' => $status,
                    'created_at' => $tglRequest,
                ]);

                // Insert Detail berdasarkan jenis layanan
                if ($layanan === 'zoom') {
                    DB::table('req_detail_zoom')->insert([
                        'request_id' => $requestId,
                        'bidang_id' => $faker->randomElement($bidangIds),
                        'nama_acara' => $faker->sentence(3),
                        'jam_mulai' => '09:00:00',
                        'jam_selesai' => '11:00:00',
                        'jenis_acara' => $faker->randomElement(['Rapat', 'Webinar', 'Training']),
                        'butuh_operator' => $faker->randomElement(['Ya', 'Tidak']),
                        'bentuk_ruangan' => $faker->randomElement(['Shape U', 'Classroom', 'Theater']),
                        'jumlah_kursi' => $faker->numberBetween(5, 50),
                    ]);
                } elseif ($layanan === 'akun') {
                    DB::table('req_detail_akun')->insert([
                        'request_id' => $requestId,
                        'jenis_pengajuan' => $faker->randomElement(['Buat Akun Baru', 'Reset Password', 'Hapus Akses']),
                        'sistem_tujuan' => $faker->randomElement(['Srikandi', 'SIMPEG', 'E-Office', 'SIPT']),
                        'nip_terkait' => $faker->numerify('##################'),
                    ]);
                } elseif ($layanan === 'peminjaman') {
                    DB::table('req_detail_peminjaman')->insert([
                        'request_id' => $requestId,
                        'jenis_perangkat' => $faker->randomElement(['Laptop', 'Proyektor', 'Kamera', 'Sound System']),
                        'tgl_mulai' => $tglRequest->format('Y-m-d'),
                        'tgl_kembali' => $tglRequest->modify('+3 days')->format('Y-m-d'),
                        'keperluan' => $faker->sentence(3),
                        'lokasi_penggunaan' => $faker->randomElement(['Luar Kantor', 'Ruang Rapat', 'Aula']),
                    ]);
                }
            }

            DB::commit();
            $this->command->info('Berhasil membuat 100 Incident dan 100 Request beserta relasinya!');

        } catch (\Exception $e) {
            DB::rollBack();
            $this->command->error('Gagal membuat data dummy: ' . $e->getMessage());
        }
    }
}