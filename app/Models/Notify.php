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
            'SELECT DISTINCT IDContent, MAX(ThoiGianThongBao) 
            FROM thongbao 
            WHERE thongbao.IDTaiKhoan = ?
            GROUP BY IDContent 
            ORDER BY MAX(ThoiGianThongBao) DESC, IDContent',
            [$idTaiKhoan]
        );
        $newAllNotify = array();

        if (count($post) == 0) {
        } else {
            for ($i = 0; $i < count($post); $i++) {
                $newNotify = array();
                $dt = Thongbao::where('thongbao.IDTaikhoan', '=', $idTaiKhoan)
                    ->where('thongbao.IDContent', '=', $post[$i]->IDContent)->get();
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
    public static function sortAllNotify($postAll)
    {
        $postAllNew = array();
        for ($i = 0; $i < count($postAll) - 1; $i++) {
            for ($j = $i + 1; $j < count($postAll); $j++) {
            }
        }
        return $postAll;
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
        }
    }
    public static function countNotify($idTaiKhoan, $tinhTrang)
    {
        $post = DB::select(
            'SELECT DISTINCT IDContent FROM thongbao 
            WHERE IDTaiKhoan = ? AND TinhTrang = ? 
            ORDER BY ThoiGianThongBao DESC',
            [$idTaiKhoan, $tinhTrang]
        );
        return count($post);
    }
}
