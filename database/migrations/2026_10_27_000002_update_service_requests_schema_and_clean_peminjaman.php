<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Bersihkan seluruh data permohonan peminjaman lama
        DB::table('service_requests')->where('layanan', 'peminjaman')->delete();

        // 2. Hapus tabel req_detail_peminjaman
        Schema::dropIfExists('req_detail_peminjaman');

        // 3. Ubah jenis layanan 'operator' menjadi 'rapat'
        DB::table('service_requests')->where('layanan', 'operator')->update(['layanan' => 'rapat']);

        // 4. Hapus kolom jenis_acara dari req_detail_zoom
        if (Schema::hasColumn('req_detail_zoom', 'jenis_acara')) {
            Schema::table('req_detail_zoom', function (Blueprint $table) {
                $table->dropColumn('jenis_acara');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (!Schema::hasColumn('req_detail_zoom', 'jenis_acara')) {
            Schema::table('req_detail_zoom', function (Blueprint $table) {
                $table->string('jenis_acara', 50)->nullable()->after('jam_selesai');
            });
        }

        DB::table('service_requests')->where('layanan', 'rapat')->update(['layanan' => 'operator']);

        if (!Schema::hasTable('req_detail_peminjaman')) {
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
    }
};
