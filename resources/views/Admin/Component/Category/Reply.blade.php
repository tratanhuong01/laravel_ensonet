<?php

use App\Admin\Query;

?>
<p class="text-2xl font-bold pb-3">Quản lí story người dùng</p>
<div class="w-full flex py-3">
    <div class="w-1/2 flex">
        <p class="text-xm font-bold py-3 mr-4 flex items-center">Bộ Lọc</p>
        <div onclick="openFilterOrSort(0)" class="w-48 p-3 mr-5 font-bold flex bg-white cursor-pointer relative">
            <p class="items-center" id="showSecondFilter">Tất Cả</p>
            <i class="fas fa-caret-down absolute right-3 top-4"></i>
            <div class="w-48 bg-white border-2 border-solid border-gray-200 
            p-1 font-bold absolute top-full left-0 shadow-lg hidden filterOrSort">
                @foreach ($userReply->Filter as $item)
                <div onclick="onClickFilter('reply','{{$item->Name}}','{{ json_encode($item->Data) }}',
                '{{ json_encode($userReply) }}',this)" class="p-2 w-full">
                    {{$item->Name}}
                </div>
                @endforeach
            </div>
        </div>
        <div onclick="openFilterOrSort(1)" class="w-48 p-3 font-bold flex bg-white cursor-pointer relative">
            <p class="items-center" id="showFirstFilter"></p>
            <i class="fas fa-caret-down absolute right-3 top-4"></i>
            <div class="w-48 bg-white border-2 border-solid border-gray-200 
            p-1 font-bold absolute top-full left-0 shadow-lg hidden filterOrSort" id="filter">

            </div>
        </div>
        <p class="text-xm font-bold py-3 ml-8 text-center flex items-center">Sắp xếp</p>
    </div>
    <div class="w-1/2 flex">
        <div onclick="openFilterOrSort(2)" class="w-48 p-3 mr-5 font-bold flex bg-white cursor-pointer relative">
            <p class="items-center" id="showSecondSort">Tất cả</p>
            <i class="fas fa-caret-down absolute right-3 top-4"></i>
            <div class="w-48 bg-white border-2 border-solid border-gray-200 
            p-1 font-bold absolute top-full left-0 shadow-lg hidden filterOrSort">
                @foreach ($userReply->Sort as $item)
                <div onclick="onClickSort('reply','{{$item->Name}}','{{ json_encode($item->Data) }}',
                '{{ json_encode($userReply) }}',this)" class="p-2 w-full">
                    {{$item->Name}}
                </div>
                @endforeach
            </div>
        </div>
        <div onclick="openFilterOrSort(3)" class="w-48 p-3 font-bold flex bg-white cursor-pointer relative">
            <p class="items-center" id="showFirstSort"></p>
            <i class="fas fa-caret-down absolute right-3 top-4"></i>
            <div class="w-48 bg-white border-2 border-solid border-gray-200 
            p-1 font-bold absolute top-full left-0 shadow-lg hidden filterOrSort" id="sort">

            </div>
        </div>
        <input type="text" oninput="onChangeSearch('reply',this)" name="" id="" class="w-2/5 ml-4 p-2.5 rounded-3xl 
        bg-white border-solid border-gray-200 border-2" placeholder="Tìm kiếm">
    </div>
</div>
<div class="w-full flex py-1" id="filterAndSortMainData">

</div>
<div class="w-full  py-3" id="tableMain">
    <?php
    $reply = Query::getAllReply(10, 0);
    $replyFull = Query::getAllReplyFull();
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
</div>