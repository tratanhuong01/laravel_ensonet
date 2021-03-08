<?php

namespace App\Http\Controllers\BaiDang;

use App\Events\NotificationEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Baidang;
use App\Models\Binhluan;
use App\Models\Functions;
use App\Models\Process;
use App\Models\StringUtil;
use Illuminate\Support\Facades\DB;
use App\Models\Taikhoan;
use App\Models\Thongbao;
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
            ->with('cmt', $comment)
            ->with(
                'name',
                view('Component\Child\TheTag')
                    ->with(
                        'name',
                        $comment[0]->Ho . ' ' . $comment[0]->Ten
                    )
                    ->with(
                        'idTag',
                        $comment[0]->IDTaiKhoan
                    )
            )
            ->with(
                'idTag',
                $comment[0]->IDTaiKhoan
            );
    }
    public function repview2(Request $request)
    {
        $comment = DB::table('binhluan')
            ->join('taikhoan', 'binhluan.IDTaiKhoan', '=', 'taikhoan.IDTaiKhoan')
            ->where('binhluan.IDBaiDang', '=', $request->IDBaiDang)
            ->where('binhluan.IDBinhLuan', '=', $request->IDBinhLuan)
            ->orderBy('ThoiGianBinhLuan', 'desc')
            ->get();
        $cmt = Binhluan::where('IDBinhLuan', '=', $request->IDBinhLuanRep)->get();
        $tag = Taikhoan::where('IDTaiKhoan', '=', $comment[0]->IDTaiKhoan)->get();
        return view('Component\BinhLuan\VietBinhLuanLv2')
            ->with(
                'comment',
                $comment[0]
            )
            ->with('cmt', $cmt)
            ->with(
                'name',
                view('Component\Child\TheTag')
                    ->with(
                        'name',
                        $tag[0]->Ho . ' ' . $tag[0]->Ten
                    )
                    ->with(
                        'idTag',
                        $tag[0]->IDTaiKhoan
                    )
            )->with(
                'idTag',
                $tag[0]->IDTaiKhoan
            );
    }
    public function rep(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $idBinhLuan = StringUtil::ID('binhluan', 'IDBinhLuan');
        $post = Baidang::where('baidang.IDBaiDang', '=', $request->IDBaiDang)->get();
        if (str_contains($request->NoiDungBinhLuan, ' bg-blue-500 text-white p-0.5">')) {
            Binhluan::add(
                $idBinhLuan,
                $request->IDBaiDang,
                Session::get('user')[0]->IDTaiKhoan,
                $request->NoiDungBinhLuan,
                date("Y-m-d H:i:s"),
                $request->IDBinhLuanRep,
                '2',
                explode('!@#$%', $request->NoiDungBinhLuan)[1]
            );
            if (explode('!@#$%', $request->NoiDungBinhLuan)[1] == $post[0]->IDTaiKhoan)
                Thongbao::add(
                    StringUtil::ID('thongbao', 'IDThongBao'),
                    explode('!@#$%', $request->NoiDungBinhLuan)[1],
                    'NDBTBLCH12',
                    $request->IDBaiDang . '&' . 'NDBTBLCH12' . '&' . $idBinhLuan,
                    Session::get('user')[0]->IDTaiKhoan,
                    '0',
                    date("Y-m-d H:i:s")
                );
            else
                Thongbao::add(
                    StringUtil::ID('thongbao', 'IDThongBao'),
                    explode('!@#$%', $request->NoiDungBinhLuan)[1],
                    'NDBTBLC123',
                    $request->IDBaiDang . '&' . 'NDBTBLC123' . '&' . $idBinhLuan,
                    Session::get('user')[0]->IDTaiKhoan,
                    '0',
                    date("Y-m-d H:i:s")
                );
            event(new NotificationEvent(explode('!@#$%', $request->NoiDungBinhLuan)[1]));
        } else {
            Binhluan::add(
                $idBinhLuan,
                $request->IDBaiDang,
                Session::get('user')[0]->IDTaiKhoan,
                $request->NoiDungBinhLuan,
                date("Y-m-d H:i:s"),
                $request->IDBinhLuanRep,
                '2',
                NULL
            );
            Thongbao::add(
                StringUtil::ID('thongbao', 'IDThongBao'),
                Binhluan::where('binhluan.IDBinhLuan', '=', $request->IDBinhLuan)->get()[0]->IDTaiKhoan,
                'TLBLC12345',
                $request->IDBaiDang . '&' . 'TLBLC12345' . $idBinhLuan,
                Session::get('user')[0]->IDTaiKhoan,
                '0',
                date("Y-m-d H:i:s")
            );
            event(new NotificationEvent(Binhluan::where('binhluan.IDBinhLuan', '=', $request->IDBinhLuanRep)->get()[0]->IDTaiKhoan));
        }
        $comment = DB::table('binhluan')
            ->join('taikhoan', 'binhluan.IDTaiKhoan', '=', 'taikhoan.IDTaiKhoan')
            ->where('binhluan.IDBaiDang', '=', $request->IDBaiDang)
            ->where('binhluan.IDBinhLuan', '=', $idBinhLuan)
            ->get();
        return view('Component\BinhLuan\BinhLuanLv2')
            ->with(
                'comment',
                $comment[0]
            )
            ->with(
                'comment_main',
                $comment[0]
            );
    }
    public function view(Request $request)
    {
        $comment = Process::getRepCommentLimit($request->IDBinhLuan, $request->Index);
        $view = "";
        for ($i = 0; $i < count($comment); $i++)
            $view .= view('Component\BinhLuan\BinhLuanLv2')->with('comment', $comment[$i])
                ->with('comment_main', Binhluan::where('binhluan.IDBinhLuan', '=', $request->IDBinhLuan)->get()[0]);
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
                ->with('idBinhLuan', $request->IDBinhLuan)
                ->with('idBaiDang', $request->IDBaiDang);
    }
}
