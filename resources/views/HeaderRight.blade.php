<?php

use Illuminate\Http\Request;

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
<li class="">
    <div onclick="openRequestFriend()" class="pt-1.5 relative w-10 bg-gray-200 
                        dark:bg-dark-third dark:text-white text-center rounded-full cursor-pointer 
                        h-10 ml-1 mr-1">
        <i class="far fa-bell text-xm"></i>
        <span class="text-white bg-red-600 font-bold rounded-full text-xs px-1 py-0.5 absolute
                                -top-2 -right-1">
            99+
        </span>
    </div>
</li>
<li class="relative">
    <div onclick="eModalHeaderRight()" class="pt-1.5 w-10 bg-gray-200 dark:bg-dark-third dark:text-white text-center rounded-full cursor-pointer 
                        h-10 ml-1 mr-1">
        <i class="fas fa-sort-down text-xl leading-4"></i>
    </div>
    <div style="display:none;" id="header-right-modal" class="dark:bg-dark-second bg-white my-2 absolute right-0 
                        w-80 p-2 border-2 border-solid rounded-lg z-50">
        <ul class="w-full">
            <?php

            $url_red = "profile." . $user[0]->IDTaiKhoan;

            ?>
            <li onclick='window.location.href = "{{ url($url_red)}}"' class="w-full flex p-3 cursor-pointer flex dark:hover:bg-dark-third hover:bg-gray-200">
                <?php
                $path = explode('/', parse_url(url()->current())['path']);
                switch (count($path)) {
                    case '2':
                        $path = '/';
                        break;
                    case '3':
                        $path = '/../../';
                        break;
                    case '4':
                        $path = '/../../../';
                        break;
                }
                ?>
                <img class="w-12 h-12 rounded-full object-cover" src="{{ $path.$user[0]->AnhDaiDien }}" alt="" srcset="">
                &nbsp;&nbsp;
                <p class="pt-2.5 pl-1 dark:text-white font-bold">{{ $user[0]->Ho . ' ' . $user[0]->Ten }}</p>
            </li>
            <li onclick="window.location.href = 'logout'" class="w-full flex p-3 cursor-pointer dark:hover:bg-dark-third 
                                hover:bg-gray-200">
                <a href="{{ url('logout') }}" class="dark:text-white font-bold">
                    &nbsp; &nbsp;&nbsp;<i class="fas fa-sign-out-alt text-xl dark:text-white"></i>
                    &nbsp; &nbsp; &nbsp;Đăng Xuất</a>
            </li>
        </ul>
    </div>
</li>