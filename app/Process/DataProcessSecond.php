<?php

namespace App\Process;

use App\Models\Camxuc;
use App\Models\Mautinnhan;
use App\Models\Taikhoan;
use App\Models\Tinnhan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DataProcessSecond extends Model
{
    public static function getColorMessage()
    {
        return Mautinnhan::get();
    }
    public static function createArrayUser($arr)
    {
        $data = array();
        $num = 0;
        foreach ($arr as $key => $value) {
            $data[$num] = Taikhoan::where('taikhoan.IDTaiKhoan', '=', $value)->get()[0];
        }
        return $data;
    }
}
