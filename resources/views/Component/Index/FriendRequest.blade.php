<?php

use App\Models\Functions;
use App\Models\StringUtil;
use Illuminate\Support\Facades\Session;

$user = Session::get('user');

?>
@if (count($requestFriend) == 0)
<p class="mx-auto py-3 dark:text-white text-center font-bold dark:text-white">
    Không có lời mời kết bạn</p>
@else
@for($i = 0 ; $i < count($requestFriend) ; $i++) <div class="w-full flex py-2.5 px-0">
    <div class="w-1/5 pt-2">
        <a href="profile.{{ $requestFriend[$i][0]->IDTaiKhoan }}"><img class="w-16 h-16 rounded-full object-cover" src="{{ $requestFriend[$i][0]->AnhDaiDien }}" alt=""></a>
    </div>
    <div class="w-4/5 pl-2">
        <div class="w-full">
            <span class="float-left pl-2.5 font-bold">
                <a href="profile.{{ $requestFriend[$i][0]->IDTaiKhoan }}" class="dark:text-white">{{ $requestFriend[$i][0]->Ho . ' ' . 
                        $requestFriend[$i][0]->Ten }}</a></span>
            <span class="float-right text-xs dark:text-white">
                {{ StringUtil::CheckDateTimeRequest(Functions::getDateTimeFriend($user[0]->IDTaiKhoan,
                        $requestFriend[$i][0]->IDTaiKhoan,'2','NgayGui')) }}
            </span>
        </div>
        <div class="w-full flex py-2.5 px-0 text-sm font-bold ">
            <span onclick="AcceptFriendIndex('{{ $user[0]->IDTaiKhoan }}','{{ $requestFriend[$i][0]->IDTaiKhoan }}')" class="text-white w-7/12 text-center h-10 leading-10 mr-4 cursor-pointer 
            {{ $user[0]->IDTaiKhoan . $requestFriend[$i][0]->IDTaiKhoan }}" style="border-radius: 10px;background-color: #1877F2;">
                Xác Nhận
            </span>
            <span onclick="CancelRequestFriendIndex('{{ $user[0]->IDTaiKhoan }}','{{ $requestFriend[$i][0]->IDTaiKhoan }}')" class="w-7/12 text-center h-10 
            leading-10 cursor-pointer {{ $user[0]->IDTaiKhoan . $requestFriend[$i][0]->IDTaiKhoan }}delete" style="background-color: #D8DADF;border-radius: 10px;">
                Xóa
            </span>
        </div>
    </div>
    </div>
    @endfor
    @endif
    <hr class="my-2.5 mx-auto w-full">