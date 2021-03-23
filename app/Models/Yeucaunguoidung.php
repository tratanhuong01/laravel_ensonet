<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yeucaunguoidung extends Model
{
    protected $table = "yeucaunguoidung";

    protected $fillable = [
        'IDYeuCauNguoiDung',
        'IDTaiKhoan',
        'EmailDangNhap',
        'NgaySinhTaiKhoan',
        'DuongDanHinhAnh',
        'NoiDungYeuCau',
        'TinhTrangYeuCau',
        'ThoiGianYeuCau'
    ];
    public static function add(
        $IDYeuCauNguoiDung,
        $IDTaiKhoan,
        $EmailDangNhap,
        $NgaySinhTaiKhoan,
        $DuongDanHinhAnh,
        $NoiDungYeuCau,
        $TinhTrangYeuCau,
        $ThoiGianYeuCau
    ) {
        $yeucaunguoidung = new Yeucaunguoidung;
        $yeucaunguoidung->IDYeuCauNguoiDung = $IDYeuCauNguoiDung;
        $yeucaunguoidung->IDTaiKhoan = $IDTaiKhoan;
        $yeucaunguoidung->EmailDangNhap = $EmailDangNhap;
        $yeucaunguoidung->NgaySinhTaiKhoan = $NgaySinhTaiKhoan;
        $yeucaunguoidung->DuongDanHinhAnh = $DuongDanHinhAnh;
        $yeucaunguoidung->NoiDungYeuCau = $NoiDungYeuCau;
        $yeucaunguoidung->TinhTrangYeuCau = $TinhTrangYeuCau;
        $yeucaunguoidung->ThoiGianYeuCau = $ThoiGianYeuCau;
        $yeucaunguoidung->save();
    }
    public $timestamps = false;
}
