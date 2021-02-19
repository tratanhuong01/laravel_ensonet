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
                        'IDViTri',
                        'NgayDang',
                        'LoaiBaiDang'
                        ];
    public static function add($IDBaiDang,$IDTaiKhoan,
    $IDQuyenRiengTu,$NoiDung,$GanThe,$IDCamXuc,
    $IDViTri,$NgayDang,$LoaiBaiDang) {
        $baidang = new Baidang;
        $baidang->IDBaiDang = $IDBaiDang;
        $baidang->IDTaiKhoan = $IDTaiKhoan;
        $baidang->IDQuyenRiengTu = $IDQuyenRiengTu;
        $baidang->NoiDung = $NoiDung;
        $baidang->GanThe = $GanThe;
        $baidang->IDCamXuc = $IDCamXuc;
        $baidang->IDViTri = $IDViTri;
        $baidang->NgayDang = $NgayDang;
        $baidang->LoaiBaiDang = $LoaiBaiDang;
        $baidang->save();
    }
    public $timestamps = false;
}
