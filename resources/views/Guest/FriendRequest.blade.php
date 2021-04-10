<?php

use App\Models\Functions;
use Illuminate\Support\Facades\Session;
use App\Models\StringUtil;
use App\Process\DataProcessSecond;

$user = Session::get('user');
$requestFriend = DataProcessSecond::getListRequestFriendNew($user[0]->IDTaiKhoan);

?>
<!DOCTYPE html>
@if (session()->has('user'))
<html lang="en" class="{{ Session::get('user')[0]->DarkMode == '0' ? '' : 'dark' }}">
@else
<html lang="en">
@endif

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook</title>
    @include('Head/css')
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/js/Login/login.js"></script>
    <script src="/js/event/event.js"></script>
    <script src="/js/ajax.js"></script>
    <script src="/js/ajax/BaiDang/ajax.js"></script>
    <script src="/js/ajax/BinhLuan/ajax.js"></script>
    <script src="/js/realtime/notification.js"></script>
    <script src="/js/header.js"></script>
    <script src="/js/ajax/Profile/ajax.js"></script>
</head>

<body>
    <div class="w-full" id="main">
        @include('Header')
        <div class="w-full flex">
            <div class="w-1/4 fixed p-2 left-0 dark:bg-dark-second">
                <div class="wrapper-content-right mt-16 w-full overflow-x-hidden overflow-y-auto" style="height:750px;max-height: 750px;">
                    <div class="w-full ">
                        <span class="dark:text-white">
                            <b><span id="numberRequestwww">{{ count($requestFriend) }}</span> lời mời kết bạn</b> <br>
                        </span>
                        <span class="pr-4">
                            <p href="" onclick="requestFriendsM('{{ $user[0]->IDTaiKhoan }}')" class="text-1877F2 text-sm cursor-pointer">Xem lời mời đã gửi</p>
                        </span>
                    </div>
                    @if (count($requestFriend) <= 0) <p class="font-bold py-3 text-center dark:text-white">
                        Không có lời mời kết bạn nào.
                        </p>
                        @else
                        @foreach($requestFriend as $key => $value)
                        <div id="{{$value->IDTaiKhoan}}profile" class="w-full flex py-2.5 px-0 cursor-pointer">
                            <div class="w-1/5 " onclick="loadAjaxProfileFriendsRequest('{{$value->IDTaiKhoan}}')">
                                <a href=""><img class="w-16 h-16 object-cover" src="/{{ $value->AnhDaiDien }}" alt=""></a>
                            </div>
                            <div class="w-4/5 pl-2 pr-4">
                                <div class="w-full">
                                    <span class="float-left pl-2.5 font-bold">
                                        <a href="" class="dark:text-white">{{ $value->Ho . ' ' . $value->Ten }}</a></span>
                                    <span class="float-right text-xs dark:text-white">{{ StringUtil::CheckDateTimeRequest($value->NgayGui) }}</span>
                                </div>
                                <div class="w-full flex py-2.5 px-0 text-sm font-bold">
                                    <span onclick="AcceptFriendThis('{{ $user[0]->IDTaiKhoan }}',
                                    '{{$value->IDTaiKhoan}}',this)" class="w-7/12 text-center h-10 leading-10 mr-4 
                                    cursor-pointer text-white" style="border-radius: 10px;background-color: #1877F2;">
                                        Xác Nhận
                                    </span>
                                    <span onclick="CancelRequestFriendThis('{{ $user[0]->IDTaiKhoan }}',
                                    '{{$value->IDTaiKhoan }}',this)" class="w-7/12 text-center h-10 leading-10 cursor-pointer 
                                     text-gray-700" style="background-color: #D8DADF;border-radius: 10px;">
                                        Xóa
                                    </span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        <hr class="my-2.5 mx-auto w-11/12">
                        <br>
                </div>
            </div>
            <div class="w-3/4 fixed right-0 dark:bg-dark-main" id="profileRight" style="max-height:876px;overflow-y: auto;">
                @if(isset($users))
                @include('Component/profile',[
                'user' => $user,
                'users' => $users
                ])
                @else
                <div class="text-center w-full py-96 dark:bg-dark-main">
                    <i class="fas fa-user-friends dark:text-white text-6xl"></i>
                    <p class="font-bold text-3xl py-2 dark:text-white" style="font-family: system-ui;">
                        Chọn tên người mà bạn muốn xem trước trang cá nhân
                    </p>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="w-full bg-gray-500 top-0 left-0 z-50 bg-opacity-50" id="second">

    </div>
    <script src="js/scrollbar.js"></script>
    <script>
        $('#modalHeaderRight').html('')
        Pusher.logToConsole = true;

        var pusher = new Pusher('5064fc09fcd20f23d5c1', {
            cluster: 'ap1'
        });

        var channel = pusher.subscribe('test.' + '{{ Session::get("user")[0]->IDTaiKhoan }}');
        channel.bind('tests', function() {
            $.ajax({
                method: " GET",
                url: "/ProcessNotificationShow",
                success: function(response) {
                    $('#numNotification').html(response);
                }
            });
        });
    </script>
</body>

</html>