<?php

namespace Database\Seeders;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();

        Ticket::create([
            'nomor_aduan' => 'INC-0001',
            'ticket_number' => 'INC-0001',
            'title' => 'Komputer tidak dapat terhubung ke jaringan',
            'pelapor_id' => $user?->id,
            'tgl_pelaporan' => now()->toDateString(),
            'deskripsi_masalah' => 'User mengalami masalah koneksi jaringan.',
            'description' => 'User mengalami masalah koneksi jaringan.',
            'status' => 'Belum diperiksa',
            'user_id' => $user?->id,
        ]);

        Ticket::create([
            'nomor_aduan' => 'INC-0002',
            'ticket_number' => 'INC-0002',
            'title' => 'Aplikasi internal tidak dapat dibuka',
            'pelapor_id' => $user?->id,
            'tgl_pelaporan' => now()->toDateString(),
            'deskripsi_masalah' => 'Aplikasi mengalami error ketika dibuka.',
            'description' => 'Aplikasi mengalami error ketika dibuka.',
            'status' => 'Diperiksa Teknisi',
            'user_id' => $user?->id,
        ]);

        Ticket::create([
            'nomor_aduan' => 'INC-0003',
            'ticket_number' => 'INC-0003',
            'title' => 'Reset password user',
            'pelapor_id' => $user?->id,
            'tgl_pelaporan' => now()->toDateString(),
            'deskripsi_masalah' => 'User meminta reset password.',
            'description' => 'User meminta reset password.',
            'status' => 'Selesai',
            'user_id' => $user?->id,
        ]);

        Ticket::create([
            'nomor_aduan' => 'INC-0004',
            'ticket_number' => 'INC-0004',
            'title' => 'Instalasi software',
            'pelapor_id' => $user?->id,
            'tgl_pelaporan' => now()->toDateString(),
            'deskripsi_masalah' => 'Instalasi software pada komputer user.',
            'description' => 'Instalasi software pada komputer user.',
            'status' => 'Selesai',
            'user_id' => $user?->id,
        ]);
    }
}