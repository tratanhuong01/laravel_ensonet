<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baidang extends Model
{
    protected $table = "baidang";

    protected $fillable = [
        'IDBaiDang',
        'IDTaiKhoan',
        'IDQuyenRiengTu',
        'NoiDung',
        'GanThe',
        'IDCamXuc',
        'IDDiaChi',
        'NgayDang',
        'LoaiBaiDang',
        'ChiaSe'
    ];
    public static function add(
        $IDBaiDang,
        $IDTaiKhoan,
        $IDQuyenRiengTu,
        $NoiDung,
        $GanThe,
        $IDCamXuc,
        $IDDiaChi,
        $NgayDang,
        $LoaiBaiDang,
        $ChiaSe
    ) {
        $baidang = new Baidang;
        $baidang->IDBaiDang = $IDBaiDang;
        $baidang->IDTaiKhoan = $IDTaiKhoan;
        $baidang->IDQuyenRiengTu = $IDQuyenRiengTu;
        $baidang->NoiDung = $NoiDung;
        $baidang->GanThe = $GanThe;
        $baidang->IDCamXuc = $IDCamXuc;
        $baidang->IDDiaChi = $IDDiaChi;
        $baidang->NgayDang = $NgayDang;
        $baidang->LoaiBaiDang = $LoaiBaiDang;
        $baidang->ChiaSe = $ChiaSe;
        $baidang->save();
    }
    public $timestamps = false;
}
