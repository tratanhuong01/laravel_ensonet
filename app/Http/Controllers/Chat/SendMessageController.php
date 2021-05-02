<?php

namespace App\Http\Controllers\Chat;

use App\Events\ChatGroupEvent;
use App\Events\ChatNorlEvent;
use App\Http\Controllers\Controller;
use App\Models\Hinhanh;
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
use JD\Cloudder\Facades\Cloudder;

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
            $json = [];
            for ($i = 0; $i < (int)$request->numberArray; $i++) {
                $file = $request->file('image_' . $i);
                $idHinhAnh = StringUtil::ID('hinhanh', 'IDHinhAnh');
                Cloudder::upload($file, null, ['folder' => 'ImageMessage'], 'ImageMessage.jpg');
                $nameFile = Cloudder::getResult()['url'];
                Hinhanh::add(
                    $idHinhAnh,
                    'IMAGEMESS',
                    NULL,
                    $nameFile,
                    $request->NoiDungBinhLuan,
                    3,
                    $idTinNhan
                );
                $json[$i] = (object)[
                    'IDNoiDungTinNhan' => $idHinhAnh,
                    'LoaiTinNhan' => '1',
                    'DuongDan' => $nameFile,
                    'NoiDungTinNhan' => ''
                ];
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
        $groupMessage = Nhomtinnhan::where('nhomtinnhan.IDNhomTinNhan', '=', $request->IDNhomTinNhan)->get();
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
            $index = count($messages);
            if ($num == count($u))
                if ($message[0]->LoaiTinNhan == 2)
                    return response()->json([
                        'viewSmall' => "" . view('Modal\ModalChat\Child\ChatCenter')
                            ->with('message', $message[0]),
                        'viewBig' => "" . view('Modal\ModalChat\ModalChat')->with('chater', $chater)
                            ->with('messages', $messages)
                            ->with('idNhomTinNhan', $request->IDNhomTinNhan)
                            ->with('index',  $index - 15),
                        'typeMessage' => 2,
                        'color' => $groupMessage[0]->IDMauTinNhan
                    ]);
                else
                    return response()->json([
                        'viewSmall' => "" . view('Modal\ModalChat\Child\ChatLeft')
                            ->with('message', $message[0]),
                        'viewBig' => "" . view('Modal\ModalChat\ModalChat')->with('chater', $chater)
                            ->with('messages', $messages)
                            ->with('idNhomTinNhan', $request->IDNhomTinNhan)
                            ->with('index',  $index - 15)
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
    public function sendStickerMessageNewChat(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $userGroup = Session::get('userGroup');
        if (count($userGroup) == 1) {
            $json = [];
            $idTinNhan = StringUtil::ID('tinnhan', 'IDTinNhan');
            $json[0] = (object)[
                'IDNoiDungTinNhan' => '100001',
                'LoaiTinNhan' => '2',
                'DuongDan' => $request->IDNhanDan,
                'NoiDungTinNhan' => ''
            ];
            foreach ($userGroup as $key => $value) {
                $chater = Taikhoan::where('taikhoan.IDTaiKhoan', '=', $value)->get();
                $sender = Tinnhan::where('tinnhan.IDTaiKhoan', '=', Session::get('user')[0]->IDTaiKhoan)
                    ->join('nhomtinnhan', 'tinnhan.IDNhomTinNhan', 'nhomtinnhan.IDNhomTinNhan')
                    ->get();
                $receiver = Tinnhan::where('tinnhan.IDTaiKhoan', '=', $value)
                    ->join('nhomtinnhan', 'tinnhan.IDNhomTinNhan', 'nhomtinnhan.IDNhomTinNhan')
                    ->get();
                $idNhomTinNhan = DataProcess::checkIsSimilarGroupMessage($sender, $receiver);
                $trangThai = DataProcessThird::checkChatUserActivity($idNhomTinNhan) == true ?
                    DataProcessThird::createTrangThai($idNhomTinNhan, 1) :
                    DataProcessThird::createTrangThai($idNhomTinNhan, 0);

                Tinnhan::add(
                    $idTinNhan,
                    $idNhomTinNhan,
                    Session::get('user')[0]->IDTaiKhoan,
                    json_encode($json),
                    DataProcess::createState($idNhomTinNhan, '1'),
                    $trangThai,
                    '1',
                    date("Y-m-d H:i:s")
                );
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
                    event(new ChatGroupEvent($value->IDTaiKhoan, $idNhomTinNhan));
                }
                $messages = DataProcess::getMessageByID($sender, $receiver);
                $index = count($messages);
                return response()->json([
                    'viewGroup' => "" . view('Modal\ModalChat\ModalChat')->with('chater', $chater)
                        ->with('messages', $messages)
                        ->with('index', $index - 15)
                        ->with('idNhomTinNhan', $idNhomTinNhan)
                ]);
            }
        } else {
            $json = [];
            $idNhomTinNhan = StringUtil::ID('nhomtinnhan', 'IDNhomTinNhan');
            Nhomtinnhan::add(
                $idNhomTinNhan,
                '',
                '5B5B5B',
                "👍",
                '0'
            );
            $idTinNhan = StringUtil::ID('tinnhan', 'IDTinNhan');
            $json[0] = (object)[
                'IDNoiDungTinNhan' => '100001',
                'LoaiTinNhan' => '2',
                'DuongDan' => $request->IDNhanDan,
                'NoiDungTinNhan' => ''
            ];
            Tinnhan::add(
                $idTinNhan,
                $idNhomTinNhan,
                Session::get('user')[0]->IDTaiKhoan,
                json_encode($json),
                0,
                0,
                '1',
                date("Y-m-d H:i:s")
            );
            Tinnhan::add(
                StringUtil::ID('tinnhan', 'IDTinNhan'),
                $idNhomTinNhan,
                Session::get('user')[0]->IDTaiKhoan,
                NULL,
                1,
                0,
                '0',
                date("Y-m-d H:i:s")
            );
            foreach ($userGroup as $key => $value) {
                Tinnhan::add(
                    StringUtil::ID('tinnhan', 'IDTinNhan'),
                    $idNhomTinNhan,
                    $value,
                    '',
                    '0',
                    '0',
                    '0',
                    date("Y-m-d H:i:s")
                );
            }
            $trangThai = DataProcessThird::checkChatUserActivity($idNhomTinNhan) == true ?
                DataProcessThird::createTrangThai($idNhomTinNhan, 1) :
                DataProcessThird::createTrangThai($idNhomTinNhan, 0);
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
                event(new ChatGroupEvent($value->IDTaiKhoan, $idNhomTinNhan));
            }
            DB::update(
                'UPDATE tinnhan SET tinnhan.TinhTrang = ?  WHERE tinnhan.IDTinNhan = ? ',
                [DataProcess::createState($idNhomTinNhan, '1'), $idTinNhan]
            );
            DB::update(
                'UPDATE tinnhan SET tinnhan.TrangThai = ?  WHERE tinnhan.IDTinNhan = ? ',
                [$trangThai, $idTinNhan]
            );
            $chater = (DataProcess::getUserOfGroupMessage($idNhomTinNhan));
            return response()->json([
                'viewGroup' => "" . view('Modal/ModalChat/ModalGroupChat')
                    ->with('chater', $chater)
                    ->with('messages', DataProcess::getMessageByNhomTinNhan($idNhomTinNhan))
                    ->with('idNhomTinNhan', $idNhomTinNhan),
                'viewMessage' => "" . view('Modal/ModalChat/Child/ChatRight')->with('message', $message[0])
            ]);
        }
    }
}
