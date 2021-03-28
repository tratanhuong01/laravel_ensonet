<?php

namespace App\Http\Controllers\GioiThieus;

use App\Http\Controllers\Controller;
use App\Models\Gioithieu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditAboutController extends Controller
{
    public function editView(Request $request)
    {
        $view = "";
        switch ($request->TypeEdit) {
            case 'PlaceWork':
                $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', '1000000001')->get()[0]->JsonGioiThieu;
                $json = json_decode($json);
                foreach ($json->CongViecHocVan->CongViec as $key => $value) {
                    if ($value->IDCongViec ==  $request->ID) {
                        $view =  view('Component/GioiThieu/Sua/SuaNoiLamViec')
                            ->with('data', $json->CongViecHocVan->CongViec[$key]);
                    }
                }
                break;
            case 'Marriage':
                $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', '1000000001')->get()[0]->JsonGioiThieu;
                $json = json_decode($json);
                if ($json->GiaDinhVaCacMoiQuanHe->HonNhan->IDHonNhan ==  $request->ID) {
                    $view =  view('Component/GioiThieu/Sua/SuaMoiQuanHe')
                        ->with('data', $json->GiaDinhVaCacMoiQuanHe->HonNhan);
                }
                break;
            default:
                # code...
                break;
        }
        return $view;
    }
    public function edit(Request $request)
    {
    }
}
