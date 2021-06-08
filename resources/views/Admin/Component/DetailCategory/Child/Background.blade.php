<tr id="{{$item->IDPhongNen}}">
    <td class="p-2 stt">0</td>
    <td class="p-2">{{ $item->IDPhongNen }}</td>
    <td class="p-2">{{ $item->DuongDanPN }}</td>
    <td class="p-2">
        <img src="{{ $item->DuongDanPN }}" class="w-16 h-20 object-cover mx-auto" alt="">
    </td>
    <td class="p-2"><button onclick="openModaEditCategoryDetail('background',
                '{{ $item->IDPhongNen }}')" class="rounded-lg py-2 px-5 font-bold 
                bg-yellow-600 text-white" type="button">Sửa</button></td>
    <td class="p-2"><button onclick="openModaDeleteCategoryDetail('background',
                '{{ $item->IDPhongNen }}')" class="rounded-lg py-2 px-5 font-bold 
                bg-red-600 text-white" type="button">Xóa</button></td>
</tr>