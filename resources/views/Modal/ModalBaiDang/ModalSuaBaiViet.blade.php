<?php

use Illuminate\Support\Facades\Session;

$user = Session::get('user');

?>
<div id="modal-one" class="shadow-sm border border-solid border-gray-500 py-3 pl-1.5 pr-1.5 pt-0
bg-white w-full fixed z-50 top-1/2 left-1/2 dark:bg-dark-second rounded-lg 
sm:w-10/12 md:w-2/3 lg:w-2/3 xl:w-1/3" style="transform: translate(-50%,-50%);z-index:10;">
    <form action="" id="formPost" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="IDQuyenRiengTu" id="IDQuyenRiengTu" value="">
        <div class="w-full text-center">
            <p class="text-2xl font-bold p-2.5 dark:text-white">Sửa bài viết</p>
            <span id="dongSuaBaiViet" class=" rounded-full bg-aliceblue px-3 py-1 text-2xl font-bold
                absolute right-4 top-2 cursor-pointer dark:text-gray-300">&times;</span>
            <hr>
        </div>
        <div class="w-full flex px-0 py-2">
            <div class="w-2/12 pt-1">
                <a href=""><img class="w-14 h-14 rounded-full object-cover mx-auto" src="{{ $post[0]->AnhDaiDien }}" alt=""></a>
            </div>
            <div class="w-11/12">
                <p class="p-1 pt-0 font-bold dark:text-white">{{ $post[0]->Ho . ' ' . $post[0]->Ten }}</p>
                <div class="py-0 px-1 w-auto w-1/4 bg-gray-300 dark:bg-dark-third" style="border-radius: 30px;">
                    <ul onclick="selectPrivacy()" id="selectPrivacyMain" class="flex text-xs relative cursor-pointer">
                        <li class="px-0.5 py-1.5"><i class="fas fa-globe-europe dark:text-white"></i></li>
                        <li class="px-0.5 py-1.5"><b class="dark:text-white">&nbsp;Công Khai&nbsp;&nbsp;</b></li>
                        <li class="px-0.5 py-1.5"><i style="position: absolute;top: 6px;" class="fas fa-sort-down dark:text-white"></i>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="w-full mt-2.5 wrapper-content-right overflow-y-auto" style="max-height:365px;">
            <div class="w-full relative" id="main-textarea-post">
                <textarea id="textarea-post" oninput="checkValueTextAre()" class="w-full border-none dark:text-white text-xm px-2 pt-2 py-6 outline-none overflow-hidden dark:bg-dark-second
            resize-none" name="content" id="" placeholder="{{ $post[0]->Ten }} ơi, Bạn đang nghĩ gì thế?">{{ $post[0]->NoiDung }}</textarea>
                <button class="absolute right-2 bottom-2 bg-white outline-none dark:bg-dark-second">
                    <i class="far fa-smile text-gray-600 text-2xl dark:text-gray-300"></i>
                </button>
            </div>
            <div class="w-full mt-2.5 px-2 flex flex-wrap relative" id="imagePost">
                <img src="" alt="" id="imgPost1">
                <ul class="w-full flex flex-wrap relative">
                    @for ($i = 0 ; $i < sizeof($post) ; $i++) @if ($post[$i]->DuongDan == NULL)
                        @elseif (sizeof($post) == 1 && $post[$i]->DuongDan != NULL)
                        <li class="w-full"><img class="w-full p-1 object-cover" style="height:650px;" src="/{{ $post[$i]->DuongDan }}" alt=""></li>
                        @else
                        @if (sizeof($post) > 4 && $i == 3)
                        <div class="p-1 object-fill rounded-lg absolute bottom-0 right-0" style="width:232px;height:250px;background:rgba(0, 0, 0, 0.5);">
                            <span class="text-5xl font-bold absolute top-1/2 left-1/2 text-white" style="transform:translate(-50%,-50%);">{{ '+'. (sizeof($post) - 4) }}</span>
                        </div>
                        <li class=""><img class="p-1 object-cover rounded-lg" style="width:232px;height:250px;" src="/{{ $post[$i]->DuongDan }}" alt=""></li>
                        @break;
                        @else
                        <li class=""><img class="p-1 object-cover rounded-lg" style="width:232px;height:250px;" src="/{{ $post[$i]->DuongDan }}" alt=""></li>
                        @endif
                        @endif
                        @endfor
                </ul>
            </div>
        </div>
        <div class="w-full p-2 border-2 border-solid border-gray-300 mt-4">
            <ul class="w-full flex">
                <li onclick="clickOpenModal(0)" class="cursor-pointer pr-16 w-40">
                    <p class="pl-2.5 dark:text-white font-bold text-sm">Thêm vào bài viết</p>
                </li>
                <li class="cursor-pointer "><i style="color: #9567EF;font-size: 25px;padding: 2px 4px;" class="fas fa-video"></i>
                    &nbsp;&nbsp;</li>
                <input type="file" onchange="changeUploadFiles(this)" id="uploadFileS" name="files[]" multiple="multiple" class="hidden">
                <label for="uploadFileS">
                    <li class="cursor-pointer "><i style="color: #45B560;font-size: 25px;padding: 2px 4px;" class="far fa-image"></i>
                        &nbsp;&nbsp;
                    </li>
                </label>

                <li onclick="clickOpenModal(1)" class="eOpenModal cursor-pointer "><i style="color: #EAB026;font-size: 25px;padding: 2px 4px;" class="fas fa-smile"></i> &nbsp;&nbsp;
                </li>
                <li onclick="clickOpenModal(3)" class="eOpenModal cursor-pointer "><i style="color: #1771E6;font-size: 25px;padding: 2px 4px;" class="fas fa-user-tag"></i>
                    &nbsp;&nbsp;</li>
                <li onclick="clickOpenModal(2)" class="eOpenModal cursor-pointer "><i style="color: #E94F3A;padding-right: 9px;font-size: 25px;padding: 2px 4px;" class="fas fa-map-marker-alt"></i></li>
                <li onclick="clickOpenModal(4)" class="eOpenModal cursor-pointer "><i style="color: #28B19E;font-size: 25px;padding: 2px 4px;" class="fas fa-radiation"></i>
                </li>
            </ul>
        </div>
        <div class="w-full text-center my-2.5 mx-0">
            <button onclick="postFiles()" class="w-full p-2.5 border-none text-white cursor-pointer" id="button-post" style="background-color: gray;border-radius: 20px;cursor:not-allowed;" type="button"><b>Sửa</b></button>
        </div>
    </form>
</div>