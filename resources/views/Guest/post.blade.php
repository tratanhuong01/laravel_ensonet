<?php

use App\Models\Functions;
use App\Models\Data;
use Illuminate\Support\Facades\Session;

$user = Session::get('user');

$post = Functions::getPost($post_main[0]);

?>

@include('Head/document')

<head>
    <title>Ensonet</title>
    @include('Head/css')
</head>

<body class="dark:bg-dark-main">

    <div class="w-full bg-gray-100 dark:bg-dark-main h-screen" id="main">
        <!-- header -->
        @include('Header')
        <!-- header -->

        <!-- content -->
        <div class="w-full flex pt-10 bg-gray-100 dark:bg-dark-main lg:w-full 
        lg:mx-auto xl:w-full" id="content">
            @if (sizeof($post_main) == 0)
            <!-- content -->
            @include('Component\NotFound');
            <!-- content -->
            @else
            <div class="w-5/12 mx-auto">
                <!-- content -->
                @switch($post[0]->LoaiBaiDang)
                @case('0')
                @include('Component/Post/UpdateAvatarImage',['item' => $post])
                @break
                @case('1')
                @include('Component/Post/UpdateCoverImage',['item' => $post])
                @break
                @case('2')
                @include('Component/Post/PostNormal',['item' => $post])
                @break
                @case('3')
                @include('Component/Post/SharePost',['item' => $post])
                @break
                @case('5')
                @include('Component/Post/PostShareMemory',['item' => $post])
                @break
                @endswitch
                <!-- content -->
            </div>
            @endif
            <!-- create chat -->
            <div class="h-auto p-3 w-20">
                <div class="text-center cursor-pointer py-2 pl-2 pr-1.5 fixed right-3 bottom-4 " id="chatMinize">
                    <div onclick="openCreateChat()" class="cursor-pointer">
                        <i class="far fa-edit text-2xl py-2 px-3 pr-2 rounded-full bg-white dark:bg-dark-second 
                    dark:text-white"></i>
                    </div>
                </div>
            </div>
            <!-- create chat -->

            <!-- place show chat -->
            <div class="w-full px-4 flex z-50 md:w-full lg:w-full xl:w-1/2
            ml-auto fixed -bottom-1 right-20" id="placeChat">
            </div>
            <!-- place show chat -->
        </div>
        <!-- content -->
    </div>
    <!-- place show modal -->
    <div class="w-full bg-gray-500 top-0 left-0 z-50 bg-opacity-50" id="second"></div>
    <!-- place show modal -->

    <!-- timeline -->
    @include('TimeLine/DivMainTimeLine')
    <!-- timeline -->
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