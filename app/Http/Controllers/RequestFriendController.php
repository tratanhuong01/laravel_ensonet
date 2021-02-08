<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Moiquanhe;
use DB;

class RequestFriendController extends Controller
{
    public function send(Request $request) {
        try {
            Moiquanhe::add($request->UserMain,$request->UserOther,1,date("Y-m-d"),NULL,0);
            Moiquanhe::add($request->UserOther,$request->UserMain,2,date("Y-m-d"),NULL,0);
            $user = DB::table('taikhoan')->where('taikhoan.IDTaiKhoan','=',$request->UserOther)->get();
            return view('Component/MoiQuanHe/GuiYeuCau')->with('users',$user);
        } catch (Exception $e) {
            $e->Error;
        }
    }
}
