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
        <div class="w-full flex z-10 pt-11 bg-gray-100 dark:bg-dark-main lg:w-full lg:mx-auto xl:w-full" id="content">
            <div class="w-1/4 p-4 shadow-2xl">
                <p class="w-full flex py-6">
                    <span class="font-bold text-xl dark:text-white">Tin Của Bạn</span>
                </p>
                <div class="w-full flex pb-3">
                    <a href=""><img class="w-20 h-20 p-1.5 shadow-xl rounded-full " src="/img/avatar.jpg" alt=""></a>
                    <a href="" class="py-7 px-3.5 dark:text-white font-bold">Trà Hưởng</a>
                </div>
                <hr>
            </div>
            <div class="w-3/4 story-right">
                <div class="w-43per mx-auto relative top-1/4 flex">
                    <input type="file" class="hidden" name="" id="createStoryImage">
                    <label class="w-1/2 m-2 h-80 relative" for="createStoryImage">
                        <div class="w-full h-80 bg-blue-400 rounded-lg">
                            <div class="w-full absolute top-1/2 left-1/2 text-center cursor-pointer" style="transform: translate(-50%,-50%);">
                                <i class="far fa-file-image shadow-md dark:bg-dark-third dark:text-white bg-white text-2xl rounded-full px-4 py-2.5"></i><br>
                                <p class="text-center text-white font-bold p-2">Tạo tin ảnh</p>
                            </div>
                        </div>
                    </label>
                    <?php $pathStoriesText = 'stories/create/text'; ?>
                    <div onclick="window.location.href = '{{ url($pathStoriesText) }}'" class="w-1/2 h-80 bg-pink-400 relative m-2 rounded-lg">
                        <div class="w-full absolute top-1/2 left-1/2 text-center cursor-pointer" style="transform: translate(-50%,-50%);">
                            <i class="fas fa-font shadow-md bg-white dark:bg-dark-third dark:text-white text-2xl rounded-full px-4 py-2.5"></i><br>
                            <p class="text-center text-white font-bold p-2">Tạo tin dạng văn bản</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function display() {
        var heightScreen = window.innerHeight - 64;
        var storyRight = document.getElementsByClassName("story-right")[0];
        storyRight.style.height = heightScreen + "px";
    }
    display();
</script>

</html>