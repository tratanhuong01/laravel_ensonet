<?php

namespace App\Http\Controllers\Chat;

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
        $json = [];
        if ($request->hasFile('image_0')) {
            $id = 10000;
            $json = [];
            for ($i = 0; $i < (int)$request->numberArray; $i++) {
                $file = $request->file('image_' . $i);
                $nameFile = Session::get('user')[0]->IDTaiKhoan . $idTinNhan . '_' . $i . '.jpg';
                $file->move(public_path('img/ImageMessage'), $nameFile);
                $json[$i] = (object)[
                    'IDNoiDungTinNhan' => $id,
                    'LoaiTinNhan' => '1',
                    'DuongDan' => 'img/ImageMessage/' . $nameFile,
                    'NoiDungTinNhan' => ''
                ];
                $id++;
            }
            Tinnhan::add(
                $idTinNhan,
                $request->IDNhomTinNhan,
                Session::get('user')[0]->IDTaiKhoan,
                json_encode($json),
                DataProcess::createState($request->IDNhomTinNhan, '1'),
                $trangThai,
                '1',
                date("Y-m-d H:i:s")
            );
        } else {
            $json[0] = (object)[
                'IDNoiDungTinNhan' => '10001',
                'LoaiTinNhan' => '0',
                'DuongDan' => '',
                'NoiDungTinNhan' => $request->NoiDungTinNhan
            ];
            Tinnhan::add(
                $idTinNhan,
                $request->IDNhomTinNhan,
                Session::get('user')[0]->IDTaiKhoan,
                json_encode($json),
                DataProcess::createState($request->IDNhomTinNhan, '1'),
                $trangThai,
                '1',
                date("Y-m-d H:i:s")
            );
        }
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
        return view('Modal/ModalChat/Child/ChatRight')->with('message', $message[0]);
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
            $chater = Taikhoan::where('taikhoan.IDTaiKhoan', '=', $userGroup[0]->IDTaiKhoan)->get();
            $messages = DataProcess::getMessageByNhomTinNhan($request->IDNhomTinNhan);
            for ($i = 0; $i < count($u); $i++) {
                if ($u[$i]->IDTaiKhoan == $userGroup[$i]->IDTaiKhoan)
                    $num++;
            }
            if ($num == count($u))
                if ($message[0]->LoaiTinNhan == 2)
                    return response()->json([
                        'viewSmall' => "" . view('Modal\ModalChat\Child\ChatCenter')
                            ->with('message', $message[0]),
                        'viewBig' => "" . view('Modal\ModalChat\ModalChat')->with('chater', $chater)
                            ->with('messages', $messages)
                            ->with('idNhomTinNhan', $request->IDNhomTinNhan)
                    ]);
                else
                    return response()->json([
                        'viewSmall' => "" . view('Modal\ModalChat\Child\ChatLeft')
                            ->with('message', $message[0]),
                        'viewBig' => "" . view('Modal\ModalChat\ModalChat')->with('chater', $chater)
                            ->with('messages', $messages)
                            ->with('idNhomTinNhan', $request->IDNhomTinNhan)
                    ]);
            else
                return 'sai';
        }
    }
    public function sendStickerMessage(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $idTinNhan = StringUtil::ID('tinnhan', 'IDTinNhan');
        $trangThai = DataProcessThird::checkChatUserActivity($request->IDNhomTinNhan) == true ?
            DataProcessThird::createTrangThai($request->IDNhomTinNhan, 1) :
            DataProcessThird::createTrangThai($request->IDNhomTinNhan, 0);
        $json[0] = (object)[
            'IDNoiDungTinNhan' => '100001',
            'LoaiTinNhan' => '2',
            'DuongDan' => $request->IDNhanDan,
            'NoiDungTinNhan' => ''
        ];
        Tinnhan::add(
            $idTinNhan,
            $request->IDNhomTinNhan,
            Session::get('user')[0]->IDTaiKhoan,
            json_encode($json),
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
        return response()->json([
            'view' => "" . view('Modal/ModalChat/Child/ChatRight')->with('message', $message[0])
        ]);
    }
}
