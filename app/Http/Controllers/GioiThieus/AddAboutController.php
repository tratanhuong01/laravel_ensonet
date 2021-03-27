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
        $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', '1000000001')
            ->get()[0]->JsonGioiThieu;
        $json = json_decode($json);
        $companies = Congty::where('congty.IDCongTy', '=', $request->IDCongTy)->get();
        $cityAndTown = Diachi::where('diachi.IDDiaChi', '=', $request->IDDiaChi)->get();
        if (count($json->CongViecHocVan->CongViec) == 0) {
            $json->CongViecHocVan->CongViec[0] =
                (object)[
                    'IDCongViec' => '10001',
                    'IDQuyenRiengTu' => $request->PrivacyInputPlaceWork,
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
            $json->CongViecHocVan->CongViec[count($json->CongViecHocVan->CongViec)] = (object)[
                'IDCongViec' => '10001',
                'IDQuyenRiengTu' => $request->PrivacyInputPlaceWork,
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
            if ($value->IDCongViec == '10001')
                $get = $value;
        }
        DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
        gioithieu.IDTaiKhoan = ? ', [json_encode($json), '1000000001']);
        return view('Component/GioiThieu/Data/NoiLamViec')->with(
            'data',
            $get
        );
    }
    public function addSchool(Request $request)
    {
        $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', '1000000001')
            ->get()[0]->JsonGioiThieu;
        $json = json_decode($json);
        $school = Truonghoc::where('truonghoc.IDTruongHoc', '=', $request->IDTruongHoc)->get();
        if (count($json->CongViecHocVan->HocVan) == 0) {
            $json->CongViecHocVan->HocVan[0] =
                (object)[
                    'IDHocVan' => '10001',
                    'IDQuyenRiengTu' => $request->PrivacyInputSchool,
                    'DuongDanImg' => 'img/completed.png',
                    'IDTruongHoc' => $request->IDCongTy,
                    'LoaiTruong' => $request->TypeSchool,
                    'TenTruongHoc' => $school[0]->TenTrang == NULL ? $school[0]->TenTruongHoc : $school[0]->TenTrang,
                    'NamBatDau' => $request->YearStartSchoolInput,
                    'NamKetThuc' => $request->YearEndSchoolInput
                ];
        } else {
            $json->CongViecHocVan->HocVan[count($json->CongViecHocVan->HocVan)] = (object)[
                'IDHocVan' => '10001',
                'IDQuyenRiengTu' => $request->PrivacyInputPlaceWork,
                'DuongDanImg' => 'img/completed.png',
                'IDTruongHoc' => $request->IDCongTy,
                'TenTruongHoc' => $school[0]->TenTrang == NULL ? $school[0]->TenTruongHoc : $school[0]->TenTrang,
                'NamBatDau' => $request->YearStartSchool,
                'NamKetThuc' => $request->YearEndSchool
            ];
        }
        $get = NULL;
        foreach ($json->CongViecHocVan->HocVan as $key => $value) {
            if ($value->IDHocVan == '10001')
                $get = $value;
        }
        DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
        gioithieu.IDTaiKhoan = ? ', [json_encode($json), '1000000001']);
        return view('Component/GioiThieu/Data/TruongHoc')->with(
            'data',
            $get
        );
    }
    public function addPlaceLiveCurrent()
    {
    }
    public function addHomeTown()
    {
    }
}
