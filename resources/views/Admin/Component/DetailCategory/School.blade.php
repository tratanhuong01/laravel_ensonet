<?php

use App\Models\Truonghoc;

$school = Truonghoc::get();

?>
<button onclick="openModalAddCategoryDetail('school')" type="button" class="mr-4 w-40 py-2.5 rounded-lg bg-blue-500 
font-bold text-white absolute top-3 right-5">
    Thêm
</button>
<div class="w-full py-3" id="tableMain">
    <div class="w-full wrapper-content-right overflow-x-auto max-w-full p-3">
        <table class="w-full bg-white" id="tableMain">
            <tr id="header">
                <th class="p-2">STT</th>
                <th class="p-2">ID Trường Học</th>
                <th class="p-2">ID Trang</th>
                <th class="p-2">Tên Trường Học</th>
                <th class="p-2">Loại Trường Học</th>
                <th class="p-2"></th>
                <th class="p-2"></th>
            </tr>
            @foreach ($school as $key => $item)
            <tr id="{{$item->IDTruongHoc}}">
                <td class="p-2 stt">{{ $key + 1 }}</td>
                <td class="p-2">{{ $item->IDTruongHoc }}</td>
                <td class="p-2">{{ $item->IDTrang == NULL || $item->IDTrang == "" ? 
                "<-- Trống -->" : $item->IDTrang }}</td>
                <td class="p-2">{{ $item->TenTruongHoc }}</td>
                <td class="p-2 font-bold">{{ $item->LoaiTruongHoc }}</td>
                <td class="p-2"><button type="button" onclick="openModaEditCategoryDetail('school',
                '{{ $item->IDTruongHoc }}')" class="rounded-lg py-2 px-5 font-bold 
                bg-yellow-600 text-white">Sửa</button></td>
                <td class="p-2"><button type="button" onclick="openModaDeleteCategoryDetail('school',
                '{{ $item->IDTruongHoc }}')" class="rounded-lg py-2 px-5 font-bold 
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