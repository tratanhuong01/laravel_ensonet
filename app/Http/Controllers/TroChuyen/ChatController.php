<?php

namespace App\Http\Controllers\TroChuyen;

use App\Http\Controllers\Controller;
use App\Models\Taikhoan;
use App\Models\Tinnhan;
use App\Process\DataProcess;
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
            ->with('messages', $messages);
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
}
