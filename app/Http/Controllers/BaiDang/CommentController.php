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
use App\Models\Nhandan;
use App\Models\Notify;
use App\Models\StringUtil;
use App\Models\Process;
use App\Models\Thongbao;
use Illuminate\Support\Facades\File;

class CommentController extends Controller
{
    public function comment(Request $request)
    {
        $user = Session::get('user');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $idBinhLuan = StringUtil::ID('binhluan', 'IDBinhLuan');
        $date = date("Y-m-d H:i:s");
        if ($request->hasFile('fileImage')) {
            $nameFile = $user[0]->IDTaiKhoan . $idBinhLuan . '.jpg';
            $json = (object)[
                'ID' => '10000',
                'LoaiBinhLuan' => '1',
                'DuongDan' => 'img/CommentImage/' . $nameFile,
                'NoiDungBinhLuan' => $request->NoiDungBinhLuan
            ];
            Binhluan::add(
                $idBinhLuan,
                $request->IDBaiDang,
                Session::get('user')[0]->IDTaiKhoan,
                json_encode($json),
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
            $request->file('fileImage')->move(public_path('img/CommentImage'), $nameFile);
            return view('Component\BinhLuan\BinhLuanLv1')
                ->with(
                    'comment',
                    $comment[0]
                );
        } else {
            $json = (object)[
                'ID' => '10000',
                'LoaiBinhLuan' => '0',
                'DuongDan' => '',
                'NoiDungBinhLuan' => $request->NoiDungBinhLuan
            ];
            Binhluan::add(
                $idBinhLuan,
                $request->IDBaiDang,
                Session::get('user')[0]->IDTaiKhoan,
                json_encode($json),
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
    public function openStickComment(Request $request)
    {
        return view('Component/Child/NhanDan')
            ->with('idTaiKhoan', $request->IDTaiKhoan)
            ->with('idBaiDang', $request->IDBaiDang)
            ->with('idBinhLuan', $request->IDBinhLuan)
            ->with('idBinhLuanRep', $request->IDBinhLuanRep)
            ->with('loaiBinhLuan', $request->LoaiBinhLuan);
    }
    public function openGifComment(Request $request)
    {
        return view('Component/Child/Gif');
    }
    public function loadViewCommentImage(Request $request)
    {
        switch ($request->type) {
            case '0':
                return response()->json([
                    'view' => "" . view('Component/Child/BinhLuanAnh')
                        ->with('path', $request->path)
                        ->with('idBaiDang', $request->IDBaiDang)
                        ->with('idBinhLuan', $request->IDBinhLuan)
                ]);
                break;
            case '1':
                return response()->json([
                    'view' => "" . view('Component/Child/BinhLuanNhanDan')
                        ->with('value', Nhandan::where('nhandan.IDNhanDan', '=', $request->IDNhanDan)->get()[0])
                        ->with('idBaiDang', $request->IDBaiDang)
                        ->with('idBinhLuan', $request->IDBinhLuan)
                ]);
                break;
            default:
                # code...
                break;
        }
    }
    public function postCommentSticker(Request $request)
    {
        $user = Session::get('user');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $idBinhLuan = StringUtil::ID('binhluan', 'IDBinhLuan');
        $date = date("Y-m-d H:i:s");
        $json = (object)[
            'ID' => '10000',
            'LoaiBinhLuan' => '2',
            'DuongDan' => $request->IDNhanDan,
            'NoiDungBinhLuan' => $request->NoiDungBinhLuan
        ];
        Binhluan::add(
            $idBinhLuan,
            $request->IDBaiDang,
            Session::get('user')[0]->IDTaiKhoan,
            json_encode($json),
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
    public function warn(Request $request)
    {
        return view('Modal/ModalBinhLuan/ModalXoaBinhLuan');
    }
    public function delete(Request $request)
    {
        $commentMain = Binhluan::where('binhluan.IDBinhLuan', '=', $request->IDBinhLuan)->get();
        if ($commentMain[0]->LoaiBinhLuan == 1) {
            $commentRep = Binhluan::where('binhluan.PhanHoi', '=', $request->IDBinhLuanRep)->get();
            if (json_decode($commentMain[0]->NoiDungBinhLuan)->LoaiBinhLuan == '1')
                if (File::exists(public_path(json_decode($commentMain[0]->NoiDungBinhLuan)->DuongDan)))
                    File::delete(public_path(json_decode($commentMain[0]->NoiDungBinhLuan)->DuongDan));
            if (count($commentRep) > 0) {
                Binhluan::where('binhluan.IDBinhLuan', '=', $request->IDBinhLuan)->delete();
                foreach ($commentRep as $key => $value) {
                    if (json_decode($value->NoiDungBinhLuan)->LoaiBinhLuan == '1') {
                        if (File::exists(public_path(json_decode($value->NoiDungBinhLuan)->DuongDan))) {
                            File::delete(public_path(json_decode($value->NoiDungBinhLuan)->DuongDan));
                        }
                    }
                    Binhluan::where('binhluan.IDBinhLuan', '=', $value->IDBinhLuan)->delete();
                }
            } else {
            }
            Binhluan::where('binhluan.IDBinhLuan', '=', $request->IDBinhLuan)->delete();
        } else {
            if (json_decode($commentMain[0]->NoiDungBinhLuan)->LoaiBinhLuan == '1')
                if (File::exists(public_path(json_decode($commentMain[0]->NoiDungBinhLuan)->DuongDan)))
                    File::delete(public_path(json_decode($commentMain[0]->NoiDungBinhLuan)->DuongDan));

            Binhluan::where('binhluan.IDBinhLuan', '=', $request->IDBinhLuan)->delete();
        }
    }
}
