<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('req_detail_zoom', function (Blueprint $table) {
            $table->date('tgl_acara')->nullable()->after('bidang_id');
        });
    }

    public function down(): void
    {
        Schema::table('req_detail_zoom', function (Blueprint $table) {
            $table->dropColumn('tgl_acara');
        });
    }
};
