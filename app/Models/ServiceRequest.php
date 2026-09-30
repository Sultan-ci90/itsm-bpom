<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ServiceRequest extends Model
{
    // KRITIK: Tabel service_requests hanya punya created_at
    const UPDATED_AT = null;

    protected $fillable = [
        'nomor_request',
        'user_id',
        'layanan',
        'tgl_request',
        'lokasi',
        'deskripsi',
        'status',
    ];

    protected $casts = [
        'tgl_request' => 'date',
        'created_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function detailZoom(): HasOne
    {
        return $this->hasOne(ReqDetailZoom::class, 'request_id');
    }

    public function detailAkun(): HasOne
    {
        return $this->hasOne(ReqDetailAkun::class, 'request_id');
    }

    public function detailPeminjaman(): HasOne
    {
        return $this->hasOne(ReqDetailPeminjaman::class, 'request_id');
    }
}