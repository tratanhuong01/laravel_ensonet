<?php

use App\Process\DataProcessFour;
use Illuminate\Support\Facades\Session;

$video = DataProcessFour::sorVideoByUser(Session::get('users')[0]->IDTaiKhoan, 0);

?>
<div class="w-full relative">
    <div class="w-full px-3">
        <div class="font-bold w-full py-2.5" style="font-size: 18px;">
            <p class="py-2 dark:text-white">Video
            <p>
            <ul class="flex" style="font-size: 15px;">
                <li class="cursor-pointer px-4 text-center" style="color:#0E8DF1;border-bottom:3px solid #0E8DF1">
                    Video của Hưởng</li>
                <li class="cursor-pointer py-2 px-4 text-center color-word">Video từ Hưởng</li>
            </ul>
        </div>
        @include('Component.Child.Video',[
        'video' => $video
        ])
    </div>
    <div class="w-full mx-auto my-2">
        <a class="block p-2.5 text-center font-bold rounded-lg bg-gray-300 dark:bg-dark-third dark:text-white" href="">Xem tất cả</a>
    </div>
</div>