<?php

namespace App\Http\Controllers;

use App\Mail\Ensonet;
use App\Models\Doimatkhau;
use App\Models\Taikhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function changeName(Request $request)
    {
        $user = Session::get('user');
        DB::update('UPDATE taikhoan SET taikhoan.Ho = ? , taikhoan.Ten = ? 
        WHERE taikhoan.IDTaiKhoan = ? ', [$request->Ho, $request->Ten, $user[0]->IDTaiKhoan]);
        Session::forget('user');
        return redirect()->to('login')->send();
    }
    public function changePassword(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $user = Session::get('user');
        $pass = null;
        if (md5($request->passWordOld) == $user[0]->MatKhau)
            $pass = $request->passWordOld;
        $validator = Validator::make($request->all(), [
            'passWordOld' => 'required|in:' . $pass,
            'passWordNew'  => 'required|min:6|different:passWordOld',
            'typePassWordNew'  => 'required|min:6|required_with:passWordNew'
        ], $messages = [
            'passWordOld.required' => 'Mật khẩu mới không được để trống!',
            'passWordOld.in' => 'Mật khẩu không đúng!',
            'passWordNew.required' => 'Mật khẩu mới không được để trống!',
            'passWordNew.different' => 'Mật khẩu mới không được giống với mật khẩu cũ!',
            'typePassWordNew.required' => 'Mật khẩu mới không được để trống!',
            'passWordNew.min' => 'Mật khẩu phải nhiều hơn 6 kí tự!',
            'typePassWordNew.required' => 'Mật khẩu mới không được để trống!',
            'typePassWordNew.required_with' => 'Mật khẩu nhập lại phải giống với mật khẩu mới!',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            Session::put('passWordOld', $request->passWordOld);
            Session::put('passWordNew', $request->passWordNew);
            Session::put('typePassWordNew', $request->typePassWordNew);
            return redirect()->back()->withErrors($errors);
        } else {
            $maDoi = mt_rand(100000, 999999);
            Doimatkhau::add(
                NULL,
                $user[0]->IDTaiKhoan,
                $maDoi,
                $user[0]->MatKhau,
                date("Y-m-d H:i:s")
            );
            \Mail::to($user[0]->Email)->send(new Ensonet($maDoi));
            Session::put('verify', $maDoi);
            return redirect()->back();
        }
    }
    public function deleteAccount(Request $request)
    {
        Session::forget('user');
        return redirect()->to('login')->send();
    }
}
