<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Camxuc;
use Illuminate\Support\Facades\Session;

class Functions extends Model
{
    public static function countPost($idTaiKhoan)
    {
        if (Session::get('user')[0]->IDTaiKhoan == $idTaiKhoan)
            return DB::table('baidang')->where('baidang.IDTaiKhoan', '=', $idTaiKhoan)
                ->orderBy('NgayDang', 'desc')->get();
        else
            return DB::table('baidang')->where('baidang.IDTaiKhoan', '=', $idTaiKhoan)
                ->where('IDQuyenRiengTu', '!=', 'RIENGTU')
                ->orderBy('NgayDang', 'desc')->get();
    }
    public static function getPost($post)
    {
        return DB::table('baidang')->select('*', 'baidang.IDBaiDang')
            ->leftjoin('hinhanh', 'baidang.IDBaiDang', '=', 'hinhanh.IDBaiDang')
            ->join('taikhoan', 'baidang.IDTaiKhoan', '=', 'taikhoan.IDTaiKhoan')
            ->where('taikhoan.IDTaiKhoan', '=', $post->IDTaiKhoan)
            ->where('baidang.IDBaiDang', '=', $post->IDBaiDang)
            ->orderBy('NgayDang', 'desc')
            ->get();
    }
    public static function getListFriendsUser($idTaiKhoan)
    {
        $listFriend = DB::table('moiquanhe')
            ->where('moiquanhe.IDTaiKhoan', '=', $idTaiKhoan)
            ->where('moiquanhe.TinhTrang', '=', '3')
            ->orderBy('moiquanhe.NgayChapNhan', 'desc')
            ->get();
        $newListFriend = array();
        for ($i = 0; $i < sizeof($listFriend); $i++) {
            $newListFriend[$i] = DB::table('taikhoan')->where('taikhoan.IDTaiKhoan', '=', $listFriend[$i]->IDBanBe)->get();;
        }
        return $newListFriend;
    }
    public static function getMutualFriend($idBanBe, $idTaiKhoan)
    {
        $listFriend = DB::table('moiquanhe')
            ->where('moiquanhe.IDTaiKhoan', '=', $idBanBe)
            ->where('moiquanhe.TinhTrang', '=', '3')
            ->orderBy('moiquanhe.NgayChapNhan', 'desc')
            ->get();
        $newListFriend = array();
        $c = 0;
        if (sizeof($listFriend) <= 0) {
        } else {
            for ($i = 0; $i < sizeof($listFriend); $i++) {
                $data = DB::table('moiquanhe')
                    ->where('moiquanhe.IDTaiKhoan', '=', $listFriend[$i]->IDBanBe)
                    ->where('moiquanhe.IDBanBe', '=', $idTaiKhoan)
                    ->where('moiquanhe.IDTaiKhoan', '!=', $idTaiKhoan)
                    ->where('moiquanhe.TinhTrang', '=', '3')
                    ->orderBy('NgayChapNhan', 'desc')
                    ->get();
                if (count($data) == 0) {
                } else {
                    $newListFriend[$c] = $data;
                    $c++;
                }
            }
        }
        return $newListFriend;
    }
    public static function getListRequestFriendNew($idTaiKhoan)
    {
        $listRequest = DB::table('moiquanhe')->skip(0)->take(3)
            ->where('moiquanhe.IDTaiKhoan', '=', $idTaiKhoan)
            ->where('moiquanhe.TinhTrang', '=', '2')
            ->orderBy('NgayGui', 'desc')
            ->get();
        $newListRequest = array();
        if (count($listRequest) > 0)
            for ($i = 0; $i < count($listRequest); $i++) {
                $newListRequest[$i] = DB::table('taikhoan')
                    ->where('taikhoan.IDTaiKhoan', '=', $listRequest[$i]->IDBanBe)
                    ->get();
            }
        return $newListRequest;
    }
    public static function getDateTimeFriend($idTaiKhoan, $idBanBe, $tinhTrang, $loaiNgay)
    {
        return DB::table('moiquanhe')
            ->where('moiquanhe.IDTaiKhoan', '=', $idTaiKhoan)
            ->where('moiquanhe.IDBanBe', '=', $idBanBe)
            ->where('moiquanhe.TinhTrang', '=', $tinhTrang)
            ->get()[0]->$loaiNgay;
    }
    public static function checkIsFeel($idTaiKhoan, $idBaiDang)
    {
        $data = Camxuc::where('camxuc.IDTaiKhoan', '=', $idTaiKhoan)
            ->where('camxuc.IDBaiDang', '=', $idBaiDang)
            ->get();
        if (count($data) == 0)
            return '<span class="text-xl" style="color: transparent;text-shadow: 0 0 0 gray;">👍</span> &nbsp; 
        <span class="font-bold">Thích</span>';
        else return Functions::getFeel($data[0]->LoaiCamXuc);
    }
    public static function getUserFeel($idBaiDang)
    {
        return Camxuc::where('camxuc.IDBaiDang', '=', $idBaiDang)
            ->get();
    }
    public static function getFeel($i)
    {
        switch (explode('@', $i)[0]) {
            case '0':
                return '<span class="text-xl">👍</span> &nbsp; 
            <span class="font-bold" style="color:orange;">Thích</span>';
                break;
            case '1':
                return '<span class="text-xl">❤️</span> &nbsp; 
                <span class="font-bold" style="color:#F2314C;">Yêu thích</span>';
                break;
            case '2':
                return '<span class="text-xl">😆</span> &nbsp; 
                <span class="font-bold" style="color:orange;">Haha</span>';
                break;
            case '3':
                return '<span class="text-xl">😥</span> &nbsp; 
                    <span class="font-bold" style="color:orange;">Buồn</span>';
                break;
            case '4':
                return '<span class="text-xl">😮</span> &nbsp; 
                    <span class="font-bold" style="color:orange;">Wow</span>';
                break;
            case '5':
                return '<span class="text-xl">😡</span> &nbsp; 
                        <span class="font-bold" style="color:#EB7F27;">Phẩn nộ</span>';
                break;
        }
    }
    public static function getFeelMain($i)
    {
        switch (explode('@', $i)[0]) {
            case '0':
                return '👍 ';
                break;
            case '1':
                return '❤️ ';
                break;
            case '2':
                return '😆 ';
                break;
            case '3':
                return '😥 ';
                break;
            case '4':
                return '😮 ';
                break;
            case '5':
                return '😡 ';
                break;
        }
    }
    public static function checkGetStringFeel($idBaiDang)
    {
        $userFeel = Functions::getUserFeel($idBaiDang);
        for ($i = 0; $i < count($userFeel); $i++) {
            for ($i = 1; $i < count($userFeel) - 1; $i++) {
            }
        }
    }
    public static function getStringFeel($idBaiDang)
    {
        $userFeel = Functions::getUserFeel($idBaiDang);
        if (count($userFeel) == 0) {
        } else if (count($userFeel) == 1) {
            $loaiCamXuc = explode('@', $userFeel[0]->LoaiCamXuc)[0];
            $userFeel = Taikhoan::where('taikhoan.IDTaiKhoan', '=', $userFeel[0]->IDTaiKhoan)->get();
            switch ($loaiCamXuc) {
                case '0':
                    return '👍 ' . '<span class="font-bold" style="color:orange;">&nbsp;' . $userFeel[0]->Ho . ' ' . $userFeel[0]->Ten . '</span>';
                    break;
                case '1':
                    return '❤️ ' . '<span class="font-bold" style="color:#F2314C;">&nbsp;' . $userFeel[0]->Ho . ' ' . $userFeel[0]->Ten . '</span>';
                    break;
                case '2':
                    return '😆 ' . '<span class="font-bold" style="color:orange;">&nbsp;' . $userFeel[0]->Ho . ' ' . $userFeel[0]->Ten . '</span>';
                    break;
                case '3':
                    return '😥 ' . '<span class="font-bold" style="color:orange;">&nbsp;' . $userFeel[0]->Ho . ' ' . $userFeel[0]->Ten . '</span>';
                    break;
                case '4':
                    return '😮 ' . '<span class="font-bold" style="color:orange;">&nbsp;' . $userFeel[0]->Ho . ' ' . $userFeel[0]->Ten . '</span>';
                    break;
                case '5':
                    return '😡 ' . '<span class="font-bold" style="color:#EB7F27;">&nbsp;' . $userFeel[0]->Ho . ' ' . $userFeel[0]->Ten . '</span>';
                    break;
            }
        } else if (count($userFeel) == 2) {
            if (
                explode('@', $userFeel[0]->LoaiCamXuc)[0] ==
                explode('@', $userFeel[1]->LoaiCamXuc)[0]
            ) {
                $arr[0] = Functions::getFeelMain($userFeel[0]->LoaiCamXuc);
                $arr[1] = count($userFeel);
                $arr[2] = $userFeel;
                return view('Component\BaiDang\SoLuongCamXuc')->with('arr', $arr);
            } else {
                $arr[0] = Functions::getFeelMain($userFeel[0]->LoaiCamXuc) . ' ' .
                    Functions::getFeelMain($userFeel[1]->LoaiCamXuc);
                $arr[1] = count($userFeel);
                $arr[2] = $userFeel;
                return view('Component\BaiDang\SoLuongCamXuc')->with('arr', $arr);
            }
        } else {
            $arr[0] = Functions::getFeelMain($userFeel[0]->LoaiCamXuc);
            $arr[1] = count($userFeel);
            $arr[2] = $userFeel;
            return view('Component\BaiDang\SoLuongCamXuc')->with('arr', $arr);
        }
    }

