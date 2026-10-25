<?php

namespace App\Jobs;

use App\Models\Setting;
use App\Services\FonnteService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendWhatsAppJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Jumlah percobaan saat gagal.
     */
    public int $tries = 3;

    /**
     * Timeout job dalam detik.
     */
    public int $timeout = 30;

    /**
     * Target nomor telepon atau array nomor.
     */
    public array|string $targets;

    /**
     * Teks pesan WhatsApp.
     */
    public string $message;

    /**
     * Create a new job instance.
     */
    public function __construct(array|string $targets, string $message)
    {
        $this->targets = $targets;
        $this->message = $message;
    }

    /**
     * Execute the job.
     */
    public function handle(FonnteService $fonnteService): void
    {
        try {
            $fonnteService->sendRawMessage($this->targets, $this->message);
        } catch (\Throwable $e) {
            Log::error('Gagal mengeksekusi SendWhatsAppJob', [
                'targets' => $this->targets,
                'error' => $e->getMessage(),
            ]);
            throw $e;
        }
    }

    /**
     * Dispatch job secara cerdas:
     * - Menggunakan afterResponse() secara default agar web 0 delay tanpa harus menjalankan worker queue:work
     * - Atau menggunakan antrean queue murni jika setting fonnte_use_queue_worker aktif.
     */
    public static function dispatchSmart(array|string $targets, string $message): void
    {
        if (empty($targets) || empty(trim($message))) {
            return;
        }

        $useWorker = Setting::getBool('fonnte_use_queue_worker', false);

        if ($useWorker) {
            static::dispatch($targets, $message);
        } else {
            static::dispatch($targets, $message)->afterResponse();
        }
    }
}
