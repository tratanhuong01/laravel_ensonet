<?php

namespace App\Process;

use App\Models\Camxuc;
use App\Models\Taikhoan;
use App\Models\Tinnhan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DataProcess extends Model
{
    public static function getAllImage($idTaiKhoan)
    {
        return DB::table('hinhanh')
            ->skip(0)->take(9)
            ->join('baidang', 'hinhanh.IDBaiDang', '=', 'baidang.IDBaiDang')
            ->join('taikhoan', 'baidang.IDTaiKhoan', '=', 'taikhoan.IDTaiKhoan')
            ->where('taikhoan.IDTaiKhoan', '=', $idTaiKhoan)
            ->where('baidang.LoaiBaiDang', '!=', '1')
            ->orderByDesc('baidang.NgayDang')
            ->get();
    }
    public static function getFriendTag($tag)
    {
        $new = array();
        $num = 0;
        if (count($tag) > 0) {
            foreach ($tag as $key => $value) {
                $tager = Taikhoan::where('taikhoan.IDTaiKhoan', '=', $key)->get()[0];
                $new[$num] = $tager;
                $num++;
            }
            return " cùng với " . $new[0]->Ho . ' ' . $new[0]->Ten .
                (count($new) - 1 == 0 ? '' :  " và " . (count($new) - 1) . ' ' . "người khác");
        } else
            return '';
    }
    public static function getFeel($feels)
    {
        foreach ($feels as $key => $value) {
            $cx = Camxuc::where('camxuc.IDCamXuc', '=', $value)->get()[0];
            return 'đang ' . $cx->BieuTuong . ' cảm thấy ' . $cx->TenCamXuc . ' ';
        }
    }
    public static function checkIsSimilarGroupMessage($sender, $receiver)
    {
        $arrMunatalGroup = array();
        $num = 0;
        for ($i = 0; $i < count($sender); $i++)
            for ($j = 0; $j < count($receiver); $j++) {
                if ($receiver[$j]->IDNhomTinNhan == $sender[$i]->IDNhomTinNhan) {
                    $arrMunatalGroup[$num] = $receiver[$j]->IDNhomTinNhan;
                    $num++;
                }
            }
        $idMNhomMain = "";
        if (count($arrMunatalGroup) > 0)
            for ($i = 0; $i < count($arrMunatalGroup); $i++) {
                $check = Tinnhan::where('tinnhan.IDNhomTinNhan', '=', $arrMunatalGroup[$i])
                    ->where('tinnhan.IDTaiKhoan', '=', $receiver[0]->IDTaiKhoan)
                    ->get();
                if (count($check) == 0) {
                    return $idMNhomMain;
                    break;
                } else {
                    $munatal = DB::select('SELECT DISTINCT IDTaiKhoan FROM tinnhan 
                    WHERE IDNhomTinNhan = ? ', [$arrMunatalGroup[$i]]);
                    if (count($munatal) == 2) {
                        $idMNhomMain = $arrMunatalGroup[$i];
                        return $idMNhomMain;
                    }
                }
            }
        else
            return $idMNhomMain;
    }
    public static function getMessageByID($sender, $receiver)
    {
        $idNhomTinNhan = DataProcess::checkIsSimilarGroupMessage($sender, $receiver);
        return Tinnhan::where('tinnhan.IDNhomTinNhan', '=', $idNhomTinNhan)
            ->where('tinnhan.LoaiTinNhan', '=', '1')
            ->join('nhomtinnhan', 'tinnhan.IDNhomTinNhan', 'nhomtinnhan.IDNhomTinNhan')
            ->join('taikhoan', 'tinnhan.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
            ->orderby('tinnhan.ThoiGianNhanTin', 'ASC')
            ->get();
    }
}
