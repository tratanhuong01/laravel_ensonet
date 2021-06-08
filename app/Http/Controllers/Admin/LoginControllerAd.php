<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginControllerAd extends Controller
{
    public function login(Request $request)
    {
        $user = DB::table('taikhoan')->where('taikhoan.Email', '=', $request->username)->get();
        $validator = null;
        if (sizeof($user) == 0) {
            $emailErr = $request->username . '@';
            $validator = Validator::make($request->all(), [
                'username' => 'required|in:' . $emailErr,
                'password'  => 'required'
            ], $messages = [
                'username.required' => 'Tên đăng nhập không được để trống!',
                'username.in' => 'Tên đăng nhập không khớp bất kì tài khoản nào!',
                'password.required' => 'Mật khẩu không được để trống!',
            ]);
        } else {
            $pass = null;
            if (md5($request->password) == $user[0]->MatKhau)
                $pass = $request->password;

            $validator = Validator::make($request->all(), [
                'username' => 'required|in:' . $user[0]->Email,
                'password'  => 'required|in:' . $pass
            ], $messages = [
                'username.required' => 'Tên đăng nhập không được để trống!',
                'password.required' => 'Mật khẩu không được để trống!',
                'password.in' => 'Mật khẩu không chính xác!',
            ]);
        }

        if ($validator->fails()) {
            $errors = $validator->errors();
            redirect()->to('admin/login')->withErrors($errors)->send();
        } else {
            $data = DB::table('taikhoan')->where('IDTaiKhoan', '=', $user[0]->IDTaiKhoan)->get();
            Session::put('admin', $data);
            redirect()->to('admin/dashboard')->send();
        }
    }
}
