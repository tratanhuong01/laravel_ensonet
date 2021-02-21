<?php

use Illuminate\Support\Facades\Session;

$user = Session::get('user'); ?>
<div class="w-full mx-auto flex py-2 md:w-4/5 lg:w-3/4 md:mx-auto xl:w-63%">
    @include('Component/MoiQuanHe/DanhMuc')
    <div class="w-4/5 pb-1.5 text-right mr-3">
        <span onclick="CancelRequestFriend('{{ $user[0]->IDTaiKhoan }}','{{ $users[0]->IDTaiKhoan }}')" class="p-3 mr-2 cursor-pointer " style="background-color: #E7F3FF;
        color:#1095F4;font-weight:bold;border-radius: 6px;line-height: 24px;"><i class="fas fa-user-times guiYeuCau" style="font-size: 18px;"></i>&nbsp;&nbsp;
            <span class="main_themBanBe">Hủy kết bạn</span></span>
        <span class="p-3 mr-2 cursor-pointer dark:bg-dark-third dark:text-white bg-gray-200 font-bold rounded-lg">
            <i class="fab fa-facebook-messenger dark:text-white" style="font-size: 19px;"></i>
        </span>
        <span class="p-3 mr-2 cursor-pointer dark:bg-dark-third text-center dark:text-white bg-gray-200 font-bold rounded-lg">
            <i class="fab fa-foursquare dark:text-white pl-1" style="font-size: 19px;"></i>
        </span>
        <span class="p-3 cursor-pointer dark:bg-dark-third dark:text-white bg-gray-200 font-bold rounded-lg"><i class="fas fa-ellipsis-h dark:text-white"></i></span>
    </div>
</div>
</div>
<div class="w-full hidden sm:flex mx-auto py-2 md:w-4/5 lg:w-3/4 md:mx-auto xl:w-63%">
    <div class="w-3/4">
        <p class="text-2xl font-bold dark:text-white" style="font-family: system-ui;">
            Bạn có biết {{ $users[0]->Ten }} không ? </p>
        <p class="text-xm color-word">
            Hãy gửi lời mời kết bạn để xem những gì anh ấy chia sẻ với bạn bè.</p>
        <div class="w-full py-2">
            <ul class="flex relative h-10">
                <li class="df_new w-9 h-9">
                    <img class="w-9 h-9 rounded-full absolute left-16" src="img/avatar.jpg" alt="">
                </li>
                <li><i style="font-size: 14px;" class="rounded-full absolute left-18 pl-1 top-3 text-white fas fa-ellipsis-h"></i>
                </li>
                <li><img class="w-9 h-9 rounded-full absolute left-8" src="img/boy.jpg" alt=""></li>
                <li><img class="w-9 h-9 rounded-full absolute left-0" src="img/girl.jpg" alt=""></li>
                <li class="p-2"><span class="color-word text-xm absolute left-28"> 8 bạn chung</span></li>
            </ul>
        </div>
    </div>
    <div class="w-1/4 py-2 text-right my-8">
        <span onclick="CancelRequestFriend('{{ $user[0]->IDTaiKhoan }}','{{ $users[0]->IDTaiKhoan }}')" class="p-3 mr-2 cursor-pointer " style="background-color: #E7F3FF;
        color:#1095F4;font-weight:bold;border-radius: 6px;line-height: 24px;"><i class="fas fa-user-times guiYeuCau" style="font-size: 18px;"></i>&nbsp;&nbsp;
            <span class="main_themBanBe">Hủy kết bạn</span></span>
    </div>
</div>