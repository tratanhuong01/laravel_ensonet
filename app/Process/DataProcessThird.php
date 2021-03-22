<?php

namespace App\Process;

use App\Models\Baidang;
use App\Models\Data;
use App\Models\Functions;
use App\Models\Luotxemstory;
use App\Models\Phongnen;
use App\Models\Story;
use Illuminate\Database\Eloquent\Model;
use App\Models\Taikhoan;
use App\Models\Tinnhan;
use Illuminate\Support\Facades\Session;

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
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        foreach ($friends as $key => $value) {
            $story = Story::where('story.IDTaiKhoan', '=', $value[0]->IDTaiKhoan)
                ->whereRaw('DATEDIFF(NOW(),story.ThoiGianDangStory) = 0')
                ->join('taikhoan', 'story.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
                ->orderBy('story.ThoiGianDangStory', 'ASC')
                ->get();
            foreach ($story as $keys => $values) {
                $allStory[$key][$keys] = $values;
            }
        }
        $allStory = array_values($allStory);
        $item = array();
        for ($i = 0; $i < count($allStory) - 1; $i++) {
            for ($j = $i + 1; $j < count($allStory); $j++) {
                if (
                    strtotime($allStory[$i][count($allStory[$i]) - 1]->ThoiGianDangStory)
                    < strtotime($allStory[$j][count($allStory[$j]) - 1]->ThoiGianDangStory)
                ) {
                    $item = $allStory[$i];
                    $allStory[$i] = $allStory[$j];
                    $allStory[$j] = $item;
                }
            }
        }
        return $allStory;
    }
    public static function sortStoryByID($idTaiKhoan)
    {
        $allStory = DataProcessThird::getAllStoryByID($idTaiKhoan);
        $newAllStory = array();
        $newAllStory[0] = Story::where('story.IDTaiKhoan', '=', $idTaiKhoan)
            ->whereRaw('DATEDIFF(NOW(),story.ThoiGianDangStory) = 0')
            ->join('taikhoan', 'story.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
            ->orderBy('story.ThoiGianDangStory', 'ASC')
            ->get();
        for ($i = 1; $i <= count($allStory); $i++) {
            $newAllStory[$i] = $allStory[$i - 1];
        }

        return $newAllStory;
    }
    public static function checkIsViewStoryOfUser($storyTaiKhoan, $idTaiKhoan)
    {
        $story = Story::where('story.IDTaiKhoan', '=', $storyTaiKhoan)
            ->whereRaw('DATEDIFF(NOW(),story.ThoiGianDangStory) = 0')
            ->join('taikhoan', 'story.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
            ->orderBy('story.ThoiGianDangStory', 'ASC')
            ->get();
        $num = 0;
        foreach ($story as $key => $value) {
            $view = Luotxemstory::where('luotxemstory.IDStory', '=', $value->IDStory)
                ->where('luotxemstory.IDXem', '=', $idTaiKhoan)->get();
            if (count($view) == 1) {
            } else
                $num++;
        }
        return $num;
    }
    public static function checkUserViewThisStory($idTaiKhoan, $idStory)
    {
        return Luotxemstory::where('luotxemstory.IDStory', '=', $idStory)
            ->where('luotxemstory.IDXem', '=', $idTaiKhoan)->get();
    }
    public static function getViewStoryByIDStory($idStory, $idTaiKhoan)
    {
        return Luotxemstory::where('luotxemstory.IDStory', '=', $idStory)
            ->where('luotxemstory.IDXem', '!=', $idTaiKhoan)
            ->join('taikhoan', 'luotxemstory.IDXem', 'taikhoan.IDTaiKhoan')
            ->get();
    }
}
