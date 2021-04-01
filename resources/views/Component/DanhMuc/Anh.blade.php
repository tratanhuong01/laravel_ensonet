<?php

use App\Process\DataProcessFour;
use Illuminate\Support\Facades\Session;

$users = Session::get('users')[0];

?>

<div class="w-full mx-auto py-2 pt-3 dark:bg-dark-second rounded-lg">
    <input type="hidden" name="indexOfPicture" id="indexOfPicture" value="0">
    <input type="hidden" name="typeViewOfPicture" id="typeViewOfPicture" value="">
    @include('Timeline/Picture')
    <div class="w-full hidden" id="mainPic">
        <div class="w-full px-3 py-2">
            <div class="font-bold w-full py-2.5" style="font-size: 18px;">
                <p class="py-2 dark:text-white">Ảnh
                <p>
                <ul class="flex" style="font-size: 15px;">
                    <li onclick="loadPicture('PictureHaveFaceOfUser',
                    '{{ $users->IDTaiKhoan }}')" class="cursor-pointer py-2 px-4 text-center
                     border-blue-500 border-solid border-b-4 text-blue-500">
                        Ảnh có mặt bạn</li>
                    <li onclick="loadPicture('PictureOfUser',
                    '{{ $users->IDTaiKhoan }}')" class="cursor-pointer py-2 px-4 text-center 
                    text-gray-600 dark:text-white">Ảnh của Hưởng</li>
                    <li onclick="loadPicture('Album',
                    '{{ $users->IDTaiKhoan }}')" class="cursor-pointer py-2 px-4 text-center 
                    text-gray-600 dark:text-white">Album</li>
                </ul>
            </div>

            <div class="w-full" id="main-friends">
                <?php
                $imageTag = DataProcessFour::sortImageByTagOfUser($users->IDTaiKhoan);
                ?>
                <style>
                    .case:hover .edit {
                        display: block;
                    }
                </style>
                @include('Component/Child/HinhAnh',['imageTag' => array_slice($imageTag,0,15)])
            </div>
        </div>
        <!-- <div class="w-full mx-auto my-2">
            <a class="block p-2.5 text-center font-bold rounded-lg bg-gray-300 dark:bg-dark-third dark:text-white" href="">Xem tất cả</a>
        </div> -->
    </div>
</div>
<script>
    var action = 'inactive'
    setTimeout(function() {
        $('.removeTimelinePicture').remove()
        $('#mainPic').removeClass('hidden')
    }, 10);
    if (action == 'inactive') {
        loadTimeLinePicture($('#indexOfPicture').val(), $('#typeViewOfPicture').val(),
            '{{ $users->IDTaiKhoan }}')
    }
    $(window).scroll(function() {
        if ($(window).scrollTop() + $(window).height() - 900 > $("#mainChild").height() &&
            action == 'inactive') {
            action = 'active';
            setTimeout(function() {
                loadTimeLinePicture($('#indexOfPicture').val(), $('#typeViewOfPicture').val(),
                    '{{ $users->IDTaiKhoan }}')
                $('.mainChild').removeClass('hidden');
            }, 500);
        }
    });
</script>