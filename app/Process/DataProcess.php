<?php

namespace App\Process;

use App\Models\Taikhoan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DataProcess extends Model
{
    public static function getAllImage($idTaiKhoan)
    {
        return DB::table('hinhanh')
            ->skip(0)->take(9)
            ->join('baidang', 'hinhanh.IDBaiDang', '=', 'baidang.IDBaiDang')
            ->join('taikhoan', 'baidang.IDTaiKhoan', '=', 'taikhoan.IDTaiKhoan')
            ->where('taikhoan.IDTaiKhoan', '=', $idTaiKhoan)
            ->where('baidang.LoaiBaiDang', '!=', '1')
            ->orderByDesc('baidang.NgayDang')
            ->get();
    }
    public static function getFriendTag($tag)
    {
        $new = array();
        $num = 0;
        if (count($tag) > 0) {
            foreach ($tag as $key => $value) {
                $tager = Taikhoan::where('taikhoan.IDTaiKhoan', '=', $key)->get()[0];
                $new[$num] = $tager;
                $num++;
            }
            return " cùng với " . $new[0]->Ho . ' ' . $new[0]->Ten .
                (count($new) - 1 == 0 ? '' :  " và " . (count($new) - 1) . ' ' . "người khác");
        } else
            return '';
    }
}
