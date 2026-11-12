<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('sibob_id', 64)->nullable()->unique()->after('id');
            $table->timestamp('sibob_synced_at')->nullable()->after('role');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique(['sibob_id']);
            $table->dropColumn(['sibob_id', 'sibob_synced_at']);
        });
    }
};