    public static function getFeelCmt($i)
    {
        switch (explode('@', $i)[0]) {
            case '0':
                return '<span class="font-bold text-sm" style="color:orange;">Thích</span>';
                break;
            case '1':
                return '<span class="font-bold text-sm" style="color:#F2314C;">Yêu thích</span>';
                break;
            case '2':
                return '<span class="font-bold text-sm" style="color:orange;">Haha</span>';
                break;
            case '3':
                return '<span class="font-bold text-sm" style="color:orange;">Buồn</span>';
                break;
            case '4':
                return '<span class="font-bold text-sm" style="color:orange;">Wow</span>';
                break;
            case '5':
                return '<span class="font-bold text-sm" style="color:#EB7F27;">Phẩn nộ</span>';
                break;
        }
    }
    public static function checkIsFeelCmt($idTaiKhoan, $idBinhLuan)
    {
        $data = Camxucbinhluan::where('camxucbinhluan.IDTaiKhoan', '=', $idTaiKhoan)
            ->where('camxucbinhluan.IDBinhLuan', '=', $idBinhLuan)
            ->get();
        if (count($data) == 0)
            return '<span class="text-sm font-bold">Thích</span>';
        else
            return Functions::getFeelCmt($data[0]->LoaiCamXuc);
    }
    public static function getUserFeelCmt($idBinhLuan)
    {
        return Camxucbinhluan::where('camxucbinhluan.IDBinhLuan', '=', $idBinhLuan)
            ->get();
    }
    public static function getStringFeelCmt($idBinhLuan)
    {
        $userFeel = Functions::getUserFeel($idBinhLuan);
    }
}
