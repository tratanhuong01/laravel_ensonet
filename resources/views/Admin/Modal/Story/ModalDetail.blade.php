<?php

use App\Models\Amthanh;
use App\Models\Luotxemstory;

?>
<div id="modal-one" class=" w-11/12 fixed top-50per left-50per transform-translate-50per pb-2 pt-2 
opacity-100 bg-white z-50 border-2 border-solid border-gray-300 sm:w-4/5 sm:mt-12 lg:w-3/4 xl:w-2/3
xl:mt-4 dark:border-dark-main shadow-1 rounded-lg">
    <div class="w-full bg-white dark:bg-dark-second pl-2 pr-4  block z-10 text-center 
    relative">
        <p class="font-bold text-2xl pt-1 text-gray-700">Chi tiết về story
        </p>
        <span onclick="closeModalAd()" class="bg-gray-300 px-2.5 dark:text-white font-bold 
        rounded-full cursor-pointer text-3xl absolute top-0 right-3">&times;</span>
        <hr class="my-3">
    </div>
    <div class="w-full flex flex-wrap my-3">
        <div class="w-1/2 pr-3">
            <div class="w-full flex mb-3">
                <div class="w-2/12 relative">

                </div>
                <div class="w-8/12 px-2">
                    <img src="/{{ $story[0]->DuongDan }}" class="w-auto mx-auto object-cover" alt="" style="height: 440px;">
                </div>
                <div class="w-2/12 relative">

                </div>
            </div>
        </div>
        <div class="w-1/2 border-solid border-gray-200 border-l-2 
        shadow-xl px-3">
            <ul class="w-full">
                <li class="w-full p-2">ID Tài Khoản :
                    <span class="cursor-pointer bg-green-500 px-3 py-1.5 text-sm rounded-3xl 
                        font-bold text-white">{{ $story[0]->IDTaiKhoan }}</span>
                </li>
                <li class="w-full p-2">Nguời đăng :
                    <span class="bg-green-500 px-3 py-1.5 text-sm rounded-3xl 
                    font-bold text-white">{{ $story[0]->Ho . ' ' . $story[0]->Ten }}</span>

                </li>
                <li class="w-full p-2">Âm thanh :
                    <?php $music = Amthanh::where('amthanh.IDAmThanh', '=', $story[0]->IDAmThanh)
                        ->get(); ?>
                    @if (count($music) > 0)
                    <ul class="list-disc">
                        <li class="p-2">ID Âm Thanh : {{ $music[0]->IDAmThanh }}</li>
                        <li class="p-2">Tên Âm Thanh : {{ $music[0]->TenAmThanh }}</li>
                        <li class="p-2">Tác Giả : {{ $music[0]->TacGia }}</li>
                    </ul>
                    @else
                    <span class="cursor-pointer bg-red-500 px-3 py-1.5 text-sm rounded-3xl 
                        font-bold text-white">Không</span>
                    @endif
                </li>
                <li class="w-full p-2">Quyền Riêng Tư :
                    @switch($story[0]->IDQuyenRiengTu)
                    @case('CONGKHAI')
                    <span class="bg-green-500 px-3 py-1.5 text-sm rounded-3xl 
                    font-bold text-white">Công khai</span>
                    @break
                    @case('CHIBANBE')
                    <span class="bg-yellow-500 px-3 py-1.5 text-sm rounded-3xl 
                    font-bold text-white">Bạn bè</span>
                    @break
                    @case('RIENGTU')
                    <span class="bg-red-500 px-3 py-1.5 text-sm rounded-3xl 
                    font-bold text-white">Chỉ mình tôi</span>
                    @break
                    @endswitch
                </li>
                <li class="w-full p-2">Loại Story:
                    @switch($story[0]->LoaiStory)
                    @case('0')
                    <span class="bg-blue-500 px-3 py-1.5 text-sm rounded-3xl 
                    font-bold text-white">Chữ</span>
                    @break
                    @case('1')
                    <span class="bg-green-500 px-3 py-1.5 text-sm rounded-3xl 
                    font-bold text-white">Ảnh</span>
                    @break
                    @endswitch
                </li>
                <li class="w-full mt-2 p-2">Số Lượt Xem :
                    <span class="cursor-pointer bg-green-500 px-3 py-1.5 text-sm rounded-3xl 
                        font-bold text-white">
                        {{ count(Luotxemstory::where('luotxemstory.IDStory','=',$story[0]->IDStory)->get())}}
                    </span>
                </li>
            </ul>
            <div class="w-full my-10 text-center">
                <button class="w-32 p-2.5 rounded-lg font-bold text-white 
                bg-red-500 ">Xóa story</button>
            </div>
        </div>
    </div>
</div>