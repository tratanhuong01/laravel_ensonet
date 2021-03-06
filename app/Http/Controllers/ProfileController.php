<?php

namespace App\Http\Controllers;

use App\Models\Functions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function view($id)
    {
        $user = Session::get('user');
        if ($user[0]->IDTaiKhoan == $id) {
            session()->put('users', $user);
            return view('Guest/profile')->with('users', $user);
        } else {
            $user = DB::table('taikhoan')->where('taikhoan.IDTaiKhoan', '=', $id)->get();
            if (sizeof($user) == 0)
                return view('Guest/Profile')->with('users', $user);
            else {
                session()->put('users', $user);
                return view('Guest/Profile')->with('users', $user);
            }
        }
    }
    public function viewAjaxFriends(Request $request)
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
    public function viewAjaxAbout(Request $request)
    {
        $data = Functions::getListFriendsUser($request->IDView);
        return '<div class="w-full dark:bg-dark-second flex my-4 rounded-lg">' .
            view('Component\GioiThieu\DanhMuc') . view('Component\GioiThieu\TongQuan')
            . "</div>"
            . '<div class="w-full dark:bg-dark-second flex my-4 rounded-lg">'
            . view('Component\DanhMuc\Anh')->with('data', $data)
            . "</div>"
            . '<div class="w-full dark:bg-dark-second flex my-4 rounded-lg">'
            . view('Component\DanhMuc\Video')->with('data', $data)
            . "</div>"
            . '<div class="w-full dark:bg-dark-second flex my-4 rounded-lg">'
            . view('Component\DanhMuc\Story')->with('data', $data)
            . "</div>";
    }
    public function viewAbout($idTaiKhoan)
    {
        $request = new Request;
        $data = Functions::getListFriendsUser($idTaiKhoan);
        $user = Session::get('user');
        if ($user[0]->IDTaiKhoan == $idTaiKhoan) {
            session()->put('users', $user);
            return view('Guest/profile')->with('users', $user)->with('data', $data);
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
    public function viewAjaxPicture(Request $request)
    {
        $data = Functions::getListFriendsUser($request->IDView);
        return view('Component\GioiThieu\Anh') . view('Component\GioiThieu\Video');
    }
    public function viewPicture($idTaiKhoan)
    {
        $request = new Request;
        $data = Functions::getListFriendsUser($idTaiKhoan);
        $user = Session::get('user');
        if ($user[0]->IDTaiKhoan == $idTaiKhoan) {
            session()->put('users', $user);
            return view('Guest/profile')->with('users', $user)->with('data', $data);
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
