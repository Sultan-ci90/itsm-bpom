<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Services\FonnteService;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Tampilkan halaman pengaturan WhatsApp Gateway & Notifikasi.
     */
    public function whatsapp(FonnteService $fonnte)
    {
        $settings = [
            'fonnte_token' => Setting::get('fonnte_token', config('fonnte.token', '')),
            'fonnte_enabled' => Setting::getBool('fonnte_enabled', config('fonnte.enabled', true)),
            'fonnte_target_admin' => Setting::get('fonnte_target_admin', config('fonnte.target_admin', '')),
            'fonnte_use_queue_worker' => Setting::getBool('fonnte_use_queue_worker', false),
            'email_notification_enabled' => Setting::getBool('email_notification_enabled', false),
        ];

        $deviceInfo = null;
        if (!empty($settings['fonnte_token'])) {
            $deviceInfo = $fonnte->checkDeviceStatus();
        }

        return view('settings.whatsapp', compact('settings', 'deviceInfo'));
    }

    /**
     * Perbarui konfigurasi WhatsApp Gateway.
     */
    public function updateWhatsapp(Request $request)
    {
        $validated = $request->validate([
            'fonnte_token' => 'nullable|string|max:255',
            'fonnte_target_admin' => 'nullable|string|max:500',
        ]);

        Setting::set(
            'fonnte_token',
            $validated['fonnte_token'] ?? '',
            'whatsapp',
            'string',
            'Token API akun Fonnte WhatsApp Gateway'
        );

        Setting::set(
            'fonnte_enabled',
            $request->has('fonnte_enabled') ? 'true' : 'false',
            'whatsapp',
            'boolean',
            'Status aktif integrasi WhatsApp Gateway'
        );

        Setting::set(
            'fonnte_target_admin',
            $validated['fonnte_target_admin'] ?? '',
            'whatsapp',
            'string',
            'Nomor WhatsApp tambahan atau ID grup Tim IT BPOM (dipisahkan koma)'
        );

        Setting::set(
            'fonnte_use_queue_worker',
            $request->has('fonnte_use_queue_worker') ? 'true' : 'false',
            'whatsapp',
            'boolean',
            'Gunakan antrean worker database (queue:work)'
        );

        Setting::set(
            'email_notification_enabled',
            $request->has('email_notification_enabled') ? 'true' : 'false',
            'notification',
            'boolean',
            'Status aktif notifikasi email saat status tiket selesai'
        );

        return redirect()->route('settings.whatsapp')
            ->with('success', 'Konfigurasi WhatsApp Gateway berhasil disimpan.');
    }

    /**
     * Kirim pesan uji coba (Test Send).
     */
    public function testSend(Request $request, FonnteService $fonnte)
    {
        $request->validate([
            'target' => 'required|string',
            'message' => 'required|string|max:1000',
        ], [
            'target.required' => 'Nomor HP tujuan uji coba wajib diisi.',
            'message.required' => 'Pesan uji coba wajib diisi.',
        ]);

        $result = $fonnte->sendRawMessage($request->target, $request->message);

        if ($result['status'] === true) {
            return redirect()->route('settings.whatsapp')
                ->with('success', 'Pesan uji coba berhasil dikirim ke ' . $request->target . '!');
        }

        return redirect()->route('settings.whatsapp')
            ->with('error', 'Gagal mengirim pesan uji coba: ' . ($result['reason'] ?? 'Periksa token atau koneksi WhatsApp.'));
    }
}
