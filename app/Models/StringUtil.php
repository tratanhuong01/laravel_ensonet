<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StringUtil extends Model
{
    public static function taoID()
    {
        $data = DB::table('taikhoan')->orderBy('IDTaiKhoan', 'DESC')->first();
        $idInt = $data->IDTaiKhoan;
        $idInt++;
        return $idInt;
    }
    public static function ID($table, $id)
    {
        $data = DB::table($table)->orderBy($id, 'DESC')->first();
        $idInt = $data->$id;
        $idInt++;
        return $idInt;
    }
    public static function CheckDateTime($datetime)
    {
        $d = explode('-', explode(' ', $datetime)[0])[2];
        $mon = explode('-', explode(' ', $datetime)[0])[1];
        $h = explode(':', explode(' ', $datetime)[1])[0];
        $m = explode(':', explode(' ', $datetime)[1])[1];
        $s = explode(':', explode(' ', $datetime)[1])[2];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $result = "";
        $timeInput = strtotime($datetime);
        $timeCurrent = time();
        $time = $timeCurrent - $timeInput;
        $sec = $time;
        $min = round($sec / 60);
        $hour = round($sec / (3600));
        $day = round($sec / (86400));
        $week = round($sec / 604800);
        $month = round($sec / 2629440);
        $year = round($sec / 31553280);
        if ($sec <= 60) {
            $result = "Vừa xong";
        } else if ($min <= 60) {
            if ($min == 1) {
                $result = "1 phút trước";
            } else {
                $result = "$min phút trước";
            }
        } else if ($hour < 24) {
            if ($hour == 1) {
                $result = "1 giờ";
            } else {
                $result = "$hour giờ";
            }
        } else if ($day <= 7) {
            if ($day == 1) {
                $result = "Hôm qua lúc $h : $m : $s";
            } else {
                $result = "$d tháng $mon lúc $h : $m : $s";
            }
        } else if ($week <= 4.3) //4.3 == 52/12  
        {
            if ($week == 1) {
                $result = "1 tuần";
            } else {
                $result = "$week tuần trước";
            }
        } else if ($month <= 12) {
            if ($month == 1) {
                $result = "1 tháng trước";
            } else {
                $result = "$month tháng trước";
            }
        } else {
            if ($year == 1) {
                return "1 năm trước";
            } else {
                return "$year năn trước";
            }
        }
        return $result;
    }
    public static function CheckDateTimeRequest($datetime)
    {
        $d = explode('-', explode(' ', $datetime)[0])[2];
        $m = explode('-', explode(' ', $datetime)[0])[1];
        $h = explode(':', explode(' ', $datetime)[1])[0];
        $m = explode(':', explode(' ', $datetime)[1])[1];
        $s = explode(':', explode(' ', $datetime)[1])[2];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $result = "";
        $timeInput = strtotime($datetime);
        $timeCurrent = time();
        $time = $timeCurrent - $timeInput;
        $sec = $time;
        $min = round($sec / 60);
        $hour = round($sec / (3600));
        $day = round($sec / (86400));
        $week = round($sec / 604800);
        $month = round($sec / 2629440);
        $year = round($sec / 31553280);
        if ($sec <= 60) {
            $result = "Vừa xong";
        } else if ($min <= 60) {
            if ($min == 1) {
                $result = "1 phút trước";
            } else {
                $result = "$min phút trước";
            }
        } else if ($hour < 24) {
            if ($hour == 1) {
                $result = "1 giờ";
            } else {
                $result = "$hour giờ";
            }
        } else if ($day <= 7) {
            if ($day == 1) {
                $result = "Hôm qua";
            } else {
                $result = "$day ngày trước";
            }
        } else if ($week <= 4.3) //4.3 == 52/12  
        {
            if ($week == 1) {
                $result = "1 tuần";
            } else {
                $result = "$week tuần trước";
            }
        } else if ($month <= 12) {
            if ($month == 1) {
                $result = "1 tháng trước";
            } else {
                $result = "$month tháng trước";
            }
        } else {
            if ($year == 1) {
                return "1 năm trước";
            } else {
                return "$year năn trước";
            }
        }
        return $result;
    }
    public static function CheckDateTimeUserActivity($datetime)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $result = "";
        $timeInput = strtotime($datetime);
        $timeCurrent = time();
        $time = $timeCurrent - $timeInput;
        $sec = $time;
        $min = round($sec / 60);
        $hour = round($sec / (3600));
        if ($hour > 23) {
            $result = "";
        } else if ($min <= 60) {
            if ($min == 1) {
                $result = "Hoạt động 1 phút trước";
            } else if ($sec < 60) {
                $result = "Đang hoạt động";
            } else {
                $result = "Hoạt động $min phút trước";
            }
        } else {
            if ($hour == 1) {
                $result = "Hoạt động 1 giờ";
            } else {
                $result = "Hoạt động $hour giờ";
            }
        }
        return $result;
    }
    public static function CheckDateTimeStory($datetime)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $result = "";
        $timeInput = strtotime($datetime);
        $timeCurrent = time();
        $time = $timeCurrent - $timeInput;
        $sec = $time;
        $min = round($sec / 60);
        $hour = round($sec / (3600));
        if ($hour > 24) {
            $result = "";
        } else if ($min <= 60) {
            if ($min == 1) {
                $result = "1 phút trước";
            } else if ($sec < 60) {
                $result = "Vừa xong";
            } else {
                $result = "$min phút trước";
            }
        } else {
            if ($hour == 1) {
                $result = "1 giờ";
            } else {
                $result = "$hour giờ";
            }
        }
        return $result;
    }
    public static function createNameFileCMND($id, $num)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $datetime = date("Y-m-d H:i:s");
        $d = explode('-', explode(' ', $datetime)[0])[2];
        $m = explode('-', explode(' ', $datetime)[0])[1];
        $y = explode('-', explode(' ', $datetime)[0])[0];
        $h = explode(':', explode(' ', $datetime)[1])[0];
        $m = explode(':', explode(' ', $datetime)[1])[1];
        $s = explode(':', explode(' ', $datetime)[1])[2];
        return $id . $d . $m . $y . $h . $m . $s . '_' . '_' . $num . 'CMND';
    }
    public static function getDateUse($datetime)
    {
        $m = explode('-', explode(' ', $datetime)[0])[1];
        $y = explode('-', explode(' ', $datetime)[0])[0];
        return 'Đã tham gia tháng ' . $m . ' năm ' . $y;
    }
    public static function getChillDateTime($datetime)
    {
        $d = explode('-', explode(' ', $datetime)[0])[2];
        $n = explode('-', explode(' ', $datetime)[0])[1];
        $y = explode('-', explode(' ', $datetime)[0])[0];
        $h = explode(':', explode(' ', $datetime)[1])[0];
        $m = explode(':', explode(' ', $datetime)[1])[1];
        $s = explode(':', explode(' ', $datetime)[1])[2];
        return array($d, $n, $y, $h, $m, $s);
    }
    public static function getTimeChat($datetime)
    {
        $d = explode('-', explode(' ', $datetime)[0])[2];
        $t = explode('-', explode(' ', $datetime)[0])[1];
        $y = explode('-', explode(' ', $datetime)[0])[0];
        $h = explode(':', explode(' ', $datetime)[1])[0];
        $m = explode(':', explode(' ', $datetime)[1])[1];
        $s = explode(':', explode(' ', $datetime)[1])[2];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $timeInput = strtotime($datetime);
        $timeCenter = strtotime(explode(' ', date("Y-m-d H:i:s"))[0] . ' 00:00:00');
        $timeCurrent = time();
        $timeDived = $timeCurrent - $timeCenter;
        $time = $timeCurrent - $timeInput;
        $sec = $time;
        $day = round($sec / (86400));
        $week = round($sec / 604800);
        $month = round($sec / 2629440);
        $year = round($sec / 31553280);
        if ($time < $timeDived)
            return $h . ' : ' . $m;
        else
            return $h . ' : ' . $m . ' , ' . $d . ' Tháng ' . $t . ' , ' . $y;
    }
    public static function convert_name($str)
    {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        $str = preg_replace("/(đ)/", 'd', $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
        $str = preg_replace("/(Đ)/", 'D', $str);
        $str = preg_replace("/(\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/", '-', $str);
        $str = preg_replace("/( )/", '-', $str);
        return strtolower($str);
    }
}
