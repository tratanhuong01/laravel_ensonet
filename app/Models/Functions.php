<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Functions extends Model
{
    public static function countPost($idTaiKhoan)
    {
        return DB::table('baidang')->where('baidang.IDTaiKhoan', '=', $idTaiKhoan)
            ->orderBy('NgayDang', 'desc')->get();
    }
    public static function getPost($post)
    {
        return DB::table('baidang')
            ->join('taikhoan', 'baidang.IDTaiKhoan', '=', 'taikhoan.IDTaiKhoan')
            ->leftjoin('hinhanh', 'hinhanh.IDBaiDang', '=', 'baidang.IDBaiDang')
            ->where('taikhoan.IDTaiKhoan', '=', $post->IDTaiKhoan)
            ->where('baidang.IDBaiDang', '=', $post->IDBaiDang)
            ->orderBy('NgayDang', 'desc')
            ->get();
    }
    public static function getListFriendsUser($idTaiKhoan)
    {
        $listFriend = DB::table('moiquanhe')
            ->where('moiquanhe.IDTaiKhoan', '=', $idTaiKhoan)
            ->where('moiquanhe.TinhTrang', '=', '3')
            ->orderBy('moiquanhe.NgayChapNhan', 'desc')
            ->get();
        $newListFriend = NULL;
        for ($i = 0; $i < sizeof($listFriend); $i++) {
            $friendOfUser = DB::table('taikhoan')->where('taikhoan.IDTaiKhoan', '=', $listFriend[$i]->IDBanBe)->get();
            $newListFriend[$i] = $friendOfUser;
        }
        return $newListFriend;
    }
    public static function getMutualFriend($idBanBe, $idTaiKhoan)
    {
        $listFriend = DB::table('moiquanhe')
            ->where('moiquanhe.IDTaiKhoan', '=', $idBanBe)
            ->where('moiquanhe.TinhTrang', '=', '3')
            ->orderBy('moiquanhe.NgayChapNhan', 'desc')
            ->get();
        $newListFriend = NULL;
        $c = 0;
        if (sizeof($listFriend) <= 0) {
        } else {

            for ($i = 0; $i < sizeof($listFriend); $i++) {
                $newListFriend = DB::table('moiquanhe')
                    ->where('moiquanhe.IDTaiKhoan', '=', $listFriend[$i]->IDBanBe)
                    ->where('moiquanhe.IDBanBe', '=', $idTaiKhoan)
                    ->where('moiquanhe.IDTaiKhoan', '!=', $idTaiKhoan)
                    ->where('moiquanhe.TinhTrang', '=', '3')
                    ->orderBy('NgayChapNhan', 'desc')
                    ->get();
                if (count($newListFriend) == 0) {
                } else {
                    $c++;
                }
            }
        }
        return $c;
    }
}
