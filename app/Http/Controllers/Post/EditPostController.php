<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Functions;
use App\Process\DataProcess;
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
        $feelCur[$getPost[0]->IDCamXuc] = $getPost[0]->IDCamXuc;
        Session::put('feelCur', $feelCur);
        if ($getPost[0]->IDViTri != NULL) {
            $localU[$getPost[0]->IDViTri] = (object)[
                'ID' => explode('@', $getPost[0]->IDViTri)[0],
                'Loai' => explode('@', $getPost[0]->IDViTri)[1]
            ];
            Session::put('localU', $localU);
        }
        $newTag = array();
        if ($getPost[0]->GanThe != NULL) {
            $tag = explode('&', $getPost[0]->GanThe);
            for ($i = 0; $i < count($tag) - 1; $i++)
                $newTag[$tag[$i]] = $tag[$i];
            Session::put('tag', $newTag);
        }
        $post = Functions::getPost($getPost[0]);
        return view('Modal/ModalPost/ModalEditPost')->with('post', $post);
    }
}
