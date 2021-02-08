<?php

use Illuminate\Support\Facades\Mail;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Mail\Ensonet;
use App\Models\Taikhoan;
use App\Models\StringUtil;
use DB;

class RegisterController extends Controller
{
    public function register(Request $request) {
        try {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $anhDaiDien = '';
            if ($request->GioiTinh == 'Nam') 
            $anhDaiDien = 'img/boy.jpg';
            else if ($request->GioiTinh == 'Nữ') 
            $anhDaiDien = 'img/girl.jpg';
            else 
            $anhDaiDien = 'img/other.jpg';
            $id = StringUtil::taoID();
            Taikhoan::add($id,$request->passWord,$request->firstName,$request->lastName,$request->emailOrPhone
            ,NULL,NULL,NULL,$anhDaiDien,NULL,$request->GioiTinh,$request->NgaySinh,NULL,0,0,0,0,
            date("Y-m-d H:i:s"));
            $code_veri = mt_rand(0,999999);
            DB::update('update taikhoan set CodeEmail = ? where taikhoan.IDTaiKhoan = ?',[$code_veri,$id]);
            \Mail::to($request->emailOrPhone)->send(new Ensonet($code_veri));
            return view('Modal/ModalDangNhap/ModalTypeCode')->with('email_register',$request->emailOrPhone);
        } catch (Exception $e) {
            $e->Error;
        }
    }
}
