<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gioithieu;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/user', function () {
    $userTable = (object)[
        "Filter" => (object)[
            "State" => (object)[
                "Name" => "Tình trạng",
                "Data" => [
                    "Tất cả",
                    "Checkpoint",
                    "Khóa",
                    "Bình thường",
                    "Hạn chế"
                ],
                'ValueQuery' =>  "TinhTrang"
            ],
            "Status" => (object)[
                "Name" => "Xác Minh",
                "Data" => [
                    "Tất cả",
                    "Chưa xác minh",
                    "Đang xác minh",
                    "Đã xác minh"
                ],
                'ValueQuery' =>  "XacMinh"
            ],
            "Activity" => (object)[
                "Name" => "Hoạt động",
                "Data" => [
                    "Tất cả",
                    "Online",
                    "Offline"
                ],
                'ValueQuery' =>  "ThoiGianHoatDong"
            ],
            'Sex' => (object)[
                'Name' => "Giới tính",
                "Data" => [
                    "Tất cả",
                    "Nam",
                    "Nữ",
                    "Khác"
                ],
                'ValueQuery' =>  "GioiTinh"
            ]
        ],
        "Sort" => (object)[
            "Name" => (object)[
                "Name" => "Tên",
                "Data" => [
                    "Tăng dần",
                    "Giảm dần"
                ],
                'ValueQuery' =>  "Ten"
            ],
            "BirthDay" => (object)[
                "Name" => "Ngày sinh",
                "Data" => [
                    "Tăng dần",
                    "Giảm dần"
                ],
                'ValueQuery' =>  "NgaySinh"
            ],
            "TimeCreated" => (object)[
                "Name" => "Thời gian tạo",
                "Data" => [
                    "Tăng dần",
                    "Giảm dần"
                ],
                'ValueQuery' =>  "NgayTao"
            ],
        ]
    ];
    return view('Admin/index')
        ->with('table', $userTable)
        ->with('data', array());
});
Route::get('/post', function () {
    $userPost = (object)[
        "Filter" => (object)[
            "TypePost" => (object)[
                "Name" => "Loại bài đăng",
                "Data" => [
                    "Tất cả",
                    "Ảnh đại diện",
                    "Ảnh bìa",
                    "Chia sẽ",
                    "Dòng thời gian"
                ],
                'ValueQuery' =>  "LoaiBaiDang"
            ],
            "Privacy" => (object)[
                "Name" => "Quyền riêng tư",
                "Data" => [
                    "Tất cả",
                    "Công khai",
                    "Bạn bè",
                    "Riêng tư"
                ],
                'ValueQuery' =>  "IDQuyenRiengTu"
            ]
        ],
        "Sort" => (object)[
            "TimePost" => (object)[
                "Name" => "Thời gian đăng",
                "Data" => [
                    "Tăng dần",
                    "Giảm dần"
                ],
                'ValueQuery' =>  "NgayDang"
            ],
            "NumberComment" => (object)[
                "Name" => "Số lượng bình luận",
                "Data" => [
                    "Tăng dần",
                    "Giảm dần"
                ],
                'ValueQuery' =>  "SoLuongBinhLuan"
            ],
            "NumberFeel" => (object)[
                "Name" => "Số lượng cảm xúc",
                "Data" => [
                    "Tăng dần",
                    "Giảm dần"
                ],
                'ValueQuery' =>  "SoLuongCamXuc"
            ],
        ]
    ];
    return view('Admin/index')
        ->with('table', $userPost)
        ->with('data', array());;
});
Route::get('/story', function () {
    $userStory = (object)[
        "Filter" => (object)[
            "TypePost" => (object)[
                "Name" => "Loại story",
                "Data" => [
                    "Tất cả",
                    "Chữ",
                    "Ảnh",
                    "Video"
                ],
                'ValueQuery' =>  "LoaiStory"
            ],
            "Privacy" => (object)[
                "Name" => "Quyền riêng tư",
                "Data" => [
                    "Tất cả",
                    "Công khai",
                    "Bạn bè",
                    "Riêng tư"
                ],
                'ValueQuery' =>  "IDQuyenRiengTu"
            ]
        ],
        "Sort" => (object)[
            "TimePost" => (object)[
                "Name" => "Thời gian đăng",
                "Data" => [
                    "Tăng dần",
                    "Giảm dần"
                ],
                'ValueQuery' =>  "ThoiGianDangStory"
            ],
            "View" => (object)[
                "Name" => "Lượt xem",
                "Data" => [
                    "Tăng dần",
                    "Giảm dần"
                ],
                'ValueQuery' =>  ""
            ],
        ]
    ];
    return view('Admin/index')
        ->with('table', $userStory)
        ->with('data', array());;
});
Route::get('/reply', function () {
    $userReply = (object)[
        "Filter" => (object)[
            "TypePost" => (object)[
                "Name" => "Loại yêu cầu",
                "Data" => [
                    "Tất cả",
                    "Cấp lại tài khoản",
                    "Quá trình sử dụng",
                    "Tích xanh",
                ],
                'ValueQuery' =>  "LoaiYeuCau"
            ],
            "Privacy" => (object)[
                "Name" => "Tình trạng",
                "Data" => [
                    "Tất cả",
                    "Đã duyệt",
                    "Đang duyệt",
                    "Từ chối duyệt"
                ],
                'ValueQuery' =>  "TinhTrangYeuCau"
            ]
        ],
        "Sort" => (object)[
            "TimePost" => (object)[
                "Name" => "Thời gian yêu cầu",
                "Data" => [
                    "Tăng dần",
                    "Giảm dần"
                ],
                'ValueQuery' =>  "ThoiGianYeuCau"
            ],
        ]
    ];
    return view('Admin/index')
        ->with('table', $userReply)
        ->with('data', array());;
});
Route::get('/category', function () {
    return view('Admin/index');
});

Route::get('check', function () {
});
