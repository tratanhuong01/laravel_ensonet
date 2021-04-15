<?php

namespace App\Http\Controllers\Chat;

use App\Events\ChatGroupEvent;
use App\Events\ChatNorlEvent;
use App\Events\RetrievalMessageEvent;
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
        if ($request->IDTaiKhoan ==  Session::get('user')[0]->IDTaiKhoan) {
            $message = Tinnhan::where('tinnhan.IDTinNhan', '=', $request->IDTinNhan)->get();
            $tinhTrang = explode('#', DataProcess::getState($message[0]->TinhTrang, Session::get('user')[0]->IDTaiKhoan))[1];
            if ($tinhTrang == 1)
                return view('Modal/ModalChat/ModalDeleteMessageR')->with('IDTinNhan', $request->IDTinNhan);
            else
                return view('Modal/ModalChat/ModalDeleteMessageL')->with('IDTinNhan', $request->IDTinNhan);
        } else
            return view('Modal/ModalChat/ModalDeleteMessageL')->with('IDTinNhan', $request->IDTinNhan);
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
                $userGroup = DataProcess::getUserOfGroupMessage($request->IDNhomTinNhan);
                if (count($userGroup) == 1)
                    event(new RetrievalMessageEvent(
                        $userGroup[0]->IDTaiKhoan,
                        $request->IDTinNhan
                    ));
                else
                    foreach ($userGroup as $key => $value)
                        event(new RetrievalMessageEvent(
                            $value->IDTaiKhoan,
                            $request->IDTinNhan
                        ));
                return response()->json([
                    'right' => "" . view('Modal/ModalChat/Child/RetrievalMessageR')
                        ->with(
                            'message',
                            Tinnhan::where('tinnhan.IDTinNhan', '=', $request->IDTinNhan)
                                ->join('taikhoan', 'tinnhan.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
                                ->get()[0]
                        )
                ]);
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
    public function retrievalMessageEvent(Request $request)
    {
        return response()->json([
            'left' => "" .  view('Modal/ModalChat/Child/RetrievalMessageL')
                ->with(
                    'message',
                    Tinnhan::where('tinnhan.IDTinNhan', '=', $request->IDTinNhan)
                        ->join('taikhoan', 'tinnhan.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
                        ->get()[0]
                ),
            'IDTinNhan' => $request->IDTinNhan
        ]);
    }
}
