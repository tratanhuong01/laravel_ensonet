<?php

use App\Admin\Process;

?>
<div id="modal-one" class="w-11/12 fixed top-50per left-50per transform-translate-50per pb-2 pt-2 
opacity-100 bg-white z-50 border-2 border-solid border-gray-300 sm:w-4/5 sm:mt-12 lg:w-3/4 xl:w-1/2
xl:mt-4 dark:border-dark-main shadow-1 rounded-lg">
    <div class="w-full bg-white dark:bg-dark-second pl-2 pr-4  block z-10 text-center 
    relative">
        <p class="font-bold text-2xl pt-1 text-gray-700">Chi tiết về người dùng
        </p>
        <span onclick="closeModalAd()" class="bg-gray-300 px-2.5 dark:text-white font-bold 
        rounded-full cursor-pointer text-3xl absolute top-0 right-3">&times;</span>
        <hr class="my-3">
    </div>
    <div class="w-full flex flex-wrap">
        <div class="w-1/4 pl-3">
            <img src="{{ $user[0]->AnhDaiDien }}" class="w-40 mx-auto h-40 object-cover rounded-full" alt="">
        </div>
        <div class="w-3/4 pl-4">
            <p class="font-bold text-2xl py-3 text-gray-700">{{ $user[0]->Ho . ' ' . $user[0]->Ten }}</p>
            <ul class=" w-full flex">
                <li class="w-1/2">
                    <p class="text-xm font-bold py-1.5 text-gray-700">Ngày sinh : {{ explode(' ',$user[0]->NgaySinh)[0] }}</p>
                    <p class="text-xm font-bold py-1.5 text-gray-700">Giới tính :
                        @switch($user[0]->GioiTinh)
                        @case('Nam')
                        <span class="cursor-pointer bg-blue-500 px-3 py-1.5 text-sm rounded-3xl 
                        font-bold text-white">Nam</span>
                        @break
                        @case('Nữ')
                        <span class="cursor-pointer bg-pink-500 px-3 py-1.5 text-sm rounded-3xl 
                        font-bold text-white">Nữ</span>
                        @break
                        @default
                        <span class="cursor-pointer bg-indigo-500 px-3 py-1.5 text-sm rounded-3xl 
                        font-bold text-white">Khác</span>
                        @break
                        @endswitch
                    </p>
                    <p class="text-xm font-bold py-1.5 text-gray-700">Tham gia từ :
                        {{ 'Tháng '. explode('-',explode(' ',$user[0]->NgayTao)[0])[1] . ' năm ' .
                        explode('-',explode(' ',$user[0]->NgayTao)[0])[0] }}
                    </p>
                </li>
                <li class="w-1/2">
                    <p class="text-xm font-bold py-1.5 text-gray-700">Tình trạng :
                        @switch($user[0]->XacMinh)
                        @case('0')
                        <span class="bg-red-500 px-3 py-1.5 text-sm rounded-3xl 
                        font-bold text-white">Chưa xác minh</span>
                        @break
                        @case('1')
                        <span class="bg-yellow-500 px-3 py-1.5 text-sm rounded-3xl 
                        font-bold text-white">Đang xác minh</span>
                        @break
                        @case('2')
                        <span class="bg-green-500 px-3 py-1.5 text-sm rounded-3xl 
                        font-bold text-white">Đã xác minh</span>
                        @break
                        @endswitch
                    </p>
                    <p class="text-xm font-bold py-1.5 text-gray-700">Trạng thái :
                        <span id="stateUser">
                            @switch($user[0]->TinhTrang)
                            @case('0')
                            <span class="cursor-pointer  bg-green-500 px-3 py-1.5 text-sm rounded-3xl 
                        font-bold text-white">Bình thường</span>
                            @break
                            @case('1')
                            <span class="cursor-pointer  bg-red-500 px-3 py-1.5 text-sm rounded-3xl 
                        font-bold text-white">Checkpoint</span>
                            @break
                            @case('2')
                            <span class="cursor-pointer  bg-red-500 px-3 py-1.5 text-sm rounded-3xl 
                        font-bold text-white">Xác minh</span>
                            @break
                            @case('4')
                            <span class="cursor-pointer  bg-green-500 px-3 py-1.5 text-sm rounded-3xl 
                        font-bold text-white">Hạn chế</span>
                            @break
                            @case('5')
                            <span class="cursor-pointer  bg-green-500 px-3 py-1.5 text-sm rounded-3xl 
                        font-bold text-white">Đang chờ duyệt</span>
                            @break
                            @default
                            <span class="cursor-pointer  bg-red-500 px-3 py-1.5 text-sm rounded-3xl 
                        font-bold text-white">Khóa</span>
                            @break
                            @endswitch
                        </span>&nbsp;&nbsp;
                        <button onclick="openModalUpdateStateUserChange('{{ $user[0]->IDTaiKhoan }}')" class="bg-yellow-100 font-bold p-1 text-sm">Thay đổi</button>
                    </p>
                </li>
            </ul>
        </div>
        <?php $all = Process::getAllInfoDetailByUser($user[0]->IDTaiKhoan); ?>
        <div class="w-full pl-3 py-3">
            <p class="font-bold text-xl py-3 text-gray-700">Thông tin chi tiết người dùng</p>
            <ul class=" w-full flex">
                <li class="w-1/2">
                    <p class="text-xm font-bold py-1.5 text-gray-700">Số bài viết đã đăng :
                        {{ count($all['posted']) }} bài viết
                    </p>
                    <p class="text-xm font-bold py-1.5 text-gray-700">Số hình ảnh đã đăng :
                        {{ count($all['imaged']['sum']) }} hình ảnh
                    <ul class="list-disc pl-8">
                        <li>
                            <p class="text-xm font-bold py-1.5 text-gray-700">Ảnh đại diện :
                                {{ count($all['imaged']['avatar']) }} hình ảnh
                            </p>
                        </li>
                        <li>
                            <p class="text-xm font-bold py-1.5 text-gray-700">Ảnh bìa :
                                {{ count($all['imaged']['cover']) }} hình ảnh
                            </p>
                        </li>
                        <li>
                            <p class="text-xm font-bold py-1.5 text-gray-700">Ảnh thông thường :
                                {{ count($all['imaged']['normal']) }} hình ảnh
                            </p>
                        </li>
                    </ul>
                    </p>
                </li>
                <li class="w-1/2">
                    <p class="text-xm font-bold py-1.5 text-gray-700">Số story đã đăng :
                        {{ count($all['story']['text']) + count($all['story']['pic']) }} story
                    <ul class="list-disc pl-8">
                        <li>
                            <p class="text-xm font-bold py-1.5 text-gray-700">Story chữ :
                                {{ count($all['story']['text']) }} bài story
                            </p>
                        </li>
                        <li>
                            <p class="text-xm font-bold py-1.5 text-gray-700">Story ảnh :
                                {{ count($all['story']['pic']) }} bài story
                            </p>
                        </li>
                    </ul>
                    </p>
                    <p class="text-xm font-bold py-1.5 text-gray-700">Số cảm xúc đã bày tỏ :
                        {{ $all['feel'] }} cảm xúc
                    </p>
                    <p class="text-xm font-bold py-1.5 text-gray-700">Số bình luận đã bình luận :
                        {{ count($all['comment']) }} bình luận
                    </p>
                </li>
            </ul>
        </div>
    </div>
</div>