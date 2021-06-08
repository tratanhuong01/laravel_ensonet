<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Amthanh extends Model
{
    protected $table = "amthanh";

    protected $fillable = [
        'IDAmThanh',
        'TenAmThanh',
        'TacGia',
        'DuongDanAmThanh'
    ];
    public static function add(
        $IDAmThanh,
        $TenAmThanh,
        $TacGia,
        $DuongDanAmThanh
    ) {
        $amthanh = new Amthanh;
        $amthanh->IDAmThanh = $IDAmThanh;
        $amthanh->TenAmThanh = $TenAmThanh;
        $amthanh->TacGia = $TacGia;
        $amthanh->DuongDanAmThanh = $DuongDanAmThanh;
        $amthanh->save();
    }
    public static function edit(
        $IDAmThanh,
        $TenAmThanh,
        $TacGia,
        $DuongDanAmThanh
    ) {
        DB::table('amthanh')
            ->where('IDAmThanh', '=', $IDAmThanh)
            ->update(
                [
                    'TenAmThanh' => $TenAmThanh,
                    'TacGia' => $TacGia,
                    'DuongDanAmThanh' => $DuongDanAmThanh,
                ]
            );
    }
    public $timestamps = false;
}
