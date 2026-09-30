<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReqDetailAkun extends Model
{
    protected $table = 'req_detail_akun';
    public $timestamps = false;

    protected $fillable = [
        'request_id', 'jenis_pengajuan', 'sistem_tujuan', 'nip_terkait',
    ];

    public function serviceRequest(): BelongsTo
    {
        return $this->belongsTo(ServiceRequest::class, 'request_id');
    }
}