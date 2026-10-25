<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReqDetailZoom extends Model
{
    protected $table = 'req_detail_zoom';
    public $timestamps = false;

    protected $fillable = [
        'request_id', 'bidang_id', 'tgl_acara', 'nama_acara', 'jam_mulai',
        'jam_selesai', 'jenis_acara', 'butuh_operator',
        'bentuk_ruangan', 'jumlah_kursi',
    ];

    protected $casts = [
        'tgl_acara' => 'date',
    ];

    public function serviceRequest(): BelongsTo
    {
        return $this->belongsTo(ServiceRequest::class, 'request_id');
    }

    public function bidang(): BelongsTo
    {
        return $this->belongsTo(Bidang::class, 'bidang_id');
    }
}