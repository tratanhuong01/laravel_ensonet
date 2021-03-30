<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $table = "story";

    protected $fillable = [
        'IDStory',
        'IDQuyenRiengTu',
        'IDTaiKhoan',
        'IDPhongNen',
        'DuongDan',
        'LoaiStory',
        'ThoiGianDangStory',
        'AmThanh'
    ];
    public static function add(
        $IDStory,
        $IDQuyenRiengTu,
        $IDTaiKhoan,
        $IDPhongNen,
        $DuongDan,
        $LoaiStory,
        $ThoiGianDangStory,
        $amThanh
    ) {
        $story = new Story;
        $story->IDStory = $IDStory;
        $story->IDQuyenRiengTu = $IDQuyenRiengTu;
        $story->IDTaiKhoan = $IDTaiKhoan;
        $story->IDPhongNen = $IDPhongNen;
        $story->DuongDan = $DuongDan;
        $story->LoaiStory = $LoaiStory;
        $story->ThoiGianDangStory = $ThoiGianDangStory;
        $story->AmThanh = $amThanh;
        $story->save();
    }
    public $timestamps = false;
}
