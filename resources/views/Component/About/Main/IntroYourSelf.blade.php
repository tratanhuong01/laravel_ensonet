<li class="w-full py-4 flex relative" style="font-size: 16px;">
    <div class="w-10/12 py-2 dark:text-white">
        {{ $value->TenGioiThieu }}
    </div>
    <div class="w-2/12">
        <ul class="w-full flex justify-end">
            @if ($idMain == $idView)
            <li class="p-2 dark:text-white text-gray-600">
                @switch($value->IDQuyenRiengTu)
                @case('CONGKHAI')
                <i onclick="changePrivacyAboutMain('changeIntroYourSelf','{{ $value->IDGioiThieu }}',this)" class="fas fa-globe-europe text-xl cursor-pointer"></i>
                @break
                @case('CHIBANBE')
                <i onclick="changePrivacyAboutMain('changeIntroYourSelf','{{ $value->IDGioiThieu }}',this)" class="fas fa-user-friends text-xl cursor-pointer"></i>
                @break
                @case('RIENGTU')
                <i onclick="changePrivacyAboutMain('changeIntroYourSelf','{{ $value->IDGioiThieu }}',this)" class="fas fa-lock  text-xl cursor-pointer"></i>
                @break
                @endswitch
            </li>
            <li class="p-2  dark:text-white  text-gray-600">
                <i class="far fa-edit text-xl cursor-pointer"></i>
            </li>
            <li class="p-2  dark:text-white  text-gray-600">
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