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
            
        if (sizeof($user) == 0) 
            return view('Guest/login');
        else {
            $request->session()->put('user',$user);
            redirect()->to('index')->send();
            return view('Guest/index');
        }
        
    }
    
}
