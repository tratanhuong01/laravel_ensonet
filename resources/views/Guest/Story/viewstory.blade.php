<?php

use App\Models\StringUtil;
use Illuminate\Support\Facades\Session;
use App\Process\DataProcessThird;

?>

<!DOCTYPE html>
@if (session()->has('user'))
@php
$user = Session::get('user')
@endphp
<html lang="en" class="{{ Session::get('user')[0]->DarkMode == '0' ? '' : 'dark' }}">
@else
<html lang="en">
@endif

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>(1) Xem tin | Ensonet</title>
    @include('Head/css')
    <script src="/js/ajax/Story/ajax.js"></script>
</head>

<body>
    <div class="w-full bg-gray-100 dark:bg-dark-main h-screen relative" id="main">
        @include('Header')
        <div class="w-full flex z-10 pt-16 bg-gray-100 dark:bg-dark-main lg:w-full lg:mx-auto xl:w-full" id="content">
            <div class="w-1/4 bg-white dark:bg-dark-second p-4 shadow-2xl wrapper-content-right overflow-y-auto">
                <div class="w-full flex">
                    <span style="font-size: 22px;" class="font-bold pb-4 dark:text-white">
                        Tin Của Bạn</span>
                </div>
                @if (count($allStory[0]) == 0)
                <div class="cursor-pointer w-full flex pb-2.5">
                    <div class="w-2/12">
                        <i class="fas fa-plus p-5 text-green-600 bg-gray-100 rounded-full"></i>
                    </div>
                    <div class="w-10/12 pl-3">
                        <p class="font-bold pb-1 dark:text-white">Tạo tin</p>
                        <p class="text-sm color-word">Bạn có thể chia sẽ hoặc viết gì đó.</p>
                    </div>
                </div>
                @else
                @php
                $pathMainUs = 'stories/'.$allStory[0][0]->IDTaiKhoan
                @endphp
                <div onclick="window.location.href='{{ url($pathMainUs) }}'" class="w-full flex my-2 hover:bg-gray-200 cursor-pointer rounded-lg p-2
                 dark:hover:bg-dark-third ">
                    <div class="w-23per">
                        <img id="img{{ $allStory[0][0]->IDTaiKhoan }}" src="/{{ $allStory[0][0]->AnhDaiDien }}" class="
                        rounded-full p-1 {{ DataProcessThird::checkIsViewStoryOfUser($allStory[0][0]->IDTaiKhoan,$user[0]->IDTaiKhoan) == 0 ? 'border-4 border-white' 
                            : 'border-4 border-blue-500' }} object-cover 
                    border-solid" alt="" style="width: 65px;height: 65px;">
                    </div>
                    <div class="w-3/4">
                        <p class="font-bold pt-2 dark:text-white"><a href="">{{ $allStory[0][0]->Ho . ' ' . $allStory[0][0]->Ten }}</a></p>
                        <p class="color-word text-xm"><span id="tag{{ $allStory[0][0]->IDTaiKhoan }}" class="text-blue-400">
                                {{ DataProcessThird::checkIsViewStoryOfUser($allStory[0][0]->IDTaiKhoan,$user[0]->IDTaiKhoan) == 0 ? '' 
                            : DataProcessThird::checkIsViewStoryOfUser($allStory[0][0]->IDTaiKhoan,$user[0]->IDTaiKhoan) . '  thẻ mới  ' }}
                            </span>
                            <span class="font0-bold text-sm">{{ StringUtil::CheckDateTimeStory($allStory[0][count($allStory[0])-1]->ThoiGianDangStory) }}</span>
                        </p>
                    </div>
                </div>
                @endif
                <hr class="p-2 my-3">
                @for ($i = 1 ; $i < count($allStory) ; $i++) @php $pathIStories='stories/' .$allStory[$i][0]->IDTaiKhoan @endphp
                    <div onclick="window.location.href='{{ url($pathIStories) }}'" class="w-full flex my-2 hover:bg-gray-200 cursor-pointer rounded-lg p-2
                 dark:hover:bg-dark-third ">
                        <div class="w-23per">
                            <img id="img{{$allStory[$i][0]->IDTaiKhoan}}" src="/{{ $allStory[$i][0]->AnhDaiDien }}" class="rounded-full p-1 
                            {{ DataProcessThird::checkIsViewStoryOfUser($allStory[$i][0]->IDTaiKhoan,$user[0]->IDTaiKhoan) == 0 ? 'border-4 border-white' 
                            : 'border-4 border-blue-500' }}
                    border-solid object-cover" alt="" style="width: 65px;height: 65px;">
                        </div>
                        <div class="w-3/4">
                            <p class="font-bold pt-2 dark:text-white"><a href="">{{ $allStory[$i][0]->Ho . ' ' . $allStory[$i][0]->Ten }}</a></p>
                            <p class="color-word text-xm"><span id="tag{{$allStory[$i][0]->IDTaiKhoan}}" class="text-blue-400">
                                    {{ DataProcessThird::checkIsViewStoryOfUser($allStory[$i][0]->IDTaiKhoan,$user[0]->IDTaiKhoan) == 0 ? '' 
                            : DataProcessThird::checkIsViewStoryOfUser($allStory[$i][0]->IDTaiKhoan,$user[0]->IDTaiKhoan) . '  thẻ mới  ' }}
                                </span>
                                <span class=" font0-bold text-sm">{{ StringUtil::CheckDateTimeStory($allStory[$i][count($allStory[$i])-1]->ThoiGianDangStory) }}</span>
                            </p>
                        </div>
                    </div>
                    @endfor
            </div>
            <div class="w-3/4 bg-gray-200 dark:bg-dark-main story-right ">
                @if (count($story) == 0)
                <div class="w-full flex relative h-full">
                    <div class="w-40 h-32 text-center absolute left-1/2" style="top:40%;transform: translate(-50%,-50%);">
                        <svg style="width: 100px;height: 100px;margin: auto;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 112 112">
                            <defs>
                                <clipPath id="a">
                                    <rect width="81.38" height="68.11" x="12.34" y="18.4" fill="none" rx="6.69" />
                                </clipPath>
                            </defs>
                            <rect width="81.38" height="68.11" x="20.91" y="27.89" fill="#7a7d81" rx="6.69" />
                            <g clip-path="url(#a)">
                                <rect width="81.38" height="68.11" x="12.34" y="18.4" fill="#bcc0c4" rx="6.69" />
                                <path fill="#fff" d="M7.44 89.57l32.5-42.76 13.09 13.04 27.89-31.9 21.42 27.71 1.06 37.49H8.5l-1.06-3.58z" />
                            </g>
                            <circle cx="27.57" cy="35.69" r="6.65" fill="#1876f2" />
                        </svg>
                        <p class="text-center font-bold dark:text-white text-xl">
                            Chọn tin để mở
                        </p>
                    </div>
                </div>
                @else
                @if ($story[0]->IDTaiKhoan == Session::get('user')[0]->IDTaiKhoan)
                @include('Guest/Story/Child/UserStory',[
                'story' => $story,
                'allStory' => $allStory
                ])
                @else
                @include('Guest/Story/Child/FriendsStory',[
                'story' => $story,
                'allStory' => $allStory
                ])
                @endif
                @endif
            </div>
        </div>
    </div>
    <audio class="hidden" src="/mp3/VivaLaVida.mp3" id="myAudio"></audio>
