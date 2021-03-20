<?php

namespace App\Http\Controllers\TaiKhoans;

use App\Http\Controllers\Controller;
use App\Models\Taikhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class StateUserController extends Controller
{
    public function online()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        DB::update(
            'UPDATE taikhoan SET ThoiGianHoatDong = ? WHERE IDTaiKhoan = ? ',
            [date("Y-m-d H:i:s"), Session::get('user')[0]->IDTaiKhoan]
        );
        Session::put('user', Taikhoan::where('IDTaiKhoan', '=', Session::get('user')[0]->IDTaiKhoan)->get());
    }
    public function onlineOther(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        if (
            strtotime(date("Y-m-d H:i:s")) -
            strtotime(Taikhoan::where('IDTaiKhoan', $request->IDTaiKhoan)->get()[0]->ThoiGianHoatDong)
            > 60
        )
            return "Off";
        else
            return "On";
    }
}
