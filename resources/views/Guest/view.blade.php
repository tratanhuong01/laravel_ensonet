<!DOCTYPE html>
@if (session()->has('user'))
<html lang="en" class="{{ Session::get('user')[0]->DarkMode == '0' ? '' : 'dark' }}">
@else
<html lang="en">
@endif
<?php

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

$u = Session::get('user');

?>

<head>
    <title>Ensonet</title>
    <link rel="stylesheet" href="/../../css/style.css" />
    <link rel="stylesheet" href="/../../css/tailwind_second.css" />
    <link rel="stylesheet" href="/../../tailwind/tailwind.css" />
    <link rel="stylesheet" href="/../../tailwind/tailwind.custom.css" />
    <script src="/../../js/event/event.js"></script>
    <script src="/../../js/ajax/BaiDang/ajax.js"></script>
    <script src="/../../js/ajax/MoiQuanHe/ajax.js"></script>
    <script src="/../../js/ajax.js"></script>
    <script src="/../../js/scrollbar.js"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="/../../js/header.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        * {
            font-family: 'Lato', sans-serif;
        }
    </style>
</head>

<body>
    <?php
    $dataNew = array();
    $indexImage = -1;
    if (count($data) != 0) {
        for ($i = 0; $i < count($data); $i++)
            $dataNew[$i][$data[$i]->IDHinhAnh] = $data[$i]->DuongDan;
        for ($i = 0; $i < count($dataNew); $i++)
            foreach ($dataNew[$i] as $key => $value)
                if ($key == $idHinhAnh)
                    $indexImage = $i;
    }
    ?>
    @if (count($dataNew) == 0 && $indexImage == -1)
    @include('Component\KhongTimThay')
    @else
    <div class="w-full dark:bg-dark-main" id="main">
        <div class="w-full flex h-screen bg-gray-100" id="content">
            <div class="w-9/12 flex bg-black relative" id="leftImage">
                <?php
                $numLoad = Session::get('numLoad');
                $urlNext = 'photo/' . $data[0]->IDBaiDang . '/' .
                    $data[$indexImage == count($data) - 1 ? $indexImage : $indexImage + 1]->IDHinhAnh;
                $urlPrevious = 'photo/' . $data[0]->IDBaiDang . '/'
                    . $data[$indexImage == 0 ? $indexImage : $indexImage - 1]->IDHinhAnh;
                ?>
                <div onclick="backpage('{{ $numLoad }}')" class="w-10 h-10 rounded-full
                absolute top-2 left-4 bg-gray-100 text-4xl font-bold text-center cursor-pointer">&times;</div>
                <div class="w-1/12">
                    @if ($indexImage == 0)
                    <!-- <a class="cursor-not-allowed" href="">
                        <i class="fas fa-chevron-left pointer-events-none px-5 py-3 bg-gray-300 relative 
                    top-1/2 left-1/2 rounded-full  hover:bg-white text-xl" style="transform: translate(-50%,-50%);"></i></a> -->
                    @else
                    <a href="{{ url($urlPrevious) }}">
                        <i class="fas fa-chevron-left cursor-pointer px-5 py-3 bg-gray-300 relative 
                    top-1/2 left-1/2 rounded-full  hover:bg-white text-xl" style="transform: translate(-50%,-50%);"></i></a>
                    @endif
                </div>
                <div class="w-10/12">
                    <div class="mx-auto relative ">
                        @if ($data[0]->LoaiBaiDang == 1)
                        <img class="w-full mx-auto object-cover absolute object-cover" style="transform: translateY(45%); height: 400px;" src="/../../{{ $dataNew[$indexImage][$idHinhAnh] }}" alt="">
                        @else
                        <img style="max-width: 90%;" class="mx-auto object-cover h-screen" src="/../../{{ $dataNew[$indexImage][$idHinhAnh] }}" alt="">
                        @endif
                    </div>
                </div>
                <div class="w-1/12">
                    @if ($indexImage == count($data) - 1)
                    <!-- <a href=""><i class="fas fa-chevron-right pointer-events-none px-5 py-3 bg-gray-300 relative 
                    top-1/2 left-1/2 rounded-full  hover:bg-white text-xl" style="transform: translate(-50%,-50%);"></i></a> -->
                    @else
                    <a href="{{ url($urlNext) }}">
                        <i class="fas fa-chevron-right cursor-pointer px-5 py-3 bg-gray-300 relative 
                    top-1/2 left-1/2 rounded-full  hover:bg-white text-xl" style="transform: translate(-50%,-50%);"></i></a>
                    @endif

                </div>
                <i onclick="zoom()" class="fas fa-expand-arrows-alt cursor-pointer text-2xl text-white absolute
                top-4 right-6"></i>
            </div>
            <div class="w-3/12 bg-white dark:bg-dark-third" id="rightImage">
                <div class="w-full pl-3">
                    <div class="absolute right-4 top-1 pt-2 pb-2">
                        <ul class="w-full flex">
                            @include('HeaderRight',['user' => $u])
                        </ul>
                    </div>
                    <hr>
                    <br>
                    <div class="pt-16"></div>
                    <div class="w-full flex">
                        <hr>
                        <br>
                        <div class="mr-2">
                            <a href="">
                                <img class="w-12 h-12 object-cover rounded-full 
                                border-4 border-solid border-gray-200" src="/../../{{ $data[0]->AnhDaiDien }}"></a>
                        </div>
                        <div class="relative pl-1 w-3/4">
                            <div class="dark:text-gray-300 text-left"><a href=""><b class="dark:text-white">
                                        {{ $data[0]->Ho . ' ' . $data[0]->Ten }}</b>
                                    &nbsp;</a></div>
                            <div class="w-full flex">
                                <div class="text-xs pt-0.5 pr-2">
                                    <ul class="flex">
                                        <li class="pt-1">
                                            <a href="" class="dark:text-gray-300 font-bold">
                                                25 phút trước</a>
                                        </li>
                                        <li class="pl-3 pt-0.5" id="">
                                            @
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="relative text-center pr-4" style="width: 10%;">
                            <i class="cursor-pointer fas fa-ellipsis-h pt-2 text-xl dark:text-gray-300"></i>
                        </div>
                    </div>
                    @include('Component\Child\CamXucBinhLuan',['item' => $data])
                </div>
            </div>
        </div>
        @if (session()->has('zoom'))
        {{ 'have session zoom'}}
        <script>
            document.getElementById('rightImage').style.display = 'none';
            document.getElementById('leftImage').style.width = '100%';
        </script>
        @else
        {{ 'not have session zoom'}}
        <script>
            document.getElementById('rightImage').style.display = 'block';
            document.getElementById('leftImage').style.width = '75%';
        </script>
        @endif
    </div>
    <div class="w-full bg-gray-500 top-0 left-0 z-50 bg-opacity-50" id="second">

    </div>
    @endif
    <script>
        function zoom() {
            if (document.getElementById('rightImage').style.display == 'none') {
                $.ajax({
                    method: "GET",
                    url: "value3/ProcessZoomViewOut",
                    success: function(response) {
                        document.getElementById('rightImage').style.display = 'block';
                        document.getElementById('leftImage').style.width = '75%';
                    }
                });
            } else {
                $.ajax({
                    method: "GET",
                    url: "value3/ProcessZoomViewIn",
                    success: function(response) {
                        document.getElementById('rightImage').style.display = 'none';
                        document.getElementById('leftImage').style.width = '100%';
                    }
                });

            }
        }

        function backpage(index) {
            $.ajax({
                method: "GET",
                url: "value3/backpage",
                success: function(response) {
                    history.go(index);
                }
            });
        }
    </script>
    <script>
        $('#modalHeaderRight').html('')
        Pusher.logToConsole = true;

        var pusher = new Pusher('5064fc09fcd20f23d5c1', {
            cluster: 'ap1'
        });

        var channel = pusher.subscribe('test.' + '{{ Session::get("user")[0]->IDTaiKhoan }}');
        channel.bind('tests', function() {
            $.ajax({
                method: "GET",
                url: "/ProcessNotificationShow",
                success: function(response) {
                    $('#numNotification').html(response);
                }
            });
        });
    </script>
</body>

</html>