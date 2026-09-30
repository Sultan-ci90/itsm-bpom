<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TicketResolution extends Model
{
    protected $table = 'ticket_resolutions';
    public $timestamps = false; // Tabel ini tidak punya created_at/updated_at di itsm.sql

    protected $fillable = [
        'ticket_id', 'pemeriksa_id', 'jenis_penyelesaian', 'vendor',
        'estimasi_biaya', 'tgl_analisa', 'analisa_teknis',
        'tgl_tindak_lanjut', 'tindak_lanjut_teknis', 'tgl_hasil',
        'hasil', 'file_surat_justifikasi',
    ];

    protected $casts = [
        'estimasi_biaya' => 'decimal:2',
        'tgl_analisa' => 'date',
        'tgl_tindak_lanjut' => 'date',
        'tgl_hasil' => 'date',
    ];

    public function ticket(): BelongsTo
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }

    public function pemeriksa(): BelongsTo
    {
        return $this->belongsTo(User::class, 'pemeriksa_id');
    }
}