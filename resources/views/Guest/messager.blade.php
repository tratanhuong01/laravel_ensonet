@include('Reload')
<?php

use App\Models\Functions;
use App\Models\Data;
use App\Process\DataProcess;
use Illuminate\Support\Facades\Session;
use App\Models\StringUtil;

?>
@include('Head.document')

<head>
    <title>Ensonet</title>
    @include('Head.css')
    <style>
        .dataTwoImage {
            height: 241px;
        }

        .dataThreeImage {
            height: 167px;
        }
    </style>
</head>
<script>
    var store = (function() {
        var map = {};

        return {
            set: function(name, value) {
                map[name] = value;
            },
            get: function(name) {
                return map[name];
            }
        };
    })();
    var arrayImage = new Array();
</script>

<body class="dark:bg-dark-main">
    @if (session()->has('user'))
    <?php
    $user = Session::get('user');
    $allMess = DataProcess::getFullMessageByID(Session::get('user')[0]->IDTaiKhoan);
    ?>
    <div class="w-full bg-gray-100 dark:bg-dark-main relative" id="main">
        @include('Header')
        <div class="w-full flex pt-16 z-10 bg-white dark:bg-dark-main h-screen lg:w-full 
        lg:mx-auto xl:w-full" id="content">
            <div class="w-1/4 border-r-2 border-solid dark:border-dark-second
             border-gray-100 shadow-xl h-full">
                <div class="w-full flex py-2">
                    <div class="w-1/2 font-bold text-2xl py-0.5 ml-5 dark:text-white">
                        Chat
                    </div>
                    <div class="w-1/2 ml-auto">
                        <ul class="ml-auto flex float-right">
                            <li class="py-1.5 px-2 mx-1 bg-gray-300 dark:bg-dark-third rounded-full 
                            dark:text-white cursor-pointer">
                                <i class="fas fa-ellipsis-h"></i>
                            </li>
                            <li class="py-1.5 px-2 mx-1 bg-gray-300 dark:bg-dark-third rounded-full 
                            dark:text-white cursor-pointer">
                                <i class="fas fa-video"></i>
                            </li>
                            <li class="py-1.5 px-2 mx-1 bg-gray-300 dark:bg-dark-third rounded-full 
                            dark:text-white cursor-pointer">
                                <i class="far fa-edit"></i>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="w-full text-center pt-2 pb-1">
                    <input type="text" name="" id="" class="w-11/12 mx-auto py-1.5 px-2.5 rounded-4xl 
                    bg-gray-300 dark:bg-dark-third dark:text-white" placeholder="Tìm kiếm trên messenger">
                </div>
                <div class="w-full pt-3 wrapper-scrollbar overflow-y-auto my-1" id="mess-right-messenger" 
                style="max-height: calc(100% - 100px);height: calc(100% - 100px);">
                    @include('Guest.Child.AllMessager',['allMess' => $allMess])
                </div>
            </div>
            <div class="w-3/4 flex">
                @if (count($chater) == 1)
                @include('Component.Messenger.MessengerChat',[
                'idNhomTinNhan' => $idNhomTinNhan,
                'chater' => $chater,
                'messages' => $messages
                ])
                @else
                @include('Component.Messenger.MessengerChatGroup',[
                'idNhomTinNhan' => $idNhomTinNhan,
                'chater' => $chater,
                'messages' => $messages
                ])
                @endif
            </div>
        </div>
    </div>
    <!-- place show modal -->
    <div class="w-full bg-gray-500 top-0 left-0 z-50 bg-opacity-50" id="second"></div>
    <!-- place show modal -->
    <!-- place show notify -->
    <div class="w-80 fixed bottom-3 left-5" id="notifyShow">
    </div>
    <!-- place show notify -->
    <!-- timeline -->
    @include('TimeLine.DivMainTimeLine')
    <!-- timeline -->
    @else
    <?php redirect()->to('login')->send(); ?>
    @endif

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://twemoji.maxcdn.com/v/latest/twemoji.min.js" crossorigin="anonymous"></script>
</body>

</html>