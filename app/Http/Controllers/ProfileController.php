<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function view($id) {
        $user = Session::get('user');
        if ($user[0]->IDTaiKhoan == $id) 
            return view('Guest/profile')->with('users',$user);
        else {
            $user = DB::table('taikhoan')->where('taikhoan.IDTaiKhoan','=',$id)->get();
            if (sizeof($user) == 0) 
            return view('Guest/Profile')->with('users',$user);
            else 
            return view('Guest/Profile')->with('users',$user);
        }
    }
}
