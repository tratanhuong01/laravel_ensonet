<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gioithieu extends Model
{
    protected $table = "gioithieu";

    protected $fillable = [
        'IDGioiThieu',
        'IDTaiKhoan',
        'JsonGioiThieu'
    ];
    public static function add(
        $IDTaiKhoan,
        $JsonGioiThieu
    ) {
        $gioithieu = new Gioithieu;
        $gioithieu->IDTaiKhoan = $IDTaiKhoan;
        $gioithieu->JsonGioiThieu = $JsonGioiThieu;
        $gioithieu->save();
    }
    public $timestamps = false;
}
