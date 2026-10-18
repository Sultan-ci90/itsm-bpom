<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lokasi;
use App\Models\Bidang;

class LokasiSeeder extends Seeder
{
    public function run(): void
    {
        $tu = Bidang::where('nama_bidang', 'like', '%Tata Usaha%')->orWhere('nama_bidang', 'like', '%Umum%')->first();
        $pengawasan = Bidang::where('nama_bidang', 'like', '%Pengawasan%')->first();
        $regulasi = Bidang::where('nama_bidang', 'like', '%Regulasi%')->first();
        $sdm = Bidang::where('nama_bidang', 'like', '%Sumber Daya%')->orWhere('nama_bidang', 'like', '%SDM%')->first();

        $initialLokasi = [
            // Lokasi Staff terikat Bidang
            ['nama_lokasi' => 'Ruang Staff Tata Usaha', 'bidang_id' => $tu?->id],
            ['nama_lokasi' => 'Ruang Staff Pengawasan', 'bidang_id' => $pengawasan?->id],
            ['nama_lokasi' => 'Ruang Staff Regulasi', 'bidang_id' => $regulasi?->id],
            ['nama_lokasi' => 'Ruang Staff SDM', 'bidang_id' => $sdm?->id],
            ['nama_lokasi' => 'Ruang Rapat Bidang Pengawasan', 'bidang_id' => $pengawasan?->id],
            ['nama_lokasi' => 'Ruang Rapat Bidang Regulasi', 'bidang_id' => $regulasi?->id],

            // Lokasi Umum / Bersama (bidang_id = null)
            ['nama_lokasi' => 'Ruang Rapat Utama', 'bidang_id' => null],
            ['nama_lokasi' => 'Aula BPOM', 'bidang_id' => null],
            ['nama_lokasi' => 'Luar Kantor', 'bidang_id' => null],
        ];

        foreach ($initialLokasi as $data) {
            Lokasi::firstOrCreate(
                ['nama_lokasi' => $data['nama_lokasi']],
                ['bidang_id' => $data['bidang_id']]
            );
        }
    }
}
