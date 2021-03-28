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
                $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $request->IDTaiKhoan)->get()[0]->JsonGioiThieu;
                $json = json_decode($json);
                foreach ($json->CongViecHocVan->CongViec as $key => $value) {
                    if ($value->IDCongViec ==  $request->ID) {
                        $view =  view('Component/GioiThieu/Sua/SuaNoiLamViec')
                            ->with('data', $json->CongViecHocVan->CongViec[$key]);
                    }
                }
                break;
            case 'Marriage':
                $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $request->IDTaiKhoan)->get()[0]->JsonGioiThieu;
                $json = json_decode($json);
                if ($json->GiaDinhVaCacMoiQuanHe->HonNhan->IDHonNhan ==  $request->ID) {
                    $view =  view('Component/GioiThieu/Sua/SuaMoiQuanHe')
                        ->with('data', $json->GiaDinhVaCacMoiQuanHe->HonNhan);
                }
                break;
            case 'Sex':
                $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $request->IDTaiKhoan)->get()[0]->JsonGioiThieu;
                $json = json_decode($json);
                if ($json->ThongTinCoBanVaLienHe->GioiTinh->IDGioiTinh ==  $request->ID) {
                    $view =  view('Component/GioiThieu/Sua/SuaGioiTinh')
                        ->with('data', $json->ThongTinCoBanVaLienHe->GioiTinh);
                }
                break;
            case 'BirthDay':
                $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $request->IDTaiKhoan)->get()[0]->JsonGioiThieu;
                $json = json_decode($json);
                $view =  view('Component/GioiThieu/Sua/SuaNgaySinh')
                    ->with('data', $json->ThongTinCoBanVaLienHe->NgaySinh);
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
                return view('Component/GioiThieu/Main/GioiTinh')->with(
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
                    $request->PrivacyInputDayAndMonthBirth == NULL ? $request->IDQuyenRiengTu : $request->PrivacyInputDayAndMonthBirth;
                $json->ThongTinCoBanVaLienHe->NgaySinh->Thang->IDQuyenRiengTu =
                    $request->PrivacyInputDayAndMonthBirth == NULL ? $request->IDQuyenRiengTu : $request->PrivacyInputDayAndMonthBirth;
                $json->ThongTinCoBanVaLienHe->NgaySinh->Nam->IDQuyenRiengTu =
                    $request->PrivacyInputYearBirth == NULL ? $request->IDQuyenRiengTu : $request->PrivacyInputYearBirth;
                DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
                    gioithieu.IDTaiKhoan = ? ', [json_encode($json), $request->IDTaiKhoan]);
                return view('Component/GioiThieu/Main/GioiTinh')->with(
                    'value',
                    $json->ThongTinCoBanVaLienHe->GioiTinh
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
