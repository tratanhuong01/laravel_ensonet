<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trang extends Model
{
    protected $table = "truonghoc";

    protected $fillable = [
        'IDTruongHoc',
        'NguoiTaoTrang',
        'QuanTriVien',
        'TenTrang',
        'AnhDaiDien',
        'AnhBia',
        'LoaiTrang',
        'TheLoai'
    ];
    public static function add()
    {
    }
    public $timestamps = false;
}
