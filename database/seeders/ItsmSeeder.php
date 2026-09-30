<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ItsmSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Referensi Bidang
        DB::table('bidang')->insert([
            ['nama_bidang' => 'Umum (Tata Usaha)'],
            ['nama_bidang' => 'Pengawasan'],
            ['nama_bidang' => 'Regulasi'],
            ['nama_bidang' => 'Sumber Daya Manusia'],
        ]);

        // 2. Referensi Jabatan
        DB::table('jabatan')->insert([
            ['nama_jabatan' => 'Kepala Bidang'],
            ['nama_jabatan' => 'Kasubag'],
            ['nama_jabatan' => 'Staff'],
        ]);

        // 3. Referensi Pangkat & Golongan
        DB::table('panggol')->insert([
            ['pangkat' => 'Pembina Utama Muda', 'golongan' => 'IV/c'],
            ['pangkat' => 'Pembina', 'golongan' => 'IV/a'],
            ['pangkat' => 'Penata', 'golongan' => 'III/c'],
        ]);

        // 4. Data Captcha Banjar (sesuai itsm.sql)
        DB::table('banjar_captchas')->insert([
            ['kata_banjar' => 'Guring', 'arti_indonesia' => 'Tidur'],
            ['kata_banjar' => 'Bungas', 'arti_indonesia' => 'Cantik'],
            ['kata_banjar' => 'Kada', 'arti_indonesia' => 'Tidak'],
            ['kata_banjar' => 'Banyu', 'arti_indonesia' => 'Air'],
            ['kata_banjar' => 'Ganal', 'arti_indonesia' => 'Besar'],
            ['kata_banjar' => 'Halus', 'arti_indonesia' => 'Kecil'],
            ['kata_banjar' => 'Rancak', 'arti_indonesia' => 'Sering'],
            ['kata_banjar' => 'Haur', 'arti_indonesia' => 'Sibuk'],
            ['kata_banjar' => 'Bepander', 'arti_indonesia' => 'Bicara'],
            ['kata_banjar' => 'Supan', 'arti_indonesia' => 'Malu'],
            ['kata_banjar' => 'Bujur', 'arti_indonesia' => 'Benar'],
            ['kata_banjar' => 'Wadai', 'arti_indonesia' => 'Kue'],
            ['kata_banjar' => 'Iwak', 'arti_indonesia' => 'Ikan'],
            ['kata_banjar' => 'Hanyar', 'arti_indonesia' => 'Baru'],
            ['kata_banjar' => 'Lawas', 'arti_indonesia' => 'Lama'],
            ['kata_banjar' => 'Kuitan', 'arti_indonesia' => 'Orang tua'],
            ['kata_banjar' => 'Dangsanak', 'arti_indonesia' => 'Saudara'],
            ['kata_banjar' => 'Tapas', 'arti_indonesia' => 'Cuci'],
            ['kata_banjar' => 'Ulun', 'arti_indonesia' => 'Saya'],
            ['kata_banjar' => 'Pian', 'arti_indonesia' => 'Kamu'],
        ]);

        // 5. User awal untuk testing ketiga role
        $profilDefault = [
            'tempat_lahir' => 'Banjarmasin',
            'tanggal_lahir' => '1990-01-01',
            'jenkel' => 'L',
            'status_kepegawaian' => 'PNS',
            'status_pernikahan' => 'Menikah',
            'no_telp' => '081234567890',
            'alamat' => 'Jl. A. Yani No. 1, Banjarmasin',
            'jabatan_fungsional' => null,
            'bidang_id' => 1,
            'jabatan_id' => 3,
            'panggol_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        DB::table('users')->insert([
            array_merge($profilDefault, [
                'nip' => '001', 'nama' => 'Admin ITSM',
                'email' => 'admin@bpom.test', 'password' => Hash::make('password'),
                'role' => 'admin', 'jabatan_fungsional' => 'Pranata Komputer',
            ]),
            array_merge($profilDefault, [
                'nip' => '002', 'nama' => 'Teknisi IT',
                'email' => 'teknisi@bpom.test', 'password' => Hash::make('password'),
                'role' => 'teknisi',
            ]),
            array_merge($profilDefault, [
                'nip' => '003', 'nama' => 'Pegawai Pelapor',
                'email' => 'pelapor@bpom.test', 'password' => Hash::make('password'),
                'role' => 'pelapor',
            ]),
        ]);
    }
}