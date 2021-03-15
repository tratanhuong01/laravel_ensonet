<?php

namespace App\Http\Controllers\TroChuyen;

use App\Events\ChatEvent;
use App\Http\Controllers\Controller;
use App\Models\StringUtil;
use App\Models\Thongbao;
use App\Models\Tinnhan;
use App\Process\DataProcess;
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
        Tinnhan::add(
            $idTinNhan,
            $request->IDNhomTinNhan,
            Session::get('user')[0]->IDTaiKhoan,
            "đã thay đổi màu sắc cuộc trò chuyện",
            '0',
            '0',
            '2',
            date("Y-m-d H:i:s")
        );
        $message = Tinnhan::where('tinnhan.IDTinNhan', '=', $idTinNhan)
            ->join('taikhoan', 'tinnhan.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
            ->get();
        foreach ($getUserOfGroupMessage as $key => $value) {
            Thongbao::add(
                StringUtil::ID('thongbao', 'IDThongBao'),
                $value->IDTaiKhoan,
                'TINNHAN001',
                $request->IDNhomTinNhan,
                Session::get('user')[0]->IDTaiKhoan,
                '0',
                date("Y-m-d H:i:s")
            );
        }
        event(new ChatEvent($value->IDTaiKhoan));
        return view('Modal/ModalTroChuyen/Child/ChatCenter')->with('message', $message[0]);
    }
}
