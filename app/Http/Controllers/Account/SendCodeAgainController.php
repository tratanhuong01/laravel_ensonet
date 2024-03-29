<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Mail\Ensonet;

class SendCodeAgainController extends Controller
{
    public function send(Request $request)
    {
        $user = DB::table('taikhoan')->where('Email', '=', $request->emailOrPhone)->get();
        $code_veri = mt_rand(100000, 999999);
        DB::update('update taikhoan set CodeEmail = ? where taikhoan.IDTaiKhoan = ?', [$code_veri, $user[0]->IDTaiKhoan]);
        \Mail::to($request->emailOrPhone)->send(new Ensonet($code_veri));
        return view('Modal/ModalLogin/ModalTypeCode')->with('emailOrPhoneRegister', $request->emailOrPhone);
    }
}
