<?php

use App\Process\DataProcessThird;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

?>
<!DOCTYPE html>
@if (session()->has('user'))
<html lang="en" class="{{ Session::get('user')[0]->DarkMode == '0' ? '' : 'dark' }}">
@else
<html lang="en">
@endif
@php
$user = Session::get('user')[0];
@endphp

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo tin</title>
    @include('Head/css')
    <script src="/js/ajax/Story/ajax.js"></script>
</head>

<body>
    <div class="w-full bg-gray-100 dark:bg-dark-main h-screen relative" id="main">
        @include('Header')
        <div class="w-full flex z-10 pt-16 bg-gray-100 dark:bg-dark-second lg:w-full lg:mx-auto xl:w-full" id="content">
            <div class="w-1/4 p-4 pt-0 border-t-2 border-solid border-gray-300 shadow-md 
            dark:border-dark-third">
                <p class="w-full flex py-6">
                    <span class="font-bold text-xl dark:text-white">Tin Của Bạn</span>
                </p>
                <div class="w-full flex pb-3">
                    <a href=""><img class="w-20 h-20 p-1.5 shadow-xl rounded-full " src="/img/avatar.jpg" alt=""></a>
                    <a href="" class="py-7 px-3.5 dark:text-white font-bold">Trà Hưởng</a>
                </div>
                <hr>
                <div class="w-full py-4">
                    <textarea class="outline-none w-full h-48 font-bold resize-none border-2 
                        border-solid border-gray-200 dark:bg-dark-second overflow-hidden my-2 p-2 
                        rounded-lg place-type dark:border-dark-third shadow-xl dark:text-white" placeholder="Bắt đầu nhập" oninput="changeTexts()"></textarea>
                </div>
                <div class="w-full pb-4 border-2 border-solid border-gray-200 rounded-lg 
                        max-h-52 wrapper-content-right overflow-y-auto dark:border-dark-third shadow-xl">
                    <p class="font-bold text-xm p-2 dark:text-white">Phông nền</p>
                    <ul class="w-full pl-2 flex flex-wrap ">
                        <input type="hidden" name="IDPhongNen" id="IDPhongNen" value="PN10000001">
                        <?php $bg = DataProcessThird::getBackGround(); ?>
                        @foreach($bg as $key => $value)
                        <li onclick="clickChangeBackground(
                                '{{ $value->IDPhongNen }}',
                                '{{ $value->DuongDanPN }}')" class="cursor-pointer w-10 h-10 rounded-full">
                            <img class="w-9 h-9 p-1 rounded-full" src="/{{ $value->DuongDanPN }}" alt="">
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="w-full my-8">
                    <span class="text-center font-bold w-48per mr-4 py-3 bg-gray-300 rounded-lg cursor-pointer" type="button">Bỏ</span>
                    <button onclick="postStory()" type="button" class="font-bold w-1/2 bg-1877F2 py-3 rounded-lg 
                        text-white" type="submit">Chia sẻ lên tin</button>
                </div>
            </div>
            <div class="w-3/4 bg-gray-200 dark:bg-dark-main story-right shadow-3xl">
                <div class="w-11/12 p-1.5 top-6 mx-auto rounded-2xl dark:bg-dark-main bg-white relative 
                border-4 border-solid border-gray-200 dark:border-dark-third mt-1" style="height: 665px;">
                    <div class="w-97per text-center py-4 m-1 bg-black rounded-2xl" style="height: 638px;">
                        <img id="myImage" class="w-1/3 absolute top-1/2 left-1/2 mt-1 rounded-lg" style="transform: translate(-50%,-50%); height: 612px;" src="/img/bgText/3.jpg" alt="">
                    </div>
                    <canvas id="myCanvas" class="hidden" width="345" height="612"></canvas>
                    <div class="text-xl font-bold text-gray-100 break-all content-story-text w-80 min-h-8 absolute top-1/2 left-1/2 rounded-2xl text-center font-bold outline-none" style="transform: translate(-50%,-50%);">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function postStory() {

            $.ajax({
                method: "POST",
                url: "{{ route('ProcessSaveCanvasStorys') }}",
                data: {
                    dataURI: document.getElementById('myCanvas').toDataURL('image/png'),
                    IDPhongNen: $('#IDPhongNen').val(),
                    IDTaiKhoan: '{{ $user->IDTaiKhoan }}'
                },
                success: function(response) {

                },
                error: function(xhr) {
                    console.log((xhr));
                }
            });
        }
    </script>
</body>

</html>