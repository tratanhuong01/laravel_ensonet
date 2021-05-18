<?php

use App\Models\Phongnen;

$background = Phongnen::get();

?>
<button onclick="openModalAddCategoryDetail('background')" type="button" class="mr-4 w-40 py-2.5 rounded-lg bg-blue-500 
font-bold text-white absolute top-3 right-5">
    Thêm
</button>
<div class="w-full py-3" id="tableMain">
    <div class="w-full wrapper-content-right overflow-x-auto max-w-full p-3">
        <table class="w-full bg-white" id="tableMain">
            <tr id="header">
                <th class="p-2">STT</th>
                <th class="p-2">ID Phông Nền</th>
                <th class="p-2">Đường Dẫn Phông Nền</th>
                <th class="p-2">Ảnh</th>
                <th class="p-2"></th>
                <th class="p-2"></th>
            </tr>
            @foreach ($background as $key => $item)
            <tr id="{{$item->IDPhongNen}}">
                <td class="p-2 stt">{{ $key + 1 }}</td>
                <td class="p-2">{{ $item->IDPhongNen }}</td>
                <td class="p-2">{{ $item->DuongDanPN }}</td>
                <td class="p-2">
                    <img src="{{ $item->DuongDanPN }}" class="w-16 h-20 object-cover mx-auto" alt="">
                </td>
                <td class="p-2"><button onclick="openModaEditCategoryDetail('background',
                '{{ $item->IDPhongNen }}')" class="rounded-lg py-2 px-5 font-bold 
                bg-yellow-600 text-white" type="button">Sửa</button></td>
                <td class="p-2"><button onclick="openModaDeleteCategoryDetail('background',
                '{{ $item->IDPhongNen }}')" class="rounded-lg py-2 px-5 font-bold 
                bg-red-600 text-white" type="button">Xóa</button></td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="w-full py-3">
        <ul class="flex justify-center" id="pageMain">

        </ul>
    </div>
</div>