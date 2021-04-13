<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hinhanh extends Model
{
    protected $table = "hinhanh";

    protected $fillable = [
        'IDHinhAnh',
        'IDAlbumAnh',
        'IDBaiDang',
        'DuongDan',
        'NoiDungIMg',
        'Loai',
        'Khac'
    ];
    public static function add(
        $IDHinhAnh,
        $IDAlbumAnh,
        $IDBaiDang,
        $DuongDan,
        $NoiDungIMg,
        $Loai,
        $Khac
    ) {
        $hinhanh = new Hinhanh;
        $hinhanh->IDHinhAnh = $IDHinhAnh;
        $hinhanh->IDAlbumAnh = $IDAlbumAnh;
        $hinhanh->IDBaiDang = $IDBaiDang;
        $hinhanh->DuongDan = $DuongDan;
        $hinhanh->NoiDungIMg = $NoiDungIMg;
        $hinhanh->Loai = $Loai;
        $hinhanh->Khac = $Khac;
        $hinhanh->save();
    }
    public $timestamps = false;
}
