<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    public $timestamps = false;
}
