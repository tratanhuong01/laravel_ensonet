<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Camxuc;

class Functions extends Model
{
    public static function countPost($idTaiKhoan)
    {
        return DB::table('baidang')->where('baidang.IDTaiKhoan', '=', $idTaiKhoan)
            ->orderBy('NgayDang', 'desc')->get();
    }
    public static function getPost($post)
    {
        return DB::table('baidang')->select('*', 'baidang.IDBaiDang')
            ->leftjoin('hinhanh', 'baidang.IDBaiDang', '=', 'hinhanh.IDBaiDang')
            ->join('taikhoan', 'baidang.IDTaiKhoan', '=', 'taikhoan.IDTaiKhoan')
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
            $newListFriend[$i] = DB::table('taikhoan')->where('taikhoan.IDTaiKhoan', '=', $listFriend[$i]->IDBanBe)->get();;
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
                $newListRequest[$i] = DB::table('taikhoan')
                    ->where('taikhoan.IDTaiKhoan', '=', $listRequest[$i]->IDBanBe)
                    ->get();
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
    public static function checkIsFeel($idTaiKhoan, $idBaiDang)
    {
        $data = Camxuc::where('camxuc.IDTaiKhoan', '=', $idTaiKhoan)
            ->where('camxuc.IDBaiDang', '=', $idBaiDang)
            ->get();
        if (count($data) == 0)
            return '<span class="text-xl" style="color: transparent;text-shadow: 0 0 0 gray;">👍</span> &nbsp; 
        <span class="font-bold">Thích</span>';
        else return Functions::getFeel($data[0]->LoaiCamXuc);
    }
    public static function getUserFeel($idBaiDang)
    {
        return DB::table('baidang')
            ->join('camxuc', 'baidang.IDBaiDang', '=', 'camxuc.IDBaiDang')
            ->join('taikhoan', 'baidang.IDTaiKhoan', '=', 'taikhoan.IDTaiKhoan')
            ->where('baidang.IDBaiDang', '=', $idBaiDang)->get();
    }
    public static function getFeel($i)
    {
        switch (explode('@', $i)[0]) {
            case '0':
                return '<span class="text-xl">👍</span> &nbsp; 
            <span class="font-bold" style="color:#FFD700;">Thích</span>';
                break;
            case '1':
                return '<span class="text-xl">❤️</span> &nbsp; 
                <span class="font-bold" style="color:#F2314C;">Yêu thích</span>';
                break;
            case '2':
                return '<span class="text-xl">😆</span> &nbsp; 
                <span class="font-bold" style="color:#FFD700;">Haha</span>';
                break;
            case '3':
                return '<span class="text-xl">😥</span> &nbsp; 
                    <span class="font-bold" style="color:#FFD700;">Buồn</span>';
                break;
            case '4':
                return '<span class="text-xl">😮</span> &nbsp; 
                    <span class="font-bold" style="color:#FFD700;">Wow</span>';
                break;
            case '5':
                return '<span class="text-xl">😡</span> &nbsp; 
                        <span class="font-bold" style="color:#EB7F27;">Phẩn nộ</span>';
                break;
        }
    }
    public static function getStringFeel($idBaiDang, $loaiCamXuc)
    {
        if (count(Functions::getUserFeel($idBaiDang)) == 0)
            switch (explode('@', $loaiCamXuc)[0]) {
                case '0':
                    return '👍';
                    break;
                case '1':
                    return '❤️';
                    break;
                case '2':
                    return '😆';
                    break;
                case '3':
                    return '😥';
                    break;
                case '4':
                    return '😮';
                    break;
                case '5':
                    return '😡';
                    break;
            }
    }
}
