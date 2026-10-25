<?php

namespace App\Services;

use App\Jobs\SendWhatsAppJob;
use App\Models\Setting;
use App\Models\Ticket;
use App\Models\ServiceRequest;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FonnteService
{
    /**
     * Ambil URL endpoint Fonnte API.
     */
    public function getApiUrl(): string
    {
        return rtrim((string) (Setting::get('fonnte_url', config('fonnte.url', 'https://api.fonnte.com'))), '/');
    }

    /**
     * Ambil Token Fonnte (prioritas tabel settings, fallback .env).
     */
    public function getToken(): string
    {
        return trim((string) (Setting::get('fonnte_token', config('fonnte.token', ''))));
    }

    /**
     * Cek apakah WhatsApp Gateway diaktifkan.
     */
    public function isEnabled(): bool
    {
        return Setting::getBool('fonnte_enabled', config('fonnte.enabled', true));
    }

    /**
     * Normalisasi nomor telepon ke format internasional Indonesia (628...).
     */
    public function normalizePhoneNumber(string $phone): string
    {
        // Bersihkan karakter non-digit kecuali tanda plus di awal
        $clean = preg_replace('/[^\d+]/', '', trim($phone));

        if (str_starts_with($clean, '+62')) {
            $clean = '62' . substr($clean, 3);
        } elseif (str_starts_with($clean, '08')) {
            $clean = '628' . substr($clean, 2);
        } elseif (str_starts_with($clean, '8')) {
            $clean = '628' . substr($clean, 1);
        }

        return $clean;
    }

    /**
     * Ambil nomor perangkat bot pengirim (untuk pencegahan self-messaging).
     */
    public function getSenderDeviceNumber(): ?string
    {
        $device = (string) Setting::get('fonnte_sender_device', '');
        return !empty($device) ? $this->normalizePhoneNumber($device) : null;
    }

    /**
     * Siapkan dan normalisasi sekumpulan target nomor menjadi string dipisah koma.
     */
    public function prepareTargets(array|string $targets, bool $allowSelf = false): string
    {
        $rawList = is_array($targets) ? $targets : explode(',', (string) $targets);
        $normalizedList = [];
        $senderDevice = $this->getSenderDeviceNumber();

        foreach ($rawList as $item) {
            $item = trim($item);
            if (!empty($item)) {
                $normalized = $this->normalizePhoneNumber($item);
                if (strlen($normalized) >= 9) { // Panjang valid nomor ponsel
                    if (!$allowSelf && $senderDevice && $normalized === $senderDevice) {
                        Log::info('Nomor ' . $normalized . ' diabaikan karena sama dengan nomor perangkat pengirim Fonnte (mencegah kegagalan self-messaging).');
                        continue;
                    }
                    $normalizedList[] = $normalized;
                }
            }
        }

        return implode(',', array_unique($normalizedList));
    }

    /**
     * Cek status koneksi perangkat WhatsApp di Fonnte.
     */
    public function checkDeviceStatus(): array
    {
        $token = $this->getToken();
        if (empty($token)) {
            return [
                'status' => false,
                'connected' => false,
                'reason' => 'Token API Fonnte belum dikonfigurasi.',
            ];
        }

        try {
            $response = Http::withHeaders([
                'Authorization' => $token,
            ])->timeout(10)->post($this->getApiUrl() . '/device');

            if ($response->successful()) {
                $data = $response->json();
                $deviceStatus = strtolower((string) ($data['device_status'] ?? ''));
                $isConnected = ($deviceStatus === 'connect' || $deviceStatus === 'connected');

                if (!empty($data['device'])) {
                    Setting::set('fonnte_sender_device', (string) $data['device'], 'whatsapp', 'string', 'Nomor WhatsApp perangkat pengirim');
                }

                return [
                    'status' => true,
                    'connected' => $isConnected,
                    'device' => $data['device'] ?? '-',
                    'device_status' => $data['device_status'] ?? 'disconnect',
                    'name' => $data['name'] ?? 'Akun Fonnte',
                    'quota' => $data['quota'] ?? ($data['messages'] ?? '-'),
                    'expired' => $data['expired'] ?? '-',
                    'raw' => $data,
                ];
            }

            return [
                'status' => false,
                'connected' => false,
                'reason' => 'Respon Fonnte error: HTTP ' . $response->status(),
                'raw' => $response->json(),
            ];
        } catch (\Throwable $e) {
            Log::warning('Fonnte checkDeviceStatus exception', ['error' => $e->getMessage()]);
            return [
                'status' => false,
                'connected' => false,
                'reason' => 'Koneksi ke server Fonnte gagal: ' . $e->getMessage(),
            ];
        }
    }

    /**
     * Kirim pesan mentah ke Fonnte WhatsApp API.
     */
    public function sendRawMessage(array|string $targets, string $message): array
    {
        if (!$this->isEnabled()) {
            Log::info('Fonnte WhatsApp Gateway dinonaktifkan di pengaturan.');
            return [
                'status' => false,
                'reason' => 'WhatsApp Gateway sedang dinonaktifkan di pengaturan sistem.',
            ];
        }

        $token = $this->getToken();
        if (empty($token)) {
            Log::warning('Fonnte token belum diisi saat mencoba kirim pesan.');
            return [
                'status' => false,
                'reason' => 'Token API Fonnte belum diatur.',
            ];
        }

        $preparedTargets = $this->prepareTargets($targets);
        if (empty($preparedTargets)) {
            return [
                'status' => false,
                'reason' => 'Tidak ada target nomor WhatsApp yang valid.',
            ];
        }

        try {
            $response = Http::withHeaders([
                'Authorization' => $token,
            ])->timeout(15)->post($this->getApiUrl() . '/send', [
                'target' => $preparedTargets,
                'message' => $message,
                'countryCode' => Setting::get('fonnte_country_code', config('fonnte.country_code', '62')),
            ]);

            $result = $response->json() ?? [];
            $isSuccess = $response->successful() && (($result['status'] ?? false) === true);

            Log::info('Fonnte WhatsApp API response', [
                'targets' => $preparedTargets,
                'http_status' => $response->status(),
                'response' => $result,
            ]);

            return [
                'status' => $isSuccess,
                'reason' => $result['reason'] ?? ($isSuccess ? 'Pesan berhasil diproses Fonnte' : 'Gagal mengirim pesan'),
                'raw' => $result,
            ];
        } catch (\Throwable $e) {
            Log::error('Fonnte sendRawMessage exception', [
                'targets' => $preparedTargets,
                'error' => $e->getMessage(),
            ]);

            return [
                'status' => false,
                'reason' => 'Terjadi kesalahan jaringan: ' . $e->getMessage(),
            ];
        }
    }

    /**
     * Kirim notifikasi tiket baru ke Tim IT (Teknisi & Admin).
     */
    public function sendNewTicketNotification(Ticket|ServiceRequest $ticket): void
    {
        // Kumpulkan nomor telepon staf IT & Admin
        $staffNumbers = User::whereIn('role', ['teknisi', 'admin'])
            ->whereNotNull('no_telp')
            ->where('no_telp', '!=', '')
            ->pluck('no_telp')
            ->toArray();

        // Tambahkan nomor broadcast tambahan dari pengaturan jika ada
        $extraTarget = (string) Setting::get('fonnte_target_admin', config('fonnte.target_admin', ''));
        if (!empty(trim($extraTarget))) {
            $staffNumbers[] = $extraTarget;
        }

        if (empty($staffNumbers)) {
            Log::info('Tidak ada nomor staf IT untuk dikirimi notifikasi tiket baru.');
            return;
        }

        if ($ticket instanceof Ticket) {
            $pelapor = $ticket->pelapor;
            $namaPelapor = $ticket->reported_by
                ? ($ticket->reported_by . ' (dilaporkan oleh ' . ($pelapor->nama ?? 'Pegawai') . ')')
                : ($pelapor->nama ?? 'Pegawai BPOM');

            $bidang = $pelapor?->bidang?->nama_bidang ?? 'Internal BPOM';
            $isAset = ($ticket->jenis_kendala ?? ($ticket->asset_id ? 'aset' : 'lainnya')) === 'aset';
            $kategori = $isAset ? 'Aset / Perangkat TIK' : 'Lainnya (Non-Aset / Aplikasi / Jaringan)';
            $assetNama = $isAset ? ($ticket->asset?->nama_barang ?? 'Aset TIK') : '-';
            $lokasi = $isAset ? ($ticket->asset?->lokasi ?? '-') : '-';
            $waktu = $ticket->tgl_pelaporan ? date('d-m-Y H:i', strtotime($ticket->tgl_pelaporan)) : date('d-m-Y H:i');
            $url = route('incidents.show', $ticket->id);

            $message = "🔔 *NOTIFIKASI ADUAN KENDALA BARU - ITSM BPOM*\n\n"
                . "Halo Tim IT BPOM, terdapat aduan kendala baru yang memerlukan penanganan:\n\n"
                . "📌 *No. Aduan*: {$ticket->nomor_aduan}\n"
                . "🏷️ *Jenis Kendala*: {$kategori}\n"
                . "👤 *Pelapor*: {$namaPelapor}\n"
                . "🏢 *Bidang/Unit*: {$bidang}\n";

            if ($isAset) {
                $message .= "💻 *Aset*: {$assetNama}\n"
                    . "📍 *Lokasi*: {$lokasi}\n";
            }

            $message .= "📝 *Deskripsi Kendala*:\n"
                . "\"{$ticket->deskripsi_masalah}\"\n"
                . "📅 *Waktu Lapor*: {$waktu}\n\n"
                . "Silakan periksa dan tindak lanjuti tiket melalui tautan berikut:\n"
                . "👉 {$url}\n\n"
                . "_Pesan otomatis Sistem Informasi Layanan IT BPOM_";

        } else {
            // ServiceRequest
            $pemohon = $ticket->user;
            $namaPemohon = $ticket->reported_by
                ? ($ticket->reported_by . ' (diajukan oleh ' . ($pemohon->nama ?? 'Pegawai') . ')')
                : ($pemohon->nama ?? 'Pegawai BPOM');

            $bidang = $pemohon?->bidang?->nama_bidang ?? 'Internal BPOM';
            $waktu = $ticket->tgl_request ? date('d-m-Y H:i', strtotime($ticket->tgl_request)) : date('d-m-Y H:i');
            $url = route('requests.show', $ticket->id);

            $message = "🔔 *PERMINTAAN LAYANAN BARU - ITSM BPOM*\n\n"
                . "Halo Tim IT BPOM, terdapat pengajuan permintaan layanan baru:\n\n"
                . "📌 *No. Request*: {$ticket->nomor_request}\n"
                . "👤 *Pemohon*: {$namaPemohon}\n"
                . "🏢 *Bidang/Unit*: {$bidang}\n"
                . "📋 *Jenis Layanan*: {$ticket->layanan}\n"
                . "📍 *Lokasi*: " . ($ticket->lokasi ?? '-') . "\n"
                . "📝 *Keterangan*:\n"
                . "\"{$ticket->deskripsi}\"\n"
                . "📅 *Waktu Pengajuan*: {$waktu}\n\n"
                . "Silakan periksa dan proses permohonan melalui tautan berikut:\n"
                . "👉 {$url}\n\n"
                . "_Pesan otomatis Sistem Informasi Layanan IT BPOM_";
        }

        SendWhatsAppJob::dispatchSmart($staffNumbers, $message);
    }

    /**
     * Kirim notifikasi tiket selesai beserta tindak lanjut solusi ke WhatsApp Pelapor.
     */
    public function sendTicketCompletedNotification(Ticket|ServiceRequest $ticket): void
    {
        $pelapor = ($ticket instanceof Ticket) ? $ticket->pelapor : $ticket->user;

        if (!$pelapor || empty($pelapor->no_telp)) {
            Log::info('Pelapor tidak memiliki nomor telepon terdaftar, notifikasi WA tiket selesai dilewati.', [
                'ticket_id' => $ticket->id,
                'user_id' => $pelapor?->id,
            ]);
            return;
        }

        $namaPelapor = $pelapor->nama ?? 'Bpk/Ibu Pegawai';

        if ($ticket instanceof Ticket) {
            $ticket->loadMissing(['resolution.pemeriksa', 'asset']);
            $resolution = $ticket->resolution;

            $nomorTiket = $ticket->nomor_aduan;
            $isAset = ($ticket->jenis_kendala ?? ($ticket->asset_id ? 'aset' : 'lainnya')) === 'aset';
            $perihal = 'Aduan Kendala IT (' . ($isAset ? ($ticket->asset?->nama_barang ?? 'Aset TIK') : 'Non-Aset / Aplikasi / Jaringan') . ')';
            $teknisi = $resolution?->pemeriksa?->nama ?? (auth()->user()->nama ?? 'Tim IT BPOM');
            $waktuSelesai = $resolution?->tgl_hasil ? date('d-m-Y H:i', strtotime($resolution->tgl_hasil)) : date('d-m-Y H:i');

            $solusi = $resolution?->tindak_lanjut_teknis 
                ?? $resolution?->hasil 
                ?? 'Kendala telah selesai diperiksa dan ditangani oleh teknisi IT.';

            $url = route('incidents.show', $ticket->id);
        } else {
            // ServiceRequest
            $ticket->loadMissing(['resolution.petugas']);
            $resolution = $ticket->resolution;

            // Format perihal layanan
            $namaLayanan = match(strtolower($ticket->layanan)) {
                'zoom' => 'Fasilitasi Zoom Meeting',
                'reset_password' => 'Reset Password Akun',
                'tambah_akun' => 'Pembuatan Akun Baru',
                'peminjaman' => 'Peminjaman Perangkat IT',
                'konsultasi' => 'Konsultasi IT',
                'operator' => 'Operator Kegiatan',
                default => 'Layanan IT Lainnya'
            };
            $perihal = 'Permintaan Layanan IT (' . $namaLayanan . ')';
            $teknisi = $resolution?->petugas?->nama ?? (auth()->user()->nama ?? 'Tim IT BPOM');
            $waktuSelesai = $ticket->completed_at ? date('d-m-Y H:i', strtotime($ticket->completed_at)) : date('d-m-Y H:i');

            $solusi = $resolution?->tindak_lanjut 
                ?? 'Permintaan layanan Anda telah selesai diproses oleh Tim IT.';

            // Jika ada detail Zoom
            if (in_array(strtolower($ticket->layanan), ['zoom', 'fasilitasi zoom']) && $resolution) {
                if (!empty($resolution->zoom_link)) {
                    $solusi .= "\n\n🔗 *Link Zoom*: " . $resolution->zoom_link;
                }
                if (!empty($resolution->zoom_meeting_id)) {
                    $solusi .= "\n🆔 *Meeting ID*: " . $resolution->zoom_meeting_id;
                }
                if (!empty($resolution->zoom_passcode)) {
                    $solusi .= "\n🔑 *Passcode*: " . $resolution->zoom_passcode;
                }
            }

            $url = route('requests.show', $ticket->id);
        }

        $message = "✅ *TIKET TELAH SELESAI - ITSM BPOM*\n\n"
            . "Yth. Bpk/Ibu *{$namaPelapor}*,\n"
            . "Tiket pengajuan Anda telah selesai ditangani oleh Tim IT BPOM:\n\n"
            . "📌 *No. Tiket*: {$nomorTiket}\n"
            . "📋 *Perihal*: {$perihal}\n"
            . "📅 *Selesai Pada*: {$waktuSelesai}\n"
            . "👨‍💻 *Petugas/Teknisi*: {$teknisi}\n\n"
            . "🛠️ *Tindakan / Solusi*:\n"
            . "\"{$solusi}\"\n\n"
            . "Detail lengkap tiket dapat Anda akses di:\n"
            . "👉 {$url}\n\n"
            . "Terima kasih atas kerja sama Anda.\n"
            . "_Sistem Informasi Layanan IT BPOM_";

        SendWhatsAppJob::dispatchSmart($pelapor->no_telp, $message);
    }
}
