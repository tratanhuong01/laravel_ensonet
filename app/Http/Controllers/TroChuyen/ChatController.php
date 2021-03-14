<?php

namespace App\Http\Controllers\TroChuyen;

use App\Http\Controllers\Controller;
use App\Models\Taikhoan;
use App\Models\Tinnhan;
use App\Process\DataProcess;
use App\Process\DataProcessSecond;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ChatController extends Controller
{
    public function view(Request $request)
    {
        $chater = Taikhoan::where('taikhoan.IDTaiKhoan', '=', $request->IDTaiKhoan)->get();
        $sender = Tinnhan::where('tinnhan.IDTaiKhoan', '=', Session::get('user')[0]->IDTaiKhoan)
            ->join('nhomtinnhan', 'tinnhan.IDNhomTinNhan', 'nhomtinnhan.IDNhomTinNhan')
            ->get();
        $receiver = Tinnhan::where('tinnhan.IDTaiKhoan', '=', $request->IDTaiKhoan)
            ->join('nhomtinnhan', 'tinnhan.IDNhomTinNhan', 'nhomtinnhan.IDNhomTinNhan')
            ->get();
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
}
