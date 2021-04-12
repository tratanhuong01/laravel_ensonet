<?php

namespace App\Process;

use App\Models\Camxuctinnhan;
use App\Models\Functions;
use App\Models\Moiquanhe;
use App\Models\Taikhoan;
use App\Models\Tinnhan;
use App\Process\DataProcess;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DataProcessFive extends Model
{
    public static function getIndexOfStory($allStory, $story)
    {
        foreach ($allStory as $key => $value) {
            if (count($value) == 0) {
            } else {
                if ($value[0]->IDTaiKhoan ==  $story[0]->IDTaiKhoan) {
                    return $key;
                    break;
                }
            }
        }
    }
    public static function checkShowOrHideMessageRight($idNhomTinNhan, $idTaiKhoan)
    {
        $allMessage = Tinnhan::where('tinnhan.IDNhomTinNhan', '=', $idNhomTinNhan)
            ->orderBy('tinnhan.ThoiGianNhanTin', 'DESC')->get();
        foreach ($allMessage as $key => $value) {
            if ($value->LoaiTinNhan == 2) {
            } else {
                $bool = DataProcessFive::checkMessageIsSeen($value->IDTinNhan, $idTaiKhoan);
                if ($value->IDTaiKhoan != $idTaiKhoan && $bool == 1) {
                    return $value->IDTinNhan;
                    break;
                }
            }
        }
    }
    public static function checkMessageIsSeen($idTinNhan, $idTaiKhoan)
    {
        $trangThai = Tinnhan::where('tinnhan.IDTinNhan', '=', $idTinNhan)->get()[0]->TrangThai;
        $array = explode('@', $trangThai);
        for ($i = 0; $i < count($array) - 1; $i++) {
            if (
                explode('#', $array[$i])[0] == $idTaiKhoan &&
                explode('#', $array[$i])[1] == '2'
            ) {
                return 1;
                break;
            }
        }
        return 0;
    }
    public static function getBirthdayCurrent($idTaiKhoan)
    {
        $acc =  Taikhoan::whereRaw('DAY(taikhoan.NgaySinh) = DAY(NOW()) AND MONTH(taikhoan.NgaySinh) = MONTH(NOW())')
            ->get();
        $array = array();
        $num = 0;
        foreach ($acc as $key => $value) {
            $relation = Moiquanhe::where('moiquanhe.IDTaiKhoan', '=', $idTaiKhoan)
                ->where('moiquanhe.IDBanBe', '=', $value->IDTaiKhoan)
                ->where('moiquanhe.TinhTrang', '=', 3)
                ->get();
            if (count($relation) > 0) {
                $array[$num] = $value;
                $num++;
            }
        }
        return $array;
    }
    public static function getDetailFeelMesage($idTinNhan)
    {
        $typeFeel = DB::select(
            'SELECT DISTINCT  `LoaiCamXuc` FROM `camxuctinnhan` WHERE camxuctinnhan.IDTinNhan = ? ',
            [$idTinNhan]
        );
        $countFeel1 = 0;
        $countFeel2 = 0;
        for ($i = 0; $i < count($typeFeel); $i++) {
            if ($typeFeel[$i]->LoaiCamXuc == '0@1')
                $countFeel1++;
            else if ($typeFeel[$i]->LoaiCamXuc == '0@0')
                $countFeel2++;
        }
        for ($i = 0; $i < count($typeFeel); $i++) {
            if ($countFeel1 != 0 && $countFeel2 != 0) {
                if ($typeFeel[$i]->LoaiCamXuc == '0@1')
                    unset($typeFeel[$i]);
            }
        }
        $typeFeel = array_values($typeFeel);
        if (count($typeFeel) == 0) {
            $camxuc = new Camxuctinnhan;
            $camxuc->LoaiCamXuc = '0@1';
            $typeFeel = array('0' => $camxuc);
        }
        $user = array();
        $k = 0;
        for ($i = 0; $i < count($typeFeel); $i++) {
            $data = Camxuctinnhan::where('camxuctinnhan.LoaiCamXuc', 'LIKE', '%' .
                explode('@', $typeFeel[$i]->LoaiCamXuc)[0] . '@' . '%')
                ->where('camxuctinnhan.IDTinNhan', '=', $idTinNhan)->get();
            for ($j = 0; $j < count($data); $j++) {
                $u = DB::table('taikhoan')
                    ->where('taikhoan.IDTaiKhoan', '=', $data[$j]->IDTaiKhoan)
                    ->get();
                $user[$k] = $u;
                $k++;
            }
            $k = 0;
            $detailFeel[$typeFeel[$i]->LoaiCamXuc] = $user;
            $user = NULL;
        }
        return $detailFeel;
    }
    public static function getOnlyDetailFeelPost($idTinNhan, $loaiCamXuc)
    {
        $user = array();
        $k = 0;
        $data = Camxuctinnhan::where('camxuctinnhan.LoaiCamXuc', 'LIKE', '%' . explode('@', $loaiCamXuc)[0] . '@' . '%')
            ->where('camxuctinnhan.IDTinNhan', '=', $idTinNhan)->get();
        for ($j = 0; $j < count($data); $j++) {
            $u = DB::table('taikhoan')
                ->where('taikhoan.IDTaiKhoan', '=', $data[$j]->IDTaiKhoan)
                ->get();
            $user[$k] = $u;
            $k++;
        }
        $detailFeel[$loaiCamXuc] = $user;
        return $detailFeel;
    }
    public static function getAllImageAndVideo($idNhomTinNhan)
    {
        $messages = DataProcess::getMessageByNhomTinNhan($idNhomTinNhan);
        $images = array();
        $index = 0;
        foreach ($messages as $key => $value) {
            $content = json_decode($value->NoiDung);
            if ($content[0]->LoaiTinNhan == 1)
                foreach ($content as $keys => $values) {
                    $images[$index] = $values->DuongDan;
                    $index++;
                }
        }
        return $images;
    }
}
