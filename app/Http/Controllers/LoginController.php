<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(Request $request) {
        $user = DB::table('taikhoan')->where('taikhoan.Email','=',$request->emailOrPhone)
            ->where('taikhoan.MatKhau','=',md5($request->passWord))->get();
            
        if (sizeof($user) == 0) {
            redirect()->to('index')->send();
            return view('Guest/login');
        } 
        else {
            $data = DB::table('taikhoan')->where('IDTaiKhoan','=',$user[0]->IDTaiKhoan)->get();
            if ($data[0]->XacMinh == 1 || $data[0]->XacMinh == 2) {
                $request->session()->put('user',$user);
                redirect()->to('index')->send();
                return view('Guest/index');
            }
            else {
                redirect()->to('index')->send();
                echo "Chưa verify";
            }
        }
        
    }
    
}
