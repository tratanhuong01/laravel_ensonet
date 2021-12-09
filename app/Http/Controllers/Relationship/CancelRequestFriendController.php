<?php

namespace App\Http\Controllers\Relationship;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Exception;
use App\Models\Functions;

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
            return view('Component.Relationship.NotFriend')->with('users', $user);
        } catch (Exception $e) {
            $e->Error;
        }
    }
    public function cancelIndex(Request $request)
    {
        try {
            DB::table('moiquanhe')->where('moiquanhe.IDTaiKhoan', '=', $request->UserMain)
                ->where('moiquanhe.IDBanBe', '=', $request->UserOther)->delete();
            DB::table('moiquanhe')->where('moiquanhe.IDTaiKhoan', '=', $request->UserOther)
                ->where('moiquanhe.IDBanBe', '=', $request->UserMain)->delete();
            $requestFriend = Functions::getListRequestFriendNew($request->UserMain);
            return view('Component.Index.FriendRequest')->with('requestFriend', $requestFriend);
        } catch (Exception $e) {
            $e->Error;
        }
    }
    public function cancelRequest(Request $request)
    {
        try {
            DB::table('moiquanhe')->where('moiquanhe.IDTaiKhoan', '=', $request->UserMain)
                ->where('moiquanhe.IDBanBe', '=', $request->UserOther)->delete();
            DB::table('moiquanhe')->where('moiquanhe.IDTaiKhoan', '=', $request->UserOther)
                ->where('moiquanhe.IDBanBe', '=', $request->UserMain)->delete();
            return 'Đã hủy lời mời';
        } catch (Exception $e) {
            $e->Error;
        }
    }
}
