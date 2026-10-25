<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('service_request_resolutions', function (Blueprint $table) {
            $table->dropColumn([
                'akun_password_baru',
                'akun_instruksi_login',
                'pinjam_perangkat_diserahkan',
                'pinjam_catatan_pengembalian',
            ]);
        });
    }

    public function down(): void
    {
        Schema::table('service_request_resolutions', function (Blueprint $table) {
            $table->string('akun_password_baru', 255)->nullable()->after('zoom_passcode');
            $table->text('akun_instruksi_login')->nullable()->after('akun_password_baru');
            $table->string('pinjam_perangkat_diserahkan', 255)->nullable()->after('akun_instruksi_login');
            $table->text('pinjam_catatan_pengembalian')->nullable()->after('pinjam_perangkat_diserahkan');
        });
    }
};
