<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
    public static function edit(
        $IDTruongHoc,
        $IDTrang,
        $TenTruongHoc,
        $LoaiTruongHoc
    ) {
        DB::update('UPDATE truonghoc SET TenTruongHoc = ? , 
        LoaiTruongHoc = ? WHERE IDTruongHoc = ? ', [
            $TenTruongHoc, $LoaiTruongHoc, $IDTruongHoc
        ]);
    }
    public $timestamps = false;
}
