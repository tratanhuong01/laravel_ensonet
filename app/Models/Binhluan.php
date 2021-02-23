<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Binhluan extends Model
{
    protected $table = "binhluan";

    protected $fillable = [
        'IDBinhLuan',
        'IDBaiDang',
        'IDTaiKhoan',
        'NoiDungBinhLuan',
        'ThoiGianBinhLuan',
        'PhanHoi',
        'LoaiBinhLuan'
    ];
    public static function add(
        $IDBinhLuan,
        $IDBaiDang,
        $IDTaiKhoan,
        $NoiDungBinhLuan,
        $ThoiGianBinhLuan,
        $PhanHoi,
        $LoaiBinhLuan
    ) {
        $binhluan = new binhluan;
        $binhluan->IDBinhLuan = $IDBinhLuan;
        $binhluan->IDBaiDang = $IDBaiDang;
        $binhluan->IDTaiKhoan = $IDTaiKhoan;
        $binhluan->NoiDungBinhLuan = $NoiDungBinhLuan;
        $binhluan->ThoiGianBinhLuan = $ThoiGianBinhLuan;
        $binhluan->PhanHoi = $PhanHoi;
        $binhluan->LoaiBinhLuan = $LoaiBinhLuan;
        $binhluan->save();
    }
    public $timestamps = false;
}
