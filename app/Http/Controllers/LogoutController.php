<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Exception;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        $request->session()->forget('user');
        redirect()->to('login')->send();
        return view('Guest/login');
    }
}
