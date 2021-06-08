<tr id="{{$item->IDTruongHoc}}">
    <td class="p-2 stt">0</td>
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