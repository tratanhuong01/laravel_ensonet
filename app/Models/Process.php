<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Process extends Model
{
    public static function getCommentNew($idBaiDang)
    {
        return DB::table('binhluan')
            ->join('taikhoan', 'binhluan.IDTaiKhoan', '=', 'taikhoan.IDTaiKhoan')
            ->where('binhluan.IDBaiDang', '=', $idBaiDang)
            ->orderBy('ThoiGianBinhLuan', 'desc')
            ->get();
    }
    public static function getCommentLimit($idBaiDang)
    {
        return DB::table('binhluan')
            ->skip(0)->take(2)
            ->join('taikhoan', 'binhluan.IDTaiKhoan', '=', 'taikhoan.IDTaiKhoan')
            ->where('binhluan.IDBaiDang', '=', $idBaiDang)
            ->orderBy('ThoiGianBinhLuan', 'desc')
            ->get();
    }
    public static function getCommentLimitFromTo($idBaiDang, $num)
    {
        $num += 2;
        return DB::table('binhluan')
            ->skip($num)->take(2)
            ->join('taikhoan', 'binhluan.IDTaiKhoan', '=', 'taikhoan.IDTaiKhoan')
            ->where('binhluan.IDBaiDang', '=', $idBaiDang)
            ->orderBy('ThoiGianBinhLuan', 'desc')
            ->get();
    }
}
