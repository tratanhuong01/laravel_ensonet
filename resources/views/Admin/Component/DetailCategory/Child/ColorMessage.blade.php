<tr id="{{$item->IDMauTinNhan}}">
    <td class="p-2 stt">0</td>
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