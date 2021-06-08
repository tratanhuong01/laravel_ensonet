<tr id="{{$item->IDNhanDan}}">
    <td class="p-2 stt">0</td>
    <td class="p-2">{{ $item->IDNhanDan }}</td>
    <td class="p-2">{{ $item->NhomNhanDan }}</td>
    <td class="p-2">{{ $item->DongNhanDan }}</td>
    <td class="p-2 font-bold">
        @include('Modal.ModalChat.Child.ChatSticker',
        [
        'value' => $item
        ])
    </td>
    <td class="p-2 font-bold">{{ $item->Hang }}</td>
    <td class="p-2 font-bold">{{ $item->Cot }}</td>
    <td class="p-2"><button type="button" onclick="openModaEditCategoryDetail('sticker',
                '{{ $item->IDNhanDan }}')" class="rounded-lg py-2 px-5 font-bold 
                bg-yellow-600 text-white">Sửa</button></td>
    <td class="p-2"><button type="button" onclick="openModaDeleteCategoryDetail('sticker',
                '{{ $item->IDNhanDan }}')" class="rounded-lg py-2 px-5 font-bold 
                bg-red-600 text-white">Xóa</button></td>
</tr>