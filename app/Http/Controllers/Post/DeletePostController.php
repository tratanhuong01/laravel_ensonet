<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Baidang;
use App\Models\Binhluan;
use App\Models\Thongbao;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use JD\Cloudder\Facades\Cloudder;

class DeletePostController extends Controller
{
    public function warn(Request $request)
    {
        return view('Modal/ModalPost/ModalDeletePost')->with('idBaiDang', $request->IDBaiDang);
    }
    public function delete(Request $request)
    {
        $images = DB::table('hinhanh')->where('hinhanh.IDBaiDang', '=', $request->IDBaiDang)->get();
        for ($i = 0; $i < count($images); $i++) {
            $public_Id = explode('/', $images[$i]->DuongDan);
            $public_Id = $public_Id[count($public_Id) - 2]  . "/" . $public_Id[count($public_Id) - 1];
            Cloudder::destroyImage(explode('.', $public_Id)[0]);
            Cloudder::delete(explode('.', $public_Id)[0]);
        }
        $comment = Binhluan::where('binhluan.IDBaiDang', '=', $request->IDBaiDang)->get();
        foreach ($comment as $key => $value) {
            if (json_decode($value->NoiDungBinhLuan)->LoaiBinhLuan == 1) {
                $public_Id = explode('/', json_decode($value->NoiDungBinhLuan)->DuongDan);
                $public_Id = $public_Id[count($public_Id) - 2]  . "/" . $public_Id[count($public_Id) - 1];
                Cloudder::destroyImage(explode('.', $public_Id)[0]);
                Cloudder::delete(explode('.', $public_Id)[0]);
            }
            Binhluan::where('binhluan.IDBinhLuan', '=', $value->IDBinhLuan)->delete();
        }
        Baidang::where('baidang.IDBaiDang', '=', $request->IDBaiDang)->delete();
        Thongbao::whereRaw("thongbao.IDContent LIKE '%" . $request->IDBaiDang . "%'")->delete();
        return '';
    }
}
