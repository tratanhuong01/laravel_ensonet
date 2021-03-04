<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Functions;

class ProfileFriendsController extends Controller
{
    public function view(Request $request)
    {
        $data = Functions::getListFriendsUser($request->IDView);
        return view('Component\DanhMuc\BanBe')->with('data', $data);
    }
    public function viewFriends($idTaiKhoan)
    {
        $request = new Request;
        $user = Session::get('user');
        $data = Functions::getListFriendsUser($idTaiKhoan);
        if ($user[0]->IDTaiKhoan == $idTaiKhoan) {
            session()->put('users', $user);
            return view('Guest/profile')->with('users', $user)->with('data', $data);;
        } else {
            $user = DB::table('taikhoan')->where('taikhoan.IDTaiKhoan', '=', $idTaiKhoan)->get();
            if (sizeof($user) == 0)
                return view('Guest/Profile')->with('users', $user)->with('data', $data);
            else {
                session()->put('users', $user);
                return view('Guest/Profile')->with('users', $user)->with('data', $data);
            }
        }
    }
}
