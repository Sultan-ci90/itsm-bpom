<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReqDetailPeminjaman extends Model
{
    protected $table = 'req_detail_peminjaman';
    public $timestamps = false;

    protected $fillable = [
        'request_id', 'jenis_perangkat', 'tgl_mulai',
        'tgl_kembali', 'keperluan', 'lokasi_penggunaan',
    ];

    protected $casts = [
        'tgl_mulai' => 'date',
        'tgl_kembali' => 'date',
    ];

    public function serviceRequest(): BelongsTo
    {
        return $this->belongsTo(ServiceRequest::class, 'request_id');
    }
}