<?php

namespace App\Admin;

use App\Models\Baidang;
use App\Models\Binhluan;
use App\Models\Camxucbaidang;
use App\Models\Camxucbinhluan;
use App\Models\Luotxemstory;
use App\Models\Story;
use App\Models\Taikhoan;
use App\Models\Yeucaunguoidung;
use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
    public static function getUserRegister($time)
    {
        return Taikhoan::whereRaw("taikhoan.NgayTao >= CONCAT(CURRENT_DATE(), ' 00:00:00')")->get();
    }
    public static function getPost($time)
    {
        return Baidang::whereRaw("baidang.NgayDang >= CONCAT(CURRENT_DATE(), ' 00:00:00')")->get();
    }
    public static function getStory($time)
    {
        return Story::whereRaw("story.ThoiGianDangStory >= CONCAT(CURRENT_DATE(), ' 00:00:00')")->get();
    }
    public static function getReply($time)
    {
        return Yeucaunguoidung::whereRaw("yeucaunguoidung.ThoiGianYeuCau >= CONCAT(CURRENT_DATE(), ' 00:00:00')")->get();
    }
    public static function getUserRegisterNew($limit)
    {
        return Taikhoan::select('*')->where('taikhoan.LoaiTaiKhoan', '=', 0)
            ->skip(0)->take($limit)->orderBy('taikhoan.NgayTao', 'DESC')->get();
    }
    public static function getUserActivityCurrent($limit)
    {
        return Taikhoan::select('*')->where('taikhoan.LoaiTaiKhoan', '=', 0)
            ->skip(0)->take($limit)->orderBy('taikhoan.ThoiGianHoatDong', 'DESC')->get();
    }
    public static function getReplyCurrent($limit)
    {
        return Yeucaunguoidung::select('*')
            ->skip(0)->take($limit)
            ->join('taikhoan', 'yeucaunguoidung.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
            ->orderBy('yeucaunguoidung.ThoiGianYeuCau', 'DESC')->get();
    }
    public static function getAllAccount($take, $skip)
    {
        return Taikhoan::where('taikhoan.LoaiTaiKhoan', '=', 0)
            ->skip($skip)->take($take)->get();
    }
    public static function getAllAccountFull()
    {
        return Taikhoan::where('taikhoan.LoaiTaiKhoan', '=', 0)
            ->get();
    }
    public static function checkUserOnlineOrOffline($timeUser)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        if (strtotime(date("Y-m-d H:i:s")) - strtotime($timeUser) < 60) {
            return true;
        }
    }
    public static function getAllPost($take, $skip)
    {
        return Baidang::join('taikhoan', 'baidang.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
            ->skip($skip)->take($take)->get();
    }
    public static function getAllPostFull()
    {
        return Baidang::join('taikhoan', 'baidang.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
            ->get();
    }
    public static function getCommentOfPost($idBaiDang)
    {
        return Binhluan::where('binhluan.IDBaiDang', '=', $idBaiDang)->get();
    }
    public static function getFeelOfPost($idBaiDang)
    {
        return count(Camxucbaidang::where('camxucbaidang.IDBaiDang', '=', $idBaiDang)->get())
            + count(Camxucbinhluan::where('baidang.IDBaiDang', '=', $idBaiDang)
                ->join('binhluan', 'camxucbinhluan.IDBinhLuan', 'binhluan.IDBinhLuan')
                ->join('baidang', 'binhluan.IDBaiDang', 'baidang.IDBaiDang')
                ->get());
    }
    public static function getAllStory($take, $skip)
    {
        return Story::skip($skip)->take($take)
            ->join('taikhoan', 'story.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
            ->get();
    }
    public static function getAllStoryFull()
    {
        return Story::join('taikhoan', 'story.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
            ->get();
    }
    public static function getAllReply($take, $skip)
    {
        return Yeucaunguoidung::skip($skip)->take($take)
            ->join('taikhoan', 'yeucaunguoidung.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
            ->get();
    }
    public static function getAllShareOfPost($idBaiDang)
    {
        return Baidang::where('baidang.ChiaSe', '=', $idBaiDang)->get();
    }
    public static function getAllReplyFull()
    {
        return Yeucaunguoidung::join(
            'taikhoan',
            'yeucaunguoidung.IDTaiKhoan',
            'taikhoan.IDTaiKhoan'
        )
            ->get();
    }
    public static function getViewStoryByStory($idStory)
    {
        return Luotxemstory::where('luotxemstory.IDStory', '=', $idStory)->get();
    }
    public static function filter($type, $valueQuery)
    {
        switch ($type) {
            case 'user':
                # code...
                break;

            default:
                # code...
                break;
        }
    }
}
