<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truonghoc extends Model
{
    protected $table = "truonghoc";

    protected $fillable = [
        'IDTruongHoc',
        'IDTrang',
        'TenTruongHoc',
        'LoaiTruongHoc'
    ];
    public static function add(
        $IDTruongHoc,
        $IDTrang,
        $TenTruongHoc,
        $LoaiTruongHoc
    ) {
        $truonghoc = new Truonghoc;
        $truonghoc->IDTruongHoc = $IDTruongHoc;
        $truonghoc->IDTrang = $IDTrang;
        $truonghoc->TenTruongHoc = $TenTruongHoc;
        $truonghoc->LoaiTruongHoc = $LoaiTruongHoc;
        $truonghoc->save();
    }
    public $timestamps = false;
}
