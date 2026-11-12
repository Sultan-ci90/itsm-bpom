<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('users')->where('role', 'teknisi')->update(['role' => 'admin']);

        if (in_array(DB::getDriverName(), ['mysql', 'mariadb'], true)) {
            DB::statement("ALTER TABLE `users` MODIFY COLUMN `role` ENUM('pelapor', 'admin') NOT NULL DEFAULT 'pelapor'");
        }
    }

    public function down(): void
    {
        if (in_array(DB::getDriverName(), ['mysql', 'mariadb'], true)) {
            DB::statement("ALTER TABLE `users` MODIFY COLUMN `role` ENUM('pelapor', 'teknisi', 'admin') NOT NULL DEFAULT 'pelapor'");
        }
    }
};
