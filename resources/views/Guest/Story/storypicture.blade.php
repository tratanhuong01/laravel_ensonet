<?php

use App\Process\DataProcessFour;
use App\Process\DataProcessThird;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

?>
<form action="" method="post" id="formCreatePicture" class="w-full flex">
    <audio src="" class="hidden" id="myAudio" autoplay loop='true'></audio>
    <input type="hidden" name="IDAmThanh" id="IDAmThanh">
    <div class="w-1/4 p-4 pt-0 border-t-2 border-solid border-gray-300 shadow-md 
            dark:border-dark-third">
        <p class="w-full flex py-6">
            <span class="font-bold text-xl dark:text-white">Tin Của Bạn</span>
        </p>
        <div class="w-full flex pb-3">
            <a href=""><img class="w-20 h-20 p-1.5 shadow-xl rounded-full " src="/{{ $user->AnhDaiDien }}" alt=""></a>
            <a href="" class="py-7 px-3.5 dark:text-white font-bold">{{ $user->Ho . ' ' . $user->Ten }}</a>
        </div>
        <hr>
        <div class="w-full pt-4 pb-2">
            <textarea class="outline-none w-full h-48 font-bold resize-none border-2 
                        border-solid border-gray-200 dark:bg-dark-second overflow-hidden my-2 p-2 
                        rounded-lg place-type dark:border-dark-third shadow-xl dark:text-white" placeholder="Bắt đầu nhập" oninput="changeTextsPictureMain()"></textarea>
        </div>
        <div class="w-full mb-4 px-2 flex relative cursor-pointer border-2 border-solid 
                border-gray-300 dark:border-dark-third shadow-lg rounded-lg">
            <i class='bx bx-font-family dark:text-white text-xl py-2'></i>
            <div class=" p-2.5 relative dark:text-white">
                GỌN GÀNG
            </div>
            <i class="fas fa-caret-down absolute top-4 right-4 dark:text-white"></i>
        </div>
    </div>
    <div class="w-2/4 bg-gray-200 dark:bg-dark-main story-right shadow-3xl">
        <div class="w-11/12 top-1 mx-auto rounded-2xl dark:bg-dark-main bg-white relative 
                border-2 border-solid border-gray-200 dark:border-dark-third mt-1" style="height: 630px;">
            <div class="w-97per text-center relative bg-black rounded-2xl" style="height: 625px;">
                <div id="outer" class="w-1/2 relative left-1/2 mt-1 rounded-lg bg-gray-300 
                dark:bg-dark-third justify-center flex items-center" style="transform: translate(-50%,-50%); height: 612px;top:49.3%;">
                    <img id="myImage" class="w-full rounded-lg" style="max-height: 612px;" src="/img/bgText/3.jpg" alt="">
                    <div id="elementMusic" class="w-1/3 bg-white text-left flex p-1.5 absolute top-32 left-24 rounded-lg" style="transform: rotate(-25deg);">
                        <div class="w-1/4 pr-2">
                            <img src="/img/gai1.jpg" alt="">
                        </div>
                        <div class="w-3/4">
                            <p class="font-bold" style="font-size: 7px;">បទកំពុងល្បី 24kgoldn - Mood</p>
                            <p class="font-sm" style="font-size: 5px;">24kgoldn</p>
                        </div>
                    </div>
                    <div class="text-xl font-bold text-gray-100 break-all content-story-text 
                            w-80 min-h-8 absolute top-1/2 left-1/2 rounded-2xl text-center font-bold 
                            outline-none" style="transform: translate(-48%,-50%);" id="myText">
                    </div>
                </div>
            </div>
            <canvas id="myCanvas" class="hidden justify-center flex items-center" width="345" height="612"></canvas>

        </div>
        <div class="w-full my-6 pl-9">
            <span class="text-center font-bold w-48per mr-4 py-3 bg-gray-300 rounded-lg cursor-pointer" type="button">Bỏ</span>
            <button onclick="postStoryPicture('{{ $user->IDTaiKhoan }}')" type="button" class="font-bold w-1/2 bg-1877F2 py-3 rounded-lg 
                        text-white" type="submit">Chia sẻ lên tin</button>
        </div>
    </div>
    <div class="w-1/4 p-4 pt-0 border-t-2 border-solid border-gray-300 shadow-md 
            dark:border-dark-third">
        <p class="w-full flex py-6">
            <span class="font-bold text-xl dark:text-white">Màu chữ</span>
        </p>
        <div class="w-full">
            <div class="w-full pb-2 border-2 border-solid border-gray-200 rounded-lg 
                        max-h-40 mb-2 wrapper-content-right overflow-y-auto dark:border-dark-third shadow-xl">
                <p class="font-bold text-xm py-1 px-2 dark:text-white">Màu chữ</p>
                <ul class="w-full pl-2 flex flex-wrap">
                    <input type="hidden" name="IDPhongNen" id="IDPhongNen" value="">
                    <?php $cl = DataProcessFour::createColor(); ?>
                    @foreach($cl as $key => $value)
                    <?php $dt = '<li onclick="changeColorContentPictureMain' . "('" . $value . "')" .
                        '" class="cursor-pointer w-8 h-8 cursor-pointer m-1 rounded-full"
                            style="background-color: ' . $value . ';"></li>'; ?>
                    {!! $dt !!}
                    @endforeach
                </ul>
            </div>
        </div>
        <p class="w-full flex py-6">
            <span class="font-bold text-xl dark:text-white">Âm nhạc</span>
        </p>
        <div class="w-full pb-2 border-2 border-solid border-gray-200 rounded-lg
                     mb-2 dark:border-dark-third  text-center shadow-xl" style="max-height: 384px;height: 384px;">
            <?php $music = DataProcessFour::getMusic(); ?>
            <p class="font-bold text-xm text-left py-1 px-2 dark:text-white">Âm nhạc</p>
            <input type="text" name="" id="" class="justify-center w-11/12 dark:bg-dark-third bg-gray-300
                     p-2.5 rounded-lg dark:text-white my-3" placeholder="Nhập tên bài hát">
            <ul class="w-full text-left wrapper-content-right text-center overflow-y-auto 
                    " style="max-height: 279px; height: 279px;">
                @foreach($music as $key => $value)
                <li class="w-full flex p-1 border-2 border-solid border-gray-300 
                        dark:border-dark-third relative cursor-pointer">
                    <div onclick="chooseMusic('{{$value->IDAmThanh}}')" class="w-2/12 mr-3 pt-1">
                        <img src="/img/mp3.png" class="w-10 h-10 p-0.5 rounded-full 
                                object-cover" alt="">
                    </div>
                    <div onclick="chooseMusic('{{$value->IDAmThanh}}')" class="w-8/12 font-bold dark:text-white text-left">
                        <p class="">{{ $value->TenAmThanh }}</p>
                        <p class="text-sm">{{ $value->TacGia }}</p>
                    </div>
                    <div class="absolute top-3 right-3 dark:text-white cursor-pointer">
                        <i onclick="playMusicDemoStory('{{ $value->DuongDanAmThanh }}')" class="fas fa-play-circle text-xl"></i>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</form>
