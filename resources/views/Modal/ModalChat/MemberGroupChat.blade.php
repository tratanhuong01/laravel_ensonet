<?php

use App\Models\Data;
use App\Models\Functions;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

?>
<div id="modal-one" class=" w-11/12 fixed top-50per left-50per dark:bg-dark-second 
transform-translate-50per pb-2 pt-2 opacity-100 bg-white z-50 border-2 border-solid border-gray-300 
 sm:w-4/5 sm:mt-12 lg:w-3/5 xl:w-5/12 xl:mt-4 dark:border-dark-main shadow-1 rounded-lg">
    <div class="w-full bg-white dark:bg-dark-second pl-2 pr-4 fixed top-2 block z-10">
        <span onclick="closePost()" class="bg-gray-300 px-2.5 dark:text-white font-bold
        rounded-full dark:bg-dark-second cursor-pointer absolute text-3xl top-2 right-4">
            &times;
        </span>
        <ul class="w-full flex mb-2">
            <li onclick="" class="font-bold text-blue-500 px-4 py-3 border-b-4 border-solid
            border-blue-500 cursor-pointer">
                Tất cả
            </li>
            <li class="font-bold text-gray-700 px-4 py-3 cursor-pointer dark:text-white 
            hover:bg-gray-200 dark:hover:bg-dark-third" onclick="">
                Quản trị viên
            </li>
        </ul>
    </div>
    <div id="all" class="w-full dark:bg-dark-second pt-16 wrapper-content-right 
    overflow-y-auto" style="max-height: 420px;height: 420px;">
        @foreach($member as $key => $value)
        <div class="w-full hover:bg-gray-200 dark:hover:bg-dark-third 
        flex cursor-pointer relative p-2">
            <div class="w-1/12">
                <img src="/{{ $value->AnhDaiDien }}" class="w-12 h-12 object-cover 
                rounded-full" alt="">
            </div>
            <div class="w-10/12 flex pl-3">
                <p class="flex items-center flex-wrap">
                    <span class="w-full font-bold dark:text-white">
                        {{ $value->Ho . ' ' . $value->Ten }}
                    </span>
                    @if ($value->TinhTrang == 1)
                    <span class="w-full text-sm dark:text-white text-gray-700 font-bold">
                        Quản trị viên
                    </span>
                    @endif
                </p>
            </div>
            <div class="w-1/12 flex justify-center">
                <i class='bx bx-dots-horizontal-rounded text-3xl flex 
                items-center cursor-pointer dark:text-white'></i>
            </div>
            <div class="w-72 absolute hidden border-2 border-solid border-gray-300 
            shadow-lg dark:border-dark-third top-10 right-0 bg-gray-100 dark:bg-dark-second">
                <ul class="w-full">
                    <li onclick="" class="w-full px-2.5 py-1.5 hover:bg-gray-300 dark:hover:bg-dark-third  
                    cursor-pointer dark:text-white text-xm border-b-2 border-solid border-gray-300 
                    dark:border-dark-third font-bold">
                        Tin nhắn
                    </li>
                    <li onclick="" class="w-full  px-2.5 py-1.5  hover:bg-gray-300 dark:hover:bg-dark-third   
                    cursor-pointer dark:text-white text-xm border-b-2 border-solid border-gray-300 
                    dark:border-dark-third  font-bold">
                        Xem trang cá nhân
                    </li>
                    <li onclick="" class="w-full px-2.5 py-1.5  hover:bg-gray-300 dark:hover:bg-dark-third   
                    cursor-pointer dark:text-white text-xm border-b-2 border-solid border-gray-300 
                    dark:border-dark-third font-bold">
                        Chỉ định làm quản trị viên
                    </li>
                    <li onclick="" class="w-full  px-2.5 py-1.5  hover:bg-gray-300 dark:hover:bg-dark-third   
                    cursor-pointer dark:text-white text-xm border-b-2 border-solid border-gray-300 
                    dark:border-dark-third font-bold text-gray-800">
                        Xóa thành viên
                    </li>
                </ul>
            </div>
        </div>
        @endforeach
    </div>
</div>