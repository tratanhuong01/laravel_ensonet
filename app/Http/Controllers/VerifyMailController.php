<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class VerifyMailController extends Controller
{
    public function verify(Request $request) {
        $user = DB::table('taikhoan')->where('taikhoan.Email','=',$request->Email)->get();
        $arr = array(
            'emailOrPhone' => $request->Email,
            'passWord' => $user[0]->MatKhau
        );
        if ($user[0]->CodeEmail == $request->code_veri) {
            DB::update('UPDATE taikhoan SET taikhoan.XacMinh = ? WHERE taikhoan.IDTaiKhoan = ? ',
            ['1',$user[0]->IDTaiKhoan]);
            return view('Modal/ModalDangNhap/ModalDangKiThanhCong')->with('arr',$arr);
        }
    }
}
