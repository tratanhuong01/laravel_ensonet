<?php

namespace App\Http\Controllers\BaiDang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Baidang;
use App\Models\Binhluan;
use App\Models\Functions;
use App\Models\StringUtil;
use Illuminate\Support\Facades\DB;
use App\Models\Taikhoan;
use Illuminate\Support\Facades\Session;

class RepCommentController extends Controller
{
    public function repview(Request $request)
    {
        $comment = DB::table('binhluan')
            ->join('taikhoan', 'binhluan.IDTaiKhoan', '=', 'taikhoan.IDTaiKhoan')
            ->where('binhluan.IDBaiDang', '=', $request->IDBaiDang)
            ->where('binhluan.IDBinhLuan', '=', $request->IDBinhLuan)
            ->orderBy('ThoiGianBinhLuan', 'desc')
            ->get();
        return view('Component\BinhLuan\VietBinhLuanLv2')
            ->with(
                'comment',
                $comment[0]
            )
            ->with(
                'name',
                view('Component\Child\TheTag')->with(
                    'name',
                    $comment[0]->Ho . ' ' . $comment[0]->Ten
                )
            );
    }
    public function rep(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $idBinhLuan = StringUtil::ID('binhluan', 'IDBinhLuan');
        DB::update('UPDATE binhluan SET binhluan.PhanHoi = ? WHERE 
        binhluan.IDBinhLuan = ? ', [$request->IDBinhLuan, $request->IDBinhLuan]);
        Binhluan::add(
            $idBinhLuan,
            $request->IDBaiDang,
            Session::get('user')[0]->IDTaiKhoan,
            $request->NoiDungBinhLuan,
            date("Y-m-d H:i:s"),
            '0',
            '2',
            NULL
        );
        $comment = DB::table('binhluan')
            ->join('taikhoan', 'binhluan.IDTaiKhoan', '=', 'taikhoan.IDTaiKhoan')
            ->where('binhluan.IDBaiDang', '=', $request->IDBaiDang)
            ->where('binhluan.IDBinhLuan', '=', $idBinhLuan)
            ->get();
        return view('Component\BinhLuan\BinhLuanLv2')
            ->with(
                'comment',
                $comment[0]
            );
    }
}