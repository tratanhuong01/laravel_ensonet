<?php

namespace App\Http\Controllers\Post;

use App\Events\NotificationEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Baidang;
use App\Models\Hinhanh;
use App\Models\StringUtil;
use App\Models\Thongbao;
use App\Process\DataProcess;
use App\Process\DataProcessSix;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Exception;
use JD\Cloudder\Facades\Cloudder;

class PostNormalController extends Controller
{
    public function post(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $user = Session::get('user');
        if (DataProcessSix::checkWordIsValid($request->content) == false) {
            Thongbao::add(
                StringUtil::ID('thongbao', 'IDThongBao'),
                $user[0]->IDTaiKhoan,
                'WARNPOST00',
                'WARNPOST00',
                $user[0]->IDTaiKhoan,
                '0',
                date("Y-m-d H:i:s")
            );
            event(new NotificationEvent($user[0]->IDTaiKhoan));
            return response()->json([]);
        } else {
            if ($request->hasFile('files_0')) {
                $datetime = date("Y-m-d H:i:s");
                $idBaiDang = StringUtil::ID('baidang', 'IDBaiDang');
                $tag = "";
                $idCamXuc = NULL;
                $idViTri = NULL;
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
                if (session()->has('localU'))
                    foreach (Session::get('localU') as $key => $value)
                        $idViTri = $value->ID . '@' . $value->Loai;
                Baidang::add(
                    $idBaiDang,
                    $user[0]->IDTaiKhoan,
                    $request->IDQuyenRiengTu,
                    $request->content,
                    $tag,
                    $idCamXuc,
                    $idViTri,
                    $datetime,
                    2,
                    NULL
                );
                for ($i = 0; $i < (int)$request->numberImage; $i++) {
                    $idHinhAnh = StringUtil::ID('hinhanh', 'IDHinhAnh');
                    if (DataProcessSix::CheckIsVideo($request->file('files_' . $i)->getClientOriginalName())) {
                        Cloudder::uploadVideo(
                            $request->file('files_' . $i),
                            null,
                            ['folder' => 'Video'],
                            'Video.mp4'
                        );
                        $nameFile = Cloudder::getResult()['url'];
                        Hinhanh::add(
                            $idHinhAnh,
                            'VIDEO0001',
                            $idBaiDang,
                            $nameFile,
                            NULL,
                            1,
                            NULL
                        );
                    } else if (DataProcessSix::CheckIsImage($request->file('files_' . $i)->getClientOriginalName())) {
                        Cloudder::upload($request->file('files_' . $i), null, ['folder' => 'PostNormal'], 'PostNormal.jpg');
                        $nameFile = Cloudder::getResult()['url'];
                        Hinhanh::add(
                            $idHinhAnh,
                            'THONGTHUON',
                            $idBaiDang,
                            $nameFile,
                            NULL,
                            0,
                            NULL
                        );
                    } else {
                    }
                }
            } else {
                $datetime = date("Y-m-d H:i:s");
                $idBaiDang = StringUtil::ID('baidang', 'IDBaiDang');
                $tag = NULL;
                $idCamXuc = NULL;
                $idViTri = NULL;
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
                if (session()->has('localU'))
                    foreach (Session::get('localU') as $key => $value)
                        $idViTri = $value->ID . '@' . $value->Loai;
                Baidang::add(
                    $idBaiDang,
                    $user[0]->IDTaiKhoan,
                    $request->IDQuyenRiengTu,
                    $request->content,
                    $tag,
                    $idCamXuc,
                    $idViTri,
                    $datetime,
                    2,
                    NULL
                );
            }
        }
    }
    public function tickLocal(Request $request)
    {
        if (session()->has('localU')) {
            $localU = Session::get('localU');
            if (isset($localU[$request->ID])) {
                Session::forget('localU');
                return response()->json([
                    'view' => '',
                    'local' => ''
                ]);
            } else {
                Session::forget('localU');
                $localUser[$request->ID] = (object)[
                    'ID' => $request->ID,
                    'Loai' => $request->Loai
                ];
                Session::put('localU', $localUser);
                $view = "";
                foreach ($localUser as $key => $value)
                    $view .= DataProcess::getLocal($value->ID . '@' . $value->Loai);
                return response()->json([
                    'view' => "" .  '<i class="fas fa-check text-green-400 text-xm"></i>',
                    'local' => "" . $view
                ]);
            }
        } else {
            $localU[$request->ID] = (object)[
                'ID' => $request->ID,
                'Loai' => $request->Loai
            ];
            Session::put('localU', $localU);
            $view = "";
            foreach ($localU as $key => $value)
                $view .= DataProcess::getLocal($value->ID . '@' . $value->Loai);
            return response()->json([
                'view' => "" .  '<i class="fas fa-check text-green-400 text-xm"></i>',
                'local' => "" . $view
            ]);
        }
    }
}
