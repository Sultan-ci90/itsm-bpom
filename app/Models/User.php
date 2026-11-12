<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'nip',
        'nama',
        'email',
        'password',
        'foto_profil',
        'tempat_lahir',
        'tanggal_lahir',
        'jenkel',
        'status_kepegawaian',
        'status_pernikahan',
        'no_telp',
        'alamat',
        'jabatan_fungsional',
        'bidang_id',
        'jabatan_id',
        'panggol_id',
        'role',
        'sibob_id',
        'sibob_synced_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'sibob_synced_at' => 'datetime',
        ];
    }

    // Relasi
    public function bidang(): BelongsTo { return $this->belongsTo(Bidang::class, 'bidang_id'); }
    public function jabatan(): BelongsTo { return $this->belongsTo(Jabatan::class, 'jabatan_id'); }
    public function panggol(): BelongsTo { return $this->belongsTo(Panggol::class, 'panggol_id'); }

    // Helper Role & Integrasi
    public function isPelapor(): bool { return $this->role === 'pelapor'; }
    public function isAdmin(): bool { return $this->role === 'admin'; }
    public function isTeknisi(): bool { return $this->isAdmin(); } // Alias kompatibilitas pasca penyatuan role
    public function isSibobLinked(): bool { return !empty($this->sibob_id); }

    public function avatarUrl(?string $fallback = null): ?string
    {
        $foto = trim((string) $this->foto_profil);
        if ($foto === '') {
            return $fallback;
        }

        if (preg_match('/^https?:\/\//i', $foto)) {
            return $foto;
        }

        return asset('storage/' . ltrim($foto, '/'));
    }

    public function displayLabel(): string
    {
        return ($this->nip ?: '-') . ' || ' . $this->nama;
    }
}