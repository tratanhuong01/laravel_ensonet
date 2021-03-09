<?php

namespace App\Http\Controllers\BaiDang;

use App\Http\Controllers\Controller;
use App\Models\Taikhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TagFriendController extends Controller
{
    public function view()
    {
        $friends = Taikhoan::get(Session::get('user')[0]->IDTaiKhoan);
        return view('Modal/ModalBaiDang/ModalGanThe')->with('friends', $friends);
    }
    public function search(Request $request)
    {
        $friends = Taikhoan::search($request->HoTen, $request->IDTaiKhoan);
        return view('Modal/ModalBaiDang/Child/GanThe')->with('friends', $friends);
    }
    public function tag(Request $request)
    {
        if (session()->has('tag')) {
            $tag = Session::get('tag');
            if (isset($tag[$request->IDTaiKhoan])) {
                unset($tag[$request->IDTaiKhoan]);
                Session::put('tag', $tag);
                return '';
            } else {
                $tag[$request->IDTaiKhoan] = $request->IDTaiKhoan;
                Session::put('tag', $tag);
                return '<i class="fas fa-check text-green-400 text-xl"></i>';
            }
        } else {
            $tag[$request->IDTaiKhoan] = $request->IDTaiKhoan;
            Session::put('tag', $tag);
            return '<i class="fas fa-check text-green-400 text-xl"></i>';
        }
    }
}
