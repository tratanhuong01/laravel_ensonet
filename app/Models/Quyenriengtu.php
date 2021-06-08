<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Quyenriengtu extends Model
{
    protected $table = "quyenriengtu";

    protected $fillable = [
        'IDQuyenRiengTu',
        'TenQuyenRiengTu',
    ];
    public static function add($IDQuyenRiengTu, $TenQuyenRiengTu)
    {
        $quyenriengtu = new Quyenriengtu;
        $quyenriengtu->IDQuyenRiengTu = $IDQuyenRiengTu;
        $quyenriengtu->TenQuyenRiengTu = $TenQuyenRiengTu;
        $quyenriengtu->save();
    }
    public static function edit($IDQuyenRiengTu, $TenQuyenRiengTu)
    {
        DB::update('UPDATE quyenriengtu SET TenQuyenRiengTu = ? WHERE  
        IDQuyenRiengTu = ? ', [
            $TenQuyenRiengTu, $IDQuyenRiengTu
        ]);
    }
    public $timestamps = false;
}
