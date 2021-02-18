<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class VerifyMailController extends Controller
{
    public function verify(Request $request) {
        $user = DB::table('taikhoan')->where('taikhoan.Email','=',$request->emailOrPhone)->get();
        $arr = array(
            'emailOrPhone' => $request->emailOrPhone,
            'passWord' => $user[0]->MatKhau
        );
        if ($request->code_veri != $user[0]->CodeEmail) {
            $errors = "Mã không chính xác";
            return view('Modal/ModalDangNhap/ModalTypeCode')->with('errors',$errors)
            ->with('emailOrPhoneRegister',$request->emailOrPhone);
        }
        else {
            DB::update('UPDATE taikhoan SET taikhoan.XacMinh = ? WHERE taikhoan.IDTaiKhoan = ? ',
            ['1',$user[0]->IDTaiKhoan]);
            return view('Modal/ModalDangNhap/ModalDangKiThanhCong')->with('arr',$arr);
        }
    }
}
