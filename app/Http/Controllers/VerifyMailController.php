<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class VerifyMailController extends Controller
{
    public function verify(Request $request) {
        $user = DB::table('taikhoan')->where('taikhoan.Email','=',$request->Email)->get();
        if ($user[0]->CodeEmail == $request->code_veri) 
        echo "";
    }
}
