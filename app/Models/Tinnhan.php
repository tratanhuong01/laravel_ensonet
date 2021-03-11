<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tinnhan extends Model
{
    protected $table = "tinnhan";

    protected $fillable = [
        'IDTinNhan',
        'IDNhomTinNhan',
        'IDTaiKhoan',
        'NoiDung',
        'TinhTrang',
        'TrangThai',
        'LoaiTinNhan',
        'ThoiGianNhanTin'
    ];
    public static function add(
        $IDTinNhan,
        $IDNhomTinNhan,
        $IDTaiKhoan,
        $NoiDung,
        $TinhTrang,
        $TrangThai,
        $LoaiTinNhan,
        $ThoiGianNhanTin
    ) {
        $tinnhan = new Tinnhan;
        $tinnhan->IDTinNhan = $IDTinNhan;
        $tinnhan->IDNhomTinNhan = $IDNhomTinNhan;
        $tinnhan->IDTaiKhoan = $IDTaiKhoan;
        $tinnhan->NoiDung = $NoiDung;
        $tinnhan->TinhTrang = $TinhTrang;
        $tinnhan->TrangThai = $TrangThai;
        $tinnhan->LoaiTinNhan = $LoaiTinNhan;
        $tinnhan->ThoiGianNhanTin = $ThoiGianNhanTin;
        $tinnhan->save();
    }
    public $timestamps = false;
}
