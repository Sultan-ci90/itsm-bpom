<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    protected $fillable = [
        'nomor_aduan',
        'asset_id',
        'pelapor_id',
        'tgl_pelaporan',
        'deskripsi_masalah',
        'foto_kendala',
        'ticket_number',
        'title',
        'description',
        'status',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function asset(): BelongsTo
    {
        return $this->belongsTo(Asset::class, 'asset_id');
    }

    public function pelapor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'pelapor_id');
    }

    public function histories()
    {
        return $this->hasMany(TicketHistory::class);
    }
}