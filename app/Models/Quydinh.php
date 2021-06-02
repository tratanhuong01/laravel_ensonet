<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quydinh extends Model
{
    protected $table = "quydinh";

    protected $fillable = [
        'IDQuyDinh',
        'TenQuyDinh',
        'LoaiQuyDinh',
        'MucDo',
    ];
    public static function add($IDQuyDinh, $TenQuyDinh, $LoaiQuyDinh, $MucDo)
    {
        $quydinh = new Quydinh;
        $quydinh->IDQuyDinh = $IDQuyDinh;
        $quydinh->TenQuyDinh = $TenQuyDinh;
        $quydinh->LoaiQuyDinh = $LoaiQuyDinh;
        $quydinh->MucDo = $MucDo;
        $quydinh->save();
    }
    public $timestamps = false;
}
