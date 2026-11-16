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
        Schema::table('assets', function (Blueprint $table) {
            $table->date('tgl_perolehan')->nullable()->after('tgl_terima');
            $table->date('tgl_buku_pertama')->nullable()->after('tgl_perolehan');
            $table->decimal('nilai_perolehan', 15, 2)->nullable()->after('status_kondisi');
            $table->string('status_kondisi', 50)->default('Baik')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('assets', function (Blueprint $table) {
            $table->dropColumn(['tgl_perolehan', 'tgl_buku_pertama', 'nilai_perolehan']);
            $table->enum('status_kondisi', ['Baik', 'Rusak'])->default('Baik')->change();
        });
    }
};
