<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Exception;

class ForgetAccountController extends Controller
{
    public function get(Request $request)
    {
        $user = DB::table('taikhoan')->where('Email', '=', $request->emailOrPhone_Type)->get();
        if (sizeof($user) == 0)
            return view('Modal/ModalDangNhap/ModalNhapTT')->with('errors', "Không tìm thấy tài khoản");
        else
            return view('Modal/ModalDangNhap/ModalChon')->with('user', $user);
    }
}
