<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Baidang;
use App\Models\Hinhanh;
use App\Models\StringUtil;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Exception;
use Cloudder;
use Cloudinary\Cloudinary;

class UpdateAvatarController extends Controller
{
    public function view(Request $request)
    {
        try {
            if ($request->hasFile('fileAvatar')) {
                return view('Modal/ModalProfile/XemTruocAnhDaiDien');
            }
        } catch (Exception $e) {
            $e->Error;
        }
    }
    public function update(Request $request)
    {
        try {
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
                $nameFile = $user[0]->IDTaiKhoan . $idBaiDang . $idHinhAnh . '.jpg';
                Hinhanh::add($idHinhAnh, 'ANHDAIDIEN', $idBaiDang, 'img/avatarImage/' . $nameFile, NULL);
                $request->file('fileAvatar')->move(public_path('img/avatarImage'), $nameFile);
                DB::update(
                    'UPDATE taikhoan SET AnhDaiDien = ? WHERE IDTaiKhoan = ? ',
                    ['img/avatarImage/' . $nameFile, $user[0]->IDTaiKhoan]
                );
                $users = DB::table('taikhoan')->where('IDTaiKhoan', '=', $user[0]->IDTaiKhoan)->get();
                $request->session()->put('user', $users);
                return view('Modal/ModalProfile/AnhDaiDien')->with('path', '/img/avatarImage/' . $nameFile);
            } else
                echo "khong co file";
        } catch (Exception $e) {
            $e->Error;
        }
    }
}
