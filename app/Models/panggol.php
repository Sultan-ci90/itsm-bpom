<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Panggol extends Model
{
    protected $table = 'panggol';
    public $timestamps = false;
    protected $fillable = ['pangkat', 'golongan'];
}