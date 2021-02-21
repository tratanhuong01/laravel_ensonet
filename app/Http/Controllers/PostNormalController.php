<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Baidang;
use App\Models\Hinhanh;
use App\Models\StringUtil;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Exception;

class PostNormalController extends Controller
{
    public function post(Request $request)
    {
        try {
            if ($request->hasFile('files')) {
                $files = $request->file('files');
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $user = Session::get('user');
                $datetime = date("Y-m-d H:i:s");
                $idBaiDang = StringUtil::ID('baidang', 'IDBaiDang');
                Baidang::add(
                    $idBaiDang,
                    $user[0]->IDTaiKhoan,
                    'CHIBANBE',
                    $request->content,
                    NULL,
                    NULL,
                    NULL,
                    $datetime,
                    2
                );
                foreach ($files as $file) {
                    $idHinhAnh = StringUtil::ID('hinhanh', 'IDHinhAnh');
                    $nameFile = $user[0]->IDTaiKhoan . $idBaiDang . $idHinhAnh . '.jpg';
                    Hinhanh::add($idHinhAnh, 'THONGTHUON', $idBaiDang, 'img/PosTT/' . $nameFile, NULL);
                    $file->move(public_path('img/PosTT'), $nameFile);
                }
                echo "<pre>";
                print_r($files);
                echo "</pre>";
            } else
                echo "khong co file";
        } catch (Exception $e) {
            $e->Error;
        }
    }
}
