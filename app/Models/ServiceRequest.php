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
        'deskripsi',
        'status',
        'completed_at',
        'konfirmasi_selesai_at',
        'is_konfirmasi_otomatis',
        'is_chat_closed',
        'chat_closed_at',
        'chat_closed_by',
    ];

    protected $casts = [
        'tgl_request' => 'date',
        'created_at' => 'datetime',
        'completed_at' => 'datetime',
        'konfirmasi_selesai_at' => 'datetime',
        'is_konfirmasi_otomatis' => 'boolean',
        'is_chat_closed' => 'boolean',
        'chat_closed_at' => 'datetime',
    ];

    /**
     * Batas waktu konfirmasi (2 hari / 48 jam sejak completed_at atau created_at).
     */
    public function confirmationDeadline(): ?\Carbon\Carbon
    {
        $base = $this->completed_at ?? ($this->status === 'Selesai' ? $this->created_at : null);
        return $base ? $base->copy()->addDays(2) : null;
    }

    /**
     * Apakah batas waktu konfirmasi 2 hari telah berakhir?
     */
    public function isConfirmationExpired(): bool
    {
        if ($this->status !== 'Selesai') {
            return false;
        }

        $deadline = $this->confirmationDeadline();
        return $deadline ? $deadline->isPast() : false;
    }

    /**
     * Apakah permintaan sudah terkonfirmasi (baik manual maupun otomatis)?
     */
    public function isConfirmed(): bool
    {
        return !is_null($this->konfirmasi_selesai_at) || $this->isConfirmationExpired();
    }

    /**
     * Apakah permintaan terkonfirmasi secara otomatis oleh sistem (melewati 2 hari)?
     */
    public function isAutoConfirmed(): bool
    {
        return (bool) $this->is_konfirmasi_otomatis || ($this->status === 'Selesai' && is_null($this->konfirmasi_selesai_at) && $this->isConfirmationExpired());
    }

    /**
     * Apakah permintaan Selesai masih membutuhkan ikon alert (belum dikonfirmasi & belum kadaluarsa)?
     */
    public function needsConfirmationAlert(): bool
    {
        return $this->status === 'Selesai' && !$this->isConfirmed();
    }

    /**
     * Otomatis simpan konfirmasi selesai ke DB jika telah melewati batas waktu 2 hari.
     */
    public function autoConfirmIfExpired(): bool
    {
        if ($this->status === 'Selesai' && is_null($this->konfirmasi_selesai_at) && $this->isConfirmationExpired()) {
            $deadline = $this->confirmationDeadline() ?? now();
            $this->update([
                'konfirmasi_selesai_at' => $deadline,
                'is_konfirmasi_otomatis' => true,
            ]);
            return true;
        }
        return false;
    }

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

    protected static function booted(): void
    {
        static::saved(function () {
            \Illuminate\Support\Facades\Cache::forget('dashboard_admin_metrics');
        });

        static::deleted(function () {
            \Illuminate\Support\Facades\Cache::forget('dashboard_admin_metrics');
        });
    }
}