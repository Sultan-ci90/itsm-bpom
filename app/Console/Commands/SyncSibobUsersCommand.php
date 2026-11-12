<?php

namespace App\Console\Commands;

use App\Services\Sibob\SibobService;
use App\Services\Sibob\SibobUserMapper;
use Illuminate\Console\Command;

class SyncSibobUsersCommand extends Command
{
    protected $signature = 'sibob:sync-users';

    protected $description = 'Sinkronisasi daftar pegawai dari API SIBOB (/api/v1/users) ke tabel users lokal.';

    public function handle(SibobService $sibob, SibobUserMapper $mapper): int
    {
        if (!$sibob->isEnabled()) {
            $this->warn('Integrasi SIBOB sedang dinonaktifkan (SIBOB_ENABLED=false).');
            return self::FAILURE;
        }

        $this->info('Mengambil daftar pegawai dari SIBOB...');

        try {
            $rawUsers = $sibob->fetchAllUsers();
            $summary = $mapper->syncMany($rawUsers);

            $this->table(
                ['Baru Ditambahkan', 'Diperbarui', 'Dilewati'],
                [[$summary['created'], $summary['updated'], $summary['skipped']]]
            );

            return self::SUCCESS;
        } catch (\Throwable $e) {
            $this->error('Sinkronisasi SIBOB gagal: ' . $e->getMessage());
            return self::FAILURE;
        }
    }
}
