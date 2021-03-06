<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thongbao extends Model
{
    protected $table = "thongbao";

    protected $fillable = [
        'IDThongBao',
        'IDTaiKhoan',
        'IDLoaiThongBao',
        'IDContent',
        'IDGui',
        'TinhTrang',
        'ThoiGianThongBao'
    ];
    public static function add(
        $IDThongBao,
        $IDTaiKhoan,
        $IDLoaiThongBao,
        $IDContent,
        $IDGui,
        $TinhTrang,
        $ThoiGianThongBao
    ) {
        $thongbao = new Thongbao;
        $thongbao->IDThongBao = $IDThongBao;
        $thongbao->IDTaiKhoan = $IDTaiKhoan;
        $thongbao->IDLoaiThongBao = $IDLoaiThongBao;
        $thongbao->IDContent = $IDContent;
        $thongbao->IDGui = $IDGui;
        $thongbao->TinhTrang = $TinhTrang;
        $thongbao->ThoiGianThongBao = $ThoiGianThongBao;
        $thongbao->save();
    }
    public $timestamps = false;
}
