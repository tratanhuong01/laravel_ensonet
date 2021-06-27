<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Baidang;
use App\Models\Functions;
use App\Models\Hinhanh;
use App\Models\StringUtil;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Exception;
use JD\Cloudder\Facades\Cloudder;

class UpdateAvatarController extends Controller
{
    public function view(Request $request)
    {
        try {
            if ($request->hasFile('fileAvatar')) {
                return view('Modal/ModalProfile/ViewAvatarImage');
            }
        } catch (Exception $e) {
            $e->Error;
        }
    }
    public function update(Request $request)
    {
        if ($request->hasFile('fileAvatar')) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $user = Session::get('user');
            $idBaiDang = StringUtil::ID('baidang', 'IDBaiDang');
            $idHinhAnh = StringUtil::ID('hinhanh', 'IDHinhAnh');
            Baidang::add(
                $idBaiDang,
                $user[0]->IDTaiKhoan,
                'CHIBANBE',
                $request->content,
                NULL,
                NULL,
                NULL,
                date("Y-m-d H:i:s"),
                0,
                NULL,
            );
            Cloudder::upload($request->file('fileAvatar'), null, ['folder' => 'Avatar'], 'avatar.jpg');
            $nameFile = Cloudder::getResult()['url'];
            Hinhanh::add(
                $idHinhAnh,
                'ANHDAIDIEN',
                $idBaiDang,
                $nameFile,
                $request->content,
                '0',
                NULL
            );
            DB::update(
                'UPDATE taikhoan SET AnhDaiDien = ? WHERE IDTaiKhoan = ? ',
                [$nameFile, $user[0]->IDTaiKhoan]
            );
            $users = DB::table('taikhoan')->where('IDTaiKhoan', '=', $user[0]->IDTaiKhoan)->get();
            $request->session()->put('user', $users);
            $post = Functions::getPost(
                Baidang::where('baidang.IDBaiDang', '=', $idBaiDang)
                    ->get()[0]
            );
            return response()->json([
                'viewChild' => "" . view('Modal.ModalProfile.AvatarImage')->with('path', $nameFile),
                'viewMain' => "" . view('Component.Post.UpdateAvatarImage')
                    ->with('item', $post)
                    ->with('user', $user)
            ]);
        } else
            echo "khong co file";
    }
}
