<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Query;
use App\Http\Controllers\Controller;
use App\Models\Baidang;
use App\Models\Story;
use App\Models\Taikhoan;
use App\Models\Yeucaunguoidung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoadDataControllerAd extends Controller
{
    public function loadCategory(Request $request)
    {
        Session::forget('abc');
        Session::forget('def');
        switch ($request->name) {
            case 'dashboard':
                return response()->json([
                    'view' => "" . view('Admin/Component/Category/Dashboard')

                ]);
                break;
            case 'user':
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
                return response()->json([
                    'view' => "" . view('Admin/Component/Category/User')
                        ->with('userTable', $userTable)
                        ->with('data', array())
                ]);
                break;
            case 'post':
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
                return response()->json([
                    'view' => "" . view('Admin/Component/Category/Post')
                        ->with('userPost', $userPost)
                        ->with('data', array())
                ]);
                break;
            case 'story':
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
                return response()->json([
                    'view' => "" . view('Admin/Component/Category/Story')
                        ->with('userStory', $userStory)
                ]);
                break;
            case 'reply':
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
                return response()->json([
                    'view' => "" . view('Admin/Component/Category/Reply')
                        ->with('userReply', $userReply)
                ]);
                break;
            case 'category':
                return response()->json([
                    'view' => "" . view('Admin/Component/Category/Category')
                ]);
                break;
            default:
                break;
        }
    }
    public function loadViewDetail(Request $request)
    {
        switch ($request->name) {
            case 'user':
                $user = Taikhoan::where('taikhoan.IDTaiKhoan', '=', $request->IDTaiKhoan)->get();
                return response()->json([
                    'view' => "" . view('Admin/Modal/User/ModalDetail')
                        ->with('user', $user)
                ]);
                break;
            case 'post':
                $post = Baidang::where('baidang.IDBaiDang', '=', $request->IDTaiKhoan)
                    ->leftjoin('hinhanh', 'baidang.IDBaiDang', 'hinhanh.IDBaiDang')
                    ->join('taikhoan', 'baidang.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
                    ->get();
                return response()->json([
                    'view' => "" . view('Admin/Modal/Post/ModalDetail')
                        ->with('post', $post)
                ]);
                break;
            case 'story':
                $story = Story::where('story.IDStory', '=', $request->IDTaiKhoan)
                    ->join('taikhoan', 'story.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
                    ->get();
                return response()->json([
                    'view' => "" . view('Admin/Modal/Story/ModalDetail')
                        ->with('story', $story)
                ]);
                break;
            case 'reply':
                $reply = Yeucaunguoidung::where(
                    'yeucaunguoidung.IDYeuCauNguoiDung',
                    '=',
                    $request->IDTaiKhoan
                )
                    ->join('taikhoan', 'yeucaunguoidung.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
                    ->get();
                return response()->json([
                    'view' => "" . view('Admin/Modal/Reply/ModalDetail')
                        ->with('reply', $reply)

                ]);
                break;
            default:
                break;
        }
    }
    public function pagination(Request $request)
    {
        switch ($request->name) {
            case 'user':
                $account = Query::getAllAccount(10, $request->index * 10);
                return response()->json([
                    'viewTable' => "" . view('Admin/Component/Child/TableUser')
                        ->with('account', $account)
                        ->with('index', $request->index * 10),
                    'viewPage' => "" . view('Admin/Component/Child/Pagination')
                        ->with('index', $request->index * 10)
                        ->with('num', count(Query::getAllAccountFull()) / 10)
                        ->with('name', 'user')
                ]);
                break;
            case 'post':
                $post = Query::getAllPost(10, $request->index * 10);
                return response()->json([
                    'viewTable' => "" . view('Admin/Component/Child/TablePost')
                        ->with('post', $post)
                        ->with('index', $request->index * 10),
                    'viewPage' => "" . view('Admin/Component/Child/Pagination')
                        ->with('index', $request->index * 10)
                        ->with('num', count(Query::getAllPostFull()) / 10)
                        ->with('name', 'post')
                ]);
                break;
            case 'story':
                $post = Query::getAllStory(10, $request->index * 10);
                return response()->json([
                    'viewTable' => "" . view('Admin/Component/Child/TableStory')
                        ->with('story', $post)
                        ->with('index', $request->index * 10),
                    'viewPage' => "" . view('Admin/Component/Child/Pagination')
                        ->with('index', $request->index * 10)
                        ->with('num', count(Query::getAllStoryFull()) / 10)
                        ->with('name', 'story')
                ]);
                break;
            case 'reply':
                $reply = Query::getAllReply(10, $request->index * 10);
                return response()->json([
                    'viewTable' => "" . view('Admin/Component/Child/TableReply')
                        ->with('reply', $reply)
                        ->with('index', $request->index * 10),
                    'viewPage' => "" . view('Admin/Component/Child/Pagination')
                        ->with('index', $request->index * 10)
                        ->with('num', count(Query::getAllReplyFull()) / 10)
                        ->with('name', 'story')
                ]);
                break;
            default:
                # code...
                break;
        }
    }
}
