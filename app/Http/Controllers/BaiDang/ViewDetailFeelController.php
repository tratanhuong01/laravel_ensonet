<?php

namespace App\Http\Controllers\BaiDang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Data;
use App\Models\Process;
use Illuminate\Support\Facades\Session;

class ViewDetailFeelController extends Controller
{
    public function view(Request $request)
    {
        Session::put('IDBaiDang', $request->IDBaiDang);
        return view('Modal\ModalBaiDang\ModalCamXuc')->with(
            'data',
            Data::getDetailFeelPost($request->IDBaiDang)
        );
    }
    public function viewOnly(Request $request)
    {
        if ($request->LoaiCamXuc == 'NULL')
            return view('Component\BaiDang\ViewCamXuc')->with(
                'datas',
                Data::getDetailFeelPost($request->IDBaiDang)
            );
        else
            return view('Component\BaiDang\ViewCamXuc')->with(
                'datas',
                Data::getOnlyDetailFeelPost($request->IDBaiDang, $request->LoaiCamXuc)
            );
    }
    public function viewCmt(Request $request)
    {
        Session::put('IDBinhLuan', $request->IDBinhLuan);
        return view('Modal\ModalBinhLuan\ModalBinhLuan')->with(
            'data',
            Process::getDetailFeelPost($request->IDBinhLuan)
        );
    }
    public function viewOnlyCmt(Request $request)
    {
        if ($request->LoaiCamXuc == 'NULL')
            return view('Component\BinhLuan\ViewCamXuc')->with(
                'datas',
                Process::getDetailFeelPost($request->IDBinhLuan)
            );
        else
            return view('Component\BinhLuan\ViewCamXuc')->with(
                'datas',
                Process::getOnlyDetailFeelPost($request->IDBinhLuan, $request->LoaiCamXuc)
            );
    }
}
