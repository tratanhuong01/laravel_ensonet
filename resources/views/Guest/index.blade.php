<!DOCTYPE html>
<html lang="en">
<head>
    <title>Facebook</title>
    @include('Head/css')
    <script src="js/event/event.js"></script>
</head>
<body>
    @if (session()->has('user')) 
    <?php $user = Session::get('user'); ?>
    
    <div class="w-full" id="main">
        @include('Header');
        <div class="w-full flex" id="content">
            <div class="fixed pt-3" style="width: 30%;">
                <div id="wrapper-scrollbar" class="pl-1.5 w-4/6 overflow-x-hidden overflow-y-auto">
                    <div class="w-full left-category">
                        <ul>
                            <li class="flex p-2.5 font-bold cursor-pointer">
                                <img class="w-9 h-9 rounded-full" src="{{ $user[0]->AnhDaiDien }}" alt="">&nbsp;&nbsp;
                                <span class="pl-1.5 pt-1.5 font-bold">{{ $user[0]->Ho . ' ' .$user[0]->Ten }}</span>
                            </li>
                            <li class="w-full flex px-4 py-3"><img class="w-7 h-7" src="img/friends.png" alt=""
                                    srcset="">&nbsp;&nbsp;
                                <span class="pl-2.5 font-bold">Bạn Bè</span>
                            </li>
                            <li class="w-full flex px-4 py-3"><img class="w-7 h-7" src="img/memory.png" alt=""
                                    srcset="">&nbsp;&nbsp;
                                <span class="pl-2.5 font-bold">Kỉ Niệm</span>
                            </li>
                            <li class="w-full flex px-4 py-3"><img class="w-7 h-7" src="img/messager.png" alt=""
                                    srcset="">&nbsp;&nbsp;
                                <span class="pl-2.5 font-bold">Messager</span>
                            </li>
                            <li class="w-full flex px-4 py-3"><img class="w-7 h-7" src="img/groups.png" alt=""
                                    srcset="">&nbsp;&nbsp;
                                <span class="pl-2.5 font-bold">Nhóm</span>
                            </li>
                        </ul>
                    </div>
                    <br>
                    <hr style="width: 70%;">
                    <br>
                    <h4 style="margin-left: 1em;">Lối tắt của bạn</h4>
                    <br>
                    
                </div>
            </div>
            <div class="relative" style="width: 40%;left: 30%;">
                <div class="w-full flex mt-4">
                    <div onclick="window.location.href = 'createStory.html'"  class="w-1/5 p-2 relative text-center cursor-pointer">
                        <div class="w-full">
                            <img class="w-28 rounded-lg object-cover" style="height: 136px;" 
                            src="{{ $user[0]->AnhDaiDien }}" alt="">
                        </div>
                        <div class="w-full bg-white h-10">
                            <div class="w-9 h-9 rounded-full border-4 border-solid 
                            border-white absolute" style="background-color: #3A80DC;bottom: 35px;left: 42px;">
                                <i class="fas fa-plus pt-1.5 text-white"></i>
                            </div>
                            <br>
                            <p class="text-center font-bold ">Tạo Tin</p>
                        </div>
                    </div>
                    <div onclick="window.location.href = 'viewstory.html'" class="w-1/5 p-2 relative text-center cursor-pointer">
                        <div class="w-full">
                            <img class="w-full object-cover" style="height: 182px;border-radius: 10px;"
                                src="img/avatar.jpg" alt="">
                        </div>
                        <div class="w-full absolute text-left pl-2.5" style="bottom: 15px">
                            <a href=""><b class="text-white">Trà Hưởng</b></a>
                        </div>
                        <div class="w-full text-left absolute top-5 left-4">
                            <img class="w-9 h-9 rounded-full border-4 border-solid border-blue-500" src="img/avatar.jpg"
                                alt="">
                        </div>
                    </div>
                    <div class="w-1/5 p-2 relative text-center cursor-pointer">
                        <div class="w-full">
                            <img class="w-full object-cover" style="height: 182px;border-radius: 10px;"
                                src="img/avatar.jpg" alt="">
                        </div>
                        <div class="w-full absolute text-left pl-2.5" style="bottom: 15px">
                            <a href=""><b class="text-white">Trà Hưởng</b></a>
                        </div>
                        <div class="w-full text-left absolute top-5 left-4">
                            <img class="w-9 h-9 rounded-full border-4 border-solid border-blue-500" src="img/avatar.jpg"
                                alt="">
                        </div>
                    </div>
                    <div class="w-1/5 p-2 relative text-center cursor-pointer">
                        <div class="w-full">
                            <img class="w-full object-cover" style="height: 182px;border-radius: 10px;"
                                src="img/avatar.jpg" alt="">
                        </div>
                        <div class="w-full absolute text-left pl-2.5" style="bottom: 15px">
                            <a href=""><b class="text-white">Trà Hưởng</b></a>
                        </div>
                        <div class="w-full text-left absolute top-5 left-4">
                            <img class="w-9 h-9 rounded-full border-4 border-solid border-blue-500" src="img/avatar.jpg"
                                alt="">
                        </div>
                    </div>
                    <div class="w-1/5 p-2 relative text-center cursor-pointer">
                        <div class="w-full">
                            <img class="w-full object-cover" style="height: 182px;border-radius: 10px;"
                                src="img/avatar.jpg" alt="">
                        </div>
                        <div class="w-full absolute text-left pl-2.5" style="bottom: 15px">
                            <a href=""><b class="text-white">Trà Hưởng</b></a>
                        </div>
                        <div class="w-full text-left absolute top-5 left-4">
                            <img class="w-9 h-9 rounded-full border-4 border-solid border-blue-500" src="img/avatar.jpg"
                                alt="">
                        </div>
                    </div>
                </div>
                <div class="w-full bg-white m-auto mx-4" style="border-radius: 20px;">
                    <div class="w-full flex p-2.5">
                        <div class="w-1/12 mr-3 pt-1">
                            <a href=""><img class="w-full rounded-full h-12" src="img/avatar.jpg"></a>
                        </div>
                        <div class="w-11/12">
                            <input class="w-11/12 p-3 border-none outline-none"
                                style="border-radius: 40px;background-color: #E4E6E9;" onclick="openPost()" type="text"
                                placeholder="Hưởng ơi, Bạn Đang Nghĩ Gì Thế?">
                        </div>
                    </div>
                    <hr>
                    <div class="post-state-bottom">
                        <ul>
                            <li><i style="color: #E42645;font-size: 18px;" class="fas fa-video"></i> <b>Video Trực
                                    Tiếp</b></li>
                            <li><i style="color: #41B35D;font-size: 18px;" class="far fa-image"></i> <b>Ảnh / Video</b>
                            </li>
                            <li><i style="color: #F7B928;font-size: 18px;" class="fas fa-smile"></i> <b>Cảm Xúc / Hoạt
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
                            <p style="font-size: 15px;display: none;" class="color-word font-bold cursor-pointer pl-2">
                                <i style="color: #65676B;" class="fas fa-angle-double-down"></i>&nbsp;&nbsp;
                                Xem 19 bình luận
                            </p>
                            <p style="font-size: 15px;display: none;" class="color-word font-bold cursor-pointer pl-2">
                                <i style="color: #65676B;" class="fas fa-angle-double-up"></i>&nbsp;&nbsp;
                                Thu gọn
                            </p>
                            <div class="w-full py-2">
                                <div class="w-full">
                                    <div class="w-full my-2 flex">
                                        <div class="w-1/12">
                                            <a href=""><img class="w-10 h-10 mt-2 rounded-full border-2 border-solid"
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
                            <div class="border-none outline-none bg-gray-100 py-3" style="min-height: 30px;width: 96%;"
                                contenteditable>
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
                            <p style="font-size: 15px;display: none;" class="color-word font-bold cursor-pointer pl-2">
                                <i style="color: #65676B;" class="fas fa-angle-double-down"></i>&nbsp;&nbsp;
                                Xem 19 bình luận
                            </p>
                            <p style="font-size: 15px;display: none;" class="color-word font-bold cursor-pointer pl-2">
                                <i style="color: #65676B;" class="fas fa-angle-double-up"></i>&nbsp;&nbsp;
                                Thu gọn
                            </p>
                            <div class="w-full py-2">
                                <div class="w-full">
                                    <div class="w-full my-2 flex">
                                        <div class="w-1/12">
                                            <a href=""><img class="w-10 h-10 mt-2 rounded-full border-2 border-solid"
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
                            <div class="border-none outline-none bg-gray-100 py-3" style="min-height: 30px;width: 96%;"
                                contenteditable>
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
                            <p style="font-size: 15px;display: none;" class="color-word font-bold cursor-pointer pl-2">
                                <i style="color: #65676B;" class="fas fa-angle-double-down"></i>&nbsp;&nbsp;
                                Xem 19 bình luận
                            </p>
                            <p style="font-size: 15px;display: none;" class="color-word font-bold cursor-pointer pl-2">
                                <i style="color: #65676B;" class="fas fa-angle-double-up"></i>&nbsp;&nbsp;
                                Thu gọn
                            </p>
                            <div class="w-full py-2">
                                <div class="w-full">
                                    <div class="w-full my-2 flex">
                                        <div class="w-1/12">
                                            <a href=""><img class="w-10 h-10 mt-2 rounded-full border-2 border-solid"
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
                            <div class="border-none outline-none bg-gray-100 py-3" style="min-height: 30px;width: 96%;"
                                contenteditable>
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
            <div class="fixed " style="width: 30%;left: 70%;">
                <div id="content-right-ok" class="w-full flex">
                    <div class="w-1/5">

                    </div>
                    <div class="content-right wrapper-content-right w-4/5 overflow-y-auto py-0 px-2.5">
                        <div class="w-full">
                            <br>
                            <h4>Được tài trợ</h4>
                            <div class="w-full flex mx-0 my-4">
                                <a href=""><img class="w-32 h-32 object-contain" style="border-radius: 20px;"
                                        src="img/ads1.jpg" alt=""></a>
                                <div class="block my-12 mx-2.5">
                                    <span><a href="">Didongviet</a></span> <br>
                                    <span><a class="text-xs" href="">didongviet.vn</a></span>
                                </div>
                            </div>
                            <hr class="my-2.5 mx-auto w-11/12">
                            <div class="w-full flex mx-0 my-4">
                                <a href=""><img class="w-32 h-32 object-contain" style="border-radius: 20px;"
                                        src="img/ads2.jpg" alt=""></a>
                                <div class="block my-12 mx-2.5">
                                    <span><a href="">Phone Shop</a></span> <br>
                                    <span><a class="text-xs" href="">shopphone.vn</a></span>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div id="friend-request">
                            <div class="w-full">
                                <span class="float-left">
                                    <b>Lời mời kết bạn</b>
                                </span>
                                <span class="float-right">
                                    <a href=""><b>Xem tất cả</b></a>
                                </span>
                            </div>

                            <div class="w-full flex py-2.5 px-0">
                                <div class="w-1/5">
                                    <a href=""><img class="w-16 h-16" src="img/gai1.jpg" alt=""></a>
                                </div>
                                <div class="w-4/5 pl-2">
                                    <div class="w-full">
                                        <span class="float-left pl-2.5 font-bold">
                                            <a href="">Mỹ Hạnh</a></span>
                                        <span class="float-right text-xs">Vừa xong</span>
                                    </div>
                                    <div class="w-full flex py-2.5 px-0 text-sm font-bold">
                                        <span class="w-7/12 text-center h-10 leading-10 mr-4 cursor-pointer"
                                            style="border-radius: 10px;background-color: #1877F2;">
                                            <a class="text-white" href="">Xác Nhận</a>
                                        </span>
                                        <span class="w-7/12 text-center h-10 leading-10 cursor-pointer"
                                            style="background-color: #D8DADF;border-radius: 10px;">
                                            <a class="color-black" href="">Xóa</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-2.5 mx-auto w-11/12">
                            <br>
                        </div>
                        <div class="w-full">
                            <div class="w-full">
                                <span class="float-left">
                                    <b>Sinh nhật</b>
                                </span>
                            </div>
                            <div class="w-full flex px-0 py-2.5">
                                <div class="w-2/12">
                                    <i class="fas fa-gift text-4xl" style="color: #21A2F0;;"></i>
                                </div>
                                <div class="w-10/12 text-lg">
                                    <span>Hôm nay là sinh nhật của <b>Nguyễn</b> và <b>6 người bạn khác</b></span>
                                </div>
                            </div>
                            <br>
                            <hr class="my-2.5 mx-auto w-11/12">

                        </div>
                        <div class="w-full">
                            <div class="w-full">
                                <span class="float-left py-2.5 px-0">
                                    <b>Bạn Bè</b>
                                </span>
                                <span class="float-right">
                                    <ul class="flex">
                                        <li class="p-2.5 text-xl"><i class="fas fa-video"></i></li>
                                        <li class="p-2.5 text-xl"><i class="fab fa-searchengin"></i></li>
                                        <li class="p-2.5 text-xl"><i class="fas fa-ellipsis-h"></i></li>
                                    </ul>
                                </span>
                            </div>
                            <div onmouseover="viewInfoHover(0,event)" onmouseleave="viewInfoLeave(0)"
                                class="w-full flex mb-4 p-2 friends-online relative cursor-pointer">
                                <div class="w-2/12 relative">
                                    <a href=""><img class="w-10 h-10 rounded-full" src="img/avatar.jpg" alt=""></a>
                                    <i class="fas fa-circle text-xs bg-white rounded-full absolute"
                                        style="color: #349C4C;padding: 1px 2px;bottom: 0px;right: 10px;"></i>
                                </div>
                                <div class=" w-10/12 pt-2.5">
                                    <b>Trà Hưởng</b>
                                </div>
                            </div>
                            <div onmouseover="viewInfoHover(0,event)" onmouseleave="viewInfoLeave(0)"
                                class="w-full flex mb-4 p-2 friends-online relative cursor-pointer">
                                <div class="w-2/12 relative">
                                    <a href=""><img class="w-10 h-10 rounded-full" src="img/avatar.jpg" alt=""></a>
                                    <i class="fas fa-circle text-xs bg-white rounded-full absolute"
                                        style="color: #349C4C;padding: 1px 2px;bottom: 0px;right: 10px;"></i>
                                </div>
                                <div class=" w-10/12 pt-2.5">
                                    <b>Trà Hưởng</b>
                                </div>
                            </div>
                            <div onmouseover="viewInfoHover(0,event)" onmouseleave="viewInfoLeave(0)"
                                class="w-full flex mb-4 p-2 friends-online relative cursor-pointer">
                                <div class="w-2/12 relative">
                                    <a href=""><img class="w-10 h-10 rounded-full" src="img/avatar.jpg" alt=""></a>
                                    <i class="fas fa-circle text-xs bg-white rounded-full absolute"
                                        style="color: #349C4C;padding: 1px 2px;bottom: 0px;right: 10px;"></i>
                                </div>
                                <div class=" w-10/12 pt-2.5">
                                    <b>Trà Hưởng</b>
                                </div>
                            </div>
                            <div class="friends-online-info absolute h-36 bg-white p-2 shadow-sm"
                                style="width: 350px;display: none;top: 0;right: 360px;">
                                <div class="w-1/3 relative py-2 pl-2">
                                    <img class="rounded-full object-contain" style="width: 85px;height: 85px;"
                                        src="img/avatar.jpg" alt="">
                                    <i class="fas fa-circle bg-white rounded-full absolute"
                                        style="font-size: 17px;color: #349C4C;padding: 2px 2px;bottom: 18px;right: 25px;"></i>
                                </div>
                                <div class="w-2/3">
                                    <p class="font-bold" style="font-size: 20px;">Trà Hưởng</p>
                                    <div class="w-full py-2">
                                        <i class="fas fa-user-friends"></i>&nbsp;&nbsp;
                                        4 bạn bè chung gồm <b>Trà Tấn Hưởng</b> và <b>Hưởng MMO</b>
                                    </div>
                                    <div class="w-full py-2">
                                        <i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;
                                        Sống tại <b>Quảng Nam</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="w-11/12 fixed -bottom-2">
            <div class="w-full">
                <div class="w-1/4 bg-white m-2 p-2 border-2 border-solid border-gray-100 rounded-lg relative float-right">
                    <div class="w-full flex py-1 border-b-2 border-solid border-gray-200">
                        <div class="w-2/12">
                            <img src="img/avatar.jpg" class="cursor-pointer w-10 h-10 p-1 rounded-full object-cover" alt="">
                        </div>
                        <div class="w-2/5">
                            <p onclick="openSettingChat(0)" class="cursor-pointer text-sm font-bold py-2.5">Trà Hưởng&nbsp;&nbsp;<i
                                    class="fas fa-angle-down"></i></p>
                        </div>
                        <div class="w-1/3">
                            <ul class="flex text-right">
                                <li class="cursor-pointer py-1.5 px-1 hover:bg-gray-200 rounded-full">
                                    <svg role="presentation" height="26px" width="26px" viewBox="-5 -5 30 30">
                                        <path d="M19.492 4.112a.972.972 0 00-1.01.063l-3.052 2.12a.998.998 0 00-.43.822v5.766a1
                                            1 0 00.43.823l3.051 2.12a.978.978 0 001.011.063.936.936 0 00.508-.829V4.94a.936.936
                                            0 00-.508-.828zM10.996 18A3.008 3.008 0 0014 14.996V5.004A3.008 3.008 0 0010.996 
                                            2H3.004A3.008 3.008 0 000 5.004v9.992A3.008 3.008 0 003.004 18h7.992z"
                                            fill="#bec2c9"></path>
                                    </svg>
                                </li>
                                <li class="cursor-pointer py-1.5 px-1 hover:bg-gray-200 rounded-full">
                                    <svg role="presentation" height="26px" width="26px" viewBox="-5 -5 30 30">
                                        <path
                                            d="M10.952 14.044c.074.044.147.086.22.125a.842.842 0 001.161-.367c.096-.195.167-.185.337-.42.204-.283.552-.689.91-.772.341-.078.686-.105.92-.11.435-.01 1.118.174 1.926.648a15.9 15.9 0 011.713 1.147c.224.175.37.43.393.711.042.494-.034 1.318-.754 2.137-1.135 1.291-2.859 1.772-4.942 1.088a17.47 17.47 0 01-6.855-4.212 17.485 17.485 0 01-4.213-6.855c-.683-2.083-.202-3.808 1.09-4.942.818-.72 1.642-.796 2.136-.754.282.023.536.17.711.392.25.32.663.89 1.146 1.714.475.808.681 1.491.65 1.926-.024.31-.026.647-.112.921-.11.35-.488.705-.77.91-.236.17-.226.24-.42.336a.841.841 0 00-.368 1.161c.04.072.081.146.125.22a14.012 14.012 0 004.996 4.996z"
                                            fill="#bec2c9"></path>
                                        <path
                                            d="M10.952 14.044c.074.044.147.086.22.125a.842.842 0 001.161-.367c.096-.195.167-.185.337-.42.204-.283.552-.689.91-.772.341-.078.686-.105.92-.11.435-.01 1.118.174 1.926.648.824.484 1.394.898 1.713 1.147.224.175.37.43.393.711.042.494-.034 1.318-.754 2.137-1.135 1.291-2.859 1.772-4.942 1.088a17.47 17.47 0 01-6.855-4.212 17.485 17.485 0 01-4.213-6.855c-.683-2.083-.202-3.808 1.09-4.942.818-.72 1.642-.796 2.136-.754.282.023.536.17.711.392.25.32.663.89 1.146 1.714.475.808.681 1.491.65 1.926-.024.31-.026.647-.112.921-.11.35-.488.705-.77.91-.236.17-.226.24-.42.336a.841.841 0 00-.368 1.161c.04.072.081.146.125.22a14.012 14.012 0 004.996 4.996z"
                                            fill="none" stroke="#bec2c9"></path>
                                    </svg>
                                </li>
                                <li class="cursor-pointer py-1.5 px-1 hover:bg-gray-200 rounded-full">
                                    <svg height="26px" width="26px" viewBox="-4 -4 24 24">
                                        <line stroke="#bec2c9" stroke-linecap="round" stroke-width="2" x1="2" x2="14" y1="8"
                                            y2="8"></line>
                                    </svg>
                                </li>
                                <li class="cursor-pointer py-1.5 px-1 hover:bg-gray-200 rounded-full">
                                    <svg height="26px" width="26px" viewBox="-4 -4 24 24">
                                        <line stroke="#bec2c9" stroke-linecap="round" stroke-width="2" x1="2" x2="14" y1="2"
                                            y2="14"></line>
                                        <line stroke="#bec2c9" stroke-linecap="round" stroke-width="2" x1="2" x2="14"
                                            y1="14" y2="2"></line>
                                    </svg>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="messages" class="w-full p-1 wrapper-scrollbar h-80 overflow-y-auto overflow-x-hidden relative">
                        <div class="mess-user w-full py-2 flex relative">
                            <div class="w-15per relative">
                                <a href=""><img class="absolute bottom-1 w-9 h-9 object-cover rounded-full"
                                        src="img/avatar.jpg" alt="" srcset=""></a>
                            </div>
                            <div class=" pl-2 flex" style="width: inherit;">
                                <div class="border-none outline-none bg-gray-200 bg-1877F2 p-2"
                                    style="max-width:65%;min-height: 40px;border-radius: 12px;font-size: 15px;">
                                    oke
                                </div>
                                <div class="mess-user-feel hidden h-auto relative">
                                    <i class="cursor-pointer fas fa-heart color-word absolute top-1/2 pl-2"
                                        style="transform: translateY(-50%);"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mess-user w-full py-2 flex relative">
                            <div class="mess-user-r relative">
                                <i class="mess-user-feel hidden cursor-pointer fas fa-heart color-word absolute right-0 top-1/2 pr-2"
                                    style="transform: translateY(-50%);"></i>
                            </div>
                            <div class="mess-user-r1 pl-2 flex mr-4" style="width: inherit;">
                                <div class="mess-right border-none outline-none bg-1877F2 p-2 rounded-lg text-white"
                                    style="max-width:65%;font-size: 15px;">
                                    rứa nge rứa nge rứa nge rứa nge rứa nge rứa nge rứa nge rứa nge
                                    rứa nge rứa nge rứa nge rứa nge rứa nge rứa nge rứa nge rứa nge
                                </div>
                            </div>
                            <div class="mess-user-r2 w-1/12">
                                <div class="w-full clear-both">
                                    <i class="far fa-check-circle absolute hidden ml-2"></i>
                                    <i class="fas fa-check-circle absolute hidden ml-2 "></i>
                                    <img src="img/avatar.jpg"
                                        class="img-mess-right absolute w-7 h-7 p-0.5 object-cover rounded-full" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="mess-user w-full py-2 flex relative">
                            <div class="w-15per relative">
                                <a href=""><img class="absolute bottom-1 w-9 h-9 object-cover rounded-full"
                                        src="img/avatar.jpg" alt="" srcset=""></a>
                            </div>
                            <div class=" pl-2 flex" style="width: inherit;">
                                <div class="border-none outline-none bg-gray-200 bg-1877F2 p-2"
                                    style="max-width:65%;min-height: 40px;border-radius: 12px;font-size: 15px;">
                                    haha
                                </div>
                                <div class="mess-user-feel hidden h-auto relative">
                                    <i class="cursor-pointer fas fa-heart color-word absolute top-1/2 pl-2"
                                        style="transform: translateY(-50%);"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mess-user w-full py-2 flex relative">
                            <div class="mess-user-r relative">
                                <i class="mess-user-feel hidden cursor-pointer fas fa-heart color-word absolute right-0 top-1/2 pr-2"
                                    style="transform: translateY(-50%);"></i>
                            </div>
                            <div class="mess-user-r1 pl-2 flex mr-4" style="width: inherit;">
                                <div class="mess-right border-none outline-none bg-1877F2 p-2 rounded-lg text-white"
                                    style="max-width:65%;font-size: 15px;">
                                    bạn tên gì á ??
                                </div>
                            </div>
                            <div class="mess-user-r2 w-1/12">
                                <div class="w-full clear-both">
                                    <i class="far fa-check-circle absolute hidden ml-2"></i>
                                    <i class="fas fa-check-circle absolute hidden ml-2 "></i>
                                    <img src="img/avatar.jpg"
                                        class="img-mess-right absolute w-7 h-7 p-0.5 object-cover rounded-full" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="mess-user w-full py-2 flex relative">
                            <div class="w-15per relative">
                                <a href=""><img class="absolute bottom-1 w-9 h-9 object-cover rounded-full"
                                        src="img/avatar.jpg" alt="" srcset=""></a>
                            </div>
                            <div class=" pl-2 flex" style="width: inherit;">
                                <div class="border-none outline-none bg-gray-200 bg-1877F2 p-2"
                                    style="max-width:65%;min-height: 40px;border-radius: 12px;font-size: 15px;">
                                    vậy sao
                                </div>
                                <div class="mess-user-feel hidden h-auto relative">
                                    <i class="cursor-pointer fas fa-heart color-word absolute top-1/2 pl-2"
                                        style="transform: translateY(-50%);"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mess-user w-full py-2 flex relative">
                            <div class="mess-user-r relative">
                                <i class="mess-user-feel hidden cursor-pointer fas fa-heart color-word absolute right-0 top-1/2 pr-2"
                                    style="transform: translateY(-50%);"></i>
                            </div>
                            <div class="mess-user-r1 pl-2 flex mr-4" style="width: inherit;">
                                <div class="mess-right border-none outline-none bg-1877F2 p-2 rounded-lg text-white"
                                    style="max-width:65%;font-size: 15px;">
                                    um bạn 🖤
                                </div>
                            </div>
                            <div class="mess-user-r2 w-1/12">
                                <div class="w-full clear-both">
                                    <i class="far fa-check-circle absolute hidden ml-2"></i>
                                    <i class="fas fa-check-circle absolute hidden ml-2 "></i>
                                    <img src="img/avatar.jpg"
                                        class="img-mess-right absolute w-7 h-7 p-0.5 object-cover rounded-full" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full bg-white z-20 pb-2 pt-4 px-1 flex border-t-2 border-solid border-gray-300">
                        <div class="w-1/12 flex">
                            <div class="cursor-pointer p-1 fill-65676B pt-2">
                                <svg class="addOrCancel" onclick="loadTextBoxType(0)"
                                    class="a8c37x1j ms05siws hr662l2t b7h9ocf4 crt8y2ji tftn3vyl" height="20px" width="20px"
                                    viewBox="0 0 24 24">
                                    <g fill-rule="evenodd">
                                        <polygon fill="none" points="-6,30 30,30 30,-6 -6,-6 "></polygon>
                                        <path
                                            d="m18,11l-5,0l0,-5c0,-0.552 -0.448,-1 -1,-1c-0.5525,0 -1,0.448 -1,1l0,5l-5,0c-0.5525,0 -1,0.448 -1,1c0,0.552 0.4475,1 1,1l5,0l0,5c0,0.552 0.4475,1 1,1c0.552,0 1,-0.448 1,-1l0,-5l5,0c0.552,0 1,-0.448 1,-1c0,-0.552 -0.448,-1 -1,-1m-6,13c-6.6275,0 -12,-5.3725 -12,-12c0,-6.6275 5.3725,-12 12,-12c6.627,0 12,5.3725 12,12c0,6.6275 -5.373,12 -12,12">
                                        </path>
                                    </g>
                                </svg>
                            </div>
                        </div>
                        <ul class="three-exten w-1/3 pt-1" style="display: block;">
                            <li class="float-left cursor-pointer p-1 fill-65676B">
                                <svg class="a8c37x1j ms05siws hr662l2t b7h9ocf4" height="20px" width="20px"
                                    viewBox="0 -1 17 17">
                                    <g fill="gray" fill-rule="evenodd">
                                        <path
                                            d="M2.882 13.13C3.476 4.743 3.773.48 3.773.348L2.195.516c-.7.1-1.478.647-1.478 1.647l1.092 11.419c0 .5.2.9.4 1.3.4.2.7.4.9.4h.4c-.6-.6-.727-.951-.627-2.151z"
                                            fill="gray"></path>
                                        <circle cx="8.5" cy="4.5" r="1.5" fill="gray"></circle>
                                        <path
                                            d="M14 6.2c-.2-.2-.6-.3-.8-.1l-2.8 2.4c-.2.1-.2.4 0 .6l.6.7c.2.2.2.6-.1.8-.1.1-.2.1-.4.1s-.3-.1-.4-.2L8.3 8.3c-.2-.2-.6-.3-.8-.1l-2.6 2-.4 3.1c0 .5.2 1.6.7 1.7l8.8.6c.2 0 .5 0 .7-.2.2-.2.5-.7.6-.9l.6-5.9L14 6.2z"
                                            fill="gray"></path>
                                        <path
                                            d="M13.9 15.5l-8.2-.7c-.7-.1-1.3-.8-1.3-1.6l1-11.4C5.5 1 6.2.5 7 .5l8.2.7c.8.1 1.3.8 1.3 1.6l-1 11.4c-.1.8-.8 1.4-1.6 1.3z"
                                            stroke-linecap="round" stroke-linejoin="round" stroke="gray"></path>
                                    </g>
                                </svg>
                            </li>
                            <li class="float-left cursor-pointer p-1 fill-65676B">
                                <svg class="a8c37x1j ms05siws hr662l2t b7h9ocf4 crt8y2ji" height="20px" width="20px"
                                    viewBox="0 0 17 16" x="0px" y="0px">
                                    <g fill-rule="evenodd">
                                        <circle cx="5.5" cy="5.5" fill="none" r="1"></circle>
                                        <circle cx="11.5" cy="4.5" fill="none" r="1"></circle>
                                        <path
                                            d="M5.3 9c-.2.1-.4.4-.3.7.4 1.1 1.2 1.9 2.3 2.3h.2c.2 0 .4-.1.5-.3.1-.3 0-.5-.3-.6-.8-.4-1.4-1-1.7-1.8-.1-.2-.4-.4-.7-.3z"
                                            fill="none"></path>
                                        <path
                                            d="M10.4 13.1c0 .9-.4 1.6-.9 2.2 4.1-1.1 6.8-5.1 6.5-9.3-.4.6-1 1.1-1.8 1.5-2 1-3.7 3.6-3.8 5.6z">
                                        </path>
                                        <path
                                            d="M2.5 13.4c.1.8.6 1.6 1.3 2 .5.4 1.2.6 1.8.6h.6l.4-.1c1.6-.4 2.6-1.5 2.7-2.9.1-2.4 2.1-5.4 4.5-6.6 1.3-.7 1.9-1.6 1.9-2.8l-.2-.9c-.1-.8-.6-1.6-1.3-2-.7-.5-1.5-.7-2.4-.5L3.6 1.5C1.9 1.8.7 3.4 1 5.2l1.5 8.2zm9-8.9c.6 0 1 .4 1 1s-.4 1-1 1-1-.4-1-1 .4-1 1-1zm-3.57 6.662c.3.1.4.4.3.6-.1.3-.3.4-.5.4h-.2c-1-.4-1.9-1.3-2.3-2.3-.1-.3.1-.6.3-.7.3-.1.5 0 .6.3.4.8 1 1.4 1.8 1.7zM5.5 5.5c.6 0 1 .4 1 1s-.4 1-1 1-1-.4-1-1 .4-1 1-1z"
                                            fill-rule="nonzero"></path>
                                    </g>
                                </svg>
                            </li>
                            <li class="float-left cursor-pointer p-1 fill-65676B">
                                <svg class="a8c37x1j ms05siws hr662l2t b7h9ocf4 crt8y2ji" height="20px" width="20px"
                                    viewBox="0 0 16 16" x="0px" y="0px">
                                    <path
                                        d="M.783 12.705c.4.8 1.017 1.206 1.817 1.606 0 0 1.3.594 2.5.694 1 .1 1.9.1 2.9.1s1.9 0 2.9-.1 1.679-.294 2.479-.694c.8-.4 1.157-.906 1.557-1.706.018 0 .4-1.405.5-2.505.1-1.2.1-3 0-4.3-.1-1.1-.073-1.976-.473-2.676-.4-.8-.863-1.408-1.763-1.808-.6-.3-1.2-.3-2.4-.4-1.8-.1-3.8-.1-5.7 0-1 .1-1.7.1-2.5.5s-1.417 1.1-1.817 1.9c0 0-.4 1.484-.5 2.584-.1 1.2-.1 3 0 4.3.1 1 .2 1.705.5 2.505zm10.498-8.274h2.3c.4 0 .769.196.769.696 0 .5-.247.68-.747.68l-1.793.02.022 1.412 1.252-.02c.4 0 .835.204.835.704s-.442.696-.842.696H11.82l-.045 2.139c0 .4-.194.8-.694.8-.5 0-.7-.3-.7-.8l-.031-5.631c0-.4.43-.696.93-.696zm-3.285.771c0-.5.3-.8.8-.8s.8.3.8.8l-.037 5.579c0 .4-.3.8-.8.8s-.8-.4-.8-.8l.037-5.579zm-3.192-.825c.7 0 1.307.183 1.807.683.3.3.4.7.1 1-.2.4-.7.4-1 .1-.2-.1-.5-.3-.9-.3-1 0-2.011.84-2.011 2.14 0 1.3.795 2.227 1.695 2.227.4 0 .805.073 1.105-.127V8.6c0-.4.3-.8.8-.8s.8.3.8.8v1.8c0 .2.037.071-.063.271-.7.7-1.57.991-2.47.991C2.868 11.662 1.3 10.2 1.3 8s1.704-3.623 3.504-3.623z"
                                        fill-rule="nonzero"></path>
                                </svg>
                            </li>
                        </ul>
                        <div class="three-exten1 w-6/12">
                            <div class="place-input-type border-none rounded-2xl pl-2 outline-none bg-gray-200 py-1.5 w-11/12"
                                style="min-height: 20px;" oninput="typeChat(0)" contenteditable placeholder="Aa">
                            
                            </div>
                        </div>
                        <div class="w-1/12 pt-1 zoom">
                            <p class="cursor-pointer zoom text-xl">
                                🖤
                            </p>
                        </div>
                    </div>
                    <div style="right: 101%;display: none;" class="setting-chat w-11/12 absolute top-0 bg-white rounded-lg border-2 rounded-lg">
                        <ul class="w-full border-b-2 border-gray-200 border-solid p-2">
                            <li class="w-full p-1 text-lg hover:bg-gray-100 cursor-pointer"><i
                                    class="fab fa-facebook-messenger pr-1.5"></i> Mở
                                messager</li>
                            <li class="w-full p-1 text-lg hover:bg-gray-100 cursor-pointer"><i class="far fa-user-circle pr-1.5"></i>
                                Xem trang cá nhân
                            </li>
                        </ul>
                        <ul class="w-full border-b-2 border-gray-200 border-solid p-2">
                            <li class="w-full p-1 text-lg hover:bg-gray-100 cursor-pointer"><i class="fas fa-palette pr-1.5"></i> Màu
                            </li>
                            <li class="w-full p-1 text-lg hover:bg-gray-100 cursor-pointer"><i class="far fa-smile pr-1.5"></i> Biểu
                                tượng cảm xúc</li>
                            <li class="w-full p-1 text-lg hover:bg-gray-100 cursor-pointer"><i class="fas fa-pen-alt pr-1.5"></i> Biệt
                                danh</li>
                        </ul>
                        <ul class="w-full border-b-2 border-gray-200 border-solid p-2">
                            <li class="w-full p-1 text-lg hover:bg-gray-100 cursor-pointer"><i class="fas fa-users pr-1.5"></i> Tạo nhóm
                            </li>
                        </ul>
                        <ul class="w-full border-b-2 border-gray-200 border-solid p-2">
                            <li class="w-full p-1 text-lg hover:bg-gray-100 cursor-pointer"><i class="far fa-bell pr-1.5"></i> Tắt cuộc
                                trò chuyện</li>
                            <li class="w-full p-1 text-lg hover:bg-gray-100 cursor-pointer"><i class="fab fa-rev pr-1.5"></i> Bỏ qua tin
                                nhắn</li>
                            <li class="w-full p-1 text-lg hover:bg-gray-100 cursor-pointer"><i class="fas fa-ban pr-1.5"></i> Chặn</li>
                            <li class="w-full p-1 text-lg hover:bg-gray-100 cursor-pointer"><i class="far fa-trash-alt pr-1.5"></i> Xóa
                                cuộc trò chuyện
                            </li>
                        </ul>
                
                    </div>
                    <div style="display: none;" class="newExcen w-full py-2 absolute bottom-14 z-10 bg-white">
                        <ul class="w-full flex bg-white">
                            <li class="cursor-pointer mr-2 p-2 pb-0 bg-gray-200 rounded-lg">
                                <svg class="a8c37x1j ms05siws hr662l2t b7h9ocf4" height="20px" width="20px"
                                    viewBox="0 -1 17 17">
                                    <g fill="black" fill-rule="evenodd">
                                        <path
                                            d="M2.882 13.13C3.476 4.743 3.773.48 3.773.348L2.195.516c-.7.1-1.478.647-1.478 1.647l1.092 11.419c0 .5.2.9.4 1.3.4.2.7.4.9.4h.4c-.6-.6-.727-.951-.627-2.151z"
                                            fill="gray"></path>
                                        <circle cx="8.5" cy="4.5" r="1.5" fill="black"></circle>
                                        <path
                                            d="M14 6.2c-.2-.2-.6-.3-.8-.1l-2.8 2.4c-.2.1-.2.4 0 .6l.6.7c.2.2.2.6-.1.8-.1.1-.2.1-.4.1s-.3-.1-.4-.2L8.3 8.3c-.2-.2-.6-.3-.8-.1l-2.6 2-.4 3.1c0 .5.2 1.6.7 1.7l8.8.6c.2 0 .5 0 .7-.2.2-.2.5-.7.6-.9l.6-5.9L14 6.2z"
                                            fill="black"></path>
                                        <path
                                            d="M13.9 15.5l-8.2-.7c-.7-.1-1.3-.8-1.3-1.6l1-11.4C5.5 1 6.2.5 7 .5l8.2.7c.8.1 1.3.8 1.3 1.6l-1 11.4c-.1.8-.8 1.4-1.6 1.3z"
                                            stroke-linecap="round" stroke-linejoin="round" stroke="black"></path>
                                    </g>
                                </svg>
                            </li>
                            <li class="cursor-pointer mx-2 p-2 pb-0 bg-gray-200 rounded-lg">
                                <svg class="a8c37x1j ms05siws hr662l2t b7h9ocf4 crt8y2ji" height="20px" width="20px"
                                    viewBox="0 0 17 16" x="0px" y="0px">
                                    <g fill-rule="evenodd">
                                        <circle cx="5.5" cy="5.5" fill="none" r="1"></circle>
                                        <circle cx="11.5" cy="4.5" fill="none" r="1"></circle>
                                        <path
                                            d="M5.3 9c-.2.1-.4.4-.3.7.4 1.1 1.2 1.9 2.3 2.3h.2c.2 0 .4-.1.5-.3.1-.3 0-.5-.3-.6-.8-.4-1.4-1-1.7-1.8-.1-.2-.4-.4-.7-.3z"
                                            fill="none"></path>
                                        <path
                                            d="M10.4 13.1c0 .9-.4 1.6-.9 2.2 4.1-1.1 6.8-5.1 6.5-9.3-.4.6-1 1.1-1.8 1.5-2 1-3.7 3.6-3.8 5.6z">
                                        </path>
                                        <path
                                            d="M2.5 13.4c.1.8.6 1.6 1.3 2 .5.4 1.2.6 1.8.6h.6l.4-.1c1.6-.4 2.6-1.5 2.7-2.9.1-2.4 2.1-5.4 4.5-6.6 1.3-.7 1.9-1.6 1.9-2.8l-.2-.9c-.1-.8-.6-1.6-1.3-2-.7-.5-1.5-.7-2.4-.5L3.6 1.5C1.9 1.8.7 3.4 1 5.2l1.5 8.2zm9-8.9c.6 0 1 .4 1 1s-.4 1-1 1-1-.4-1-1 .4-1 1-1zm-3.57 6.662c.3.1.4.4.3.6-.1.3-.3.4-.5.4h-.2c-1-.4-1.9-1.3-2.3-2.3-.1-.3.1-.6.3-.7.3-.1.5 0 .6.3.4.8 1 1.4 1.8 1.7zM5.5 5.5c.6 0 1 .4 1 1s-.4 1-1 1-1-.4-1-1 .4-1 1-1z"
                                            fill-rule="nonzero"></path>
                                    </g>
                                </svg>
                            </li>
                            <li class="cursor-pointer mx-2 p-2 pb-0 bg-gray-200 rounded-lg">
                                <svg class="a8c37x1j ms05siws hr662l2t b7h9ocf4 crt8y2ji" height="20px" width="20px"
                                    viewBox="0 0 16 16" x="0px" y="0px">
                                    <path
                                        d="M.783 12.705c.4.8 1.017 1.206 1.817 1.606 0 0 1.3.594 2.5.694 1 .1 1.9.1 2.9.1s1.9 0 2.9-.1 1.679-.294 2.479-.694c.8-.4 1.157-.906 1.557-1.706.018 0 .4-1.405.5-2.505.1-1.2.1-3 0-4.3-.1-1.1-.073-1.976-.473-2.676-.4-.8-.863-1.408-1.763-1.808-.6-.3-1.2-.3-2.4-.4-1.8-.1-3.8-.1-5.7 0-1 .1-1.7.1-2.5.5s-1.417 1.1-1.817 1.9c0 0-.4 1.484-.5 2.584-.1 1.2-.1 3 0 4.3.1 1 .2 1.705.5 2.505zm10.498-8.274h2.3c.4 0 .769.196.769.696 0 .5-.247.68-.747.68l-1.793.02.022 1.412 1.252-.02c.4 0 .835.204.835.704s-.442.696-.842.696H11.82l-.045 2.139c0 .4-.194.8-.694.8-.5 0-.7-.3-.7-.8l-.031-5.631c0-.4.43-.696.93-.696zm-3.285.771c0-.5.3-.8.8-.8s.8.3.8.8l-.037 5.579c0 .4-.3.8-.8.8s-.8-.4-.8-.8l.037-5.579zm-3.192-.825c.7 0 1.307.183 1.807.683.3.3.4.7.1 1-.2.4-.7.4-1 .1-.2-.1-.5-.3-.9-.3-1 0-2.011.84-2.011 2.14 0 1.3.795 2.227 1.695 2.227.4 0 .805.073 1.105-.127V8.6c0-.4.3-.8.8-.8s.8.3.8.8v1.8c0 .2.037.071-.063.271-.7.7-1.57.991-2.47.991C2.868 11.662 1.3 10.2 1.3 8s1.704-3.623 3.504-3.623z"
                                        fill-rule="nonzero"></path>
                                </svg>
                            </li>
                            <li class="cursor-pointer ml-2 p-2 bg-gray-200 rounded-lg">
                                <i class="fas fa-paperclip" style="font-size: 18px;"></i>
                            </li>
                        </ul>
                    </div>
                </div>   
                
            </div>
        </div>-->
    </div>
    <div class="w-full" id="second">
        @include('Modal/ModalBaiDang/ModalTaoBaiViet')
    </div>
    @else 
    <?php redirect()->to('login')->send(); ?>
    @endif
    <script src="js/scrollbar.js"></script>
</body>
</html>