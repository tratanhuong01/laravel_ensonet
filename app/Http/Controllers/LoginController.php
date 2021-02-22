<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $user = DB::table('taikhoan')->where('taikhoan.Email', '=', $request->emailOrPhone)->get();
        $validator = null;
        if (sizeof($user) == 0) {
            $emailErr = $request->Email . '@';
            $validator = Validator::make($request->all(), [
                'emailOrPhone' => 'required|in:' . $emailErr,
                'passWord'  => 'required'
            ], $messages = [
                'emailOrPhone.required' => 'Email hoặc số điện thoại không được để trống!',
                'emailOrPhone.in' => 'Email hoặc số điện thoại không khớp bất kì tài khoản nào!',
                'passWord.required' => 'Mật khẩu không được để trống!',
            ]);
        } else {
            $pass = null;
            if (md5($request->passWord) == $user[0]->MatKhau)
                $pass = $request->passWord;

            $validator = Validator::make($request->all(), [
                'emailOrPhone' => 'required|in:' . $user[0]->Email,
                'passWord'  => 'required|in:' . $pass
            ], $messages = [
                'emailOrPhone.required' => 'Email hoặc số điện thoại không được để trống!',
                'passWord.required' => 'Mật khẩu không được để trống!',
                'passWord.in' => 'Mật khẩu không chính xác!',
            ]);
        }

        if ($validator->fails()) {
            $request->session()->put('emailOrPhone', $request->emailOrPhone);
            $errors = $validator->errors();
            redirect()->to('login')->withErrors($errors)->send();
        } else {
            $data = DB::table('taikhoan')->where('IDTaiKhoan', '=', $user[0]->IDTaiKhoan)->get();
            if ($data[0]->XacMinh == 1 || $data[0]->XacMinh == 2) {
                $request->session()->put('user', $user);
                redirect()->to('index')->send();
                return view('Guest/index');
            } else {

                echo "Chưa verify";
            }
        }
    }
}
