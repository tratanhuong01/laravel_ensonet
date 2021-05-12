<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Taikhoan;
use App\Process\DataProcess;
use App\Process\DataProcessThird;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TagFriendController extends Controller
{
    public function view()
    {
        $friends = Taikhoan::get(Session::get('user')[0]->IDTaiKhoan);
        return view('Modal/ModalPost/ModalTag')->with('friends', $friends);
    }
    public function search(Request $request)
    {
        $friends = Taikhoan::search($request->HoTen, $request->IDTaiKhoan);
        return view('Modal/ModalPost/Child/Tag')->with('friends', $friends);
    }
    public function tag(Request $request)
    {
        if (session()->has('tag')) {
            $tag = Session::get('tag');
            if (isset($tag[$request->IDTaiKhoan])) {
                unset($tag[$request->IDTaiKhoan]);
                Session::put('tag', $tag);
                return response()->json([
                    'view' => '',
                    'check' => '',
                    'tag' => DataProcess::getFriendTag(Session::get('tag'))
                ]);
            } else {
                $tag[$request->IDTaiKhoan] = $request->IDTaiKhoan;
                Session::put('tag', $tag);
                return response()->json([
                    'view' => "" . view('Modal/ModalPost/Child/UserTaged')
                        ->with(
                            'user',
                            Taikhoan::where('taikhoan.IDTaiKhoan', '=', $request->IDTaiKhoan)->get()
                        ),
                    'check' => '<i class="fas fa-check text-green-400 text-xl"></i>',
                    'tag' => DataProcess::getFriendTag(Session::get('tag'))
                ]);
            }
        } else {
            $tag[$request->IDTaiKhoan] = $request->IDTaiKhoan;
            Session::put('tag', $tag);
            return response()->json([
                'view' => "" . view('Modal/ModalPost/Child/UserTaged')
                    ->with(
                        'user',
                        Taikhoan::where('taikhoan.IDTaiKhoan', '=', $request->IDTaiKhoan)->get()
                    ),
                'check' => '<i class="fas fa-check text-green-400 text-xl"></i>',
                'tag' => DataProcess::getFriendTag(Session::get('tag'))
            ]);
        }
    }
    public function viewUserTagOfPost(Request $request)
    {
        $data = DataProcessThird::getUserTag($request->IDBaiDang);
        return view('Modal/ModalPost/ModalTagUser')->with('data', $data)
            ->with('user', json_decode($request->user));
    }
    public function removeTagFriend(Request $request)
    {
        if (session()->has('tag')) {
            $tag = Session::get('tag');
            if (isset($tag[$request->IDTaiKhoan])) {
                unset($tag[$request->IDTaiKhoan]);
                Session::put('tag', $tag);
            }
        }
        return response()->json([
            'view' => '',
            'check' => '',
            'tag' => DataProcess::getFriendTag(Session::get('tag'))
        ]);
    }
}
