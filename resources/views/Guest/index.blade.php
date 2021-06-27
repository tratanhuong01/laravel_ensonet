@include('Reload')
<?php

use App\Models\Functions;
use App\Models\Data;
use App\Process\DataProcessFive;
use App\Process\DataProcessThird;
use Illuminate\Support\Facades\Session;

$user = Session::get('user');

$allStory = DataProcessThird::sortStoryByID($user[0]->IDTaiKhoan);

$post = Data::sortAllPost($user[0]->IDTaiKhoan);

?>

@include('Head/document')

<head>
    <title>Ensonet</title>
    @include('Head/css')
    <script src="/js/index.js"></script>
    <style>
        .dataTwoImage {
            height: 93px;
        }

        .dataThreeImage {
            height: 63px;
        }
    </style>
</head>

<body class="dark:bg-dark-main">
    <!-- main -->
    <div class="w-full bg-gray-100 dark:bg-dark-main h-screen relative" id="main">
        <!-- header -->
        @include('Header')
        <!-- header -->
        <div class="w-full flex z-10 pt-16 bg-gray-100 dark:bg-dark-main lg:w-full 
        lg:mx-auto xl:w-full" id="content">
            <!-- left -->
            <div class="fixed pt-3 hidden sm:hidden xl:block xl:w-1/4">
                <div id="wrapper-scrollbar" class="pl-1.5 w-4/6 overflow-x-hidden overflow-y-auto 
                xl:w-full">
                    <div class="w-full left-category">
                        <ul>
                            <li class="cursor-pointer flex p-2.5 font-bold cursor-pointer dark:hover:bg-dark-third">
                                <img class="w-11 h-11 rounded-full object-cover mr-4" src="{{ $user[0]->AnhDaiDien }}" alt="">
                                <span class="text-sm flex text-gray-900 items-center font-bold dark:text-white">{{ $user[0]->Ho . ' ' .$user[0]->Ten }}</span>
                            </li>
                            <li onclick="window.location.href='profile.{{ $user[0]->IDTaiKhoan }}/friends'" class="cursor-pointer w-full flex px-2.5 py-2 dark:hover:bg-dark-third">
                                <img class="w-10 h-10 mr-4" src="img/friends.png" alt="" srcset="">
                                <span class="font-bold flex items-center dark:text-white">Bạn Bè</span>
                            </li>
                            <li onclick="window.location.href='memory'" class="cursor-pointer w-full flex px-2.5 py-2 dark:hover:bg-dark-third">
                                <img class="w-10 h-10 mr-4" src="img/memory.png" alt="" srcset="">
                                <span class="font-bold flex items-center dark:text-white">Kỉ Niệm</span>
                            </li>
                            <li class="cursor-pointer w-full flex px-2.5 py-2 dark:hover:bg-dark-third">
                                <img class="w-10 h-10 mr-4" src="img/messager.png" alt="" srcset="">
                                <span class="font-bold flex items-center dark:text-white">Messenger</span>
                            </li>
                            <li class="cursor-pointer w-full flex px-2.5 py-2 dark:hover:bg-dark-third">
                                <img class="w-10 h-10 mr-4" src="img/groups.png" alt="" srcset="">
                                <span class="font-bold flex items-center dark:text-white">Nhóm</span>
                            </li>
                            <li class="cursor-pointer w-full flex px-2.5 py-2 dark:hover:bg-dark-third">
                                <span class="bg-gray-300 dark:bg-dark-third px-2 py-1 
                                rounded-full dark:text-white mr-4">
                                    <i class="bx bxs-chevron-down text-xl"></i>
                                </span>
                                <span class="font-bold flex items-center dark:text-white">Xem thêm</span>
                            </li>

                        </ul>
                    </div>
                    <hr class="w-full my-4">
                    <p class="ml-4 mb-4 font-bold dark:text-white">Lối tắt của bạn</p>

                </div>
            </div>
            <!-- left -->

            <!-- center -->
            <div class="center-content relative left-0 px-2 sm:w-full sm:mx-auto md:w-3/4 lg:mx-0 
            lg:w-4/6 lg:left-0! xl:w-2/5 xl:left-3/10">
                <!-- story -->
                @if(count($allStory) == 0)
                @include('Component/Index/StoryNewUser')
                @else
                @include('Component/Index/Story', ['allStory' => $allStory])
                @endif
                <!-- story -->

                <!-- write post -->
                @include('Component/Post/Child/WritePost' , ['users' => $user])
                <!-- write post -->

                <!-- show post  -->
                <div class="timeline" id="show__post">
                    <input type="hidden" name="indexPost" id="indexPost" value="0">
                    @include('TimeLine/Post')
                    @include('TimeLine/Post')
                </div>
                <!-- show post -->
            </div>
            <!-- center -->

            <!-- right -->
            <div class="fixed hidden lg:block lg:w-1/3 lg:left-2/3 xl:left-7/10 xl:w-3/10">
                <div id="content-right-ok" class="w-full flex">
                    <div class="w-1/5 hidden sm:hidden xl:block">
                    </div>
                    <div class="content-right wrapper-content-right w-4/5 overflow-y-auto py-0 
                    px-2.5 lg:w-full xl:w-4/5">
                        <div class="w-full">
                            <p class="font-bold dark:text-white pt-2.5">Được tài trợ</p>
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
                                    <a href="{{ url('friends') }}" class="font-bold dark:text-white">Xem tất cả</a>
                                </div>
                            </div>
                            <div class="w-full" id="loiMoi">
                                <?php $requestFriend = Functions::getListRequestFriendNew($user[0]->IDTaiKhoan); ?>
                                @if (count($requestFriend) == 0)
                                <p class="mx-auto py-3 dark:text-white text-center font-bold dark:text-white">
                                    Không có lời mời kết bạn</p>
                                @else
                                @include('Component/Index/FriendRequest',['requestFriend',$requestFriend])
                                @endif
                            </div>
                        </div>
                        <?php $birthDay = DataProcessFive::getBirthdayCurrent($user[0]->IDTaiKhoan); ?>
                        @if (count($birthDay) > 0)
                        @include('Component/Index/Birthday',['birthDay' => $birthDay])
                        @endif
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
                            @foreach($listFriend as $key => $value)
                            @include('Component\Index\UserActivity',['data'=> $value[0]])
                            @endforeach
                            @endif
                            <div id="friends-online-info" class="absolute bg-white 
                            dark:bg-dark-third p-2 shadow-sm w-88 hidden top-0 right-90 px-4" style="display: none;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- right -->
        </div>

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
        <div class="w-full px-4 flex z-0 w-full w-full xl:w-1/2 xl:translate-x-0 overflow-x-auto flex-nowrap  
        ml-auto fixed bottom-0 lg:-bottom-1 w-91 max-w-91 lg:max-w-full xl:max-w-1/2  left-12 transform -translate-x-1/2 xl:right-20 flex-1 
        xl:overflow-x-hidden" id="placeChat">
        </div>
        <!-- place show chat -->

        <!-- place show notify -->
        <div class="w-80 fixed bottom-3 left-5" id="notifyShow">
        </div>
        <!-- place show notify -->
    </div>
    <!-- main -->

    <!-- place show modal -->
    <div class="w-full bg-gray-500 top-0 left-0 z-50 bg-opacity-50" id="second"></div>
    <!-- place show modal -->

    <!-- timeline -->
    @include('TimeLine/DivMainTimeLine')
    <!-- timeline -->

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
        var config = {
            routes: {
                ProcessSearchData: "{{ route('ProcessSearchData') }}",
                ProcessCommentPost: "{{ route('ProcessCommentPost') }}"
            }
        };
        var action = 'inactive';
        var arrayImage = new Array();
        var arrayImageAndVideoPost = new Array();
        store.set('imageAndVideoPost', arrayImageAndVideoPost);
        var pusher = new Pusher('5064fc09fcd20f23d5c1', {
            cluster: 'ap1'
        });
        $('#modalHeaderRight').html('');
        const userID = getUserID();
        var channel = pusher.subscribe('test.' + userID);
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
        if (action == 'inactive') {
            loadingPost(0);
        }
        $(window).scroll(function() {
            if ($(window).scrollTop() + $(window).height() > $(".timeline").height() &&
                action == 'inactive') {
                action = 'active';
                loading();
                setTimeout(function() {
                    loadingPost($('#indexPost').val());
                }, 500);
            }
        });
    </script>

</body>

</html>