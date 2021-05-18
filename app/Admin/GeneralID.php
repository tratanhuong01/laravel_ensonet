<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GeneralID extends Model
{
    public static function ID($table, $column)
    {
        $data = DB::select("SELECT  $column FROM $table  ORDER BY  $column DESC ");
        switch ($table) {
            case 'camxuc':
                $id = $data[0]->IDCamXuc;
                $id = explode('CX', $id)[1];
                $id++;
                return "CX" . $id;
                break;
            case 'truonghoc':
                $id = $data[0]->IDTruongHoc;
                $id = explode('TH', $id)[1];
                $id++;
                return "TH" . $id;
                break;
            case 'diachi':
                $id = $data[0]->IDDiaChi;
                $id = explode('DC', $id)[1];
                $id++;
                return "DC" . $id;
                break;
            case 'congty':
                $id = $data[0]->IDCongTy;
                $id = explode('CT', $id)[1];
                $id++;
                return "CT" . $id;
                break;
            case 'amthanh':
                $id = $data[0]->IDAmThanh;
                $id = explode('AT', $id)[1];
                $id++;
                return "AT" . $id;
                break;
            case 'nhandan':
                $id = $data[0]->IDNhanDan;
                $id = explode('ND', $id)[1];
                $id++;
                return "ND" . $id;
                break;
            case 'amthanh':
                return "";
                break;
            case 'quyenriengtu':
                return "";
                break;
            case 'loaithongbao':
                return "";
                break;
            case 'phongnen':
                $id = $data[0]->IDPhongNen;
                $id = explode('PN', $id)[1];
                $id++;
                return "PN" . $id;
                break;
            default:
                # code...
                break;
        }
    }
}
