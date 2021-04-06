<?php

namespace App\Process;

use Illuminate\Database\Eloquent\Model;

class JsonGioiThieu extends Model
{
    public static function get($user)
    {
        $json = [
            'ThongTinCoBanVaLienHe' => [
                'NgaySinh' => [
                    'Ngay' => [
                        'IDNgay' => '10000',
                        'Ngay' => explode('-', $user->NgaySinh)[2],
                        'IDQuyenRiengTu' => 'CHIBANBE'
                    ],
                    'Thang' => [
                        'IDThang' => '10000',
                        'Thang' => explode('-', $user->NgaySinh)[1],
                        'IDQuyenRiengTu' => 'CHIBANBE'
                    ],
                    'Nam' => [
                        'IDNam' => '10000',
                        'Nam' => explode('-', $user->NgaySinh)[0],
                        'IDQuyenRiengTu' => 'CHIBANBE'
                    ]
                ],
                'DiaChi' => [],
                'Email' => [
                    'IDEmail' => '10000',
                    'Email' => $user->Email,
                    'IDQuyenRiengTu' => 'CHIBANBE'
                ],
                'GioiTinh' => [
                    'IDGioiTinh' => '10000',
                    'IDQuyenRiengTu' => 'CHIBANBE',
                    'TenGioiTinh' => $user->GioiTinh
                ],
                'SoDienThoai' => [
                    'IDSoDienThoai' => '10000',
                    'SoDienThoai' => $user->SoDienThoai,
                    'IDQuyenRiengTu' => 'CHIBANBE'
                ],
            ],
            'CongViecHocVan' => [
                'CongViec' => [],
                'HocVan' => [],
            ],
            'NoiTungSong' => [
                'QueQuan' => [],
                'NoiOHienTai' => [],
                'NoiTungSong' => []
            ],
            'GiaDinhVaCacMoiQuanHe' => [
                'HonNhan' => [
                    'IDHonNhan' => '10000',
                    'IDQuyenRiengTu' => 'CHIBANBE',
                    'TinhTrang' => 'Độc Thân'
                ],
                'ThanhVienGiaDinh' => []
            ],
            'ChiTietBanThan' => [
                'GioiThieu' => [],
                'PhatAm' => [],
                'BietDanh' => [],
                'TrichDanYeuThich' => []
            ]
        ];
        return $json;
    }
    public static function CongViec()
    {
        return [
            'IDCongViec' => '',
            'IDQuyenRiengTu' => '',
            'DuongDanImg' => '',
            'IDCongTy' => '',
            'TenCongTy' => '',
            'ChucVu' => '',
            'IDDiaChi' => '',
            'TenDiaChi' => '',
            'NamBatDau' => '',
            'NamKetThuc' => ''
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
