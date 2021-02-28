<?php

use Illuminate\Support\Facades\Session;
use App\Models\StringUtil;

$user = Session::get('user');

?>
<div class="w-full mx-0 my-2 flex">
    <div class="w-1/12 pt-2">
        <a href=""><img class="w-12 h-12 p-0.5 rounded-full" src="/{{ $user[0]->AnhDaiDien }}" alt="" srcset=""></a>
    </div>
    <div class="w-11/12 ml-2">
        <div class="comment-per w-max p-2 dark:bg-dark-third bg-gray-100 relative rounded-lg" style="max-width: 91%;">
            <p><a href="" class="font-bold dark:text-white">{{ $user[0]->Ho . ' ' . $user[0]->Ten }}</a></p>
            <p class="dark:text-white" style="font-size: 15px;clear: both;">
                {{ $comment[0]->NoiDungBinhLuan }}
            </p>
            <span class="tym-comment dark:bg-dark-main bg-white color-word px-2 py-1 absolute right-4 -bottom-6 cursor-pointer" style="border-radius: 20px;">
                <i class="fas fa-heart text-xm cursor-pointer pt-0.5" style="color: red;">
                </i>&nbsp;&nbsp;<b class="dark:text-white" style="font-size: 14px;">2</b>
            </span>
        </div>
        <ul class="flex pl-2">
            <li class="font-bold text-sm py-1 pr-2 cursor-pointer dark:text-white">Tym</li>
            <li class="font-bold text-sm py-1 pr-2 cursor-pointer dark:text-white">Trả lời</li>
            <li class="py-1 pr-2 cursor-pointer dark:text-white" style="font-size: 12px;">
                {{ StringUtil::CheckDateTime($comment[0]->ThoiGianBinhLuan) }}
            </li>
        </ul>
        <p style="font-size: 15px;display: none;" class="color-word font-bold cursor-pointer pl-2">
            <i style="color: #65676B;" class="fas fa-angle-double-down"></i>&nbsp;&nbsp;
            Xem 19 bình luận
        </p>
        <p style="font-size: 15px;display: none;" class="color-word font-bold cursor-pointer pl-2">
            <i style="color: #65676B;" class="fas fa-angle-double-up"></i>&nbsp;&nbsp;
            Thu gọn
        </p>
    </div>
</div>