<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class StringUtil extends Model
{
    public static function taoID() {
        $data = DB::table('taikhoan')->orderBy('IDTaiKhoan', 'DESC')->first();
        $idInt = $data->IDTaiKhoan;
        $idInt++;
        return $idInt;
    }
}
