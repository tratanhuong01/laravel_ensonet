<!DOCTYPE html>
@if (session()->has('user'))
<html lang="en" class="{{ Session::get('user')[0]->DarkMode == '0' ? '' : 'dark' }}">
@else
<html lang="en">
@endif

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo tin | Ensonet</title>
    @include('Head/css')
</head>

<body>
    <div class="w-full bg-gray-100 dark:bg-dark-main h-screen relative" id="main">
        @include('Header')
        <div class="w-full flex z-10 pt-16 bg-gray-100 dark:bg-dark-main lg:w-full lg:mx-auto xl:w-full" id="content">
            <div class="w-1/4 bg-white p-4 shadow-2xl wrapper-content-right overflow-y-auto">
                <div class="w-full flex">
                    <span style="font-size: 22px;" class="font-bold pb-4">Tin Của Bạn</span>
                </div>
                <div onclick="window.location.href = 'createStory.html'" class="cursor-pointer w-full flex pb-2.5">
                    <div class="w-2/12">
                        <i class="fas fa-plus p-5 text-green-600 bg-gray-100 rounded-full"></i>
                    </div>
                    <div class="w-10/12 pl-3">
                        <p class="font-bold pb-1">Tạo tin</p>
                        <p class="text-sm color-word">Bạn có thể chia sẽ hoặc viết gì đó.</p>
                    </div>
                </div>
                <hr class="p-2">
                <div class="w-full flex my-2 hover:bg-gray-200 cursor-pointer rounded-lg p-2">
                    <div class="w-23per">
                        <img src="/img/avatar.jpg" class="rounded-full p-1 border-4 border-blue-500 
                    border-solid" alt="" style="width: 65px;height: 65px;">
                    </div>
                    <div class="w-3/4">
                        <p class="font-bold pt-2"><a href="">Trà Hưởng</a></p>
                        <p class="color-word text-xm"><span class="text-blue-400">2 thẻ mới</span>&nbsp;&nbsp;1 giờ</p>
                    </div>
                </div>
                <div class="w-full flex my-2 hover:bg-gray-200 cursor-pointer rounded-lg p-2">
                    <div class="w-23per">
                        <img src="/img/Ads/ADS0001.jpg" class="rounded-full p-1 border-4 border-blue-500 
                    border-solid" alt="" style="width: 65px;height: 65px;">
                    </div>
                    <div class="w-3/4">
                        <p class="font-bold pt-2"><a href="">Trà Hưởng</a></p>
                        <p class="color-word text-xm"><span class="text-blue-400">2 thẻ mới</span>&nbsp;&nbsp;1 giờ</p>
                    </div>
                </div>
                <div class="w-full flex my-2 hover:bg-gray-200 cursor-pointer rounded-lg p-2">
                    <div class="w-23per">
                        <img src="/img/Ads/ADS0002.jpg" class="rounded-full p-1 border-4 border-blue-500 
                    border-solid" alt="" style="width: 65px;height: 65px;">
                    </div>
                    <div class="w-3/4">
                        <p class="font-bold pt-2"><a href="">Trà Hưởng</a></p>
                        <p class="color-word text-xm"><span class="text-blue-400">2 thẻ mới</span>&nbsp;&nbsp;1 giờ</p>
                    </div>
                </div>

            </div>
            <div class="w-3/4 bg-gray-200 story-right">
                <div class="w-3/5 mx-auto relative top-2 left-20 flex">
                    <div class="w-1/12 pr-4">
                        <i class="fas fa-chevron-left cursor-pointer px-5 py-3 bg-gray-300 relative 
                    top-1/2 left-1/2 rounded-full  hover:bg-white text-xl" style="transform: translate(-50%,-50%);"></i>
                    </div>
                    <div class="w-7/12 story-right bg-gray-400 relative m-2 rounded-lg relative">
                        <img src="/img/story/10000000013000002.png" class="w-full img-story" alt="">
                        <div class="w-full py-1 px-2 absolute top-1">
                            <div class="w-full pb-2">
                                <ul class="w-full flex">
                                    <li class="w-1/2 mr-1 cursor-pointer">
                                        <div id="loadingAudio" class="bg-white py-0.5 "></div>
                                    </li>
                                    <li class="w-1/2 bg-white py-0.5 cursor-pointer"></li>
                                </ul>
                            </div>
                            <div class="w-full flex">
                                <div class="w-2/12">
                                    <img src="img/avatar.jpg" class="w-12 h-12 rounded-full p-1" alt="">
                                </div>
                                <div class="w-1/2 pt-1">
                                    <p class="pb-1"><a href="" class="font-bold text-white">Trà Hưởng</a>
                                        &nbsp;<span class="text-sm text-white">Vừa xong</span></p>
                                    <p class="text-white text-sm">Mod(Remix) </p>
                                </div>
                                <div class="w-1/3">
                                    <ul class="w-full flex">
                                        <li onclick="startAudio()" class=" py-2 px-2 cursor-pointer">
                                            <i class="far fa-stop-circle text-white text-2xl"></i>
                                        </li>
                                        <li onclick="stopAudio()" class=" py-2 px-2 cursor-pointer">
                                            <i class="fas fa-volume-up text-white text-2xl"></i>
                                        </li>
                                        <li class=" py-2 px-2 cursor-pointer">
                                            <i class="fas fa-ellipsis-h text-white text-2xl"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="w-full p-2 absolute bottom-2 flex">
                            <div class="w-10/12 relative">
                                <input type="text" name="" id="" placeholder="Trả lời.." class="w-full p-2 rounded-3xl bg-gray-100">
                                <i class="far fa-paper-plane cursor-pointer absolute right-4 top-0.5 text-2xl text-gray-600"></i>
                            </div>
                            <div class="w-2/12 text-right pr-4">
                                <i class="fas fa-heart text-xl cursor-pointer text-red-600 text-3xl"></i>
                            </div>
                        </div>
                        <div class="w-1/4 bg-white flex p-1.5 absolute top-80 left-20 rounded-lg" style="transform: rotate(-25deg);">
                            <div class="w-1/4 pr-2">
                                <img src="/img/gai1.jpg" alt="">
                            </div>
                            <div class="w-3/4">
                                <p class="font-bold" style="font-size: 7px;">បទកំពុងល្បី 24kgoldn - Mood</p>
                                <p class="font-sm" style="font-size: 5px;">24kgoldn</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-1/12 pl-4">
                        <i class="fas fa-chevron-right cursor-pointer px-5 py-3 bg-gray-300 relative 
                    top-1/2 left-1/2 rounded-full  hover:bg-white text-xl" style="transform: translate(-50%,-50%);"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <audio class="hidden" src="/mp3/chill.mp3" id="myAudio"></audio>
</body>
<script>
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
    document.getElementsByClassName("img-story")[0].style.maxHeight = document.getElementsByClassName("story-right")[1].offsetHeight + "px"

    function startAudio() {
        document.getElementById('myAudio').play();
        document.getElementById("myAudio").muted = false;
    }

    function stopAudio() {
        document.getElementById("myAudio").muted = true;
    }
    var data = 0;
    var s = setInterval(function() {
        if (Math.round(data) === 100) {
            clearInterval(s);
        } else {
            data += 0.1;
            document.getElementById('loadingAudio').style.width = data + "%";
        }
    }, 10)
</script>

</html>