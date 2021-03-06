<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Notify extends Model
{
    public static function getNotify($idTaiKhoan)
    {
        $post = DB::select(
            'SELECT DISTINCT IDContent FROM thongbao WHERE IDTaiKhoan = ? ORDER BY ThoiGianThongBao DESC LIMIT 10',
            [$idTaiKhoan]
        );
        $newAllNotify = array();

        if (count($post) == 0) {
        } else {
            for ($i = 0; $i < count($post); $i++) {
                $newNotify = array();
                for ($j = 0; $j < count($post); $j++) {
                    $notify = Thongbao::where('thongbao.IDTaikhoan', '=', $idTaiKhoan)
                        ->where('thongbao.IDContent', '=', $post[$i]->IDContent)
                        ->join('loaithongbao', 'thongbao.IDLoaiThongBao', '=', 'loaithongbao.IDLoaiThongBao')
                        ->join('taikhoan', 'thongbao.IDGui', '=', 'taikhoan.IDTaikhoan')
                        ->orderby('thongbao.ThoiGianThongBao', 'DESC')
                        ->get();
                    $newNotify[$j] = $notify;
                }
                $noiDung = Baidang::where('baidang.IDBaiDang', '=', explode('&', $post[$i]->IDContent)[0])->get()[0]->NoiDung;
                $cx = Camxuc::where('camxuc.IDBaiDang', '=', explode('&', $post[$i]->IDContent)[0])
                    ->where('camxuc.IDTaiKhoan', '=', $newNotify[0][0]->IDGui)
                    ->get();
                if (count($cx) > 0)
                    $loaiCamXuc = $cx[0]->LoaiCamXuc;
                else
                    $loaiCamXuc = '';
                $newNotify['noiDung'] = $noiDung;
                $newNotify['loaiCamXuc'] = $loaiCamXuc;
                $newAllNotify[$i] = $newNotify;
                $newNotify = NULL;
            }
        }
        return $newAllNotify;
    }
    public static function getTypeNotify($loaiBaiDang)
    {
        switch ($loaiBaiDang) {
            case '0':
                return 'ADD1234567';
                break;
            case '1':
                return 'AB12345678';
                break;
            case '2':
                return 'CXP1234567';
                break;
            default:
                return '';
        }
    }
    public static function countNotify($idTaiKhoan)
    {
        $post = DB::select(
            'SELECT DISTINCT IDContent FROM thongbao 
            WHERE IDTaiKhoan = ? AND TinhTrang = ? 
            ORDER BY ThoiGianThongBao DESC',
            [$idTaiKhoan, 0]
        );
        return count($post);
    }
}
