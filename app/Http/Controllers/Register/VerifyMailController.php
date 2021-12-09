<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Validator;

class VerifyMailController extends Controller
{
    public function verify(Request $request)
    {
        $user = DB::table('taikhoan')->where('taikhoan.Email', '=', $request->emailOrPhone)->get();
        $arr = array(
            'emailOrPhone' => $request->emailOrPhone,
            'passWord' => $user[0]->MatKhau
        );
        if ($request->code_veri != $user[0]->CodeEmail) {
            $errors = "Mã không chính xác";
            return view('Modal.ModalLogin.ModalTypeCode')->with('errors', $errors)
                ->with('emailOrPhoneRegister', $request->emailOrPhone);
        } else {
            DB::update(
                'UPDATE taikhoan SET taikhoan.XacMinh = ? WHERE taikhoan.IDTaiKhoan = ? ',
                ['1', $user[0]->IDTaiKhoan]
            );
            return view('Modal.ModalLogin.ModalRegisterSuccess')->with('arr', $arr);
        }
    }
}
