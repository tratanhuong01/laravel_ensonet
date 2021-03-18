<?php

namespace App\Process;

use App\Models\Baidang;
use App\Models\Data;
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
}
