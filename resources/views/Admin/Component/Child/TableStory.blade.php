<?php

use App\Admin\Query;

?>
<div class="w-full wrapper-content-right overflow-x-auto max-w-full p-3">
    <table class="w-full bg-white" id="">
        @php
        $data = $index == 0 ? $index : round($index/10)*10
        @endphp
        <tr>
            <td class="p-2">STT</td>
            <th class="p-2">ID Story</th>
            <th class="p-2">Loại story</th>
            <th class="p-2">ID tài khoản</th>
            <th class="p-2">Họ tên</th>
            <th class="p-2">Quyền riêng tư</th>
            <th class="p-2">Thời gian đăng</th>
            <th class="p-2">Lượt xem</th>
            <th class="p-2">Xóa</th>
            <th class="p-2">Xem</th>
        </tr>
        @foreach($story as $key => $value)
        <tr>
            <td class="p-2">{{ $key + 1 + $data }}</td>
            <td class="p-2">{{ $value->IDStory }}</td>
            <td class="p-2">
                @switch($value->LoaiStory)
                @case('0')
                <span class="bg-blue-500 px-3 py-1.5 text-sm rounded-3xl 
                font-bold text-white">Chữ</span>
                @break
                @case('1')
                <span class="bg-green-500 px-3 py-1.5 text-sm rounded-3xl 
                font-bold text-white">Ảnh</span>
                @break
                @endswitch
            </td>
            <td class="p-2">{{ $value->IDTaiKhoan }}</td>
            <td class="p-2">{{ $value->Ho . ' ' . $value->Ten }}</td>
            <td class="p-2">
                @switch($value->IDQuyenRiengTu)
                @case('CONGKHAI')
                <span class="bg-green-500 px-3 py-1.5 text-sm rounded-3xl 
                font-bold text-white">Công khai</span>
                @break
                @case('CHIBANBE')
                <span class="bg-yellow-500 px-3 py-1.5 text-sm rounded-3xl 
                font-bold text-white">Bạn bè</span>
                @break
                @case('RIENGTU')
                <span class="bg-red-500 px-3 py-1.5 text-sm rounded-3xl 
                font-bold text-white">Chỉ mình tôi</span>
                @break
                @endswitch
            </td>
            <td class="p-2">
                {{ $value->ThoiGianDangStory }}
            </td>
            <td class="p-2">{{ count(Query::getViewStoryByStory($value->IDStory)) }}</td>
            <td class="p-2">
                <i class="far fa-trash-alt text-2xl text-gray-500 cursor-pointer"></i>
            </td>
            <td class="p-2">
                <button onclick="openModalViewDetailAd('story','{{ $value->IDStory }}')" class="py-1.5 px-3 rounded-2xl bg-blue-500 text-sm font-bold text-white">
                    Xem chi tiết</button>
            </td>
        </tr>
        @endforeach
    </table>
</div>
<div class="w-full py-3">
    <ul class="flex justify-center" id="pageMain">
        @include('Admin/Component/Child/Pagination',[
        'index' => 0,
        'num' => count($storyFull)/10,
        'name' => 'post'
        ])
    </ul>
</div>