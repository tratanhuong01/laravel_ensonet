<?php

namespace App\Http\Controllers\TroChuyen;

use App\Http\Controllers\Controller;
use App\Models\Nhomtinnhan;
use App\Models\StringUtil;
use App\Models\Taikhoan;
use App\Models\Tinnhan;
use App\Process\DataProcess;
use Illuminate\Http\Request;
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
                '',
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
            return view('Modal/ModalTroChuyen/Child/ChatRight')->with('message', $message);
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
            return view('Modal/ModalTroChuyen/Child/ChatRight')->with('message', $message);
        }
    }
}
