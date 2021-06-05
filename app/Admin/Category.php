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
                'viewCategory' => "" . view('Admin.Component.DetailCategory.Address')
                    ->with('address', Query::getAllAddress(10, 0))
                    ->with('index', 0)
                    ->with('addressFull', Query::getAllAddressFull()),
                'viewPagination' => "" . view('Admin.Component.DetailCategory.Child.Pagination')
                    ->with('index', 0)
                    ->with('addressFull', Query::getAllAddressFull())
                    ->with('num', count(Query::getAllAddressFull()) / 10)
                    ->with('name', 'address')
            ],
            "company" => (object)[
                "Name" => "Bảng công ty",
                'viewCategory' => "" . view('Admin.Component.DetailCategory.Company')
                    ->with('company', Query::getAllCompany(10, 0))
                    ->with('index', 0)
                    ->with('companyFull', Query::getAllCompanyFull()),
                'viewPagination' => "" . view('Admin.Component.DetailCategory.Child.Pagination')
                    ->with('index', 0)
                    ->with('companyFull', Query::getAllCompanyFull())
                    ->with('num', count(Query::getAllCompanyFull()) / 10)
                    ->with('name', 'company')
            ],
            "school" => (object)[
                "Name" => "Bảng trường học",
                'viewCategory' => "" . view('Admin.Component.DetailCategory.School')
                    ->with('school', Query::getAllSchool(10, 0))
                    ->with('index', 0)
                    ->with('schoolFull', Query::getAllSchoolFull()),
                'viewPagination' => "" . view('Admin.Component.DetailCategory.Child.Pagination')
                    ->with('index', 0)
                    ->with('schoolFull', Query::getAllSchoolFull())
                    ->with('num', count(Query::getAllSchoolFull()) / 10)
                    ->with('name', 'school')
            ],
            "sound" => (object)[
                "Name" => "Bảng âm thanh",
                'viewCategory' => "" . view('Admin.Component.DetailCategory.Sound')
                    ->with('sound', Query::getAllSound(10, 0))
                    ->with('index', 0)
                    ->with('soundFull', Query::getAllSoundFull()),
                'viewPagination' => "" . view('Admin.Component.DetailCategory.Child.Pagination')
                    ->with('index', 0)
                    ->with('soundFull', Query::getAllSoundFull())
                    ->with('num', count(Query::getAllSoundFull()) / 10)
                    ->with('name', 'sound')
            ],
            "sticker" => (object)[
                "Name" => "Bảng nhãn dán",
                'viewCategory' => "" . view('Admin.Component.DetailCategory.Sticker')
                    ->with('sticker', Query::getAllSticker(10, 0))
                    ->with('index', 0)
                    ->with('stickerFull', Query::getAllStickerFull()),
                'viewPagination' => "" . view('Admin.Component.DetailCategory.Child.Pagination')
                    ->with('index', 0)
                    ->with('stickerFull', Query::getAllStickerFull())
                    ->with('num', count(Query::getAllStickerFull()) / 10)
                    ->with('name', 'sticker')
            ],
            "colorMessage" => (object)[
                "Name" => "Bảng màu tin nhắn",
                'viewCategory' => "" . view('Admin.Component.DetailCategory.ColorMessage')
                    ->with('colorMessage', Query::getAllColorMessage(10, 0))
                    ->with('index', 0)
                    ->with('colorMessageFull', Query::getAllColorMessageFull()),
                'viewPagination' => "" . view('Admin.Component.DetailCategory.Child.Pagination')
                    ->with('index', 0)
                    ->with('colorMessageFull', Query::getAllColorMessageFull())
                    ->with('num', count(Query::getAllColorMessageFull()) / 10)
                    ->with('name', 'colorMessage')
            ],
            "background" => (object)[
                "Name" => "Bảng phông nền",
                'viewCategory' => "" . view('Admin.Component.DetailCategory.Background')
                    ->with('background', Query::getAllBackground(10, 0))
                    ->with('index', 0)
                    ->with('backgroundFull', Query::getAllBackgroundFull()),
                'viewPagination' => "" . view('Admin.Component.DetailCategory.Child.Pagination')
                    ->with('index', 0)
                    ->with('backgroundFull', Query::getAllBackgroundFull())
                    ->with('num', count(Query::getAllBackgroundFull()) / 10)
                    ->with('name', 'background')
            ],
            "typeNotify" => (object)[
                "Name" => "Bảng loại thông báo",
                'viewCategory' => "" . view('Admin.Component.DetailCategory.TypeNotify')
                    ->with('typeNotify', Query::getAllTypeNotify(10, 0))
                    ->with('index', 0)
                    ->with('typeNotifyFull', Query::getAllTypeNotifyFull()),
                'viewPagination' => "" . view('Admin.Component.DetailCategory.Child.Pagination')
                    ->with('index', 0)
                    ->with('typeNotifyFull', Query::getAllTypeNotifyFull())
                    ->with('num', count(Query::getAllTypeNotifyFull()) / 10)
                    ->with('name', 'typeNotify')
            ],
            "feel" => (object)[
                "Name" => "Bảng cảm xúc",
                'viewCategory' => "" . view('Admin.Component.DetailCategory.Feel')
                    ->with('feel', Query::getAllFeel(10, 0))
                    ->with('index', 0)
                    ->with('feelFull', Query::getAllFeelFull()),
                'viewPagination' => "" . view('Admin.Component.DetailCategory.Child.Pagination')
                    ->with('index', 0)
                    ->with('feelFull', Query::getAllFeelFull())
                    ->with('num', count(Query::getAllFeelFull()) / 10)
                    ->with('name', 'feel')
            ],
            "privacy" => (object)[
                "Name" => "Bảng quyền riêng tư",
                'viewCategory' => "" . view('Admin.Component.DetailCategory.Privacy')
                    ->with('privacy', Query::getAllPrivacy(10, 0))
                    ->with('index', 0)
                    ->with('privacyFull', Query::getAllPrivacyFull()),
                'viewPagination' => "" . view('Admin.Component.DetailCategory.Child.Pagination')
                    ->with('index', 0)
                    ->with('privacyFull', Query::getAllPrivacyFull())
                    ->with('num', count(Query::getAllPrivacyFull()) / 10)
                    ->with('name', 'privacy')
            ],
        ];
        return $category;
    }
    public static function generalModalAdd()
    {
        $modal = [
            "address" => (object)[
                'title' => 'Thêm địa chỉ',
                'data' => [
                    'line1' => (object)[
                        'Label' => 'ID Địa Chỉ',
                        'Data' => (object)[
                            'placeHolder' => '',
                            'name' => 'IDDiaChi',
                            'value' => '',
                            'id' => 'IDDiaChi',
                            'disabled' => 'true'
                        ],
                        'Type' => 'Input'
                    ],
                    'line2' => (object)[
                        'Label' => 'Tên Địa Chỉ',
                        'Data' => (object)[
                            'placeHolder' => 'Nhập tên địa chỉ...',
                            'name' => 'TenDiaChi',
                            'value' => '',
                            'id' => 'TenDiaChi',
                            'disabled' => 'false'
                        ],
                        'Type' => 'Input'
                    ]
                ],
                'type' => 'address',
                'table' => 'diachi',
                'ID' => 'IDDiaChi'
            ],
            "company" => (object)[
                'title' => 'Thêm công ty',
                'data' => [
                    'line1' => (object)[
                        'Label' => 'ID Công Ty',
                        'Data' => (object)[
                            'placeHolder' => '',
                            'name' => 'IDCongTy',
                            'value' => '',
                            'id' => 'IDCongTy',
                            'disabled' => 'true'
                        ],
                        'Type' => 'Input'
                    ],
                    'line2' => (object)[
                        'Label' => 'Tên Công Ty',
                        'Data' => (object) [
                            'placeHolder' => 'Nhập tên công ty...',
                            'name' => 'TenCongTy',
                            'value' => '',
                            'id' => 'TenCongTy',
                            'disabled' => 'false'
                        ],
                        'Type' => 'Input'
                    ]
                ],
                'type' => 'company',
                'table' => 'congty',
                'ID' => 'IDCongTy'
            ],
            "school" => (object)[
                'title' => 'Thêm trường học',
                'data' => [
                    'line1' => (object)[
                        'Label' => 'ID Trường Học',
                        'Data' => (object)[
                            'placeHolder' => '',
                            'name' => 'IDTruongHoc',
                            'value' => '',
                            'id' => 'IDTruongHoc',
                            'disabled' => 'true'
                        ],
                        'Type' => 'Input'
                    ],
                    'line2' => (object)[
                        'Label' => 'Tên Trường Học',
                        'Data' => (object) [
                            'placeHolder' => 'Nhập tên trường học...',
                            'name' => 'TenTruongHoc',
                            'value' => '',
                            'id' => 'TenTruongHoc',
                            'disabled' => 'false'
                        ],
                        'Type' => 'Input'
                    ],
                    'line3' => (object)[
                        'Label' => 'Loại Trường Học',
                        'Data' => (object) [
                            'Select' => (object)[
                                'name' => 'LoaiTruongHoc'
                            ],
                            'Option' => [
                                'Đại học' => 'Đại học',
                                'Cao đẳng' => 'Cao đẳng',
                                'Trung cấp' => 'Trung cấp',
                                'THPT' => 'THPT',
                                'THCS' => 'THCS',
                                'TH' => 'TH',
                                'Mẫu giáo' => 'Mẫu giáo',
                            ]
                        ],
                        'Type' => 'Select'
                    ]
                ],
                'type' => 'school',
                'table' => 'truonghoc',
                'ID' => 'IDTruongHoc'
            ],
            "sound" => (object)[
                'title' => 'Thêm âm thanh',
                'data' => [
                    'line1' => (object)[
                        'Label' => 'ID Âm Thanh',
                        'Data' => (object)[
                            'placeHolder' => '',
                            'name' => 'IDAmThanh',
                            'value' => '',
                            'id' => 'IDAmThanh',
                            'disabled' => 'true'
                        ],
                        'Type' => 'Input'
                    ],
                    'line2' => (object)[
                        'Label' => 'Tên Âm Thanh',
                        'Data' => (object) [
                            'placeHolder' => 'Nhập tên âm thanh...',
                            'name' => 'TenAmThanh',
                            'value' => '',
                            'id' => 'TenAmThanh',
                            'disabled' => 'false'
                        ],
                        'Type' => 'Input'
                    ],
                    'line3' => (object)[
                        'Label' => 'Tác giả',
                        'Data' => (object) [
                            'placeHolder' => 'Nhập tác giả...',
                            'name' => 'TacGia',
                            'value' => '',
                            'id' => 'TacGia',
                            'disabled' => 'false'
                        ],
                        'Type' => 'Input',
                    ],
                    'line4' => (object)[
                        'Label' => 'File',
                        'Data' => (object) [
                            'name' => 'File',
                            'id' => 'File',
                        ],
                        'Type' => 'File',
                        'Accept' => 'audio/mp3'
                    ],
                ],
                'type' => 'sound',
                'table' => 'amthanh',
                'ID' => 'IDAmThanh'
            ],
            "sticker" => (object)[
                'title' => 'Thêm nhãn dán',
                'data' => [
                    'line1' => (object)[
                        'Label' => 'ID Nhãn Dán',
                        'Data' => (object)[
                            'placeHolder' => '',
                            'name' => 'IDNhanDan',
                            'value' => '',
                            'id' => 'IDNhanDan',
                            'disabled' => 'true'
                        ],
                        'Type' => 'Input'
                    ],
                    'line2' => (object)[
                        'Label' => 'Nhóm nhãn dán',
                        'Data' => (object) [
                            'placeHolder' => 'Nhập nhóm nhãn dán...',
                            'name' => 'NhomNhanDan',
                            'value' => '',
                            'id' => 'NhomNhanDan',
                            'disabled' => 'false'
                        ],
                        'Type' => 'Input'
                    ],
                    'line3' => (object)[
                        'Label' => 'Dòng nhãn dán',
                        'Data' => (object) [
                            'placeHolder' => 'Nhập dòng nhãn dán...',
                            'name' => 'DongNhanDan',
                            'value' => '',
                            'id' => 'DongNhanDan',
                            'disabled' => 'false'
                        ],
                        'Type' => 'Input',
                    ],
                    'line4' => (object)[
                        'Label' => 'Hàng',
                        'Data' => (object) [
                            'placeHolder' => 'Nhập hàng...',
                            'name' => 'Hang',
                            'value' => '',
                            'id' => 'Hang',
                            'disabled' => 'false'
                        ],
                        'Type' => 'Input',
                    ],
                    'line5' => (object)[
                        'Label' => 'Cột',
                        'Data' => (object) [
                            'placeHolder' => 'Nhập cột...',
                            'name' => 'Cot',
                            'value' => '',
                            'id' => 'Cot',
                            'disabled' => 'false'
                        ],
                        'Type' => 'Input',
                    ],
                    'line6' => (object)[
                        'Label' => 'Ảnh',
                        'Data' => (object) [
                            'name' => 'File',
                            'id' => 'File',
                        ],
                        'Type' => 'File',
                        'Accept' => 'sticker'
                    ],
                ],
                'type' => 'sticker',
                'table' => 'nhandan',
                'ID' => 'IDNhanDan'
            ],
            "colorMessage" => (object)[
                'title' => 'Thêm màu tin nhắn',
                'data' => [
                    'line1' => (object)[
                        'Label' => 'ID Màu Tin Nhắn',
                        'Data' => (object)[
                            'placeHolder' => 'Nhập ID màu tin nhắn...',
                            'name' => 'IDMauTinNhan',
                            'value' => '',
                            'id' => 'IDMauTinNhan',
                            'disabled' => 'false'
                        ],
                        'Type' => 'Input'
                    ],
                    'line2' => (object)[
                        'Label' => 'Tên Màu',
                        'Data' => (object) [
                            'placeHolder' => 'Nhập tên màu...',
                            'name' => 'TenMau',
                            'value' => '',
                            'id' => 'TenMau',
                            'disabled' => 'false'
                        ],
                        'Type' => 'Input'
                    ],
                    'line3' => (object)[
                        'Label' => 'Màu',
                        'Data' => (object) [
                            'placeHolder' => 'Nhập tên màu...',
                            'name' => 'TenMau',
                            'value' => '',
                            'id' => 'TenMau',
                            'disabled' => 'false'
                        ],
                        'Type' => 'Color'
                    ],
                ],
                'type' => 'colorMessage',
                'table' => 'mautinnhan',
                'ID' => 'IDMauTinNhan'
            ],
            "background" => (object)[
                'title' => 'Thêm phông nền',
                'data' => [
                    'line1' => (object)[
                        'Label' => 'ID Phông Nền',
                        'Data' => (object)[
                            'placeHolder' => '',
                            'name' => 'IDPhongNen',
                            'value' => '',
                            'id' => 'IDPhongNen',
                            'disabled' => 'true'
                        ],
                        'Type' => 'Input'
                    ],
                    'line2' => (object)[
                        'Label' => 'Ảnh',
                        'Data' => (object) [
                            'name' => 'File',
                            'id' => 'File',
                        ],
                        'Type' => 'File',
                        'Accept' => 'image'
                    ],
                ],
                'type' => 'background',
                'table' => 'phongnen',
                'ID' => 'IDPhongNen'
            ],
            "typeNotify" => (object)[
                'title' => 'Thêm loại thông báo',
                'data' => [
                    'line1' => (object)[
                        'Label' => 'ID Loại Thông Báo',
                        'Data' => (object)[
                            'placeHolder' => 'Nhập ID loại thông báo...',
                            'name' => 'IDLoaiThongBao',
                            'value' => '',
                            'id' => 'IDLoaiThongBao',
                            'disabled' => 'false'
                        ],
                        'Type' => 'Input'
                    ],
                    'line2' => (object)[
                        'Label' => 'Tên Loại Thông Báo',
                        'Data' => (object) [
                            'placeHolder' => 'Nhập tên loại thông báo...',
                            'name' => 'TenLoaiThongBao',
                            'value' => '',
                            'id' => 'TenLoaiThongBao',
                            'disabled' => 'false'
                        ],
                        'Type' => 'Input'
                    ],
                    'line3' => (object)[
                        'Label' => 'Loại',
                        'Data' => (object) [
                            'Select' => (object)[
                                'name' => 'Loai'
                            ],
                            'Option' => [
                                '0' => 'Bài đăng',
                                '1' => 'Tin nhắn',
                                '2' => 'Khác',
                            ]
                        ],
                        'Type' => 'Select'
                    ]
                ],
                'type' => 'typeNotify',
                'table' => 'loaithongbao',
                'ID' => 'IDLoaiThongBao'
            ],
            "feel" => (object)[
                'title' => 'Thêm cảm xúc',
                'data' => [
                    'line1' => (object)[
                        'Label' => 'ID Cảm Xúc',
                        'Data' => (object)[
                            'placeHolder' => '',
                            'name' => 'IDCamXuc',
                            'value' => '',
                            'id' => 'IDCamXuc',
                            'disabled' => 'true'
                        ],
                        'Type' => 'Input'
                    ],
                    'line2' => (object)[
                        'Label' => 'Tên Cảm Xúc',
                        'Data' => (object) [
                            'placeHolder' => 'Nhập tên cảm xúc...',
                            'name' => 'TenCamXuc',
                            'value' => '',
                            'id' => 'TenCamXuc',
                            'disabled' => 'false'
                        ],
                        'Type' => 'Input'
                    ],
                    'line3' => (object)[
                        'Label' => 'Biểu Tượng',
                        'Data' => (object) [
                            'placeHolder' => 'Nhập biểu tượng...',
                            'name' => 'BieuTuong',
                            'value' => '',
                            'id' => 'BieuTuong',
                            'disabled' => 'false'
                        ],
                        'Type' => 'Input'
                    ],
                ],
                'type' => 'feel',
                'table' => 'camxuc',
                'ID' => 'IDCamXuc'
            ],
            "privacy" => (object)[
                'title' => 'Thêm quyền riêng tư',
                'data' => [
                    'line1' => (object)[
                        'Label' => 'ID Quyền Riêng Tư',
                        'Data' => (object)[
                            'placeHolder' => 'Nhập ID quyền riêng tư...',
                            'name' => 'IDQuyenRiengTu',
                            'value' => '',
                            'id' => 'IDQuyenRiengTu',
                            'disabled' => 'false'
                        ],
                        'Type' => 'Input'
                    ],
                    'line2' => (object)[
                        'Label' => 'Tên Quyền Riêng Tư',
                        'Data' => (object) [
                            'placeHolder' => 'Nhập tên quyền riêng tư...',
                            'name' => 'TenQuyenRiengTu',
                            'value' => '',
                            'id' => 'TenQuyenRiengTu',
                            'disabled' => 'false'
                        ],
                        'Type' => 'Input'
                    ],
                ],
                'type' => 'privacy',
                'table' => 'quyenriengtu',
                'ID' => 'IDQuyenRiengTu'
            ],
        ];
        return $modal;
    }
    public static function generalModalEdit($data, $type)
    {
        $modal = Category::generalModalAdd();
        foreach ($modal as $key => $value) {
            if ($type == $value->type) {
                switch ($type) {
                    case "address":
                        return (object)[
                            'title' => 'Thêm địa chỉ',
                            'data' => [
                                'line1' => (object)[
                                    'Label' => 'ID Địa Chỉ',
                                    'Data' => (object)[
                                        'placeHolder' => '',
                                        'name' => 'IDDiaChi',
                                        'value' => $data->IDDiaChi,
                                        'id' => 'IDDiaChi',
                                        'disabled' => 'true'
                                    ],
                                    'Type' => 'Input'
                                ],
                                'line2' => (object)[
                                    'Label' => 'Tên Địa Chỉ',
                                    'Data' => (object)[
                                        'placeHolder' => 'Nhập tên địa chỉ...',
                                        'name' => 'TenDiaChi',
                                        'value' => $data->TenDiaChi,
                                        'id' => 'TenDiaChi',
                                        'disabled' => 'false'
                                    ],
                                    'Type' => 'Input'
                                ]
                            ],
                            'type' => 'address',
                            'table' => 'diachi',
                            'ID' => 'IDDiaChi'
                        ];
                        break;
                    case "company":
                        return (object)[
                            'title' => 'Thêm công ty',
                            'data' => [
                                'line1' => (object)[
                                    'Label' => 'ID Công Ty',
                                    'Data' => (object)[
                                        'placeHolder' => '',
                                        'name' => 'IDCongTy',
                                        'value' => $data->IDCongTy,
                                        'id' => 'IDCongTy',
                                        'disabled' => 'true'
                                    ],
                                    'Type' => 'Input'
                                ],
                                'line2' => (object)[
                                    'Label' => 'Tên Công Ty',
                                    'Data' => (object) [
                                        'placeHolder' => 'Nhập tên công ty...',
                                        'name' => 'TenCongTy',
                                        'value' => $data->TenCongTy,
                                        'id' => 'TenCongTy',
                                        'disabled' => 'false'
                                    ],
                                    'Type' => 'Input'
                                ]
                            ],
                            'type' => 'company',
                            'table' => 'congty',
                            'ID' => 'IDCongTy'
                        ];
                        break;
                    case "school":
                        return (object)[
                            'title' => 'Thêm trường học',
                            'data' => [
                                'line1' => (object)[
                                    'Label' => 'ID Trường Học',
                                    'Data' => (object)[
                                        'placeHolder' => '',
                                        'name' => 'IDTruongHoc',
                                        'value' => $data->IDTruongHoc,
                                        'id' => 'IDTruongHoc',
                                        'disabled' => 'true'
                                    ],
                                    'Type' => 'Input'
                                ],
                                'line2' => (object)[
                                    'Label' => 'Tên Trường Học',
                                    'Data' => (object) [
                                        'placeHolder' => 'Nhập tên trường học...',
                                        'name' => 'TenTruongHoc',
                                        'value' => $data->TenTruongHoc,
                                        'id' => 'TenTruongHoc',
                                        'disabled' => 'false'
                                    ],
                                    'Type' => 'Input'
                                ],
                                'line3' => (object)[
                                    'Label' => 'Loại Trường Học',
                                    'Data' => (object) [
                                        'Select' => (object)[
                                            'name' => 'LoaiTruongHoc'
                                        ],
                                        'Option' => [
                                            'Đại học' => 'Đại học',
                                            'Cao đẳng' => 'Cao đẳng',
                                            'Trung cấp' => 'Trung cấp',
                                            'THPT' => 'THPT',
                                            'THCS' => 'THCS',
                                            'TH' => 'TH',
                                            'Mẫu giáo' => 'Mẫu giáo',
                                        ]
                                    ],
                                    'Type' => 'Select'
                                ]
                            ],
                            'type' => 'school',
                            'table' => 'truonghoc',
                            'ID' => 'IDTruongHoc'
                        ];
                        break;
                    case "sound":
                        return (object)[
                            'title' => 'Thêm âm thanh',
                            'data' => [
                                'line1' => (object)[
                                    'Label' => 'ID Âm Thanh',
                                    'Data' => (object)[
                                        'placeHolder' => $data->IDAmThanh,
                                        'name' => 'IDAmThanh',
                                        'value' => $data->IDAmThanh,
                                        'id' => 'IDAmThanh',
                                        'disabled' => 'true'
                                    ],
                                    'Type' => 'Input'
                                ],
                                'line2' => (object)[
                                    'Label' => 'Tên Âm Thanh',
                                    'Data' => (object) [
                                        'placeHolder' => 'Nhập tên âm thanh...',
                                        'name' => 'TenAmThanh',
                                        'value' => $data->TenAmThanh,
                                        'id' => 'TenAmThanh',
                                        'disabled' => 'false'
                                    ],
                                    'Type' => 'Input'
                                ],
                                'line3' => (object)[
                                    'Label' => 'Tác giả',
                                    'Data' => (object) [
                                        'placeHolder' => 'Nhập tác giả...',
                                        'name' => 'TacGia',
                                        'value' => $data->TacGia,
                                        'id' => 'TacGia',
                                        'disabled' => 'false'
                                    ],
                                    'Type' => 'Input',
                                ],
                                'line4' => (object)[
                                    'Label' => 'File',
                                    'Data' => (object) [
                                        'name' => 'File',
                                        'id' => 'File',
                                    ],
                                    'Type' => 'File',
                                    'Accept' => 'audio/mp3',
                                    'SRC' => $data->DuongDanAmThanh
                                ],
                            ],
                            'type' => 'sound',
                            'table' => 'amthanh',
                            'ID' => 'IDAmThanh'
                        ];
                        break;
                    case "sticker":
                        return  (object)[
                            'title' => 'Thêm nhãn dán',
                            'data' => [
                                'line1' => (object)[
                                    'Label' => 'ID Nhãn Dán',
                                    'Data' => (object)[
                                        'placeHolder' => '',
                                        'name' => 'IDNhanDan',
                                        'value' => $data->IDNhanDan,
                                        'id' => 'IDNhanDan',
                                        'disabled' => 'true'
                                    ],
                                    'Type' => 'Input'
                                ],
                                'line2' => (object)[
                                    'Label' => 'Nhóm nhãn dán',
                                    'Data' => (object) [
                                        'placeHolder' => 'Nhập nhóm nhãn dán...',
                                        'name' => 'NhomNhanDan',
                                        'value' => $data->NhomNhanDan,
                                        'id' => 'NhomNhanDan',
                                        'disabled' => 'false'
                                    ],
                                    'Type' => 'Input'
                                ],
                                'line3' => (object)[
                                    'Label' => 'Dòng nhãn dán',
                                    'Data' => (object) [
                                        'placeHolder' => 'Nhập dòng nhãn dán...',
                                        'name' => 'DongNhanDan',
                                        'value' => $data->DongNhanDan,
                                        'id' => 'DongNhanDan',
                                        'disabled' => 'false'
                                    ],
                                    'Type' => 'Input',
                                ],
                                'line4' => (object)[
                                    'Label' => 'Hàng',
                                    'Data' => (object) [
                                        'placeHolder' => 'Nhập hàng...',
                                        'name' => 'Hang',
                                        'value' => $data->Hang,
                                        'id' => 'Hang',
                                        'disabled' => 'false'
                                    ],
                                    'Type' => 'Input',
                                ],
                                'line5' => (object)[
                                    'Label' => 'Cột',
                                    'Data' => (object) [
                                        'placeHolder' => 'Nhập cột...',
                                        'name' => 'Cot',
                                        'value' => $data->Cot,
                                        'id' => 'Cot',
                                        'disabled' => 'false'
                                    ],
                                    'Type' => 'Input',
                                ],
                                'line6' => (object)[
                                    'Label' => 'Ảnh',
                                    'Data' => (object) [
                                        'name' => 'File',
                                        'id' => 'File',
                                        'value' => $data->DuongDanNhanDan
                                    ],
                                    'Type' => 'File',
                                    'Accept' => 'sticker'
                                ],
                            ],
                            'type' => 'sticker',
                            'table' => 'nhandan',
                            'ID' => 'IDNhanDan'
                        ];
                        break;
                    case "colorMessage":
                        return  (object)[
                            'title' => 'Thêm màu tin nhắn',
                            'data' => [
                                'line1' => (object)[
                                    'Label' => 'ID Màu Tin Nhắn',
                                    'Data' => (object)[
                                        'placeHolder' => 'Nhập ID màu tin nhắn...',
                                        'name' => 'IDMauTinNhan',
                                        'value' => $data->IDMauTinNhan,
                                        'id' => 'IDMauTinNhan',
                                        'disabled' => 'false'
                                    ],
                                    'Type' => 'Input'
                                ],
                                'line2' => (object)[
                                    'Label' => 'Tên Màu',
                                    'Data' => (object) [
                                        'placeHolder' => 'Nhập tên màu...',
                                        'name' => 'TenMau',
                                        'value' => $data->TenMau,
                                        'id' => 'TenMau',
                                        'disabled' => 'false'
                                    ],
                                    'Type' => 'Input'
                                ],
                                'line3' => (object)[
                                    'Label' => 'Màu',
                                    'Data' => (object) [
                                        'placeHolder' => 'Nhập tên màu...',
                                        'name' => 'TenMau',
                                        'value' => '',
                                        'id' => 'TenMau',
                                        'disabled' => 'false'
                                    ],
                                    'Type' => 'Color'
                                ],
                            ],
                            'type' => 'colorMessage',
                            'table' => 'mautinnhan',
                            'ID' => 'IDMauTinNhan'
                        ];
                        break;
                    case "background":
                        return  (object)[
                            'title' => 'Thêm phông nền',
                            'data' => [
                                'line1' => (object)[
                                    'Label' => 'ID Phông Nền',
                                    'Data' => (object)[
                                        'placeHolder' => '',
                                        'name' => 'IDPhongNen',
                                        'value' => $data->IDPhongNen,
                                        'id' => 'IDPhongNen',
                                        'disabled' => 'true'
                                    ],
                                    'Type' => 'Input'
                                ],
                                'line2' => (object)[
                                    'Label' => 'Ảnh',
                                    'Data' => (object) [
                                        'name' => 'File',
                                        'id' => 'File',
                                    ],
                                    'Type' => 'File',
                                    'Accept' => 'image'
                                ],
                            ],
                            'type' => 'background',
                            'table' => 'phongnen',
                            'ID' => 'IDPhongNen'
                        ];
                        break;
                    case "typeNotify":
                        return (object)[
                            'title' => 'Thêm loại thông báo',
                            'data' => [
                                'line1' => (object)[
                                    'Label' => 'ID Loại Thông Báo',
                                    'Data' => (object)[
                                        'placeHolder' => 'Nhập ID loại thông báo...',
                                        'name' => 'IDLoaiThongBao',
                                        'value' => $data->IDLoaiThongBao,
                                        'id' => 'IDLoaiThongBao',
                                        'disabled' => 'false'
                                    ],
                                    'Type' => 'Input'
                                ],
                                'line2' => (object)[
                                    'Label' => 'Tên Loại Thông Báo',
                                    'Data' => (object) [
                                        'placeHolder' => 'Nhập tên loại thông báo...',
                                        'name' => 'TenLoaiThongBao',
                                        'value' => $data->TenLoaiThongBao,
                                        'id' => 'TenLoaiThongBao',
                                        'disabled' => 'false'
                                    ],
                                    'Type' => 'Input'
                                ],
                                'line3' => (object)[
                                    'Label' => 'Loại',
                                    'Data' => (object) [
                                        'Select' => (object)[
                                            'name' => 'Loai'
                                        ],
                                        'Option' => [
                                            '0' => 'Bài đăng',
                                            '1' => 'Tin nhắn',
                                            '2' => 'Khác',
                                        ]
                                    ],
                                    'Type' => 'Select'
                                ]
                            ],
                            'type' => 'typeNotify',
                            'table' => 'loaithongbao',
                            'ID' => 'IDLoaiThongBao'
                        ];
                        break;
                    case "feel":
                        return  (object)[
                            'title' => 'Thêm cảm xúc',
                            'data' => [
                                'line1' => (object)[
                                    'Label' => 'ID Cảm Xúc',
                                    'Data' => (object)[
                                        'placeHolder' => '',
                                        'name' => 'IDCamXuc',
                                        'value' => $data->IDCamXuc,
                                        'id' => 'IDCamXuc',
                                        'disabled' => 'false'
                                    ],
                                    'Type' => 'Input'
                                ],
                                'line2' => (object)[
                                    'Label' => 'Tên Cảm Xúc',
                                    'Data' => (object) [
                                        'placeHolder' => 'Nhập tên cảm xúc...',
                                        'name' => 'TenCamXuc',
                                        'value' => $data->TenCamXuc,
                                        'id' => 'TenCamXuc',
                                        'disabled' => 'false'
                                    ],
                                    'Type' => 'Input'
                                ],
                                'line3' => (object)[
                                    'Label' => 'Biểu Tượng',
                                    'Data' => (object) [
                                        'placeHolder' => 'Nhập biểu tượng...',
                                        'name' => 'BieuTuong',
                                        'value' => $data->BieuTuong,
                                        'id' => 'BieuTuong',
                                        'disabled' => 'false'
                                    ],
                                    'Type' => 'Input'
                                ],
                            ],
                            'type' => 'feel',
                            'table' => 'camxuc',
                            'ID' => 'IDCamXuc'
                        ];
                        break;
                    case "privacy":
                        return (object)[
                            'title' => 'Thêm quyền riêng tư',
                            'data' => [
                                'line1' => (object)[
                                    'Label' => 'ID Quyền Riêng Tư',
                                    'Data' => (object)[
                                        'placeHolder' => 'Nhập ID quyền riêng tư...',
                                        'name' => 'IDQuyenRiengTu',
                                        'value' => $data->IDQuyenRiengTu,
                                        'id' => 'IDQuyenRiengTu',
                                        'disabled' => 'false'
                                    ],
                                    'Type' => 'Input'
                                ],
                                'line2' => (object)[
                                    'Label' => 'Tên Quyền Riêng Tư',
                                    'Data' => (object) [
                                        'placeHolder' => 'Nhập tên quyền riêng tư...',
                                        'name' => 'TenQuyenRiengTu',
                                        'value' => $data->TenQuyenRiengTu,
                                        'id' => 'TenQuyenRiengTu',
                                        'disabled' => 'false'
                                    ],
                                    'Type' => 'Input'
                                ],
                            ],
                            'type' => 'privacy',
                            'table' => 'quyenriengtu',
                            'ID' => 'IDQuyenRiengTu'
                        ];
                        break;
                }
            }
        }

        return $modal;
    }
}
