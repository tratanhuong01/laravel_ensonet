<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Exception;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        Session::forget('user');
        redirect()->to('login')->send();
        return view('Guest/login');
    }
}
