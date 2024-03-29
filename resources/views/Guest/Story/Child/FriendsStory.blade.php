<?php

use App\Models\StringUtil;
use Illuminate\Support\Facades\Session;

?>
<div class="w-full flex">
    <div class="w-full">
        <div class="w-3/5 mx-auto relative top-2 left-20 flex">
            <div class="w-1/12 pr-4">
                <i onclick="previousStory('{{ $user[0]->IDTaiKhoan }}')" class="fas fa-chevron-left cursor-pointer px-5 py-3 bg-gray-300 relative 
                        top-1/2 left-1/2 rounded-full  hover:bg-white text-xl" style="transform: translate(-50%,-50%);"></i>
            </div>
            <div class="w-7/12 story-right bg-gray-400 relative m-2 rounded-lg relative">
                <img src="{{ $story[0]->DuongDan }}" class="w-full img-story" alt="">
                <div class="w-full py-1 px-2 absolute top-1">
                    <div class="w-full pb-2">
                        <ul class="w-full flex">
                            @for ($i = 0 ; $i < count($story) ; $i++) @php $widthI='w-' . round(100/count($story)) . '%' @endphp <li class="{{ $widthI }} bg-gray-300 mr-1 cursor-pointer">
                                <div id="loadingAudio{{$i}}" class="bg-white py-0.5 "></div>
                                </li>
                                @endfor
                        </ul>
                    </div>
                    <div class="w-full flex">
                        <div class="w-2/12">
                            <img src="{{ $story[0]->AnhDaiDien }}" class="w-12 object-cover h-12 rounded-full p-1" alt="">
                        </div>
                        <div class="w-1/2 pt-1">
                            <p class="pb-1"><a href="" class="font-bold text-white">{{ $story[0]->Ho . ' ' .$story[0]->Ten }}</a>
                                &nbsp;<span id="timeStory" class="text-sm text-white">
                                    {{ StringUtil::CheckDateTimeStory($story[0]->ThoiGianDangStory) }}
                                </span></p>
                            <p class="text-white text-sm">Mod(Remix) </p>
                        </div>
                        <div class="w-1/3">
                            <ul class="w-full flex">
                                <li id="play" class=" py-2 px-2 cursor-pointer">
                                    <i id="btnClickStart" class="far fa-play-circle text-white text-2xl"></i>
                                </li>
                                <li onclick="muteAudio()" class=" py-2 px-2 cursor-pointer">
                                    <i id="muteOrUnMute" class="fas fa-volume-up text-white text-2xl"></i>
                                </li>
                                <li class=" py-2 px-2 cursor-pointer">
                                    <i class="fas fa-ellipsis-h text-white text-2xl"></i>
                                </li>
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
</div>