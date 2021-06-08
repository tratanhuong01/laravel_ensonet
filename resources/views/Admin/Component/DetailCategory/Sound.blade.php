<button onclick="openModalAddCategoryDetail('sound')" type="button" class="mr-4 w-40 py-2.5 rounded-lg bg-blue-500 
font-bold text-white absolute top-3 right-5">
    Thêm
</button>
<div class="w-full py-3" id="tableMain">
    <div class="w-full wrapper-content-right overflow-x-auto max-w-full p-3">
        <table class="w-full bg-white" id="tableMain">
            <input type="hidden" id="soundShow">
            <tr id="header">
                <th class="p-2">STT</th>
                <th class="p-2">ID Âm Thanh</th>
                <th class="p-2">Tên Âm Thanh</th>
                <th class="p-2">Tác Giả</th>
                <th class="p-2"></th>
                <th class="p-2"></th>
                <th class="p-2"></th>
            </tr>
            @php
            $data = $index == 0 ? $index : round($index/10)*10
            @endphp
            @foreach ($sound as $key => $item)
            <tr id="{{$item->IDAmThanh}}">
                <td class="p-2 stt">{{ $key + 1 + $data}}</td>
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
            @endforeach
        </table>
    </div>
    <div class="w-full py-3">
        <ul class="flex justify-center" id="pageMain">

        </ul>
    </div>
</div>