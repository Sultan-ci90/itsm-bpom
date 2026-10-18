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
        Schema::table('service_requests', function (Blueprint $table) {
            $table->timestamp('completed_at')->nullable()->after('status');
            $table->boolean('is_chat_closed')->default(false)->after('completed_at');
            $table->timestamp('chat_closed_at')->nullable()->after('is_chat_closed');
            $table->foreignId('chat_closed_by')->nullable()->after('chat_closed_at')->constrained('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_requests', function (Blueprint $table) {
            $table->dropForeign(['chat_closed_by']);
            $table->dropColumn(['completed_at', 'is_chat_closed', 'chat_closed_at', 'chat_closed_by']);
        });
    }
};
