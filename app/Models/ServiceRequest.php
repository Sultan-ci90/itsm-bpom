<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceRequest extends Model
{
    protected $fillable = [
        'nomor_request',
        'judul_permintaan',
        'deskripsi',
        'kategori',
        'prioritas',
        'asset_id',
        'pemohon_id',
        'ditagihkan_ke',
        'status',
        'tgl_permintaan',
        'tgl_selesai',
    ];

    protected $casts = [
        'tgl_permintaan' => 'date',
        'tgl_selesai' => 'datetime',
    ];

    public function pemohon(): BelongsTo
    {
        return $this->belongsTo(User::class, 'pemohon_id');
    }

    public function teknisi(): BelongsTo
    {
        return $this->belongsTo(User::class, 'ditagihkan_ke');
    }

    public function asset(): BelongsTo
    {
        return $this->belongsTo(Asset::class, 'asset_id');
    }
}