</body>
<script>
    var countStory = Number('{{ count($story) }}');
    var data = 0;
    var s
    var numberStory = 0;

    function Audio() {
        if (countStory <= 0) {

        } else {
            $.ajax({
                method: "POST",
                url: "{{ route('ProcessLoadAndAddViewStory') }}",
                data: {
                    IDStory: '@isset($story[0]->IDStory) {{ $story[0]->IDStory }} @endisset',
                    IDTaiKhoan: '{{ Session::get("user")[0]->IDTaiKhoan }}'
                },
                success: function(responses) {
                    $('#viewStoryDetailFull').html(responses.ViewStoryDetail);
                },
                error: function(err) {
                    console.log(err);
                }
            });
            if ($('#btnClickStart').hasClass('far fa-play-circle')) {
                if (Math.round(data) == 100) {
                    numberStory++;
                    window.clearInterval(s);
                    $('#btnClickStart').removeClass('far fa-stop-circle');
                    $('#btnClickStart').addClass('far fa-play-circle');
                    data = 0;
                    document.getElementById('loadingAudio' + numberStory).style.width = data + 0.05 + "%";
                    s = setIntervalLoad(s);
                } else {
                    s = setIntervalLoad(s);
                }
                document.getElementById('myAudio').play();
                document.getElementById("myAudio").muted = false;
                $('#btnClickStart').removeClass('far fa-play-circle');
                $('#btnClickStart').addClass('far fa-stop-circle');
            } else {
                window.clearInterval(s);
                $('#btnClickStart').removeClass('far fa-stop-circle');
                $('#btnClickStart').addClass('far fa-play-circle');
                document.getElementById('myAudio').pause();
                document.getElementById("myAudio").muted = false;
            }
        }
    }
    window.onload = function() {
        var heightScreen = window.innerHeight - 64;
        document.getElementsByClassName("story-right")[0].style.height = heightScreen + "px";
        document.getElementsByClassName("story-right")[1].style.height = heightScreen - 30 + "px";
        var marginY = 0;
        if (document.getElementsByClassName("img-story")[0].offsetHeight >= 688) {
            marginY = 0;
            document.getElementsByClassName("wrapper-content-right")[0].style.maxHeight = heightScreen + "px";
        } else {
            marginY = document.getElementsByClassName("story-right")[1].offsetHeight -
                document.getElementsByClassName("img-story")[0].offsetHeight
        }
        document.getElementsByClassName("img-story")[0].style.margin = marginY = (marginY <= 0 ? 0 : ((marginY / 2) - 20)) + "px 0px";
        document.getElementsByClassName("img-story")[0].style.maxHeight = document.getElementsByClassName("story-right")[1].offsetHeight + 10 + "px"
        setTimeout(function() {
            document.getElementById('play').click();
        }, 500)

    }

    function setIntervalLoad(s) {
        s = window.setInterval(function() {
            if (Math.round(data) === 100) {
                data = 0;
                window.clearInterval(s);
                if (numberStory >= countStory - 1) {
                    window.clearInterval(s);
                    $.ajax({

                    })
                } else {
                    numberStory++;
                    document.getElementById('myAudio').pause();
                    s = setIntervalLoad(s);
                    // $('#btnClickStart').removeClass('far fa-stop-circle');
                    // $('#btnClickStart').addClass('far fa-play-circle');
                    $.ajax({
                        method: "POST",
                        url: '{{ url("ProcessLoadStory") }}',
                        data: {
                            Index: numberStory,
                            IDTaiKhoan: '@isset($story[0]->IDTaiKhoan) {{ ($story[0]->IDTaiKhoan) }} @endisset'
                        },
                        success: function(response) {
                            $.ajax({
                                method: "POST",
                                url: "{{ route('ProcessLoadAndAddViewStory') }}",
                                data: {
                                    IDStory: response.IDStory,
                                    IDTaiKhoan: '{{ Session::get("user")[0]->IDTaiKhoan }}'
                                },
                                success: function(responses) {
                                    $('#img' + '@isset($story[0]->IDTaiKhoan){{($story[0]->IDTaiKhoan)}}@endisset').removeClass(responses.Border)
                                    $('#tag' + '@isset($story[0]->IDTaiKhoan){{($story[0]->IDTaiKhoan)}}@endisset').html(responses.SoTheMoi)
                                    $('.img-story').attr('src', "/" + response.DuongDan);
                                    $('#timeStory').html(response.ThoiGianDangStory)
                                    if ($('#' + response.IDStory).length > 0)
                                        changeStoryImage(document.getElementById(response.IDStory), 0)
                                    $('#viewStoryDetailFull').html(responses.ViewStoryDetail);
                                    $('#myAudio').attr('src', '/mp3/Mood.mp3');
                                    document.getElementById('myAudio').play();
                                },
                                error: function(err) {
                                    console.log(err);
                                }
                            });
                        }
                    });
                }
            } else {
                data += 0.1;
                document.getElementById('loadingAudio' + numberStory).style.width = data + "%";
            }
        }, 11)
        return s;
    }

    function muteAudio() {
        if ($('#muteOrUnMute').hasClass('fas fa-volume-up')) {
            $('#muteOrUnMute').removeClass('fas fa-volume-up');
            $('#muteOrUnMute').addClass('fas fa-volume-mute');
            $('#myAudio').prop('muted', true);
        } else {
            $('#muteOrUnMute').removeClass('fas fa-volume-mute');
            $('#muteOrUnMute').addClass('fas fa-volume-up');
            $('#myAudio').prop('muted', false);
        }
    }
</script>

</html>