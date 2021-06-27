<?php

namespace App\Http\Controllers\Post;

use App\Events\NotificationEvent;
use App\Http\Controllers\Controller;
use App\Models\Baidang;
use App\Models\Functions;
use App\Models\Notify;
use App\Models\StringUtil;
use App\Models\Thongbao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Exception;

class SharePostController extends Controller
{
    public function shareView(Request $request)
    {
        $post = Functions::getPost(
            Baidang::where('baidang.IDBaiDang', '=', $request->IDBaiDang)
                ->get()[0]
        );
        if ($post[0]->LoaiBaiDang == 3)
            return response()->json(
                [
                    'view' => "" . view('Component.Post.Child.ModalShare', [
                        'item' => $post, 'idBaiDang' => $post[0]->ChiaSe,
                        'type' => $request->type
                    ])
                ]
            );
        else
            return response()->json(
                [
                    'view' => "" . view(
                        'Component.Post.Child.ModalShare',
                        [
                            'item' => $post, 'idBaiDang' => $post[0]->IDBaiDang,
                            'type' => $request->type
                        ]
                    )
                ]
            );
    }
    public function shareIntoWall(Request $request)
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
        $post = Functions::getPost($getPost[0]);
        return response()->json([
            'view' => "" . view('Modal.ModalPost.ModalSharePost')
                ->with('post', $post)
                ->with('postShare', $postShare)
                ->with('type', $request->Type),
        ]);
    }
    public function share(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $idBaiDang = StringUtil::ID('baidang', 'IDBaiDang');
        $user = Session::get('user');
        Baidang::add(
            $idBaiDang,
            Session::get('user')[0]->IDTaiKhoan,
            $request->IDQuyenRiengTu,
            '',
            NULL,
            NULL,
            NULL,
            date("Y-m-d H:i:s"),
            $request->LoaiBaiDang,
            $request->IDBaiDang
        );
        $postShare = Baidang::where('baidang.IDBaiDang', '=', $request->IDBaiDang)->get();
        if (count($postShare) > 0)
            if ($postShare[0]->IDTaiKhoan ==  $user[0]->IDTaiKhoan) {
            } else {
                Thongbao::add(
                    StringUtil::ID('thongbao', 'IDThongBao'),
                    $postShare[0]->IDTaiKhoan,
                    'CSBVCB123',
                    $idBaiDang . '&' . 'CSBVCB123',
                    Session::get('user')[0]->IDTaiKhoan,
                    '0',
                    date("Y-m-d H:i:s")
                );
                event(new NotificationEvent($postShare[0]->IDTaiKhoan));
            }
        $post = Functions::getPost(
            Baidang::where('baidang.IDBaiDang', '=', $idBaiDang)
                ->get()[0]
        );
        switch ($request->LoaiBaiDang) {
            case 3:
                return response()->json([
                    'view' => "" . view('Component.Post.SharePost')->with('item', $post)
                        ->with('user', $user)
                ]);
                break;
            case 5:
                return response()->json([
                    'view' => "" . view('Component.Post.PostShareMemory')->with('item', $post)
                        ->with('user', $user)
                ]);
                break;
            default:
                # code...
                break;
        }
    }
    public function shareMemory(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $idBaiDang = StringUtil::ID('baidang', 'IDBaiDang');
        $user = Session::get('user');
        $datetime = date("Y-m-d H:i:s");
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
            $request->share3Or5,
            $request->IDBaiDang
        );
        switch ($request->share3Or5) {
            case 3:
                $postShare = Baidang::where('baidang.IDBaiDang', '=', $request->IDBaiDang)->get();
                if (count($postShare) > 0)
                    if ($postShare[0]->IDTaiKhoan ==  $user[0]->IDTaiKhoan) {
                    } else {
                        Thongbao::add(
                            StringUtil::ID('thongbao', 'IDThongBao'),
                            $postShare[0]->IDTaiKhoan,
                            'CSBVCB123',
                            $idBaiDang . '&' . 'CSBVCB123',
                            Session::get('user')[0]->IDTaiKhoan,
                            '0',
                            date("Y-m-d H:i:s")
                        );
                        event(new NotificationEvent($postShare[0]->IDTaiKhoan));
                    }
                $post = Functions::getPost(
                    Baidang::where('baidang.IDBaiDang', '=', $idBaiDang)
                        ->get()[0]
                );
                return response()->json([
                    'view' => "" . view('Component.Post.SharePost')->with('item', $post)
                        ->with('user', $user)
                ]);
                break;
            case 5:
                $post = Functions::getPost(
                    Baidang::where('baidang.IDBaiDang', '=', $idBaiDang)
                        ->get()[0]
                );
                return response()->json([
                    'view' => "" . view('Component.Post.PostShareMemory')->with('item', $post)
                        ->with('user', $user)
                ]);
                break;
            default:
                # code...
                break;
        }
    }
}
