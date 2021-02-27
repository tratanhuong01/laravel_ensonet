<?php

namespace App\Http\Controllers\Displays;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Functions;
use App\Models\Data;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ViewImageController extends Controller
{
    public function views($idBaiDang, $idHinhAnh)
    {
        if (session()->has('numLoad')) {
            if (url()->current() == url()->previous()) {
                Session::forget('first');
            } else {
                $numLoad = Session::get('numLoad');
                $numLoad--;
                Session::put('numLoad', $numLoad);
            }
        } else {
            Session::put('numLoad', -1);
        }
        $post = DB::table('baidang')->where('baidang.IDBaiDang', '=', $idBaiDang)->get();
        $data = Functions::getPost($post[0]);
        return view('Guest\anh')->with('data', $data)->with('idHinhAnh', $idHinhAnh);
    }
    public function backPage($value1, $value2, $value3)
    {
        Session::forget('numLoad');
        Session::forget('zoom');
    }
    public function zoomIn($value1, $value2, $value3)
    {
        Session::put('zoom', 'inOut');
        return '';
    }
    public function zoomOut($value1, $value2, $value3)
    {
        Session::forget('zoom');
        return '';
    }
}
