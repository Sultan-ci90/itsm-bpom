<?php

use App\Models\KnowledgeBase;
use App\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

beforeEach(function () {
    if (DB::getDriverName() === 'sqlite') {
        $tables = [
            'knowledge_bases',
            'users',
            'cache',
        ];

        foreach ($tables as $table) {
            Schema::dropIfExists($table);
        }

        Schema::create('cache', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->text('value');
            $table->integer('expiration');
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 30)->unique();
            $table->string('nama', 150);
            $table->string('email', 150)->unique();
            $table->string('password');
            $table->string('foto_profil')->nullable();
            $table->rememberToken();
            $table->string('role', 20)->default('pelapor');
            $table->timestamps();
        });

        Schema::create('notifications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('type');
            $table->morphs('notifiable');
            $table->text('data');
            $table->timestamp('read_at')->nullable();
            $table->timestamps();
        });

        Schema::create('knowledge_bases', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug')->unique();
            $table->string('kategori');
            $table->text('ringkasan');
            $table->longText('solusi');
            $table->string('gambar')->nullable();
            $table->boolean('is_published')->default(true);
            $table->unsignedInteger('helpful_yes')->default(0);
            $table->unsignedInteger('helpful_no')->default(0);
            $table->unsignedInteger('views')->default(0);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamps();
        });
    }

    \Illuminate\Support\Facades\Cache::flush();
    $this->withoutVite();
});

function createFaqUser(string $role = 'pelapor', string $nip = '001'): User
{
    return User::create([
        'nip' => $nip,
        'nama' => 'User ' . ucfirst($role),
        'email' => "{$role}{$nip}@bpom.test",
        'password' => Hash::make('password'),
        'role' => $role,
    ]);
}

test('guest is redirected to signin when accessing panduan index', function () {
    $this->get(route('panduan.index'))
        ->assertRedirect(route('login'));
});

test('faq cards are full-card clickable with stretched link and show solution steps on detail', function () {
    $pelapor = createFaqUser('pelapor', '010');

    $panduan = KnowledgeBase::create([
        'judul' => 'Cara Mengatasi Printer Jaringan Offline',
        'slug' => 'cara-mengatasi-printer-jaringan-offline',
        'kategori' => 'Hardware & Printer',
        'ringkasan' => 'Panduan cepat menyambungkan kembali printer yang tidak merespon.',
        'solusi' => "1. Periksa kabel LAN printer.\n2. Cek alamat IP printer di Control Panel.\n3. Restart printer dan spooler Windows.",
        'is_published' => true,
        'views' => 12,
        'helpful_yes' => 5,
        'created_by' => $pelapor->id,
    ]);

    // Halaman index FAQ
    $response = $this->actingAs($pelapor)->get(route('panduan.index'));
    $response->assertOk()
        ->assertSee('Cara Mengatasi Printer Jaringan Offline')
        ->assertSee('Hardware & Printer')
        ->assertSee('Baca Solusi &rarr;', false)
        // Verifikasi kelas full-card clickable dan stretched link
        ->assertSee('relative group flex flex-col justify-between rounded-2xl border border-stroke bg-white p-6 shadow-default transition-all hover:-translate-y-1 hover:border-brand-500 hover:shadow-lg dark:border-gray-800 dark:bg-white/[0.03] cursor-pointer', false)
        ->assertSee('<span class="absolute inset-0" aria-hidden="true"></span>', false)
        ->assertSee(route('panduan.show', $panduan->slug), false);

    // Navigasi ke detail tata cara
    $detailResponse = $this->actingAs($pelapor)->get(route('panduan.show', $panduan->slug));
    $detailResponse->assertOk()
        ->assertSee('Cara Mengatasi Printer Jaringan Offline')
        ->assertSee('Langkah-Langkah Solusi')
        ->assertSee('1. Periksa kabel LAN printer.')
        ->assertSee('2. Cek alamat IP printer di Control Panel.')
        ->assertSee('3. Restart printer dan spooler Windows.')
        ->assertSee('Apakah panduan ini membantu menyelesaikan kendala Anda?');
});

test('staff sees edit and delete buttons protected with relative z-10 on faq cards', function () {
    $admin = createFaqUser('admin', '099');

    $panduan = KnowledgeBase::create([
        'judul' => 'Reset Kata Sandi Akun Email BPOM',
        'slug' => 'reset-kata-sandi-akun-email-bpom',
        'kategori' => 'Akun & Akses',
        'ringkasan' => 'Langkah mandiri memulihkan kata sandi email internal.',
        'solusi' => 'Buka portal webmail, pilih Lupa Password, lalu ikuti instruksi.',
        'is_published' => true,
        'created_by' => $admin->id,
    ]);

    $response = $this->actingAs($admin)->get(route('panduan.index'));
    $response->assertOk()
        ->assertSee('Reset Kata Sandi Akun Email BPOM')
        ->assertSee('relative z-10 mt-3 flex items-center justify-end gap-2 border-t border-dashed border-stroke pt-2 dark:border-gray-800', false)
        ->assertSee(route('panduan.edit', $panduan->id), false)
        ->assertSee(route('panduan.destroy', $panduan->id), false);
});
