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
        'reported_by',
        'layanan',
        'tgl_request',
        'lokasi',
        'deskripsi',
        'status',
        'completed_at',
        'is_chat_closed',
        'chat_closed_at',
        'chat_closed_by',
    ];

    protected $casts = [
        'tgl_request' => 'date',
        'created_at' => 'datetime',
        'completed_at' => 'datetime',
        'is_chat_closed' => 'boolean',
        'chat_closed_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function reportedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reported_by');
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

    public function resolution(): HasOne
    {
        return $this->hasOne(ServiceRequestResolution::class, 'request_id');
    }

    public function chats()
    {
        return $this->hasMany(ServiceRequestChat::class, 'request_id')->orderBy('created_at', 'asc');
    }

    public function closedByUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'chat_closed_by');
    }

    /**
     * Memeriksa apakah chat telah kadaluwarsa (maksimal 2 hari setelah status Selesai).
     */
    public function isChatExpired(): bool
    {
        if ($this->status === 'Selesai') {
            $time = $this->completed_at ?? now();
            return $time->addDays(2)->isPast();
        }
        return false;
    }

    /**
     * Sisa waktu aktif chat dalam format manusia (jika status Selesai dan belum kadaluwarsa).
     */
    public function chatExpiryRemaining(): ?string
    {
        if ($this->status === 'Selesai' && !$this->isChatExpired()) {
            $time = $this->completed_at ?? now();
            return $time->addDays(2)->diffForHumans(['parts' => 2, 'syntax' => \Carbon\CarbonInterface::DIFF_RELATIVE_TO_NOW]);
        }
        return null;
    }

    /**
     * Memeriksa apakah sesi chat masih aktif (hanya untuk tiket Selesai, belum ditutup operator & belum kadaluwarsa 2 hari).
     */
    public function isChatActive(): bool
    {
        if ($this->status !== 'Selesai') {
            return false;
        }
        if ($this->is_chat_closed) {
            return false;
        }
        if ($this->isChatExpired()) {
            return false;
        }
        return true;
    }
}