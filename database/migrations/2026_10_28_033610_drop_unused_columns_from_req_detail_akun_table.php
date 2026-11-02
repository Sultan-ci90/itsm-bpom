<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('req_detail_akun', function (Blueprint $table) {
            $table->dropColumn(['nip_terkait', 'email', 'password']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('req_detail_akun', function (Blueprint $table) {
            $table->string('nip_terkait', 50)->nullable();
            $table->string('email', 150)->nullable();
            $table->string('password', 255)->nullable();
        });
    }
};
