<?php

namespace App\Console\Commands;

use App\Models\Asset;
use App\Models\Ticket;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CleanDummyAssetsCommand extends Command
{
    protected $signature = 'bmn:clean-dummy {--force : Hapus langsung tanpa konfirmasi interaktif} {--delete-tickets : Hapus juga tiket dummy yang terhubung dengan aset dummy}';

    protected $description = 'Bersihkan aset dummy lama (berkode awalan BRG-) secara aman';

    public function handle(): int
    {
        $dummyAssets = Asset::where('kode_barang', 'like', 'BRG-%')->get();
        $totalDummy = $dummyAssets->count();

        if ($totalDummy === 0) {
            $this->info('Tidak ditemukan aset dummy (BRG-%) di database. Database sudah bersih.');
            return self::SUCCESS;
        }

        $dummyIds = $dummyAssets->pluck('id')->toArray();
        $linkedTicketsCount = Ticket::whereIn('asset_id', $dummyIds)->count();

        $this->warn("Ditemukan {$totalDummy} aset dummy (awalan BRG-%).");
        if ($linkedTicketsCount > 0) {
            $this->warn("Terdapat {$linkedTicketsCount} tiket/aduan yang terhubung dengan aset dummy tersebut.");
        }

        if (!$this->option('force')) {
            if (!$this->confirm('Apakah Anda yakin ingin menghapus aset dummy ini?', false)) {
                $this->info('Operasi pembersihan dibatalkan.');
                return self::SUCCESS;
            }
        }

        DB::beginTransaction();
        try {
            if ($linkedTicketsCount > 0) {
                if ($this->option('delete-tickets')) {
                    Ticket::whereIn('asset_id', $dummyIds)->delete();
                    $this->info("Berhasil menghapus {$linkedTicketsCount} tiket terkait.");
                } else {
                    // Lepaskan keterkaitan asset_id pada tiket agar tiket dummy tetap ada untuk riwayat testing
                    Ticket::whereIn('asset_id', $dummyIds)->update(['asset_id' => null]);
                    $this->info("Keterkaitan {$linkedTicketsCount} tiket ke aset dummy telah dilepas (asset_id diset null).");
                }
            }

            Asset::whereIn('id', $dummyIds)->delete();

            DB::commit();
            $this->info("Sukses! Berhasil menghapus {$totalDummy} aset dummy.");
            return self::SUCCESS;
        } catch (\Throwable $e) {
            DB::rollBack();
            $this->error('Gagal membersihkan aset dummy: ' . $e->getMessage());
            return self::FAILURE;
        }
    }
}
