<?php

namespace App\Admin;

use App\Models\Baidang;
use App\Models\Binhluan;
use App\Models\Camxucbaidang;
use App\Models\Camxucbinhluan;
use App\Models\Camxuctinnhan;
use App\Models\Hinhanh;
use App\Models\Story;
use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    public static function pagination($number)
    {
        $count = $number / 10;
    }
    public static function getAllInfoDetailByUser($idTaiKhoan)
    {
        $array = array();
        $array['posted'] = Baidang::where('baidang.IDTaiKhoan', '=', $idTaiKhoan)->get();
        $array['imaged']['sum'] = Hinhanh::where('baidang.IDTaiKhoan', '=', $idTaiKhoan)
            ->join('baidang', 'hinhanh.IDBaiDang', 'baidang.IDBaiDang')
            ->get();
        $array['imaged']['avatar'] = Hinhanh::where('baidang.IDTaiKhoan', '=', $idTaiKhoan)
            ->where('baidang.LoaiBaiDang', '=', 0)
            ->join('baidang', 'hinhanh.IDBaiDang', 'baidang.IDBaiDang')
            ->get();
        $array['imaged']['cover'] = Hinhanh::where('baidang.IDTaiKhoan', '=', $idTaiKhoan)
            ->where('baidang.LoaiBaiDang', '=', 1)
            ->join('baidang', 'hinhanh.IDBaiDang', 'baidang.IDBaiDang')
            ->get();
        $array['imaged']['normal'] = Hinhanh::where('baidang.IDTaiKhoan', '=', $idTaiKhoan)
            ->where('baidang.LoaiBaiDang', '=', 2)
            ->join('baidang', 'hinhanh.IDBaiDang', 'baidang.IDBaiDang')
            ->get();
        $array['story']['text'] = Story::where('story.IDTaiKhoan', '=', $idTaiKhoan)
            ->where('story.LoaiStory', '=', 0)->get();
        $array['story']['pic'] = Story::where('story.IDTaiKhoan', '=', $idTaiKhoan)
            ->where('story.LoaiStory', '=', 1)->get();

        $array['feel'] = count(
            Camxucbaidang::where('camxucbaidang.IDTaiKhoan', '=', $idTaiKhoan)->get()
        ) + count(
            Camxucbinhluan::where('camxucbinhluan.IDTaiKhoan', '=', $idTaiKhoan)->get()
        );
        $array['comment'] = Binhluan::where('binhluan.IDTaiKhoan', '=', $idTaiKhoan)->get();
        return $array;
    }
}
