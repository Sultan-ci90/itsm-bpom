<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Perluas enum agar menerima 'Internal', 'mandiri', dan 'Pihak ke-3'
        DB::statement("ALTER TABLE `ticket_resolutions` MODIFY COLUMN `jenis_penyelesaian` ENUM('Internal', 'mandiri', 'Pihak ke-3') NOT NULL DEFAULT 'mandiri'");

        // 2. Migrasikan data lama yang masih bernilai 'Internal' menjadi 'mandiri'
        DB::table('ticket_resolutions')
            ->where('jenis_penyelesaian', 'Internal')
            ->update(['jenis_penyelesaian' => 'mandiri']);

        // 3. Batasi enum hanya ke ('mandiri', 'Pihak ke-3')
        DB::statement("ALTER TABLE `ticket_resolutions` MODIFY COLUMN `jenis_penyelesaian` ENUM('mandiri', 'Pihak ke-3') NOT NULL DEFAULT 'mandiri'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // 1. Perluas enum agar menerima 'Internal' kembali
        DB::statement("ALTER TABLE `ticket_resolutions` MODIFY COLUMN `jenis_penyelesaian` ENUM('Internal', 'mandiri', 'Pihak ke-3') NOT NULL DEFAULT 'Internal'");

        // 2. Kembalikan data 'mandiri' menjadi 'Internal'
        DB::table('ticket_resolutions')
            ->where('jenis_penyelesaian', 'mandiri')
            ->update(['jenis_penyelesaian' => 'Internal']);

        // 3. Batasi enum ke ('Internal', 'Pihak ke-3')
        DB::statement("ALTER TABLE `ticket_resolutions` MODIFY COLUMN `jenis_penyelesaian` ENUM('Internal', 'Pihak ke-3') NOT NULL DEFAULT 'Internal'");
    }
};
