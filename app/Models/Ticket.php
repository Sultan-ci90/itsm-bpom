<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use SoftDeletes;

    // Tabel tickets hanya punya created_at (tanpa updated_at)
    const UPDATED_AT = null;

    protected $fillable = [
        'nomor_aduan',
        'jenis_kendala',
        'asset_id',
        'pelapor_id',
        'reported_by',
        'tgl_pelaporan',
        'deskripsi_masalah',
        'foto_kendala',
        'status',
        'completed_at',
        'konfirmasi_selesai_at',
        'is_konfirmasi_otomatis',
    ];

    protected $casts = [
        'tgl_pelaporan' => 'date',
        'completed_at' => 'datetime',
        'konfirmasi_selesai_at' => 'datetime',
        'is_konfirmasi_otomatis' => 'boolean',
        'created_at' => 'datetime',
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
     * Apakah tiket sudah terkonfirmasi (baik manual maupun otomatis)?
     */
    public function isConfirmed(): bool
    {
        return !is_null($this->konfirmasi_selesai_at) || $this->isConfirmationExpired();
    }

    /**
     * Apakah tiket terkonfirmasi secara otomatis oleh sistem (melewati 2 hari)?
     */
    public function isAutoConfirmed(): bool
    {
        return (bool) $this->is_konfirmasi_otomatis || ($this->status === 'Selesai' && is_null($this->konfirmasi_selesai_at) && $this->isConfirmationExpired());
    }

    /**
     * Apakah tiket Selesai masih membutuhkan ikon alert (belum dikonfirmasi & belum kadaluarsa)?
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

    public function asset(): BelongsTo
    {
        return $this->belongsTo(Asset::class, 'asset_id');
    }

    public function pelapor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'pelapor_id');
    }

    public function reportedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reported_by');
    }

    public function histories(): HasMany
    {
        return $this->hasMany(TicketHistory::class, 'ticket_id');
    }

    public function resolution(): HasOne
    {
        return $this->hasOne(TicketResolution::class, 'ticket_id');
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