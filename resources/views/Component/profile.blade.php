@include('Reload')
<?php

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Functions;
use App\Models\StringUtil;
use App\Process\DataProcess;
use App\Process\DataProcessSecond;

$user = Session::get('user');

?>
<div class="w-full bg-gray-500 top-0 left-0 z-50 bg-opacity-50" id="second" style="z-index: 100;">
</div>
<div class="w-full dark:bg-dark-second" id="web">
    @include('Header');
    <form action="action" class="dark:bg-dark-second w-full md:w-4/5 lg:w-3/4 md:mx-auto xl:w-11/12">>
        <div class="w-full relative">
            <div class="w-full mx-auto relative">
                <div class="w-full relative h-60 lg:h-96">
                    <a href="photo/"><img class="w-full h-60 object-cover  lg:h-96" style="border-radius: 10px;" src="/{{ $users[0]->AnhBia}}" alt=""></a>
                </div>
                <div class="w-full absolute text-center top-20 lg:top-6/10">
                    <img class="w-44 h-44 rounded-full mx-auto
                                border-4 border-solid border-white object-cover" src="/{{ $users[0]->AnhDaiDien}}" alt=""></a>
                    <p class="font-bold text-center text-3xl py-2 dark:text-white" style="font-family: system-ui;">{{ $users[0]->Ho . ' ' . $users[0]->Ten}}</p>
                </div>
            </div>
        </div>
    </form>
    <div class="w-full relative">
        <div class="mx-auto text-center py-4 dark:text-white w-11/12" style="margin-top: 68px;">
            <span class="outline-none">{{ $users[0]->MoTa}}</span>
            <br>
        </div>
    </div>
    <hr class="w-full md:w-4/5 lg:w-3/4 md:mx-auto xl:w-11/12 mb-2">
    <?php $moiQuanHe = DB::table('moiquanhe')->where('IDTaiKhoan', '=', $user[0]->IDTaiKhoan)
        ->where('IDBanBe', '=', $users[0]->IDTaiKhoan)->get(); ?>
    <div class="relative py-2" id="moiQuanHe">
        @if ($user[0]->IDTaiKhoan == $users[0]->IDTaiKhoan)
        @include('Component/MoiQuanHe/ChinhChu')
        @elseif (sizeof($moiQuanHe) == 0)
        @include('Component/MoiQuanHe/ChuaKetBan')
        @elseif ($moiQuanHe[0]->TinhTrang == 0)
        @include('Component/MoiQuanHe/ChuaKetBan')
        @elseif ($moiQuanHe[0]->TinhTrang == 1)
        @include('Component/MoiQuanHe/GuiYeuCau')
        @elseif ($moiQuanHe[0]->TinhTrang == 2)
        @include('Component/MoiQuanHe/NhanYeuCau')
        @elseif ($moiQuanHe[0]->TinhTrang == 3)
        @include('Component/MoiQuanHe/BanBe')
        @endif
    </div>
    <div class="w-full relative bg-gray-100 dark:bg-dark-main pt-3">
        <?php
        $paths = explode('/', parse_url(url()->current())['path']);

        ?>
        <div id="place_load_about" class="mx-auto relative w-full lg:flex xl:w-11/12 
            md:w-4/5 lg:w-3/4 md:mx-auto lg:flex-wrap rounded-lg">
            <div class="w-full lg:flex">
                <div id="profileLeft" class="w-full lg:w-2/5">
                    <div class="mx-2.5 mt-4 bg-white p-2.5 pt-0 rounded-lg dark:bg-dark-third" style="width:95%;">
                        <p class="font-bold text-xl py-2 dark:text-white" style="font-family: system-ui;">Giới thiệu</p>
                        <ul class="w-full ">
                            <li class="w-full pb-3" style="font-size: 15px;">
                                <p class="dark:text-gray-300"><i class="fas fa-briefcase 
                                text-gray-600 text-xl dark:text-gray-300"></i>&nbsp;&nbsp;&nbsp;
                                    Làm việc tại <b class="dark:text-gray-300">FacebookApp</b></p>
                            </li>
                            <li class="w-full pb-3" style="font-size: 15px;">
                                <p class="dark:text-gray-300"><i class="fas fa-graduation-cap text-gray-600 dark:text-gray-300 text-xl"></i>&nbsp;
                                    Học tại <b class="dark:text-gray-300">Trường Cao Đẳng Công Nghệ Thông Tin
                                        - Đại Học Đà Nẵng
                                    </b>
                                </p>
                            </li>
                            <li class="w-full pb-3" style="font-size: 15px;">
                                <p class="dark:text-gray-300"><i class="fas fa-home text-gray-600 dark:text-gray-300
                            text-xl"></i>&nbsp;&nbsp;Sống tại <b class="dark:text-gray-300">Đà Nẵng</b></p>
                            </li>
                            <li class="w-full pb-3" style="font-size: 15px;">
                                <p class="dark:text-gray-300">&nbsp;<i class="fas fa-map-marker-alt text-gray-600 dark:text-gray-300 text-xl"></i>&nbsp;&nbsp;
                                    Đến từ <b class="dark:text-gray-300">Quảng Nam</b></p>
                            </li>
                            <li class="w-full pb-3" style="font-size: 15px;">
                                <p class="dark:text-gray-300"><i class="fas fa-heart text-gray-600 dark:text-gray-300
                                text-xl"></i></i>&nbsp;&nbsp; Độc Thân</p>
                            </li>
                            <li class="w-full pb-3" style="font-size: 15px;">
                                <p class="dark:text-gray-300"><i class="fas fa-clock text-gray-600 text-xl 
                                dark:text-gray-300"></i>&nbsp;&nbsp;
                                    {{ StringUtil::getDateUse($users[0]->NgayTao) }}
                                </p>
                            </li>
                            @php
                            $numberUserFollow = DataProcessSecond::getUserFollowByID($users[0]->IDTaiKhoan)
                            @endphp
                            @if (count($numberUserFollow) == 0)
                            @else
                            <li class="w-full pb-3 flex" style="font-size: 15px;">
                                <p class="dark:text-gray-300">&nbsp;<i class="fab fa-foursquare text-gray-600 text-xl 
                                dark:text-gray-300"></i>&nbsp;&nbsp;
                                    <span>Có &nbsp;<b class="dark:text-gray-300">{{ count($numberUserFollow) }}</b>&nbsp; người theo dõi</span>
                                </p>
                            </li>
                            @endif

                        </ul>
                    </div>
                    <div class="pl-2.5 bg-white m-2.5 rounded-lg  dark:bg-dark-third" style="width: 95%;">
                        <div class="w-full flex">
                            <div class="w-full mt-2.5 mr-2.5">
                                <p class="font-bold dark:text-white">Ảnh<br></p>
                            </div>
                            <div class="w-full text-right mt-2.5 mr-2.5">
                                <a href=""><b style="color: #1876F2;">Xem tất cả</b></a>
                            </div>
                        </div>
                        <div class="w-full pt-4 pl-0.5 flex flex-wrap">
                            <?php $images = DataProcess::getAllImage($users[0]->IDTaiKhoan); ?>
                            @if (count($images) == 0)
                            <p class="text-center font-bold dark:text-white py-3">
                                Không có bất kì ảnh nào.
                            </p>
                            @else
                            @foreach($images as $key => $value)
                            <?php $pathImg = 'photo/' . $value->IDBaiDang . '/' . $value->IDHinhAnh; ?>
                            <div class="fr-us">
                                <a href="{{ url($pathImg) }}"><img class="object-cover rounded-lg" src="{{ $value->DuongDan }}" alt=""></a>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="pl-2.5 bg-white m-2.5 rounded-lg dark:bg-dark-third" style="width: 95%;">
                        <div class="w-full flex">
                            <?php
                            $friendsGet = Functions::getListFriendsUser($users[0]->IDTaiKhoan);
                            ?>
                            <div class="w-1/2">
                                <p class="dark:text-white font-bold pt-2">Bạn bè <br></p>
                                <span class="color-word">{{count($friendsGet)}} người bạn</span>
                            </div>
                            <div class="w-1/2 mt-2.5 mr-2.5 text-right">
                                <?php $viewAllImage = "profile." . $users[0]->IDTaiKhoan . '/friends'; ?>
                                <a href="{{ url($viewAllImage) }}"><b style="color: #1876F2;">Xem tất cả</b></a>
                            </div>
                        </div>
                        <div class="w-full pt-4 flex flex-wrap">

                            @if (count($friendsGet) == 0)
                            <p class="text-center font-bold dark:text-white py-3">
                                Không có bất kì bạn bè nào.
                            </p>
                            @else
                            @foreach($friendsGet as $key => $value)
                            <?php $pathProfile = 'profile.' . $value[0]->IDTaiKhoan; ?>
                            <div class="fr-us">
                                <a href="{{ url($pathProfile) }}"><img src="/{{ $value[0]->AnhDaiDien }}" alt=""></a>
                                <p class="font-bold py-2 dark:text-white text-sm">
                                    <a href="{{ url($pathProfile) }}">
                                        {{ $value[0]->Ho . ' ' . $value[0]->Ten }}
                                    </a>
                                </p>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="w-full bg-white dark:bg-dark-main mx-auto my-4 rounded-lg lg:w-3/5">
                    <div class="w-full bg-white dark:bg-dark-second m-auto rounded-lg mb-2">
                        <div class="w-full flex p-2.5">
                            <div class="w-2/12 md:w-1/12 mr-3 pt-1">
                                <a href=""><img class="w-12 rounded-full" src="/img/avatar.jpg"></a>
                            </div>
                            <div class="w-11/12">
                                <input class="w-full p-3 border-none outline-none bg-gray-200 dark:bg-dark-third" style="border-radius: 40px;" onclick="openPost()" type="text" placeholder="Hưởng ơi, Bạn Đang Nghĩ Gì Thế?">
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
                    <div class="timeline">
                        <input type="hidden" name="indexPost" id="indexPost" value="0">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full px-4 flex z-50 md:w-full lg:w-full xl:w-1/2
        ml-auto fixed -bottom-1 right-20" id="placeChat">
    </div>
    <script>
        var action = 'inactive';
        if (action == 'inactive') {
            loading();
            loadingPostProfile(0, '{{ $users[0]->IDTaiKhoan }}');
        }
        $(window).scroll(function() {
            if ($(window).scrollTop() + $(window).height() - 700 > $(".timeline").height() &&
                action == 'inactive') {
                action = 'active';
                loading();
                setTimeout(function() {
                    loadingPostProfile($('#indexPost').val(), '{{ $users[0]->IDTaiKhoan }}');
                }, 500);
            }
        });
    </script>
    <script src="/js/scrollbar.js"></script>
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
</div>