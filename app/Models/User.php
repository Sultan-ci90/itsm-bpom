<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nip',
        'nama',
        'email',
        'password',
        // Field Profil Baru
        'tempat_lahir',
        'tanggal_lahir',
        'jenkel',
        'status_kepegawaian',
        'status_pernikahan',
        'no_telp',
        'alamat',
        'jabatan_fungsional',
        // Relasi
        'bidang_id',
        'jabatan_id',
        'panggol_id',
        'role',
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
            'tanggal_lahir' => 'date',
        ];
    }

    // ==========================================
    // RELASI
    // ==========================================

    public function bidang(): BelongsTo
    {
        return $this->belongsTo(Bidang::class, 'bidang_id');
    }

    public function jabatan(): BelongsTo
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }

    public function panggol(): BelongsTo
    {
        return $this->belongsTo(Panggol::class, 'panggol_id');
    }

    // ==========================================
    // HELPER ROLE
    // ==========================================

    public function isAdmin(): bool { return $this->role === 'admin'; }
    public function isTeknisi(): bool { return $this->role === 'teknisi'; }
    public function isPelapor(): bool { return $this->role === 'pelapor'; }
}