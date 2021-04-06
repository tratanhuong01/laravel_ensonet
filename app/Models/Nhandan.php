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
    public static function add()
    {
    }
    public $timestamps = false;
}
