<?php

namespace App\Process;

use App\Models\Baidang;
use App\Models\Data;
use App\Models\Functions;
use App\Models\Phongnen;
use App\Models\Story;
use Illuminate\Database\Eloquent\Model;
use App\Models\Taikhoan;
use App\Models\Tinnhan;

class DataProcessThird extends Model
{
    public static function getUserTag($idBaiDang)
    {
        $ganThe = Baidang::where('baidang.IDBaiDang', '=', $idBaiDang)->get()[0]->GanThe;
        $arrTag = explode('&', $ganThe);
        $data = array();
        for ($i = 0; $i < count($arrTag) -  1; $i++) {
            $data[$i] = Taikhoan::where('taikhoan.IDTaiKhoan', '=', $arrTag[$i])->get()[0];
        }
        return $data;
    }
    public static function checkMessage($idTinNhan, $users)
    {
        $tinNhan = Tinnhan::where('tinnhan.IDTinNhan', '=', $idTinNhan)->get()[0];
        $arrTypeMess = explode('@', $tinNhan->TinhTrang);
        for ($i = 0; $i < count($arrTypeMess) - 1; $i++) {
        }
    }
    public static function checkChatUserActivity($idNhomTinNhan)
    {
        $userGroup = DataProcess::getUserOfGroupMessage($idNhomTinNhan);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        foreach ($userGroup as $key => $value) {
            if (strtotime(date("Y-m-d H:i:s")) - strtotime($value->ThoiGianHoatDong) < 60) {
                return true;
                break;
            }
        }
    }
    public static function createTrangThai($idNhomTinNhan, $trangThai)
    {
        $userGroup = DataProcess::getUserOfGroupMessage($idNhomTinNhan);
        $data = "";
        foreach ($userGroup as $key => $value) {
            $data .= $value->IDTaiKhoan . '#' . $trangThai . '@';
        }
        return $data;
    }
    public static function getBackGround()
    {
        return Phongnen::get();
    }
    public static function getAllStoryByID($idTaiKhoan)
    {
        $friends = Functions::getListFriendsUser($idTaiKhoan);
        $allStory = array();
        $num = 0;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        foreach ($friends as $key => $value) {
            $story = Story::where('story.IDTaiKhoan', '=', $value[0]->IDTaiKhoan)
                ->whereRaw('DATEDIFF(NOW(),story.ThoiGianDangStory) = 0')
                ->join('taikhoan', 'story.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
                ->orderBy('story.ThoiGianDangStory', 'DESC')
                ->get();
            foreach ($story as $keys => $values) {
                $allStory[$num] = $values;
                $num++;
            }
        }
        return $allStory;
    }
}
