<?php

use App\Process\DataProcess;
?>
<div id="{{ $message->IDTinNhan }}" class="mess-user w-full py-1 flex relative">
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
    <div class="mess-user-r1 pl-2 flex mr-4" style="width: inherit;">
        <div class="mess-right break-all ml-auto border-none outline-none bg-blue-500 p-1.5 rounded-lg 
                text-white " style="max-width:65%;font-size: 15px;">
            {{ $message->NoiDung }}
        </div>
    </div>
    <div class="mess-user-r2 " style="width: 4%;">
        <div class="w-full clear-both">
            @if ($message->TrangThai == 0)
            @else
            @switch(explode('#',DataProcess::getState($message->TrangThai,$message->IDTaiKhoan))[1])
            @case('0')
            <i class="far fa-check-circle img-mess-right absolute bottom-1.5 text-gray-300"></i>
            @break
            @case('1')
            <i class="fas fa-check-circle img-mess-right absolute bottom-1.5 text-gray-300"></i>
            @break
            @case('2')
            <img src="img/avatar.jpg" class=" img-mess-right absolute w-7 h-7 p-0.5 object-cover rounded-full" alt="">
            @break
            @endswitch
            @endif
        </div>
    </div>
</div>