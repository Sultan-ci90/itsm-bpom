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
        Schema::table('ticket_resolutions', function (Blueprint $table) {
            if (Schema::hasColumn('ticket_resolutions', 'vendor')) {
                $table->dropColumn('vendor');
            }
            if (Schema::hasColumn('ticket_resolutions', 'estimasi_biaya')) {
                $table->dropColumn('estimasi_biaya');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ticket_resolutions', function (Blueprint $table) {
            $table->string('vendor', 150)->nullable()->after('jenis_penyelesaian');
            $table->decimal('estimasi_biaya', 12, 2)->nullable()->after('vendor');
        });
    }
};
