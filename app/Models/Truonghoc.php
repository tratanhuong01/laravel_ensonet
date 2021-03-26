<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truonghoc extends Model
{
    protected $table = "truonghoc";

    protected $fillable = [
        'IDTruongHoc',
        'IDTrang',
        'TenTruongHoc',
        'LoaiTruongHoc'
    ];
    public static function add()
    {
    }
    public $timestamps = false;
}
