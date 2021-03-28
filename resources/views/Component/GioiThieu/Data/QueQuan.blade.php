<li class="w-full pb-4 flex" style="font-size: 16px;">
    <div class="w-10/12 text-gray-600  dark:text-white ">
        &nbsp;&nbsp;<i class="fas fa-map-marker-alt text-gray-600  dark:text-white  text-2xl"></i>
        &nbsp;&nbsp;&nbsp;&nbsp;Đến từ <b>{{ $data->TenDiaChi }}</b>
    </div>
    <div class="w-2/12">
        <ul class="w-full flex">
            <li class="p-2 dark:text-white text-gray-600">
                @switch($data->IDQuyenRiengTu)
                @case('CONGKHAI')
                <i onclick="changePrivacyAboutMain('changeHomeTown',
                '{{ $data->IDQueQuan }}',this)" class="fas fa-globe-europe text-xl cursor-pointer"></i>
                @break
                @case('CHIBANBE')
                <i onclick="changePrivacyAboutMain('changeHomeTown',
                '{{ $data->IDQueQuan }}',this)" class="fas fa-user-friends text-xl cursor-pointer"></i>
                @break
                @case('RIENGTU')
                <i onclick="changePrivacyAboutMain('changeHomeTown',
                '{{ $data->IDQueQuan }}',this)" class="fas fa-lock  text-xl cursor-pointer"></i>
                @break
                @endswitch
            </li>
            <li class="p-2  dark:text-white  text-gray-600">
                <i class="far fa-edit text-xl cursor-pointer"></i>
            </li>
            <li onclick="deleteAbout('{{ $data->IDQueQuan }}',
            'HomeTown','homeTownMain')" class="p-2  dark:text-white  text-gray-600">
                <i class="far fa-trash-alt text-xl cursor-pointer"></i>
            </li>
        </ul>
    </div>
</li>