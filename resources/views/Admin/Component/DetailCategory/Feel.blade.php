<?php

use App\Models\Camxuc;

$feel = Camxuc::get();

?>
<button onclick="openModalAddCategoryDetail('feel')" type="button" class="mr-4 w-40 py-2.5 rounded-lg bg-blue-500 
font-bold text-white absolute top-3 right-5">
    Thêm
</button>
<div class="w-full py-3" id="tableMain">
    <div class="w-full wrapper-content-right overflow-x-auto max-w-full p-3">
        <table class="w-full bg-white" id="tableMain">
            <tr id="header">
                <th class="p-2">STT</th>
                <th class="p-2">ID Cảm Xúc</th>
                <th class="p-2">Tên Cảm Xúc</th>
                <th class="p-2">Biểu Tượng</th>
                <th class="p-2"></th>
                <th class="p-2"></th>
            </tr>
            @foreach ($feel as $key => $item)
            <tr id="{{$item->IDCamXuc}}">
                <td class="p-2 stt">{{ $key + 1 }}</td>
                <td class="p-2">{{ $item->IDCamXuc }}</td>
                <td class="p-2">{{ $item->TenCamXuc }}</td>
                <td class="p-2 text-3xl">{{ $item->BieuTuong }}</td>
                <td class="p-2"><button type="button" onclick="openModaEditCategoryDetail('feel',
                '{{ $item->IDCamXuc }}')" class="rounded-lg py-2 px-5 font-bold 
                bg-yellow-600 text-white">Sửa</button></td>
                <td class="p-2"><button type="button" onclick="openModaDeleteCategoryDetail('feel',
                '{{ $item->IDCamXuc }}')" class="rounded-lg py-2 px-5 font-bold 
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