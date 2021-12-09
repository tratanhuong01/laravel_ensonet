<?php

namespace App\Http\Controllers\Chat;

use App\Events\ChatGroupEvent;
use App\Events\ChatNorlEvent;
use App\Http\Controllers\Controller;
use App\Models\StringUtil;
use App\Models\Taikhoan;
use App\Models\Thongbao;
use App\Models\Tinnhan;
use App\Process\DataProcess;
use App\Process\DataProcessThird;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SettingChatController extends Controller
{
    public function viewNickName(Request $request)
    {
        $member = DB::select('SELECT DISTINCT IDTaiKhoan FROM tinnhan WHERE 
        IDNhomTinNhan = ? AND LoaiTinNhan = 0 ', [
            $request->IDNhomTinNhan,
        ]);
        $user = Taikhoan::where('taikhoan.IDTaiKhoan', '=', $request->IDTaiKhoan)
            ->get();
        $new = array();
        foreach ($member as $key => $value) {
            $new[$key] = Taikhoan::where('taikhoan.IDTaiKhoan', '=', $value->IDTaiKhoan)
                ->get()[0];
        }
        return response()->json([
            'view' => "" . view('Modal.ModalChat.Nickname')
                ->with('member', $new)
                ->with('idNhomTinNhan', $request->IDNhomTinNhan)
                ->with('user', $user)
                ->with(
                    'chatter',
                    DataProcess::getUserOfGroupMessageAPI(
                        $request->IDNhomTinNhan,
                        $request->IDTaiKhoan
                    )
                )
        ]);
    }
    public function editNickName(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $user = json_decode($request->user);
        $getUserOfGroupMessage = DataProcess::getUserOfGroupMessageAPI(
            $request->IDNhomTinNhan,
            $user->IDTaiKhoan
        );
        $idTinNhan = StringUtil::ID('tinnhan', 'IDTinNhan');
        $trangThai = DataProcessThird::checkChatUserActivityAPI(
            $request->IDNhomTinNhan,
            $user->IDTaiKhoan
        ) == true ?
            DataProcessThird::createTrangThai($request->IDNhomTinNhan, 1) :
            DataProcessThird::createTrangThai($request->IDNhomTinNhan, 0);

        $userChangeNickName = Taikhoan::where('taikhoan.IDTaiKhoan', '=', $request->IDTaiKhoan)
            ->get()[0];
        if ($request->NickName == "")
            Tinnhan::add(
                $idTinNhan,
                $request->IDNhomTinNhan,
                $user->IDTaiKhoan,
                $user->IDTaiKhoan == $request->IDTaiKhoan ?
                    "đã xóa biệt danh của mình" . " ." :
                    "đã xóa biệt danh của " . $userChangeNickName->Ho . ' ' .
                    $userChangeNickName->Ten . " .",
                DataProcess::createState($request->IDNhomTinNhan, '0'),
                $trangThai,
                '2',
                date("Y-m-d H:i:s")
            );
        else
            Tinnhan::add(
                $idTinNhan,
                $request->IDNhomTinNhan,
                $user->IDTaiKhoan,
                $user->IDTaiKhoan == $request->IDTaiKhoan ?
                    "đã đặt biệt danh cho mình" . " là " . $request->NickName . " ." :
                    "đã đặt biệt danh cho " . $userChangeNickName->Ho . ' ' .
                    $userChangeNickName->Ten . " là " . $request->NickName . " .",
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
                    $user->IDTaiKhoan,
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
                    $user->IDTaiKhoan,
                    '0',
                    date("Y-m-d H:i:s")
                );
                event(new ChatGroupEvent($value->IDTaiKhoan, $request->IDNhomTinNhan));
            }
        }
        $userCreateNew[0] = $user;
        DB::update('UPDATE tinnhan SET NoiDung = ? WHERE IDNhomTinNhan = ? 
        AND IDTaiKhoan = ? AND LoaiTinNhan = 0 ', [
            $request->NickName,
            $request->IDNhomTinNhan,
            $request->IDTaiKhoan
        ]);
        return response()->json([
            'view' => "" . view('Modal.ModalChat.Child.ChatCenter')
                ->with('message', $message[0])
                ->with('user', $userCreateNew)
        ]);
    }
    public function viewIconFeel(Request $request)
    {
        return response()->json([
            'view' => "" . view('Modal.ModalChat.IconFeelChange')
                ->with('idNhomTinNhan', $request->IDNhomTinNhan)
                ->with('json', $request->user)
        ]);
    }
    public function changeIconFeel(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $user = json_decode($request->user);
        $getUserOfGroupMessage = DataProcess::getUserOfGroupMessageAPI(
            $request->IDNhomTinNhan,
            $user->IDTaiKhoan
        );
        $idTinNhan = StringUtil::ID('tinnhan', 'IDTinNhan');
        $trangThai = DataProcessThird::checkChatUserActivityAPI(
            $request->IDNhomTinNhan,
            $user->IDTaiKhoan
        ) == true ?
            DataProcessThird::createTrangThai($request->IDNhomTinNhan, 1) :
            DataProcessThird::createTrangThai($request->IDNhomTinNhan, 0);
        Tinnhan::add(
            $idTinNhan,
            $request->IDNhomTinNhan,
            $user->IDTaiKhoan,
            'đã đặt biểu tượng cảm xúc thành ' . $request->data . ' .',
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
                    $user->IDTaiKhoan,
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
                    $user->IDTaiKhoan,
                    '0',
                    date("Y-m-d H:i:s")
                );
                event(new ChatGroupEvent($value->IDTaiKhoan, $request->IDNhomTinNhan));
            }
        }
        $userCreateNew[0] = $user;
        DB::update('UPDATE nhomtinnhan SET BieuTuong = ? WHERE IDNhomTinNhan = ? ', [
            $request->data,
            $request->IDNhomTinNhan,
        ]);
        return response()->json([
            'view' => "" . view('Modal.ModalChat.Child.ChatCenter')
                ->with('message', $message[0])
                ->with('user', $userCreateNew),
            'numberMembers' => count($getUserOfGroupMessage),
            'icon' => $request->data,
            'IDMain' => $getUserOfGroupMessage[0]->IDTaiKhoan
        ]);
    }
    public function viewChangeNameChat(Request $request)
    {
        return response()->json([
            'view' => "" . view('Modal.ModalChat.ChangeNameChat')
                ->with('idNhomTinNhan', $request->IDNhomTinNhan)
                ->with('user', $request->user)
        ]);
    }
    public function changeNameChat(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $user = json_decode($request->user);
        $getUserOfGroupMessage = DataProcess::getUserOfGroupMessageAPI(
            $request->IDNhomTinNhan,
            $user->IDTaiKhoan
        );
        $idTinNhan = StringUtil::ID('tinnhan', 'IDTinNhan');
        $trangThai = DataProcessThird::checkChatUserActivityAPI(
            $request->IDNhomTinNhan,
            $user->IDTaiKhoan
        ) == true ?
            DataProcessThird::createTrangThai($request->IDNhomTinNhan, 1) :
            DataProcessThird::createTrangThai($request->IDNhomTinNhan, 0);
        Tinnhan::add(
            $idTinNhan,
            $request->IDNhomTinNhan,
            $user->IDTaiKhoan,
            "đã đặt tên nhóm là " . $request->data,
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
                    $user->IDTaiKhoan,
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
                    $user->IDTaiKhoan,
                    '0',
                    date("Y-m-d H:i:s")
                );
                event(new ChatGroupEvent($value->IDTaiKhoan, $request->IDNhomTinNhan));
            }
        }
        $userCreateNew[0] = $user;
        DB::update('UPDATE nhomtinnhan SET TenNhomTinNhan = ? WHERE IDNhomTinNhan = ? ', [
            $request->data,
            $request->IDNhomTinNhan,
        ]);
        return response()->json([
            'view' => "" . view('Modal.ModalChat.Child.ChatCenter')
                ->with('message', $message[0])
                ->with('user', $userCreateNew),
            'numberMembers' => count($getUserOfGroupMessage),
            'nameChat' => $request->data,
            'IDMain' => $getUserOfGroupMessage[0]->IDTaiKhoan
        ]);
    }
}
