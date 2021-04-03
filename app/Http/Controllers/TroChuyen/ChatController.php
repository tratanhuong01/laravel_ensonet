<?php

namespace App\Http\Controllers\TroChuyen;

use App\Events\ChatGroupEvent;
use App\Events\LoadingTypingMessageOnEvent;
use App\Events\LoadingTypingMessageOffEvent;
use App\Events\SeenMessageEvent;
use App\Http\Controllers\Controller;
use App\Models\Nhomtinnhan;
use App\Models\Notify;
use App\Models\StringUtil;
use App\Models\Taikhoan;
use App\Models\Thongbao;
use App\Models\Tinnhan;
use App\Process\DataProcess;
use App\Process\DataProcessSecond;
use App\Process\DataProcessThird;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ChatController extends Controller
{
    public function view(Request $request)
    {
        $sender = Tinnhan::where('tinnhan.IDTaiKhoan', '=', Session::get('user')[0]->IDTaiKhoan)
            ->join('nhomtinnhan', 'tinnhan.IDNhomTinNhan', 'nhomtinnhan.IDNhomTinNhan')
            ->get();
        $receiver = Tinnhan::where('tinnhan.IDTaiKhoan', '=', $request->IDTaiKhoan)
            ->join('nhomtinnhan', 'tinnhan.IDNhomTinNhan', 'nhomtinnhan.IDNhomTinNhan')
            ->get();
        $chater = DataProcess::getUserOfGroupMessage(DataProcess::checkIsSimilarGroupMessage($sender, $receiver));
        $messages = DataProcess::getMessageByID($sender, $receiver);
        return view('Modal\ModalTroChuyen\ModalChat')->with('chater', $chater)
            ->with('messages', $messages)
            ->with('idNhomTinNhan', DataProcess::checkIsSimilarGroupMessage($sender, $receiver));
    }
    public function minize(Request $request)
    {
        $chater = Taikhoan::where('taikhoan.IDTaiKhoan', '=', $request->IDTaiKhoan)->get();
        return view('Modal\ModalTroChuyen\Child\HideChat')->with('chater', $chater);
    }
    public function openMessenger()
    {
        $notify = Thongbao::where('thongbao.IDTaiKhoan', '=', Session::get('user')[0]->IDTaiKhoan)
            ->where('thongbao.IDLoaiThongBao', '=', 'TINNHAN001')->get();
        $count = 0;
        for ($i = 0; $i < count($notify); $i++) {
            if ($notify[$i]->TinhTrang == 2 || $notify[$i]->TinhTrang == 1)
                $count++;
        }
        if ($count == count($notify)) {
        } else {
            DB::update("UPDATE thongbao SET TinhTrang = ? 
        WHERE IDTaiKhoan = ? AND IDLoaiThongBao = 'TINNHAN001' ", ['1', Session::get('user')[0]->IDTaiKhoan]);
        }
        return view('Modal/ModalHeader/ModalMessenger');
    }
    public function createChat()
    {
        return view('Modal/ModalTroChuyen/ModalNewChat');
    }
    public function addUser(Request $request)
    {
        $IDTaiKhoan = str_replace('0', '', $request->IDTaiKhoan);
        $userGroup = array();
        $user = Taikhoan::where('taikhoan.IDTaiKhoan', '=', $request->IDTaiKhoan)->get();

        if (session()->has('userGroup')) {
            $userGroup = Session::get('userGroup');
            if (isset($userGroup[$IDTaiKhoan])) {
                unset($userGroup[$IDTaiKhoan]);
                Session::put('userGroup', $userGroup);
                return '';
            } else {
                $userGroup[$IDTaiKhoan] = $request->IDTaiKhoan;
                Session::put('userGroup', $userGroup);
                return view('Modal/ModalTroChuyen/Child/UserSelected')
                    ->with(
                        'user',
                        $user
                    );
            }
        } else {
            $userGroup[$IDTaiKhoan] = $request->IDTaiKhoan;
            Session::put('userGroup', $userGroup);
            return view('Modal/ModalTroChuyen/Child/UserSelected')
                ->with(
                    'user',
                    $user
                );
        }
    }
    public function removeUser(Request $request)
    {
        $IDTaiKhoan = str_replace('0', '', $request->IDTaiKhoan);
        $userGroup = Session::get('userGroup');
        if (count($userGroup) == 1) {
            Session::forget('userGroup');
            return '';
        } else {
            unset($userGroup[$IDTaiKhoan]);
            $newUserGroup = array();
            foreach (array_values($userGroup) as $key => $value) {
                $newUserGroup[str_replace('0', '', $value)] = $value;
            }
            Session::put('userGroup', $newUserGroup);
            return '';
        }
    }
    public function loadRemove(Request $request)
    {
        if (!session()->has('userGroup')) {
            return '';
        } else {
            if (count(Session::get('userGroup')) == 1) {
                $sender = Tinnhan::where('tinnhan.IDTaiKhoan', '=', Session::get('user')[0]->IDTaiKhoan)
                    ->join('nhomtinnhan', 'tinnhan.IDNhomTinNhan', 'nhomtinnhan.IDNhomTinNhan')
                    ->get();
                $receiver = Tinnhan::where('tinnhan.IDTaiKhoan', '=', DataProcessSecond::getUserGroupAfterRemove(Session::get('userGroup'), $request->IDTaiKhoan))
                    ->join('nhomtinnhan', 'tinnhan.IDNhomTinNhan', 'nhomtinnhan.IDNhomTinNhan')
                    ->get();
                $messages = DataProcess::getMessageByID($sender, $receiver);
                return view('Modal\ModalTroChuyen\Child\Message')->with('messages', $messages);
            } else {
                $users = DataProcessSecond::createArrayUser(Session::get('userGroup'));
                return view('Modal\ModalTroChuyen\Child\GUICreateGroup')->with('users', $users);
            }
        }
    }
    public function loadAdd(Request $request)
    {
        if (!session()->has('userGroup')) {
            return '';
        } else {
            if (count(Session::get('userGroup')) == 1) {
                $sender = Tinnhan::where('tinnhan.IDTaiKhoan', '=', Session::get('user')[0]->IDTaiKhoan)
                    ->join('nhomtinnhan', 'tinnhan.IDNhomTinNhan', 'nhomtinnhan.IDNhomTinNhan')
                    ->get();
                $receiver = Tinnhan::where('tinnhan.IDTaiKhoan', '=', $request->IDTaiKhoan)
                    ->join('nhomtinnhan', 'tinnhan.IDNhomTinNhan', 'nhomtinnhan.IDNhomTinNhan')
                    ->get();
                $messages = DataProcess::getMessageByID($sender, $receiver);
                return view('Modal\ModalTroChuyen\Child\Message')->with('messages', $messages);
            } else {
                $users = DataProcessSecond::createArrayUser(Session::get('userGroup'));
                return view('Modal\ModalTroChuyen\Child\GUICreateGroup')->with('users', $users);
            }
        }
    }
    public function sendMessageGroup(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $userGroup = Session::get('userGroup');
        if (count($userGroup) == 1) {
            foreach ($userGroup as $key => $value) {
                $chater = Taikhoan::where('taikhoan.IDTaiKhoan', '=', $value)->get();
                $sender = Tinnhan::where('tinnhan.IDTaiKhoan', '=', Session::get('user')[0]->IDTaiKhoan)
                    ->join('nhomtinnhan', 'tinnhan.IDNhomTinNhan', 'nhomtinnhan.IDNhomTinNhan')
                    ->get();
                $receiver = Tinnhan::where('tinnhan.IDTaiKhoan', '=', $value)
                    ->join('nhomtinnhan', 'tinnhan.IDNhomTinNhan', 'nhomtinnhan.IDNhomTinNhan')
                    ->get();
                $idNhomTinNhan = DataProcess::checkIsSimilarGroupMessage($sender, $receiver);
                $idTinNhan = StringUtil::ID('tinnhan', 'IDTinNhan');
                $trangThai = DataProcessThird::checkChatUserActivity($idNhomTinNhan) == true ?
                    DataProcessThird::createTrangThai($idNhomTinNhan, 1) :
                    DataProcessThird::createTrangThai($idNhomTinNhan, 0);
                Tinnhan::add(
                    $idTinNhan,
                    $idNhomTinNhan,
                    Session::get('user')[0]->IDTaiKhoan,
                    $request->NoiDungTinNhan,
                    DataProcess::createState($request->IDNhomTinNhan, '1'),
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
                return view('Modal\ModalTroChuyen\ModalChat')->with('chater', $chater)
                    ->with('messages', $messages)
                    ->with('idNhomTinNhan', $idNhomTinNhan);
            }
        } else {
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
                '',
                '',
                '1',
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
            return view('Modal/ModalTroChuyen/Child/ChatRight')->with('message', $message[0]);
        }
    }
    public function openMessageGroup(Request $request)
    {
        $chater = (DataProcess::getUserOfGroupMessage($request->IDNhomTinNhan));
        if (count($chater) == 1)
            return view('Modal\ModalTroChuyen\ModalChat')->with('chater', $chater)
                ->with('messages', DataProcess::getMessageByNhomTinNhan($request->IDNhomTinNhan))
                ->with('idNhomTinNhan', $request->IDNhomTinNhan);
        else
            return view('Modal\ModalTroChuyen\ModalGroupChat')->with('chater', $chater)
                ->with('messages', DataProcess::getMessageByNhomTinNhan($request->IDNhomTinNhan))
                ->with('idNhomTinNhan', $request->IDNhomTinNhan);
    }
    public function seenMessage(Request $request)
    {
        $member = DataProcess::getUserOfGroupMessage($request->IDNhomTinNhan);
        $message = Tinnhan::where('tinnhan.IDNhomTinNhan', '=', $request->IDNhomTinNhan)
            ->get();
        foreach ($message as $key => $value) {
            if ($value->TrangThai == '0') {
            } else {
                $arr = explode('@', $value->TrangThai);
                $data = '';
                for ($i = 0; $i < count($arr) -  1; $i++) {
                    if (explode('#', $arr[$i])[0] == $request->IDTaiKhoan) {
                        $data .= $request->IDTaiKhoan . '#2@';
                    } else {
                        $data .= $arr[$i] . '@';
                    }
                }
                DB::update('UPDATE tinnhan SET tinnhan.TrangThai = ? WHERE 
                tinnhan.IDTinNhan = ? ', [$data, $value->IDTinNhan]);
            }
        }
        foreach ($member as $key => $value) {
            event(new SeenMessageEvent($value->IDTaiKhoan, $request->IDNhomTinNhan));
        }
    }
    public function loadingTypingMessage(Request $request)
    {
        $member = DataProcess::getUserOfGroupMessageAPI($request->IDNhomTinNhan, $request->IDTaiKhoan);
        if ($request->state == 'ON') {
            foreach ($member as $key => $value) {
                event(new LoadingTypingMessageOnEvent($value->IDTaiKhoan, $request->IDNhomTinNhan));
            }
        } else {
            foreach ($member as $key => $value) {
                event(new LoadingTypingMessageOffEvent($value->IDTaiKhoan, $request->IDNhomTinNhan));
            }
        }
    }
    public function loadingTypingOn(Request $request)
    {
        $user = Taikhoan::where('taikhoan.IDTaiKhoan', '=', $request->IDTaiKhoan)->get()[0];
        return response()->json([
            'view' => "" . view('Modal/ModalTroChuyen/Child/ChatTyping')
                ->with('user', $user)
                ->with('idNhomTinNhan', $request->IDNhomTinNhan)
        ]);
    }
    public function loadingTypingOff(Request $request)
    {
        return response()->json([
            'view' => ''
        ]);
    }
}
