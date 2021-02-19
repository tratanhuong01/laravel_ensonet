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
                        'NoiDung'
                        ];
    public static function add($IDHinhAnh,$IDAlbumAnh,
    $IDBaiDang,$NoiDung) {
        $hinhanh = new Hinhanh;
        $hinhanh->IDHinhAnh = $IDHinhAnh;
        $hinhanh->IDAlbumAnh = $IDAlbumAnh;
        $hinhanh->IDBaiDang = $IDBaiDang;
        $hinhanh->NoiDung = $NoiDung;
        $hinhanh->save();
    }
    public $timestamps = false;
}
