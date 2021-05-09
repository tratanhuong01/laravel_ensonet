<?php

namespace App\Http\Controllers\Post;

use App\Events\NotificationEvent;
use App\Http\Controllers\Controller;
use App\Models\Baidang;
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
        $post = Baidang::where('baidang.IDBaiDang', '=', $request->IDBaiDang)
            ->join('taikhoan', 'baidang.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
            ->leftjoin('hinhanh', 'baidang.IDBaiDang', 'hinhanh.IDBaiDang')->get();
        if ($post[0]->LoaiBaiDang == 3)
            return response()->json(
                [
                    'view' => "" . view('Component/Post/Child/ModalShare')
                        ->with('item', $post)
                        ->with('idBaiDang', $post[0]->ChiaSe)
                ]
            );
        else
            return response()->json(
                [
                    'view' => "" . view('Component/Post/Child/ModalShare')
                        ->with('item', $post)
                        ->with('idBaiDang', $post[0]->IDBaiDang)
                ]
            );
    }
    public function share(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $idBaiDang = StringUtil::ID('baidang', 'IDBaiDang');
        Baidang::add(
            $idBaiDang,
            Session::get('user')[0]->IDTaiKhoan,
            $request->IDQuyenRiengTu,
            '',
            NULL,
            NULL,
            NULL,
            date("Y-m-d H:i:s"),
            3,
            $request->IDBaiDang
        );
        $postShare = Baidang::where('baidang.IDBaiDang', '=', $request->IDBaiDang)->get();
        if ($postShare[0]->IDTaiKhoan ==  Session::get('user')[0]->IDTaiKhoan) {
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
    }
}
