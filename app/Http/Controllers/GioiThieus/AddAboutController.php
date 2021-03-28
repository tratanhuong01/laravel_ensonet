<?php

namespace App\Http\Controllers\GioiThieus;

use App\Http\Controllers\Controller;
use App\Models\Congty;
use App\Models\Diachi;
use App\Models\Gioithieu;
use App\Models\Truonghoc;
use Illuminate\Http\Request;
use App\Process\JsonGioiThieu;
use Illuminate\Support\Facades\DB;

class AddAboutController extends Controller
{
    public function addPlaceWorks(Request $request)
    {
        $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $request->IDTaiKhoan)
            ->get()[0]->JsonGioiThieu;
        $json = json_decode($json);
        $companies = Congty::where('congty.IDCongTy', '=', $request->IDCongTy)->get();
        $cityAndTown = Diachi::where('diachi.IDDiaChi', '=', $request->IDDiaChi)->get();
        $id = "";
        if (count($json->CongViecHocVan->CongViec) == 0) {
            $id = '10000';
            $json->CongViecHocVan->CongViec[0] =
                (object)[
                    'IDCongViec' => $id,
                    'IDQuyenRiengTu' => $request->PrivacyInputPlaceWork == NULL ? $request->IDQuyenRiengTu :  $request->PrivacyInputPlaceWork,
                    'DuongDanImg' => 'img/completed.png',
                    'IDCongTy' => $request->IDCongTy,
                    'TenCongTy' => $companies[0]->TenTrang == NULL ? $companies[0]->TenCongTy : $companies[0]->TenTrang,
                    'ChucVu' => 'Giám Đốc',
                    'IDDiaChi' => $request->IDDiaChi,
                    'TenDiaChi' => $cityAndTown[0]->TenTrang == NULL ? $cityAndTown[0]->TenDiaChi : $cityAndTown[0]->TenTrang,
                    'NamBatDau' => $request->YearStartPlaceWork,
                    'NamKetThuc' => $request->YearEndPlaceWork
                ];
        } else {
            $id = $json->CongViecHocVan->CongViec[count($json->CongViecHocVan->CongViec) - 1]->IDCongViec;
            $id++;
            $json->CongViecHocVan->CongViec[count($json->CongViecHocVan->CongViec)] = (object)[
                'IDCongViec' => $id,
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
        }
        $get = NULL;
        foreach ($json->CongViecHocVan->CongViec as $key => $value) {
            if ($value->IDCongViec == $id)
                $get = $value;
        }
        if ($request->ActiveIn == 'Dashboard') {
            DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
            gioithieu.IDTaiKhoan = ? ', [json_encode($json), $request->IDTaiKhoan]);
            return view('Component/GioiThieu/Data/NoiLamViec')->with(
                'data',
                $get
            );
        } else {
            DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
            gioithieu.IDTaiKhoan = ? ', [json_encode($json), $request->IDTaiKhoan]);
            return view('Component/GioiThieu/Main/NoiLamViec')->with(
                'value',
                $get
            );
        }
    }
    public function addSchool(Request $request)
    {
        $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $request->IDTaiKhoan)
            ->get()[0]->JsonGioiThieu;
        $json = json_decode($json);
        $school = Truonghoc::where('truonghoc.IDTruongHoc', '=', $request->IDTruongHoc)->get();
        if (count($json->CongViecHocVan->HocVan) == 0) {
            $json->CongViecHocVan->HocVan[0] =
                (object)[
                    'IDHocVan' => '10001',
                    'IDQuyenRiengTu' => $request->PrivacyInputSchool == NULL ? $request->IDQuyenRiengTu : $request->PrivacyInputSchool,
                    'DuongDanImg' => 'img/completed.png',
                    'IDTruongHoc' => $request->IDCongTy,
                    'LoaiTruong' => $request->TypeSchool,
                    'TenTruongHoc' => $school[0]->TenTrang == NULL ? $school[0]->TenTruongHoc : $school[0]->TenTrang,
                    'NamBatDau' => $request->YearStartSchoolInput,
                    'NamKetThuc' => $request->YearEndSchoolInput
                ];
        } else {
            (object)[
                'IDHocVan' => '10001',
                'IDQuyenRiengTu' => $request->PrivacyInputSchool == NULL ? $request->IDQuyenRiengTu : $request->PrivacyInputSchool,
                'DuongDanImg' => 'img/completed.png',
                'IDTruongHoc' => $request->IDCongTy,
                'LoaiTruong' => $request->TypeSchool,
                'TenTruongHoc' => $school[0]->TenTrang == NULL ? $school[0]->TenTruongHoc : $school[0]->TenTrang,
                'NamBatDau' => $request->YearStartSchoolInput,
                'NamKetThuc' => $request->YearEndSchoolInput
            ];
        }
        $get = NULL;
        foreach ($json->CongViecHocVan->HocVan as $key => $value) {
            if ($value->IDHocVan == '10001')
                $get = $value;
        }
        DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
        gioithieu.IDTaiKhoan = ? ', [json_encode($json), $request->IDTaiKhoan]);
        return view('Component/GioiThieu/Data/TruongHoc')->with(
            'data',
            $get
        );
    }
    public function addPlaceLiveCurrent(Request $request)
    {
        $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $request->IDTaiKhoan)
            ->get()[0]->JsonGioiThieu;
        $json = json_decode($json);
        $address = Diachi::where('diachi.IDDiaChi', '=', $request->IDDiaChiLive)->get();
        if (count($json->NoiTungSong->NoiOHienTai) == 0) {
            $json->NoiTungSong->NoiOHienTai[0] = (object)[
                'IDNoiOHienTai' => '10001',
                'IDQuyenRiengTu' => $request->PrivacyInputLiveCurrent == NULL ? $request->IDQuyenRiengTu  :  $request->PrivacyInputLiveCurrent,
                'DuongDanImg' => 'img/completed.png',
                'IDDiaChi' => $request->IDDiaChiLive,
                'TenDiaChi' => $address[0]->TenTrang == NULL ? $address[0]->TenDiaChi : $address[0]->TenTrang,
                'NamBatDau' => $request->YearStartLiveCurrent,
                'NamKetThuc' => $request->YearStartEndCurrent
            ];
        } else {
            $json->NoiTungSong->NoiOHienTai[count($json->NoiTungSong->NoiOHienTai)] = (object)[
                'IDNoiOHienTai' => '10001',
                'IDQuyenRiengTu' => $request->PrivacyInputLiveCurrent == NULL ?  $request->IDQuyenRiengTu  :  $request->PrivacyInputLiveCurrent,
                'DuongDanImg' => 'img/completed.png',
                'IDDiaChi' => $request->IDDiaChiLive,
                'TenDiaChi' => $address[0]->TenTrang == NULL ? $address[0]->TenDiaChi : $address[0]->TenTrang,
                'NamBatDau' => $request->YearStartLiveCurrent,
                'NamKetThuc' => $request->YearStartEndCurrent
            ];
        }
        $get = NULL;
        foreach ($json->NoiTungSong->NoiOHienTai as $key => $value) {
            if ($value->IDNoiOHienTai == '10001')
                $get = $value;
        }
        DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
        gioithieu.IDTaiKhoan = ? ', [json_encode($json), $request->IDTaiKhoan]);
        return view('Component/GioiThieu/Data/NoiOHienTai')->with(
            'data',
            $get
        );
    }
    public function addHomeTown(Request $request)
    {
        $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', '1000000001')
            ->get()[0]->JsonGioiThieu;
        $json = json_decode($json);
        $address = Diachi::where('diachi.IDDiaChi', '=', $request->IDDiaChiHome)->get();
        if (count($json->NoiTungSong->QueQuan) == 0) {
            $json->NoiTungSong->QueQuan[0] =
                (object)[
                    'IDQueQuan' => '10001',
                    'IDQuyenRiengTu' => $request->PrivacyInputHomeTown == NULL ? $request->IDQuyenRiengTu : $request->PrivacyInputHomeTown,
                    'DuongDanImg' => 'img/completed.png',
                    'IDDiaChi' => $request->IDDiaChiLive,
                    'TenDiaChi' => $address[0]->TenTrang == NULL ? $address[0]->TenDiaChi : $address[0]->TenTrang,
                    'NamBatDau' => $request->YearStartSchoolInput,
                    'NamKetThuc' => $request->YearEndSchoolInput
                ];
        } else {
            $json->NoiTungSong->QueQuan[count($json->NoiTungSong->QueQuan)] = (object)[
                'IDQueQuan' => '10001',
                'IDQuyenRiengTu' => $request->PrivacyInputHomeTown == NULL ? $request->IDQuyenRiengTu : $request->PrivacyInputHomeTown,
                'DuongDanImg' => 'img/completed.png',
                'IDDiaChi' => $request->IDDiaChiHome,
                'TenDiaChi' => $address[0]->TenTrang == NULL ? $address[0]->TenDiaChi : $address[0]->TenTrang,
                'NamBatDau' => $request->YearStartHomeTown,
                'NamKetThuc' => $request->YearEndHomeTown
            ];
        }
        $get = NULL;
        foreach ($json->NoiTungSong->QueQuan as $key => $value) {
            if ($value->IDQueQuan == '10001')
                $get = $value;
        }
        DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
        gioithieu.IDTaiKhoan = ? ', [json_encode($json), $request->IDTaiKhoan]);
        if ($request->ActiveIn == 'Dashboard')
            return view('Component/GioiThieu/Data/QueQuan')->with(
                'data',
                $get
            );
        else
            return view('Component/GioiThieu/Main/QueQuan')->with(
                'value',
                $get
            );
    }
    public function addPlaceLived(Request $request)
    {
        $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $request->IDTaiKhoan)
            ->get()[0]->JsonGioiThieu;
        $json = json_decode($json);
        $id = "";
        $address = Diachi::where('diachi.IDDiaChi', '=', $request->IDNoiTungSong)->get();
        if (count($json->NoiTungSong->NoiTungSong) == 0) {
            $id = "10000";
            $json->NoiTungSong->NoiTungSong[0] =
                (object)[
                    'IDNoiTungSong' => $id,
                    'IDQuyenRiengTu' => $request->PrivacyInputPlaceLived == NULL ? $request->IDQuyenRiengTu : $request->PrivacyInputPlaceLived,
                    'DuongDanImg' => 'img/completed.png',
                    'IDDiaChi' => $request->IDNoiTungSong,
                    'TenDiaChi' => $address[0]->TenTrang == NULL ? $address[0]->TenDiaChi : $address[0]->TenTrang,
                    'NamBatDau' => $request->YearStartSchoolInput,
                    'NamKetThuc' => $request->YearEndSchoolInput
                ];
        } else {
            $id = $json->NoiTungSong->NoiTungSong[count($json->NoiTungSong->NoiTungSong) - 1]->IDNoiTungSong;
            $id++;
            $json->NoiTungSong->NoiTungSong[count($json->NoiTungSong->NoiTungSong)] = (object)[
                'IDNoiTungSong' => $id,
                'IDQuyenRiengTu' => $request->PrivacyInputPlaceLived == NULL ? $request->IDQuyenRiengTu : $request->PrivacyInputPlaceLived,
                'DuongDanImg' => 'img/completed.png',
                'IDDiaChi' => $request->IDNoiTungSong,
                'TenDiaChi' => $address[0]->TenTrang == NULL ? $address[0]->TenDiaChi : $address[0]->TenTrang,
                'NamBatDau' => $request->YearStartSchoolInput,
                'NamKetThuc' => $request->YearEndSchoolInput
            ];
        }
        $get = NULL;
        foreach ($json->NoiTungSong->NoiTungSong as $key => $value) {
            if ($value->IDNoiTungSong == $id)
                $get = $value;
        }
        DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
        gioithieu.IDTaiKhoan = ? ', [json_encode($json), $request->IDTaiKhoan]);
        return view('Component/GioiThieu/Main/NoiTungSong')->with(
            'value',
            $get
        );
    }
}
