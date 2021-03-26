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
        return view('Component/GioiThieu/CongViecHocVan');
    }
    public function placeLived(Request $request)
    {
        return view('Component/GioiThieu/NoiTungSong');
    }
    public function infoSimpleAndContact(Request $request)
    {
        return view('Component/GioiThieu/ThongTinCoBanVaLienHe');
    }
    public function familyAndRelatioship(Request $request)
    {
        return view('Component/GioiThieu/GiaDinhVaMoiQuanHe');
    }
    public function detailAboutUser(Request $request)
    {
        return view('Component/GioiThieu/ChiTietVeBanThan');
    }
    public function eventLife(Request $request)
    {
        return view('Component/GioiThieu/SuKienTrongDoi');
    }
}
