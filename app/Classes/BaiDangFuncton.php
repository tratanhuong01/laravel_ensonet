<?php

namespace App\Classes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Exception;

class BaiDangFunction
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
    public static function getAllPostRelationWithUser($idTaiKhoan)
    {
        $postAll = array();
        $friends = BanBeFunction::getListFriendsUser($idTaiKhoan);
        $k = 0;
        for ($i = 0; $i < count($friends); $i++) {
            $post = BaiDangFunction::countPost($idTaiKhoan);
            for ($j = 0; $j < count($post); $j++) {
                $postAll[$k] = BaiDangFunction::getPost($post);
                $k++;
            }
        }
        return $postAll;
    }
}
