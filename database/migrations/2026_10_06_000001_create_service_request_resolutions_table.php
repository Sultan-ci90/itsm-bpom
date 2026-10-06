<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_request_resolutions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('request_id')->unique()->constrained('service_requests')->cascadeOnDelete();
            $table->foreignId('petugas_id')->nullable()->constrained('users')->nullOnDelete();
            $table->date('tgl_tindak_lanjut')->nullable();
            $table->text('tindak_lanjut')->nullable(); // Catatan tindakan tim IT
            $table->text('alasan_penolakan')->nullable(); // Jika status ditolak

            // Output khusus Zoom
            $table->string('zoom_link', 500)->nullable();
            $table->string('zoom_meeting_id', 100)->nullable();
            $table->string('zoom_passcode', 100)->nullable();

            // Output khusus Akun (2 field: Password Baru/Sementara & Instruksi Login)
            $table->string('akun_password_baru', 255)->nullable();
            $table->text('akun_instruksi_login')->nullable();

            // Output khusus Peminjaman
            $table->string('pinjam_perangkat_diserahkan', 255)->nullable();
            $table->text('pinjam_catatan_pengembalian')->nullable();

            $table->timestamp('created_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_request_resolutions');
    }
};
