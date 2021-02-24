<?php

namespace App\Http\Controllers\MoiQuanHe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Exception;

class AcceptFriendController extends Controller
{
    public function accept(Request $request)
    {
        try {
            DB::update('UPDATE moiquanhe SET TinhTrang = ? , NgayChapNhan = ? WHERE 
            moiquanhe.IDTaiKhoan = ? AND moiquanhe.IDBanBe = ? ', [
                '3', date("Y-m-d"),
                $request->UserMain, $request->UserOther
            ]);
            DB::update('UPDATE moiquanhe SET TinhTrang = ? , NgayChapNhan = ? WHERE 
            moiquanhe.IDTaiKhoan = ? AND moiquanhe.IDBanBe = ? ', [
                '3', date("Y-m-d"),
                $request->UserOther, $request->UserMain
            ]);
            $user = DB::table('taikhoan')->where('taikhoan.IDTaiKhoan', '=', $request->UserOther)->get();
            return view('Component/MoiQuanHe/BanBe')->with('users', $user);
        } catch (Exception $e) {
            $e->Error;
        }
    }
}