<script>
    dragElement(document.getElementById("elementMusic"));
    dragElement(document.getElementById("myText"));

    function dragElement(elmnt) {
        var pos1 = 0,
            pos2 = 0,
            pos3 = 0,
            pos4 = 0;
        if (document.getElementById(elmnt.id + "header")) {
            /* if present, the header is where you move the DIV from:*/
            document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
        } else {
            /* otherwise, move the DIV from anywhere inside the DIV:*/
            elmnt.onmousedown = dragMouseDown;
        }

        function dragMouseDown(e) {
            e = e || window.event;
            e.preventDefault();
            // get the mouse cursor position at startup:
            pos3 = e.clientX;
            pos4 = e.clientY;
            document.onmouseup = closeDragElement;
            // call a function whenever the cursor moves:
            document.onmousemove = elementDrag;
        }

        function elementDrag(e) {
            e = e || window.event;
            e.preventDefault();
            // calculate the new cursor position:
            pos1 = pos3 - e.clientX;
            pos2 = pos4 - e.clientY;
            pos3 = e.clientX;
            pos4 = e.clientY;
            // set the element's new position:
            elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
            elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
        }

        function closeDragElement() {
            /* stop moving when mouse button is released:*/
            document.onmouseup = null;
            document.onmousemove = null;
        }
    }
    window.onbeforeunload = function() {
        return "Do you really want to leave our brilliant application?";
        //if we return nothing here (just calling return;) then there will be no pop-up question at all
        //return;
    };
</script>