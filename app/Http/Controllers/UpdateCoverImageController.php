<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Baidang;
use App\Models\Hinhanh;
use App\Models\StringUtil;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Exception;

class UpdateCoverImageController extends Controller
{
    public function update(Request $request)
    {
        try {
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
                $nameFile = $user[0]->IDTaiKhoan . $idBaiDang . $idHinhAnh . '.jpg';
                Hinhanh::add(
                    $idHinhAnh,
                    'ANHBIA',
                    $idBaiDang,
                    'img/imageBia/' . $nameFile,
                    $request->content,
                    0,
                    NULL
                );
                $request->file('fileBia')->move(public_path('img/imageBia'), $nameFile);
                DB::update(
                    'UPDATE taikhoan SET AnhBia = ? WHERE IDTaiKhoan = ? ',
                    ['img/imageBia/' . $nameFile, $user[0]->IDTaiKhoan]
                );
                $users = DB::table('taikhoan')->where('IDTaiKhoan', '=', $user[0]->IDTaiKhoan)->get();
                $request->session()->put('user', $users);
                return view('Modal/ModalProfile/CoverImage')->with('path', '/img/imageBia/' . $nameFile);
            } else
                echo "khong co file";
        } catch (Exception $e) {
            $e->Error;
        }
    }
}
