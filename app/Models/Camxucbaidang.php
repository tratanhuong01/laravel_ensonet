<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camxucbaidang extends Model
{
    protected $table = "camxucbaidang";

    protected $fillable = [
        'IDCamXucBaiDang',
        'IDBaiDang',
        'IDTaiKhoan',
        'LoaiCamXuc',
        'ThoiGianCamXuc'
    ];
    public static function add(
        $IDCamXucBaiDang,
        $IDBaiDang,
        $IDTaiKhoan,
        $LoaiCamXuc,
        $ThoiGianCamXuc
    ) {
        $camxuc = new Camxucbaidang;
        $camxuc->IDCamXucBaiDang = $IDCamXucBaiDang;
        $camxuc->IDBaiDang = $IDBaiDang;
        $camxuc->IDTaiKhoan = $IDTaiKhoan;
        $camxuc->LoaiCamXuc = $LoaiCamXuc;
        $camxuc->ThoiGianCamXuc = $ThoiGianCamXuc;
        $camxuc->save();
    }
    public $timestamps = false;
}
