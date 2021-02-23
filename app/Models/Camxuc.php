<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camxuc extends Model
{
    protected $table = "camxuc";

    protected $fillable = [
        'IDCamXuc',
        'IDBaiDang',
        'IDTaiKhoan',
        'LoaiCamXuc',
        'ThoiGianCamXuc'
    ];
    public static function add(
        $IDCamXuc,
        $IDBaiDang,
        $IDTaiKhoan,
        $LoaiCamXuc,
        $ThoiGianCamXuc
    ) {
        $camxuc = new Camxuc;
        $camxuc->IDCamXuc = $IDCamXuc;
        $camxuc->IDBaiDang = $IDBaiDang;
        $camxuc->IDTaiKhoan = $IDTaiKhoan;
        $camxuc->LoaiCamXuc = $LoaiCamXuc;
        $camxuc->ThoiGianCamXuc = $ThoiGianCamXuc;
        $camxuc->save();
    }
    public $timestamps = false;
}
