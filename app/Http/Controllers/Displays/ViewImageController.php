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
        $post = DB::table('baidang')->where('baidang.IDBaiDang', '=', $idBaiDang)->get();

        if (count($post) == 0)
            return view('Guest.view')->with('data', $post);
        else {
            $posts = DB::table('hinhanh')
                ->where('hinhanh.IDHinhAnh', '=', $idHinhAnh)
                ->where('hinhanh.IDBaiDang', '=', $idBaiDang)
                ->get();
            if (count($posts) == 0)
                return view('Guest.view')->with('data', $posts);
            else {
                if (session()->has('numLoad'))
                    if (url()->current() == url()->previous())
                        Session::forget('first');
                    else {
                        $numLoad = Session::get('numLoad');
                        $numLoad--;
                        Session::put('numLoad', $numLoad);
                    }
                else
                    Session::put('numLoad', -1);
                $data = Functions::getPost($post[0]);
                return view('Guest.view')->with('data', $data)->with('idHinhAnh', $idHinhAnh);
            }
        }
    }
    public function viewsComment($idBinhLuan, $idHinhAnh)
    {
        $comment = DB::table('binhluan')
            ->join('taikhoan', 'binhluan.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
            ->where('binhluan.IDBinhLuan', '=', $idBinhLuan)->get();
        if (count($comment) == 0)
            return view('Guest.view')->with('data', array());
        else {
            $image = DB::table('hinhanh')
                ->where('hinhanh.IDHinhAnh', '=', $idHinhAnh)
                ->where('hinhanh.Khac', '=', $idBinhLuan)
                ->get();
            if (count($image) == 0)
                return view('Guest.view')->with('data', array());
            else {
                if (session()->has('numLoad'))
                    if (url()->current() == url()->previous())
                        Session::forget('first');
                    else {
                        $numLoad = Session::get('numLoad');
                        $numLoad--;
                        Session::put('numLoad', $numLoad);
                    }
                else
                    Session::put('numLoad', -1);

                return view('Guest.view')->with('data', $image)->with('idHinhAnh', $idHinhAnh);
            }
        }
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
