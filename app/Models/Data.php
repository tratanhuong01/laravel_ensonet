<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Camxucbaidang;
use Illuminate\Support\Arr;

class Data extends Model
{
    public static function getAllPostRelationWithUser($idTaiKhoan)
    {
        $postAll = array();
        $friends = Functions::getListFriendsUser($idTaiKhoan);
        $k = 0;
        for ($i = 0; $i < count($friends); $i++) {
            $post = Functions::countPostMain($friends[$i][0]->IDTaiKhoan);
            for ($j = 0; $j < count($post); $j++) {
                $postAll[$k] = Functions::getPost($post[$j]);
                $k++;
            }
        }
        return $postAll;
    }
    public static function sortAllPost($idTaiKhoan)
    {
        $postAll = Data::getAllPostRelationWithUser($idTaiKhoan);
        $postAllNew = array();
        for ($i = 0; $i < count($postAll) - 1; $i++) {
            for ($j = $i + 1; $j < count($postAll); $j++) {
                if (strtotime($postAll[$i][0]->NgayDang) < strtotime($postAll[$j][0]->NgayDang)) {
                    $postAllNew = $postAll[$i];
                    $postAll[$i] = $postAll[$j];
                    $postAll[$j] = $postAllNew;
                }
            }
        }
        return $postAll;
    }
    public static function getDetailFeelPost($idBaiDang)
    {
        $feel = Functions::getUserFeel($idBaiDang);
        $typeFeel = DB::select(
            'SELECT DISTINCT  `LoaiCamXuc` FROM `camxucbaidang` WHERE camxucbaidang.IDBaiDang = ? ',
            [$idBaiDang]
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
            $camxuc = new Camxucbaidang;
            $camxuc->LoaiCamXuc = '0@1';
            $typeFeel = array('0' => $camxuc);
        }
        $user = array();
        $k = 0;
        for ($i = 0; $i < count($typeFeel); $i++) {
            $data = Camxucbaidang::where('camxucbaidang.LoaiCamXuc', 'LIKE', '%' .
                explode('@', $typeFeel[$i]->LoaiCamXuc)[0] . '@' . '%')
                ->where('camxucbaidang.IDBaiDang', '=', $idBaiDang)->get();
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
    public static function getOnlyDetailFeelPost($idBaiDang, $loaiCamXuc)
    {
        $user = array();
        $k = 0;
        $data = Camxucbaidang::where('camxucbaidang.LoaiCamXuc', 'LIKE', '%' . explode('@', $loaiCamXuc)[0] . '@' . '%')
            ->where('camxucbaidang.IDBaiDang', '=', $idBaiDang)->get();
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
}
