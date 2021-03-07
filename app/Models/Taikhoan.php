<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taikhoan extends Model
{
    protected $table = "taikhoan";

    protected $fillable = [
        'IDTaiKhoan',
        'MatKhau',
        'Ho',
        'Ten',
        'Email',
        'SoDienThoai',
        'CodeEmail',
        'CodeSoDienThoai',
        'AnhDaiDien',
        'AnhBia',
        'GioiTinh',
        'NgaySinh',
        'MoTa',
        'LanDangNhap',
        'LoaiTaiKhoan',
        'XacMinh',
        'TinhTrang',
        'NgayTao',
        'DarkMode',
        'TinhTrang'
    ];
    public static function add(
        $IDTaiKhoan,
        $MatKhau,
        $Ho,
        $Ten,
        $Email,
        $SoDienThoai,
        $CodeEmail,
        $CodeSoDienThoai,
        $AnhDaiDien,
        $AnhBia,
        $GioiTinh,
        $NgaySinh,
        $MoTa,
        $LanDangNhap,
        $LoaiTaiKhoan,
        $XacMinh,
        $TinhTrang,
        $NgayTao,
        $DarkMode,
        $HoatDong
    ) {
        $taikhoan = new Taikhoan;
        $taikhoan->IDTaiKhoan = $IDTaiKhoan;
        $taikhoan->MatKhau = md5($MatKhau);
        $taikhoan->Ho = $Ho;
        $taikhoan->Ten = $Ten;
        $taikhoan->Email = $Email;
        $taikhoan->SoDienThoai = $SoDienThoai;
        $taikhoan->CodeEmail = $CodeEmail;
        $taikhoan->CodeSoDienThoai = $CodeSoDienThoai;
        $taikhoan->AnhDaiDien = $AnhDaiDien;
        $taikhoan->AnhBia = $AnhBia;
        $taikhoan->GioiTinh = $GioiTinh;
        $taikhoan->NgaySinh = $NgaySinh;
        $taikhoan->MoTa = $MoTa;
        $taikhoan->LanDangNhap = $LanDangNhap;
        $taikhoan->LoaiTaiKhoan = $LoaiTaiKhoan;
        $taikhoan->XacMinh = $XacMinh;
        $taikhoan->TinhTrang = $TinhTrang;
        $taikhoan->NgayTao = $NgayTao;
        $taikhoan->DarkMode = $DarkMode;
        $taikhoan->HoatDong = $HoatDong;
        $taikhoan->save();
    }
    public $timestamps = false;
}
