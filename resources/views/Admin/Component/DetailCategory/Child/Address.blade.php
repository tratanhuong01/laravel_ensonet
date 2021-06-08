<tr id="{{$item->IDDiaChi}}">
    <td class="p-2 stt">0</td>
    <td class="p-2">{{ $item->IDDiaChi }}</td>
    <td class="p-2">{{ $item->IDTrang == NULL || $item->IDTrang == "" ? 
                "<-- Trống -->" : $item->IDTrang }}</td>
    <td class="p-2">{{ $item->TenDiaChi }}</td>
    <td class="p-2"><button type="button" onclick="openModaEditCategoryDetail('address',
                '{{ $item->IDDiaChi }}')" class="rounded-lg py-2 px-5 font-bold 
                bg-yellow-600 text-white">Sửa</button></td>
    <td class="p-2"><button type="button" onclick="openModaDeleteCategoryDetail('address',
                '{{ $item->IDDiaChi }}')" class="rounded-lg py-2 px-5 font-bold 
                bg-red-600 text-white">Xóa</button></td>
</tr>