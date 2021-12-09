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
use JD\Cloudder\Facades\Cloudder;

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
                NoiDung = ? ,GanThe = ? ,IDCamXuc = ? ,IDDiaChi = ? 
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
                    $public_Id = explode('/', $value->DuongDan);
                    $public_Id = $public_Id[count($public_Id) - 2]  . "/" . $public_Id[count($public_Id) - 1];
                    Cloudder::destroyImage(explode('.', $public_Id)[0]);
                    Cloudder::delete(explode('.', $public_Id)[0]);
                }
            }
            for ($i = 0; $i < (int)$request->numberImage; $i++) {
                $idHinhAnh = StringUtil::ID('hinhanh', 'IDHinhAnh');
                $nameFile = $request->file('files_' . $i)->getClientOriginalName();
                if (DataProcessSix::CheckIsVideo($nameFile)) {
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
                } else if (DataProcessSix::CheckIsImage($nameFile)) {
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
                    $public_Id = explode('/', $value->DuongDan);
                    $public_Id = $public_Id[count($public_Id) - 2]  . "/" . $public_Id[count($public_Id) - 1];
                    Cloudder::destroyImage(explode('.', $public_Id)[0]);
                    Cloudder::delete(explode('.', $public_Id)[0]);
                }
            }
            DB::update('UPDATE baidang SET IDQuyenRiengTu = ? ,
                        NoiDung = ? ,GanThe = ? ,IDCamXuc = ? ,IDDiaChi = ? 
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
        $postShare = Baidang::where('baidang.IDBaiDang', '=', $post[0]->ChiaSe)->get();
        if (count($postShare) == 0) {
            $postShare = [];
        } else {
            $postShare = Functions::getPost($postShare[0]);
        }
        switch ($post[0]->LoaiBaiDang) {
            case 0:
                return response()->json([
                    'view' => "" . view('Component.Post.UpdateAvatarImage')
                        ->with('item', $post)
                        ->with('user', $user)
                ]);
            case 1:
                return response()->json([
                    'view' => "" . view('Component.Post.UpdateCoverImage')
                        ->with('item', $post)
                        ->with('user', $user)
                ]);
            case 2:
                return response()->json([
                    'view' => "" . view('Component.Post.PostNormal')
                        ->with('item', $post)
                        ->with('user', $user)
                ]);
            case 3:
                return response()->json([
                    'view' => "" . view('Component.Post.SharePost')
                        ->with('item', $post)
                        ->with('user', $user)
                        ->with('postShare', $postShare)
                ]);
            case 4:
                return response()->json([
                    'view' => "" . view('Component.Post.Timeline')
                        ->with('item', $post)
                        ->with('user', $user)
                ]);
                break;
            case 5:
                return response()->json([
                    'view' => "" . view('Component.Post.PostShareMemory')
                        ->with('item', $post)
                        ->with('user', $user)
                        ->with('postShare', $postShare)
                ]);
                break;
            default:
                $view = "Not DâtA";
                break;
        }
    }
    public function view(Request $request)
    {
        $user = Session::get('user');
        $checkPost = Baidang::where('baidang.IDBaiDang', '=', $request->IDBaiDang)->get()[0];
        $getPost = array();
        $postShare = array();
        if ($checkPost->LoaiBaiDang == 3) {
            $getPost = $getPost = DB::table('baidang')
                ->where('baidang.IDBaiDang', '=', $request->IDBaiDang)
                ->where('baidang.IDTaiKhoan', '=', $user[0]->IDTaiKhoan)
                ->get();
            $postShare = DB::table('baidang')
                ->where('baidang.IDBaiDang', '=', $checkPost->ChiaSe)
                ->join('hinhanh', 'baidang.IDBaiDang', 'hinhanh.IDBaiDang')
                ->join('taikhoan', 'baidang.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
                ->get();
        } else {
            $getPost = DB::table('baidang')
                ->where('baidang.IDBaiDang', '=', $request->IDBaiDang)
                ->where('baidang.IDTaiKhoan', '=', $user[0]->IDTaiKhoan)
                ->get();
            $postShare = DB::table('baidang')
                ->where('baidang.IDBaiDang', '=', $checkPost->ChiaSe)
                ->join('hinhanh', 'baidang.IDBaiDang', 'hinhanh.IDBaiDang')
                ->join('taikhoan', 'baidang.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
                ->get();
        }

        if ($getPost[0]->IDCamXuc != NULL) {
            $feelCur[$getPost[0]->IDCamXuc] = $getPost[0]->IDCamXuc;
            Session::put('feelCur', $feelCur);
        }
        if ($getPost[0]->IDDiaChi != NULL) {
            $localU[$getPost[0]->IDDiaChi] = (object)[
                'ID' => explode('@', $getPost[0]->IDDiaChi)[0],
                'Loai' => explode('@', $getPost[0]->IDDiaChi)[1]
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
        $json = [];
        if ($post[0]->DuongDan != "" || $post[0]->DuongDan != NULL)
            foreach ($post as $key => $value) {
                $json[$key] = (object)[
                    'ID' => $value->IDHinhAnh,
                    'DuongDan' => $value->DuongDan,
                    'Loai' => $value->Loai
                ];
            }
        return response()->json([
            'view' => "" . view('Modal.ModalPost.ModalEditPost')->with('post', $post)
                ->with('postShare', $postShare),
            'json' => $json,
            'state' => $post[0]->LoaiBaiDang
        ]);
    }
}
