<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Taikhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SearchFriendController extends Controller
{
    public function search(Request $request)
    {
        $data = Taikhoan::search($request->hoTen, $request->IDView);
        $new = array();
        for ($i = 0; $i < count($data); $i++) {
            $new[$i][$i] = $data[$i];
        }
        return view('Component.Category.Friends')->with('data', $new);
    }
    public function searchUserChat(Request $request)
    {
        $data = Taikhoan::search($request->HoTen, Session::get('user')[0]->IDTaiKhoan);
        return view('Modal.ModalChat.Child.UserChat')->with('data', $data);
    }
}
