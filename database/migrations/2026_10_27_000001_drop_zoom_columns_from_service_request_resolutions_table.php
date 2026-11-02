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
        Schema::table('service_request_resolutions', function (Blueprint $table) {
            $columnsToDrop = [];
            if (Schema::hasColumn('service_request_resolutions', 'zoom_link')) {
                $columnsToDrop[] = 'zoom_link';
            }
            if (Schema::hasColumn('service_request_resolutions', 'zoom_meeting_id')) {
                $columnsToDrop[] = 'zoom_meeting_id';
            }
            if (Schema::hasColumn('service_request_resolutions', 'zoom_passcode')) {
                $columnsToDrop[] = 'zoom_passcode';
            }

            if (!empty($columnsToDrop)) {
                $table->dropColumn($columnsToDrop);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_request_resolutions', function (Blueprint $table) {
            if (!Schema::hasColumn('service_request_resolutions', 'zoom_link')) {
                $table->string('zoom_link', 500)->nullable();
            }
            if (!Schema::hasColumn('service_request_resolutions', 'zoom_meeting_id')) {
                $table->string('zoom_meeting_id', 50)->nullable();
            }
            if (!Schema::hasColumn('service_request_resolutions', 'zoom_passcode')) {
                $table->string('zoom_passcode', 100)->nullable();
            }
        });
    }
};
