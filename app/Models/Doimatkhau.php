<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doimatkhau extends Model
{
    protected $table = "doimatkhau";

    protected $fillable = [
        'IDDoiMatKhau',
        'IDTaiKhoan',
        'MaDoi',
        'MatKhauCu',
        'NgayDoi'
    ];
    public static function add(
        $IDDoiMatKhau,
        $IDTaiKhoan,
        $MaDoi,
        $MatKhauCu,
        $NgayDoi
    ) {
        $doimatkhau = new Doimatkhau;
        $doimatkhau->IDDoiMatKhau = $IDDoiMatKhau;
        $doimatkhau->IDTaiKhoan = $IDTaiKhoan;
        $doimatkhau->MaDoi = $MaDoi;
        $doimatkhau->MatKhauCu = $MatKhauCu;
        $doimatkhau->NgayDoi = $NgayDoi;
        $doimatkhau->save();
    }
    public $timestamps = false;
}
