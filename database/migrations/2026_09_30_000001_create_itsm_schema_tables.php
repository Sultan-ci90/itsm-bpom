<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // ---------- 1. TABEL REFERENSI (tanpa FK) ----------
        Schema::create('bidang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bidang', 100);
        });

        Schema::create('jabatan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jabatan', 150);
        });

        Schema::create('panggol', function (Blueprint $table) {
            $table->id();
            $table->string('pangkat', 100);
            $table->string('golongan', 20);
        });

        Schema::create('banjar_captchas', function (Blueprint $table) {
            $table->id();
            $table->string('kata_banjar', 255);
            $table->string('arti_indonesia', 255);
            $table->timestamps();
        });

        // ---------- 2. USERS (termasuk field profil baru) ----------
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 30)->unique();
            $table->string('nama', 150);
            $table->string('email', 150)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();

            // Field profil wajib
            $table->string('tempat_lahir', 100);
            $table->date('tanggal_lahir');
            $table->enum('jenkel', ['L', 'P']);
            $table->enum('status_kepegawaian', ['PNS', 'PPPK', 'Honorer', 'Lainnya']);
            $table->enum('status_pernikahan', ['Belum Menikah', 'Menikah', 'Janda', 'Duda']);
            $table->string('no_telp', 20);
            $table->text('alamat');
            $table->string('jabatan_fungsional', 150)->nullable();

            // Relasi referensi
            $table->foreignId('bidang_id')->nullable()->constrained('bidang')->nullOnDelete();
            $table->foreignId('jabatan_id')->nullable()->constrained('jabatan')->nullOnDelete();
            $table->foreignId('panggol_id')->nullable()->constrained('panggol')->nullOnDelete();

            $table->enum('role', ['pelapor', 'teknisi', 'admin'])->default('pelapor');
            $table->timestamps();
        });

        // ---------- 3. ASSETS (tanpa timestamps, sesuai itsm.sql) ----------
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang', 50);
            $table->string('nama_barang', 150);
            $table->string('merk_type', 100)->nullable();
            $table->string('nup', 50);
            $table->date('tgl_terima')->nullable();
            $table->string('jenis_barang', 100)->nullable();
            $table->string('satuan', 30)->default('buah');
            $table->string('lokasi', 150)->nullable();
            $table->foreignId('penanggung_jawab_id')->nullable()->constrained('users')->nullOnDelete();
            $table->enum('status_kondisi', ['Baik', 'Rusak'])->default('Baik');
            $table->text('spesifikasi')->nullable();
            $table->string('foto_barang', 255)->nullable();
        });

        // ---------- 4. TICKETS (hanya created_at) ----------
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_aduan', 50)->unique();
            $table->foreignId('asset_id')->constrained('assets')->cascadeOnDelete();
            $table->foreignId('pelapor_id')->constrained('users')->cascadeOnDelete();
            $table->date('tgl_pelaporan');
            $table->text('deskripsi_masalah');
            $table->string('foto_kendala', 255)->nullable();
            $table->enum('status', ['Belum diperiksa', 'Sedang diproses', 'Selesai', 'Ditolak'])->default('Belum diperiksa');
            $table->timestamp('created_at')->useCurrent();
        });

        // ---------- 5. TICKET RESOLUTIONS (tanpa timestamps) ----------
        Schema::create('ticket_resolutions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ticket_id')->unique()->constrained('tickets')->cascadeOnDelete();
            $table->foreignId('pemeriksa_id')->nullable()->constrained('users')->nullOnDelete();
            $table->enum('jenis_penyelesaian', ['Internal', 'Pihak ke-3'])->default('Internal');
            $table->string('vendor', 150)->nullable();
            $table->decimal('estimasi_biaya', 12, 2)->nullable();
            $table->date('tgl_analisa')->nullable();
            $table->text('analisa_teknis')->nullable();
            $table->date('tgl_tindak_lanjut')->nullable();
            $table->text('tindak_lanjut_teknis')->nullable();
            $table->date('tgl_hasil')->nullable();
            $table->text('hasil')->nullable();
            $table->string('file_surat_justifikasi', 255)->nullable();
        });

        // ---------- 6. TICKET HISTORIES (hanya created_at) ----------
        Schema::create('ticket_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ticket_id')->constrained('tickets')->cascadeOnDelete();
            $table->string('status_label', 100);
            $table->text('keterangan')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });

        // ---------- 7. SERVICE REQUESTS (hanya created_at) ----------
        Schema::create('service_requests', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_request', 50)->unique();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('layanan', 100);
            $table->date('tgl_request');
            $table->string('lokasi', 100);
            $table->text('deskripsi')->nullable();
            $table->enum('status', ['Diajukan', 'Diproses', 'Selesai', 'Ditolak'])->default('Diajukan');
            $table->timestamp('created_at')->useCurrent();
        });

        // ---------- 8. DETAIL REQUEST (tanpa timestamps) ----------
        Schema::create('req_detail_zoom', function (Blueprint $table) {
            $table->id();
            $table->foreignId('request_id')->unique()->constrained('service_requests')->cascadeOnDelete();
            $table->foreignId('bidang_id')->nullable()->constrained('bidang')->nullOnDelete();
            $table->string('nama_acara', 255);
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->string('jenis_acara', 50)->nullable();
            $table->enum('butuh_operator', ['Ya', 'Tidak'])->default('Tidak');
            $table->string('bentuk_ruangan', 100)->nullable();
            $table->integer('jumlah_kursi')->nullable();
        });

        Schema::create('req_detail_akun', function (Blueprint $table) {
            $table->id();
            $table->foreignId('request_id')->unique()->constrained('service_requests')->cascadeOnDelete();
            $table->string('jenis_pengajuan', 100)->nullable();
            $table->string('sistem_tujuan', 100)->nullable();
            $table->string('nip_terkait', 50)->nullable();
        });

        Schema::create('req_detail_peminjaman', function (Blueprint $table) {
            $table->id();
            $table->foreignId('request_id')->unique()->constrained('service_requests')->cascadeOnDelete();
            $table->string('jenis_perangkat', 255);
            $table->date('tgl_mulai')->nullable();
            $table->date('tgl_kembali')->nullable();
            $table->text('keperluan')->nullable();
            $table->string('lokasi_penggunaan', 100)->nullable();
        });
    }

    public function down(): void
    {
        // Urutan drop wajib kebalikan dari pembuatan
        Schema::dropIfExists('req_detail_peminjaman');
        Schema::dropIfExists('req_detail_akun');
        Schema::dropIfExists('req_detail_zoom');
        Schema::dropIfExists('service_requests');
        Schema::dropIfExists('ticket_histories');
        Schema::dropIfExists('ticket_resolutions');
        Schema::dropIfExists('tickets');
        Schema::dropIfExists('assets');
        Schema::dropIfExists('users');
        Schema::dropIfExists('banjar_captchas');
        Schema::dropIfExists('panggol');
        Schema::dropIfExists('jabatan');
        Schema::dropIfExists('bidang');
    }
};