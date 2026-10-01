<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TicketResolution extends Model
{
    // Nama tabel sesuai itsm.sql
    protected $table = 'ticket_resolutions';

    // KRITIK: Tabel ticket_resolutions di itsm.sql TIDAK memiliki kolom created_at/updated_at
    public $timestamps = false;

    protected $fillable = [
        'ticket_id',
        'pemeriksa_id',
        'jenis_penyelesaian',
        'vendor',
        'estimasi_biaya',
        'tgl_analisa',
        'analisa_teknis',
        'tgl_tindak_lanjut',
        'tindak_lanjut_teknis',
        'tgl_hasil',
        'hasil',
        'file_surat_justifikasi',
    ];

    protected $casts = [
        'estimasi_biaya' => 'decimal:2',
        'tgl_analisa' => 'date',
        'tgl_tindak_lanjut' => 'date',
        'tgl_hasil' => 'date',
    ];

    // Relasi ke tabel tickets
    public function ticket(): BelongsTo
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }

    // Relasi ke tabel users (teknisi yang memeriksa)
    public function pemeriksa(): BelongsTo
    {
        return $this->belongsTo(User::class, 'pemeriksa_id');
    }
}