<li class="w-full  pt-2 pb-4 flex Marriage" style="font-size: 16px;">
    <div class="w-10/12 text-gray-600  dark:text-white">
        &nbsp;<i class="fas fa-heart text-gray-600  dark:text-white   text-2xl"></i>
        &nbsp;&nbsp;&nbsp;{{$data->TinhTrang}}
    </div>
    <div class="w-2/12">
        <ul class="float-right flex">
            <li class="p-2 dark:text-white text-gray-600">
                @switch($data->IDQuyenRiengTu)
                @case('CONGKHAI')
                <i onclick="changePrivacyAboutMain('changeMarriage',
            '{{ $data->IDHonNhan }}',this)" class="fas fa-globe-europe text-xl cursor-pointer"></i>
                @break
                @case('CHIBANBE')
                <i onclick="changePrivacyAboutMain('changeMarriage',
            '{{ $data->IDHonNhan }}',this)" class="fas fa-user-friends text-xl cursor-pointer"></i>
                @break
                @case('RIENGTU')
                <i onclick="changePrivacyAboutMain('changeMarriage',
            '{{ $data->IDHonNhan }}',this)" class="fas fa-lock  text-xl cursor-pointer"></i>
                @break
                @endswitch
            </li>
            <li onclick="editViewAboutChild('{{ $data->IDHonNhan }}',
            'Marriage','marriageMainEdit','marriage')" class="p-2  dark:text-white  text-gray-600">
                <i class="far fa-edit text-xl cursor-pointer"></i>
            </li>
        </ul>
    </div>
</li>