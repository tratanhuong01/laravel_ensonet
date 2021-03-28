<li class="w-full pb-6 flex flex-wrap" style="font-size: 16px;">
    <div class="w-1/12 py-3">
        <i class="fas fa-birthday-cake text-2xl"></i>
    </div>
    <div class="w-3/4">
        <p class="font-bold text-xm py-1" style="font-family: system-ui;">
            {{ $value->Ngay->Ngay}} tháng {{ $value->Thang->Thang}}
        </p>
        <p>Ngày sinh</p>
    </div>
    <div class="w-2/12">
        <ul class="float-right flex">
            <li class="p-2 dark:text-white text-gray-600">
                @switch($value->Ngay->IDQuyenRiengTu)
                @case('CONGKHAI')
                <i onclick="changePrivacyAboutMain('changeDayMonth',
                '{{ $value->Ngay->IDNgay }}',this)" class="fas fa-globe-europe text-xl cursor-pointer"></i>
                @break
                @case('CHIBANBE')
                <i onclick="changePrivacyAboutMain('changeDayMonth',
                '{{ $value->Ngay->IDNgay }}',this)" class="fas fa-user-friends text-xl cursor-pointer"></i>
                @break
                @case('RIENGTU')
                <i onclick="changePrivacyAboutMain('changeDayMonth',
                '{{ $value->Ngay->IDNgay }}',this)" class="fas fa-lock  text-xl cursor-pointer"></i>
                @break
                @endswitch
            </li>
            <li onclick="editViewAbout('',
            'BirthDay','birthDayMain','birthday','{{$idTaiKhoan}}')" class="p-2 dark:text-white"><i class="far fa-edit text-xl cursor-pointer"></i></li>
        </ul>
    </div>
    <div class="w-1/12 py-3">

    </div>
    <div class="w-3/4">
        <p class="font-bold text-xm py-1" style="font-family: system-ui;">2001
        </p>
        <p>Năm sinh</p>
    </div>
    <div class="w-2/12">
        <ul class="float-right flex">
            <li class="p-2 dark:text-white text-gray-600">
                @switch($value->Nam->IDQuyenRiengTu)
                @case('CONGKHAI')
                <i onclick="changePrivacyAboutMain('changeYear',
                '{{ $value->Nam->IDNam }}',this)" class="fas fa-globe-europe text-xl cursor-pointer"></i>
                @break
                @case('CHIBANBE')
                <i onclick="changePrivacyAboutMain('changeYear',
                '{{ $value->Nam->IDNam  }}',this)" class="fas fa-user-friends text-xl cursor-pointer"></i>
                @break
                @case('RIENGTU')
                <i onclick="changePrivacyAboutMain('changeYear',
                '{{ $value->Nam->IDNam }}',this)" class="fas fa-lock  text-xl cursor-pointer"></i>
                @break
                @endswitch
            </li>
            <li class="p-2 color-word">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
        </ul>
    </div>
</li>