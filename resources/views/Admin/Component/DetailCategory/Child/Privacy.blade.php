<tr id="{{$item->IDQuyenRiengTu}}">
    <td class="p-2 stt">0</td>
    <td class="p-2">{{ $item->IDQuyenRiengTu }}</td>
    <td class="p-2">{{ $item->TenQuyenRiengTu }}</td>
    <td class="p-2"><button type="button" onclick="openModaEditCategoryDetail('privacy',
                '{{ $item->IDQuyenRiengTu }}')" class="rounded-lg py-2 px-5 font-bold 
                bg-yellow-600 text-white">Sửa</button></td>
    <td class="p-2"><button type="button" onclick="openModaDeleteCategoryDetail('privacy',
                '{{ $item->IDQuyenRiengTu }}')" class="rounded-lg py-2 px-5 font-bold 
                bg-red-600 text-white">Xóa</button></td>
</tr>