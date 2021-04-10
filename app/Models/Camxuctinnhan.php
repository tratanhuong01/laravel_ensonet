<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camxuctinnhan extends Model
{
    protected $table = "camxuctinnhan";

    protected $fillable = [
        'IDCamXucTinNhan',
        'IDTaiKhoan',
        'IDTinNhan',
        'LoaiCamXuc',
        'ThoiGianCamXuc'
    ];
    public static function add(
        $IDCamXucTinNhan,
        $IDTaiKhoan,
        $IDTinNhan,
        $LoaiCamXuc,
        $ThoiGianCamXuc
    ) {
        $camxuc = new Camxuctinnhan;
        $camxuc->IDCamXucTinNhan = $IDCamXucTinNhan;
        $camxuc->IDTaiKhoan = $IDTaiKhoan;
        $camxuc->IDTinNhan = $IDTinNhan;
        $camxuc->LoaiCamXuc = $LoaiCamXuc;
        $camxuc->ThoiGianCamXuc = $ThoiGianCamXuc;
        $camxuc->save();
    }
    public $timestamps = false;
}
