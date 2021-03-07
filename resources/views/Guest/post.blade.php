<?php

use App\Models\Functions;
use App\Models\Data;
use Illuminate\Support\Facades\Session;

?>

<!DOCTYPE html>
<html lang="en" class="{{ Session::get('user')[0]->DarkMode == 0 ? '' : 'dark' }}">

<head>
    <title>Ensonet</title>
    @include('Head/css')
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/css/emojis.css">
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="/js/scrollbar.js"></script>
    <script src="/js/event/event.js"></script>
    <script src="/js/ajax/BaiDang/ajax.js"></script>
    <script src="/js/ajax/MoiQuanHe/ajax.js"></script>
    <script src="/js/ajax/BinhLuan/ajax.js"></script>
    <script src="/js/ajax.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/js/header.js"></script>
</head>

<body class="dark:bg-dark-main">
    <?php $user = Session::get('user'); ?>
    <div class="w-full bg-gray-100 dark:bg-dark-main h-screen" id="main">
        @include('Header');
        <div class="w-full flex pt-10 bg-gray-100 dark:bg-dark-main lg:w-full lg:mx-auto xl:w-full" id="content">
            @if (sizeof($post_main) == 0)
            @include('Component\KhongTimThay');
            @else
            <div class="w-5/12 mx-auto">
                <?php
                $post = Functions::getPost($post_main[0]);
                ?>
                @switch($post[0]->LoaiBaiDang)
                @case('0')
                @include('Component/BaiDang/CapNhatAvatar',['item' => $post])
                @break

                @case('1')
                @include('Component/BaiDang/CapNhatAnhBia',['item' => $post])
                @break

                @case('2')
                @include('Component/BaiDang/BaiDangTT',['item' => $post])
                @break

                @endswitch
            </div>
            @endif
        </div>
        <div class="w-full bg-gray-500 top-0 left-0 z-50 bg-opacity-50" id="second">

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://twemoji.maxcdn.com/v/latest/twemoji.min.js" crossorigin="anonymous"></script>
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