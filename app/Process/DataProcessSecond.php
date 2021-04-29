<?php

namespace App\Process;

use App\Models\Camxuc;
use App\Models\Luotxemstory;
use App\Models\Mautinnhan;
use App\Models\Moiquanhe;
use App\Models\Story;
use App\Models\Taikhoan;
use App\Models\Tinnhan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DataProcessSecond extends Model
{
    public static function getColorMessage()
    {
        return Mautinnhan::get();
    }
    public static function createArrayUser($arr)
    {
        $data = array();
        $num = 0;
        foreach ($arr as $key => $value) {
            $data[$num] = Taikhoan::where('taikhoan.IDTaiKhoan', '=', $value)->get()[0];
            $num++;
        }
        return $data;
    }
    public static function getUserGroupAfterRemove($userGroup, $idTaiKhoan)
    {
        foreach ($userGroup as $key => $value) {
            if ($value != $idTaiKhoan) {
                return $value;
                break;
            }
        }
    }
    public static function getUserFollowByID($idTaiKhoan)
    {
        return Moiquanhe::where('moiquanhe.IDTaiKhoan', '=', $idTaiKhoan)
            ->where('moiquanhe.TinhTrang', '=', '2')->get();
    }
    public static function getListRequestFriendNew($idTaiKhoan)
    {
        $listRequest = Moiquanhe::where('moiquanhe.IDTaiKhoan', '=', $idTaiKhoan)
            ->where('moiquanhe.TinhTrang', '=', '2')
            ->join('taikhoan', 'moiquanhe.IDBanBe', 'taikhoan.IDTaiKhoan')
            ->orderBy('NgayGui', 'desc')
            ->get();
        return $listRequest;
    }
    public static function getAllStoryOfUsers($idTaiKhoan)
    {
        $story = Story::where('story.IDTaiKhoan', '=', $idTaiKhoan)
            ->orderBy('story.ThoiGianDangStory', 'DESC')->get();
        return $story;
    }
    public static function getRequestSend($idTaiKhoan)
    {
        return Moiquanhe::where('moiquanhe.IDTaiKhoan', '=', $idTaiKhoan)
            ->where('moiquanhe.TinhTrang', '=', '1')
            ->join('taikhoan', 'moiquanhe.IDBanBe', 'taikhoan.IDTaiKhoan')
            ->orderBy('moiquanhe.NgayGui', 'DESC')
            ->get();
    }
    public static function checkUserViewStateWithUserMain($idView, $idMain)
    {
        $relation = Moiquanhe::where('IDTaiKhoan', '=', $idView)
            ->where('IDBanBe', '=', $idMain)->get();
        if (count($relation) > 0) {
            if ($relation[0]->TinhTrang == 3)
                return true;
            else
                return false;
        }
    }
}
