<?php

namespace App\Http\Controllers;

use App\Mail\Changepass;
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
            'typePassWordNew'  => 'required'
        ], $messages = [
            'passWordOld.required' => 'Mật khẩu mới không được để trống!',
            'passWordOld.in' => 'Mật khẩu không đúng!',
            'passWordNew.required' => 'Mật khẩu mới không được để trống!',
            'passWordNew.different' => 'Mật khẩu mới không được giống với mật khẩu cũ!',
            'typePassWordNew.required' => 'Mật khẩu mới không được để trống!',
            'passWordNew.min' => 'Mật khẩu phải nhiều hơn 6 kí tự!',
            'typePassWordNew.required' => 'Mật khẩu mới không được để trống!',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            Session::put('passWordOld', $request->passWordOld);
            Session::put('passWordNew', $request->passWordNew);
            Session::put('typePassWordNew', $request->typePassWordNew);
            return redirect()->back()->withErrors($errors);
        } else {
            $validator = Validator::make($request->all(), [
                'typePassWordNew'  => 'in:' . $request->passWordNew
            ], $messages = [
                'typePassWordNew.in' => 'Mật khẩu nhập lại phải giống với mật khẩu mới!'
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
                \Mail::to($user[0]->Email)->send(new Changepass($maDoi));
                Session::put('typePassWordNew', $request->typePassWordNew);
                Session::put('verify', $maDoi);
                Session::put('emailSend', $user[0]->Email);
                return redirect()->back();
            }
        }
    }
    public function verifyChangePassword(Request $request)
    {
        $maDoi = Doimatkhau::where('doimatkhau.IDTaiKhoan', '=', $request->IDTaiKhoan)
            ->orderBy('doimatkhau.NgayDoi', 'DESC')->get()[0]->MaDoi;
        if ($request->MaDoiRe != $maDoi) {
            Session::put('err', "Mã xác nhận không đúng");
            return redirect()->back();
        } else {
            DB::update('UPDATE taikhoan SET taikhoan.MatKhau = ? WHERE 
            taikhoan.IDTaiKhoan = ? ', [md5($request->MatKhau), $request->IDTaiKhoan]);
            session()->flush();
            return redirect()->to('login')->send();
        }
    }
    public function deleteAccount(Request $request)
    {
        DB::update('UPDATE taikhoan SET taikhoan.MatKhau = ');
        Session::forget('user');
        return redirect()->to('login')->send();
    }
}
