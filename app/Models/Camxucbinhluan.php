<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camxucbinhluan extends Model
{
    protected $table = "camxucbinhluan";

    protected $fillable = [
        'IDCamXucBinhLuan',
        'IDBinhLuan',
        'IDTaiKhoan',
        'LoaiCamXuc',
        'ThoiGianCamXuc'
    ];
    public static function add(
        $IDCamXucBinhLuan,
        $IDBinhLuan,
        $IDTaiKhoan,
        $LoaiCamXuc,
        $ThoiGianCamXuc
    ) {
        $camxuc = new Camxucbinhluan;
        $camxuc->IDCamXucBinhLuan = $IDCamXucBinhLuan;
        $camxuc->IDBinhLuan = $IDBinhLuan;
        $camxuc->IDTaiKhoan = $IDTaiKhoan;
        $camxuc->LoaiCamXuc = $LoaiCamXuc;
        $camxuc->ThoiGianCamXuc = $ThoiGianCamXuc;
        $camxuc->save();
    }
    public $timestamps = false;
}
