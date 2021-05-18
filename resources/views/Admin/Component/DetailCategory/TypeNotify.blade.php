<?php

use App\Models\Loaithongbao;

$typeNotify = Loaithongbao::get();

?>
<button onclick="openModalAddCategoryDetail('typeNotify')" type="button" class="mr-4 w-40 py-2.5 rounded-lg bg-blue-500 
font-bold text-white absolute top-3 right-5">
    Thêm
</button>
<div class="w-full py-3" id="tableMain">
    <div class="w-full wrapper-content-right overflow-x-auto max-w-full p-3">
        <table class="w-full bg-white" id="tableMain">
            <tr id="header">
                <th class="p-2">STT</th>
                <th class="p-2">ID Loại Thông Báo</th>
                <th class="p-2">Tên Loại Thông Báo</th>
                <th class="p-2">Loại</th>
                <th class="p-2"></th>
                <th class="p-2"></th>
            </tr>
            @foreach ($typeNotify as $key => $item)
            <tr id="{{$item->IDLoaiThongBao}}">
                <td class="p-2 stt">{{ $key + 1 }}</td>
                <td class="p-2">{{ $item->IDLoaiThongBao }}</td>
                <td class="p-2">{{ $item->TenLoaiThongBao }}</td>
                <td class="p-2 font-bold">
                    @switch($item->Loai)
                    @case('0')
                    Thông báo bài đăng
                    @break
                    @case('1')
                    Thông báo tin nhắn
                    @break
                    @default
                    @endswitch
                </td>
                <td class="p-2"><button type="button" onclick="openModaEditCategoryDetail('typeNotify',
                '{{ $item->IDLoaiThongBao }}')" class="rounded-lg py-2 px-5 font-bold 
                bg-yellow-600 text-white">Sửa</button></td>
                <td class="p-2"><button type="button" onclick="openModaDeleteCategoryDetail('typeNotify',
                '{{ $item->IDLoaiThongBao }}')" class="rounded-lg py-2 px-5 font-bold 
                bg-red-600 text-white">Xóa</button></td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="w-full py-3">
        <ul class="flex justify-center" id="pageMain">

        </ul>
    </div>
</div>