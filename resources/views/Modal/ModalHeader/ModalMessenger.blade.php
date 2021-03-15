<?php

use App\Models\StringUtil;
use App\Process\DataProcess;
use Illuminate\Support\Facades\Session;

$allMess = DataProcess::getFullMessageByID(Session::get('user')[0]->IDTaiKhoan);

?>
<div class="w-full flex">
    <div class="w-1/2 text-left pl-2 py-2">
        <b class="dark:text-white font-bold text-xm">Messenger</b>
    </div>
    <div class="w-1/2 text-right pr-2 py-2">
        <a href=""><b class="dark:text-white font-bold text-xm">Vào Messenger</b></a>
    </div>
</div>
<div class="w-full">
    <div class="w-full p-1">
        <input type="text" name="" class="w-full py-2.5 px-4 my-2 bg-gray-200 dark:bg-dark-third rounded-3xl" placeholder="Tìm kiếm trên messenger">
    </div>
    @if(count($allMess) == 0)
    <p class="text-center font-bold dark:text-white">
        Không có tin nhắn nào để hiển thị.
    </p>
    @else
    @foreach($allMess as $key => $value)
    @php
    $el = DataProcess::getUserOfGroupMessage($value[0]->IDNhomTinNhan)
    @endphp
    <div class="mess-person cursor-pointer flex relative dark:hover:bg-dark-third 
    hover:bg-gray-200 py-2 px-1">
        <div class="w-1/5">
            <a href=""><img src="/{{ $el[0]->AnhDaiDien }}" alt="" class="w-14 h-14 rounded-full object-cover p-0.5"></a>
        </div>
        <div class="w-4/5">
            <div class="w-full">
                <span style="float: left;font-weight: bold;">
                    <a href="" class="dark:text-white">
                        {{ $el[0]->Ho . ' ' . $el[0]->Ten }}
                    </a></span>
            </div>
            <div class="w-full flex py-1 text-base flex">
                <div class="w-4/5">
                    @isset($value[count($value) - 1])
                    @if ($value[count($value) - 1]->IDTaiKhoan == Session::get('user')[0]->IDTaiKhoan)
                    <span class="text-gray-500 dark:text-white">
                        You : {{ $value[count($value) - 1]->NoiDung }} &nbsp;&nbsp;
                        {{ StringUtil::CheckDateTimeRequest($value[count($value) - 1]->ThoiGianNhanTin) }}
                    </span>
                    @else
                    <span class="text-blue-500 dark:text-blue-500 font-bold">
                        {{$el[0]->Ten}} : {{ $value[count($value) - 1]->NoiDung }} &nbsp;&nbsp;
                        {{ StringUtil::CheckDateTimeRequest($value[count($value) - 1]->ThoiGianNhanTin) }}
                    </span>
                    @endif
                    @endisset
                </div>
                <div class="w-1/5">
                    <img class="float-right w-5 h-5 rounded-full" src="img/avatar.jpg" alt="">
                </div>
            </div>
            <span class="mess-edit top-4 right-8 text-center absolute rounded-full bg-white">
                <i class="fas fa-ellipsis-h edit-mess"></i>
            </span>
        </div>

    </div>
    @endforeach
    @endif

    <hr class="my-2.5 mx-auto w-full">
    <div class="w-full text-center py-2">
        <a href="" class="font-bold text-center dark:text-white">Xem tất cả trong messenger</a>
    </div>
</div>