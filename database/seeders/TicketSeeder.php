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
            'ticket_number' => 'INC-0001',
            'title' => 'Komputer tidak dapat terhubung ke jaringan',
            'description' => 'User mengalami masalah koneksi jaringan.',
            'status' => 'open',
            'user_id' => $user?->id,
        ]);

        Ticket::create([
            'ticket_number' => 'INC-0002',
            'title' => 'Aplikasi internal tidak dapat dibuka',
            'description' => 'Aplikasi mengalami error ketika dibuka.',
            'status' => 'in_progress',
            'user_id' => $user?->id,
        ]);

        Ticket::create([
            'ticket_number' => 'INC-0003',
            'title' => 'Reset password user',
            'description' => 'User meminta reset password.',
            'status' => 'resolved',
            'user_id' => $user?->id,
        ]);

        Ticket::create([
            'ticket_number' => 'INC-0004',
            'title' => 'Instalasi software',
            'description' => 'Instalasi software pada komputer user.',
            'status' => 'closed',
            'user_id' => $user?->id,
        ]);
    }
}