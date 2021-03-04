<?php

use Illuminate\Support\Facades\Session;
use App\Models\Functions;

$users = Session::get('users');
$user = Session::get('user');
?>
<div class="w-63% mx-auto py-2">
    <div class="w-full flex py-4">
        <div class="font-bold w-2/12 py-2.5">
            <p style="font-size: 15px;" class="dark:text-white font-bold">Bạn Bè</p>
        </div>
        <div class="w-5/12 font-bold py-2.5 text-right">
            <a style="color: #1876F2;font-size: 15px;" href="">Lời mời
                kết bạn</a>
        </div>
        <div class="w-5/12">
            <form action="" method="post" class="text-right">
                <input class="w-7/12 p-2 border-none outline-none bg-gray-100 dark:bg-dark-third rounded-lg" type="text" name="" id="" placeholder="Tìm kiếm">
                <button class="w-4/12 p-2 border-none font-bold text-white rounded-lg" style="background-color: #139DF7;" type="submit">Tìm bạn bè</button>
            </form>
        </div>
    </div>
    <div class="main-friends w-full flex border-2 border-solid border-gray-200 dark:border-dark-second rounded-lg flex-wrap 
    dark:bg-gray-main">
        @if (count($data) == 0) <p class="font-bold dark:text-white text-center mx-auto py-4">Không có bạn bè để hiển thị</p>
        @else
        @for ($i = 0 ; $i < count($data) ; $i++) <div class="relative flex border-2 border-solid dark:border-dark-second  
        border-gray-200 rounded-lg" style="width: 48.5%;margin: 6px;padding: 2%;">
            <div class="w-1/4">
                <a href="profile.{{ $data[$i][0]->IDTaiKhoan }}"><img class="w-24 h-24 rounded-lg object-cover" src="/{{ $data[$i][0]->AnhDaiDien }}" alt=""></a>
            </div>
            <div class="w-2/4 py-4 pl-4">
                <p style="font-family: Arial, Helvetica, sans-serif"><b>
                        <a style="font-size: 17px;" class="dark:text-white" href="profile.{{ $data[$i][0]->IDTaiKhoan }}">
                            {{ $data[$i][0]->Ho . ' ' .  $data[$i][0]->Ten }}</a></b></p>
                <p style="color: #65687B;font-size: 14px;">
                    {{ count(Functions::getMutualFriend($data[$i][0]->IDTaiKhoan,$user[0]->IDTaiKhoan)) }} bạn chung
                </p>
            </div>
            <div class="w-1/4 py-5">
                <button onclick="openEditFriend('{{ $i }}')" class=" px-3 py-2 bg-gray-300 rounded-lg font-bold">Bạn
                    Bè</button>
                <div style="display: none;" class="edit-friend bg-white my-2 absolute w-80 p-2 border-2 border-solid rounded-lg">
                    <ul class="w-full">
                        <li class="w-full flex p-3 cursor-pointer"><img class="w-5 h-5 mr-4" src="img/icon/1.png" alt="" srcset="">
                            Yêu thích</li>
                        <li class="w-full flex p-3 cursor-pointer"><img class="w-5 h-5 mr-4" src="img/icon/2.png" alt="" srcset="">
                            Chỉnh sửa danh sách bạn bè</li>
                        <li class="w-full flex p-3 cursor-pointer"><img class="w-5 h-5 mr-4" src="img/icon/3.png" alt="" srcset="">
                            Bỏ theo dõi</li>
                        <li class="w-full flex p-3 cursor-pointer"><img class="w-5 h-5 mr-4" src="img/icon/4.png" alt="" srcset="">
                            Hủy kết bạn</li>
                    </ul>
                </div>
            </div>
    </div>
    @endfor
    @endif
</div>
</div>