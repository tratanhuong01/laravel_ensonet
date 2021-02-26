<?php

namespace App\Http\Controllers\Displays;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Functions;
use App\Models\Data;

class ViewImageController extends Controller
{
    public function views($idTaiKhoan, $idBaiDang, $duongDan)
    {
        $data = [$idTaiKhoan, $idBaiDang, $duongDan];
        return view('Guest\anh')->with('data', $data);
    }
}
