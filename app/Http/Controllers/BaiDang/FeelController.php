<?php

namespace App\Http\Controllers\BaiDang;

use App\Events\NotificationEvent;
use App\Http\Controllers\Controller;
use App\Models\Baidang;
use App\Models\Camxuc;
use App\Models\Camxucbaidang;
use Illuminate\Http\Request;
use App\Models\StringUtil;
use App\Models\Camxucbinhluan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Exception;
use App\Models\Functions;
use App\Models\Notify;
use App\Models\Thongbao;

class FeelController extends Controller
{
    public function feel(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $user = Session::get('user');
        $rs = Camxucbaidang::where('camxucbaidang.IDTaiKhoan', '=', $user[0]->IDTaiKhoan)
            ->where('Camxucbaidang.IDBaiDang', '=', $request->IDBaiDang)
            ->get();
        $post = Baidang::where('baidang.IDBaiDang', '=', $request->IDBaiDang)->get();
        $date = date("Y-m-d H:i:s");
        if (count($rs) == 0) {
            Camxucbaidang::add(
                StringUtil::ID('camxucbaidang', 'IDCamXucBaiDang'),
                $request->IDBaiDang,
                $user[0]->IDTaiKhoan,
                $request->LoaiCamXuc,
                $date
            );
            $idTaiKhoan = Baidang::where('baidang.IDBaiDang', '=', $request->IDBaiDang)
                ->get()[0]->IDTaiKhoan;
            if ($user[0]->IDTaiKhoan == $idTaiKhoan) {
            } else {
                event(new NotificationEvent($post[0]->IDTaiKhoan));
                $typeNotify = Notify::getTypeNotify($post[0]->LoaiBaiDang);
                Thongbao::add(
                    StringUtil::ID('thongbao', 'IDThongBao'),
                    $idTaiKhoan,
                    $typeNotify,
                    $request->IDBaiDang . '&' . $typeNotify,
                    $user[0]->IDTaiKhoan,
                    '0',
                    $date
                );
            }
            return Functions::getFeel($request->LoaiCamXuc);
        } else {
            if (explode('@', $request->LoaiCamXuc)[1] == 0) {
                Camxucbaidang::where('camxucbaidang.IDTaiKhoan', '=', $user[0]->IDTaiKhoan)
                    ->where('camxucbaidang.IDBaiDang', '=', $request->IDBaiDang)
                    ->delete();
                DB::table('thongbao')
                    ->where('thongbao.IDGui', '=', $user[0]->IDTaiKhoan)
                    ->where('thongbao.IDContent', '=', $request->IDBaiDang . '&' . Notify::getTypeNotify($post[0]->LoaiBaiDang))
                    ->where('thongbao.IDLoaiThongBao', '=', Notify::getTypeNotify($post[0]->LoaiBaiDang))
                    ->delete();
                event(new NotificationEvent($post[0]->IDTaiKhoan));
                return '<span class="text-xl" style="color: transparent;text-shadow: 0 0 0 gray;">👍</span> &nbsp; 
                    <span class="font-bold">Thích</span>';
            } else {
                DB::update(
                    'UPDATE camxucbaidang SET camxucbaidang.LoaiCamXuc = ? WHERE 
                camxucbaidang.IDTaiKhoan = ? AND camxucbaidang.IDBaiDang = ?',
                    [$request->LoaiCamXuc, $user[0]->IDTaiKhoan, $rs[0]->IDBaiDang]
                );
                DB::update(
                    'UPDATE thongbao SET thongbao.ThoiGianThongBao = ? , 
                    thongbao.TinhTrang = ? WHERE thongbao.IDGui = ? 
                    AND thongbao.IDContent = ? ',
                    [date("Y-m-d H:i:s"), '0', $user[0]->IDTaiKhoan, $post[0]->IDBaiDang . '&' . Notify::getTypeNotify($post[0]->LoaiBaiDang)]
                );
                event(new NotificationEvent($post[0]->IDTaiKhoan));
                return Functions::getFeel($request->LoaiCamXuc);
            }
        }
    }
    public function view(Request $request)
    {
        $data = Functions::getUserFeel($request->IDBaiDang);
        if (count($data) == 0)
            return '';
        else
            return Functions::getStringFeel($request->IDBaiDang);
    }
    public function viewFeel()
    {
        return view('Modal/ModalBaiDang/ModalTamTrang')->with(
            'feel',
            Camxuc::gets()
        );
    }
    public function searchFeel(Request $request)
    {
        return view('Modal/ModalBaiDang/Child/TamTrang')->with(
            'feel',
            Camxuc::search($request->TenCamXuc)
        );
    }
    public function tickFeel(Request $request)
    {
        if (session()->has('feelCur')) {
            $feelCur = Session::get('feelCur');
            if (isset($feelCur[$request->IDCamXuc])) {
                Session::forget('feelCur');
                return '';
            } else {
                $feelCur[$request->IDCamXuc] = $request->IDCamXuc;
                Session::put('feelCur', $feelCur);
                return '<i class="fas fa-check text-green-400 text-xm"></i>';
            }
        } else {
            $feelCur[$request->IDCamXuc] = $request->IDCamXuc;
            Session::put('feelCur', $feelCur);
            return '<i class="fas fa-check text-green-400 text-xm"></i>';
        }
    }
}
