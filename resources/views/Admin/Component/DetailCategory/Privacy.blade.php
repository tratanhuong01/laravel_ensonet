<?php

use App\Models\Quyenriengtu;

$privacy = Quyenriengtu::get();

?>
<button onclick="openModalAddCategoryDetail('privacy')" type="button" class="mr-4 w-40 py-2.5 rounded-lg bg-blue-500 
font-bold text-white absolute top-3 right-5">
    Thêm
</button>
<div class="w-full py-3" id="tableMain">
    <div class="w-full wrapper-content-right overflow-x-auto max-w-full p-3">
        <table class="w-full bg-white" id="">
            <tr>
                <th class="p-2">STT</th>
                <th class="p-2">ID Quyền Riêng Tư</th>
                <th class="p-2">Tên Quyền Riêng Tư</th>
                <th class="p-2"></th>
                <th class="p-2"></th>
            </tr>
            @foreach ($privacy as $key => $item)
            <tr>
                <td class="p-2">{{ $key + 1 }}</td>
                <td class="p-2">{{ $item->IDQuyenRiengTu }}</td>
                <td class="p-2">{{ $item->TenQuyenRiengTu }}</td>
                <td class="p-2"><button type="button" onclick="openModaEditCategoryDetail('privacy',
                '{{ $item->IDQuyenRiengTu }}')" class="rounded-lg py-2 px-5 font-bold 
                bg-yellow-600 text-white">Sửa</button></td>
                <td class="p-2"><button type="button" onclick="openModaDeleteCategoryDetail('privacy',
                '{{ $item->IDQuyenRiengTu }}')" class="rounded-lg py-2 px-5 font-bold 
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