<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use App\Models\Congty;
use App\Models\Diachi;
use App\Models\Gioithieu;
use App\Models\Truonghoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditAboutController extends Controller
{
    public function editView(Request $request)
    {
        $view = "";
        $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $request->IDTaiKhoan)->get()[0]->JsonGioiThieu;
        $json = json_decode($json);
        switch ($request->TypeEdit) {
            case 'PlaceWork':
                foreach ($json->CongViecHocVan->CongViec as $key => $value) {
                    if ($value->IDCongViec ==  $request->ID) {
                        $view =  view('Component/About/Edit/EditPlaceWork')
                            ->with('data', $json->CongViecHocVan->CongViec[$key]);
                    }
                }
                break;
            case 'School':
                foreach ($json->CongViecHocVan->HocVan as $key => $value) {
                    if ($value->IDHocVan ==  $request->ID) {
                        $view =  view('Component/About/Edit/EditSchool')
                            ->with('data', $json->CongViecHocVan->HocVan[$key]);
                    }
                }
                break;
            case 'Marriage':
                if ($json->GiaDinhVaCacMoiQuanHe->HonNhan->IDHonNhan ==  $request->ID) {
                    $view =  view('Component/About/Edit/EditRelationShip')
                        ->with('data', $json->GiaDinhVaCacMoiQuanHe->HonNhan);
                }
                break;
            case 'Sex':
                if ($json->ThongTinCoBanVaLienHe->GioiTinh->IDGioiTinh ==  $request->ID) {
                    $view =  view('Component/About/Edit/EditSex')
                        ->with('data', $json->ThongTinCoBanVaLienHe->GioiTinh);
                }
                break;
            case 'BirthDay':
                $view =  view('Component/About/Edit/EditBirthday')
                    ->with('data', $json->ThongTinCoBanVaLienHe->NgaySinh);
                break;
            case 'RelationShip':
                $view =  view('Component/About/Edit/EditRelationShip')
                    ->with('data', $json->GiaDinhVaCacMoiQuanHe->HonNhan);
                break;
            case 'PlaceCurrent':
                foreach ($json->NoiTungSong->NoiOHienTai as $key => $value) {
                    if ($value->IDNoiOHienTai ==  $request->ID) {
                        $view =  view('Component/About/Edit/EditPlaceCurrent')
                            ->with('data', $value);
                    }
                }
                break;
            case 'HomeTown':
                foreach ($json->NoiTungSong->QueQuan as $key => $value) {
                    if ($value->IDQueQuan ==  $request->ID) {
                        $view =  view('Component/About/Edit/EditHomeTown')
                            ->with('data', $json->NoiTungSong->QueQuan[0]);
                    }
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
                    )
                    ->with('idMain', $request->user)
                    ->with('idView', $request->idView);
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
                    )
                    ->with('idMain', $request->user)
                    ->with('idView', $request->idView);
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
                    )
                    ->with('idMain', $request->user)
                    ->with('idView', $request->idView);
                break;
            case 'PlaceWork':
                $companies = Congty::where('congty.IDCongTy', '=', $request->IDCongTy)->get();
                $cityAndTown = Diachi::where('diachi.IDDiaChi', '=', $request->IDDiaChi)->get();
                $get = NULL;
                foreach ($json->CongViecHocVan->CongViec as $key => $value) {
                    if ($value->IDCongViec == $request->ID) {
                        $json->CongViecHocVan->CongViec[$key] = (object)[
                            'IDCongViec' => $request->ID,
                            'IDQuyenRiengTu' => $request->PrivacyInputPlaceWork == NULL ? $request->IDQuyenRiengTu : $request->PrivacyInputPlaceWork,
                            'DuongDanImg' => 'img/completed.png',
                            'IDCongTy' => $request->IDCongTy,
                            'TenCongTy' => $companies[0]->TenTrang == NULL ? $companies[0]->TenCongTy : $companies[0]->TenTrang,
                            'ChucVu' => 'Giám Đốc',
                            'IDDiaChi' => $request->IDDiaChi,
                            'TenDiaChi' => $cityAndTown[0]->TenTrang == NULL ? $cityAndTown[0]->TenDiaChi : $cityAndTown[0]->TenTrang,
                            'NamBatDau' => $request->YearStartPlaceWork,
                            'NamKetThuc' => $request->YearEndPlaceWork
                        ];
                        $get = $json->CongViecHocVan->CongViec[$key];
                    }
                }
                if ($request->ActiveIn == 'Dashboard') {
                    DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
                    gioithieu.IDTaiKhoan = ? ', [json_encode($json), $request->IDTaiKhoan]);
                    return view('Component/About/Data/PlaceWork')
                        ->with('data', $get)
                        ->with('idTaiKhoan', $request->IDTaiKhoan)
                        ->with('idMain', $request->idMain)
                        ->with('idView', $request->idView);
                } else {
                    DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
                    gioithieu.IDTaiKhoan = ? ', [json_encode($json), $request->IDTaiKhoan]);
                    return view('Component/About/Main/PlaceWork')
                        ->with('value', $get)
                        ->with('idTaiKhoan', $request->IDTaiKhoan)
                        ->with('idMain', $request->idMain)
                        ->with('idView', $request->idView);
                }
                break;
            case 'School':
                $school = Truonghoc::where('truonghoc.IDTruongHoc', '=', $request->IDTruongHoc)->get();
                $get = NULL;
                foreach ($json->CongViecHocVan->HocVan as $key => $value) {
                    if ($value->IDHocVan == $request->ID) {
                        $json->CongViecHocVan->HocVan[$key] =
                            (object)[
                                'IDHocVan' => $request->ID,
                                'IDQuyenRiengTu' => $request->PrivacyInputSchool == NULL ? $request->IDQuyenRiengTu : $request->PrivacyInputSchool,
                                'DuongDanImg' => 'img/completed.png',
                                'IDTruongHoc' => $request->IDCongTy,
                                'LoaiTruong' => $request->TypeSchool,
                                'TenTruongHoc' => $school[0]->TenTrang == NULL ? $school[0]->TenTruongHoc : $school[0]->TenTrang,
                                'NamBatDau' => $request->YearStartSchoolInput,
                                'NamKetThuc' => $request->YearEndSchoolInput
                            ];
                        $get = $value;
                    }
                }
                DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
                gioithieu.IDTaiKhoan = ? ', [json_encode($json), $request->IDTaiKhoan]);
                if ($request->ActiveIn == 'Dashboard') {
                    DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
                    gioithieu.IDTaiKhoan = ? ', [json_encode($json), $request->IDTaiKhoan]);
                    return view('Component/About/Data/School')->with(
                        'data',
                        $get
                    )->with('idTaiKhoan', $request->IDTaiKhoan)
                        ->with('idMain', $request->idMain)
                        ->with('idView', $request->idView);
                } else {
                    DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
                    gioithieu.IDTaiKhoan = ? ', [json_encode($json), $request->IDTaiKhoan]);
                    return view('Component/About/Main/School')->with(
                        'data',
                        $get
                    )->with('idTaiKhoan', $request->IDTaiKhoan)
                        ->with('idMain', $request->idMain)
                        ->with('idView', $request->idView);
                }
                break;
            case 'HomeTown':
                $address = Diachi::where('diachi.IDDiaChi', '=', $request->IDDiaChiHome)->get();
                $json->NoiTungSong->QueQuan[0] = (object)[
                    'IDQueQuan' => $request->ID,
                    'IDQuyenRiengTu' => $request->PrivacyInputHomeTown == NULL ? $request->IDQuyenRiengTu : $request->PrivacyInputHomeTown,
                    'DuongDanImg' => 'img/completed.png',
                    'IDDiaChi' => $request->IDDiaChiHome,
                    'TenDiaChi' => $address[0]->TenTrang == NULL ? $address[0]->TenDiaChi : $address[0]->TenTrang,
                    'NamBatDau' => $request->YearStartHomeTown,
                    'NamKetThuc' => $request->YearEndHomeTown
                ];
                DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
                gioithieu.IDTaiKhoan = ? ', [json_encode($json), $request->IDTaiKhoan]);
                if ($request->ActiveIn == 'Dashboard')
                    return view('Component/About/Data/HomeTown')->with(
                        'data',
                        $json->NoiTungSong->QueQuan[0]
                    )->with('idTaiKhoan', $request->IDTaiKhoan)
                        ->with('idMain', $request->idMain)
                        ->with('idView', $request->idView);
                else
                    return view('Component/About/Main/HomeTown')->with(
                        'value',
                        $json->NoiTungSong->QueQuan[0]
                    )->with('idTaiKhoan', $request->IDTaiKhoan)
                        ->with('idMain', $request->idMain)
                        ->with('idView', $request->idView);
                break;
            case 'PlaceCurrent':
                $address = Diachi::where('diachi.IDDiaChi', '=', $request->IDDiaChiLive)->get();
                $get = NULL;
                $json->NoiTungSong->NoiOHienTai[0] = (object)[
                    'IDNoiOHienTai' => $request->ID,
                    'IDQuyenRiengTu' => $request->PrivacyInputLiveCurrent == NULL ? $request->IDQuyenRiengTu  :  $request->PrivacyInputLiveCurrent,
                    'DuongDanImg' => 'img/completed.png',
                    'IDDiaChi' => $request->IDDiaChiLive,
                    'TenDiaChi' => $address[0]->TenTrang == NULL ? $address[0]->TenDiaChi : $address[0]->TenTrang,
                    'NamBatDau' => $request->YearStartLiveCurrent,
                    'NamKetThuc' => $request->YearStartEndCurrent
                ];
                DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
                gioithieu.IDTaiKhoan = ? ', [json_encode($json), $request->IDTaiKhoan]);
                if ($request->ActiveIn == 'Dashboard') {
                    return view('Component/About/Data/PlaceCurrent')->with(
                        'data',
                        $json->NoiTungSong->NoiOHienTai[0]
                    )->with('idTaiKhoan', $request->IDTaiKhoan)
                        ->with('idMain', $request->idMain)
                        ->with('idView', $request->idView);
                } else {
                    return view('Component/About/Main/PlaceCurrent')->with(
                        'value',
                        $json->NoiTungSong->NoiOHienTai[0]
                    )->with('idTaiKhoan', $request->IDTaiKhoan)
                        ->with('idMain', $request->idMain)
                        ->with('idView', $request->idView);
                }
                break;
        }
    }
}
