<?php

namespace App\Http\Controllers\TroChuyen;

use App\Http\Controllers\Controller;
use App\Models\Taikhoan;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function view(Request $request)
    {
        $chater = Taikhoan::where('taikhoan.IDTaiKhoan', '=', $request->IDTaiKhoan)->get();
        return view('Modal\ModalTroChuyen\ModalChat')->with('chater', $chater);
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
