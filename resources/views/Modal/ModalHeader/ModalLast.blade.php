<?php

use Illuminate\Support\Facades\Session;

$user = Session::get('user');

?>
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