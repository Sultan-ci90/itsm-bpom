<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_requests', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_request')->unique();
            $table->string('judul_permintaan');
            $table->text('deskripsi')->nullable();
            $table->string('kategori')->default('Insiden'); // Insiden / Permintaan Layanan
            $table->string('prioritas')->default('Rendah'); // Rendah / Sedang / Tinggi / Darurat
            $table->foreignId('asset_id')->nullable()->constrained('assets')->nullOnDelete();
            $table->foreignId('pemohon_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('ditagihkan_ke')->nullable()->constrained('users')->nullOnDelete();
            $table->string('status')->default('baru'); // baru / diproses / selesai / ditolak
            $table->date('tgl_permintaan')->nullable();
            $table->timestamp('tgl_selesai')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_requests');
    }
};
