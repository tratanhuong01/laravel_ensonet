@include('Reload')
<?php

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Functions;
use App\Models\StringUtil;
use App\Process\DataProcess;
use App\Process\DataProcessSecond;
use App\Models\Gioithieu;

$user = session()->has('user') ? Session::get('user') : [];

$user_id = count($user) > 0 ? $user[0]->IDTaiKhoan : "";

$users_id = count($users) > 0 ? $users[0]->IDTaiKhoan : '';

$friendsGet = $users_id == '' ? [] : Functions::getListFriendsUserLimit($users[0]->IDTaiKhoan);

$images = $users_id == '' ? [] : DataProcess::getAllImage($users[0]->IDTaiKhoan);

$relationShip =
    $users_id == ''
    ? []
    : DB::table('moiquanhe')
    ->where('IDTaiKhoan', '=', $user_id)
    ->where('IDBanBe', '=', $users_id)
    ->get();

$paths = explode('/', parse_url(url()->current())['path']);
?>
@include('Head/document')

<head>
    <title>
        @if (count($users) == 0)
        {{ 'Ensonet' }}
        @else
        {{ $users[0]->Ho . ' ' . $users[0]->Ten . ' | Ensonet' }}
        @endif
    </title>
    @include('Head/css')
</head>

<body class="dark:bg-dark-main">
    <!-- main -->
    <div class="w-full dark:bg-dark-second" id="main">
        <!-- header -->
        @include('Header')
        <!-- header -->

        @if (count($users) == 0 || count($user) == 0)
        @include('Component/NotFound')
        @else
        @include('Timeline/Profile')

        <!-- head profile -->
        <div class="hidden dark:bg-dark-second pt-10 w-full md:w-4/5 lg:w-3/4 md:mx-auto xl:w-63%" id="firstContentProfile">
            @if ($user[0]->IDTaiKhoan == $users[0]->IDTaiKhoan)
            <div class="w-full relative">
                <div class="w-full mx-auto relative">
                    <div class="w-full relative h-60 lg:h-96">
                        <a href="" id="ajaxCover"><img class="w-full h-60 object-cover lg:h-96 rounded-lg" id="anhBia" src="{{ $user[0]->AnhBia }}" alt=""></a>
                    </div>
                    <div class="z-10 p-2 bg-gray-100 absolute text-center rounded-lg bottom-3 right-3">
                        <form id="form">
                            {{ csrf_field() }}
                            <input onchange="changeBia(event)" name="fileBia" type="file" accept="image" id="changeB" style="display: none" enctype="multipart/form-data">
                        </form>
                        <label for="changeB" class="flex"><i class="fas fa-camera text-2xl pl-1">
                            </i>&nbsp;&nbsp;<span class="hidden lg:inline pt-1">Chỉnh sửa ảnh bìa</span></label>
                    </div>
                    <div id="showSubmitBia" class="w-full h-16 absolute left-0 top-6 p-2 text-right 
                        " style="background: rgba(0,0,0,0.5);display:none;">
                        <form action="" method="post" id="formUpdateCover" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <a href="" class="cursor-pointer font-bold border-none bg-blue-600 text-white 
                            p-3">Hủy</a>
                            <input type="button" onclick="updateCoverImage()" value="Lưu Thay Đổi" class="cursor-pointer font-bold border-none bg-blue-600 ml-3 text-white p-2.5" />
                        </form>
                    </div>
                    <div class="w-full absolute text-center top-20 lg:top-6/10">
                        <a href="" id="ajaxAnhDaiDien"><img class="w-44 h-44 rounded-full mx-auto
                                border-4 border-solid border-white object-cover" src="{{ $user[0]->AnhDaiDien }}" alt=""></a>
                        <p class="font-bold flex text-center text-3xl py-2 dark:text-white 
                        justify-center" style="font-family: system-ui;">{{ $users[0]->Ho . ' ' . $users[0]->Ten }}
                            <span class="ml-3 mt-3.5 bg-blue-500 rounded-full 
                            text-sm font-bold text-white w-4 h-4 flex">
                                <i class='bx bx-check flex justiy-center items-center '></i>
                            </span>
                        </p>
                    </div>
                    <div class="text-2xl absolute bg-gray-100 rounded-full" style="top: 95%;left: 54%;padding: 2px 6px;">
                        <form id="formAvatar" method="POST" action="ProcessViewAvatar" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input onchange="changeAvatar(event)" name="fileAvatar" type="file" accept="image" id="changeavt" style="display: none">
                            <label for="changeavt"><i class="fas fa-camera"></i></label>
                        </form>

                    </div>
                </div>
            </div>
            <div class="w-full relative">
                <div class="mx-auto text-center w-63%" style="margin-top: 68px;">
                    <p id="DescribeUser" class="outline-none text-center py-2 dark:text-white">
                        {!! $user[0]->MoTa !!}
                    </p>
                    <div class="w-full pt-2">
                        <button onclick="editDescribeUser('{{ $user[0]->IDTaiKhoan }}',this)" style="color: #1876F2;font-size: 18px;" state='true'>Chỉnh sửa</button>
                    </div>
                    <br>
                </div>
            </div>
            <hr class="w-full md:w-4/5 lg:w-3/4 md:mx-auto xl:w-full mb-2 bg-gray-200 
                    dark:bg-dark-second">
            @else
            <form action="action" class="dark:bg-dark-second w-full md:w-4/5 lg:w-3/4 md:mx-auto xl:w-full">
                <div class="w-full relative">
                    <div class="w-full mx-auto relative">
                        <div class="w-full relative h-60 lg:h-96">
                            <a href="photo/"><img class="w-full h-60 object-cover  lg:h-96" style="border-radius: 10px;" src="{{ $users[0]->AnhBia }}" alt=""></a>
                        </div>
                        <div class="w-full absolute text-center top-20 lg:top-6/10">
                            <img class="w-44 h-44 rounded-full mx-auto
                                border-4 border-solid border-white object-cover" src="{{ $users[0]->AnhDaiDien }}" alt=""></a>
                            <p class="font-bold flex text-center text-3xl py-2 dark:text-white 
                            justify-center" style="font-family: system-ui;">{{ $users[0]->Ho . ' ' . $users[0]->Ten }}
                                <span class="ml-3 mt-3.5 bg-blue-500 rounded-full 
                                text-sm font-bold text-white w-4 h-4 flex">
                                    <i class='bx bx-check flex justiy-center items-center '></i>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </form>
            <div class="w-full relative">
                <div class="mx-auto text-center py-4 dark:text-white w-63%" style="margin-top: 68px;">
                    <span class="outline-none">{{ $users[0]->MoTa }}</span>
                    <br>
                </div>
            </div>
            <hr class="w-full md:w-4/5 lg:w-3/4 md:mx-auto xl:w-full mb-2 bg-gray-200 
                    dark:border-dark-second border-solid border-t-2">
            @endif
        </div>
        <!-- head profile -->

        <!-- relationship -->
        <div class="w-full relative mx-auto md:w-4/5 lg:w-3/4 md:mx-auto xl:w-63% hidden" id="moiQuanHe">
            @if ($user[0]->IDTaiKhoan == $users[0]->IDTaiKhoan)
            @include('Component/Relationship/Owner')
            @elseif (sizeof($relationShip) == 0)
            @include('Component/Relationship/NotFriend')
            @elseif ($relationShip[0]->TinhTrang == 0)
            @include('Component/Relationship/NotFriend')
            @elseif ($relationShip[0]->TinhTrang == 1)
            @include('Component/Relationship/SendRequest')
            @elseif ($relationShip[0]->TinhTrang == 2)
            @include('Component/Relationship/ReciviceRequest')
            @elseif ($relationShip[0]->TinhTrang == 3)
            @include('Component/Relationship/Friend')
            @endif
        </div>
        <!-- relationship -->

        <!-- main -->
        <div class="w-full relative bg-gray-100 dark:bg-dark-main pt-3 hidden" id="mainContentProfile">
            <div id="place_load_about" class="mx-auto relative w-full lg:flex xl:w-63% 
                md:w-4/5 lg:w-3/4 md:mx-auto lg:flex-wrap rounded-lg">
                <!-- content -->
                @switch($paths[count($paths) - 1])

                @case('friends')
                @include('Component\Category\Friends',['data' => $data])
                @break

                @case('about')
                <div class="w-full dark:bg-dark-second flex my-4 rounded-lg">
                    @include('Component\About\Category',['data' => $users,
                    'idTaiKhoan' => $users[0]->IDTaiKhoan])
                    <div class="w-3/4 px-3" id="detailAbout">
                        @include('Component\About\Dashboard',[
                        'idTaiKhoan' => $users[0]->IDTaiKhoan,
                        'idMain' => $user[0]->IDTaiKhoan,
                        'idView' => $users[0]->IDTaiKhoan])
                    </div>
                </div>
                @include('Component\Category\Friends',['data' => $data])
                @include('Component\Category\Pictures')
                @include('Component\Category\Video')
                @include('Component\Category\Story')
                @break

                @case('pictures')
                @include('Component\Category\Pictures')
                @include('Component\Category\Video')
                @include('Component\Category\Story')
                @break;

                @default

                @php
                $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $users[0]->IDTaiKhoan)->get()[0]->JsonGioiThieu;
                $json = json_decode($json);
                @endphp

                <div class="w-full lg:flex" id="activeLoadPost">

                    <!-- left -->
                    <div id="profileLeft" class="w-full lg:w-2/5">

                        <!-- about -->
                        @include('Component/Profile/About' , ['json' => $json])
                        <!-- about -->

                        <!-- images -->
                        @include('Component/Profile/Images' , ['images' => $images])
                        <!-- images -->

                        <!-- friends -->
                        @include('Component/Profile/Friends' , ['friendsGet' => $friendsGet])
                        <!-- friends -->

                    </div>
                    <!-- left -->

                    <!-- right -->
                    <div class="w-full bg-white dark:bg-dark-main mx-auto my-4 rounded-lg lg:w-3/5">

                        <!-- load post -->
                        @if ($user[0]->IDTaiKhoan == $users[0]->IDTaiKhoan)
                        @include('Component/Post/Child/WritePost',['users' => $users])
                        @else
                        @include('Component/Post/Child/WriteAnyThing',['users' => $users])
                        @endif
                        <!-- load post -->

                        <!-- load post -->
                        <div class="timeline">
                            <input type="hidden" name="indexPost" id="indexPost" value="0">
                        </div>
                        <!-- load post -->

                    </div>
                    <!-- right -->

                </div>
                @break
                @endswitch
                <!-- content -->

            </div>
        </div>
        <!-- main -->

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
        <div class="w-full px-4 flex z-0 md:w-full lg:w-full xl:w-1/2 ml-auto fixed 
        -bottom-1 right-20" id="placeChat">
        </div>
        <!-- place show chat -->

        <!-- place show notify -->
        <div class="w-80 fixed bottom-3 left-5" id="notifyShow">
        </div>
        <!-- place show notify -->
        @endif

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
        var users_id = '{{ $users_id }}';
        var changeValue = '"';
        var position = 2;
        var user = '{{ $user_id }}';
        var users = '{{ $users_id }}';
        var arrayImage = new Array();
        store.set('imageAndVideoPost', new Array());
        store.set('imageAndVideoPostEdit', new Array());
        var action = 'inactive';
        var config = {
            routes: {
                ProcessAjaxDashboardAbout: "{{ route('ProcessAjaxDashboardAbout') }}",
                ProcessAjaxWorkAndStudyAbout: "{{ route('ProcessAjaxWorkAndStudyAbout') }}",
                ProcessAjaxPlaceLivedAbout: "{{ route('ProcessAjaxPlaceLivedAbout') }}",
                ProcessAjaxInfoSimpleAndContactAbout: "{{ route('ProcessAjaxInfoSimpleAndContactAbout') }}",
                ProcessAjaxFamilyAndRelationshipAbout: "{{ route('ProcessAjaxFamilyAndRelationshipAbout') }}",
                ProcessAjaxDetailAboutUserAbout: "{{ route('ProcessAjaxDetailAboutUserAbout') }}",
                ProcessAjaxEventLifeAbout: "{{ route('ProcessAjaxEventLifeAbout') }}"
            }
        };
        if (users_id != "")
            setTimeout(function() {
                $('#timeLineFirstProfile').remove();
                $('#firstContentProfile').removeClass('hidden');
                setTimeout(function() {
                    $('#moiQuanHe').removeClass('hidden');
                    $('#mainContentProfile').removeClass('hidden');
                }, 500)
                if ($('#activeLoadPost').length > 0) {
                    if (action == 'inactive') {
                        loading();
                        loadingPostProfile(0, '{{ $users_id }}');
                    }
                    $(window).scroll(function() {
                        if ($(window).scrollTop() + $(window).height() - 700 > $(".timeline").height() &&
                            action == 'inactive') {
                            action = 'active';
                            loading();
                            setTimeout(function() {
                                loadingPostProfile($('#indexPost').val(), '{{ $users_id }}');
                            }, 500);
                        }
                    });
                }
            }, 400)

        $('#modalHeaderRight').html('')

        var pusher = new Pusher('5064fc09fcd20f23d5c1', {
            cluster: 'ap1'
        });

        var channel = pusher.subscribe('test.' + '{{ $user_id }}');
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
    </script>
</body>

</html>