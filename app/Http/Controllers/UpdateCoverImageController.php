<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Baidang;
use App\Models\Hinhanh;
use App\Models\StringUtil;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Exception;
use JD\Cloudder\Facades\Cloudder;

class UpdateCoverImageController extends Controller
{
    public function update(Request $request)
    {
        if ($request->hasFile('fileBia')) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $user = Session::get('user');
            $idBaiDang = StringUtil::ID('baidang', 'IDBaiDang');
            $idHinhAnh = StringUtil::ID('hinhanh', 'IDHinhAnh');
            Baidang::add(
                $idBaiDang,
                $user[0]->IDTaiKhoan,
                'CHIBANBE',
                $request->Content,
                NULL,
                NULL,
                NULL,
                date("Y-m-d H:i:s"),
                1,
                NULL
            );
            Cloudder::upload($request->file('fileBia'), null, ['folder' => 'CoverImage'], 'coverImage.jpg');
            $nameFile = Cloudder::getResult()['url'];
            Hinhanh::add(
                $idHinhAnh,
                'ANHBIA',
                $idBaiDang,
                $nameFile,
                $request->content,
                0,
                NULL
            );
            DB::update(
                'UPDATE taikhoan SET AnhBia = ? WHERE IDTaiKhoan = ? ',
                [$nameFile, $user[0]->IDTaiKhoan]
            );
            $users = DB::table('taikhoan')->where('IDTaiKhoan', '=', $user[0]->IDTaiKhoan)->get();
            $request->session()->put('user', $users);
            return view('Modal/ModalProfile/CoverImage')->with('path', $nameFile);
        } else
            echo "khong co file";
    }
}
