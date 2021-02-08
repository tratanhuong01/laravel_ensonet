<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @if (sizeof($users) == 0) 
            {{'Ensonet'}}
        @else 
            {{$users[0]->Ho . ' ' . $users[0]->Ten . ' | Ensonet'}}
        @endif
    </title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/tailwind_second.css">
    <script src="js/ajax.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        * {
            font-family: 'Lato', sans-serif;
        }
    </style>
</head>
<body>
<?php $user = Session::get('user'); ?>
    <div class="w-full" id="main">
        @include('Header');
        @if (sizeof($users) == 0) 
            @include('Component\NotFindAcc');
        @else
        @if ($user[0]->IDTaiKhoan == $users[0]->IDTaiKhoan) 
        <form action="action">
            <div class="w-full relative">
                <div class="mx-auto relative" style="width: 63%;">
                    <div class="w-full relative h-96">
                        <a href=""><img class="w-full h-96 object-cover" style="border-radius: 10px;"
                                src="/{{ $users[0]->AnhBia}}" alt=""></a>
                    </div>
                    <div class="p-2.5 bg-gray-100 absolute" style="border-radius: 10px;top: 85%;right: 2%;">
                        <input onchange="changeBia(event)" name="fileBia" type="file" accept="image" id="changeB"
                            style="display: none">
                        <label for="changeB"><i class="fas fa-camera"></i>&nbsp;&nbsp;Chỉnh sửa ảnh bìa</label>
                    </div>
                    <div class="w-1/5 absolute text-center" style="top: 60%;left: 40%;">
                        <a href=""><img class="w-44 h-44 rounded-full mx-auto
                            border-4 border-solid border-white object-cover" src="/{{ $users[0]->AnhDaiDien}}" alt=""></a>
                        <p class="font-bold text-3xl py-2" style="font-family: system-ui;">{{ $users[0]->Ho . ' ' . $users[0]->Ten}}</p>
                    </div>
                    <div class="text-2xl absolute bg-gray-100 rounded-full"
                        style="top: 95%;left: 54%;padding: 2px 6px;">
                        <input onchange="changeAvatar(event)" name="files" type="file" accept="image" id="changeavt"
                            style="display: none">
                        <label for="changeavt"><i class="fas fa-camera"></i></label>
                    </div>
                </div>
            </div>
        </form>
        <div class="w-full relative">
            <div class="mx-auto text-center" style="width: 63%;margin-top: 68px;">
                <span class="outline-none">{{ $users[0]->MoTa}}</span>
                <br>
                <div class="w-full pt-2">
                    <a style="color: #1876F2;font-size: 18px;" href="">Chỉnh sửa</a>
                </div>
                <br>
                <hr>
            </div>
        </div>
        @else
        <form action="action">
            <div class="w-full relative">
                <div class="mx-auto relative" style="width: 63%;">
                    <div class="w-full relative h-96">
                        <a href=""><img class="w-full h-96 object-cover" style="border-radius: 10px;"
                                src="/{{ $users[0]->AnhBia}}" alt=""></a>
                    </div>
                    
                    <div class="w-1/5 absolute text-center" style="top: 60%;left: 40%;">
                        <a href=""><img class="w-44 h-44 rounded-full mx-auto
                            border-4 border-solid border-white object-cover" src="/{{ $users[0]->AnhDaiDien}}" alt=""></a>
                        <p class="font-bold text-3xl py-2" style="font-family: system-ui;">{{ $users[0]->Ho . ' ' . $users[0]->Ten}}</p>
                    </div>
                    
                </div>
            </div>
        </form>
        <div class="w-full relative">
            <div class="mx-auto text-center" style="width: 63%;margin-top: 68px;">
                <span class="outline-none">{{ $users[0]->MoTa}}</span>
                <br>
                <hr>
            </div>
        </div>
        @endif
        <hr class="w-7/12 mx-auto mb-2">
        <?php $data = DB::table('moiquanhe')->where('IDTaiKhoan','=',$user[0]->IDTaiKhoan)
                                                ->where('IDBanBe','=',$users[0]->IDTaiKhoan)->get(); ?>
        <div class="w-full relative py-2" id="moiQuanHe">
           
                @if ($user[0]->IDTaiKhoan == $users[0]->IDTaiKhoan)
                    @include('Component/MoiQuanHe/ChinhChu')
                @elseif (sizeof($data) == 0) 
                    @include('Component/MoiQuanHe/ChuaKetBan')
                @elseif ($data[0]->TinhTrang == 0) 
                    @include('Component/MoiQuanHe/ChuaKetBan')
                @elseif ($data[0]->TinhTrang == 1) 
                    @include('Component/MoiQuanHe/GuiYeuCau')
                @elseif ($data[0]->TinhTrang == 2) 
                    @include('Component/MoiQuanHe/NhanYeuCau')
                @elseif ($data[0]->TinhTrang == 3) 
                    @include('Component/MoiQuanHe/BanBe')
                @endif
        </div>
        <div class="w-full relative bg-gray-100">
            <div class="mx-auto relative flex" style="width: 63%;">
                <div class="w-2/5">
                    <div class="w-full mx-2.5 my-5 bg-white p-2.5" style="border-radius: 10px;">
                        <p class="font-bold text-xl py-2" style="font-family: system-ui;">Giới thiệu</p>
                        <ul class="w-full ">
                            <li class="w-full pb-3" style="font-size: 15px;"><i
                                    class="fas fa-briefcase text-gray-600 text-xl"></i>&nbsp;&nbsp;&nbsp;
                                Làm việc tại <b>FacebookApp
                                </b>
                            </li>
                            <li class="w-full pb-3" style="font-size: 15px;"><i
                                    class="fas fa-graduation-cap text-gray-600 text-xl"></i>&nbsp;
                                Học tại <b>Trường Cao Đẳng Công Nghệ Thông Tin
                                    - Đại Học Đà Nẵng
                                </b>
                            </li>
                            <li class="w-full pb-3" style="font-size: 15px;"><i
                                    class="fas fa-home text-gray-600 text-xl"></i>&nbsp;&nbsp;&nbsp;
                                Sống tại <b>Đà Nẵng</b>
                            </li>
                            <li class="w-full pb-3" style="font-size: 15px;">
                                &nbsp;<i class="fas fa-map-marker-alt text-gray-600 text-xl"></i>&nbsp;&nbsp;
                                Đến từ <b>Quảng Nam</b>
                            </li>
                            <li class="w-full pb-3" style="font-size: 15px;"><i
                                    class="fas fa-heart text-gray-600 text-xl"></i></i>&nbsp;&nbsp;
                                Độc Thân
                            </li>
                            <li class="w-full pb-3" style="font-size: 15px;"><i
                                    class="fas fa-clock text-gray-600 text-xl"></i>&nbsp;&nbsp;
                                Đã tham gia vào Tháng 4 năm 2014
                            </li>
                            <li class="w-full pb-3 flex" style="font-size: 15px;">
                                <img class="w-5 h-5 mt-0.5" src="img/follow.png" alt="">&nbsp;&nbsp;
                                <span>Có &nbsp;<b>1.324</b>&nbsp; người theo dõi</span>
                            </li>
                        </ul>
                    </div>
                    <div class="pl-2.5 bg-white m-2.5" style="width: 95%;border-radius: 10px;">
                        <div class="w-full flex">
                            <div class="w-full mt-2.5 mr-2.5">
                                <b>Ảnh</b><br>
                            </div>
                            <div class="w-full text-right mt-2.5 mr-2.5">
                                <a href=""><b style="color: #1876F2;">Xem tất cả</b></a>
                            </div>
                        </div>
                        <div class="w-full pt-4 flex flex-wrap">
                            <div class="fr-us">
                                <div>
                                    <a href=""><img style="border-radius: 0;"
                                            src="img/avatarImage/10000000021000000010.jpg" alt=""></a>
                                </div>
                            </div>
                            <div class="fr-us">
                                <div>
                                    <a href=""><img style="border-radius: 0;"
                                            src="img/avatarImage/10000000021000000011.jpg" alt=""></a>
                                </div>
                            </div>
                            <div class="fr-us">
                                <div>
                                    <a href=""><img style="border-radius: 0;"
                                            src="img/avatarImage/10000000021000000009.jpg" alt=""></a>
                                </div>
                            </div>
                            <div class="fr-us">
                                <div>
                                    <a href=""><img style="border-radius: 0;"
                                            src="img/avatarImage/10000000021000000008.jpg" alt=""></a>
                                </div>
                            </div>
                            <div class="fr-us">
                                <div>
                                    <a href=""><img style="border-radius: 0;"
                                            src="img/avatarImage/10000000021000000007.jpg" alt=""></a>
                                </div>
                            </div>
                            <div class="fr-us">
                                <div>
                                    <a href=""><img style="border-radius: 0;"
                                            src="img/avatarImage/10000000021000000006.jpg" alt=""></a>
                                </div>
                            </div>
                            <div class="fr-us">
                                <div>
                                    <a href=""><img style="border-radius: 0;"
                                            src="img/avatarImage/10000000021000000005.jpg" alt=""></a>
                                </div>
                            </div>
                            <div class="fr-us">
                                <div>
                                    <a href=""><img style="border-radius: 0;"
                                            src="img/avatarImage/10000000021000000004.jpg" alt=""></a>
                                </div>
                            </div>
                            <div class="fr-us">
                                <div>
                                    <a href=""><img style="border-radius: 0;"
                                            src="img/avatarImage/10000000021000000003.jpg" alt=""></a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="pl-2.5 bg-white m-2.5" style="width: 95%;border-radius: 10px;">
                        <div class="w-full flex">
                            <div class="w-1/2">
                                <b>Bạn bè</b><br>
                                <span class="color-word">1.802 người bạn</span>
                            </div>
                            <div class="w-1/2 mt-2.5 mr-2.5 text-right">
                                <a href=""><b style="color: #1876F2;">Xem tất cả</b></a>
                            </div>
                        </div>
                        <div class="w-full pt-4 flex flex-wrap">
                            <div class="fr-us">
                                <div>
                                    <a href=""><img src="img/avatar.jpg" alt=""></a>
                                </div>
                                <div>
                                    <p class="font-bold py-2" style="font-size: 14px;"><a href="">Trà Hưởng</a></p>
                                </div>
                            </div>
                            <div class="fr-us">
                                <div>
                                    <a href=""><img src="img/avatar.jpg" alt=""></a>
                                </div>
                                <div>
                                    <p class="font-bold py-2" style="font-size: 14px;"><a href="">Trà Hưởng</a></p>
                                </div>
                            </div>
                            <div class="fr-us">
                                <div>
                                    <a href=""><img src="img/avatar.jpg" alt=""></a>
                                </div>
                                <div>
                                    <p class="font-bold py-2" style="font-size: 14px;"><a href="">Trà Hưởng</a></p>
                                </div>
                            </div>
                            <div class="fr-us">
                                <div>
                                    <a href=""><img src="img/avatar.jpg" alt=""></a>
                                </div>
                                <div>
                                    <p class="font-bold py-2" style="font-size: 14px;"><a href="">Trà Hưởng</a></p>
                                </div>
                            </div>
                            <div class="fr-us">
                                <div>
                                    <a href=""><img src="img/avatar.jpg" alt=""></a>
                                </div>
                                <div>
                                    <p class="font-bold py-2" style="font-size: 14px;"><a href="">Trà Hưởng</a></p>
                                </div>
                            </div>
                            <div class="fr-us">
                                <div>
                                    <a href=""><img src="img/avatar.jpg" alt=""></a>
                                </div>
                                <div>
                                    <p class="font-bold py-2" style="font-size: 14px;"><a href="">Trà Hưởng</a></p>
                                </div>
                            </div>
                            <div class="fr-us">
                                <div>
                                    <a href=""><img src="img/avatar.jpg" alt=""></a>
                                </div>
                                <div>
                                    <p class="font-bold py-2" style="font-size: 14px;"><a href="">Trà Hưởng</a></p>
                                </div>
                            </div>
                            <div class="fr-us">
                                <div>
                                    <a href=""><img src="img/avatar.jpg" alt=""></a>
                                </div>
                                <div>
                                    <p class="font-bold py-2" style="font-size: 14px;"><a href="">Trà Hưởng</a></p>
                                </div>
                            </div>
                            <div class="fr-us">
                                <div>
                                    <a href=""><img src="img/avatar.jpg" alt=""></a>
                                </div>
                                <div>
                                    <p class="font-bold py-2" style="font-size: 14px;"><a href="">Trà Hưởng</a></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="w-3/5 bg-white mx-auto my-4" style="border-radius: 20px;">
                    <div class="bg-white m-auto mx-4" style="width: 98%;border-radius: 20px;">
                        <div class="w-full flex p-2">
                            <div class="w-1/12 mr-3 pt-1">
                                <a href=""><img class="w-full rounded-full h-12" src="img/avatar.jpg"></a>
                            </div>
                            <div class="w-11/12">
                                <input class="w-11/12 p-3 border-none outline-none"
                                    style="border-radius: 40px;background-color: #E4E6E9;" onclick="openPost()"
                                    type="text" placeholder="Hưởng ơi, Bạn Đang Nghĩ Gì Thế?">
                            </div>
                        </div>
                        <hr>
                        <div class="post-state-bottom">
                            <ul>
                                <li><i style="color: #E42645;font-size: 18px;" class="fas fa-video"></i> <b>Video Trực
                                        Tiếp</b></li>
                                <li><i style="color: #41B35D;font-size: 18px;" class="far fa-image"></i> <b>Ảnh /
                                        Video</b>
                                </li>
                                <li><i style="color: #F7B928;font-size: 18px;" class="fas fa-smile"></i> <b>Cảm Xúc /
                                        Hoạt
                                        Động</b></li>
                            </ul>
                        </div>
                    </div>
                    <div class="w-full bg-white py-4 px-2" style="border-radius: 20px;">
                        <div class="w-full flex">
                            <div class="" style="width: 10%;">
                                <a href=""><img class="w-12 h-12 rounded-full 
                                    border-4 border-solid border-blue" src="img/avatar.jpg"></a>
                            </div>
                            <div class="relative pl-1" style="width: 80%;">
                                <p class="mb-2"><a href=""><b>Trà Hưởng</b>
                                        &nbsp;đã cập nhật ảnh đại diện của anh ấy.</a></p>
                                <div class="w-full flex">
                                    <div class=" text-xs pr-2"><a href=""><b>Vừa xong</b></a></div>
                                    <div class="relative">
                                        <i class="fas fa-globe-europe absolute top-0.5"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center" style="width: 10%;">
                                <i class="pt-2 text-xl" class="fas fa-ellipsis-h"></i>
                            </div>
                        </div>
                        <div class="w-full mx-0 my-2.5">
                            <p>Phê 😂😂</p>
                        </div>
                        <div class="w-full mx-0 my-4">
                            <img src="img/avatar.jpg" alt="">
                        </div>
                        <div class="friends-post-feel w-full my-4 mx-0">
                            <div class="w-full flex">
                                <div class="w-full flex pl-0.5 py-1">
                                    <i style="color: red;" class="fas fa-heart text-xl cursor-pointer"></i>
                                    <strong>&nbsp;<span style="font-size: 15px;" class="cursor-pointer color-word">
                                            Hưởng MMO và 123 người khác</span></strong>
                                </div>
                                <div class="w-full text-right pr-2 py-1">
                                    <strong class="cursor-pointer color-word">&nbsp;12&nbsp;bình luận</strong>
                                </div>
                            </div>
                            <ul class="w-full flex " style="border-top: 1px solid #ccc;border-bottom: 1px solid #ccc;">
                                <li><i class="fas fa-heart"></i> &nbsp; Tym</li>
                                <li><i class="far fa-comment-alt"></i> &nbsp; Bình Luận</li>
                                <li><i class="fas fa-share"></i> &nbsp; Chia sẻ</li>
                            </ul>
                        </div>
                        <div class="w-full mx-0 my-2 flex">
                            <div class="w-1/12 pt-2">
                                <a href=""><img class="w-12 h-12 p-0.5 rounded-full" src="img/avatar.jpg" alt=""
                                        srcset=""></a>
                            </div>
                            <div class="w-11/12 ml-2">
                                <div class="comment-per w-max p-2 bg-gray-100 relative"
                                    style="border-radius: 10px;max-width: 91%;">
                                    <p><a href="" class="font-bold">Hưởng Tea</a></p>
                                    <p style="font-size: 15px;clear: both;">
                                        😂😂😂😂😂😂😂😂😂😂😂😂😂😂
                                    </p>
                                    <span
                                        class="tym-comment bg-white color-word px-2 py-1 absolute right-4 -bottom-6 cursor-pointer"
                                        style="border-radius: 20px;">
                                        <i class="fas fa-heart text-xm cursor-pointer pt-0.5" style="color: red;">
                                        </i>&nbsp;&nbsp;<b style="font-size: 14px;">2</b>
                                    </span>
                                </div>
                                <ul class="flex pl-2">
                                    <li class="font-bold text-sm py-1 pr-2 cursor-pointer">Tym</li>
                                    <li class="font-bold text-sm py-1 pr-2 cursor-pointer">Trả lời</li>
                                    <li class="py-1 pr-2 cursor-pointer" style="font-size: 12px;">1 ngày</li>
                                </ul>
                                <p style="font-size: 15px;display: none;"
                                    class="color-word font-bold cursor-pointer pl-2"><i style="color: #65676B;"
                                        class="fas fa-angle-double-down"></i>&nbsp;&nbsp;
                                    Xem 19 bình luận
                                </p>
                                <p style="font-size: 15px;display: none;"
                                    class="color-word font-bold cursor-pointer pl-2"><i style="color: #65676B;"
                                        class="fas fa-angle-double-up"></i>&nbsp;&nbsp;
                                    Thu gọn
                                </p>
                                <div class="w-full py-2">
                                    <div class="w-full">
                                        <div class="w-full my-2 flex">
                                            <div class="w-1/12">
                                                <a href=""><img
                                                        class="w-10 h-10 mt-2 rounded-full border-2 border-solid"
                                                        src="img/avatar.jpg" alt="" srcset=""></a>
                                            </div>
                                            <div class="comment-per w-max p-2 bg-gray-100 relative"
                                                style="border-radius: 10px;max-width: 91%;">
                                                <p><a href="" class="font-bold">Hưởng Tea</a></p>
                                                <p style="font-size: 15px;clear: both;">
                                                    😂😂😂😂😂😂😂😂😂😂😂😂😂😂
                                                </p>
                                                <span
                                                    class="tym-comment bg-white color-word px-2 py-1 absolute right-4 -bottom-6 cursor-pointer"
                                                    style="border-radius: 20px;">
                                                    <i class="fas fa-heart text-xm cursor-pointer pt-0.5"
                                                        style="color: red;">
                                                    </i>&nbsp;&nbsp;<b style="font-size: 14px;">1</b>
                                                </span>
                                            </div>
                                        </div>
                                        <ul class="flex pl-2">
                                            <li class="font-bold text-sm py-1 pr-2 cursor-pointer">Tym</li>
                                            <li class="font-bold text-sm py-1 pr-2 cursor-pointer">Trả lời</li>
                                            <li class="py-1 pr-2 cursor-pointer" style="font-size: 12px;">1 ngày</li>
                                        </ul>
                                        <div class="w-full my-2 flex">
                                            <div class="w-1/12">
                                                <a href=""><img class="w-10 h-10 rounded-full border-2 border-solid"
                                                        src="img/avatar.jpg" alt="" srcset=""></a>
                                            </div>
                                            <div class="w-11/12 relative bg-gray-100 px-3 overflow-hidden"
                                                style="border-radius: 30px;">
                                                <div class="border-none outline-none bg-gray-100 py-3"
                                                    style="min-height: 30px;width: 98%;" contenteditable>
                                                    Viết bình luận....
                                                </div>
                                                <ul class="flex absolute bottom-0 right-0">
                                                    <li class="py-2 pr-3 cursor-pointer"><i
                                                            class="color-word far fa-smile"></i></li>
                                                    <li class="py-2 pr-3 cursor-pointer"><i
                                                            class="color-word fas fa-camera"></i></li>
                                                    <li class="py-2 pr-3 cursor-pointer"><i
                                                            class="color-word fas fa-radiation"></i></li>
                                                    <li class="py-2 pr-3 cursor-pointer"><i
                                                            class="color-word far fa-sticky-note"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mx-0 my-2 flex">
                            <div class="w-1/12">
                                <a href=""><img class="w-12 h-12 p-0.5 rounded-full border-2 border-solid"
                                        src="img/avatar.jpg" alt="" srcset=""></a>
                            </div>
                            <div class="w-11/12 ml-2 relative bg-gray-100 px-3 overflow-hidden"
                                style="border-radius: 30px;">
                                <div class="border-none outline-none bg-gray-100 py-3"
                                    style="min-height: 30px;width: 96%;" contenteditable>
                                    Viết bình luận....
                                </div>
                                <ul class="flex absolute bottom-0 right-0">
                                    <li class="py-2 pr-3 cursor-pointer"><i class="color-word far fa-smile"></i></li>
                                    <li class="py-2 pr-3 cursor-pointer"><i class="color-word fas fa-camera"></i></li>
                                    <li class="py-2 pr-3 cursor-pointer"><i class="color-word fas fa-radiation"></i>
                                    </li>
                                    <li class="py-2 pr-3 cursor-pointer"><i class="color-word far fa-sticky-note"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="w-full bg-white py-4 px-2" style="border-radius: 20px;">
                        <div class="w-full flex">
                            <div class="" style="width: 10%;">
                                <a href=""><img class="w-12 h-12 rounded-full 
                                    border-4 border-solid border-blue" src="img/avatar.jpg"></a>
                            </div>
                            <div class="relative pl-1" style="width: 80%;">
                                <p class="mb-2"><a href=""><b>Trà Hưởng</b>
                                        &nbsp;đã cập nhật ảnh đại diện của anh ấy.</a></p>
                                <div class="w-full flex">
                                    <div class=" text-xs pr-2"><a href=""><b>Vừa xong</b></a></div>
                                    <div class="relative">
                                        <i class="fas fa-globe-europe absolute top-0.5"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center" style="width: 10%;">
                                <i class="pt-2 text-xl" class="fas fa-ellipsis-h"></i>
                            </div>
                        </div>
                        <div class="w-full mx-0 my-2.5">
                            <p>Phê 😂😂</p>
                        </div>
                        <div class="w-full mx-0 my-4">
                            <img src="img/avatar.jpg" alt="">
                        </div>
                        <div class="w-full mx-0 my-4">
                            <div class="w-11/12 flex p-4 mb-4 ml-4 bg-white" style="border: 1px solid #ccc;">
                                <div class="" style="width: 10%;">
                                    <a href=""><img class="w-12 h-12 rounded-full 
                                        border-4 border-solid border-blue" src="img/avatar.jpg"></a>
                                </div>
                                <div class="relative pl-1" style="width: 80%;">
                                    <p class="mb-2"><a href=""><b>Trà Hưởng</b>
                                            &nbsp;đã cập nhật ảnh đại diện của anh ấy.</a></p>
                                    <div class="w-full flex">
                                        <div class=" text-xs pr-2"><a href=""><b>Vừa xong</b></a></div>
                                        <div class="relative">
                                            <i class="fas fa-globe-europe absolute top-0.5"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center" style="width: 10%;">
                                    <i class="pt-2 text-xl" class="fas fa-ellipsis-h"></i>
                                </div>
                            </div>
                        </div>
                        <div class="friends-post-feel w-full my-4 mx-0">
                            <div class="w-full flex">
                                <div class="w-full flex pl-0.5 py-1">
                                    <i style="color: red;" class="fas fa-heart text-xl cursor-pointer"></i>
                                    <strong>&nbsp;<span style="font-size: 15px;" class="cursor-pointer color-word">
                                            Hưởng MMO và 123 người khác</span></strong>
                                </div>
                                <div class="w-full text-right pr-2 py-1">
                                    <strong class="cursor-pointer color-word">&nbsp;12&nbsp;bình luận</strong>
                                </div>
                            </div>
                            <ul class="w-full flex " style="border-top: 1px solid #ccc;border-bottom: 1px solid #ccc;">
                                <li><i class="fas fa-heart"></i> &nbsp; Tym</li>
                                <li><i class="far fa-comment-alt"></i> &nbsp; Bình Luận</li>
                                <li><i class="fas fa-share"></i> &nbsp; Chia sẻ</li>
                            </ul>
                        </div>
                        <div class="w-full mx-0 my-2 flex">
                            <div class="w-1/12 pt-2">
                                <a href=""><img class="w-12 h-12 p-0.5 rounded-full" src="img/avatar.jpg" alt=""
                                        srcset=""></a>
                            </div>
                            <div class="w-11/12 ml-2">
                                <div class="comment-per w-max p-2 bg-gray-100 relative"
                                    style="border-radius: 10px;max-width: 91%;">
                                    <p><a href="" class="font-bold">Hưởng Tea</a></p>
                                    <p style="font-size: 15px;clear: both;">
                                        😂😂😂😂😂😂😂😂😂😂😂😂😂😂
                                    </p>
                                    <span
                                        class="tym-comment bg-white color-word px-2 py-1 absolute right-4 -bottom-6 cursor-pointer"
                                        style="border-radius: 20px;">
                                        <i class="fas fa-heart text-xm cursor-pointer pt-0.5" style="color: red;">
                                        </i>&nbsp;&nbsp;<b style="font-size: 14px;">2</b>
                                    </span>
                                </div>
                                <ul class="flex pl-2">
                                    <li class="font-bold text-sm py-1 pr-2 cursor-pointer">Tym</li>
                                    <li class="font-bold text-sm py-1 pr-2 cursor-pointer">Trả lời</li>
                                    <li class="py-1 pr-2 cursor-pointer" style="font-size: 12px;">1 ngày</li>
                                </ul>
                                <p style="font-size: 15px;display: none;"
                                    class="color-word font-bold cursor-pointer pl-2"><i style="color: #65676B;"
                                        class="fas fa-angle-double-down"></i>&nbsp;&nbsp;
                                    Xem 19 bình luận
                                </p>
                                <p style="font-size: 15px;display: none;"
                                    class="color-word font-bold cursor-pointer pl-2"><i style="color: #65676B;"
                                        class="fas fa-angle-double-up"></i>&nbsp;&nbsp;
                                    Thu gọn
                                </p>
                                <div class="w-full py-2">
                                    <div class="w-full">
                                        <div class="w-full my-2 flex">
                                            <div class="w-1/12">
                                                <a href=""><img
                                                        class="w-10 h-10 mt-2 rounded-full border-2 border-solid"
                                                        src="img/avatar.jpg" alt="" srcset=""></a>
                                            </div>
                                            <div class="comment-per w-max p-2 bg-gray-100 relative"
                                                style="border-radius: 10px;max-width: 91%;">
                                                <p><a href="" class="font-bold">Hưởng Tea</a></p>
                                                <p style="font-size: 15px;clear: both;">
                                                    😂😂😂😂😂😂😂😂😂😂😂😂😂😂
                                                </p>
                                                <span
                                                    class="tym-comment bg-white color-word px-2 py-1 absolute right-4 -bottom-6 cursor-pointer"
                                                    style="border-radius: 20px;">
                                                    <i class="fas fa-heart text-xm cursor-pointer pt-0.5"
                                                        style="color: red;">
                                                    </i>&nbsp;&nbsp;<b style="font-size: 14px;">1</b>
                                                </span>
                                            </div>
                                        </div>
                                        <ul class="flex pl-2">
                                            <li class="font-bold text-sm py-1 pr-2 cursor-pointer">Tym</li>
                                            <li class="font-bold text-sm py-1 pr-2 cursor-pointer">Trả lời</li>
                                            <li class="py-1 pr-2 cursor-pointer" style="font-size: 12px;">1 ngày</li>
                                        </ul>
                                        <div class="w-full my-2 flex">
                                            <div class="w-1/12">
                                                <a href=""><img class="w-10 h-10 rounded-full border-2 border-solid"
                                                        src="img/avatar.jpg" alt="" srcset=""></a>
                                            </div>
                                            <div class="w-11/12 relative bg-gray-100 px-3 overflow-hidden"
                                                style="border-radius: 30px;">
                                                <div class="border-none outline-none bg-gray-100 py-3"
                                                    style="min-height: 30px;width: 98%;" contenteditable>
                                                    Viết bình luận....
                                                </div>
                                                <ul class="flex absolute bottom-0 right-0">
                                                    <li class="py-2 pr-3 cursor-pointer"><i
                                                            class="color-word far fa-smile"></i></li>
                                                    <li class="py-2 pr-3 cursor-pointer"><i
                                                            class="color-word fas fa-camera"></i></li>
                                                    <li class="py-2 pr-3 cursor-pointer"><i
                                                            class="color-word fas fa-radiation"></i></li>
                                                    <li class="py-2 pr-3 cursor-pointer"><i
                                                            class="color-word far fa-sticky-note"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mx-0 my-2 flex">
                            <div class="w-1/12">
                                <a href=""><img class="w-12 h-12 p-0.5 rounded-full border-2 border-solid"
                                        src="img/avatar.jpg" alt="" srcset=""></a>
                            </div>
                            <div class="w-11/12 ml-2 relative bg-gray-100 px-3 overflow-hidden"
                                style="border-radius: 30px;">
                                <div class="border-none outline-none bg-gray-100 py-3"
                                    style="min-height: 30px;width: 96%;" contenteditable>
                                    Viết bình luận....
                                </div>
                                <ul class="flex absolute bottom-0 right-0">
                                    <li class="py-2 pr-3 cursor-pointer"><i class="color-word far fa-smile"></i></li>
                                    <li class="py-2 pr-3 cursor-pointer"><i class="color-word fas fa-camera"></i></li>
                                    <li class="py-2 pr-3 cursor-pointer"><i class="color-word fas fa-radiation"></i>
                                    </li>
                                    <li class="py-2 pr-3 cursor-pointer"><i class="color-word far fa-sticky-note"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="w-full bg-white py-4 px-2" style="border-radius: 20px;">
                        <div class="w-full flex">
                            <div class="" style="width: 10%;">
                                <a href=""><img class="w-12 h-12 rounded-full 
                                    border-4 border-solid border-blue" src="img/avatar.jpg"></a>
                            </div>
                            <div class="relative pl-1" style="width: 80%;">
                                <p class="mb-2"><a href=""><b>Trà Hưởng</b>
                                        &nbsp;đã cập nhật ảnh đại diện của anh ấy.</a></p>
                                <div class="w-full flex">
                                    <div class=" text-xs pr-2"><a href=""><b>Vừa xong</b></a></div>
                                    <div class="relative">
                                        <i class="fas fa-globe-europe absolute top-0.5"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center" style="width: 10%;">
                                <i class="pt-2 text-xl" class="fas fa-ellipsis-h"></i>
                            </div>
                        </div>
                        <div class="w-full mx-0 my-2.5">
                            <p>Phê 😂😂</p>
                        </div>
                        <div class="w-full mx-0 my-2.5">
                            <div class="w-full relative" style="height: 450px;">
                                <img class="w-full h-60 object-cover" src="img/anhbia.jpg" alt="">
                                <img class="w-96 h-96 absolute rounded-full border-4 border-solid border-white"
                                    style="top: 5%;left: 15%;" src="img/avatar.jpg" alt="">
                            </div>
                        </div>
                        <div class="friends-post-feel w-full my-4 mx-0">
                            <div class="w-full flex">
                                <div class="w-full flex pl-0.5 py-1">
                                    <i style="color: red;" class="fas fa-heart text-xl cursor-pointer"></i>
                                    <strong>&nbsp;<span style="font-size: 15px;" class="cursor-pointer color-word">
                                            Hưởng MMO và 123 người khác</span></strong>
                                </div>
                                <div class="w-full text-right pr-2 py-1">
                                    <strong class="cursor-pointer color-word">&nbsp;12&nbsp;bình luận</strong>
                                </div>
                            </div>
                            <ul class="w-full flex " style="border-top: 1px solid #ccc;border-bottom: 1px solid #ccc;">
                                <li><i class="fas fa-heart"></i> &nbsp; Tym</li>
                                <li><i class="far fa-comment-alt"></i> &nbsp; Bình Luận</li>
                                <li><i class="fas fa-share"></i> &nbsp; Chia sẻ</li>
                            </ul>
                        </div>
                        <div class="w-full mx-0 my-2 flex">
                            <div class="w-1/12 pt-2">
                                <a href=""><img class="w-12 h-12 p-0.5 rounded-full" src="img/avatar.jpg" alt=""
                                        srcset=""></a>
                            </div>
                            <div class="w-11/12 ml-2">
                                <div class="comment-per w-max p-2 bg-gray-100 relative"
                                    style="border-radius: 10px;max-width: 91%;">
                                    <p><a href="" class="font-bold">Hưởng Tea</a></p>
                                    <p style="font-size: 15px;clear: both;">
                                        😂😂😂😂😂😂😂😂😂😂😂😂😂😂
                                    </p>
                                    <span
                                        class="tym-comment bg-white color-word px-2 py-1 absolute right-4 -bottom-6 cursor-pointer"
                                        style="border-radius: 20px;">
                                        <i class="fas fa-heart text-xm cursor-pointer pt-0.5" style="color: red;">
                                        </i>&nbsp;&nbsp;<b style="font-size: 14px;">2</b>
                                    </span>
                                </div>
                                <ul class="flex pl-2">
                                    <li class="font-bold text-sm py-1 pr-2 cursor-pointer">Tym</li>
                                    <li class="font-bold text-sm py-1 pr-2 cursor-pointer">Trả lời</li>
                                    <li class="py-1 pr-2 cursor-pointer" style="font-size: 12px;">1 ngày</li>
                                </ul>
                                <p style="font-size: 15px;display: none;"
                                    class="color-word font-bold cursor-pointer pl-2"><i style="color: #65676B;"
                                        class="fas fa-angle-double-down"></i>&nbsp;&nbsp;
                                    Xem 19 bình luận
                                </p>
                                <p style="font-size: 15px;display: none;"
                                    class="color-word font-bold cursor-pointer pl-2"><i style="color: #65676B;"
                                        class="fas fa-angle-double-up"></i>&nbsp;&nbsp;
                                    Thu gọn
                                </p>
                                <div class="w-full py-2">
                                    <div class="w-full">
                                        <div class="w-full my-2 flex">
                                            <div class="w-1/12">
                                                <a href=""><img
                                                        class="w-10 h-10 mt-2 rounded-full border-2 border-solid"
                                                        src="img/avatar.jpg" alt="" srcset=""></a>
                                            </div>
                                            <div class="comment-per w-max p-2 bg-gray-100 relative"
                                                style="border-radius: 10px;max-width: 91%;">
                                                <p><a href="" class="font-bold">Hưởng Tea</a></p>
                                                <p style="font-size: 15px;clear: both;">
                                                    😂😂😂😂😂😂😂😂😂😂😂😂😂😂
                                                </p>
                                                <span
                                                    class="tym-comment bg-white color-word px-2 py-1 absolute right-4 -bottom-6 cursor-pointer"
                                                    style="border-radius: 20px;">
                                                    <i class="fas fa-heart text-xm cursor-pointer pt-0.5"
                                                        style="color: red;">
                                                    </i>&nbsp;&nbsp;<b style="font-size: 14px;">1</b>
                                                </span>
                                            </div>
                                        </div>
                                        <ul class="flex pl-2">
                                            <li class="font-bold text-sm py-1 pr-2 cursor-pointer">Tym</li>
                                            <li class="font-bold text-sm py-1 pr-2 cursor-pointer">Trả lời</li>
                                            <li class="py-1 pr-2 cursor-pointer" style="font-size: 12px;">1 ngày</li>
                                        </ul>
                                        <div class="w-full my-2 flex">
                                            <div class="w-1/12">
                                                <a href=""><img class="w-10 h-10 rounded-full border-2 border-solid"
                                                        src="img/avatar.jpg" alt="" srcset=""></a>
                                            </div>
                                            <div class="w-11/12 relative bg-gray-100 px-3 overflow-hidden"
                                                style="border-radius: 30px;">
                                                <div class="border-none outline-none bg-gray-100 py-3"
                                                    style="min-height: 30px;width: 98%;" contenteditable>
                                                    Viết bình luận....
                                                </div>
                                                <ul class="flex absolute bottom-0 right-0">
                                                    <li class="py-2 pr-3 cursor-pointer"><i
                                                            class="color-word far fa-smile"></i></li>
                                                    <li class="py-2 pr-3 cursor-pointer"><i
                                                            class="color-word fas fa-camera"></i></li>
                                                    <li class="py-2 pr-3 cursor-pointer"><i
                                                            class="color-word fas fa-radiation"></i></li>
                                                    <li class="py-2 pr-3 cursor-pointer"><i
                                                            class="color-word far fa-sticky-note"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mx-0 my-2 flex">
                            <div class="w-1/12">
                                <a href=""><img class="w-12 h-12 p-0.5 rounded-full border-2 border-solid"
                                        src="img/avatar.jpg" alt="" srcset=""></a>
                            </div>
                            <div class="w-11/12 ml-2 relative bg-gray-100 px-3 overflow-hidden"
                                style="border-radius: 30px;">
                                <div class="border-none outline-none bg-gray-100 py-3"
                                    style="min-height: 30px;width: 96%;" contenteditable>
                                    Viết bình luận....
                                </div>
                                <ul class="flex absolute bottom-0 right-0">
                                    <li class="py-2 pr-3 cursor-pointer"><i class="color-word far fa-smile"></i></li>
                                    <li class="py-2 pr-3 cursor-pointer"><i class="color-word fas fa-camera"></i></li>
                                    <li class="py-2 pr-3 cursor-pointer"><i class="color-word fas fa-radiation"></i>
                                    </li>
                                    <li class="py-2 pr-3 cursor-pointer"><i class="color-word far fa-sticky-note"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    <script src="js/scrollbar.js"></script>
</body>

</html>