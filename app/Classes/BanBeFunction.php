<?php

namespace App\Classes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Exception;

class BanBeFunction extends Model
{
    public static function getListFriendsUser($idTaiKhoan)
    {
        $listFriend = DB::table('moiquanhe')
            ->where('moiquanhe.IDTaiKhoan', '=', $idTaiKhoan)
            ->where('moiquanhe.TinhTrang', '=', '3')
            ->orderBy('moiquanhe.NgayChapNhan', 'desc')
            ->get();
        $newListFriend = array();
        for ($i = 0; $i < sizeof($listFriend); $i++) {
            $newListFriend[$i] = DB::table('taikhoan')->where('taikhoan.IDTaiKhoan', '=', $listFriend[$i]->IDBanBe)->get();;
        }
        return $newListFriend;
    }
}
