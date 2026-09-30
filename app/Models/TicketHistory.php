<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TicketHistory extends Model
{
    // KRITIK: Tabel ticket_histories hanya punya created_at
    const UPDATED_AT = null;

    protected $fillable = [
        'ticket_id',
        'status_label',
        'keterangan',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function ticket(): BelongsTo
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }
}