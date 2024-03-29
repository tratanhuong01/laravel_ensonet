<?php

namespace App\Process;

use App\Models\Congty;
use App\Models\Diachi;
use App\Models\Hinhanh;
use App\Models\Quydinh;
use App\Models\Tinnhan;
use App\Models\Truonghoc;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DataProcessSix extends Model
{
    public static function CheckIsImage($nameFile)
    {
        $typeFile = ['PNG', 'png', 'jpg', 'JPG', 'gif', 'GIF'];
        foreach ($typeFile as $key => $value) {
            if (substr($nameFile, -3) == $value)
                return true;
        }
    }
    public static function CheckIsVideo($nameFile)
    {
        $typeFile = ['MP4', 'mp4', 'MOV', 'mov', 'mkv', 'MKV'];
        foreach ($typeFile as $key => $value) {
            if (substr($nameFile, -3) == $value)
                return true;
        }
    }
    public static function createAllAddress()
    {
        $new = array();
        $index = 0;
        $data = Diachi::get();
        foreach ($data as $key => $value) {
            $new[$index] = (object)[
                'ID' => $value->IDDiaChi,
                'Ten' => $value->TenDiaChi,
                'Loai' => '0'
            ];
            $index++;
        }
        $data = Truonghoc::get();
        foreach ($data as $key => $value) {
            $new[$index] = (object)[
                'ID' => $value->IDTruongHoc,
                'Ten' => $value->TenTruongHoc,
                'Loai' => '1'
            ];
            $index++;
        }
        $data = Congty::get();
        foreach ($data as $key => $value) {
            $new[$index] = (object)[
                'ID' => $value->IDCongTy,
                'Ten' => $value->TenCongTy,
                'Loai' => '2'
            ];
            $index++;
        }
        return $new;
    }
    public static function searchAllAddress($array, $value)
    {
        $newArray = array();
        $index = 0;
        foreach ($array as $key => $values) {
            if (str_contains(strtolower($values->Ten), strtolower($value))) {
                $newArray[$index] = $values;
                $index++;
            }
        }
        return $newArray;
    }
    public static function getNickNameByUser($idNhomTinNhan, $idTaiKhoan)
    {
        $message = Tinnhan::where('tinnhan.IDNhomTinNhan', '=', $idNhomTinNhan)
            ->where('tinnhan.IDTaiKhoan', '=', $idTaiKhoan)
            ->where('tinnhan.LoaiTinNhan', '=', 0)
            ->get();
        return $message[0]->NoiDung == NULL || $message[0] == ""
            ? "" : $message[0]->NoiDung;
    }
    public static function checkOutOrKichGroup($idNhomTinNhan, $idTaiKhoan)
    {
        $message = Tinnhan::where('tinnhan.IDNhomTinNhan', '=', $idNhomTinNhan)
            ->where('tinnhan.IDTaiKhoan', '=', $idTaiKhoan)
            ->where('tinnhan.LoaiTinNhan', '=', 0)
            ->get();
        $result = true;
        if ($message[0]->TrangThai == 1 || $message[0]->TrangThai == 2)
            $result = true;
        else
            $result = false;
        return $result;
    }
    public static function numberMessageNot($idNhomTinNhan, $idTaiKhoan)
    {
        $message = Tinnhan::where('tinnhan.IDNhomTinNhan', '=', $idNhomTinNhan)
            ->where('tinnhan.LoaiTinNhan', '!=', 0)
            ->get();
        $count = 0;
        foreach ($message as $key => $value) {
            $array = explode('@', $value->TinhTrang);
            foreach ($array as $key => $value) {
                if (
                    explode('#', $value)[0] == $idTaiKhoan
                    && explode('#', $value)[1] == 3
                )
                    $count++;
            }
        }
        if ($count == count($message))
            return true;
        else
            return false;
    }
    public static function getVideoByUser()
    {
    }
    public static function checkContentIsValid($content)
    {
        $word = DB::table('quydinh')->get();
        $number = 0;
        foreach ($word as $key => $value) {
            if (str_contains($content, $value->TenQuyDinh))
                $number++;
        }
        return $number;
    }
    public static function getMemoryByID($idTaiKhoan)
    {
        $post = DB::table('baidang')
            ->whereRaw("DATE_FORMAT(CAST(baidang.NgayDang AS DATE),'%m-%d') = 
            DATE_FORMAT(CAST(DATE_SUB(NOW(),INTERVAL 1 YEAR) AS DATE),'%m-%d') AND 
            YEAR(baidang.NgayDang) < YEAR(NOW())")
            ->get();
        $postNew = array();
        foreach ($post as $key => $value) {
            $data = DB::table('baidang')
                ->where('baidang.IDBaiDang', '=', $value->IDBaiDang)
                ->join('taikhoan', 'baidang.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
                ->leftjoin('hinhanh', 'baidang.IDBaiDang', 'hinhanh.IDBaiDang')
                ->get();
            foreach ($data as $keys => $values) {
                $postNew[$key][$keys] =  $values;
            }
        }
        return $postNew;
    }
    public static function getIDImageByIDCommnet($idBinhLuan)
    {
        $id = Hinhanh::where('hinhanh.Khac', '=', $idBinhLuan)->get();
        if (count($id) > 0)
            return $id[0]->IDHinhAnh;
        else
            return "";
    }
    public static function checkWordIsValid($word)
    {
        $rule = Quydinh::get();
        foreach ($rule as $key => $value) {
            if (str_contains($word, $value->TenQuyDinh)) {
                return false;
                break;
            }
        }
        return true;
    }
}
