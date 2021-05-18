<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loaithongbao extends Model
{
    protected $table = "loaithongbao";

    protected $fillable = [
        'IDLoaiThongBao',
        'TenLoaiThongBao',
        'Loai'
    ];
    public static function add(
        $IDLoaiThongBao,
        $TenLoaiThongBao,
        $Loai
    ) {
        $loaithongbao = new Loaithongbao;
        $loaithongbao->IDLoaiThongBao = $IDLoaiThongBao;
        $loaithongbao->TenLoaiThongBao = $TenLoaiThongBao;
        $loaithongbao->Loai = $Loai;
        $loaithongbao->save();
    }
    public $timestamps = false;
}
