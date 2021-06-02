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
            INNER JOIN loaithongbao ON thongbao.IDLoaiThongBao = loaithongbao.IDLoaiThongBao
            WHERE thongbao.IDTaiKhoan = ? AND loaithongbao.Loai = ? 
            GROUP BY IDContent 
            ORDER BY MAX(ThoiGianThongBao) DESC, IDContent LIMIT 10',
            [$idTaiKhoan, '0']
        );
        $newAllNotify = array();

        if (count($post) == 0) {
        } else {
            for ($i = 0; $i < count($post); $i++) {
                $newNotify = array();
                $dt = Thongbao::where('thongbao.IDTaikhoan', '=', $idTaiKhoan)
                    ->where('thongbao.IDContent', '=', $post[$i]->IDContent)->get();
                for ($j = 0; $j < count($post); $j++) {
                    $notify = Thongbao::select('*', 'thongbao.TinhTrang')
                        ->where('thongbao.IDTaikhoan', '=', $idTaiKhoan)
                        ->where('thongbao.IDContent', '=', $post[$i]->IDContent)
                        ->join('loaithongbao', 'thongbao.IDLoaiThongBao', '=', 'loaithongbao.IDLoaiThongBao')
                        ->join('taikhoan', 'thongbao.IDGui', '=', 'taikhoan.IDTaikhoan')
                        ->orderby('thongbao.ThoiGianThongBao', 'DESC')
                        ->get();
                    $newNotify[$j] = $notify;
                }
                $noiDung = Baidang::where('baidang.IDBaiDang', '=', explode('&', $post[$i]->IDContent)[0])->get();
                if (count($noiDung) > 0) {
                    $noiDung = $noiDung[0]->NoiDung;
                } else {
                    $noiDung = "";
                }
                if (sizeof(explode('&', $post[$i]->IDContent)) > 2) {
                    $cx = Camxucbinhluan::where('camxucbinhluan.IDBinhLuan', '=', explode('&', $post[$i]->IDContent)[2])
                        ->where('camxucbinhluan.IDTaiKhoan', '=', $newNotify[0][0]->IDGui)
                        ->get();
                    $newNotify['idBinhLuan'] = explode('&', $post[$i]->IDContent)[2];
                } else
                    $cx = Camxucbaidang::where('camxucbaidang.IDBaiDang', '=', explode('&', $post[$i]->IDContent)[0])
                        ->where('camxucbaidang.IDTaiKhoan', '=', $newNotify[0][0]->IDGui)
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
            case '3':
                return 'CXVBVCS123';
            case '4':
                return 'DDLDTGCB1';
                break;
        }
    }
    public static function countNotify($idTaiKhoan, $tinhTrang)
    {
        $post = DB::select(
            'SELECT DISTINCT IDContent, MAX(ThoiGianThongBao) 
            FROM thongbao 
            INNER JOIN loaithongbao ON thongbao.IDLoaiThongBao = loaithongbao.IDLoaiThongBao
            WHERE thongbao.IDTaiKhoan = ? AND loaithongbao.Loai = ? 
            AND thongbao.TinhTrang = ?
            GROUP BY IDContent 
            ORDER BY MAX(ThoiGianThongBao) DESC, IDContent',
            [$idTaiKhoan, '0', $tinhTrang]
        );
        return count($post);
    }
    public static function getContentComment($idTaiKhoan, $idBaiDang, $time)
    {
        return Binhluan::where('binhluan.IDTaiKhoan', '=', $idTaiKhoan)
            ->where('binhluan.IDBaiDang', '=', $idBaiDang)
            ->where('binhluan.ThoiGianBinhLuan', '=', $time)
            ->get();
    }
    public static function countNotifyMessenger()
    {
    }
}
