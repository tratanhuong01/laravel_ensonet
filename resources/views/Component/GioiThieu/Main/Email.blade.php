<li class="w-full pb-6 flex" style="font-size: 16px;">
    <div class="w-1/12 py-3">
        <i class="far fa-envelope text-2xl"></i>
    </div>
    <div class="w-3/4">
        <p class="font-bold text-xm py-1" style="font-family: system-ui;">{{ $value->Email }}
        </p>
        <p>Email</p>
    </div>
    <div class="w-2/12">
        <ul class="float-right flex">
            <li class="p-2 dark:text-white text-gray-600">
                @switch($value->IDQuyenRiengTu)
                @case('CONGKHAI')
                <i onclick="changePrivacyAboutMain('changeEmail',
                '{{ $value->IDEmail }}',this)" class="fas fa-globe-europe text-xl cursor-pointer"></i>
                @break
                @case('CHIBANBE')
                <i onclick="changePrivacyAboutMain('changeEmail',
                '{{ $value->IDEmail }}',this)" class="fas fa-user-friends text-xl cursor-pointer"></i>
                @break
                @case('RIENGTU')
                <i onclick="changePrivacyAboutMain('changeEmail',
                '{{ $value->IDEmail }}',this)" class="fas fa-lock  text-xl cursor-pointer"></i>
                @break
                @endswitch
            </li>
            <li class="p-2  dark:text-white  text-gray-600">
                <i class="far fa-edit text-xl cursor-pointer"></i>
            </li>
        </ul>
    </div>
</li>