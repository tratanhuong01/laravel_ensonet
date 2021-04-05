<?php

namespace App\Process;

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
}
