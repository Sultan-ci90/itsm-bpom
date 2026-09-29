<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->string('nomor_aduan')->unique()->after('id');
            $table->foreignId('asset_id')->nullable()->after('nomor_aduan')
                  ->constrained('assets')->nullOnDelete();
            $table->foreignId('pelapor_id')->nullable()->after('asset_id')
                  ->constrained('users')->nullOnDelete();
            $table->date('tgl_pelaporan')->nullable()->after('pelapor_id');
            $table->text('deskripsi_masalah')->nullable()->after('tgl_pelaporan');
            $table->string('foto_kendala')->nullable()->after('deskripsi_masalah');
        });
    }

    public function down(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropConstrainedForeignId('asset_id');
            $table->dropConstrainedForeignId('pelapor_id');
            $table->dropColumn([
                'nomor_aduan',
                'tgl_pelaporan',
                'deskripsi_masalah',
                'foto_kendala',
            ]);
        });
    }
};
