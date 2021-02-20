<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class StringUtil extends Model
{
    public static function taoID() {
        $data = DB::table('taikhoan')->orderBy('IDTaiKhoan', 'DESC')->first();
        $idInt = $data->IDTaiKhoan;
        $idInt++;
        return $idInt;
    }
    public static function ID($table,$id) {
        $data = DB::table($table)->orderBy($id, 'DESC')->first();
        $idInt = $data->$id;
        $idInt++;
        return $idInt;
    }
    public static function CheckDateTime($datetime) {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $result = "";
        $timeInput = strtotime($datetime);
        $timeCurrent = time();
        $time = $timeCurrent - $timeInput;
        $sec = $time;
        $min = round($sec/60);
        $hour = round($sec/(3600));
        $day = round($sec/(86400));
        $week = round($sec/604800);
        $month = round($sec/2629440);
        $year = round($sec/31553280);
        if($sec <= 60)  
        {  
            $result = "Vừa xong";  
        }  
        else if($min <=60)  
        {  
            if($min==1)  
            {  
                $result = "1 phút trước";  
            }  
            else  
            {  
                $result = "$min phút trước";  
            }  
        }  
        else if($hour <=24)  
        {  
            if($hour==1)  
            {  
                $result = "1 giờ";  
            }  
            else  
            {  
                $result = "$hour giờ";  
            }  
        }  
        else if($day <= 7)  
        {  
            if($day==1)  
            {  
                $result = "Hôm qua";  
            }  
            else  
            {  
                $result = "$day ngày trước";  
            }  
        }  
        else if($week <= 4.3) //4.3 == 52/12  
        {  
            if($week==1)  
            {  
                $result = "1 tuần";  
            }  
            else  
            {  
                $result = "$week tuần trước";  
            }  
        }  
        else if($month <=12)  
        {  
            if($month==1)  
            {  
                $result = "1 tháng trước";  
            }  
            else  
            {  
                $result = "$month tháng trước";  
            }  
        }  
        else  
        {  
            if($year==1)  
            {  
                return "1 năm trước";  
            }  
            else  
            {  
                return "$year năn trước";  
            }  
        } 
        return $result;
    }
}
