<div id="{{ $message->IDTinNhan }}" class="mess-user w-full py-2 flex relative">
    <div class="mess-user-feel hidden h-auto relative">
        <div class="cursor-pointer color-word absolute top-1/2 pl-2" style="transform: translateY(-50%);">
            <ul class="w-full flex relative">
                <li class="feel-mess px-1 mr-1 rounded-full hover:bg-gray-300 dark:hover:bg-dark-third">
                    <i class="far fa-smile text-xm"></i>
                </li>
                <li onclick="viewRemoveMessage(
                        '{{ $message->IDTinNhan }}',
                        '{{ $message->IDTaiKhoan }}')" class="px-1.5 rounded-full hover:bg-gray-300 dark:hover:bg-dark-third">
                    <i class="far fa-trash-alt text-xm"></i>
                </li>
            </ul>
        </div>
    </div>
    <div class="mess-user-r1 pl-2 flex mr-4" style="width: inherit;">
        <div class="mess-right break-all ml-auto border-none outline-none p-1.5 rounded-lg 
        dark:text-white dark:bg-dark-third" style="max-width:65%;font-size: 15px;">
            bạn đã thu hồi tin nhắn
        </div>
    </div>
    <div class="mess-user-r2 " style="width: 4%;">
        <div class="w-full clear-both">
            <i class="far fa-check-circle img-mess-right absolute bottom-1.5 text-gray-300"></i>
            <i class="fas fa-check-circle img-mess-right absolute hidden ml-2 "></i>
            <img src="img/avatar.jpg" class="hidden img-mess-right absolute w-7 h-7 p-0.5 object-cover rounded-full" alt="">
        </div>
    </div>
</div>