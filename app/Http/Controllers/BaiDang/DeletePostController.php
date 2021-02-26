<?php

namespace App\Http\Controllers\BaiDang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Baidang;

class DeletePostController extends Controller
{
    public function warn(Request $request)
    {
        return view('Modal/ModalBaiDang/ModalXoaBaiDang')->with('idBaiDang', $request->IDBaiDang);
    }
    public function delete(Request $request)
    {
        Baidang::where('baidang.IDBaiDang', '=', $request->IDBaiDang)->delete();
        return '';
    }
}
