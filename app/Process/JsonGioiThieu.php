<?php

use Illuminate\Database\Eloquent\Model;

class JsonGioiThieu extends Model
{
    public static function CongViec(
        $idCongViec,
        $idQuyenRiengTu,
        $duongDanImg,
        $congTy,
        $chucVu,
        $thanhPho,
        $namBatDau,
        $namKetThuc
    ) {
        return [
            'IDCongViec' => $idCongViec,
            'IDQuyenRiengTu' => $idQuyenRiengTu,
            'DuongDanImg' => $duongDanImg,
            'CongTy' => $congTy,
            'ChucVu' => $chucVu,
            'ThanhPho' => $thanhPho,
            'NamBatDau' => $namBatDau,
            'NamKetThuc' => $namKetThuc
        ];
    }
    public static function DaiHocCaoDang(
        $idDaiHocCaoDang,
        $idQuyenRiengTu,
        $idTruongHoc,
        $duongDanImg,
        $nganhHoc,
        $namBatDau,
        $namKetThuc,
        $loai
    ) {
        return [
            'IDDaiHocCaoDang' => $idDaiHocCaoDang,
            'IDQuyenRiengTu' => $idQuyenRiengTu,
            'IDTruongHoc' => $$idTruongHoc,
            'DuongDanImg' => $duongDanImg,
            'NganhHoc' => $nganhHoc,
            'NamBatDau' => $namBatDau,
            'NamKetThuc' => $namKetThuc,
            'Loai' => $loai
        ];
    }
    public static function TrungHocPhoThong(
        $idTrungHocPhoThong,
        $idQuyenRiengTu,
        $idTruongHoc,
        $duongDanImg,
        $namBatDau,
        $namKetThuc
    ) {
        return [
            'IDTrungHocPhoThong' => $idTrungHocPhoThong,
            'IDQuyenRiengTu' => $idQuyenRiengTu,
            'IDTruongHoc' => $idTruongHoc,
            'DuongDanImg' => $duongDanImg,
            'NamBatDau' => $namBatDau,
            'NamKetThuc' => $namKetThuc,
        ];
    }
    public static function TrungHocCoSo(
        $idTrungHocCoSo,
        $idQuyenRiengTu,
        $idTruongHoc,
        $duongDanImg,
        $namBatDau,
        $namKetThuc
    ) {
        return [
            'IDTrungHocCoSo' => $idTrungHocCoSo,
            'IDQuyenRiengTu' => $idQuyenRiengTu,
            'IDTruongHoc' => $idTruongHoc,
            'DuongDanImg' => $duongDanImg,
            'NamBatDau' => $namBatDau,
            'NamKetThuc' => $namKetThuc,
        ];
    }
    public static function TieuHoc(
        $idTieuHoc,
        $idQuyenRiengTu,
        $idTruongHoc,
        $duongDanImg,
        $namBatDau,
        $namKetThuc
    ) {
        return [
            'IDTieuHoc' => $idTieuHoc,
            'IDQuyenRiengTu' => $idQuyenRiengTu,
            'IDTruongHoc' => $idTruongHoc,
            'DuongDanImg' => $duongDanImg,
            'NamBatDau' => $namBatDau,
            'NamKetThuc' => $namKetThuc,
        ];
    }
    public static function NoiTungSong(
        $idNoiTungSong,
        $idQuyenRiengTu,
        $idDiaChi,
        $loaiNoiTungSong,
        $namBatDau,
        $namKetThuc
    ) {
        return [
            'IDNoiTungSong' => $idNoiTungSong,
            'IDQuyenRiengTu' => $idQuyenRiengTu,
            'IDDiaChi' => $idDiaChi,
            'LoaiNoiTungSong' => $loaiNoiTungSong,
            'NamBatDau' => $namBatDau,
            'NamKetThuc' => $namKetThuc
        ];
    }
    public static function ThanhVienGiaDinh(
        $idThanhVienGiaDinh,
        $idTaiKhoan,
        $idQuyenRiengTu,
        $tenQuanHe,
        $tinhTrang
    ) {
        return [
            'IDThanhVienGiaDinh' => $idThanhVienGiaDinh,
            'IDTaiKhoan' => $idTaiKhoan,
            'IDQuyenRiengTu' => $idQuyenRiengTu,
            'TenQuanHe' => $tenQuanHe,
            'TinhTrang' => $tinhTrang
        ];
    }
    public static function GioiThieu(
        $idQuyenRiengTu,
        $gioiThieu
    ) {
        return [
            'IDQuyenRiengTu' => $idQuyenRiengTu,
            'GioiThieu' => $gioiThieu
        ];
    }
    public static function PhatAm(
        $idQuyenRiengTu,
        $tenPhatAm
    ) {
        return [
            'IDQuyenRiengTu' => $idQuyenRiengTu,
            'TenPhatAm' => $tenPhatAm
        ];
    }
    public static function TenKhac(
        $idTenKhac,
        $idQuyenRiengTu,
        $tenKhac,
        $loaiTenKhac
    ) {
        return [
            'IDTenKhac' => $idTenKhac,
            'IDQuyenRiengTu' => $idQuyenRiengTu,
            'TenKhac' => $tenKhac,
            'LoaiTenKhac' => $loaiTenKhac
        ];
    }
    public static function TrichDanYeuThich(
        $idQuyenRiengTu,
        $noiDungTrichDan
    ) {
        return [
            'IDQuyenRiengTu' => $idQuyenRiengTu,
            'NoiDungTrichDan' => $noiDungTrichDan
        ];
    }
}
