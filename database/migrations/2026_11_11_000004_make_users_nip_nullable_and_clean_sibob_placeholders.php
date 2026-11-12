<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nip', 30)->nullable()->change();
        });

        DB::table('users')
            ->where('nip', 'like', 'SIBOB-%')
            ->update(['nip' => null]);
    }

    public function down(): void
    {
        DB::table('users')
            ->whereNull('nip')
            ->update(['nip' => DB::raw("CONCAT('SIBOB-', id)")]);

        Schema::table('users', function (Blueprint $table) {
            $table->string('nip', 30)->nullable(false)->change();
        });
    }
};
