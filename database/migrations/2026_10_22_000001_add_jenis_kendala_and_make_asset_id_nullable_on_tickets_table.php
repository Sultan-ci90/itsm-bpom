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
        Schema::table('tickets', function (Blueprint $table) {
            $table->string('jenis_kendala', 50)->default('lainnya')->after('nomor_aduan');
            $table->foreignId('asset_id')->nullable()->change();
        });

        // Set tiket eksisting yang punya asset_id ke jenis_kendala = 'aset'
        DB::table('tickets')->whereNotNull('asset_id')->update(['jenis_kendala' => 'aset']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->foreignId('asset_id')->nullable(false)->change();
            $table->dropColumn('jenis_kendala');
        });
    }
};
