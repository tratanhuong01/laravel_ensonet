<?php

namespace App\Http\Controllers\BaiDang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Data;
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
}
