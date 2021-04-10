<?php

use Illuminate\Support\Facades\Session;

$user = Session::get('user');

?>
<div class="w-full py-2  flex">
    @include('Component/MoiQuanHe/DanhMuc')
    <div class="w-5/12 py-1.5 text-right">
        <span onclick="openChat('{{ $users[0]->IDTaiKhoan }}')" class="p-3 mr-2 cursor-pointer dark:bg-dark-third dark:text-white bg-gray-200 font-bold rounded-lg" style="line-height: 24px;"><i class="fab fa-facebook-messenger dark:text-white" style="font-size: 20px;"></i>&nbsp;&nbsp;Nhắn tin</span>
        <span class="p-3 mr-2 cursor-pointer dark:bg-dark-third dark:text-white bg-gray-200 font-bold rounded-lg">
            <i class="fas fa-phone dark:text-white" style="transform: rotate(90deg);"></i>
        </span>
        <span class="p-3 mr-2 cursor-pointer dark:bg-dark-third dark:text-white bg-gray-200 font-bold rounded-lg">
            <i class="fas fa-user-friends dark:text-white"></i></span>
        <span onclick="DeleteFriend('{{ $user[0]->IDTaiKhoan }}','{{ $users[0]->IDTaiKhoan }}')" class="p-3 cursor-pointer dark:bg-dark-third dark:text-white bg-gray-200 font-bold rounded-lg"><i class="fas fa-user-slash huyBanBe dark:text-white"></i></span>
    </div>
</div>