<?php

namespace App\Process;

use App\Models\Amthanh;
use App\Models\Baidang;
use App\Models\Congty;
use App\Models\Diachi;
use App\Models\Functions;
use App\Models\Gioithieu;
use App\Models\Hinhanh;
use App\Models\Taikhoan;
use App\Models\Truonghoc;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DataProcessFour extends Model
{
    public static function checkPlaceWork($jsonGioiThieu)
    {
        return count($jsonGioiThieu->CongViecHocVan->CongViec) == 0 ? 0 : 1;
    }
    public static function checkSchool($jsonGioiThieu)
    {
        return count($jsonGioiThieu->CongViecHocVan->HocVan) == 0 ? 0 : 1;
    }
    public static function checkPlaceLiveCurrent($jsonGioiThieu)
    {
        return count($jsonGioiThieu->NoiTungSong->NoiOHienTai) == 0 ? 0 : 1;
    }
    public static function checkHomeTown($jsonGioiThieu)
    {
        return count($jsonGioiThieu->NoiTungSong->QueQuan) == 0 ? 0 : 1;
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
    public static function getTypeSchoolByType($dt, $idTaiKhoan)
    {
        $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $idTaiKhoan)->get()[0]->JsonGioiThieu;
        $json = json_decode($json);
        $new = array();
        $num = 0;
        foreach ($json->CongViecHocVan->HocVan as $key => $value) {
            if ($value->LoaiTruong == $dt) {
                $new[$num] =  $value;
                $num++;
            }
        }
        return $new;
    }
    public static function getNickName($value)
    {
        $array = [
            0 => (object)[
                'LoaiBietDanh' => 'Tên thời con gái'
            ],
            1 => (object)[
                'LoaiBietDanh' => 'Cách viết khác',
            ],
            2 => (object) [
                'LoaiBietDanh' => 'Tên sau khi kết hôn',
            ],
            3 => (object)[
                'LoaiBietDanh' => 'Họ và tên bố',
            ],
            4 => (object)[
                'LoaiBietDanh' => 'Tên khai sinh',
            ],
            5 => (object)[
                'LoaiBietDanh' => 'Tên cũ',
            ],
            6 => (object)[
                'LoaiBietDanh' => 'Chức danh',
            ],
            7 => (object)[
                'LoaiBietDanh' => 'Khác',
            ]
        ];
        $num = 0;
        $newArray = array();
        foreach ($array as $key => $values) {
            if (str_contains(strtolower($values->LoaiBietDanh), strtolower($value))) {
                $newArray[$num] = $values;
                $num++;
            }
        }
        return $newArray;
    }
    public static function getSex($value)
    {
        $array = [
            0 => (object)[
                'TenGioiTinh' => 'Nam'
            ],
            1 => (object)[
                'TenGioiTinh' => 'Nữ',
            ],
            2 => (object) [
                'TenGioiTinh' => 'Khác',
            ]
        ];
        $num = 0;
        $newArray = array();
        foreach ($array as $key => $values) {
            if (str_contains(strtolower($values->TenGioiTinh), strtolower($value))) {
                $newArray[$num] = $values;
                $num++;
            }
        }
        return $newArray;
    }
    public static function getMaritalStatus($value)
    {
        $array = [
            0 => (object)[
                'TinhTrang' => 'Độc Thân'
            ],
            1 => (object)[
                'TinhTrang' => 'Hẹn Hò',
            ],
            2 => (object) [
                'TinhTrang' => 'Đã Đính Hôn',
            ],
            3 => (object)[
                'TinhTrang' => 'Đã Kết Hôn'
            ],
            4 => (object)[
                'TinhTrang' => 'Kết Hôn Đồng Giới',
            ],
            5 => (object) [
                'TinhTrang' => 'Chung Sống',
            ],
            6 => (object)[
                'TinhTrang' => 'Tìm Hiểu'
            ],
            7 => (object)[
                'TinhTrang' => 'Có Một Mối Quan Hệ Phức Tạp',
            ],
            8 => (object) [
                'TinhTrang' => 'Đã Ly Thân',
            ],
            9 => (object) [
                'TinhTrang' => 'Đã Ly Hôn',
            ],
            10 => (object) [
                'TinhTrang' => 'Góa',
            ]
        ];
        $num = 0;
        $newArray = array();
        foreach ($array as $key => $values) {
            if (str_contains(strtolower($values->TinhTrang), strtolower($value))) {
                $newArray[$num] = $values;
                $num++;
            }
        }
        return $newArray;
    }
    public static function getRelationShip($value)
    {
        $array = [
            0 => (object)[
                'MoiQuanHe' => 'Bố'
            ],
            1 => (object)[
                'MoiQuanHe' => 'Mẹ',
            ],
            2 => (object) [
                'MoiQuanHe' => 'Con gái',
            ],
            3 => (object)[
                'MoiQuanHe' => 'Con trai'
            ],
            4 => (object)[
                'MoiQuanHe' => 'Cháu gái',
            ],
            5 => (object) [
                'MoiQuanHe' => 'Cháu trai',
            ],
            6 => (object)[
                'MoiQuanHe' => 'Em gái'
            ],
            7 => (object)[
                'MoiQuanHe' => 'Chị gái',
            ],
            8 => (object) [
                'MoiQuanHe' => 'Em trai',
            ],
            9 => (object) [
                'MoiQuanHe' => 'Anh trai',
            ],
            10 => (object) [
                'MoiQuanHe' => 'Bà nội',
            ],
            11 => (object)[
                'MoiQuanHe' => 'Bà ngoại',
            ],
            12 => (object) [
                'MoiQuanHe' => 'Ông nội',
            ],
            13 => (object) [
                'MoiQuanHe' => 'Ông ngoại',
            ],
            14 => (object) [
                'MoiQuanHe' => 'Cháu gái (Cháu ngoại)',
            ],
            15 => (object) [
                'MoiQuanHe' => 'Cháu gái (Cháu nội)',
            ],
            16 => (object) [
                'MoiQuanHe' => 'Cháu trai (Cháu ngoại)',
            ],
            17 => (object) [
                'MoiQuanHe' => 'Cháu trai (Cháu ngoại)',
            ],
            18 => (object) [
                'MoiQuanHe' => 'Bác (Chị của bố)',
            ],
            19 => (object) [
                'MoiQuanHe' => 'Dì (Em của mẹ)',
            ],
            20 => (object) [
                'MoiQuanHe' => 'Cô (Em của bố)',
            ],
            21 => (object) [
                'MoiQuanHe' => 'Bác (Anh của bố)',
            ],
            22 => (object) [
                'MoiQuanHe' => 'Chú (Em của bố)',
            ]
        ];
        $num = 0;
        $newArray = array();
        foreach ($array as $key => $values) {
            if (str_contains(strtolower($values->MoiQuanHe), strtolower($value))) {
                $newArray[$num] = $values;
                $num++;
            }
        }
        return $newArray;
    }
    public static function createColor()
    {
        $color = [
            'WHITE' => 'white',
            '#FFBF00' => '#FFBF00',
            '#9966CC' => '#9966CC',
            '#7FFFD4' => '#7FFFD4',
            '#007FFF' => '#007FFF',
            '#F5F5DC' => '#F5F5DC',
            '#3D2B1F' => '#3D2B1F',
            '#000000' => '#000000',
            '#0000FF' => '#0000FF',
            '#964B00' => '#964B00',
            '#F0DC82' => '#F0DC82',
            '#CC5500' => '#CC5500',
            '#C41E3A' => '#C41E3A',
            '#960018' => '#960018',
            '#ACE1AF' => '#ACE1AF',
            '#DE3163' => '#DE3163',
            '#007BA7' => '#007BA7',
            '#7FFF00' => '#7FFF00',
            '#0047AB' => '#0047AB',
            '#B87333' => '#B87333',
            '#FF7F50' => '#FF7F50',
            '#FFFDD0' => '#FFFDD0',
            '#DC143C' => '#DC143C',
            '#00FFFF' => '#00FFFF',
            '#50C878' => '#50C878',
            '#FFD700' => '#FFD700',
            '#808080' => '#808080',
            '#00FF00' => '#00FF00',
            '#4B0082' => '#4B0082',
            '#C3B091' => '#C3B091',
            '#E6E6FA' => '#E6E6FA',
            '#CCFF00' => '#CCFF00',
            '#FF00FF' => '#FF00FF',
            '#800000' => '#800000',
            '#993366' => '#993366',
            '#c8a2c8' => '#c8a2c8',
            '#CC7722' => '#CC7722',
            '#FF7F00' => '#FF7F00',
            '#FFFF00' => '#FFFF00',
            '#40826D' => '#40826D',
            '#FF4D00' => '#FF4D00',
            '#30D5C8' => '#30D5C8',
            '#008080' => '#008080',
        ];
        return $color;
    }
    public static function sortImageByTagOfUser($idTaiKhoan)
    {
        $friends = Functions::getListFriendsUser($idTaiKhoan);
        $post = array();
        $num = 0;
        foreach ($friends as $key => $value) {
            $posts = Baidang::where('baidang.IDTaiKhoan', '=', $value[0]->IDTaiKhoan)
                ->join('hinhanh', 'baidang.IDBaiDang', 'hinhanh.IDBaiDang')->get();
            foreach ($posts as $keys => $values) {
                $arrTag = explode('&', $values->GanThe);
                for ($i = 0; $i < count($arrTag) -  1; $i++) {
                    if ($arrTag[$i] == $idTaiKhoan) {
                        $post[$num] = $values;
                        $num++;
                    }
                }
            }
        }
        $images = array();
        $num = 0;
        foreach ($post as $key => $value) {
            $image = Hinhanh::where('hinhanh.IDBaiDang', '=', $value->IDBaiDang)->get()[0];
            $images[$num] = $image;
        }
        return $images;
    }
    public static function sortImageByUser($idTaiKhoan, $index)
    {
        return DB::table('hinhanh')
            ->skip($index)->take(15)
            ->join('baidang', 'hinhanh.IDBaiDang', '=', 'baidang.IDBaiDang')
            ->join('taikhoan', 'baidang.IDTaiKhoan', '=', 'taikhoan.IDTaiKhoan')
            ->where('baidang.IDTaiKhoan', '=', $idTaiKhoan)
            ->orderByDesc('baidang.NgayDang')
            ->get();
    }
    public static function groupImage($idTaiKhoan)
    {
        $groupImage = DB::select('SELECT DISTINCT IDAlbumAnh FROM hinhanh WHERE 
        baidang.IDTaiKhoan = ? INNER JOIN baidang ON hinhanh.IDBaiDang = baidang.IDBaiDang ');
        $allImage = array();
        foreach ($groupImage as $key => $value) {
            $image = Hinhanh::where('hinhanh.IDAlbumAnh', '=', $value->IDAlbumAnh)->get();
            foreach ($image as $key => $value) {
                $allImage[$value->IDAlbumAnh][$key] = $value;
            }
        }
    }
    public static function getMusic()
    {
        return Amthanh::get();
    }
}
