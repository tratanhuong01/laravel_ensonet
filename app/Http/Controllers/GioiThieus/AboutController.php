<?php

namespace App\Http\Controllers\GioiThieus;

use App\Http\Controllers\Controller;
use App\Models\Gioithieu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AboutController extends Controller
{
    public function dashboard(Request $request)
    {
        $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $request->IDTaiKhoan)->get();
        return view('Component/GioiThieu/TongQuan')->with('json', $json)
            ->with('idTaiKhoan', $request->IDTaiKhoan);
    }
    public function workAndStudy(Request $request)
    {
        $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $request->IDTaiKhoan)->get();
        return view('Component/GioiThieu/CongViecHocVan')->with('json', $json)
            ->with('idTaiKhoan', $request->IDTaiKhoan);
    }
    public function placeLived(Request $request)
    {
        $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $request->IDTaiKhoan)->get();
        return view('Component/GioiThieu/NoiTungSong')->with('json', $json)
            ->with('idTaiKhoan', $request->IDTaiKhoan);
    }
    public function infoSimpleAndContact(Request $request)
    {
        $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $request->IDTaiKhoan)->get();
        return view('Component/GioiThieu/ThongTinCoBanVaLienHe')->with('json', $json)
            ->with('idTaiKhoan', $request->IDTaiKhoan);
    }
    public function familyAndRelatioship(Request $request)
    {
        $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $request->IDTaiKhoan)->get();
        return view('Component/GioiThieu/GiaDinhVaMoiQuanHe')->with('json', $json)
            ->with('idTaiKhoan', $request->IDTaiKhoan);
    }
    public function detailAboutUser(Request $request)
    {
        $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $request->IDTaiKhoan)->get();
        return view('Component/GioiThieu/ChiTietVeBanThan')->with('json', $json)
            ->with('idTaiKhoan', $request->IDTaiKhoan);
    }
    public function eventLife(Request $request)
    {
        $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $request->IDTaiKhoan)->get();
        return view('Component/GioiThieu/SuKienTrongDoi')->with('json', $json)
            ->with('idTaiKhoan', $request->IDTaiKhoan);
    }
}
