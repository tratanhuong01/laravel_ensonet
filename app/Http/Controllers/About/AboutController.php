<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use App\Models\Gioithieu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AboutController extends Controller
{
    public function dashboard(Request $request)
    {
        $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $request->IDTaiKhoan)->get();
        return view('Component.About.Dashboard')->with('json', $json)
            ->with('idTaiKhoan', $request->IDTaiKhoan)
            ->with('idMain', json_decode($request->user))
            ->with('idView', json_decode($request->users));
    }
    public function workAndStudy(Request $request)
    {
        $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $request->IDTaiKhoan)->get();
        return view('Component.About.WorkStudy')->with('json', $json)
            ->with('idTaiKhoan', $request->IDTaiKhoan)
            ->with('idMain', json_decode($request->user))
            ->with('idView', json_decode($request->users));
    }
    public function placeLived(Request $request)
    {
        $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $request->IDTaiKhoan)->get();
        return view('Component.About.PlaceLived')->with('json', $json)
            ->with('idTaiKhoan', $request->IDTaiKhoan)
            ->with('idMain', json_decode($request->user))
            ->with('idView', json_decode($request->users));
    }
    public function infoSimpleAndContact(Request $request)
    {
        $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $request->IDTaiKhoan)->get();
        return view('Component.About.InfoSimpleAndContact')->with('json', $json)
            ->with('idTaiKhoan', $request->IDTaiKhoan)
            ->with('idMain', json_decode($request->user))
            ->with('idView', json_decode($request->users));
    }
    public function familyAndRelatioship(Request $request)
    {
        $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $request->IDTaiKhoan)->get();
        return view('Component.About.FamilyAndRelationShip')->with('json', $json)
            ->with('idTaiKhoan', $request->IDTaiKhoan)
            ->with('idMain', json_decode($request->user))
            ->with('idView', json_decode($request->users));
    }
    public function detailAboutUser(Request $request)
    {
        $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $request->IDTaiKhoan)->get();
        return view('Component.About.DetailAboutYourSelf')->with('json', $json)
            ->with('idTaiKhoan', $request->IDTaiKhoan)
            ->with('idMain', json_decode($request->user))
            ->with('idView', json_decode($request->users));
    }
    public function eventLife(Request $request)
    {
        $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $request->IDTaiKhoan)->get();
        return view('Component.About.EventLife')->with('json', $json)
            ->with('idTaiKhoan', $request->IDTaiKhoan)
            ->with('idMain', json_decode($request->user))
            ->with('idView', json_decode($request->users));
    }
}
