<?php
$path = explode('/', parse_url(url()->current())['path']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="/css/app.css" />
    <link rel="stylesheet" href="/css/emojis.css" />
    <link rel="stylesheet" href="/css/loading.css" />
    <link rel="stylesheet" href="/css/style.css" />
    <link rel="stylesheet" href="/css/tailwind_second.css" />
    <link rel="stylesheet" href="/tailwind/tailwind.css" />
    <link rel="stylesheet" href="/tailwind/tailwind.custom.css" />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <style>
        * {
            font-family: "Lato", sans-serif;
        }

        tr {
            text-align: center;
        }

        th {
            width: 1%;
            white-space: nowrap;
            text-align: center;
        }

        td {
            width: 1%;
            white-space: nowrap;
            text-align: center;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/js/admin/nor.js"></script>
    <script src="/js/admin/ajax.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="/js/admin/ajax_second.js"></script>
</head>

<body>
    <div class="w-full flex">
        <div class="w-1/5 shadow-lg h-screen">
            <div class="w-full text-xl font-bold flex
            border-solid border-gray-300 py-4 px-6">
                ENSONET MANAGEMENT
            </div>
            <div class="w-full p-3">
                <div class="w-full flex relative p-2 border-solid 
                border-gray-300">
                    <div class="w-1/4 text-right mr-2">
                        <img src="/img/avatar.png" class="w-12 h-12 rounded-full" alt="">
                    </div>
                    <div class="w-3/4">
                        <p class="font-bold">Trà Tấn Hưởng</p>
                        <p>Quản trị viên</p>
                    </div>
                    <i class="fas fa-caret-down absolute top-1/3 right-4 cursor-pointer"></i>
                </div>
                <ul class="w-full p-2 hidden">
                    <li class="w-full p-1.5 cursor-pointer">
                        Thông tin cá nhân
                    </li>
                    <li class="w-full p-1.5 cursor-pointer">
                        Chỉnh sửa
                    </li>
                    <li class="w-full p-1.5 cursor-pointer">
                        Cài đặt
                    </li>
                </ul>
            </div>
            <div class="w-full">
                <ul class="w-full p-3">
                    <li onclick="loadCategoryAd('dashboard',this)" class="{{ $path[2] == 'dashboard' ?
                    'activeBorder bg-gray-300 w-full border-sold border-blue-500 font-bold 
                    my-1 hover:bg-gray-200 border-l-4 cursor-pointer flex pl-5 py-2 text-gray-700 
                    items-center rounded-lg' :
                    'w-full border-sold border-white 
                    font-bold my-1 hover:bg-gray-200 border-l-4 cursor-pointer flex pl-5 py-2 
                    text-gray-700 items-center rounded-lg'
                    }}">
                        <i class="fas fa-home text-2xl mr-3"></i>
                        Tổng quan
                    </li>
                    <li onclick="loadCategoryAd('user',this)" class="{{ $path[2] == 'user' ?
                    'activeBorder bg-gray-300 w-full border-sold border-blue-500 font-bold 
                    my-1 hover:bg-gray-200 border-l-4 cursor-pointer flex pl-5 py-2 text-gray-700 
                    items-center rounded-lg' :
                    'w-full border-sold border-white 
                    font-bold my-1 hover:bg-gray-200 border-l-4 cursor-pointer flex pl-5 py-2 
                    text-gray-700 items-center rounded-lg'
                    }}">
                        <i class="fas fa-user text-2xl mr-3"></i>
                        Người dùng
                    </li>
                    <li onclick="loadCategoryAd('post',this)" class="{{ $path[2] == 'post' ?
                    'activeBorder bg-gray-300 w-full border-sold border-blue-500 font-bold 
                    my-1 hover:bg-gray-200 border-l-4 cursor-pointer flex pl-5 py-2 text-gray-700 
                    items-center rounded-lg' :
                    'w-full border-sold border-white 
                    font-bold my-1 hover:bg-gray-200 border-l-4 cursor-pointer flex pl-5 py-2 
                    text-gray-700 items-center rounded-lg'
                    }}">
                        <i class="fas fa-marker text-2xl mr-3"></i>
                        Bài viết
                    </li>
                    <li onclick="loadCategoryAd('story',this)" class="{{ $path[2] == 'story' ?
                    'activeBorder bg-gray-300 w-full border-sold border-blue-500 font-bold 
                    my-1 hover:bg-gray-200 border-l-4 cursor-pointer flex pl-5 py-2 text-gray-700 
                    items-center rounded-lg' :
                    'w-full border-sold border-white 
                    font-bold my-1 hover:bg-gray-200 border-l-4 cursor-pointer flex pl-5 py-2 
                    text-gray-700 items-center rounded-lg'
                    }}">
                        <i class="fas fa-book text-2xl mr-3"></i>
                        Story
                    </li>
                    <li onclick="loadCategoryAd('reply',this)" class="{{ $path[2] == 'reply' ?
                    'activeBorder bg-gray-300 w-full border-sold border-blue-500 font-bold 
                    my-1 hover:bg-gray-200 border-l-4 cursor-pointer flex pl-5 py-2 text-gray-700 
                    items-center rounded-lg' :
                    'w-full border-sold border-white 
                    font-bold my-1 hover:bg-gray-200 border-l-4 cursor-pointer flex pl-5 py-2 
                    text-gray-700 items-center rounded-lg'
                    }}">
                        <i class="fas fa-comment-dots text-2xl mr-3"></i>
                        Phản hồi
                    </li>
                    <li onclick="loadCategoryAd('category',this)" class="{{ $path[2] == 'category' ?
                    'activeBorder bg-gray-300 w-full border-sold border-blue-500 font-bold 
                    my-1 hover:bg-gray-200 border-l-4 cursor-pointer flex pl-5 py-2 text-gray-700 
                    items-center rounded-lg' :
                    'w-full border-sold border-white 
                    font-bold my-1 hover:bg-gray-200 border-l-4 cursor-pointer flex pl-5 py-2 
                    text-gray-700 items-center rounded-lg'
                    }}">
                        <i class="far fa-list-alt text-2xl mr-3"></i>
                        Danh mục
                    </li>
                    <li class="w-full border-sold border-white font-bold justify-center 
                    border-l-4 cursor-pointer flex py-2 text-white items-center">
                        <button class="w-10/12 p-2.5 rounded-lg bg-blue-500 font-bold flex justify-center 
                        items-center">
                            <i class="far fa-hand-point-up text-white text-2xl mr-3"></i> Cập nhật phiên bản
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        <div class="w-4/5 h-screen" id="rightIndex">
            <div class="w-full flex">
                <div class="w-1/4 text-center">
                    <div class="w-10/12 mx-auto relative">
                        <input type="text" class="my-4 items-center rounded-3xl py-2 px-4 bg-gray-200 
                        w-full " placeholder="Tìm kiếm..." />
                        <i class='bx bx-search absolute right-3 text-gray-600 top-1/3 text-xl'></i>
                    </div>
                </div>
                <div class="w-2/4"></div>
                <div class="w-1/4 relative">
                    <ul class="flex justify-end mr-8">
                        <li class="p-2 flex items-center"><i class="far fa-envelope text-2xl"></i></li>
                        <li class="p-2 flex items-center"><i class='bx bx-bell text-2xl'></i></li>
                        <li class="p-2 flex items-center">
                            <div class="w-full flex relative p-2 cursor-pointer">
                                <div class="text-right mr-2 cursor-pointer">
                                    <img src="/img/avatar.png" class="w-9 h-9 rounded-full" alt="">
                                </div>
                                <div class="flex items-center">
                                    <p class="font-bold text-sm">Trà Tấn Hưởng</p>
                                </div>
                                <i onclick="openModalAd('profileAdmin')" class="fas fa-caret-down absolute top-1/3 -right-3 cursor-pointer"></i>
                            </div>
                        </li>
                    </ul>
                    <div id="profileAdmin" class=" absolute w-full p-3 shadow-lg border-t-2 border-sold
                     border-gray-300 hidden z-10 bg-white">
                        <div class="w-full flex pb-2">
                            <div class="">
                                <img src="/img/avatar.png" class="w-16 h-16 rounded-lg" alt="">
                            </div>
                            <div class="ml-3">
                                <p>Trà Tấn Hưởng</p>
                                <p class="text-sm text-gray-600">tratanhuong01@gmail.com</p>
                                <a href="" class="text-blue-500 text-sm">Xem thông tin</a>
                            </div>
                        </div>
                        <hr>
                        <ul class="w-full">
                            <li class="w-full p-2">Cài đặt</li>
                            <li class="w-full p-2">
                                <a href="{{ url('admin/logout') }}">Đăng Xuất</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="w-full p-5 bg-gray-100 overflow-y-auto 
            wrapper-content-right" style="height: 685px;max-height: 685px;" id="content">
                @switch($path[2])
                @case('user')
                @include('Admin/Component/Category/User',
                [
                'userTable' => $table,
                'data' => $data
                ])
                @break
                @case('post')
                @include('Admin/Component/Category/Post',
                [
                'userPost' => $table,
                'data' => $data
                ])
                @break
                @case('story')
                @include('Admin/Component/Category/Story',
                [
                'userStory' => $table,
                'data' => $data
                ])
                @break
                @case('reply')
                @include('Admin/Component/Category/Reply',
                [
                'userReply' => $table,
                'data' => $data
                ])
                @break
                @case('category')
                @include('Admin/Component/Category/Category')
                @break
                @default
                @include('Admin/Component/Category/Dashboard')
                @endswitch
            </div>
        </div>
    </div>
    <!-- place show modal -->
    <div class="w-full bg-gray-500 top-0 left-0 z-50 bg-opacity-50" id="second"></div>
    <!-- place show modal -->

    <!-- timeline -->
    @include('TimeLine/DivMainTimeLine')
    <!-- timeline -->
</body>
<script>
</script>

</html>