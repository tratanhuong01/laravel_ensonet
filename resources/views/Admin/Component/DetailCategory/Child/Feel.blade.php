<tr id="{{$item->IDCamXuc}}">
    <td class="p-2 stt">0</td>
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