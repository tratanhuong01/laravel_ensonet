<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nhomtinnhan extends Model
{
    protected $table = "nhomtinnhan";

    protected $fillable = [
        'IDNhomTinNhan',
        'TenNhomTinNhan',
        'IDMauTinNhan',
        'BieuTuong',
        'LoaiNhomTinNhan'
    ];
    public static function add(
        $IDNhomTinNhan,
        $TenNhomTinNhan,
        $IDMauTinNhan,
        $BieuTuong,
        $LoaiNhomTinNhan
    ) {
        $nhomtinnhan = new Nhomtinnhan;
        $nhomtinnhan->IDNhomTinNhan = $IDNhomTinNhan;
        $nhomtinnhan->TenNhomTinNhan = $TenNhomTinNhan;
        $nhomtinnhan->IDMauTinNhan = $IDMauTinNhan;
        $nhomtinnhan->BieuTuong = $BieuTuong;
        $nhomtinnhan->LoaiNhomTinNhan = $LoaiNhomTinNhan;
        $nhomtinnhan->save();
    }
    public $timestamps = false;
}
