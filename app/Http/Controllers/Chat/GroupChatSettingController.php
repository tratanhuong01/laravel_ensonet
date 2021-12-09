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

class GroupChatSettingController extends Controller
{
    public function viewMember(Request $request)
    {
        $member = DataProcess::getUserOfGroupMessageReal($request->IDNhomTinNhan);
        $new = array();
        foreach ($member as $key => $value) {
            $new[$key] = Tinnhan::select('*', 'tinnhan.TinhTrang')
                ->where('tinnhan.IDTaiKhoan', '=', $value->IDTaiKhoan)
                ->where('tinnhan.LoaiTinNhan', '=', '0')
                ->where('tinnhan.IDNhomTinNhan', '=', $request->IDNhomTinNhan)
                ->join('taikhoan', 'tinnhan.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
                ->get()[0];
        }
        return response()->json([
            'view' => "" . view('Modal.ModalChat.MemberGroupChat')
                ->with('idNhomTinNhan', $request->IDNhomTinNhan)
                ->with('member', $new)
        ]);
    }
    public function viewOutGroupChat(Request $request)
    {
        return response()->json([
            'view' => "" . view('Modal.ModalChat.OutGroupChat')
                ->with('idNhomTinNhan', $request->IDNhomTinNhan)
                ->with('json', $request->user)
        ]);
    }
    public function outGroupChat(Request $request)
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
            "đã rời khỏi nhóm .",
            DataProcess::createState($request->IDNhomTinNhan, '0'),
            $trangThai,
            '2',
            date("Y-m-d H:i:s")
        );
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
        DB::update('UPDATE tinnhan SET TrangThai = ? WHERE IDNhomTinNhan = ? AND 
        IDTaiKhoan = ? AND LoaiTinNhan = 0 ', [
            1,
            $request->IDNhomTinNhan,
            $user->IDTaiKhoan,
        ]);
    }
}
