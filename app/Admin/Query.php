<?php

namespace App\Admin;

use App\Models\Baidang;
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
}
