<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::set(
            'fonnte_token',
            env('FONNTE_TOKEN', ''),
            'whatsapp',
            'string',
            'Token API akun Fonnte WhatsApp Gateway'
        );

        Setting::set(
            'fonnte_enabled',
            'true',
            'whatsapp',
            'boolean',
            'Status aktif integrasi WhatsApp Gateway'
        );

        Setting::set(
            'fonnte_target_admin',
            env('FONNTE_TARGET_ADMIN', ''),
            'whatsapp',
            'string',
            'Nomor WhatsApp tambahan atau ID grup Tim IT BPOM (dipisahkan koma)'
        );

        Setting::set(
            'email_notification_enabled',
            'false',
            'notification',
            'boolean',
            'Status aktif notifikasi email saat status tiket selesai'
        );
    }
}
