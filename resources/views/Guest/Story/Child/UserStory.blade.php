<?php

use App\Models\StringUtil;
use App\Process\DataProcessThird;
use Illuminate\Support\Facades\Session;

?>
<div class="w-full flex overflow-y-auto" id="rightStoryUser">
    <div class="w-2/3">
        <div class="w-11/12 mx-auto relative top-2 left-20 flex">
            <div class="w-1/12 pr-4">
                <i onclick="previousStory('{{ $user[0]->IDTaiKhoan }}')" class="fas fa-chevron-left cursor-pointer px-5 py-3 bg-gray-300 relative 
                        top-1/2 left-1/2 rounded-full  hover:bg-white text-xl" style="transform: translate(-50%,-50%);"></i>
            </div>
            <div class="w-7/12 story-right bg-gray-400 relative m-2 rounded-lg relative">
                <img src="/{{ $story[0]->DuongDan }}" class="w-full img-story" alt="">
                <div class="w-full py-1 px-2 absolute top-1">
                    <div class="w-full pb-2">
                        <ul class="w-full flex">
                            @foreach($allStory[0] as $key => $value)
                            @php
                            $width = 'w-' . round(100/count($allStory[0])) . '%';
                            $widthChild = count(DataProcessThird::checkUserViewThisStory($user[0]->IDTaiKhoan,$value->IDStory)) == 0
                            ? 'w-0'
                            : 'w-' . count($allStory[0]) * round(100/count($allStory[0])) . '%'
                            @endphp
                            <li class="{{ $width }} bg-gray-300 mr-1 cursor-pointer">
                                <div id="loadingAudio{{$key}}" class="bg-white py-0.5 {{ $widthChild }}"></div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="w-full flex">
                        <div class="w-2/12">
                            <img src="/{{ $story[0]->AnhDaiDien }}" class="w-12 h-12 rounded-full p-1" alt="">
                        </div>
                        <div class="w-1/2 pt-1">
                            <p class="pb-1"><a href="" class="font-bold text-white">{{ $story[0]->Ho . ' ' .$story[0]->Ten }}</a>
                                &nbsp;<span class="text-sm text-white" id="timeStory">
                                    {{ StringUtil::CheckDateTimeStory($story[0]->ThoiGianDangStory) }}
                                </span></p>
                            <p class="text-white text-sm">Mod(Remix) </p>
                        </div>
                        <div class="w-1/3">
                            <ul class="w-full flex relative">
                                <li id="play" class=" py-2 px-2 cursor-pointer">
                                    <i id="btnClickStart" class="far fa-play-circle text-white text-2xl"></i>
                                </li>
                                <li onclick="muteAudio()" class=" py-2 px-2 cursor-pointer">
                                    <i id="muteOrUnMute" class="fas fa-volume-up text-white text-2xl"></i>
                                </li>
                                <li onclick="openEditStory()" class="py-2 px-2 cursor-pointer">
                                    <i class="fas fa-ellipsis-h text-white text-2xl"></i>
                                </li>
                                <div id="ModalEditStory" class="w-80 right-2 top-12 absolute bg-gray-200 border-2
                                dark:bg-dark-third dark:text-white font-bold border-solid 
                                border-gray-300 dark:border-dark-second z-50 rounded-lg hidden">
                                    <ul class="w-full">
                                        <li onclick="deleteStoryUser('{{$story[0]->IDTaiKhoan}}')" class="w-full px-2.5 py-2 dark:bg-dark-third bg-gray-200 
                                        hover:bg-gray-300 dark:hover:bg-dark-second cursor-pointer">
                                            <div class="flex items-center">
                                                <i class="far fa-trash-alt text-2xl mr-3"></i>
                                                Xóa ảnh
                                            </div>
                                        </li>
                                        <li class="w-full px-2.5 py-2 dark:bg-dark-third bg-gray-200 
                                        hover:bg-gray-300 dark:hover:bg-dark-second cursor-pointer">
                                            <div class="flex items-center">
                                                <i class="fas fa-exclamation-triangle text-2xl mr-3"></i>
                                                Đã xảy ra lỗi
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="w-full p-2 absolute bottom-2 flex">
                    <div class="w-10/12 relative">
                        <input type="text" name="" id="" placeholder="Trả lời.." class="w-full p-2 rounded-3xl bg-gray-100">
                        <i class="far fa-paper-plane cursor-pointer absolute right-4 top-0.5 text-2xl text-gray-600"></i>
                    </div>
                    <div class="w-2/12 text-right pr-4">
                        <i class="fas fa-heart text-xl cursor-pointer text-red-600 text-3xl"></i>
                    </div>
                </div>
                <div class="w-1/4 bg-white flex p-1.5 absolute top-32 left-24 rounded-lg" style="transform: rotate(-25deg);">
                    <div class="w-1/4 pr-2">
                        <img src="/img/gai1.jpg" alt="">
                    </div>
                    <div class="w-3/4">
                        <p class="font-bold" style="font-size: 7px;">បទកំពុងល្បី 24kgoldn - Mood</p>
                        <p class="font-sm" style="font-size: 5px;">24kgoldn</p>
                    </div>
                </div>
            </div>
            <div class="w-1/12 pl-4">
                <i onclick="nextStory('{{ $user[0]->IDTaiKhoan }}')" class="fas fa-chevron-right cursor-pointer px-5 py-3 bg-gray-300 relative 
                        top-1/2 left-1/2 rounded-full  hover:bg-white text-xl" style="transform: translate(-50%,-50%);"></i>
            </div>
        </div>
    </div>
    <div class="w-1/3 bg-gray-100 dark:bg-dark-second pl-2 ">
        @include('Guest/Story/Child/PersonViewStory')
    </div>
</div>