<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phongnen extends Model
{
    protected $table = "phongnen";

    protected $fillable = [
        'IDPhongNen',
        'DuongDanPN'
    ];
    public static function add(
        $IDPhongNen,
        $DuongDanPN
    ) {
        $phongnen = new Phongnen;
        $phongnen->IDPhongNen = $IDPhongNen;
        $phongnen->DuongDanPN = $DuongDanPN;
        $phongnen->save();
    }
    public $timestamps = false;
}
