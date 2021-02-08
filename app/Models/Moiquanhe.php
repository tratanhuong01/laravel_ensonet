<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moiquanhe extends Model
{
    protected $table = "moiquanhe";

    protected $fillable = [
                            'IDMoiQuanHe',
                            'IDTaiKhoan',
                            'IDBanBe',
                            'TinhTrang',
                            'NgayGui',
                            'NgayChapNhan',
                            'TheoDoi'
                        ];
    public static function add($IDTaiKhoan,$IDBanBe,
    $TinhTrang,$NgayGui,$NgayChapNhan,$TheoDoi) {
        $moiquanhe = new Moiquanhe;
        $moiquanhe->IDTaiKhoan = $IDTaiKhoan;
        $moiquanhe->IDBanBe = $IDBanBe;
        $moiquanhe->TinhTrang = $TinhTrang;
        $moiquanhe->NgayGui = $NgayGui;
        $moiquanhe->NgayChapNhan = $NgayChapNhan;
        $moiquanhe->TheoDoi = $TheoDoi;
        $moiquanhe->save();
    }
    public $timestamps = false;
}
