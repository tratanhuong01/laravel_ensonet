<?php

namespace App\Process;

use App\Models\Camxuc;
use App\Models\Congty;
use App\Models\Diachi;
use App\Models\Taikhoan;
use App\Models\Tinnhan;
use App\Models\Truonghoc;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DataProcess extends Model
{
    public static function getAllImage($idTaiKhoan)
    {
        return DB::table('hinhanh')
            ->skip(0)->take(9)
            ->join('baidang', 'hinhanh.IDBaiDang', '=', 'baidang.IDBaiDang')
            ->join('taikhoan', 'baidang.IDTaiKhoan', '=', 'taikhoan.IDTaiKhoan')
            ->where('hinhanh.Loai', '=', 0)
            ->where('taikhoan.IDTaiKhoan', '=', $idTaiKhoan)
            ->where('baidang.LoaiBaiDang', '!=', '1')
            ->where('baidang.IDQuyenRiengTu', '!=', 'RIENGTU')
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
    public static function getFriendTags($tag, $idBaiDang)
    {
        $new = array();
        $num = 0;
        if (count($tag) > 0) {
            foreach ($tag as $key => $value) {
                $tager = Taikhoan::where('taikhoan.IDTaiKhoan', '=', $key)->get()[0];
                $new[$num] = $tager;
                $num++;
            }
            return view('Component\Post\Child\Tag')->with(
                'hoTen1',
                $new[0]->Ho . ' ' . $new[0]->Ten
            )->with(
                'other',
                (count($new) - 1 == 0 ? '' :  " và " . (count($new) - 1) . ' ' . "người khác")
            )->with(
                'idBaiDang',
                $idBaiDang
            )->with(
                'idTaiKhoan',
                $new[0]->IDTaiKhoan
            );
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
        return Tinnhan::select('*', 'tinnhan.TinhTrang')
            ->where('tinnhan.IDNhomTinNhan', '=', $idNhomTinNhan)
            ->where('tinnhan.LoaiTinNhan', '!=', '0')
            ->join('nhomtinnhan', 'tinnhan.IDNhomTinNhan', 'nhomtinnhan.IDNhomTinNhan')
            ->join('taikhoan', 'tinnhan.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
            ->orderby('tinnhan.ThoiGianNhanTin', 'ASC')
            ->get();
    }
    public static function getMessageByIDLimit($sender, $receiver, $skip)
    {
        $idNhomTinNhan = DataProcess::checkIsSimilarGroupMessage($sender, $receiver);
        return Tinnhan::select('*', 'tinnhan.TinhTrang')
            ->take(15)->skip($skip)
            ->where('tinnhan.IDNhomTinNhan', '=', $idNhomTinNhan)
            ->where('tinnhan.LoaiTinNhan', '!=', '0')
            ->join('nhomtinnhan', 'tinnhan.IDNhomTinNhan', 'nhomtinnhan.IDNhomTinNhan')
            ->join('taikhoan', 'tinnhan.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
            ->orderby('tinnhan.ThoiGianNhanTin', 'ASC')
            ->get();
    }
    public static function getUserOfGroupMessage($idNhomTinNhan)
    {
        $usersOfGroupMessages = DB::select('SELECT DISTINCT tinnhan.IDTaiKhoan ,AnhDaiDien,Ho,
        Ten,ThoiGianHoatDong FROM tinnhan INNER JOIN 
        taikhoan ON tinnhan.IDTaiKhoan = taikhoan.IDTaiKhoan
        WHERE tinnhan.IDNhomTinNhan = ? ', [$idNhomTinNhan]);
        foreach ($usersOfGroupMessages as $key => $value) {
            if ($usersOfGroupMessages[$key]->IDTaiKhoan == Session::get('user')[0]->IDTaiKhoan) {
                unset($usersOfGroupMessages[$key]);
                return array_values($usersOfGroupMessages);
                break;
            }
        }
    }
    public static function getUserOfGroupMessageAPI($idNhomTinNhan, $idTaiKhoan)
    {
        $usersOfGroupMessages = DB::select('SELECT DISTINCT tinnhan.IDTaiKhoan ,AnhDaiDien,Ho,Ten,ThoiGianHoatDong FROM tinnhan INNER JOIN 
        taikhoan ON tinnhan.IDTaiKhoan = taikhoan.IDTaiKhoan
        WHERE tinnhan.IDNhomTinNhan = ? ', [$idNhomTinNhan]);
        foreach ($usersOfGroupMessages as $key => $value) {
            if ($usersOfGroupMessages[$key]->IDTaiKhoan == $idTaiKhoan) {
                unset($usersOfGroupMessages[$key]);
                return array_values($usersOfGroupMessages);
                break;
            }
        }
    }
    public static function getNotificationMessage($idTaiKhoan, $tinhTrang)
    {
        $post = DB::select(
            'SELECT DISTINCT IDContent, MAX(ThoiGianThongBao) 
            FROM thongbao 
            INNER JOIN loaithongbao ON thongbao.IDLoaiThongBao = loaithongbao.IDLoaiThongBao
            WHERE thongbao.IDTaiKhoan = ? AND loaithongbao.Loai = ? 
            AND thongbao.TinhTrang = ?
            GROUP BY IDContent 
            ORDER BY MAX(ThoiGianThongBao) DESC, IDContent',
            [$idTaiKhoan, '1', $tinhTrang]
        );
        return count($post);
    }
    public static function getFullMessageByID($idTaiKhoan)
    {
        $mess = DB::select(
            'SELECT DISTINCT IDNhomTinNhan, MAX(ThoiGianNhanTin) 
        FROM tinnhan 
        WHERE tinnhan.IDTaiKhoan = ?  
        GROUP BY IDNhomTinNhan 
        ORDER BY MAX(ThoiGianNhanTin) DESC, IDNhomTinNhan ',
            [$idTaiKhoan]
        );
        $newArrMess = array();
        foreach ($mess as $key => $value) {
            $new = Tinnhan::select('*', 'tinnhan.TinhTrang')
                ->where('tinnhan.IDNhomTinNhan', '=', $value->IDNhomTinNhan)
                ->where('tinnhan.LoaiTinNhan', '!=', '0')
                ->join('taikhoan', 'tinnhan.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
                ->join('nhomtinnhan', 'tinnhan.IDNhomTinNhan', 'nhomtinnhan.IDNhomTinNhan')
                ->orderby('tinnhan.ThoiGianNhanTin', 'ASC')
                ->get();
            foreach ($new as $keyM => $valueM) {
                $newArrMess[$key][$keyM] = $valueM;
            }
        }
        $temp = array();
        // if (count($newArrMess) >= 2) {
        //     for ($i = 0; $i < count($newArrMess); $i++) {
        //         for ($j = $i + 1; $j < count($newArrMess) - 1; $j++) {
        //             if (
        //                 strtotime($newArrMess[$i][count($newArrMess[$i]) - 1]->ThoiGianNhanTin)
        //                 < strtotime($newArrMess[$j][count($newArrMess[$j]) - 1]->ThoiGianNhanTin)
        //             ) {
        //                 $temp = $newArrMess[$i];
        //                 $newArrMess[$i] = $newArrMess[$j];
        //                 $newArrMess[$j] = $temp;
        //             }
        //         }
        //     }
        // }
        return $newArrMess;
    }
    public static function getIDChangeState($idTinNhan, $idTaiKhoan)
    {
        $tinhTrang = Tinnhan::where('tinnhan.IDTinNhan', '=', $idTinNhan)->get()[0]->TinhTrang;
        $arr = explode('@', $tinhTrang);
        foreach ($arr as $key => $value) {
            if (explode('#', $value)[0] == $idTaiKhoan) {
                unset($arr[$key]);
                return array_values($arr);
                break;
            }
        }
    }
    public static function createState($idNhomTinNhan, $tinhTrang)
    {
        $users = DB::select('SELECT DISTINCT tinnhan.IDTaiKhoan FROM tinnhan 
        WHERE tinnhan.IDNhomTinNhan = ? ', [$idNhomTinNhan]);
        $s = "";
        foreach ($users as $key => $value) {
            $s .= $value->IDTaiKhoan . '#' . $tinhTrang . '@';
        }
        return $s;
    }
    public static function updateState($idTinNhan, $idNhomTinNhan, $tinhTrang)
    {
        $users = DB::select('SELECT DISTINCT tinnhan.IDTaiKhoan FROM tinnhan 
        WHERE tinnhan.IDNhomTinNhan = ? ', [$idNhomTinNhan]);
        $s = "";
        if ($tinhTrang == 2) {
            foreach ($users as $key => $value) {
                $s .= $value->IDTaiKhoan . '#' . $tinhTrang . '@';
            }
            return $s;
        } else {
            $arr = DataProcess::getIDChangeState($idTinNhan, Session::get('user')[0]->IDTaiKhoan);
            foreach ($arr as $key => $value) {
                $s .= $value . '@';
            }
            return $s . Session::get('user')[0]->IDTaiKhoan . '#' . $tinhTrang . '@';
        }
    }
    public static function getState($tinhTrang, $idTaiKhoan)
    {
        $arr = explode('@', $tinhTrang);
        foreach ($arr as $key => $value) {
            if (explode('#', $value)[0] == $idTaiKhoan) {
                return $value;
                break;
            }
        }
    }
    public static function getLocal($local)
    {
        $name = '';
        switch (explode('@', $local)[1]) {
            case '0':
                $name = Diachi::where('diachi.IDDiaChi', '=', explode('@', $local)[0])->get()[0]->TenDiaChi;
                break;
            case '1':
                $name = Truonghoc::where('truonghoc.IDTruongHoc', '=', explode('@', $local)[0])->get()[0]->TenTruongHoc;
                break;
            case '2':
                $name = Congty::where('congty.IDCongTy', '=', explode('@', $local)[0])->get()[0]->TenCongTy;
                break;
            default:
                # code...
                break;
        }
        return ' tại <b class="dark:text-white">' . $name . '</b>';
    }
    public static function getMessageByNhomTinNhan($idNhomTinNhan)
    {
        return Tinnhan::select('*', 'tinnhan.TinhTrang')
            ->where('tinnhan.IDNhomTinNhan', '=', $idNhomTinNhan)
            ->where('tinnhan.LoaiTinNhan', '!=', '0')
            ->join('nhomtinnhan', 'tinnhan.IDNhomTinNhan', 'nhomtinnhan.IDNhomTinNhan')
            ->join('taikhoan', 'tinnhan.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
            ->orderby('tinnhan.ThoiGianNhanTin', 'ASC')
            ->get();
    }
    public static function getMessageByNhomTinNhanLimit($idNhomTinNhan, $skip)
    {
        return Tinnhan::select('*', 'tinnhan.TinhTrang')
            ->take(15)->skip($skip)
            ->where('tinnhan.IDNhomTinNhan', '=', $idNhomTinNhan)
            ->where('tinnhan.LoaiTinNhan', '!=', '0')
            ->join('nhomtinnhan', 'tinnhan.IDNhomTinNhan', 'nhomtinnhan.IDNhomTinNhan')
            ->join('taikhoan', 'tinnhan.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
            ->orderby('tinnhan.ThoiGianNhanTin', 'ASC')
            ->get();
    }
    public static function getTrangThaiTinNhan($trangThai, $idTaiKhoan)
    {
        if ($trangThai == '0') {
            return '1#p';
        } else {
            $arr = explode('@', $trangThai);
            foreach ($arr as $key => $value) {
                if (explode('#', $value)[0] == $idTaiKhoan) {
                } else {
                    return $value;
                    break;
                }
            }
        }
    }
}
