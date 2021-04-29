<?php

namespace App\Http\Controllers;

use App\Models\Functions;
use App\Models\Taikhoan;
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
                return view('Guest/Profile')->with('users', []);
            else {
                session()->put('users', $user);
                return view('Guest/Profile')->with('users', $user);
            }
        }
    }
    public function viewAjaxFriends(Request $request)
    {
        $data = Functions::getListFriendsUser($request->IDView);
        return view('Component\Category\Friends')->with('data', $data);
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
        $idMain = Session::get('user')[0]->IDTaiKhoan;
        return '<div class="w-full dark:bg-dark-second flex my-4 rounded-lg">' .
            view('Component\About\Category')->with(
                'data',
                Taikhoan::where('IDTaiKhoan', $request->IDView)
                    ->get()
            )
            ->with('idTaiKhoan', Taikhoan::where('IDTaiKhoan', $request->IDView)
                ->get()[0]->IDTaiKhoan)
            . '<div class="w-3/4 px-3" id="detailAbout">'
            . view('Component\About\Dashboard')->with('idTaiKhoan', $request->IDView)
            ->with('idMain', $idMain)
            ->with('idView', $request->IDView)
            . "</div> </div>"
            . '<div class="w-full dark:bg-dark-second flex my-4 rounded-lg">'
            . view('Component\Category\Pictures')->with('data', $data)
            . "</div>"
            . '<div class="w-full dark:bg-dark-second flex my-4 rounded-lg">'
            . view('Component\Category\Video')->with('data', $data)
            . "</div>"
            . '<div class="w-full dark:bg-dark-second flex my-4 rounded-lg flex-wrap">'
            . view('Component\Category\Story')->with('data', $data)
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
        return view('Component\Category\Pictures') . view('Component\Category\Video');
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
    public function editDescribeUser(Request $request)
    {
        DB::update('UPDATE taikhoan SET taikhoan.MoTa = ? WHERE 
        taikhoan.IDTaiKhoan = ? ', [$request->NoiDung, $request->IDTaiKhoan]);
        $user = Taikhoan::where('taikhoan.IDTaiKhoan', '=', $request->IDTaiKhoan)->get();
        Session::forget('user');
        Session::put('user', $user);
        Session::forget('users');
        Session::put('users', $user);
    }
    public function loadAjaxProfileFriendRequest(Request $request)
    {
        $users = Taikhoan::where('taikhoan.IDTaiKhoan', '=', $request->IDTaiKhoan)->get();
        return response()->json([
            'view' => "" . view('Component/profile')->with('users', $users)
        ]);
    }
}
