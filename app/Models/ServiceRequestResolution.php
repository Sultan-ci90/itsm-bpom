<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceRequestResolution extends Model
{
    protected $table = 'service_request_resolutions';
    public $timestamps = false;

    protected $fillable = [
        'request_id',
        'petugas_id',
        'tgl_tindak_lanjut',
        'tindak_lanjut',
        'alasan_penolakan',
        'zoom_link',
        'zoom_meeting_id',
        'zoom_passcode',
        'akun_password_baru',
        'akun_instruksi_login',
        'pinjam_perangkat_diserahkan',
        'pinjam_catatan_pengembalian',
    ];

    protected $casts = [
        'tgl_tindak_lanjut' => 'date',
        'created_at' => 'datetime',
    ];

    public function request(): BelongsTo
    {
        return $this->belongsTo(ServiceRequest::class, 'request_id');
    }

    public function petugas(): BelongsTo
    {
        return $this->belongsTo(User::class, 'petugas_id');
    }
}
