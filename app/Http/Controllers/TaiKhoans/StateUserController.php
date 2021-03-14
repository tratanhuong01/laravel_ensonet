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
        DB::update(
            'UPDATE taikhoan SET HoatDong = ? WHERE IDTaiKhoan = ? ',
            ['1', Session::get('user')[0]->IDTaiKhoan]
        );
        Session::put('user', Taikhoan::where('IDTaiKhoan', '=', Session::get('user')[0]->IDTaiKhoan)->get());
    }
    public function offline()
    {
        DB::update(
            'UPDATE taikhoan SET HoatDong = ? WHERE IDTaiKhoan = ? ',
            ['0', Session::get('user')[0]->IDTaiKhoan]
        );
        Session::put('user', Taikhoan::where('IDTaiKhoan', '=', Session::get('user')[0]->IDTaiKhoan)->get());
    }
}
