<?php

namespace App\Http\Controllers\TroChuyen;

use App\Events\ChatGroupEvent;
use App\Http\Controllers\Controller;
use App\Models\Nhomtinnhan;
use App\Models\StringUtil;
use App\Models\Taikhoan;
use App\Models\Thongbao;
use App\Models\Tinnhan;
use App\Process\DataProcess;
use App\Process\DataProcessSecond;
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
                    event(new ChatGroupEvent($value->IDTaiKhoan));
                }
                DB::update('UPDATE tinnhan SET TinhTrang  = ? 
                WHERE IDTinNhan = ? ', [
                    DataProcess::createState($idNhomTinNhan, '1'),
                    $idTinNhan
                ]);
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
                '0',
                '0',
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
                event(new ChatGroupEvent($value->IDTaiKhoan));
            }
            DB::update('UPDATE tinnhan SET TinhTrang  = ? 
            WHERE IDTinNhan = ? ', [
                DataProcess::createState($idNhomTinNhan, '1'),
                $idTinNhan
            ]);
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
}
