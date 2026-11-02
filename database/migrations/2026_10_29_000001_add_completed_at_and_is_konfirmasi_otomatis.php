<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            if (!Schema::hasColumn('tickets', 'completed_at')) {
                $table->timestamp('completed_at')->nullable()->after('status');
            }
            if (!Schema::hasColumn('tickets', 'is_konfirmasi_otomatis')) {
                $table->boolean('is_konfirmasi_otomatis')->default(false)->after('konfirmasi_selesai_at');
            }
        });

        Schema::table('service_requests', function (Blueprint $table) {
            if (!Schema::hasColumn('service_requests', 'is_konfirmasi_otomatis')) {
                $table->boolean('is_konfirmasi_otomatis')->default(false)->after('konfirmasi_selesai_at');
            }
        });

        // Backfill completed_at untuk tiket lama yang berstatus Selesai agar tidak null
        DB::table('tickets')
            ->where('status', 'Selesai')
            ->whereNull('completed_at')
            ->update(['completed_at' => DB::raw('COALESCE(konfirmasi_selesai_at, created_at)')]);

        DB::table('service_requests')
            ->where('status', 'Selesai')
            ->whereNull('completed_at')
            ->update(['completed_at' => DB::raw('COALESCE(konfirmasi_selesai_at, created_at)')]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            if (Schema::hasColumn('tickets', 'completed_at')) {
                $table->dropColumn('completed_at');
            }
            if (Schema::hasColumn('tickets', 'is_konfirmasi_otomatis')) {
                $table->dropColumn('is_konfirmasi_otomatis');
            }
        });

        Schema::table('service_requests', function (Blueprint $table) {
            if (Schema::hasColumn('service_requests', 'is_konfirmasi_otomatis')) {
                $table->dropColumn('is_konfirmasi_otomatis');
            }
        });
    }
};
