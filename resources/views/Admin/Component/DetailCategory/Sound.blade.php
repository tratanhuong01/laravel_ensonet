<?php

use App\Models\Amthanh;

$sound = Amthanh::get();

?>
<button onclick="openModalAddCategoryDetail('sound')" type="button" class="mr-4 w-40 py-2.5 rounded-lg bg-blue-500 
font-bold text-white absolute top-3 right-5">
    Thêm
</button>
<div class="w-full py-3" id="tableMain">
    <div class="w-full wrapper-content-right overflow-x-auto max-w-full p-3">
        <table class="w-full bg-white" id="">
            <tr>
                <th class="p-2">STT</th>
                <th class="p-2">ID Âm Thanh</th>
                <th class="p-2">Tên Âm Thanh</th>
                <th class="p-2">Tác Giả</th>
                <th class="p-2">Đường Dẫn</th>
                <th class="p-2"></th>
                <th class="p-2"></th>
                <th class="p-2"></th>
            </tr>
            @foreach ($sound as $key => $item)
            <tr>
                <td class="p-2">{{ $key + 1 }}</td>
                <td class="p-2">{{ $item->IDAmThanh }}</td>
                <td class="p-2">{{ $item->TenAmThanh }}</td>
                <td class="p-2 font-bold">{{ $item->TacGia }}</td>
                <td class="p-2">{{ $item->DuongDanAmThanh }}</td>
                <td class="p-2"><button type="button" class="rounded-lg py-2 px-5 font-bold 
                bg-gray-600 text-white">Phát</button></td>
                <td class="p-2"><button type="button" onclick="openModaEditCategoryDetail('sound',
                '{{ $item->IDAmThanh }}')" class="rounded-lg py-2 px-5 font-bold 
                bg-yellow-600 text-white">Sửa</button></td>
                <td class="p-2"><button type="button" onclick="openModaDeleteCategoryDetail('sound',
                '{{ $item->IDAmThanh }}')" class="rounded-lg py-2 px-5 font-bold 
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