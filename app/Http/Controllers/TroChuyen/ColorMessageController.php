<?php

namespace App\Http\Controllers\TroChuyen;

use App\Events\ChatGroupEvent;
use App\Events\ChatNorlEvent;
use App\Http\Controllers\Controller;
use App\Models\StringUtil;
use App\Models\Thongbao;
use App\Models\Tinnhan;
use App\Process\DataProcess;
use App\Process\DataProcessThird;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ColorMessageController extends Controller
{
    public function open(Request $request)
    {
        return view('Modal/ModalTroChuyen/ModalMau')->with('IDNhomTinNhan', $request->IDNhomTinNhan)
            ->with('idChat', $request->IDChat);
    }
    public function change(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        DB::update('UPDATE nhomtinnhan SET IDMauTinNhan = ? 
        WHERE IDNhomTinNhan = ? ', [$request->IDMauTinNhan, $request->IDNhomTinNhan]);
        $getUserOfGroupMessage = DataProcess::getUserOfGroupMessage($request->IDNhomTinNhan);
        $idTinNhan = StringUtil::ID('tinnhan', 'IDTinNhan');
        $trangThai = DataProcessThird::checkChatUserActivity($request->IDNhomTinNhan) == true ?
            DataProcessThird::createTrangThai($request->IDNhomTinNhan, 1) :
            DataProcessThird::createTrangThai($request->IDNhomTinNhan, 0);
        Tinnhan::add(
            $idTinNhan,
            $request->IDNhomTinNhan,
            Session::get('user')[0]->IDTaiKhoan,
            "đã thay đổi màu sắc cuộc trò chuyện",
            DataProcess::createState($request->IDNhomTinNhan, '0'),
            $trangThai,
            '2',
            date("Y-m-d H:i:s")
        );
        $message = Tinnhan::where('tinnhan.IDTinNhan', '=', $idTinNhan)
            ->join('taikhoan', 'tinnhan.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
            ->get();
        foreach ($getUserOfGroupMessage as $key => $value) {
            if (count($getUserOfGroupMessage) == 1) {
                Thongbao::add(
                    StringUtil::ID('thongbao', 'IDThongBao'),
                    $value->IDTaiKhoan,
                    'TINNHAN001',
                    $request->IDNhomTinNhan,
                    Session::get('user')[0]->IDTaiKhoan,
                    '0',
                    date("Y-m-d H:i:s")
                );
                event(new ChatNorlEvent($value->IDTaiKhoan, $request->IDNhomTinNhan));
            } else {
                Thongbao::add(
                    StringUtil::ID('thongbao', 'IDThongBao'),
                    $value->IDTaiKhoan,
                    'TINNHAN001',
                    $request->IDNhomTinNhan,
                    Session::get('user')[0]->IDTaiKhoan,
                    '0',
                    date("Y-m-d H:i:s")
                );
                event(new ChatGroupEvent($value->IDTaiKhoan, $request->IDNhomTinNhan));
            }
        }

        return view('Modal/ModalTroChuyen/Child/ChatCenter')->with('message', $message[0]);
    }
}
