<?php

namespace App\Process;

use App\Models\Congty;
use App\Models\Diachi;
use App\Models\Truonghoc;
use Illuminate\Database\Eloquent\Model;

class DataProcessFour extends Model
{
    public static function checkPlaceWork($jsonGioiThieu)
    {
        return count($jsonGioiThieu->CongViecHocVan->CongViec) == 0 ? 0 : 1;
    }
    public static function checkSchool($jsonGioiThieu)
    {
        return 0;
    }
    public static function checkPlaceLived($jsonGioiThieu)
    {
        return count($jsonGioiThieu->CongViecHocVan->CongViec) == 0 ? 0 : 1;
    }
    public static function getCompanies($value)
    {
        return Congty::whereRaw("congty.TenCongTy LIKE '%" . $value . "%' OR 
        trang.TenTrang LIKE '%" . $value . "%' ")
            ->take(30)->skip(0)
            ->leftjoin('trang', 'congty.IDTrang', 'trang.IDTrang')
            ->get();
    }
    public static function getCityAndTown($value)
    {
        return Diachi::whereRaw("diachi.TenDiaChi LIKE '%" . $value . "%' OR 
        trang.TenTrang LIKE '%" . $value . "%' ")
            ->take(30)->skip(0)
            ->leftjoin('trang', 'diachi.IDTrang', 'trang.IDTrang')
            ->get();
    }
    public static function getSchool($value)
    {
        return Truonghoc::whereRaw("truonghoc.TenTruongHoc LIKE '%" . $value . "%' OR 
        trang.TenTrang LIKE '%" . $value . "%' ")
            ->take(30)->skip(0)
            ->leftjoin('trang', 'truonghoc.IDTrang', 'trang.IDTrang')
            ->get();
    }
    public static function getTypeSchool($value)
    {
        $array = [
            0 => (object)[
                'LoaiTruong' => 'Cao Đẳng'
            ],
            1 => (object)[
                'LoaiTruong' => 'Đại Học',
            ],
            2 => (object) [
                'LoaiTruong' => 'Trung Cấp Nghề',
            ],
            3 => (object)[
                'LoaiTruong' => 'Trung Học Phổ Thông',
            ],
            4 => (object)[
                'LoaiTruong' => 'Trung Học Cơ Sở',
            ],
            5 => (object)[
                'LoaiTruong' => 'Tiểu Học',
            ],
            6 => (object)[
                'LoaiTruong' => 'Mẫu Giáo',
            ]
        ];
        $num = 0;
        $newArray = array();
        foreach ($array as $key => $values) {
            if (str_contains(strtolower($values->LoaiTruong), strtolower($value))) {
                $newArray[$num] = $values;
                $num++;
            }
        }
        return $newArray;
    }
}
