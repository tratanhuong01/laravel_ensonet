<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Convert extends Model
{
    public static function userVerify($data)
    {
        switch ($data) {
            case "Chưa xác minh":
                return 0;
                break;
            case "Đang xác minh":
                return 1;
                break;
            case "Đã xác minh":
                return 2;
                break;
            default:
                return -1;
                break;
        }
    }
    public static function userStatus($data)
    {
        switch ($data) {
            case "Checkpoint":
                return 2;
                break;
            case "Khóa":
                return 1;
                break;
            case "Đang gửi yêu câu":
                return 5;
                break;
            case "Bình thường":
                return 0;
                break;
            case "Hạn chế":
                return 3;
                break;
            default:
                return -1;
                break;
        }
    }
    public static function userActivity($data)
    {
        switch ($data) {
            case 'Online':
                return " AND NOW() - DATE_SUB(ThoiGianHoatDong,INTERVAL 30 SECOND) < 30 ";
                break;
            case 'Offline':
                return " AND NOW() - DATE_SUB(ThoiGianHoatDong,INTERVAL 30 SECOND) > 30 ";
                break;
            default:
                return -1;
                break;
        }
    }
    public static function userSex($data)
    {
        switch ($data) {
            case 'Nam':
                return "Nam";
                break;
            case 'Nữ':
                return "Nữ";
                break;
            case 'Khác':
                return "Khác";
                break;

            default:
                return -1;
                break;
        }
    }
    public static function user($data, $value)
    {
        switch ($data) {
            case 'XacMinh':
                return Convert::userVerify($value) == -1 ? "" :
                    " AND " . $data . " = '" . Convert::userVerify($value)  . "' ";
                break;
            case 'TinhTrang':
                return  Convert::userStatus($value) == -1 ? "" :
                    " AND " . $data . " = '" . Convert::userStatus($value)  . "' ";
                break;
            case 'ThoiGianHoatDong':
                return Convert::userActivity($value) == -1 ? "" : Convert::userActivity($value);
                break;
            case 'GioiTinh':
                return Convert::userSex($value) == -1 ? "" :
                    "AND " . $data . " = '" . $value . "' ";
                break;
            default:
                # code...
                break;
        }
    }
    public static function Privacy($data)
    {
        switch ($data) {
            case "Công khai":
                return "CONGKHAI";
                break;
            case "Bạn bè":
                return "CHIBANBE";
                break;
            case "Riêng tư":
                return "RIENGTU";
                break;
            default:
                return -1;
                break;
        }
    }
    public static function postTypePost($data)
    {
        switch ($data) {
            case 'Ảnh đại diện':
                return 0;
                break;
            case 'Ảnh bìa':
                return 1;
                break;
            case 'Thông thường':
                return 2;
                break;
            case 'Chia sẽ':
                return 3;
                break;
            case 'Dòng thời gian':
                return 4;
                break;
            default:
                return -1;
                break;
        }
    }
    public static function storyTypeStory($data)
    {
        switch ($data) {
            case 'Chữ':
                return 0;
                break;
            case 'Ảnh':
                return 1;
                break;
            case 'Video':
                return 2;
                break;
            default:
                return -1;
                break;
        }
    }
    public static function replyTypeRequest($data)
    {
        switch ($data) {
            case 'Cấp lại tài khoản':
                return 0;
                break;
            case 'Quá trình sử dụng':
                return 1;
                break;
            case 'Tích xanh':
                return 2;
                break;
            default:
                return -1;
                break;
        }
    }
    public static function replyStatus($data)
    {
        switch ($data) {
            case 'Đã duyệt':
                return 2;
                break;
            case 'Đang duyệt':
                return 1;
                break;
            case 'Từ chối duyệt':
                return 0;
                break;
            default:
                return -1;
                break;
        }
    }
    public static function post($data, $value)
    {
        switch ($data) {
            case 'IDQuyenRiengTu':
                return Convert::Privacy($value) == -1 ? "" :
                    " AND " . $data . " = '" . Convert::Privacy($value)  . "' ";
                break;
            case 'LoaiBaiDang':
                return  Convert::postTypePost($value) == -1 ? "" :
                    " AND " . $data . " = '" . Convert::postTypePost($value)  . "' ";
                break;
            default:
                # code...
                break;
        }
    }
    public static function story($data, $value)
    {
        switch ($data) {
            case 'IDQuyenRiengTu':
                return Convert::Privacy($value) == -1 ? "" :
                    " AND " . $data . " = '" . Convert::Privacy($value)  . "' ";
                break;
            case 'LoaiStory':
                return  Convert::storyTypeStory($value) == -1 ? "" :
                    " AND " . $data . " = '" . Convert::storyTypeStory($value)  . "' ";
                break;
            default:
                # code...
                break;
        }
    }
    public static function reply($data, $value)
    {
        switch ($data) {
            case 'LoaiYeuCau':
                return  Convert::replyTypeRequest($value) == -1 ? "" :
                    " AND " . $data . " = '" . Convert::replyTypeRequest($value)  . "' ";
                break;
            case 'TinhTrangYeuCau':
                return Convert::replyStatus($value) == -1 ? "" :
                    " AND " . $data . " = '" . Convert::replyStatus($value) . "' ";
            default:
                # code...
                break;
        }
    }
    public static function sort($data)
    {
        switch ($data) {
            case "Tăng dần":
                return "ASC";
                break;

            case "Giảm dần":
                return "DESC";
                break;

            default:
                return -1;
                break;
        }
    }
}
