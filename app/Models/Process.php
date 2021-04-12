<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Process extends Model
{
    public static function getAllComment($idBaiDang)
    {
        return Binhluan::where('binhluan.IDBaiDang', '=', $idBaiDang)->get();
    }
    public static function getCommentNew($idBaiDang)
    {
        return DB::table('binhluan')
            ->join('taikhoan', 'binhluan.IDTaiKhoan', '=', 'taikhoan.IDTaiKhoan')
            ->where('binhluan.IDBaiDang', '=', $idBaiDang)
            ->where('binhluan.LoaiBinhLuan', '=', '1')
            ->orderBy('ThoiGianBinhLuan', 'desc')
            ->get();
    }
    public static function getCommentLimit($idBaiDang)
    {
        return DB::table('binhluan')
            ->skip(0)->take(2)
            ->join('taikhoan', 'binhluan.IDTaiKhoan', '=', 'taikhoan.IDTaiKhoan')
            ->where('binhluan.IDBaiDang', '=', $idBaiDang)
            ->where('binhluan.LoaiBinhLuan', '=', '1')
            ->orderBy('ThoiGianBinhLuan', 'desc')
            ->get();
    }
    public static function getCommentLimitFromTo($idBaiDang, $num)
    {
        return DB::table('binhluan')
            ->skip($num)->take(2)
            ->join('taikhoan', 'binhluan.IDTaiKhoan', '=', 'taikhoan.IDTaiKhoan')
            ->where('binhluan.IDBaiDang', '=', $idBaiDang)
            ->where('binhluan.LoaiBinhLuan', '=', '1')
            ->orderBy('ThoiGianBinhLuan', 'desc')
            ->get();
    }
    public static function getRepCommentLimit($idBinhLuan, $num)
    {
        return DB::table('binhluan')
            ->skip($num)->take(2)
            ->join('taikhoan', 'binhluan.IDTaiKhoan', '=', 'taikhoan.IDTaiKhoan')
            ->where('binhluan.PhanHoi', '=', $idBinhLuan)
            ->where('binhluan.LoaiBinhLuan', '=', '2')
            ->orderBy('ThoiGianBinhLuan', 'desc')
            ->get();
    }
    public static function getCommentNewCmt($idBinhLuan)
    {
        return DB::table('binhluan')
            ->join('taikhoan', 'binhluan.IDTaiKhoan', '=', 'taikhoan.IDTaiKhoan')
            ->where('binhluan.PhanHoi', '=', $idBinhLuan)
            ->where('binhluan.LoaiBinhLuan', '=', '2')
            ->orderBy('ThoiGianBinhLuan', 'desc')
            ->get();
    }
    public static function getFeelComment($idBinhLuan)
    {
        $userFeel = Camxucbinhluan::where('camxucbinhluan.IDBinhLuan', '=', $idBinhLuan)->get();
        if (count($userFeel) == 0)
            return '';
        else {
            $typeFeel = DB::select(
                'SELECT DISTINCT  `LoaiCamXuc` FROM `camxucbinhluan` WHERE 
                camxucbinhluan.IDBinhLuan = ? ',
                [$idBinhLuan]
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
                $camxuc = new Camxucbinhluan;
                $camxuc->LoaiCamXuc = '0@1';
                $typeFeel = array('0' => $camxuc);
            }
            $all = '';
            for ($i = 0; $i < count($typeFeel); $i++) {
                $all .= Functions::getFeelMain($typeFeel[$i]->LoaiCamXuc);
            }
            $arr[0] = $all;
            $arr[1] = count($userFeel);
            $arr[2] = $userFeel;
            return view('Component\Comment\NumberFeel')->with('arr', $arr);
        }
    }
    public static function getDetailFeelPost($idBinhLuan)
    {
        $feel = Functions::getUserFeel($idBinhLuan);
        $typeFeel = DB::select(
            'SELECT DISTINCT  `LoaiCamXuc` FROM `camxucbinhluan` WHERE camxucbinhluan.IDBinhLuan = ? ',
            [$idBinhLuan]
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
            $camxuc = new Camxucbinhluan;
            $camxuc->LoaiCamXuc = '0@1';
            $typeFeel = array('0' => $camxuc);
        }
        $user = array();
        $k = 0;
        for ($i = 0; $i < count($typeFeel); $i++) {
            $data = Camxucbinhluan::where('camxucbinhluan.LoaiCamXuc', 'LIKE', '%' .
                explode('@', $typeFeel[$i]->LoaiCamXuc)[0] . '@' . '%')
                ->where('camxucbinhluan.IDBinhLuan', '=', $idBinhLuan)->get();
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
    public static function getOnlyDetailFeelPost($idBinhLuan, $loaiCamXuc)
    {
        $user = array();
        $k = 0;
        $data = Camxucbinhluan::where('camxucbinhluan.LoaiCamXuc', 'LIKE', '%' . explode('@', $loaiCamXuc)[0] . '@' . '%')
            ->where('camxucbinhluan.IDBinhLuan', '=', $idBinhLuan)->get();
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
    public static function getFeelMesage($idTinNhan)
    {
        $userFeel = Camxuctinnhan::where('camxuctinnhan.IDTinNhan', '=', $idTinNhan)->get();
        $typeFeel = DB::select(
            'SELECT DISTINCT  `LoaiCamXuc` FROM `camxuctinnhan` WHERE 
                camxuctinnhan.IDTinNhan = ? ',
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
            $camxuc = new Camxucbinhluan;
            $camxuc->LoaiCamXuc = '0@1';
            $typeFeel = array('0' => $camxuc);
        }
        $all = '';
        for ($i = 0; $i < count($typeFeel); $i++) {
            $all .= Functions::getFeelMain($typeFeel[$i]->LoaiCamXuc);
        }
        $arr[0] = $all;
        $arr[1] = count($userFeel);
        $arr[2] = $userFeel;
        if ($arr[1] == 0)
            return '';
        else
            return view('Modal\ModalChat\Child\NumberFeel')->with('arr', $arr);
    }
}
