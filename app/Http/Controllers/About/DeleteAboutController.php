<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use App\Models\Gioithieu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeleteAboutController extends Controller
{
    public function delete(Request $request)
    {
        return view('Component/About/Modal/DeleteAbout');
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
                $dt = array_values($json->CongViecHocVan->CongViec);
                $json->CongViecHocVan->CongViec = $dt;
                DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
                gioithieu.IDTaiKhoan = ? ', [json_encode($json), '1000000001']);
                return view('Component/About/Delete/DeletePlaceWork') .
                    view('Component/About/Add/AddPlaceWork');
                break;
            case 'School':
                foreach ($json->CongViecHocVan->HocVan as $key => $value) {
                    if ($value->IDHocVan == $request->ID) {
                        unset($json->CongViecHocVan->HocVan[$key]);
                    }
                }
                $dt = array_values($json->CongViecHocVan->HocVan);
                $json->CongViecHocVan->HocVan = $dt;
                DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
                    gioithieu.IDTaiKhoan = ? ', [json_encode($json), '1000000001']);
                return view('Component/About/Delete/DeleteSchool') .
                    view('Component/About/Add/AddSchool');
                break;
            case 'PlaceLiveCurrent':
                foreach ($json->NoiTungSong->NoiOHienTai as $key => $value) {
                    if ($value->IDNoiOHienTai == $request->ID) {
                        unset($json->NoiTungSong->NoiOHienTai[$key]);
                    }
                }
                $dt = array_values($json->NoiTungSong->NoiOHienTai);
                $json->NoiTungSong->NoiOHienTai = $dt;
                DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
                            gioithieu.IDTaiKhoan = ? ', [json_encode($json), '1000000001']);
                return view('Component/About/Delete/DeletePlaceCurrent') .
                    view('Component/About/Add/AddPlaceCurrent');
                break;
            case 'PlaceLived':
                foreach ($json->NoiTungSong->NoiTungSong as $key => $value) {
                    if ($value->IDNoiTungSong == $request->ID) {
                        unset($json->NoiTungSong->NoiTungSong[$key]);
                    }
                }
                $dt = array_values($json->NoiTungSong->NoiTungSong);
                $json->NoiTungSong->NoiTungSong = $dt;
                DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
                                gioithieu.IDTaiKhoan = ? ', [json_encode($json), '1000000001']);
                return view('Component/About/Delete/DeletePlaceLived') .
                    view('Component/About/Add/AddPlaceLived');
                break;
            case 'HomeTown':
                foreach ($json->NoiTungSong->QueQuan as $key => $value) {
                    if ($value->IDQueQuan == $request->ID) {
                        unset($json->NoiTungSong->QueQuan[$key]);
                    }
                }
                $dt = array_values($json->NoiTungSong->QueQuan);
                $json->NoiTungSong->QueQuan = $dt;
                DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
                                gioithieu.IDTaiKhoan = ? ', [json_encode($json), '1000000001']);
                return view('Component/About/Delete/DeleteHomeTown') .
                    view('Component/About/Add/AddHomeTown');
                break;
            case 'MemberFamily':
                foreach ($json->GiaDinhVaCacMoiQuanHe->ThanhVienGiaDinh as $key => $value) {
                    if ($value->IDThanhVienGiaDinh == $request->ID) {
                        unset($json->GiaDinhVaCacMoiQuanHe->ThanhVienGiaDinh[$key]);
                    }
                }
                $dt = array_values($json->GiaDinhVaCacMoiQuanHe->ThanhVienGiaDinh);
                $json->GiaDinhVaCacMoiQuanHe->ThanhVienGiaDinh = $dt;
                DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
                                    gioithieu.IDTaiKhoan = ? ', [json_encode($json), '1000000001']);
                return view('Component/About/Delete/DeleteMemberFamily') .
                    view('Component/About/Add/AddMemberFamily');
                break;
            default:
                # code...
                break;
        }
    }
}
