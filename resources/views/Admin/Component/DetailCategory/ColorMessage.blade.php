<?php

use App\Models\Mautinnhan;

$colorMessage = Mautinnhan::get();

?>
<button onclick="openModalAddCategoryDetail('colorMessenge')" type="button" class="mr-4 w-40 py-2.5 rounded-lg bg-blue-500 
font-bold text-white absolute top-3 right-5">
    Thêm
</button>
<div class="w-full py-3" id="tableMain">
    <div class="w-full wrapper-content-right overflow-x-auto max-w-full p-3">
        <table class="w-full bg-white" id="tableMain">
            <tr id="header">
                <th class="p-2">STT</th>
                <th class="p-2">ID Màu Tin Nhắn</th>
                <th class="p-2">Tên Màu</th>
                <th class="p-2">Ảnh</th>
                <th class="p-2"></th>
                <th class="p-2"></th>
            </tr>
            @foreach ($colorMessage as $key => $item)
            <tr id="{{$item->IDMauTinNhan}}">
                <td class="p-2 stt">{{ $key + 1 }}</td>
                <td class="p-2">{{ $item->IDMauTinNhan }}</td>
                <td class="p-2">{{ $item->TenMau }}</td>
                <td class="p-2">
                    <?php echo '<div class="cursor-pointer w-12 h-12 mx-auto cursor-pointer m-1 
                    rounded-full" style="background-color: ' . $item->TenMau . ';"></div>' ?>
                </td>
                <td class="p-2"><button type="button" onclick="openModaEditCategoryDetail('colorMessage',
                '{{ $item->IDMauTinNhan }}')" class="rounded-lg py-2 px-5 font-bold 
                bg-yellow-600 text-white">Sửa</button></td>
                <td class="p-2"><button type="button" onclick="openModaDeleteCategoryDetail('colorMessage',
                '{{ $item->IDMauTinNhan }}')" class="rounded-lg py-2 px-5 font-bold 
                bg-red-600 text-white">Xóa</button>
                </td>
            </tr>
            @endforeach

        </table>
    </div>
    <div class="w-full py-3">
        <ul class="flex justify-center" id="pageMain">

        </ul>
    </div>
</div>