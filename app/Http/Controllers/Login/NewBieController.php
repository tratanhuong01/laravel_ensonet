<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Exception;

class NewBieController extends Controller
{
    public function login(Request $request)
    {
        $user = DB::table('taikhoan')->where('taikhoan.Email', '=', $request->emailOrPhone)
            ->where('taikhoan.MatKhau', '=', $request->passWord)->get();

        if (sizeof($user) == 0)
            return view('Guest.login');
        else {
            $request->session()->put('user', $user);
            redirect()->to('index')->send();
            return view('Guest.index');
        }
    }
}
