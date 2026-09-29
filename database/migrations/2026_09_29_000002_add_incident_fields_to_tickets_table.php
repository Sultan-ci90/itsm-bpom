<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // SQLite tidak mendukung perubahan kolom, jadi rebuild tabel via temporary table
        $tickets = DB::table('tickets')->get()->map(fn ($t) => (array) $t)->all();

        Schema::table('tickets', function (Blueprint $table) {
            $table->dropUnique(['ticket_number']);
        });

        Schema::rename('tickets', 'tickets_old');

        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_aduan')->nullable()->unique();
            $table->foreignId('asset_id')->nullable()->constrained('assets')->nullOnDelete();
            $table->foreignId('pelapor_id')->nullable()->constrained('users')->nullOnDelete();
            $table->date('tgl_pelaporan')->nullable();
            $table->text('deskripsi_masalah')->nullable();
            $table->string('foto_kendala')->nullable();
            $table->string('ticket_number')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('status')->default('open');
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });

        foreach ($tickets as $t) {
            $t['nomor_aduan'] = $t['ticket_number'] ?? null;
            DB::table('tickets')->insert($t);
        }

        Schema::dropIfExists('tickets_old');
    }

    public function down(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropConstrainedForeignId('asset_id');
            $table->dropConstrainedForeignId('pelapor_id');
            $table->dropColumn([
                'nomor_aduan',
                'tgl_pelaporan',
                'deskripsi_masalah',
                'foto_kendala',
            ]);
        });
    }
};
