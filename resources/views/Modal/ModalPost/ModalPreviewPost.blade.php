<link href="https://vjs.zencdn.net/7.11.4/video-js.css" rel="stylesheet" />
<script src="https://vjs.zencdn.net/7.11.4/video.min.js"></script>
<div id="modal-three" class=" w-11/12 fixed top-50per left-50per dark:bg-dark-second 
transform-translate-50per pb-2 pt-2 opacity-100 bg-white z-50 border-2 border-solid border-gray-300 
 sm:w-4/5 sm:mt-12 lg:w-3/5 xl:w-5/12 xl:mt-4 dark:border-dark-main shadow-1 rounded-lg" style="width: 743px;">
    <div class="w-full bg-white dark:bg-dark-second pl-2 pr-4 fixed top-2 block z-10 text-center 
    dark:text-white">
        Xem trước
        <span onclick="returnCreatePosts('modal-two','modal-three')" class="bg-gray-300 px-2.5 dark:text-white font-bold
                     rounded-full dark:bg-dark-second cursor-pointer absolute text-3xl top-2 right-4">&times;</span>
    </div>
    <div id="all" class="w-full dark:bg-dark-second pt-16" style="max-height: 480px;height: 480px;">
        <div id="loadData" class="'w-full text-center bg-gray-100 dark:bg-dark-second relative" style="max-height: 420px;height: 420px;">
            @if($type == 'video')
            <video id="my-video" class="video-js" controls preload="auto" poster="/video/review.mp4" data-setup="{}" style="width: 100%;max-height:400px;height: 400px;">
                <source src="{{ $url }}" type="video/mp4" />
            </video>
            @else
            <img src="{{ $url }}" class="max-w-full mx-auto object-cover" style="height: 420px;" alt="">
            @endif
        </div>
    </div>
</div>