<?php

use App\Admin\Query;

?>
<tr>
        <td class="p-2">STT</td>
        <th class="p-2">ID Tài Khoản</th>
        <th class="p-2">Họ</th>
        <th class="p-2">Tên</th>
        <th class="p-2">Email</th>
        <th class="p-2">Số điện thoại</th>
        <th class="p-2">Ngày sinh</th>
        <th class="p-2">Tình Trạng</th>
        <th class="p-2">Trạng thái</th>
        <th class="p-2">Giới tính</th>
        <th class="p-2">Thời gian tạo</th>
        <th class="p-2">Hoạt động</th>
        <th class="p-2">Xem</th>
</tr>
@php
$data = $index == 0 ? $index : round($index/10)*10
@endphp
@foreach($account as $key => $value)
<tr>
        <td class="p-2">{{ $key + 1 + $data }}</td>
        <td class="p-2">{{ $value->IDTaiKhoan }}</td>
        <td class="p-2">{{ $value->Ho }}</td>
        <td class="p-2">{{ $value->Ten }}</td>
        <td class="p-2">{{ $value->Email }}</td>
        <td class="p-2">{{ $value->SoDienThoai }}</td>
        <td class="p-2">{{ explode(' ',$value->NgaySinh)[0] }}</td>
        <td class="p-2">
                @switch($value->XacMinh)
                @case('0')
                <span class="bg-red-500 px-3 py-1.5 text-sm rounded-3xl 
                font-bold text-white">Chưa xác minh</span>
                @break
                @case('1')
                <span class="bg-yellow-500 px-3 py-1.5 text-sm rounded-3xl 
                font-bold text-white">Đang xác minh</span>
                @break
                @case('2')
                <span class="bg-green-500 px-3 py-1.5 text-sm rounded-3xl 
                font-bold text-white">Đã xác minh</span>
                @break
                @endswitch

        </td>
        <td class="p-2">
                @switch($value->TinhTrang)
                @case('0')
                <span class="cursor-pointer  bg-green-500 px-3 py-1.5 text-sm rounded-3xl 
                font-bold text-white">Bình thường</span>
                @break
                @default
                <span class="cursor-pointer  bg-red-500 px-3 py-1.5 text-sm rounded-3xl 
                font-bold text-white">Khóa</span>
                @break
                @endswitch
        </td>
        <td class="p-2">
                @switch($value->GioiTinh)
                @case('Nam')
                <span class="cursor-pointer bg-blue-500 px-3 py-1.5 text-sm rounded-3xl 
                font-bold text-white">Nam</span>
                @break
                @case('Nữ')
                <span class="cursor-pointer bg-pink-500 px-3 py-1.5 text-sm rounded-3xl 
                font-bold text-white">Nữ</span>
                @break
                @default
                <span class="cursor-pointer bg-indigo-500 px-3 py-1.5 text-sm rounded-3xl 
                font-bold text-white">Khác</span>
                @break
                @endswitch
        </td>
        <td class="p-2">{{ $value->NgayTao }}</td>
        <td class="p-2">
                @if (Query::checkUserOnlineOrOffline($value->ThoiGianHoatDong) == true)
                <span class="bg-green-500 px-3 py-1.5 text-sm rounded-3xl 
                 font-bold text-white">Online</span>
                @else
                <span class="bg-red-500 px-3 py-1.5 text-sm rounded-3xl 
                 font-bold text-white">Offline</span>
                @endif
        </td>
        <td class="p-2">
                <button onclick="openModalViewDetailAd('user','{{ $value->IDTaiKhoan }}')" class="py-1.5 px-3 rounded-2xl bg-blue-500 text-sm font-bold text-white">
                        Xem chi tiết</button>
        </td>
</tr>
@endforeach