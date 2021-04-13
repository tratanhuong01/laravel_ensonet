<?php

namespace App\Process;

use App\Models\Congty;
use App\Models\Diachi;
use App\Models\Truonghoc;
use Illuminate\Database\Eloquent\Model;

class DataProcessSix extends Model
{
    public static function CheckIsImage($nameFile)
    {
        $typeFile = ['PNG', 'png', 'jpg', 'JPG', 'gif', 'GIF'];
        foreach ($typeFile as $key => $value) {
            if (substr($nameFile, -3) == $value)
                return true;
        }
    }
    public static function CheckIsVideo($nameFile)
    {
        $typeFile = ['MP4', 'mp4', 'MOV', 'mov', 'mkv', 'MKV'];
        foreach ($typeFile as $key => $value) {
            if (substr($nameFile, -3) == $value)
                return true;
        }
    }
    public static function createAllAddress()
    {
        $new = array();
        $index = 0;
        $data = Diachi::get();
        foreach ($data as $key => $value) {
            $new[$index] = (object)[
                'ID' => $value->IDDiaChi,
                'Ten' => $value->TenDiaChi,
                'Loai' => '0'
            ];
            $index++;
        }
        $data = Truonghoc::get();
        foreach ($data as $key => $value) {
            $new[$index] = (object)[
                'ID' => $value->IDTruongHoc,
                'Ten' => $value->TenTruongHoc,
                'Loai' => '1'
            ];
            $index++;
        }
        $data = Congty::get();
        foreach ($data as $key => $value) {
            $new[$index] = (object)[
                'ID' => $value->IDCongTy,
                'Ten' => $value->TenCongTy,
                'Loai' => '2'
            ];
            $index++;
        }
        return $new;
    }
    public static function searchAllAddress($array, $value)
    {
        $newArray = array();
        $index = 0;
        foreach ($array as $key => $values) {
            if (str_contains(strtolower($values->Ten), strtolower($value))) {
                $newArray[$index] = $values;
                $index++;
            }
        }
        return $newArray;
    }
}
