<li class="w-full py-2 flex relative" id="{{$value->IDThanhVienGiaDinh}}MemberFamily" style="font-size: 16px;">
    <div class="w-10/12 pb-2 flex">
        <div class="mr-2">
            <img src="/{{ $value->AnhDaiDien }}" class="w-12 h-12 object-cover 
                            rounded-full" alt="">
        </div>
        <div class="">
            <p class="dark:text-gray-300 text-xm text-gray-600 pb-2">{{ $value->Ho . ' ' . $value->Ten }}</p>
            <p class="text-sm dark:text-gray-300 text-gray-600" style="font-size:12px;">{{ $value->MoiQuanHe }} - {{ $value->TinhTrang }}</p>
        </div>
    </div>
    <div class="w-2/12 py-2.5">
        <ul class="w-full flex">
            <li class="p-2 dark:text-white text-gray-600">
                @switch($value->IDQuyenRiengTu)
                @case('CONGKHAI')
                <i onclick="changePrivacyAboutMain('changeMemberFamily',
            '{{ $value->IDThanhVienGiaDinh }}',this)" class="fas fa-globe-europe text-xl cursor-pointer"></i>
                @break
                @case('CHIBANBE')
                <i onclick="changePrivacyAboutMain('changeMemberFamily',
            '{{ $value->IDThanhVienGiaDinh }}',this)" class="fas fa-user-friends text-xl cursor-pointer"></i>
                @break
                @case('RIENGTU')
                <i onclick="changePrivacyAboutMain('changeMemberFamily',
            '{{ $value->IDThanhVienGiaDinh }}',this)" class="fas fa-lock  text-xl cursor-pointer"></i>
                @break
                @endswitch
            </li>
            <li class="p-2  dark:text-white  text-gray-600">
                <i class="far fa-edit text-xl cursor-pointer"></i>
            </li>
            <li onclick="deleteAbout('{{ $value->IDThanhVienGiaDinh }}',
            'MemberFamily','memberFamilyMain')" class="p-2  dark:text-white  text-gray-600">
                <i class="far fa-trash-alt text-xl cursor-pointer"></i>
            </li>
        </ul>
    </div>
</li>