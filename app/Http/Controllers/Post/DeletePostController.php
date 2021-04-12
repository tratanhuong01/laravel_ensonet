<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Baidang;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class DeletePostController extends Controller
{
    public function warn(Request $request)
    {
        return view('Modal/ModalPost/ModalDeletePost')->with('idBaiDang', $request->IDBaiDang);
    }
    public function delete(Request $request)
    {
        $hinhAnh = DB::table('hinhanh')->where('hinhanh.IDBaiDang', '=', $request->IDBaiDang)->get();
        for ($i = 0; $i < count($hinhAnh); $i++) {
            if (File::exists(public_path($hinhAnh[$i]->DuongDan))) {
                File::delete(public_path($hinhAnh[$i]->DuongDan));
            } else {
                dd('File does not exists.');
            }
        }
        Baidang::where('baidang.IDBaiDang', '=', $request->IDBaiDang)->delete();
        return '';
    }
}
