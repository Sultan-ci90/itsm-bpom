<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Ticket extends Model
{
    // KRITIK: Tabel tickets hanya punya created_at
    const UPDATED_AT = null;

    protected $fillable = [
        'nomor_aduan',
        'asset_id',
        'pelapor_id',
        'tgl_pelaporan',
        'deskripsi_masalah',
        'foto_kendala',
        'status',
    ];

    protected $casts = [
        'tgl_pelaporan' => 'date',
        'created_at' => 'datetime',
    ];

    public function asset(): BelongsTo
    {
        return $this->belongsTo(Asset::class, 'asset_id');
    }

    public function pelapor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'pelapor_id');
    }

    public function histories(): HasMany
    {
        return $this->hasMany(TicketHistory::class, 'ticket_id');
    }

    public function resolution(): HasOne
    {
        return $this->hasOne(TicketResolution::class, 'ticket_id');
    }
}