<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StringUtil;
use App\Models\Camxuc;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Exception;
use App\Models\Functions;

class FeelController extends Controller
{
    public function feel(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $user = Session::get('user');
        $rs = Camxuc::where('camxuc.IDTaiKhoan', '=', $user[0]->IDTaiKhoan)
            ->where('camxuc.IDBaiDang', '=', $request->IDBaiDang)
            ->get();
        if (count($rs) == 0) {
            Camxuc::add(
                StringUtil::ID('camxuc', 'IDCamXuc'),
                $request->IDBaiDang,
                $user[0]->IDTaiKhoan,
                $request->LoaiCamXuc,
                date("Y-m-d H:i:s")
            );
            return Functions::getFeel($request->LoaiCamXuc);
        } else {
            if (explode('@', $request->LoaiCamXuc)[1] == 0) {
                Camxuc::where('camxuc.IDTaiKhoan', '=', $user[0]->IDTaiKhoan)
                    ->where('camxuc.IDBaiDang', '=', $request->IDBaiDang)
                    ->delete();
                return '<span class="text-xl" style="color: transparent;text-shadow: 0 0 0 gray;">👍</span> &nbsp; 
                    <span class="font-bold">Thích</span>';
            } else {
                DB::update(
                    'UPDATE camxuc SET camxuc.LoaiCamXuc = ? WHERE 
                camxuc.IDTaiKhoan = ? AND camxuc.IDBaiDang = ?',
                    [$request->LoaiCamXuc, $user[0]->IDTaiKhoan, $rs[0]->IDBaiDang]
                );
                return Functions::getFeel($request->LoaiCamXuc);
            }
        }
    }
}
