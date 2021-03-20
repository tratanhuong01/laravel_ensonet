<?php

namespace App\Http\Controllers\TroChuyen;

use App\Events\ChatGroupEvent;
use App\Events\ChatNorlEvent;
use App\Http\Controllers\Controller;
use App\Models\Nhomtinnhan;
use App\Models\StringUtil;
use App\Models\Taikhoan;
use App\Models\Thongbao;
use App\Models\Tinnhan;
use App\Process\DataProcess;
use App\Process\DataProcessThird;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SendMessageController extends Controller
{
    public function send(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $idTinNhan = StringUtil::ID('tinnhan', 'IDTinNhan');
        $trangThai = DataProcessThird::checkChatUserActivity($request->IDNhomTinNhan) == true ?
            DataProcessThird::createTrangThai($request->IDNhomTinNhan, 1) :
            DataProcessThird::createTrangThai($request->IDNhomTinNhan, 0);
        Tinnhan::add(
            $idTinNhan,
            $request->IDNhomTinNhan,
            Session::get('user')[0]->IDTaiKhoan,
            $request->NoiDungTinNhan,
            DataProcess::createState($request->IDNhomTinNhan, '1'),
            $trangThai,
            '1',
            date("Y-m-d H:i:s")
        );
        $message = Tinnhan::where('tinnhan.IDTinNhan', '=', $idTinNhan)
            ->join('taikhoan', 'tinnhan.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
            ->get();
        $getUserOfGroupMessage = DataProcess::getUserOfGroupMessage($request->IDNhomTinNhan);
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
                event(new ChatNorlEvent($value->IDTaiKhoan));
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
                event(new ChatGroupEvent($value->IDTaiKhoan));
            }
        }
        return view('Modal/ModalTroChuyen/Child/ChatRight')->with('message', $message[0]);
    }
    public function chatEvent(Request $request)
    {
        $message = Tinnhan::where('tinnhan.IDNhomTinNhan', '=', $request->IDNhomTinNhan)
            ->join('taikhoan', 'tinnhan.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
            ->orderby('tinnhan.ThoiGianNhanTin', 'DESC')
            ->get();
        $u = DB::select('SELECT DISTINCT tinnhan.IDTaiKhoan FROM tinnhan WHERE tinnhan.IDNhomTinNhan = ? 
        AND tinnhan.IDTaiKhoan != ? ', [$request->IDNhomTinNhan, Session::get('user')[0]->IDTaiKhoan]);
        if (count($message) == 0) {
            return 'not have id nhom tin nhan';
        } else {
            $num = 0;
            $userGroup = DataProcess::getUserOfGroupMessage($request->IDNhomTinNhan);
            for ($i = 0; $i < count($u); $i++) {
                if ($u[$i]->IDTaiKhoan == $userGroup[$i]->IDTaiKhoan)
                    $num++;
            }
            if ($num == count($u))
                if ($message[0]->LoaiTinNhan == 2)
                    return view('Modal\ModalTroChuyen\Child\ChatCenter')->with(
                        'message',
                        $message[0]
                    );
                else
                    return view('Modal\ModalTroChuyen\Child\ChatLeft')
                        ->with(
                            'message',
                            $message[0]
                        );
            else
                return 'sai';
        }
    }
}
