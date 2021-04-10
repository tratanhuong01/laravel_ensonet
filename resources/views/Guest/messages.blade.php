@include('Reload')
<?php

use App\Models\Functions;
use App\Models\Data;
use App\Process\DataProcess;
use Illuminate\Support\Facades\Session;
use App\Models\StringUtil;

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
    <script src="/js/ajax/TroChuyen/ajax.js"></script>
    <script src="/js/realtime/state.js"></script>
    scri
</head>

<body class="dark:bg-dark-main">
    @if (session()->has('user'))
    <?php
    $user = Session::get('user');
    $allMess = DataProcess::getFullMessageByID(Session::get('user')[0]->IDTaiKhoan);
    ?>
    <div class="w-full bg-gray-100 dark:bg-dark-main relative" id="main">
        @include('Header')
        <div class="w-full flex pt-6 z-10 bg-white dark:bg-dark-main lg:w-full 
        lg:mx-auto xl:w-full" id="content" style="max-height: 741px;height: 741px;">
            <div class="w-1/4 border-r-2 mt-5 border-solid dark:border-dark-second
             border-gray-100 shadow-xl">
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

                <div class="w-full pt-3 wrapper-scrollbar overflow-y-auto my-1" id="mess-right-messenger" style="max-height: 595px;height:595px;">
                    @if(count($allMess) == 0)
                    <p class="text-center font-bold dark:text-white">
                        Không có tin nhắn nào để hiển thị.
                    </p>
                    @else
                    @foreach($allMess as $key => $value)
                    @php
                    $el = DataProcess::getUserOfGroupMessage($value[0]->IDNhomTinNhan)
                    @endphp
                    @if(count($el) == 1)
                    <div class="mess-person cursor-pointer flex relative dark:hover:bg-dark-third 
                    hover:bg-gray-200 py-2 px-1 w-full px-3">
                        <div class="w-1/5">
                            <div class="w-14 h-14 relative">
                                <a href=""><img src="/{{ $el[0]->AnhDaiDien }}" alt="" class="w-14 h-14 rounded-full object-cover p-0.5"></a>
                                @include('Component\Child\HoatDong',[
                                'padding' => 'p-1.5',
                                'right' => 'right-0',
                                'bottom' => 'bottom-0',
                                'IDTaiKhoan' => '1000000008'
                                ])
                            </div>
                        </div>
                        <div class="w-4/5">
                            <div class="w-full">
                                <span style="float: left;font-weight: bold;">
                                    <a href="" class="dark:text-white">
                                        {{ $el[0]->Ho . ' ' . $el[0]->Ten }}
                                    </a></span>
                            </div>
                            <div class="w-full flex py-1 text-base flex">
                                <div class="w-4/5 dark:text-white text-sm">
                                    @isset($value[count($value) - 1])
                                    @if ($value[count($value) - 1]->IDTaiKhoan == Session::get('user')[0]->IDTaiKhoan)
                                    <span class="text-gray-500 dark:text-white font-bold">
                                        You : {{ $value[count($value) - 1]->NoiDung }} &nbsp;&nbsp;
                                    </span>
                                    <span class="text-sm text-gray-700 dark:text-white font-bold">{{ StringUtil::CheckDateTimeRequest($value[count($value) - 1]->ThoiGianNhanTin) }}</span>
                                    @else
                                    <span class="text-blue-500 dark:text-blue-500 font-bold">
                                        {{$el[0]->Ten}} : {{ $value[count($value) - 1]->NoiDung }} &nbsp;&nbsp;
                                    </span>
                                    <span class="text-sm text-gray-700 dark:text-white font-bold">{{ StringUtil::CheckDateTimeRequest($value[count($value) - 1]->ThoiGianNhanTin) }}</span>
                                    @endif
                                    @endisset
                                </div>
                                <div class="w-1/5">
                                    <img class="float-right w-5 h-5 rounded-full" src="/img/avatar.jpg" alt="">
                                </div>
                            </div>
                            <span class="mess-edit top-4 right-10 text-center absolute rounded-full bg-white">
                                <i class="fas fa-ellipsis-h edit-mess"></i>
                            </span>
                        </div>
                    </div>
                    @else
                    <div class="mess-person cursor-pointer flex relative dark:hover:bg-dark-third 
                    hover:bg-gray-200 py-2 px-1 w-full px-3">
                        <div class="w-1/5">
                            <div class="w-14 h-14 relative mx-auto">
                                <img src="/{{ $el[0]->AnhDaiDien }}" class="w-10 h-10 rounded-full object-cover 
                                absolute top-0 right-0" alt="">
                                <img src="/{{ $el[1]->AnhDaiDien }}" class="w-10 h-10 rounded-full object-cover 
                                absolute bottom-0 left-0" alt="">
                            </div>
                        </div>
                        <div class="w-4/5">
                            <div class="w-full">
                                <span class="dark:text-white " style="float: left;font-weight: bold;">
                                    @if ($value[0]->TenNhomTinNhan == '')
                                    @php
                                    $name = "";
                                    @endphp
                                    @foreach($el as $keys => $values)
                                    @php
                                    $name .= $values->Ten . ' , '
                                    @endphp
                                    @endforeach
                                    {{ $name }}
                                    @else
                                    {{ $value[0]->TenNhomTinNhan }}
                                    @endif
                                </span>
                            </div>
                            <div class="w-full flex py-1 text-base flex">
                                <div class="w-4/5 text-sm">
                                    @isset($value[count($value) - 1])
                                    @if ($value[count($value) - 1]->IDTaiKhoan == Session::get('user')[0]->IDTaiKhoan)
                                    <span class="text-gray-500 dark:text-white">
                                        You : {{ $value[count($value) - 1]->NoiDung }} &nbsp;&nbsp;
                                    </span>
                                    <span class="text-gray-700 dark:text-white">{{ StringUtil::CheckDateTimeRequest($value[count($value) - 1]->ThoiGianNhanTin) }}</span>
                                    @else
                                    <span class="text-blue-500 dark:text-blue-500 font-bold">
                                        {{ $value[count($value) - 1]->Ten }} : {{ $value[count($value) - 1]->NoiDung }} &nbsp;&nbsp;
                                    </span>
                                    <span class="dark:text-white">
                                        {{ StringUtil::CheckDateTimeRequest($value[count($value) - 1]->ThoiGianNhanTin) }}</span>
                                    @endif
                                    @endisset
                                </div>
                                <div class="w-1/5">
                                    <img class="float-right w-5 h-5 rounded-full" src="img/avatar.jpg" alt="">
                                </div>
                            </div>
                            <span class="mess-edit top-4 right-8 text-center absolute rounded-full bg-white">
                                <i class="fas fa-ellipsis-h edit-mess"></i>
                            </span>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    @endif
                </div>
            </div>
            <div class="w-3/4 flex">
                @include('Component\Messenger\Messenger',[
                'idNhomTinNhan' => $idNhomTinNhan,
                'chater' => $chater,
                'messages' => $messages
                ])
            </div>
        </div>
    </div>
    <div class="w-full bg-gray-500 top-0 left-0 z-50 bg-opacity-50" id="second">
    </div>
    @else
    <?php redirect()->to('login')->send(); ?>
    @endif

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://twemoji.maxcdn.com/v/latest/twemoji.min.js" crossorigin="anonymous"></script>
</body>

</html>