<li class="w-full py-4 flex relative" style="font-size: 16px;">
    <div class="w-10/12 dark:text-white">
        <i class="fas fa-briefcase text-gray-600  dark:text-white  text-2xl"></i>&nbsp;&nbsp;&nbsp;
        @if ($data->NamKetThuc == NULL)
        {{ 'Làm việc tại ' }}
        @else
        {{ 'Từng làm việc tại ' }}
        @endif
        <b class="dark:text-white text-gray-600"> {{ $data->TenCongTy  }}</b>
    </div>
    <div class="w-2/12">
        <ul class="w-full flex">
            <li class="p-2 dark:text-white text-gray-600">
                @switch($data->IDQuyenRiengTu)
                @case('CONGKHAI')
                <i onclick="changePrivacyAboutMain('changePlaceWork',
            '{{ $data->IDCongViec }}',this)" class="fas fa-globe-europe text-xl cursor-pointer"></i>
                @break
                @case('CHIBANBE')
                <i onclick="changePrivacyAboutMain('changePlaceWork',
            '{{ $data->IDCongViec }}',this)" class="fas fa-user-friends text-xl cursor-pointer"></i>
                @break
                @case('RIENGTU')
                <i onclick="changePrivacyAboutMain('changePlaceWork',
            '{{ $data->IDCongViec }}',this)" class="fas fa-lock  text-xl cursor-pointer"></i>
                @break
                @endswitch
            </li>
            <li onclick="editViewAbout('{{ $data->IDCongViec }}',
            'PlaceWork','placeWorkMain','placeWork')" class="p-2  dark:text-white  text-gray-600">
                <i class="far fa-edit text-xl cursor-pointer"></i>
            </li>
            <li onclick="deleteAbout('{{ $data->IDCongViec }}',
            'PlaceWork','placeWorkMain')" class="p-2  dark:text-white  text-gray-600">
                <i class="far fa-trash-alt text-xl cursor-pointer"></i>
            </li>
        </ul>
    </div>
</li>