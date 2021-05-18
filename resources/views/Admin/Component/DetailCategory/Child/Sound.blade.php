<tr id="{{$item->IDAmThanh}}">
    <td class="p-2 stt">0</td>
    <td class="p-2">{{ $item->IDAmThanh }}</td>
    <td class="p-2">{{ $item->TenAmThanh }}</td>
    <td class="p-2 font-bold">{{ $item->TacGia }}</td>
    <td class="p-2"><button id="play{{ $item->IDAmThanh }}" onclick="playMusics(this,
    '{{ $item->IDAmThanh }}','{{ $item->DuongDanAmThanh }}')" type="button" class="rounded-lg 
    py-2 px-5 font-bold bg-gray-500 text-white music{{ $item->IDAmThanh }} state{{ $item->IDAmThanh }} sound">Phát</button></td>
    <td class="p-2"><button type="button" onclick="openModaEditCategoryDetail('sound',
    '{{ $item->IDAmThanh }}')" class="rounded-lg py-2 px-5 font-bold 
    bg-yellow-600 text-white">Sửa</button></td>
    <td class="p-2"><button type="button" onclick="openModaDeleteCategoryDetail('sound',
    '{{ $item->IDAmThanh }}')" class="rounded-lg py-2 px-5 font-bold 
    bg-red-600 text-white">Xóa</button></td>
</tr>