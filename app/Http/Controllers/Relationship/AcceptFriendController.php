<?php

namespace App\Http\Controllers\Relationship;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Exception;
use App\Models\Functions;
use App\Models\Nhomtinnhan;
use App\Models\StringUtil;
use App\Models\Tinnhan;

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
            $idNhomTinNhan = StringUtil::ID('nhomtinnhan', 'IDNhomTinNhan');
            Nhomtinnhan::add(
                $idNhomTinNhan,
                '',
                '5B5B5B',
                "👍",
                '0'
            );;
            Tinnhan::add(
                StringUtil::ID('tinnhan', 'IDTinNhan'),
                $idNhomTinNhan,
                Session::get('user')[0]->IDTaiKhoan,
                '',
                '0',
                '0',
                '0',
                date("Y-m-d H:i:s")
            );
            Tinnhan::add(
                StringUtil::ID('tinnhan', 'IDTinNhan'),
                $idNhomTinNhan,
                $request->UserOther,
                '',
                '0',
                '0',
                '0',
                date("Y-m-d H:i:s")
            );
            $user = DB::table('taikhoan')->where('taikhoan.IDTaiKhoan', '=', $request->UserOther)->get();
            return view('Component.Relationship.Friend')->with('users', $user);
        } catch (Exception $e) {
            $e->Error;
        }
    }
    public function acceptIndex(Request $request)
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
            $idNhomTinNhan = StringUtil::ID('nhomtinnhan', 'IDNhomTinNhan');
            Nhomtinnhan::add(
                $idNhomTinNhan,
                '',
                '5B5B5B',
                "👍",
                '0'
            );;
            Tinnhan::add(
                StringUtil::ID('tinnhan', 'IDTinNhan'),
                $idNhomTinNhan,
                Session::get('user')[0]->IDTaiKhoan,
                '',
                '0',
                '0',
                '0',
                date("Y-m-d H:i:s")
            );
            Tinnhan::add(
                StringUtil::ID('tinnhan', 'IDTinNhan'),
                $idNhomTinNhan,
                $request->UserOther,
                '',
                '0',
                '0',
                '0',
                date("Y-m-d H:i:s")
            );
            $requestFriend = Functions::getListRequestFriendNew($request->UserMain);
            return view('Component.Index.FriendRequest')->with('requestFriend', $requestFriend);
        } catch (Exception $e) {
            $e->Error;
        }
    }
}
