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
                "Name" => "Bảng loại thông báo",
                "View" => "" . view('Admin.Component.DetailCategory.TypeNotify')
            ],
            "feel" => (object)[
                "Name" => "Bảng cảm xúc",
                "View" => "" . view('Admin.Component.DetailCategory.Feel')
            ],
            "privacy" => (object)[
                "Name" => "Bảng quyền riêng tư",
                "View" => "" . view('Admin.Component.DetailCategory.Privacy')
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
                        'Type' => 'File'
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
                        'Label' => 'Ảnh',
                        'Data' => (object) [
                            'name' => 'File',
                            'id' => 'File',
                        ],
                        'Type' => 'File'
                    ],
                    'line5' => (object)[
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
                    'line6' => (object)[
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
                ],
                'type' => 'sticker',
                'table' => 'nhandan',
                'ID' => 'IDNhanDan'
            ],
            "colorMessenge" => (object)[
                'title' => 'Thêm màu tin nhắn',
                'data' => [
                    'line1' => (object)[
                        'Label' => 'ID Màu Tin Nhắn',
                        'Data' => (object)[
                            'placeHolder' => 'Nhập ID màu tin nhắn...',
                            'name' => 'IDMauTinNhan',
                            'value' => '',
                            'id' => 'IDMauTinNhan',
                            'disabled' => 'true'
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
                ],
                'type' => 'colorMessenge',
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
                        'Label' => 'Ảnh',
                        'Data' => (object) [
                            'name' => 'File',
                            'id' => 'File',
                        ],
                        'Type' => 'File'
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
                'ID' => 'IDLoaiThongbao'
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
                            'disabled' => 'false'
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
                                    'Type' => 'File'
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
                                    'Label' => 'Ảnh',
                                    'Data' => (object) [
                                        'name' => 'File',
                                        'id' => 'File',
                                    ],
                                    'Type' => 'File'
                                ],
                                'line5' => (object)[
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
                                'line6' => (object)[
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
                            ],
                            'type' => 'sticker',
                            'table' => 'nhandan',
                            'ID' => 'IDNhanDan'
                        ];
                        break;
                    case "colorMessenge":
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
                                        'disabled' => 'true'
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
                            ],
                            'type' => 'colorMessenge',
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
                                'line3' => (object)[
                                    'Label' => 'Ảnh',
                                    'Data' => (object) [
                                        'name' => 'File',
                                        'id' => 'File',
                                    ],
                                    'Type' => 'File'
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
                            'ID' => 'IDLoaiThongbao'
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
