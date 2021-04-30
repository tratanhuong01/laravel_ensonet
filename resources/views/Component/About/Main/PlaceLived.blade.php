<li class="w-full py-2 flex relative" id="{{ $value->IDNoiTungSong }}PlaceLived" style="font-size: 16px;">
    <div class="w-10/12 pb-2 flex">
        <div class="mr-2 pt-0.5">
            <img src="/{{ $value->DuongDanImg }}" class="w-12 h-12 object-cover 
                            rounded-full" alt="">
        </div>
        <div class="">
            <p class="dark:text-gray-300 text-xm text-gray-600 pb-2">
                {{ $value->TenDiaChi }}
            </p>
            <p class="text-sm dark:text-gray-300 text-gray-600" style="font-size:12px;">
                Nơi từng sống
            </p>
        </div>
    </div>
    <div class="w-2/12 py-2.5">
        <ul class="w-full flex justify-end">
            @if ($idMain == $idView)
            <li class="p-2 dark:text-white text-gray-600">
                @switch($value->IDQuyenRiengTu)
                @case('CONGKHAI')
                <i onclick="changePrivacyAboutMain('changePlaceLived','{{ $value->IDNoiTungSong }}',this)" class="fas fa-globe-europe text-xl cursor-pointer"></i>
                @break
                @case('CHIBANBE')
                <i onclick="changePrivacyAboutMain('changePlaceLived','{{ $value->IDNoiTungSong }}',this)" class="fas fa-user-friends text-xl cursor-pointer"></i>
                @break
                @case('RIENGTU')
                <i onclick="changePrivacyAboutMain('changePlaceLived','{{ $value->IDNoiTungSong }}',this)" class="fas fa-lock  text-xl cursor-pointer"></i>
                @break
                @endswitch
            </li>
            <li onclick="editViewAbout('{{ $value->IDNoiTungSong }}',
                'PlaceLived','placeLivedMain','placeLived','{{ $idTaiKhoan }}')" class="p-2  dark:text-white  text-gray-600">
                <i class="far fa-edit text-xl cursor-pointer"></i>
            </li>
            <li onclick="deleteAbout('{{ $value->IDNoiTungSong }}',
                 'PlaceLived','placeLivedMain')" class="p-2  dark:text-white  text-gray-600">
                <i class="far fa-trash-alt text-xl cursor-pointer"></i>
            </li>
            @else
            <li class="p-2 dark:text-white text-gray-600">
                @switch($value->IDQuyenRiengTu)
                @case('CONGKHAI')
                <i class="fas fa-globe-europe text-xl cursor-pointer"></i>
                @break
                @case('CHIBANBE')
                <i class="fas fa-user-friends text-xl cursor-pointer"></i>
                @break
                @endswitch
            </li>
            @endif
        </ul>
    </div>
</li>