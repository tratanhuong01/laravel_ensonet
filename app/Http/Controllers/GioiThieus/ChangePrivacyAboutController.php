<?php

namespace App\Http\Controllers\GioiThieus;

use App\Http\Controllers\Controller;
use App\Models\Gioithieu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChangePrivacyAboutController extends Controller
{
    public function changeView(Request $request)
    {
        return view('Component/GioiThieu/Modal/QuyenRiengTu');
    }
    public function change(Request $request)
    {
        $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $request->IDTaiKhoan)->get()[0]->JsonGioiThieu;
        $json = json_decode($json);
        switch ($request->TypeChange) {
            case 'changePlaceWork':
                foreach ($json->CongViecHocVan->CongViec as $key => $value) {
                    if ($value->IDCongViec == $request->ID) {
                        $json->CongViecHocVan->CongViec[$key]->IDQuyenRiengTu = $request->IDQuyenRiengTu;
                        DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
                        gioithieu.IDTaiKhoan = ? ', [json_encode($json), $request->IDTaiKhoan]);
                        return view('Component/GioiThieu/Modal/QuyenRiengTuMini')
                            ->with('idQuyenRiengTu', $request->IDQuyenRiengTu)
                            ->with('typeChange', $request->TypeChange)
                            ->with('id', $request->ID);
                    }
                }
                break;
            case 'changeSchool':
                foreach ($json->CongViecHocVan->HocVan as $key => $value) {
                    if ($value->IDHocVan == $request->ID) {
                        $json->CongViecHocVan->HocVan[$key]->IDQuyenRiengTu = $request->IDQuyenRiengTu;
                        DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
                                gioithieu.IDTaiKhoan = ? ', [json_encode($json), $request->IDTaiKhoan]);
                        return view('Component/GioiThieu/Modal/QuyenRiengTuMini')
                            ->with('idQuyenRiengTu', $request->IDQuyenRiengTu)
                            ->with('typeChange', $request->TypeChange)
                            ->with('id', $request->ID);
                    }
                }
                break;
            case 'changePlaceLiveCurrent':
                foreach ($json->NoiTungSong->NoiOHienTai as $key => $value) {
                    if ($value->IDNoiOHienTai == $request->ID) {
                        $json->NoiTungSong->NoiOHienTai[$key]->IDQuyenRiengTu = $request->IDQuyenRiengTu;
                        DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
                                        gioithieu.IDTaiKhoan = ? ', [json_encode($json), $request->IDTaiKhoan]);
                        return view('Component/GioiThieu/Modal/QuyenRiengTuMini')
                            ->with('idQuyenRiengTu', $request->IDQuyenRiengTu)
                            ->with('typeChange', $request->TypeChange)
                            ->with('id', $request->ID);
                    }
                }
                break;
            case 'changePlaceLived':
                foreach ($json->NoiTungSong->NoiTungSong as $key => $value) {
                    if ($value->IDNoiTungSong == $request->ID) {
                        $json->NoiTungSong->NoiTungSong[$key]->IDQuyenRiengTu = $request->IDQuyenRiengTu;
                        DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
                                            gioithieu.IDTaiKhoan = ? ', [json_encode($json), $request->IDTaiKhoan]);
                        return view('Component/GioiThieu/Modal/QuyenRiengTuMini')
                            ->with('idQuyenRiengTu', $request->IDQuyenRiengTu)
                            ->with('typeChange', $request->TypeChange)
                            ->with('id', $request->ID);
                    }
                }
                break;
            case 'changeHomeTown':
                foreach ($json->NoiTungSong->QueQuan as $key => $value) {
                    if ($value->IDQueQuan == $request->ID) {
                        $json->NoiTungSong->QueQuan[$key]->IDQuyenRiengTu = $request->IDQuyenRiengTu;
                        DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
                                        gioithieu.IDTaiKhoan = ? ', [json_encode($json), $request->IDTaiKhoan]);
                        return view('Component/GioiThieu/Modal/QuyenRiengTuMini')
                            ->with('idQuyenRiengTu', $request->IDQuyenRiengTu)
                            ->with('typeChange', $request->TypeChange)
                            ->with('id', $request->ID);
                    }
                }
                break;
            case 'changeMarriage':
                if ($json->GiaDinhVaCacMoiQuanHe->HonNhan->IDHonNhan == $request->ID) {
                    $json->GiaDinhVaCacMoiQuanHe->HonNhan->IDQuyenRiengTu = $request->IDQuyenRiengTu;
                    DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
                                            gioithieu.IDTaiKhoan = ? ', [json_encode($json), $request->IDTaiKhoan]);
                    return view('Component/GioiThieu/Modal/QuyenRiengTuMini')
                        ->with('idQuyenRiengTu', $request->IDQuyenRiengTu)
                        ->with('typeChange', $request->TypeChange)
                        ->with('id', $request->ID);
                }
                break;
            case 'changeWayReadName':
                if ($json->ChiTietBanThan->PhatAm[0]->IDPhatAm == $request->ID) {
                    $json->ChiTietBanThan->PhatAm[0]->IDQuyenRiengTu = $request->IDQuyenRiengTu;
                    DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
                                                    gioithieu.IDTaiKhoan = ? ', [json_encode($json), $request->IDTaiKhoan]);
                    return view('Component/GioiThieu/Modal/QuyenRiengTuMini')
                        ->with('idQuyenRiengTu', $request->IDQuyenRiengTu)
                        ->with('typeChange', $request->TypeChange)
                        ->with('id', $request->ID);
                }
                break;
            case 'changeNickName':
                foreach ($json->ChiTietBanThan->BietDanh as $key => $value) {
                    if ($value->IDBietDanh == $request->ID) {
                        $json->ChiTietBanThan->BietDanh[$key]->IDQuyenRiengTu = $request->IDQuyenRiengTu;
                        DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
                                                    gioithieu.IDTaiKhoan = ? ', [json_encode($json), $request->IDTaiKhoan]);
                        return view('Component/GioiThieu/Modal/QuyenRiengTuMini')
                            ->with('idQuyenRiengTu', $request->IDQuyenRiengTu)
                            ->with('typeChange', $request->TypeChange)
                            ->with('id', $request->ID);
                    }
                }
                break;
            case 'changeIntroYourSelf':
                if ($json->ChiTietBanThan->GioiThieu[0]->IDGioiThieu == $request->ID) {
                    $json->ChiTietBanThan->BietDanh[0]->IDQuyenRiengTu = $request->IDQuyenRiengTu;
                    DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
                                                        gioithieu.IDTaiKhoan = ? ', [json_encode($json), $request->IDTaiKhoan]);
                    return view('Component/GioiThieu/Modal/QuyenRiengTuMini')
                        ->with('idQuyenRiengTu', $request->IDQuyenRiengTu)
                        ->with('typeChange', $request->TypeChange)
                        ->with('id', $request->ID);
                }
                break;
            case 'changeFavoriteQuote':
                if ($json->ChiTietBanThan->TrichDanYeuThich[0]->IDTrichDanYeuThich == $request->ID) {
                    $json->ChiTietBanThan->TrichDanYeuThich[0]->IDQuyenRiengTu = $request->IDQuyenRiengTu;
                    DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
                                                            gioithieu.IDTaiKhoan = ? ', [json_encode($json), $request->IDTaiKhoan]);
                    return view('Component/GioiThieu/Modal/QuyenRiengTuMini')
                        ->with('idQuyenRiengTu', $request->IDQuyenRiengTu)
                        ->with('typeChange', $request->TypeChange)
                        ->with('id', $request->ID);
                }
                break;
            case 'changeNumberPhone':
                if ($json->ThongTinCoBanVaLienHe->SoDienThoai->IDSoDienThoai == $request->ID) {
                    $json->ThongTinCoBanVaLienHe->SoDienThoai->IDQuyenRiengTu = $request->IDQuyenRiengTu;
                    DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
                                                                gioithieu.IDTaiKhoan = ? ', [json_encode($json), $request->IDTaiKhoan]);
                    return view('Component/GioiThieu/Modal/QuyenRiengTuMini')
                        ->with('idQuyenRiengTu', $request->IDQuyenRiengTu)
                        ->with('typeChange', $request->TypeChange)
                        ->with('id', $request->ID);
                }
                break;
            case 'changeEmail':
                if ($json->ThongTinCoBanVaLienHe->Email->IDEmail == $request->ID) {
                    $json->ThongTinCoBanVaLienHe->Email->IDQuyenRiengTu = $request->IDQuyenRiengTu;
                    DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
                                                                    gioithieu.IDTaiKhoan = ? ', [json_encode($json), $request->IDTaiKhoan]);
                    return view('Component/GioiThieu/Modal/QuyenRiengTuMini')
                        ->with('idQuyenRiengTu', $request->IDQuyenRiengTu)
                        ->with('typeChange', $request->TypeChange)
                        ->with('id', $request->ID);
                }
                break;
            case 'changeSex':
                if ($json->ThongTinCoBanVaLienHe->GioiTinh->IDGioiTinh == $request->ID) {
                    $json->ThongTinCoBanVaLienHe->GioiTinh->IDQuyenRiengTu = $request->IDQuyenRiengTu;
                    DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
                                                                        gioithieu.IDTaiKhoan = ? ', [json_encode($json), $request->IDTaiKhoan]);
                    return view('Component/GioiThieu/Modal/QuyenRiengTuMini')
                        ->with('idQuyenRiengTu', $request->IDQuyenRiengTu)
                        ->with('typeChange', $request->TypeChange)
                        ->with('id', $request->ID);
                }
                break;
            case 'changeDayMonth':
                $json->ThongTinCoBanVaLienHe->NgaySinh->Ngay->IDQuyenRiengTu = $request->IDQuyenRiengTu;
                $json->ThongTinCoBanVaLienHe->NgaySinh->Thang->IDQuyenRiengTu = $request->IDQuyenRiengTu;
                DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
                                                                        gioithieu.IDTaiKhoan = ? ', [json_encode($json), $request->IDTaiKhoan]);
                return view('Component/GioiThieu/Modal/QuyenRiengTuMini')
                    ->with('idQuyenRiengTu', $request->IDQuyenRiengTu)
                    ->with('typeChange', $request->TypeChange)
                    ->with('id', $request->ID);
                break;
            case 'changeYear':
                $json->ThongTinCoBanVaLienHe->NgaySinh->Nam->IDQuyenRiengTu = $request->IDQuyenRiengTu;
                DB::update('UPDATE gioithieu SET gioithieu.JsonGioiThieu = ? WHERE 
                                                                            gioithieu.IDTaiKhoan = ? ', [json_encode($json), $request->IDTaiKhoan]);
                return view('Component/GioiThieu/Modal/QuyenRiengTuMini')
                    ->with('idQuyenRiengTu', $request->IDQuyenRiengTu)
                    ->with('typeChange', $request->TypeChange)
                    ->with('id', $request->ID);
                break;
            default:
                # code...
                break;
        }
    }
}
