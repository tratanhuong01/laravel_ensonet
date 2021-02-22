<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Mail\Ensonet;
use App\Models\Taikhoan;
use App\Models\StringUtil;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'firstName' => array(
                    'required',
                    'regex:/^([a-zA-ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i'
                ),
                'lastName' => array(
                    'required',
                    'regex:/^([a-zA-ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i'
                ),
                'emailOrPhone' => array(
                    'required',
                    'email',
                    'unique:taikhoan,Email',
                    'unique:taikhoan,SoDienThoai'
                ),
                'emailAgain' => 'required|same:emailOrPhone',
                'passWord'  => 'required'
            ], $messages = [
                'firstName.required' => 'Họ không được để trống!',
                'lastName.required' => 'Tên không được để trống!',
                'emailOrPhone.email' => 'Email không đúng định dạng!',
                'emailOrPhone.required' => 'Email hoặc số điện thoại không được để trống!',
                'emailOrPhone.unique' => 'Email hoặc số điện thoại đã sử dụng!',
                'emailAgain.required' => 'Email không được để trống!',
                'emailAgain.same' => 'Email không trùng khớp!',
                'passWord.required' => 'Mật khẩu không được để trống!',
                'firstName.required' => 'Họ không được để trống!',
                'lastName.required' => 'Tên không được để trống!',
                'firstName.regex' => 'Họ không đúng định dạng!',
                'lastName.regex' => 'Tên không đúng định dạng!'
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors();
                return view('Modal/ModalDangNhap/ModalFormRegister')->withErrors($errors)
                    ->with('requestRegister', $request->all());
            } else {
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $anhDaiDien = '';
                if ($request->GioiTinh == 'Nam')
                    $anhDaiDien = 'img/boy.jpg';
                else if ($request->GioiTinh == 'Nữ')
                    $anhDaiDien = 'img/girl.jpg';
                else
                    $anhDaiDien = 'img/other.jpg';
                $id = StringUtil::taoID();
                $pattern = '/((09|03|07|08|05)+([0-9]{8})\b)/';
                if (preg_match($pattern, $request->emailOrPhone) == 1)
                    return "oke";
                else {
                    if ($request->emailAgain == $request->emailOrPhone) {
                        Taikhoan::add(
                            $id,
                            $request->passWord,
                            $request->firstName,
                            $request->lastName,
                            $request->emailOrPhone,
                            NULL,
                            NULL,
                            NULL,
                            $anhDaiDien,
                            NULL,
                            $request->GioiTinh,
                            $request->NgaySinh,
                            NULL,
                            0,
                            0,
                            0,
                            0,
                            date("Y-m-d H:i:s")
                        );
                        $code_veri = mt_rand(100000, 999999);
                        DB::update('update taikhoan set CodeEmail = ? where taikhoan.IDTaiKhoan = ?', [$code_veri, $id]);
                        \Mail::to($request->emailAgain)->send(new Ensonet($code_veri));
                        return view('Modal/ModalDangNhap/ModalTypeCode')->with('emailOrPhoneRegister', $request->emailOrPhone);
                    }
                }
            }
        } catch (Exception $e) {
            $e->Error;
        }
    }
}
