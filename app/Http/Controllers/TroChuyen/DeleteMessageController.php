<?php

namespace App\Http\Controllers\TroChuyen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Tinnhan;
use App\Process\DataProcess;

class DeleteMessageController extends Controller
{
    public function view(Request $request)
    {
        if ($request->IDTaiKhoan ==  Session::get('user')[0]->IDTaiKhoan)
            return view('Modal/ModalTroChuyen/ModalXoaTinNhanR')->with('IDTinNhan', $request->IDTinNhan);
        else
            return view('Modal/ModalTroChuyen/ModalXoaTinNhanL')->with('IDTinNhan', $request->IDTinNhan);
    }
    public function remove(Request $request)
    {
        if ($request->IDTaiKhoan ==  Session::get('user')[0]->IDTaiKhoan) {
            if ($request->Type == 'ThuHoi') {
                DB::update(
                    'UPDATE tinnhan SET TinhTrang = ? WHERE IDTinNhan = ? ',
                    [DataProcess::updateState(
                        $request->IDTinNhan,
                        $request->IDNhomTinNhan,
                        '2'
                    ), $request->IDTinNhan]
                );
                return view('Modal/ModalTroChuyen/Child/ThuHoiTinNhanR')
                    ->with('message', Tinnhan::where('tinnhan.IDTinNhan', '=', $request->IDTinNhan)->get()[0]);
            } else {
                DB::update(
                    'UPDATE tinnhan SET TinhTrang = ? WHERE IDTinNhan = ? ',
                    [DataProcess::updateState(
                        $request->IDTinNhan,
                        $request->IDNhomTinNhan,
                        '3'
                    ), $request->IDTinNhan]
                );
                return '';
            }
        } else {
            DB::update(
                'UPDATE tinnhan SET TinhTrang = ? WHERE IDTinNhan = ? ',
                [DataProcess::updateState(
                    $request->IDTinNhan,
                    $request->IDNhomTinNhan,
                    '3'
                ), $request->IDTinNhan]
            );
            return '';
        }
    }
}
