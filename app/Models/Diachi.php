<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Diachi extends Model
{
    protected $table = "diachi";

    protected $fillable = [
        'IDDiaChi',
        'IDTrang',
        'TenDiaChi'
    ];
    public static function add(
        $IDDiaChi,
        $IDTrang,
        $TenDiaChi
    ) {
        $diachi = new Diachi;
        $diachi->IDDiaChi = $IDDiaChi;
        $diachi->IDTrang = $IDTrang;
        $diachi->TenDiaChi = $TenDiaChi;
        $diachi->save();
    }
    public static function edit(
        $IDDiaChi,
        $IDTrang,
        $TenDiaChi
    ) {
        DB::update(
            'UPDATE diachi SET TenDiaChi = ? WHERE IDDiaChi = ? ',
            [$TenDiaChi, $IDDiaChi]
        );
    }
    public $timestamps = false;
}
