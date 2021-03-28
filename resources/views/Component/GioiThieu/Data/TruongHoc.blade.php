<li class="w-full pb-4 flex" style="font-size: 16px;">
    <div class="w-10/12 text-gray-600  dark:text-white ">
        <i class="fas fa-graduation-cap text-2xl"></i>&nbsp;
        @if ($data->NamKetThuc == NULL)
        {{ 'Học tại ' }}
        @else
        {{ 'Đã tốt nghiệp tại' }}
        @endif
        <b>{{ $data->TenTruongHoc  }}</b>
    </div>
    <div class="w-2/12">
        <ul class="w-full flex">
            <li class="p-2 dark:text-white text-gray-600">
                @switch($data->IDQuyenRiengTu)
                @case('CONGKHAI')
                <i onclick="changePrivacyAboutMain('changeSchool',
                '{{ $data->IDHocVan }}',this)" class="fas fa-globe-europe text-xl cursor-pointer"></i>
                @break
                @case('CHIBANBE')
                <i onclick="changePrivacyAboutMain('changeSchool',
                '{{ $data->IDHocVan }}',this)" class="fas fa-user-friends text-xl cursor-pointer"></i>
                @break
                @case('RIENGTU')
                <i onclick="changePrivacyAboutMain('changeSchool',
                '{{ $data->IDHocVan }}',this)" class="fas fa-lock  text-xl cursor-pointer"></i>
                @break
                @endswitch
            </li>
            <li class="p-2  dark:text-white  text-gray-600">
                <i class="far fa-edit text-xl cursor-pointer"></i>
            </li>
            <li onclick="deleteAbout('{{ $data->IDHocVan }}',
            'School','schoolMain')" class="p-2  dark:text-white  text-gray-600">
                <i class="far fa-trash-alt text-xl cursor-pointer"></i>
            </li>
        </ul>
    </div>
</li>