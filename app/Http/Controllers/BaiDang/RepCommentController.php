<?php

namespace App\Http\Controllers\BaiDang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Baidang;
use App\Models\Binhluan;
use App\Models\Functions;
use App\Models\Process;
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
        Binhluan::add(
            $idBinhLuan,
            $request->IDBaiDang,
            Session::get('user')[0]->IDTaiKhoan,
            $request->NoiDungBinhLuan,
            date("Y-m-d H:i:s"),
            $request->IDBinhLuan,
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
    public function view(Request $request)
    {
        $comment = Process::getRepCommentLimit($request->IDBinhLuan, $request->Index);
        $view = "";
        for ($i = 0; $i < count($comment); $i++)
            $view .= view('Component\BinhLuan\BinhLuanLv2')->with('comment', $comment[$i]);
        return $view;
    }
    public function load(Request $request)
    {
        $comment = Process::getRepCommentLimit($request->IDBinhLuan, $request->Index);
        if (count($comment) == 0)
            return '';
        else
            return view('Component\BinhLuan\XemPhanHoi')
                ->with('num', $request->Num)
                ->with('count', $request->Count)
                ->with('idTaiKhoan', $request->IDTaiKhoan)
                ->with('idTaiKhoan', $request->IDBinhLuan)
                ->with('idBaiDang', $request->IDBaiDang);
    }
}
