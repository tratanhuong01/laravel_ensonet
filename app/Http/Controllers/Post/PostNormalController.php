<?php

namespace App\Http\Controllers\Post;

use App\Events\NotificationEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Baidang;
use App\Models\Hinhanh;
use App\Models\StringUtil;
use App\Models\Thongbao;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Exception;

class PostNormalController extends Controller
{
    public function post(Request $request)
    {
        try {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $user = Session::get('user');
            if ($request->hasFile('files_0')) {
                $datetime = date("Y-m-d H:i:s");
                $idBaiDang = StringUtil::ID('baidang', 'IDBaiDang');
                $tag = "";
                $idCamXuc = NULL;
                if (session()->has('feelCur'))
                    foreach (Session::get('feelCur') as $key => $value)
                        $idCamXuc = $value;
                if (session()->has('tag')) {
                    if (count(Session::get('tag')) > 0) {
                        $tags = Session::get('tag');
                        foreach ($tags as $key => $value) {
                            $tag .= $key . '&';
                        }
                        foreach ($tags as $key => $value) {
                            Thongbao::add(
                                StringUtil::ID('thongbao', 'IDThongBao'),
                                $value,
                                'DGTBTMBV1',
                                $idBaiDang . '&' . 'DGTBTMBV1',
                                $user[0]->IDTaiKhoan,
                                '0',
                                date("Y-m-d H:i:s")
                            );
                            event(new NotificationEvent($value));
                        }
                    }
                }
                Baidang::add(
                    $idBaiDang,
                    $user[0]->IDTaiKhoan,
                    $request->IDQuyenRiengTu,
                    $request->content,
                    $tag,
                    $idCamXuc,
                    NULL,
                    $datetime,
                    2,
                    NULL
                );
                for ($i = 0; $i < (int)$request->numberImage; $i++) {
                    $idHinhAnh = StringUtil::ID('hinhanh', 'IDHinhAnh');
                    $nameFile = $user[0]->IDTaiKhoan . $idBaiDang . $idHinhAnh . '.jpg';
                    Hinhanh::add($idHinhAnh, 'THONGTHUON', $idBaiDang, 'img/PosTT/' . $nameFile, NULL);
                    $request->file('files_' . $i)->move(public_path('img/PosTT'), $nameFile);
                }
            } else {
                $datetime = date("Y-m-d H:i:s");
                $idBaiDang = StringUtil::ID('baidang', 'IDBaiDang');
                $tag = "";
                $idCamXuc = "";
                if (session()->has('feelCur'))
                    foreach (Session::get('feelCur') as $key => $value)
                        $idCamXuc = $value;
                if (session()->has('tag')) {
                    if (count(Session::get('tag')) > 0) {
                        $tags = Session::get('tag');
                        foreach ($tags as $key => $value) {
                            $tag .= $key . '&';
                        }
                        foreach ($tags as $key => $value) {
                            Thongbao::add(
                                StringUtil::ID('thongbao', 'IDThongBao'),
                                $value,
                                'DGTBTMBV1',
                                $idBaiDang . '&' . 'DGTBTMBV1',
                                $user[0]->IDTaiKhoan,
                                '0',
                                date("Y-m-d H:i:s")
                            );
                            event(new NotificationEvent($value));
                        }
                    }
                }
                Baidang::add(
                    $idBaiDang,
                    $user[0]->IDTaiKhoan,
                    $request->IDQuyenRiengTu,
                    $request->content,
                    $tag,
                    $idCamXuc,
                    NULL,
                    $datetime,
                    2,
                    NULL
                );
            }
        } catch (Exception $es) {
        }
    }
}
