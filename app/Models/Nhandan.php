<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Nhandan extends Model
{
    protected $table = "nhandan";

    protected $fillable = [
        'IDNhanDan',
        'NhomNhanDan',
        'DongNhanDan',
        'DuongDanNhanDan',
        'Hang',
        'Cot'
    ];
    public static function add(
        $IDNhanDan,
        $NhomNhanDan,
        $DongNhanDan,
        $DuongDanNhanDan,
        $Hang,
        $Cot
    ) {
        $nhandan = new Nhandan;
        $nhandan->IDNhanDan = $IDNhanDan;
        $nhandan->NhomNhanDan = $NhomNhanDan;
        $nhandan->DongNhanDan = $DongNhanDan;
        $nhandan->DuongDanNhanDan = $DuongDanNhanDan;
        $nhandan->Hang = $Hang;
        $nhandan->Cot = $Cot;
        $nhandan->save();
    }
    public static function edit(
        $IDNhanDan,
        $NhomNhanDan,
        $DongNhanDan,
        $DuongDanNhanDan,
        $Hang,
        $Cot
    ) {
        DB::update('UPDATE nhandan SET NhomNhanDan = ? , DongNhanDan = ? ,
         DuongDanNhanDan = ? , Hang = ? , Cot = ?  WHERE IDNhanDan = ? ', [
            $NhomNhanDan, $DongNhanDan, $DuongDanNhanDan, $Hang, $Cot, $IDNhanDan
        ]);
    }
    public $timestamps = false;
}
