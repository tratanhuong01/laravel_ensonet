<?php

use App\Admin\Query;

?>
<p class="text-2xl font-bold pb-3">Quản lí story người dùng</p>
<div class="w-full flex py-3">
    <div class="w-1/2 flex">
        <p class="text-xm font-bold py-3 mr-4 flex items-center">Bộ Lọc</p>
        <div class="w-48 p-3 mr-5 font-bold flex bg-white cursor-pointer relative">
            <p class="items-center">Trạng thái</p>
            <i class="fas fa-caret-down absolute right-3 top-4"></i>
        </div>
        <div class="w-48 p-3 font-bold flex bg-white cursor-pointer relative">
            <p class="items-center">Trạng thái</p>
            <i class="fas fa-caret-down absolute right-3 top-4"></i>
        </div>
        <p class="text-xm font-bold py-3 ml-8 text-center flex items-center">Sắp xếp</p>
    </div>
    <div class="w-1/2 flex">
        <div class="w-48 p-3 mr-5 font-bold flex bg-white cursor-pointer relative">
            <p class="items-center">Trạng thái</p>
            <i class="fas fa-caret-down absolute right-3 top-4"></i>
        </div>
        <div class="w-48 p-3 font-bold flex bg-white cursor-pointer relative">
            <p class="items-center">Trạng thái</p>
            <i class="fas fa-caret-down absolute right-3 top-4"></i>
        </div>
        <input type="text" name="" id="" class="w-2/5 ml-4 p-2.5 rounded-3xl 
                                bg-white border-solid border-gray-200 border-2" placeholder="Tìm kiếm">
    </div>
</div>
<div class="w-full wrapper-content-right overflow-x-auto max-w-full py-3">
    <table class="w-full bg-white">
        <?php
        $reply = Query::getAllReply(10, 0);
        $replyFull = Query::getAllReplyFull();
        ?>
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
                font-bold text-white">Chưa xử lí</span>
                @break
                @case('1')
                <span class="bg-yellow-500 px-3 py-1.5 text-sm rounded-3xl 
                font-bold text-white">Đang xử lí</span>
                @break
                @case('2')
                <span class="bg-green-500 px-3 py-1.5 text-sm rounded-3xl 
                font-bold text-white">Đã xử lí</span>
                @break
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
        'name' => 'reply'
        ])
    </ul>
</div>