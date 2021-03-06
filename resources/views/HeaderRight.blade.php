<?php

use Illuminate\Http\Request;
use App\Models\Notify;

?>
<li onclick="darkMode()" class="">
    <div class="cursor-pointer pt-1.5 relative h-10 ml-1 mr-1 w-10 bg-gray-200 dark:bg-dark-third dark:text-white text-center rounded-full">
        <i class="bx bx-plus text-xl hidden"></i>
        <i class="bx bxs-moon text-xl"></i>
    </div>
</li>
<li class="">
    <div onclick="openMessenger()" class="w-10 bg-gray-200 dark:bg-dark-third 
                        dark:text-white text-center rounded-full cursor-pointer h-10 ml-1 mr-1 pt-1.5 relative">
        <i class="bx bxl-messenger text-xl"></i>
        <span class="text-white bg-red-600 font-bold rounded-full text-xs px-1 py-0.5 absolute
                                -top-2 -right-1">
            99+
        </span>
    </div>
</li>
<li class="relative">
    <div onclick="openRequestFriend()" class="pt-1.5 relative w-10 bg-gray-200 
                        dark:bg-dark-third dark:text-white text-center rounded-full cursor-pointer 
                        h-10 ml-1 mr-1">
        <i class="far fa-bell text-xm"></i>
        <span id="numNotification" class="absolute
                                -top-2 -right-1">
            @include('Component\Child\SoLuongThongBao',
            ['num' => Notify::countNotify(Session::get('user')[0]->IDTaiKhoan)])
        </span>
    </div>
</li>
<li class="relative">
    <div onclick="eModalHeaderRight()" class="pt-1.5 w-10 bg-gray-200 dark:bg-dark-third dark:text-white text-center rounded-full cursor-pointer 
                        h-10 ml-1 mr-1">
        <i class="fas fa-sort-down text-xl leading-4"></i>
    </div>
</li>