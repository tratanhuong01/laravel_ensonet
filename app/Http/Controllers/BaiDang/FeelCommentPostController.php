<?php

namespace App\Http\Controllers\BaiDang;

use App\Events\NotificationEvent;
use App\Http\Controllers\Controller;
use App\Models\Binhluan;
use Illuminate\Http\Request;
use App\Models\Camxucbinhluan;
use App\Models\Functions;
use App\Models\Notify;
use App\Models\Process;
use App\Models\StringUtil;
use App\Models\Thongbao;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class FeelCommentPostController extends Controller
{
    public function feel(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $user = Session::get('user');
        $rs = Camxucbinhluan::where('camxucbinhluan.IDTaiKhoan', '=', $user[0]->IDTaiKhoan)
            ->where('camxucbinhluan.IDBinhLuan', '=', $request->IDBinhLuan)
            ->get();
        $idTaiKhoan = Binhluan::where('binhluan.IDBinhLuan', '=', $request->IDBinhLuan)
            ->get()[0]->IDTaiKhoan;
        $idBaiDang = Binhluan::where('binhluan.IDBinhLuan', '=', $request->IDBinhLuan)
            ->get()[0]->IDBaiDang;
        if (count($rs) == 0) {
            $idCamXucBinhLuan = StringUtil::ID('camxucbinhluan', 'IDCamXucBinhLuan');
            Camxucbinhluan::add(
                $idCamXucBinhLuan,
                $request->IDBinhLuan,
                $user[0]->IDTaiKhoan,
                $request->LoaiCamXuc,
                date("Y-m-d H:i:s")
            );
            if ($user[0]->IDTaiKhoan == $idTaiKhoan) {
            } else {
                Thongbao::add(
                    StringUtil::ID('thongbao', 'IDThongBao'),
                    $idTaiKhoan,
                    'BTCXVBLC12',
                    $idBaiDang . '&' . 'BTCXVBLC12' . '&' . $request->IDBinhLuan,
                    $user[0]->IDTaiKhoan,
                    '0',
                    date("Y-m-d H:i:s")
                );
                event(new NotificationEvent($idTaiKhoan));
            }
            return Functions::getFeelCmt($request->LoaiCamXuc);
        } else {
            if (explode('@', $request->LoaiCamXuc)[1] == 0) {
                Camxucbinhluan::where('camxucbinhluan.IDTaiKhoan', '=', $user[0]->IDTaiKhoan)
                    ->where('camxucbinhluan.IDBinhLuan', '=', $request->IDBinhLuan)
                    ->delete();
                return '<span class="text-sm font-bold">Thích</span>';
            } else {
                DB::update(
                    'UPDATE camxucbinhluan SET camxucbinhluan.LoaiCamXuc = ? WHERE 
                camxucbinhluan.IDTaiKhoan = ? AND camxucbinhluan.IDBinhLuan = ?',
                    [$request->LoaiCamXuc, $user[0]->IDTaiKhoan, $rs[0]->IDBinhLuan]
                );
                return Functions::getFeelCmt($request->LoaiCamXuc);
            }
        }
    }
    public function loadnumfeel(Request $request)
    {
        return Process::getFeelComment($request->IDBinhLuan);
    }
}
