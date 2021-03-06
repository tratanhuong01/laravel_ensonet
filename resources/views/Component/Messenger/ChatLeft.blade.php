<div id="{{ $message->IDTinNhan }}" class="mess-user w-full py-2 flex relative">
    <div class=" relative" style="width: 5%;">
        <a href=""><img class="absolute bottom-1 w-9 h-9 object-cover rounded-full" src="/{{ $message->AnhDaiDien }}" alt="" srcset=""></a>
    </div>
    <div class=" pl-2 flex" style="width: inherit;">
        <div class="border-none outline-none bg-gray-200 bg-1877F2 p-1.5 rounded-lg" style="max-width:65%;font-size: 15px;">
            {{ $message->NoiDung }}
        </div>
        <div class="mess-user-feel hidden h-auto relative">
            <div class="cursor-pointer color-word absolute top-1/2 pl-2" style="transform: translateY(-50%);">
                <ul class="w-full flex relative">
                    <li class="feel-mess px-1 mr-1 rounded-full hover:bg-gray-300 dark:hover:bg-dark-third">
                        <i class="far fa-smile text-xm"></i>
                    </li>
                    <li onclick="viewRemoveMessage(
                        '{{ $message->IDTinNhan }}',
                        '{{ $message->IDTaiKhoan }}',
                        '{{ $message->IDNhomTinNhan }}')" class="px-1.5 rounded-full hover:bg-gray-300 dark:hover:bg-dark-third">
                        <i class="far fa-trash-alt text-xm"></i>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>