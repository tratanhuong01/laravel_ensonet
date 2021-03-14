<?php

namespace App\Http\Controllers\TroChuyen;

use App\Events\ChatEvent;
use App\Http\Controllers\Controller;
use App\Models\Nhomtinnhan;
use App\Models\StringUtil;
use App\Models\Taikhoan;
use App\Models\Thongbao;
use App\Models\Tinnhan;
use App\Process\DataProcess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SendMessageController extends Controller
{
    public function send(Request $request)
    {
        $sender = Tinnhan::where('tinnhan.IDTaiKhoan', '=', Session::get('user')[0]->IDTaiKhoan)
            ->join('nhomtinnhan', 'tinnhan.IDNhomTinNhan', 'nhomtinnhan.IDNhomTinNhan')
            ->get();
        $receiver = Tinnhan::where('tinnhan.IDTaiKhoan', '=', $request->IDNguoiNhan)
            ->join('nhomtinnhan', 'tinnhan.IDNhomTinNhan', 'nhomtinnhan.IDNhomTinNhan')
            ->get();
        $idNhomTinNhanQuery = DataProcess::checkIsSimilarGroupMessage($sender, $receiver);
        if ($idNhomTinNhanQuery == "") {
            $idNhomTinNhan = StringUtil::ID('nhomtinnhan', 'IDNhomTinNhan');
            Nhomtinnhan::add(
                $idNhomTinNhan,
                '',
                '5B5B5B',
                "👍",
                '0'
            );
            $idTinNhan = StringUtil::ID('tinnhan', 'IDTinNhan');
            Tinnhan::add(
                $idTinNhan,
                $idNhomTinNhan,
                Session::get('user')[0]->IDTaiKhoan,
                $request->NoiDungTinNhan,
                '0',
                '0',
                '1',
                date("Y-m-d H:i:s")
            );
            Tinnhan::add(
                StringUtil::ID('tinnhan', 'IDTinNhan'),
                $idNhomTinNhan,
                $request->IDNguoiNhan,
                '',
                '0',
                '0',
                '0',
                date("Y-m-d H:i:s")
            );
            $message = Tinnhan::where('tinnhan.IDTinNhan', '=', $idTinNhan)
                ->join('taikhoan', 'tinnhan.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
                ->get();
            $getUserOfGroupMessage = DataProcess::getUserOfGroupMessage($idNhomTinNhan);
            foreach ($getUserOfGroupMessage as $key => $value) {
                Thongbao::add(
                    StringUtil::ID('thongbao', 'IDThongBao'),
                    $value->IDTaiKhoan,
                    'TINNHAN001',
                    $idNhomTinNhan,
                    Session::get('user')[0]->IDTaiKhoan,
                    '0',
                    date("Y-m-d H:i:s")
                );
            }
            DB::update('UPDATE tinnhan SET TinhTrang  = ? 
            WHERE IDTinNhan = ? ', [
                DataProcess::createState($idNhomTinNhan, '1'),
                $idTinNhan
            ]);
            event(new ChatEvent($request->IDNguoiNhan));
            return view('Modal/ModalTroChuyen/Child/ChatRight')->with('message', $message[0]);
        } else {
            $idTinNhan = StringUtil::ID('tinnhan', 'IDTinNhan');
            Tinnhan::add(
                $idTinNhan,
                $idNhomTinNhanQuery,
                Session::get('user')[0]->IDTaiKhoan,
                $request->NoiDungTinNhan,
                '0',
                '0',
                '1',
                date("Y-m-d H:i:s")
            );
            $message = Tinnhan::where('tinnhan.IDTinNhan', '=', $idTinNhan)
                ->join('taikhoan', 'tinnhan.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
                ->get();
            $getUserOfGroupMessage = DataProcess::getUserOfGroupMessage($idNhomTinNhanQuery);
            foreach ($getUserOfGroupMessage as $key => $value) {
                Thongbao::add(
                    StringUtil::ID('thongbao', 'IDThongBao'),
                    $value->IDTaiKhoan,
                    'TINNHAN001',
                    $idNhomTinNhanQuery,
                    Session::get('user')[0]->IDTaiKhoan,
                    '0',
                    date("Y-m-d H:i:s")
                );
            }
            DB::update('UPDATE tinnhan SET TinhTrang  = ? 
            WHERE IDTinNhan = ? ', [
                DataProcess::createState($idNhomTinNhanQuery, '1'),
                $idTinNhan
            ]);
            event(new ChatEvent($request->IDNguoiNhan));
            return view('Modal/ModalTroChuyen/Child/ChatRight')->with('message', $message[0]);
        }
    }
    public function chatEvent(Request $request)
    {
        $message = Tinnhan::where('tinnhan.IDNhomTinNhan', '=', $request->IDNhomTinNhan)
            ->join('taikhoan', 'tinnhan.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
            ->orderby('tinnhan.ThoiGianNhanTin', 'DESC')
            ->get();
        if (count($message) == 0) {
            return 'not have id nhom tin nhan';
        } else {
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
        }
    }
}
