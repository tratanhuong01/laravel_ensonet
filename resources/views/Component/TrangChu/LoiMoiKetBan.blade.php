<?php

use App\Models\Functions;
use App\Models\StringUtil;

?>
<div id="friend-request">
    <div class="w-full">
        <span class="float-left">
            <p class="font-bold dark:text-white">Lời mời kết bạn</p>
        </span>
        <span class="float-right">
            <a href="" class="font-bold dark:text-white">Xem tất cả</a>
        </span>
    </div>
    @for ($i = 0 ; $i < count($requestFriend) ; $i++) <div class="w-full flex py-2.5 px-0">
        <div class="w-1/5 pt-2">
            <a href=""><img class="w-16 h-16 rounded-full" src="/{{ $requestFriend[$i][0]->AnhDaiDien }}" alt=""></a>
        </div>
        <div class="w-4/5 pl-2">
            <div class="w-full">
                <span class="float-left pl-2.5 font-bold">
                    <a href="" class="dark:text-white">{{ $requestFriend[$i][0]->Ho . ' ' . 
                        $requestFriend[$i][0]->Ten }}</a></span>
                <span class="float-right text-xs dark:text-white">
                    {{ StringUtil::CheckDateTimeRequest(Functions::getDateTimeFriend($user[0]->IDTaiKhoan,
                        $requestFriend[$i][0]->IDTaiKhoan,'2','NgayGui')) }}
                </span>
            </div>
            <div class="w-full flex py-2.5 px-0 text-sm font-bold">
                <span class="w-7/12 text-center h-10 leading-10 mr-4 cursor-pointer" style="border-radius: 10px;background-color: #1877F2;">
                    <a class="text-white " href="">Xác Nhận</a>
                </span>
                <span class="w-7/12 text-center h-10 leading-10 cursor-pointer" style="background-color: #D8DADF;border-radius: 10px;">
                    <a class="color-black" href="">Xóa</a>
                </span>
            </div>
        </div>
</div>
@endfor
<hr class="my-2.5 mx-auto w-full">
</div>