<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Functions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class EditPostController extends Controller
{
    public function edit(Request $request)
    {
    }
    public function view(Request $request)
    {
        $user = Session::get('user');
        $getPost = DB::table('baidang')
            ->where('baidang.IDBaiDang', '=', $request->IDBaiDang)
            ->where('baidang.IDTaiKhoan', '=', $user[0]->IDTaiKhoan)
            ->get();
        $post = Functions::getPost($getPost[0]);
        return view('Modal/ModalPost/ModalEditPost')->with('post', $post);
    }
}
