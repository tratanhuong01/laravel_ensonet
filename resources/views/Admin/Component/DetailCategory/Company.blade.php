<?php

use App\Models\Congty;

$company = Congty::get();

?>
<button onclick="openModalAddCategoryDetail('company')" type="button" class="mr-4 w-40 py-2.5 rounded-lg bg-blue-500 
font-bold text-white absolute top-3 right-5">
    Thêm
</button>
<div class="w-full py-3" id="tableMain">
    <div class="w-full wrapper-content-right overflow-x-auto max-w-full p-3">
        <table class="w-full bg-white" id="">
            <tr>
                <th class="p-2">STT</th>
                <th class="p-2">ID Công Ty</th>
                <th class="p-2">IDTrang</th>
                <th class="p-2">Tên Công Ty</th>
                <th class="p-2"></th>
                <th class="p-2"></th>
            </tr>
            @foreach ($company as $key => $item)
            <tr>
                <td class="p-2">{{ $key + 1 }}</td>
                <td class="p-2">{{ $item->IDCongTy }}</td>
                <td class="p-2">{{ $item->IDTrang == NULL || $item->IDTrang == "" ? 
                "<-- Trống -->" : $item->IDTrang }}</td>
                <td class="p-2">{{ $item->TenCongTy }}</td>
                <td class="p-2"><button type="button" onclick="openModaEditCategoryDetail('company',
                '{{ $item->IDCongTy }}')" class="rounded-lg py-2 px-5 font-bold 
                bg-yellow-600 text-white">Sửa</button></td>
                <td class="p-2"><button type="button" onclick="openModaDeleteCategoryDetail('company',
                '{{ $item->IDCongTy }}')" class="rounded-lg py-2 px-5 font-bold 
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