<?php

use App\Models\StringUtil; ?>
<div class="w-full bg-white dark:bg-dark-second my-4 py-4 px-2 rounded-lg">
    <div class="w-full flex">
        <div class="" style="width: 10%;">
            <a href=""><img class="w-12 h-12 rounded-full 
                            border-4 border-solid border-gray-200" src="/{{ $item[0]->AnhDaiDien }}"></a>
        </div>
        <div class="relative pl-1" style="width: 80%;">
            <p class="mb-2 dark:text-gray-300"><a href=""><b class="dark:text-white">
                        {{ $item[0]->Ho . ' ' . $item[0]->Ten }}</b>
                    &nbsp;</a> đã cập nhật ảnh đại diện của anh ấy.</p>
            <div class="w-full flex">
                <div class="text-xs pr-2"><a href="" class="dark:text-gray-300 font-bold">
                        {{ StringUtil::CheckDateTime($item[0]->NgayDang) }}
                    </a>
                </div>
                <div class="relative">
                    <i class="fas fa-globe-europe absolute top-0.5 dark:text-gray-300"></i>
                </div>
            </div>
        </div>
        <div class="text-center" style="width: 10%;">
            <i class="fas fa-ellipsis-h pt-2 text-xl dark:text-gray-300"></i>
        </div>
    </div>
    <div class="w-full mx-0 my-2.5">
        <p class="dark:text-white">{{ $item[0]->NoiDung }}</p>
    </div>
    <div class="w-full mx-0 my-2.5">
        <div class="w-full relative block" style="height:430px;">
            <img class="w-full h-60 object-cover" src="/{{ $item[0]->AnhBia }}" alt="">
            <img class="w-7/10 absolute rounded-full border-4 border-solid border-white" style="top: 5%;left: 15%;height:390px;" src="{{ $item[0]->DuongDan }}" alt="">
        </div>
    </div>
    <div class="w-full mb-4 mx-0 block">
        <div class="w-full flex">
            <div class="w-full flex pl-0.5 py-1">
                <i style="color: red;" class="fas fa-heart text-xl cursor-pointer"></i>
                &nbsp;&nbsp;<span style="font-size: 15px;" class="cursor-pointer  
                dark:text-gray-300 text-gray-600 font-bold ">
                    Hưởng MMO và 123 người khác</span>
            </div>
            <div class="w-full text-right pr-2 py-1">
                <p class="cursor-pointer dark:text-gray-300 text-gray-600 font-bold ">&nbsp;12&nbsp;bình luận</p>
            </div>
        </div>
        <ul class="w-full flex border-t-2 border-b-2 border-solid border-gray-200">
            <li class="dark:text-gray-300 dark:hover:bg-dark-third 
            text-center w-1/3 font-bold py-4 cursor-pointer"><i class="fas fa-heart dark:text-gray-300"></i> &nbsp; Tym</li>
            <li class="dark:text-gray-300 dark:hover:bg-dark-third 
            text-center w-1/3 font-bold py-4 cursor-pointer"><i class="far fa-comment-alt dark:text-gray-300"></i> &nbsp; Bình Luận</li>
            <li class="dark:text-gray-300 dark:hover:bg-dark-third 
            text-center w-1/3 font-bold py-4 cursor-pointer"><i class="fas fa-share dark:text-gray-300"></i> &nbsp; Chia sẻ</li>
        </ul>
    </div>
</div>