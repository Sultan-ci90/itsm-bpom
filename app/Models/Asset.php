<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Asset extends Model
{
    // KRITIK: Tabel assets tidak punya timestamps sama sekali
    public $timestamps = false;

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'merk_type',
        'nup',
        'tgl_terima',
        'jenis_barang',
        'satuan',
        'lokasi',
        'penanggung_jawab_id',
        'status_kondisi',
        'spesifikasi',
        'foto_barang',
    ];

    protected $casts = [
        'tgl_terima' => 'date',
    ];

    public function penanggungJawab(): BelongsTo
    {
        return $this->belongsTo(User::class, 'penanggung_jawab_id');
    }

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class, 'asset_id');
    }
}