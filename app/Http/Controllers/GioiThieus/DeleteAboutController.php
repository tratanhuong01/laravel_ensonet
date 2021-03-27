<?php

namespace App\Http\Controllers\GioiThieus;

use App\Http\Controllers\Controller;
use App\Models\Gioithieu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeleteAboutController extends Controller
{
    public function delete(Request $request)
    {
        return view('Component/GioiThieu/Modal/XoaGioiThieu');
    }
    public function deleteMain(Request $request)
    {
        $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', '1000000001')->get()[0]->JsonGioiThieu;
        $json = json_decode($json);
        switch ($request->TypeDelete) {
            case 'PlaceWork':
                foreach ($json->CongViecHocVan->CongViec as $key => $value) {
                    if ($value->IDCongViec == $request->ID) {
                        unset($json->CongViecHocVan->CongViec[$key]);
                    }
                }
                DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
                gioithieu.IDTaiKhoan = ? ', [json_encode($json), '1000000001']);
                return view('Component/GioiThieu/Xoa/XoaNoiLamViec');
                break;
            case 'School':
                foreach ($json->CongViecHocVan->HocVan as $key => $value) {
                    if ($value->IDHocVan == $request->ID) {
                        unset($json->CongViecHocVan->HocVan[$key]);
                    }
                }
                DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
                    gioithieu.IDTaiKhoan = ? ', [json_encode($json), '1000000001']);
                return view('Component/GioiThieu/Xoa/XoaTruongHoc');
                break;
            case 'PlaceLiveCurrent':
                foreach ($json->NoiTungSong->NoiOHienTai as $key => $value) {
                    if ($value->IDNoiOHienTai == $request->ID) {
                        unset($json->NoiTungSong->NoiOHienTai[$key]);
                    }
                }
                DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
                            gioithieu.IDTaiKhoan = ? ', [json_encode($json), '1000000001']);
                return view('Component/GioiThieu/Xoa/XoaNoiOHienTai');
                break;
            case 'HomeTown':
                foreach ($json->NoiTungSong->QueQuan as $key => $value) {
                    if ($value->IDQueQuan == $request->ID) {
                        unset($json->NoiTungSong->QueQuan[$key]);
                    }
                }
                DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
                                gioithieu.IDTaiKhoan = ? ', [json_encode($json), '1000000001']);
                return view('Component/GioiThieu/Xoa/XoaQueQuan');
                break;
            default:
                # code...
                break;
        }
    }
}
