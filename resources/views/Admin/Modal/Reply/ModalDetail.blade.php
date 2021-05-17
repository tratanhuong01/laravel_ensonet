<?php

use App\Admin\Query;

?>
<div id="modal-one" class=" w-11/12 fixed top-50per left-50per transform-translate-50per pb-2 pt-2 
opacity-100 bg-white z-50 border-2 border-solid border-gray-300 sm:w-4/5 sm:mt-12 lg:w-3/4 xl:w-2/3
xl:mt-4 dark:border-dark-main shadow-1 rounded-lg">
    <div class="w-full bg-white dark:bg-dark-second pl-2 pr-4  block z-10 text-center 
    relative">
        <p class="font-bold text-2xl pt-1 text-gray-700">Chi tiết về bài đăng
        </p>
        <span onclick="closeModalAd()" class="bg-gray-300 px-2.5 dark:text-white font-bold 
        rounded-full cursor-pointer text-3xl absolute top-0 right-3">&times;</span>
        <hr class="my-3">
    </div>
    <div class="w-full flex flex-wrap">
        <div class="w-1/2 px-3">
            <div class="w-full flex mb-3">
                <?php $url = json_decode($reply[0]->DuongDanHinhAnh) ?>
                <div class="w-1/12 relative">
                    <span class="cursor-pointer absolute top-1/2 left-1/2" style="transform: translate(-50%,-50%);">
                        <i class="bx bxs-chevrons-left text-xl rounded-full 
                        px-2.5 py-1.5 bg-gray-200"></i>
                    </span>
                </div>
                <div class="w-10/12 px-2">
                    <img src="{{ $url[0]->DuongDan }}" class="w-auto mx-auto max-h-80" alt="">
                </div>
                <div class="w-1/12 relative">
                    <span class="cursor-pointer absolute top-1/2 left-1/2" style="transform: translate(-50%,-50%);">
                        <i class="bx bxs-chevrons-right text-xl rounded-full 
                        px-2.5 py-1.5 bg-gray-200"></i>
                    </span>
                </div>
            </div>
            <div class="w-full flex">
                @foreach($url as $key => $value)
                <div class="w-1/4">
                    <img src="{{ $value->DuongDan }}" class="w-full h-full 
                    object-cover p-1" alt="">
                </div>
                @endforeach
            </div>
        </div>
        <div class="w-1/2 border-solid border-gray-200 border-l-2 
        shadow-xl px-3">
            <ul class="w-full">
                <li class="w-full p-2">ID tài khoản :
                    <span class="cursor-pointer bg-green-500 px-3 py-1.5 text-sm rounded-3xl 
                        font-bold text-white">{{ $reply[0]->IDTaiKhoan }}</span>
                </li>
                <li class="w-full p-2">Nguời yêu cầu :
                    <span class="cursor-pointer bg-green-500 px-3 py-1.5 text-sm rounded-3xl 
                        font-bold text-white">{{ $reply[0]->Ho . ' ' . $reply[0]->Ten }}</span>
                </li>
                <li class="w-full p-2">Loại phản hồi :
                    @switch($reply[0]->LoaiYeuCau)
                    @case('0')
                    <span class="bg-green-500 px-3 py-1.5 text-sm rounded-3xl 
                    font-bold text-white">Cấp lại tài khoản</span>
                    @break
                    @case('1')
                    <span class="bg-green-500 px-3 py-1.5 text-sm rounded-3xl 
                    font-bold text-white">Quá trình sử dụng</span>
                    @break
                    @endswitch
                </li>
                <li class="w-full p-2 max-h-32 overflow-y-auto border-gray-200 shadow-lg
                wrapper-content-right border-2 border-solid">Nội Dung :
                    <span class="font-bold">{{ $reply[0]->NoiDungYeuCau }}</span>
                </li>
                <ul class="mx-auto justify-center py-10 flex">
                    <li class="bg-green-500 px-5 py-3 text-xm rounded-3xl 
                    font-bold text-white mr-4 cursor-pointer">Mở tài khoản</li>
                    <li class="bg-yellow-500 px-5 py-3 text-xm rounded-3xl 
                    font-bold text-white mr-4 cursor-pointer">Đang chờ</li>
                    <li class="bg-red-500 px-5 py-3 text-xm rounded-3xl 
                    font-bold text-white cursor-pointer">Từ chối</li>
                </ul>
            </ul>
        </div>
    </div>
</div>