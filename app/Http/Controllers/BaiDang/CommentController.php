<?php

namespace App\Http\Controllers\BaiDang;

use App\Events\NotificationEvent;
use App\Http\Controllers\Controller;
use App\Models\Baidang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Exception;
use App\Models\Binhluan;
use App\Models\Notify;
use App\Models\StringUtil;
use App\Models\Process;
use App\Models\Thongbao;

class CommentController extends Controller
{
    public function comment(Request $request)
    {
        $user = Session::get('user');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $idBinhLuan = StringUtil::ID('binhluan', 'IDBinhLuan');
        $date = date("Y-m-d H:i:s");
        Binhluan::add(
            $idBinhLuan,
            $request->IDBaiDang,
            Session::get('user')[0]->IDTaiKhoan,
            $request->NoiDungBinhLuan,
            $date,
            '0',
            '1',
            NULL
        );
        $post = Baidang::where('baidang.IDBaiDang', '=', $request->IDBaiDang)->get();
        $idTaiKhoan = Baidang::where('baidang.IDBaiDang', '=', $request->IDBaiDang)
            ->get()[0]->IDTaiKhoan;
        if ($user[0]->IDTaiKhoan == $idTaiKhoan) {
        } else {
            if ($post[0]->GanThe == "") {
                $typeNotify = 'BINHLUANPO';
                Thongbao::add(
                    StringUtil::ID('thongbao', 'IDThongBao'),
                    $idTaiKhoan,
                    $typeNotify,
                    $request->IDBaiDang . '&' . $typeNotify,
                    $user[0]->IDTaiKhoan,
                    '0',
                    $date
                );
                event(new NotificationEvent($post[0]->IDTaiKhoan));
            } else {
                $typeNotify = 'BINHLUANPO';
                $arrTag = explode('&', $post[0]->GanThe);
                Thongbao::add(
                    StringUtil::ID('thongbao', 'IDThongBao'),
                    $idTaiKhoan,
                    $typeNotify,
                    $request->IDBaiDang . '&' . $typeNotify,
                    $user[0]->IDTaiKhoan,
                    '0',
                    $date
                );
                event(new NotificationEvent($post[0]->IDTaiKhoan));
                for ($i = 0; $i < count($arrTag) - 1; $i++) {
                    if ($arrTag[$i] == $user[0]->IDTaiKhoan) {
                    } else {
                        Thongbao::add(
                            StringUtil::ID('thongbao', 'IDThongBao'),
                            $arrTag[$i],
                            $typeNotify,
                            $request->IDBaiDang . '&' . $typeNotify,
                            $user[0]->IDTaiKhoan,
                            '0',
                            $date
                        );
                        event(new NotificationEvent($arrTag[$i]));
                    }
                }
            }
        }
        $comment = DB::table('binhluan')
            ->join('taikhoan', 'binhluan.IDTaiKhoan', '=', 'taikhoan.IDTaiKhoan')
            ->where('binhluan.IDBaiDang', '=', $request->IDBaiDang)
            ->where('binhluan.IDBinhLuan', '=', $idBinhLuan)
            ->get();
        return view('Component\BinhLuan\BinhLuanLv1')
            ->with(
                'comment',
                $comment[0]
            );
    }
    public function viewmore(Request $request)
    {
        $comment = Process::getCommentLimitFromTo($request->IDBaiDang, $request->Index);
        $view = "";
        for ($i = 0; $i < count($comment); $i++)
            $view .= view('Component\BinhLuan\BinhLuanLv1')->with('comment', $comment[$i]);
        return $view;
    }
    public function numcomment(Request $request)
    {
        $comment = Process::getCommentLimitFromTo($request->IDBaiDang, $request->Index);
        if (count($comment) == 0)
            return '';
        else
            return view('Component\BinhLuan\XemThemBinhLuan')
                ->with('num', $request->Num)
                ->with('count', $request->Count)
                ->with('idTaiKhoan', $request->IDTaiKhoan)
                ->with('idBaiDang', $request->IDBaiDang);
    }
}
