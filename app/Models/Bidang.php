<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bidang extends Model
{
    /**
     * Nama tabel yang terhubung dengan model ini.
     * KRITIK: Tabel di database Anda bernama 'bidang' (singular), 
     * padahal konvensi Laravel mengharapkan nama tabel plural ('bidangs').
     * Oleh karena itu, kita wajib mendefinisikan properti $table secara eksplisit.
     */
    protected $table = 'bidang';

    /**
     * Primary key tabel.
     */
    protected $primaryKey = 'id';

    /**
     * Tipe data primary key.
     */
    protected $keyType = 'int';

    /**
     * KRITIK: Tabel 'bidang' di skema SQL Anda tidak memiliki kolom 
     * 'created_at' dan 'updated_at'. Jika ini tidak diset false, 
     * Laravel akan melempar error SQL saat melakukan insert/update.
     */
    public $timestamps = false;

    /**
     * Kolom yang boleh diisi secara massal (Mass Assignment).
     * Ini penting untuk keamanan agar tidak ada kolom lain yang bisa disusupi.
     */
    protected $fillable = [
        'nama_bidang',
    ];

    /**
     * Casting tipe data.
     */
    protected $casts = [
        'id' => 'integer',
    ];

    // ==========================================
    // DEFINISI RELASI (RELATIONSHIPS)
    // ==========================================

    /**
     * Relasi One-to-Many: Satu Bidang memiliki banyak User (Pegawai).
     * Mengacu pada foreign key 'bidang_id' di tabel 'users'.
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'bidang_id', 'id');
    }

    /**
     * Relasi One-to-Many: Satu Bidang memiliki banyak Request Detail Zoom.
     * Mengacu pada foreign key 'bidang_id' di tabel 'req_detail_zoom'.
     */
    public function reqDetailZooms(): HasMany
    {
        return $this->hasMany(ReqDetailZoom::class, 'bidang_id', 'id');
    }
}