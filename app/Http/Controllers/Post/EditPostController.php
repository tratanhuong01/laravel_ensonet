<?php

namespace App\Http\Controllers\Post;

use App\Events\NotificationEvent;
use App\Http\Controllers\Controller;
use App\Models\Baidang;
use Illuminate\Http\Request;
use App\Models\Functions;
use App\Models\Hinhanh;
use App\Models\StringUtil;
use App\Models\Thongbao;
use App\Process\DataProcess;
use App\Process\DataProcessSix;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class EditPostController extends Controller
{
    public function edit(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $user = Session::get('user');
        if ($request->hasFile('files_0')) {
            $idBaiDang = $request->IDBaiDang;
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
            DB::update('UPDATE baidang SET IDQuyenRiengTu = ? ,
                NoiDung = ? ,GanThe = ? ,IDCamXuc = ? ,IDViTri = ? 
                 WHERE IDBaiDang = ? ', [
                $request->IDQuyenRiengTu,
                $request->content,
                $tag,
                $idCamXuc,
                $idViTri,
                $request->IDBaiDang
            ]);
            $allImage = Hinhanh::where('hinhanh.IDBaiDang', '=', $idBaiDang)->get();
            $fileIsset = json_decode($request->fileIsset);
            foreach ($allImage as $key => $value) {
                $count = 0;
                foreach ($fileIsset as $keys => $values) {
                    if ($values->DuongDan == $value->DuongDan)
                        $count++;
                }
                if ($count == 0) {
                    Hinhanh::where('hinhanh.IDHinhAnh', '=', $value->IDHinhAnh)->delete();
                    if (File::exists(public_path($value->DuongDan)))
                        File::delete(public_path($value->DuongDan));
                }
            }
            for ($i = 0; $i < (int)$request->numberImage; $i++) {
                $idHinhAnh = StringUtil::ID('hinhanh', 'IDHinhAnh');
                $nameFile = $request->file('files_' . $i)->getClientOriginalName();
                echo $nameFile;
                if (DataProcessSix::CheckIsVideo($nameFile)) {
                    $nameFile = $user[0]->IDTaiKhoan . $idBaiDang . $idHinhAnh . '.mp4';
                    Hinhanh::add(
                        $idHinhAnh,
                        'VIDEO0001',
                        $idBaiDang,
                        'video/' . $nameFile,
                        NULL,
                        1,
                        NULL
                    );
                    $request->file('files_' . $i)->move(public_path('video'), $nameFile);
                } else if (DataProcessSix::CheckIsImage($nameFile)) {
                    $nameFile = $user[0]->IDTaiKhoan . $idBaiDang . $idHinhAnh . '.jpg';
                    Hinhanh::add(
                        $idHinhAnh,
                        'THONGTHUON',
                        $idBaiDang,
                        'img/PosTT/' . $nameFile,
                        NULL,
                        0,
                        NULL
                    );
                    $request->file('files_' . $i)->move(public_path('img/PosTT'), $nameFile);
                } else {
                    echo "not valid";
                }
            }
        } else {
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
                            $request->IDBaiDang . '&' . 'DGTBTMBV1',
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
            $allImage = Hinhanh::where('hinhanh.IDBaiDang', '=', $request->IDBaiDang)->get();
            $fileIsset = json_decode($request->fileIsset);
            foreach ($allImage as $key => $value) {
                $count = 0;
                foreach ($fileIsset as $keys => $values) {
                    if ($value->IDHinhAnh == $values->IDHinhAnh)
                        $count++;
                }
                if ($count == 0) {
                    Hinhanh::where('hinhanh.IDHinhAnh', '=', $value->IDHinhAnh)->delete();
                    if (File::exists(public_path($value->DuongDan)))
                        File::delete(public_path($value->DuongDan));
                }
            }
            DB::update('UPDATE baidang SET IDQuyenRiengTu = ? ,
                        NoiDung = ? ,GanThe = ? ,IDCamXuc = ? ,IDViTri = ? 
                         WHERE IDBaiDang = ? ', [
                $request->IDQuyenRiengTu,
                $request->content,
                $tag,
                $idCamXuc,
                $idViTri,
                $request->IDBaiDang
            ]);
        }
        $post = Functions::getPost(
            Baidang::where('baidang.IDBaiDang', '=', $request->IDBaiDang)
                ->get()[0]
        );
        return response()->json([
            'view' => "" . view('Component/Post/PostNormal')
                ->with('item', $post)
                ->with('user', $user)
        ]);
    }
    public function view(Request $request)
    {
        $user = Session::get('user');
        $getPost = DB::table('baidang')
            ->where('baidang.IDBaiDang', '=', $request->IDBaiDang)
            ->where('baidang.IDTaiKhoan', '=', $user[0]->IDTaiKhoan)
            ->get();
        if ($getPost[0]->IDCamXuc != NULL) {
            $feelCur[$getPost[0]->IDCamXuc] = $getPost[0]->IDCamXuc;
            Session::put('feelCur', $feelCur);
        }
        if ($getPost[0]->IDViTri != NULL) {
            $localU[$getPost[0]->IDViTri] = (object)[
                'ID' => explode('@', $getPost[0]->IDViTri)[0],
                'Loai' => explode('@', $getPost[0]->IDViTri)[1]
            ];
            Session::put('localU', $localU);
        }
        $newTag = array();
        if ($getPost[0]->GanThe != NULL) {
            $tag = explode('&', $getPost[0]->GanThe);
            for ($i = 0; $i < count($tag) - 1; $i++)
                $newTag[$tag[$i]] = $tag[$i];
            Session::put('tag', $newTag);
        }
        $post = Functions::getPost($getPost[0]);
        $json = NULL;
        if (count($post) != 0)
            foreach ($post as $key => $value) {
                $json[$key] = (object)[
                    'ID' => $value->IDHinhAnh,
                    'DuongDan' => $value->DuongDan
                ];
            }
        return response()->json([
            'view' => "" . view('Modal/ModalPost/ModalEditPost')->with('post', $post),
            'json' => $json
        ]);
    }
}
