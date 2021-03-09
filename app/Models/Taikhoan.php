<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
    public static function search($data, $idTaiKhoan)
    {
        return DB::select("select * from moiquanhe inner join
         taikhoan on moiquanhe.IDBanBe = taikhoan.IDTaiKhoan 
         where moiquanhe.IDTaiKhoan = '" . $idTaiKhoan . "' and
         concat(taikhoan.Ho,' ',taikhoan.Ten) 
         LIKE '%" . $data . "%' and moiquanhe.TinhTrang = 3 
         order by moiquanhe.NgayChapNhan desc");
    }
    public static function get($idTaiKhoan)
    {
        return DB::select("select * from moiquanhe inner join
         taikhoan on moiquanhe.IDBanBe = taikhoan.IDTaiKhoan 
         where moiquanhe.IDTaiKhoan = '" . $idTaiKhoan . "' and
         moiquanhe.TinhTrang = 3 LIMIT 12");
    }
    public $timestamps = false;
}
