<?php

namespace App\Http\Controllers\BaiDang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Exception;
use App\Models\Binhluan;
use App\Models\StringUtil;
use App\Models\Process;

class CommentController extends Controller
{
    public function comment(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $idBinhLuan = StringUtil::ID('binhluan', 'IDBinhLuan');
        Binhluan::add(
            $idBinhLuan,
            $request->IDBaiDang,
            Session::get('user')[0]->IDTaiKhoan,
            $request->NoiDungBinhLuan,
            date("Y-m-d H:i:s"),
            '0',
            '1',
            NULL
        );
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
        $comment = DB::table('binhluan')
            ->skip(0)->take(2)
            ->join('taikhoan', 'binhluan.IDTaiKhoan', '=', 'taikhoan.IDTaiKhoan')
            ->where('binhluan.IDBaiDang', '=', $request->IDBaiDang)
            ->orderBy('ThoiGianBinhLuan', 'desc')
            ->get();
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
