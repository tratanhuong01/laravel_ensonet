<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
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
                switch ($data[0]->TinhTrang) {
                    case '1':
                        //checkpoint
                        Session::put('idcheckpoint', $data[0]->IDTaiKhoan);
                        redirect()->to('checkpoint')->send();
                        break;

                    case '2':
                        //xác minh danh tính
                        Session::put('idblock', $data[0]->IDTaiKhoan);
                        redirect()->to('verify-user-identity')->with('user', $data[0]->IDTaiKhoan)->send();
                        break;
                    case '5':
                        //block
                        return redirect()->to('verify-success')->send();
                        break;
                    default:
                        $request->session()->put('user', $user);
                        $accountSave = array();
                        if (Cookie::get('accountSave') == NULL) {
                            $accountSave[0] = (object)[
                                'ID' => $data[0]->IDTaiKhoan,
                                'EmailOrPhone' => $request->emailOrPhone,
                                'Password' => $request->passWord,
                                'Ho' => $data[0]->Ho,
                                'Ten' => $data[0]->Ten,
                                'AnhDaiDien' => $data[0]->AnhDaiDien,
                                'TinhTrang' => "false"
                            ];
                            Cookie::queue('accountSave', json_encode($accountSave));
                        } else {
                            $accountSave = json_decode(Cookie::get('accountSave'));
                            $count = 0;
                            foreach ($accountSave as $key => $value) {
                                if ($value->ID == $data[0]->IDTaiKhoan) {
                                    $count++;
                                }
                            }
                            if ($count == 0)
                                $accountSave[count($accountSave)] = (object)[
                                    'ID' => $data[0]->IDTaiKhoan,
                                    'EmailOrPhone' => $request->emailOrPhone,
                                    'Password' => $request->passWord,
                                    'Ho' => $data[0]->Ho,
                                    'Ten' => $data[0]->Ten,
                                    'AnhDaiDien' => $data[0]->AnhDaiDien,
                                    'TinhTrang' => "false"
                                ];
                            Cookie::queue('accountSave', json_encode($accountSave));
                        }
                        echo "";
                        return redirect()->route('index');
                        break;
                }
            } else {
            }
        }
    }
    public function viewAddAccount()
    {
        return response()->json([
            'view' => "" . view('Modal.ModalLogin.ModalAddAccount')
        ]);
    }
    public function loginModal(Request $request)
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
            if ($request->type == "0") {
                return response()->json([
                    'view' => "" . view('Modal.ModalLogin.ModalAddAccount')
                        ->withErrors($errors),
                    'status' => "0"
                ]);
            } else {
                return response()->json([
                    'view' => "" . view('Modal.ModalLogin.ModalLogin')
                        ->withErrors($errors)
                        ->with('remember', $request->remember)
                        ->with('account', json_decode($request->account)),
                    'status' => "0",
                ]);
            }
        } else {
            $data = DB::table('taikhoan')->where('IDTaiKhoan', '=', $user[0]->IDTaiKhoan)->get();
            if ($data[0]->XacMinh == 1 || $data[0]->XacMinh == 2) {
                switch ($data[0]->TinhTrang) {
                    case '1':
                        //checkpoint
                        Session::put('idcheckpoint', $data[0]->IDTaiKhoan);
                        redirect()->to('checkpoint')->send();
                        break;

                    case '2':
                        //xác minh danh tính
                        Session::put('idblock', $data[0]->IDTaiKhoan);
                        redirect()->to('verify-user-identity')->with('user', $data[0]->IDTaiKhoan)->send();
                        break;
                    case '5':
                        //block
                        return redirect()->to('verify-success')->send();
                        break;
                    default:
                        $request->session()->put('user', $user);
                        $accountSave = array();
                        if ($request->type == "0") {
                            if (Cookie::get('accountSave') == NULL) {
                                $accountSave[0] = (object)[
                                    'ID' => $data[0]->IDTaiKhoan,
                                    'EmailOrPhone' => $request->emailOrPhone,
                                    'Password' => $request->passWord,
                                    'Ho' => $data[0]->Ho,
                                    'Ten' => $data[0]->Ten,
                                    'AnhDaiDien' => $data[0]->AnhDaiDien,
                                    'TinhTrang' => $request->remember == "true" ? "true" : "false"
                                ];
                                Cookie::queue('accountSave', json_encode($accountSave));
                            } else {
                                $accountSave = Cookie::get('accountSave');
                                $count = 0;
                                foreach ($accountSave as $key => $value) {
                                    if ($value->ID == $data[0]->IDTaiKhoan) {
                                        $count++;
                                    }
                                }
                                if ($count == 0)
                                    $accountSave[count($accountSave)] = (object)[
                                        'ID' => $data[0]->IDTaiKhoan,
                                        'EmailOrPhone' => $request->emailOrPhone,
                                        'Password' => $request->passWord,
                                        'Ho' => $data[0]->Ho,
                                        'Ten' => $data[0]->Ten,
                                        'AnhDaiDien' => $data[0]->AnhDaiDien,
                                        'TinhTrang' => $request->remember == "true" ? "true" : "false"
                                    ];
                                Cookie::queue('accountSave', json_encode($accountSave));
                            }
                        } else {
                            $save = [];
                            $accountSave = json_decode(Cookie::get('accountSave'));
                            foreach ($accountSave as $key => $value) {
                                if ($value->ID == $data[0]->IDTaiKhoan) {
                                    $accountSave[$key]->TinhTrang = $request->remember == "true" ?
                                        "true" : "false";
                                }
                            }
                            Cookie::queue('accountSave', json_encode($accountSave));
                        }
                        return redirect()->route('index');
                        break;
                }
            } else {
            }
        }
    }
    public function removeAccountSave(Request $request)
    {
        $accountSave = json_decode(Cookie::get('accountSave'));
        if (count($accountSave) == 1) {
            Cookie::queue(Cookie::forget('accountSave'));
            return response()->json([
                'view' => "" . view('Guest.Child.NotAccountSave'),
                'state' => 'Done'
            ]);
        } else {
            foreach ($accountSave as $key => $value) {
                if ($value->ID == $request->ID) {
                    unset($accountSave[$key]);
                }
            }
            $accountSave = array_values($accountSave);
            Cookie::queue('accountSave', json_encode($accountSave));
        }
    }
    public function viewAccountSave(Request $request)
    {
        $account = json_decode($request->account);
        return response()->json([
            'view' => "" . view('Modal.ModalLogin.ModalLogin')
                ->with('account', $account)
                ->with('remember', '0')
        ]);
    }
}
