<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// OPSIONAL: captcha sekarang hanya memakai kata_banjar, jadi arti tidak wajib lagi
// saat menambah kata baru.
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('banjar_captchas', function (Blueprint $table) {
            $table->string('arti_indonesia', 255)->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('banjar_captchas', function (Blueprint $table) {
            $table->string('arti_indonesia', 255)->nullable(false)->change();
        });
    }
};
