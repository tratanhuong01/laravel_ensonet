<li class="w-full pb-6 flex  dark:text-white" style="font-size: 16px;">
    <div class="w-1/12 py-3">
        <i class="fas fa-phone text-2xl" style="transform: rotate(90deg);"></i>
    </div>
    <div class="w-3/4">
        <p class="font-bold text-xm py-1" style="font-family: system-ui;">{{ $value->SoDienThoai }}</p>
        <p>Di động</p>
    </div>
    <div class="w-2/12">
        <ul class="flex w-full justify-end">
            @if ($idMain == $idView)
            <li class="p-2 dark:text-white text-gray-600">
                @switch($value->IDQuyenRiengTu)
                @case('CONGKHAI')
                <i onclick="changePrivacyAboutMain('changeNumberPhone','{{ $value->IDSoDienThoai }}',this)" class="fas fa-globe-europe text-xl cursor-pointer"></i>
                @break
                @case('CHIBANBE')
                <i onclick="changePrivacyAboutMain('changeNumberPhone','{{ $value->IDSoDienThoai }}',this)" class="fas fa-user-friends text-xl cursor-pointer"></i>
                @break
                @case('RIENGTU')
                <i onclick="changePrivacyAboutMain('changeNumberPhone','{{ $value->IDSoDienThoai }}',this)" class="fas fa-lock  text-xl cursor-pointer"></i>
                @break
                @endswitch
            </li>
            <li class="p-2  dark:text-white  text-gray-600">
                <i class="far fa-edit text-xl cursor-pointer"></i>
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