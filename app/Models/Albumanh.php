<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Albumanh extends Model
{
    protected $table = "albumanh";

    protected $fillable = [
                        'IDAlbumAnh',
                        'TenAlbumAnh',
                        ];
    public static function add($IDAlbumAnh,$TenAlbumAnh) {
        $albumanh = new Albumanh;
        $albumanh->IDAlbumAnh = $IDAlbumAnh;
        $albumanh->TenAlbumAnh = $TenAlbumAnh;
        $albumanh->save();
    }
    public $timestamps = false;
}
