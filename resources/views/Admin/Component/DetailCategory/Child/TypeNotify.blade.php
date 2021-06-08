<tr id="{{$item->IDLoaiThongBao}}">
    <td class="p-2 stt">0</td>
    <td class="p-2">{{ $item->IDLoaiThongBao }}</td>
    <td class="p-2">{{ $item->TenLoaiThongBao }}</td>
    <td class="p-2 font-bold">
        @switch($item->Loai)
        @case('0')
        Thông báo bài đăng
        @break
        @case('1')
        Thông báo tin nhắn
        @break
        @default
        @endswitch
    </td>
    <td class="p-2"><button type="button" onclick="openModaEditCategoryDetail('typeNotify',
                '{{ $item->IDLoaiThongBao }}')" class="rounded-lg py-2 px-5 font-bold 
                bg-yellow-600 text-white">Sửa</button></td>
    <td class="p-2"><button type="button" onclick="openModaDeleteCategoryDetail('typeNotify',
                '{{ $item->IDLoaiThongBao }}')" class="rounded-lg py-2 px-5 font-bold 
                bg-red-600 text-white">Xóa</button></td>
</tr>