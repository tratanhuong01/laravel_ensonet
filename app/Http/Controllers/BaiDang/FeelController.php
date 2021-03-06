<?php

namespace App\Http\Controllers\BaiDang;

use App\Events\NotificationEvent;
use App\Http\Controllers\Controller;
use App\Models\Baidang;
use Illuminate\Http\Request;
use App\Models\StringUtil;
use App\Models\Camxuc;
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
        $rs = Camxuc::where('camxuc.IDTaiKhoan', '=', $user[0]->IDTaiKhoan)
            ->where('camxuc.IDBaiDang', '=', $request->IDBaiDang)
            ->get();
        $post = Baidang::where('baidang.IDBaiDang', '=', $request->IDBaiDang)->get();
        $date = date("Y-m-d H:i:s");
        if (count($rs) == 0) {
            Camxuc::add(
                StringUtil::ID('camxuc', 'IDCamXuc'),
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
            event(new NotificationEvent($post[0]->IDTaiKhoan));
            if (explode('@', $request->LoaiCamXuc)[1] == 0) {
                Camxuc::where('camxuc.IDTaiKhoan', '=', $user[0]->IDTaiKhoan)
                    ->where('camxuc.IDBaiDang', '=', $request->IDBaiDang)
                    ->delete();
                ThongBao::where('thongbao.IDGui', '=', $user[0]->IDTaiKhoan)
                    ->where('thongbao.IDBaiDang', '=', $request->IDBaiDang)
                    ->where('thongbao.IDLoaiThongBao', '=', Notify::getTypeNotify($post[0]->LoaiBaiDang))
                    ->delete();
                return '<span class="text-xl" style="color: transparent;text-shadow: 0 0 0 gray;">👍</span> &nbsp; 
                    <span class="font-bold">Thích</span>';
            } else {
                DB::update(
                    'UPDATE camxuc SET camxuc.LoaiCamXuc = ? WHERE 
                camxuc.IDTaiKhoan = ? AND camxuc.IDBaiDang = ?',
                    [$request->LoaiCamXuc, $user[0]->IDTaiKhoan, $rs[0]->IDBaiDang]
                );
                DB::update(
                    'UPDATE thongbao SET ThoiGianThongBao = ? WHERE thongbao.IDTaiKhoan = ? 
                    AND thongbao.IDContent = ?',
                    [date("Y-m-d H:i:s"), $post[0]->IDTaiKhoan, $post[0]->IDBaiDang . '&' . Notify::getTypeNotify($post[0]->LoaiBaiDang)]
                );
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
}
