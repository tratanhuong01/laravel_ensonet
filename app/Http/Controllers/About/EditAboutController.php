<?php

namespace App\Http\Controllers\About;

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
                $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $request->IDTaiKhoan)->get()[0]->JsonGioiThieu;
                $json = json_decode($json);
                foreach ($json->CongViecHocVan->CongViec as $key => $value) {
                    if ($value->IDCongViec ==  $request->ID) {
                        $view =  view('Component/About/Edit/EditPlaceWork')
                            ->with('data', $json->CongViecHocVan->CongViec[$key]);
                    }
                }
                break;
            case 'Marriage':
                $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $request->IDTaiKhoan)->get()[0]->JsonGioiThieu;
                $json = json_decode($json);
                if ($json->GiaDinhVaCacMoiQuanHe->HonNhan->IDHonNhan ==  $request->ID) {
                    $view =  view('Component/About/Edit/EditRelationShip')
                        ->with('data', $json->GiaDinhVaCacMoiQuanHe->HonNhan);
                }
                break;
            case 'Sex':
                $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $request->IDTaiKhoan)->get()[0]->JsonGioiThieu;
                $json = json_decode($json);
                if ($json->ThongTinCoBanVaLienHe->GioiTinh->IDGioiTinh ==  $request->ID) {
                    $view =  view('Component/About/Edit/EditSex')
                        ->with('data', $json->ThongTinCoBanVaLienHe->GioiTinh);
                }
                break;
            case 'BirthDay':
                $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $request->IDTaiKhoan)->get()[0]->JsonGioiThieu;
                $json = json_decode($json);
                $view =  view('Component/About/Edit/EditBirthday')
                    ->with('data', $json->ThongTinCoBanVaLienHe->NgaySinh);
                break;
            case 'RelationShip':
                $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $request->IDTaiKhoan)->get()[0]->JsonGioiThieu;
                $json = json_decode($json);
                $view =  view('Component/About/Edit/EditRelationShip')
                    ->with('data', $json->GiaDinhVaCacMoiQuanHe->HonNhan);
                break;
            default:
                # code...
                break;
        }
        return $view;
    }
    public function edit(Request $request)
    {
        $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $request->IDTaiKhoan)
            ->get()[0]->JsonGioiThieu;
        $json = json_decode($json);
        switch ($request->TypeEdit) {
            case 'Sex':
                $json->ThongTinCoBanVaLienHe->GioiTinh->TenGioiTinh = $request->IDSex;
                $json->ThongTinCoBanVaLienHe->GioiTinh->IDQuyenRiengTu =
                    $request->PrivacyInputSex == NULL ? $request->IDQuyenRiengTu : $request->PrivacyInputSex;
                DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
                gioithieu.IDTaiKhoan = ? ', [json_encode($json), $request->IDTaiKhoan]);
                return view('Component/About/Main/Sex')->with(
                    'value',
                    $json->ThongTinCoBanVaLienHe->GioiTinh
                )
                    ->with(
                        'idTaiKhoan',
                        $request->IDTaiKhoan
                    );
                break;
            case 'BirthDay':
                $json->ThongTinCoBanVaLienHe->NgaySinh->Ngay->Ngay = $request->DayBirth;
                $json->ThongTinCoBanVaLienHe->NgaySinh->Thang->Thang = $request->MonthBirth;
                $json->ThongTinCoBanVaLienHe->NgaySinh->Nam->Nam = $request->YearBirth;
                $json->ThongTinCoBanVaLienHe->NgaySinh->Ngay->IDQuyenRiengTu =
                    $request->PrivacyInputDayAnMonthBirth == NULL ? $request->IDQuyenRiengTu : $request->PrivacyInputDayAnMonthBirth;
                $json->ThongTinCoBanVaLienHe->NgaySinh->Thang->IDQuyenRiengTu =
                    $request->PrivacyInputDayAnMonthBirth == NULL ? $request->IDQuyenRiengTu : $request->PrivacyInputDayAnMonthBirth;
                $json->ThongTinCoBanVaLienHe->NgaySinh->Nam->IDQuyenRiengTu =
                    $request->PrivacyInputYearBirth == NULL ? $request->IDQuyenRiengTu : $request->PrivacyInputYearBirth;
                DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
                    gioithieu.IDTaiKhoan = ? ', [json_encode($json), $request->IDTaiKhoan]);
                return view('Component/About/Main/Birthday')->with(
                    'value',
                    $json->ThongTinCoBanVaLienHe->NgaySinh
                )
                    ->with(
                        'idTaiKhoan',
                        $request->IDTaiKhoan
                    );
                break;
            case 'RelationShip':
                $json->GiaDinhVaCacMoiQuanHe->HonNhan->TinhTrang = $request->IDRelationShip;
                $json->GiaDinhVaCacMoiQuanHe->HonNhan->IDQuyenRiengTu =
                    $request->PrivacyInputRelationShip == NULL ? $request->IDQuyenRiengTu : $request->PrivacyInputRelationShip;
                DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
                        gioithieu.IDTaiKhoan = ? ', [json_encode($json), $request->IDTaiKhoan]);
                return view('Component/About/Data/Marriage')->with(
                    'data',
                    $json->GiaDinhVaCacMoiQuanHe->HonNhan
                )
                    ->with(
                        'idTaiKhoan',
                        $request->IDTaiKhoan
                    );
                break;
            default:
                # code...
                break;
        }
    }
}
