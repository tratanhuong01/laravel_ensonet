<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Exception;

class CancelRequestFriendController extends Controller
{
    public function cancel(Request $request)
    {
        try {
            DB::table('moiquanhe')->where('moiquanhe.IDTaiKhoan', '=', $request->UserMain)
                ->where('moiquanhe.IDBanBe', '=', $request->UserOther)->delete();
            DB::table('moiquanhe')->where('moiquanhe.IDTaiKhoan', '=', $request->UserOther)
                ->where('moiquanhe.IDBanBe', '=', $request->UserMain)->delete();
            $user = DB::table('taikhoan')->where('taikhoan.IDTaiKhoan', '=', $request->UserOther)->get();
            return view('Component/MoiQuanHe/ChuaKetBan')->with('users', $user);
        } catch (Exception $e) {
            $e->Error;
        }
    }
}
