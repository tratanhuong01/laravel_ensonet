<?php

use App\Models\StringUtil;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

$u = Session::get('user');

?>
@include('Head/document')

<head>
    <title>Ensonet</title>
    @include('Head/css')
</head>

<body>
    <?php
    $paths = explode('/', parse_url(url()->current())['path']);

    $dataNew = array();
    $urlNext = '';
    $urlPrevious = '';
    $indexImage = -1;
    switch ($paths[1]) {
        case 'photo':
            if (count($data) != 0) {
                for ($i = 0; $i < count($data); $i++)
                    $dataNew[$i][$data[$i]->IDHinhAnh] = $data[$i]->DuongDan;
                for ($i = 0; $i < count($dataNew); $i++)
                    foreach ($dataNew[$i] as $key => $value)
                        if ($key == $idHinhAnh)
                            $indexImage = $i;
                $urlNext = 'photo/' . $data[0]->IDBaiDang . '/' .
                    $data[$indexImage == count($data) - 1 ? $indexImage : $indexImage + 1]->IDHinhAnh;
                $urlPrevious = 'photo/' . $data[0]->IDBaiDang . '/'
                    . $data[$indexImage == 0 ? $indexImage : $indexImage - 1]->IDHinhAnh;
            }

            break;
        case 'comment':
            if (count($data) != 0)
                $dataNew = $data;
            break;

        default:
            # code...
            break;
    }
    ?>
    @switch($paths[1])
    @case('photo')
    @if (count($dataNew) == 0 && $indexImage == -1)
    @include('Component\NotFound')
    @else
    <div class="w-full dark:bg-dark-main" id="main">
        <div class="w-full flex h-screen bg-gray-100" id="content">
            <div class="w-9/12 flex bg-black relative" id="leftImage">
                <?php
                $numLoad = Session::get('numLoad');

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
                        <img class="w-full mx-auto object-cover absolute object-cover" style="transform: translateY(45%); height: 400px;" src="{{ $dataNew[$indexImage][$idHinhAnh] }}" alt="">
                        @else
                        <img style="max-width: 90%;" class="mx-auto object-cover h-screen" src="{{ $dataNew[$indexImage][$idHinhAnh] }}" alt="">
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
    @endif
    @break
    @case('comment')
    @if (count($dataNew) == 0)
    @include('Component\NotFound')
    @else
    <div class="w-full dark:bg-dark-main" id="main">
        <div class="w-full flex h-screen bg-gray-100" id="content">
            <div class="w-9/12 flex bg-black relative" id="leftImage">
                <?php
                $numLoad = Session::get('numLoad');
                ?>
                <div onclick="backpage('{{ $numLoad }}')" class="w-10 h-10 rounded-full
                absolute top-2 left-4 bg-gray-100 text-4xl font-bold text-center cursor-pointer">&times;</div>
                <div class="w-1/12"></div>
                <div class="w-10/12">
                    <div class="mx-auto relative ">
                        <img style="max-width: 90%;" class="mx-auto object-cover h-screen" style="transform: translateY(45%); height: 400px;" src="{{ $dataNew[0]->DuongDan }}" alt="">
                    </div>
                </div>
                <div class="w-1/12"></div>
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
    @endif
    @break
    @endswitch
    <!-- place show modal -->
    <div class="w-full bg-gray-500 top-0 left-0 z-50 bg-opacity-50" id="second"></div>
    <!-- place show modal -->

    <!-- timeline -->
    @include('TimeLine/DivMainTimeLine')
    <!-- timeline -->

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
                    $('#numNotification').html(response.num);
                    $('#notifyShow').append(response.view);
                }
            });
        });
    </script>
</body>

</html>