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
        $newListFriend = array();
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
        $newListFriend = array();
        $c = 0;
        if (sizeof($listFriend) <= 0) {
        } else {
            for ($i = 0; $i < sizeof($listFriend); $i++) {
                $data = DB::table('moiquanhe')
                    ->where('moiquanhe.IDTaiKhoan', '=', $listFriend[$i]->IDBanBe)
                    ->where('moiquanhe.IDBanBe', '=', $idTaiKhoan)
                    ->where('moiquanhe.IDTaiKhoan', '!=', $idTaiKhoan)
                    ->where('moiquanhe.TinhTrang', '=', '3')
                    ->orderBy('NgayChapNhan', 'desc')
                    ->get();
                if (count($data) == 0) {
                } else {
                    $newListFriend[$c] = $data;
                    $c++;
                }
            }
        }
        return $newListFriend;
    }
    public static function getListRequestFriendNew($idTaiKhoan)
    {
        $listRequest = DB::table('moiquanhe')
            ->where('moiquanhe.IDTaiKhoan', '=', $idTaiKhoan)
            ->where('moiquanhe.TinhTrang', '=', '2')
            ->orderBy('NgayChapNhan', 'desc')
            ->get();
        $newListRequest = array();
        if (count($listRequest) > 0)
            for ($i = 0; $i < count($listRequest); $i++) {
                $requestFriend = DB::table('taikhoan')
                    ->where('taikhoan.IDTaiKhoan', '=', $listRequest[$i]->IDBanBe)
                    ->get();
                $newListRequest[$i] = $requestFriend;
            }
        return $newListRequest;
    }
    public static function getDateTimeFriend($idTaiKhoan, $idBanBe, $tinhTrang, $loaiNgay)
    {
        return DB::table('moiquanhe')
            ->where('moiquanhe.IDTaiKhoan', '=', $idTaiKhoan)
            ->where('moiquanhe.IDBanBe', '=', $idBanBe)
            ->where('moiquanhe.TinhTrang', '=', $tinhTrang)
            ->get()[0]->$loaiNgay;
    }
}
