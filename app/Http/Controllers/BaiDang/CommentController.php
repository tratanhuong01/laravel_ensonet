<?php

namespace App\Http\Controllers\BaiDang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Exception;
use App\Models\Binhluan;
use App\Models\StringUtil;

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
                $comment
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
        return view('Component\BinhLuan\BinhLuanLv1')->with('comment', $comment[0]);
    }
}
