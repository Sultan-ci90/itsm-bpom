<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class BanjarCaptcha extends Model
{
    protected $table = 'banjar_captchas';
    protected $fillable = ['kata_banjar', 'arti_indonesia'];
}