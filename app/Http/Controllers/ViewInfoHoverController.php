<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Taikhoan;
use Illuminate\Support\Facades\DB;

class ViewInfoHoverController extends Controller
{
    public function view(Request $request)
    {
        $data = DB::table('taikhoan')->where('IDTaiKhoan', '=', $request->IDTaiKhoan)->get();
        return view('Component\Index\HoverUser')->with('data', $data[0]);
    }
}
