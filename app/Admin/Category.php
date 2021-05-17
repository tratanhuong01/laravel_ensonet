<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public static function category()
    {
        $category = [
            "address" => (object)[
                "Name" => "Bảng địa chỉ",
                "View" => "" . view('Admin.Component.DetailCategory.Address')
            ],
            "company" => (object)[
                "Name" => "Bảng công ty",
                "View" => "" . view('Admin.Component.DetailCategory.Company')
            ],
            "school" => (object)[
                "Name" => "Bảng trường học",
                "View" => "" . view('Admin.Component.DetailCategory.School')
            ],
            "sound" => (object)[
                "Name" => "Bảng âm thanh",
                "View" => "" . view('Admin.Component.DetailCategory.Sound')
            ],
            "sticker" => (object)[
                "Name" => "Bảng nhãn dán",
                "View" => "" . view('Admin.Component.DetailCategory.Sticker')
            ],
            "colorMessenge" => (object)[
                "Name" => "Bảng màu tin nhắn",
                "View" => "" . view('Admin.Component.DetailCategory.ColorMessage')
            ],
            "school" => (object)[
                "Name" => "Bảng trường học",
                "View" => "" . view('Admin.Component.DetailCategory.School')
            ],
            "background" => (object)[
                "Name" => "Bảng phông nền",
                "View" => "" . view('Admin.Component.DetailCategory.Background')
            ],
            "typeNotify" => (object)[
                "Name" => "Bảng phông nền",
                "View" => "" . view('Admin.Component.DetailCategory.TypeNotify')
            ],
            "feel" => (object)[
                "Name" => "Bảng phông nền",
                "View" => "" . view('Admin.Component.DetailCategory.Feel')
            ],
            "privacy" => (object)[
                "Name" => "Bảng quyền riêng tư",
                "View" => "" . view('Admin.Component.DetailCategory.Privacy')
            ],
        ];
        return $category;
    }
}
