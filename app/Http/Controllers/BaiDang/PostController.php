<?php

namespace App\Http\Controllers\BaiDang;

use App\Http\Controllers\Controller;
use App\Models\Baidang;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function view($idBaiDang)
    {
        return view('Guest\post')
            ->with('post_main', Baidang::where('baidang.IDBaiDang', '=', $idBaiDang)->get());
    }
}
