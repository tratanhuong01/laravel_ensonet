<li class="w-full pb-4 flex" id="{{ $data->IDHocVan }}School" style="font-size: 16px;">
    <div class="w-10/12 text-gray-600  dark:text-white ">
        <i class="fas fa-graduation-cap text-2xl"></i>&nbsp;
        @if ($data->NamKetThuc == null)
        {{ 'Học tại ' }}
        @else
        {{ 'Đã tốt nghiệp tại' }}
        @endif
        <b>{{ $data->TenTruongHoc }}</b>
    </div>
    <div class="w-2/12 flex justify-end">
        @if ($idMain == $idView)
        <div class="p-2 dark:text-white text-gray-600">
            @switch($data->IDQuyenRiengTu)
            @case('CONGKHAI')
            <i onclick="changePrivacyAboutMain('changeSchool','{{ $data->IDHocVan }}',this)" class="fas fa-globe-europe text-xl cursor-pointer"></i>
            @break
            @case('CHIBANBE')
            <i onclick="changePrivacyAboutMain('changeSchool','{{ $data->IDHocVan }}',this)" class="fas fa-user-friends text-xl cursor-pointer"></i>
            @break
            @case('RIENGTU')
            <i onclick="changePrivacyAboutMain('changeSchool','{{ $data->IDHocVan }}',this)" class="fas fa-lock  text-xl cursor-pointer"></i>
            @break
            @endswitch
        </div>
        <div onclick="editViewAbout('{{ $data->IDHocVan }}',
                'School','schoolMain','school','{{ $idTaiKhoan }}')" class="p-2  dark:text-white  text-gray-600">
            <i class="far fa-edit text-xl cursor-pointer"></i>
        </div>
        <div onclick="deleteAbout('{{ $data->IDHocVan }}',
                            'School','schoolMain')" class="p-2  dark:text-white  text-gray-600">
            <i class="far fa-trash-alt text-xl cursor-pointer"></i>
        </div>
        @else
        <div class="p-2 dark:text-white text-gray-600">
            @switch($data->IDQuyenRiengTu)
            @case('CONGKHAI')
            <i class="fas fa-globe-europe text-xl cursor-pointer"></i>
            @break
            @case('CHIBANBE')
            <i class="fas fa-user-friends text-xl cursor-pointer"></i>
            @break
            @case('RIENGTU')
            <i class="fas fa-lock  text-xl cursor-pointer"></i>
            @break
            @endswitch
        </div>
        @endif
    </div>
</li>