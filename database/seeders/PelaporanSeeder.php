<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PelaporSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus data lama jika ada (untuk mencegah duplikat saat di-seed berulang)
        DB::table('users')->where('email', 'pelapor@bpom.test')->delete();

        // Insert akun pelapor baru
        DB::table('users')->insert([
            'nip' => '199001012023011001',
            'nama' => 'Budi Santoso',
            'email' => 'pelapor@bpom.test',
            'password' => Hash::make('password'), // Password: password
            'bidang_id' => null, // Bisa diisi ID bidang jika tabel bidang sudah ada
            'jabatan_id' => null,
            'panggol_id' => null,
            'role' => 'pelapor', // <-- INI KUNCINYA, HANYA STRING/ENUM
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}