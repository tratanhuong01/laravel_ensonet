<?php

namespace App\Http\Controllers\TaiKhoans;

use App\Http\Controllers\Controller;
use App\Models\Taikhoan;
use Illuminate\Http\Request;

class SearchFriendController extends Controller
{
    public function search(Request $request)
    {
        $data = Taikhoan::search($request->hoTen, $request->IDView);
        $new = array();
        for ($i = 0; $i < count($data); $i++) {
            $new[$i][$i] = $data[$i];
        }
        return view('Component\DanhMuc\BanBe')->with('data', $new);
    }
}
