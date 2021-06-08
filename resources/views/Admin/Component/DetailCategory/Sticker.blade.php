<button onclick="openModalAddCategoryDetail('sticker')" type="button" class="mr-4 w-40 py-2.5 rounded-lg bg-blue-500 
font-bold text-white absolute top-3 right-5">
    Thêm
</button>
<div class="w-full py-3" id="tableMain">
    <div class="w-full wrapper-content-right overflow-x-auto max-w-full p-3">
        <table class="w-full bg-white" id="tableMain">
            <tr id="header">
                <th class="p-2">STT</th>
                <th class="p-2">ID Nhãn Dán</th>
                <th class="p-2">Nhóm Nhãn Dán</th>
                <th class="p-2">Dòng Nhãn Dán</th>
                <th class="p-2">Demo</th>
                <th class="p-2">Số Hàng</th>
                <th class="p-2">Số Cột</th>
                <th class="p-2"></th>
                <th class="p-2"></th>
            </tr>
            @php
            $data = $index == 0 ? $index : round($index/10)*10
            @endphp
            @foreach ($sticker as $key => $item)
            <tr id="{{$item->IDNhanDan}}">
                <td class="p-2 stt">{{ $key + 1 + $data}}</td>
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
            @endforeach
        </table>
    </div>
    <div class="w-full py-3">
        <ul class="flex justify-center" id="pageMain">

        </ul>
    </div>
</div>