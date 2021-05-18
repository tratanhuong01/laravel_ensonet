<?php

use App\Admin\Query;

?>
<div class="w-full wrapper-content-right overflow-x-auto max-w-full p-3">
    <table class="w-full bg-white" id="">
        <tr>
            <td class="p-2">STT</td>
            <th class="p-2">Loại phản hồi</th>
            <th class="p-2">Nội dung phản hồi</th>
            <th class="p-2">ID tài khoản</th>
            <th class="p-2">Họ tên</th>
            <th class="p-2">Thời gian phản hồi</th>
            <th class="p-2">Trạng thái</th>
            <th class="p-2">Xem</th>
        </tr>
        @foreach($reply as $key => $value)
        <tr>
            <td class="p-2">{{ $key + 1 }}</td>
            <td class="p-2">
                @switch($value->LoaiYeuCau)
                @case('0')
                <span class="bg-green-500 px-3 py-1.5 text-sm rounded-3xl 
                    font-bold text-white">Cấp lại tài khoản</span>
                @break
                @case('1')
                <span class="bg-green-500 px-3 py-1.5 text-sm rounded-3xl 
                    font-bold text-white">Quá trình sử dụng</span>
                @break
                @case('2')
                <span class="bg-green-500 px-3 py-1.5 text-sm rounded-3xl 
                    font-bold text-white">Tích xanh</span>
                @break
                @endswitch
            </td>
            <td class="p-2">{{ $value->NoiDungYeuCau }}</td>
            <td class="p-2">{{ $value->IDTaiKhoan }}</td>
            <td class="p-2">{{ $value->Ho . ' ' . $value->Ten }}</td>
            <td class="p-2">
                {{ $value->ThoiGianYeuCau }}
            </td>
            <td class="p-2">
                @switch($value->TinhTrangYeuCau)
                @case('0')
                <span class="bg-red-500 px-3 py-1.5 text-sm rounded-3xl 
                    font-bold text-white">Từ chối duyệt</span>
                @break
                @case('1')
                <span class="bg-yellow-500 px-3 py-1.5 text-sm rounded-3xl 
                    font-bold text-white">Đang duyệt</span>
                @break
                @case('2')
                <span class="bg-green-500 px-3 py-1.5 text-sm rounded-3xl 
                    font-bold text-white">Đã duyệt</span>
                @endswitch
            </td>
            <td class="p-2">
                <button onclick="openModalViewDetailAd('reply','{{ $value->IDYeuCauNguoiDung }}')" class="py-1.5 px-3 rounded-2xl bg-blue-500 text-sm font-bold text-white">
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
        'num' => count($replyFull)/10,
        'name' => 'post'
        ])
    </ul>
</div>