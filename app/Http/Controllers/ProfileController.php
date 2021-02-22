<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function view($id)
    {
        $request = new Request;
        $user = Session::get('user');
        if ($user[0]->IDTaiKhoan == $id) {
            session()->put('users', $user);
            return view('Guest/profile')->with('users', $user);
        } else {
            $user = DB::table('taikhoan')->where('taikhoan.IDTaiKhoan', '=', $id)->get();
            if (sizeof($user) == 0)
                return view('Guest/Profile')->with('users', $user);
            else {
                session()->put('users', $user);
                return view('Guest/Profile')->with('users', $user);
            }
        }
    }
}
