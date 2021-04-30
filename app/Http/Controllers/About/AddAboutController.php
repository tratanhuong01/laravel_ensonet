<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use App\Models\Congty;
use App\Models\Diachi;
use App\Models\Gioithieu;
use App\Models\Taikhoan;
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
    }
    public function addSchool(Request $request)
    {
        $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $request->IDTaiKhoan)
            ->get()[0]->JsonGioiThieu;
        $json = json_decode($json);
        $id = '';
        $school = Truonghoc::where('truonghoc.IDTruongHoc', '=', $request->IDTruongHoc)->get();
        if (count($json->CongViecHocVan->HocVan) == 0) {
            $id = '10000';
            $json->CongViecHocVan->HocVan[0] =
                (object)[
                    'IDHocVan' => $id,
                    'IDQuyenRiengTu' => $request->PrivacyInputSchool == NULL ? $request->IDQuyenRiengTu : $request->PrivacyInputSchool,
                    'DuongDanImg' => 'img/completed.png',
                    'IDTruongHoc' => $request->IDCongTy,
                    'LoaiTruong' => $request->TypeSchool,
                    'TenTruongHoc' => $school[0]->TenTrang == NULL ? $school[0]->TenTruongHoc : $school[0]->TenTrang,
                    'NamBatDau' => $request->YearStartSchoolInput,
                    'NamKetThuc' => $request->YearEndSchoolInput
                ];
        } else {
            $id = $json->NoiTungSong->HocVan[count($json->CongViecHocVan->HocVan) - 1]->IDHocVan;
            $id++;
            $json->CongViecHocVan->HocVan[count($json->CongViecHocVan->HocVan)] =
                (object)[
                    'IDHocVan' => $id,
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
            if ($value->IDHocVan == $id)
                $get = $value;
        }
        DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
        gioithieu.IDTaiKhoan = ? ', [json_encode($json), $request->IDTaiKhoan]);
        return view('Component/About/Data/School')->with(
            'data',
            $get
        )->with('idTaiKhoan', $request->IDTaiKhoan)
            ->with('idMain', $request->idMain)
            ->with('idView', $request->idView);
    }
    public function addPlaceLiveCurrent(Request $request)
    {
        $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $request->IDTaiKhoan)
            ->get()[0]->JsonGioiThieu;
        $json = json_decode($json);
        $id = '';
        $address = Diachi::where('diachi.IDDiaChi', '=', $request->IDDiaChiLive)->get();
        if (count($json->NoiTungSong->NoiOHienTai) == 0) {
            $id = '10000';
            $json->NoiTungSong->NoiOHienTai[0] = (object)[
                'IDNoiOHienTai' => $id,
                'IDQuyenRiengTu' => $request->PrivacyInputLiveCurrent == NULL ? $request->IDQuyenRiengTu  :  $request->PrivacyInputLiveCurrent,
                'DuongDanImg' => 'img/completed.png',
                'IDDiaChi' => $request->IDDiaChiLive,
                'TenDiaChi' => $address[0]->TenTrang == NULL ? $address[0]->TenDiaChi : $address[0]->TenTrang,
                'NamBatDau' => $request->YearStartLiveCurrent,
                'NamKetThuc' => $request->YearStartEndCurrent
            ];
        } else {
            $id = $json->NoiTungSong->NoiOHienTai[count($json->NoiTungSong->NoiOHienTai) - 1]->IDNoiOHienTai;
            $id++;
            $json->NoiTungSong->NoiOHienTai[count($json->NoiTungSong->NoiOHienTai)] = (object)[
                'IDNoiOHienTai' => $id,
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
            if ($value->IDNoiOHienTai == $id)
                $get = $value;
        }
        DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
        gioithieu.IDTaiKhoan = ? ', [json_encode($json), $request->IDTaiKhoan]);
        if ($request->ActiveIn == 'Dashboard') {
            return view('Component/About/Data/PlaceCurrent')->with(
                'data',
                $get
            )->with('idTaiKhoan', $request->IDTaiKhoan)
                ->with('idMain', $request->idMain)
                ->with('idView', $request->idView);
        } else {
            return view('Component/About/Main/PlaceCurrent')->with(
                'value',
                $get
            )->with('idTaiKhoan', $request->IDTaiKhoan)
                ->with('idMain', $request->idMain)
                ->with('idView', $request->idView);
        }
    }
    public function addHomeTown(Request $request)
    {
        $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', '1000000001')
            ->get()[0]->JsonGioiThieu;
        $json = json_decode($json);
        $address = Diachi::where('diachi.IDDiaChi', '=', $request->IDDiaChiHome)->get();
        $id = '';
        if (count($json->NoiTungSong->QueQuan) == 0) {
            $id = '10000';
            $json->NoiTungSong->QueQuan[0] =
                (object)[
                    'IDQueQuan' => $id,
                    'IDQuyenRiengTu' => $request->PrivacyInputHomeTown == NULL ? $request->IDQuyenRiengTu : $request->PrivacyInputHomeTown,
                    'DuongDanImg' => 'img/completed.png',
                    'IDDiaChi' => $request->IDDiaChiLive,
                    'TenDiaChi' => $address[0]->TenTrang == NULL ? $address[0]->TenDiaChi : $address[0]->TenTrang,
                    'NamBatDau' => $request->YearStartSchoolInput,
                    'NamKetThuc' => $request->YearEndSchoolInput
                ];
        } else {
            $id = $json->NoiTungSong->QueQuan[count($json->NoiTungSong->QueQuan) - 1]->IDQueQuan;
            $id++;
            $json->NoiTungSong->QueQuan[count($json->NoiTungSong->QueQuan)] = (object)[
                'IDQueQuan' => $id,
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
            if ($value->IDQueQuan == $id)
                $get = $value;
        }
        DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
        gioithieu.IDTaiKhoan = ? ', [json_encode($json), $request->IDTaiKhoan]);
        if ($request->ActiveIn == 'Dashboard')
            return view('Component/About/Data/HomeTown')->with(
                'data',
                $get
            )->with('idTaiKhoan', $request->IDTaiKhoan)
                ->with('idMain', $request->idMain)
                ->with('idView', $request->idView);
        else
            return view('Component/About/Main/HomeTown')->with(
                'value',
                $get
            )->with('idTaiKhoan', $request->IDTaiKhoan)
                ->with('idMain', $request->idMain)
                ->with('idView', $request->idView);
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
        return view('Component/About/Main/PlaceLived')->with(
            'value',
            $get
        )->with('idTaiKhoan', $request->IDTaiKhoan)
            ->with('idMain', $request->idMain)
            ->with('idView', $request->idView);
    }
    public function addIntroYourSelf(Request $request)
    {
        $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $request->IDTaiKhoan)
            ->get()[0]->JsonGioiThieu;
        $json = json_decode($json);
        $id = "";
        $address = Diachi::where('diachi.IDDiaChi', '=', $request->IDNoiTungSong)->get();
        if (count($json->ChiTietBanThan->GioiThieu) == 0) {
            $id = "10000";
            $json->ChiTietBanThan->GioiThieu[0] =
                (object)[
                    'IDGioiThieu' => $id,
                    'IDQuyenRiengTu' => $request->PrivacyInputIntroYourSelf == NULL ? $request->IDQuyenRiengTu : $request->PrivacyInputIntroYourSelf,
                    'TenGioiThieu' => $request->InfoIntroYourSelf
                ];
        } else {
            $id =  $json->ChiTietBanThan->GioiThieu[count($json->ChiTietBanThan->GioiThieu) - 1]->IDGioiThieu;
            $id++;
            $json->ChiTietBanThan->GioiThieu[count($json->ChiTietBanThan->GioiThieu)] =
                (object)[
                    'IDGioiThieu' => $id,
                    'IDQuyenRiengTu' => $request->PrivacyInputIntroYourSelf == NULL ? $request->IDQuyenRiengTu : $request->PrivacyInputIntroYourSelf,
                    'TenGioiThieu' => $request->InfoIntroYourSelf
                ];
        }
        $get = NULL;
        foreach ($json->ChiTietBanThan->GioiThieu as $key => $value) {
            if ($value->IDGioiThieu == $id)
                $get = $value;
        }
        DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
        gioithieu.IDTaiKhoan = ? ', [json_encode($json), $request->IDTaiKhoan]);
        return view('Component/About/Main/IntroYourSelf')->with(
            'value',
            $get
        )->with('idTaiKhoan', $request->IDTaiKhoan)
            ->with('idMain', $request->idMain)
            ->with('idView', $request->idView);
    }
    public function addWayReadName(Request $request)
    {
        $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $request->IDTaiKhoan)
            ->get()[0]->JsonGioiThieu;
        $json = json_decode($json);
        $id = "";
        if (count($json->ChiTietBanThan->PhatAm) == 0) {
            $id = "10000";
            $json->ChiTietBanThan->PhatAm[0] =
                (object)[
                    'IDPhatAm' => $id,
                    'IDQuyenRiengTu' => $request->PrivacyInputWayReadName == NULL ? $request->IDQuyenRiengTu : $request->PrivacyInputWayReadName,
                    'Ho' => $request->FirstNameRead,
                    'Ten' => $request->LastNameRead
                ];
        } else {
            $id =  $json->ChiTietBanThan->PhatAm[count($json->ChiTietBanThan->PhatAm) - 1]->IDPhatAm;
            $id++;
            $json->ChiTietBanThan->PhatAm[0] =
                (object)[
                    'IDPhatAm' => $id,
                    'IDQuyenRiengTu' => $request->PrivacyInputWayReadName == NULL ? $request->IDQuyenRiengTu : $request->PrivacyInputWayReadName,
                    'Ho' => $request->FristNameRead,
                    'Ten' => $request->LastNameRead
                ];
        }
        $get = NULL;
        foreach ($json->ChiTietBanThan->PhatAm as $key => $value) {
            if ($value->IDPhatAm == $id)
                $get = $value;
        }
        DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
        gioithieu.IDTaiKhoan = ? ', [json_encode($json), $request->IDTaiKhoan]);
        return view('Component/About/Main/WaySpeak')->with(
            'value',
            $get
        )->with('idTaiKhoan', $request->IDTaiKhoan)
            ->with('idMain', $request->idMain)
            ->with('idView', $request->idView);
    }
    public function addNickName(Request $request)
    {
        $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $request->IDTaiKhoan)
            ->get()[0]->JsonGioiThieu;
        $json = json_decode($json);
        $id = "";
        if (count($json->ChiTietBanThan->BietDanh) == 0) {
            $id = "10000";
            $json->ChiTietBanThan->BietDanh[0] =
                (object)[
                    'IDBietDanh' => $id,
                    'IDQuyenRiengTu' => $request->PrivacyInputWayReadName == NULL ? $request->IDQuyenRiengTu : $request->PrivacyInputWayReadName,
                    'LoaiBietDanh' => $request->TypeNickName,
                    'TenBietDanh' => $request->NameNickName
                ];
        } else {
            $id =  $json->ChiTietBanThan->BietDanh[count($json->ChiTietBanThan->BietDanh) - 1]->IDBietDanh;
            $id++;
            $json->ChiTietBanThan->BietDanh[count($json->ChiTietBanThan->BietDanh)] =
                (object)[
                    'IDBietDanh' => $id,
                    'IDQuyenRiengTu' => $request->PrivacyInputNickName == NULL ? $request->IDQuyenRiengTu : $request->PrivacyInputNickName,
                    'LoaiBietDanh' => $request->TypeNickName,
                    'TenBietDanh' => $request->NameNickName
                ];
        }
        $get = NULL;
        foreach ($json->ChiTietBanThan->BietDanh as $key => $value) {
            if ($value->IDBietDanh == $id)
                $get = $value;
        }
        DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
        gioithieu.IDTaiKhoan = ? ', [json_encode($json), $request->IDTaiKhoan]);
        return view('Component/About/Main/Nickname')->with(
            'value',
            $get
        )->with('idTaiKhoan', $request->IDTaiKhoan)
            ->with('idMain', $request->idMain)
            ->with('idView', $request->idView);
    }
    public function addFavoriteQuote(Request $request)
    {
        $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $request->IDTaiKhoan)
            ->get()[0]->JsonGioiThieu;
        $json = json_decode($json);
        $id = "";
        if (count($json->ChiTietBanThan->TrichDanYeuThich) == 0) {
            $id = "10000";
            $json->ChiTietBanThan->TrichDanYeuThich[0] =
                (object)[
                    'IDTrichDanYeuThich' => $id,
                    'IDQuyenRiengTu' => $request->PrivacyInputFavoriteQuote == NULL ? $request->IDQuyenRiengTu : $request->PrivacyInputFavoriteQuote,
                    'TenTrichDanYeuThich' => $request->InfoFavoriteQuote,
                ];
        } else {
            $id =  $json->ChiTietBanThan->TrichDanYeuThich[count($json->ChiTietBanThan->TrichDanYeuThich) - 1]->IDTrichDanYeuThich;
            $id++;
            $json->ChiTietBanThan->TrichDanYeuThich[0] =
                (object)[
                    'IDTrichDanYeuThich' => $id,
                    'IDQuyenRiengTu' => $request->PrivacyInputFavoriteQuote == NULL ? $request->IDQuyenRiengTu : $request->PrivacyInputFavoriteQuote,
                    'TenTrichDanYeuThich' => $request->InfoFavoriteQuote,
                ];
        }
        $get = NULL;
        foreach ($json->ChiTietBanThan->TrichDanYeuThich as $key => $value) {
            if ($value->IDTrichDanYeuThich == $id)
                $get = $value;
        }
        DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
        gioithieu.IDTaiKhoan = ? ', [json_encode($json), $request->IDTaiKhoan]);
        return view('Component/About/Main/FavoriteQuote')->with(
            'value',
            $get
        )->with('idTaiKhoan', $request->IDTaiKhoan)
            ->with('idMain', $request->idMain)
            ->with('idView', $request->idView);
    }
    public function addMemberFamily(Request $request)
    {
        $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $request->IDTaiKhoan)
            ->get()[0]->JsonGioiThieu;
        $json = json_decode($json);
        $id = "";
        $mem = Taikhoan::where('taikhoan.IDTaiKhoan', '=', $request->IDMemberFamily)->get()[0];
        if (count($json->GiaDinhVaCacMoiQuanHe->ThanhVienGiaDinh) == 0) {
            $id = "10000";
            $json->GiaDinhVaCacMoiQuanHe->ThanhVienGiaDinh[0] =
                (object)[
                    'IDThanhVienGiaDinh' => $id,
                    'IDQuyenRiengTu' => $request->PrivacyInputMemberFamily == NULL ?
                        $request->IDQuyenRiengTu : $request->PrivacyInputMemberFamily,
                    'Ho' => $mem->Ho,
                    'Ten' => $mem->Ten,
                    'AnhDaiDien' => $mem->AnhDaiDien,
                    'MoiQuanHe' => $request->IDRelationShipFamily,
                    'TinhTrang' => 'Đang chờ'
                ];
        } else {
            $id =  $json->GiaDinhVaCacMoiQuanHe->ThanhVienGiaDinh[count($json->GiaDinhVaCacMoiQuanHe->ThanhVienGiaDinh) - 1]->IDThanhVienGiaDinh;
            $id++;
            $json->GiaDinhVaCacMoiQuanHe->ThanhVienGiaDinh[count($json->GiaDinhVaCacMoiQuanHe->ThanhVienGiaDinh)] =
                (object)[
                    'IDThanhVienGiaDinh' => $id,
                    'IDQuyenRiengTu' => $request->PrivacyInputMemberFamily == NULL ?
                        $request->IDQuyenRiengTu : $request->PrivacyInputMemberFamily,
                    'Ho' => $mem->Ho,
                    'Ten' => $mem->Ten,
                    'AnhDaiDien' => $mem->AnhDaiDien,
                    'MoiQuanHe' => $request->IDRelationShipFamily,
                    'TinhTrang' => 'Đang chờ'
                ];
        }
        $get = NULL;
        foreach ($json->GiaDinhVaCacMoiQuanHe->ThanhVienGiaDinh as $key => $value) {
            if ($value->IDThanhVienGiaDinh == $id)
                $get = $value;
        }
        DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
        gioithieu.IDTaiKhoan = ? ', [json_encode($json), $request->IDTaiKhoan]);
        return view('Component/About/Main/MemberFamily')->with(
            'value',
            $get
        )->with('idTaiKhoan', $request->IDTaiKhoan)
            ->with('idMain', $request->idMain)
            ->with('idView', $request->idView);
    }
}
