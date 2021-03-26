<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diachi extends Model
{
    protected $table = "diachi";

    protected $fillable = [
        'IDDiaChi',
        'IDTrang',
        'TenDiaChi'
    ];
    public static function add()
    {
    }
    public $timestamps = false;
}
