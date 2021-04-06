<?php

namespace App\Http\Controllers\BaiDang;

use App\Events\NotificationEvent;
use App\Http\Controllers\Controller;
use App\Models\Baidang;
use App\Models\Hinhanh;
use App\Models\StringUtil;
use App\Models\Thongbao;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostTimeLineController extends Controller
{
    public function post(Request $request)
    {
        try {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $user = Session::get('user');
            if ($request->hasFile('files')) {
                $files = $request->file('files');
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
                    $request->IDNhan,
                    $request->IDQuyenRiengTu,
                    $request->content,
                    $tag,
                    $idCamXuc,
                    NULL,
                    $datetime,
                    4,
                    $user[0]->IDTaiKhoan
                );
                foreach ($files as $file) {
                    $idHinhAnh = StringUtil::ID('hinhanh', 'IDHinhAnh');
                    $nameFile = $user[0]->IDTaiKhoan . $idBaiDang . $idHinhAnh . '.jpg';
                    Hinhanh::add($idHinhAnh, 'TIMELINE', $idBaiDang, 'img/timelineImage/' . $nameFile, NULL);
                    $file->move(public_path('img/timelineImage'), $nameFile);
                }

                return response()->json([
                    'view' => "" . view('Component/BaiDang/DongThoiGian')
                        ->with('item', Baidang::where('baidang.IDBaiDang', '=', $idBaiDang)
                            ->join('taikhoan', 'baidang.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
                            ->leftjoin('hinhanh', 'baidang.IDBaiDang', 'hinhanh.IDBaiDang')->get())
                        ->with('user', Session::get('user'))
                ]);
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
                    $request->IDNhan,
                    $request->IDQuyenRiengTu,
                    $request->content,
                    $tag,
                    $idCamXuc,
                    NULL,
                    $datetime,
                    4,
                    $user[0]->IDTaiKhoan
                );
                return response()->json([
                    'view' => "" . view('Component/BaiDang/DongThoiGian')
                        ->with('item', Baidang::where('baidang.IDBaiDang', '=', $idBaiDang)
                            ->join('taikhoan', 'baidang.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
                            ->leftjoin('hinhanh', 'baidang.IDBaiDang', 'hinhanh.IDBaiDang')->get())
                        ->with('user', Session::get('user'))
                ]);
            }
        } catch (Exception $e) {
            $e->Error;
        }
    }
}
