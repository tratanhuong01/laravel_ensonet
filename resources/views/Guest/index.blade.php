<?php

use App\Models\Functions;
use App\Models\Data;
use Illuminate\Support\Facades\Session;

?>

<!DOCTYPE html>
@if (session()->has('user'))
<html lang="en" class="{{ Session::get('user')[0]->DarkMode == '0' ? '' : 'dark' }}">
@else
<html lang="en">
@endif

<head>
    <title>Ensonet</title>
    @include('Head/css')
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/css/emojis.css">
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="/js/scrollbar.js"></script>
    <script src="/js/index.js"></script>
    <script src="/js/event/event.js"></script>
    <script src="/js/ajax/BaiDang/ajax.js"></script>
    <script src="/js/ajax/MoiQuanHe/ajax.js"></script>
    <script src="/js/ajax/BinhLuan/ajax.js"></script>
    <script src="/js/ajax.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/js/header.js"></script>
</head>

<body class="dark:bg-dark-main">
    @if (session()->has('user'))
    <?php

    $user = Session::get('user');

    ?>
    <div class="w-full bg-gray-100 dark:bg-dark-main h-screen" id="main">
        @include('Header');
        <div class="w-full flex pt-10 bg-gray-100 dark:bg-dark-main lg:w-full lg:mx-auto xl:w-full" id="content">
            <div class="fixed pt-3 hidden sm:hidden xl:block xl:w-1/4">
                <div id="wrapper-scrollbar" class="pl-1.5 w-4/6 overflow-x-hidden overflow-y-auto 
                xl:w-full">
                    <div class="w-full left-category">
                        <ul>
                            <li class="cursor-pointer flex p-2.5 font-bold cursor-pointer dark:hover:bg-dark-third">
                                <img class="w-9 h-9 rounded-full object-cover" src="{{ $user[0]->AnhDaiDien }}" alt="">&nbsp;&nbsp;
                                <span class="pl-1.5 pt-1.5 text-sm font-bold dark:text-white">{{ $user[0]->Ho . ' ' .$user[0]->Ten }}</span>
                            </li>
                            <li onclick="window.location.href='profile.{{ $user[0]->IDTaiKhoan }}/friends'" class="cursor-pointer w-full flex px-2.5 py-2 dark:hover:bg-dark-third">
                                &nbsp;<img class="w-8 h-8" src="img/friends.png" alt="" srcset="">&nbsp;&nbsp;
                                <span class="pl-2.5 pt-0.5 font-bold dark:text-white">Bạn Bè</span>
                            </li>
                            <li class="cursor-pointer w-full flex px-2.5 py-2 dark:hover:bg-dark-third">
                                &nbsp;<img class="w-8 h-8" src="img/memory.png" alt="" srcset="">&nbsp;&nbsp;
                                <span class="pl-2.5 pt-0.5 font-bold dark:text-white">Kỉ Niệm</span>
                            </li>
                            <li class="cursor-pointer w-full flex px-2.5 py-2 dark:hover:bg-dark-third">
                                &nbsp;<img class="w-8 h-8" src="img/messager.png" alt="" srcset="">&nbsp;&nbsp;
                                <span class="pl-2.5 pt-0.5 font-bold dark:text-white">Messenger</span>
                            </li>
                            <li class="cursor-pointer w-full flex px-2.5 py-2 dark:hover:bg-dark-third">
                                &nbsp;<img class="w-8 h-8" src="img/groups.png" alt="" srcset="">&nbsp;&nbsp;
                                <span class="pl-2.5 pt-0.5 font-bold dark:text-white">Nhóm</span>
                            </li>
                            <li class="cursor-pointer w-full flex px-2.5 py-2 dark:hover:bg-dark-third">
                                <span class="bg-gray-200 dark:bg-dark-third px-2 py-1 
                                rounded-full dark:text-white">
                                    <i class="bx bxs-chevron-down text-xl"></i>
                                </span>
                                &nbsp;
                                <span class="pl-2.5 pt-0.5 font-bold dark:text-white">Xem thêm</span>
                            </li>

                        </ul>
                    </div>
                    <hr class="w-full my-4">
                    <p class="ml-4 mb-4 font-bold dark:text-white">Lối tắt của bạn</p>

                </div>
            </div>
            <div class="center-content relative left-0 px-2 sm:w-full sm:mx-auto md:w-3/4 lg:mx-0 
            lg:w-4/6 lg:left-0! xl:w-2/5 xl:left-3/10">
                <div class="w-full bg-white mb-3 mt-2 dark:bg-dark-second m-auto rounded-lg mb-2">
                    <div class="w-full flex p-2.5 ">
                        <div class="w-2/12 md:w-1/12 mr-3 pt-1">
                            <a href=""><img class="w-12 rounded-full h-12 object-cover " src="/{{ $user[0]->AnhDaiDien }}"></a>
                        </div>
                        <div class="w-11/12">
                            <input class="w-full p-3 border-none outline-none bg-gray-200 
                            dark:bg-dark-third" style="border-radius: 40px;" onclick="openPost()" type="text" placeholder="{{ $user[0]->Ten }} ơi, Bạn Đang Nghĩ Gì Thế?">
                        </div>
                    </div>
                    <hr>
                    <div class="w-full">
                        <ul class="w-full flex">
                            <li class="w-1/2 md:w-1/3 xl:w-1/3 cursor-pointer py-4 text-center dark:hover:bg-dark-third hover:bg-gray-200"><i style="color: #E42645;font-size: 18px;" class="fas fa-video"></i>
                                &nbsp;<b class="dark:text-white">Video Trực Tiếp</b></li>
                            <li class="w-1/2 md:w-1/3 xl:w-1/3  cursor-pointer py-4 text-center dark:hover:bg-dark-third hover:bg-gray-200"><i style="color: #41B35D;font-size: 18px;" class="far fa-image"></i>
                                &nbsp;<b class="dark:text-white">Ảnh / Video</b>
                            </li>
                            <li class="w-1/3 md:w-1/3 xl:w-1/3 md:block hidden cursor-pointer py-4 text-center dark:hover:bg-dark-third hover:bg-gray-200 pr-0"><i style="color: #F7B928;font-size: 18px;" class="fas fa-smile"></i>
                                &nbsp;<b class="dark:text-white">Cảm Xúc / Hoạt Động</b></li>
                        </ul>
                    </div>
                </div>
                <?php $post = Data::sortAllPost($user[0]->IDTaiKhoan); ?>

                @for ($i = 0 ; $i < sizeof($post) ; $i++) @switch($post[$i][0]->LoaiBaiDang)
                    @case('0')
                    @include('Component/BaiDang/CapNhatAvatar',['item' => $post[$i]])
                    @break

                    @case('1')
                    @include('Component/BaiDang/CapNhatAnhBia',['item' => $post[$i]])
                    @break

                    @case('2')
                    @include('Component/BaiDang/BaiDangTT',['item' => $post[$i]])
                    @break

                    @endswitch
                    @endfor
            </div>
            <div class="fixed hidden lg:block lg:w-1/3 lg:left-2/3 xl:left-7/10 xl:w-3/10">
                <div id="content-right-ok" class="w-full flex">
                    <div class="w-1/5 hidden sm:hidden xl:block">
                    </div>
                    <div class="content-right wrapper-content-right w-4/5 overflow-y-auto py-0 
                    px-2.5 lg:w-full xl:w-4/5">
                        <div class="w-full">
                            <br>
                            <p class="font-bold dark:text-white">Được tài trợ</p>
                            <div class="w-full flex mx-0 my-4">
                                <a href=""><img class="w-32 h-32 object-contain" style="border-radius: 20px;" src="img/ads1.jpg" alt=""></a>
                                <div class="block my-9 mx-2.5">
                                    <span><a href="" class="dark:text-white font-bold">Didongviet</a></span> <br>
                                    <span><a class="text-xs dark:text-white" href="">didongviet.vn</a></span>
                                </div>
                            </div>
                            <div class="w-full flex mx-0 my-4">
                                <a href=""><img class="w-32 h-32 object-contain" style="border-radius: 20px;" src="img/ads2.jpg" alt=""></a>
                                <div class="block my-9 mx-2.5">
                                    <span><a href="" class="dark:text-white font-bold">Phone Shop</a></span> <br>
                                    <span><a class="text-xs dark:text-white" href="">shopphone.vn</a></span>
                                </div>
                            </div>
                        </div>
                        <hr class="my-3 mx-auto w-full">
                        <div id="friend-request">
                            <div class="w-full flex">
                                <div class="w-1/2 text-left">
                                    <p class="font-bold dark:text-white">Lời mời kết bạn</p>
                                </div>
                                <div class="w-1/2 text-right">
                                    <a href="" class="font-bold dark:text-white">Xem tất cả</a>
                                </div>
                            </div>
                            <div class="w-full" id="loiMoi">
                                <?php $requestFriend = Functions::getListRequestFriendNew($user[0]->IDTaiKhoan); ?>
                                @if (count($requestFriend) == 0)
                                <p class="mx-auto py-3 dark:text-white text-center font-bold dark:text-white">
                                    Không có lời mời kết bạn</p>
                                @else
                                @include('Component/TrangChu/LoiMoiKetBan',['requestFriend',$requestFriend])
                                @endif
                            </div>
                        </div>
                        <div class="w-full pt-3">
                            <div class="w-full flex">
                                <div class="w-1/2 py-2.5 px-0">
                                    <p class="font-bold dark:text-white">Bạn bè</p>
                                </div>
                                <div class="w-1/2">
                                    <ul class="flex float-right">
                                        <li class="cursor-pointer p-2.5 text-xl"><i class="fas fa-video dark:text-white"></i></li>
                                        <li class="cursor-pointer p-2.5 text-xl"><i class="fab fa-searchengin dark:text-white"></i></li>
                                        <li class="cursor-pointer p-2.5 text-xl"><i class="fas fa-ellipsis-h dark:text-white"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <?php $listFriend = Functions::getListFriendsUser($user[0]->IDTaiKhoan); ?>
                            @if (count($listFriend) == 0)

                            <div class="w-full flex mb-4 p-2 text-center friends-online relative cursor-pointer 
                                dark:hover:bg-dark-third">
                                <span class="mx-auto dark:text-white text-center font-bold dark:text-white">
                                    Không tìm thấy</span>
                            </div>
                            @else
                            @for ($i = 0 ; $i < count($listFriend) ; $i++) @include('Component\TrangChu\NguoiDungHoatDong',['data'=> $listFriend[$i][0]]) @endfor @endif
                                <div id="friends-online-info" class="absolute bg-white 
                            dark:bg-dark-third p-2 shadow-sm w-88 hidden top-0 right-90 px-4" style="display: none;">

                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full bg-gray-500 top-0 left-0 z-50 bg-opacity-50" id="second">

        </div>
        @else
        <?php redirect()->to('login')->send(); ?>
        @endif
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://twemoji.maxcdn.com/v/latest/twemoji.min.js" crossorigin="anonymous"></script>
    <script src="js/DisMojiPicker.js"></script>
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