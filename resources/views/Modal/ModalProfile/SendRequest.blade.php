<?php

use App\Models\Data;
use App\Models\Functions;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

?>
<div id="modal-one" class=" w-11/12 fixed top-50per left-50per dark:bg-dark-second 
transform-translate-50per pb-2 pt-2 opacity-100 bg-white z-50 border-2 border-solid border-gray-300 
 sm:w-4/5 sm:mt-12 lg:w-3/5 xl:w-5/12 xl:mt-4 dark:border-dark-main shadow-1 rounded-lg">
    <div class="w-full bg-white dark:bg-dark-second px-2 fixed top-2 block z-10 relative">
        <p class="text-xl font-bold pb-4 text-center dark:text-white">Lời mời đã gửi</p>
        <span onclick="closePost()" class="rounded-full text-gray-300 px-3 py-1 text-2xl 
        font-bold absolute -top-1 right-2 bg-gray-600 cursor-pointer dark:text-gray-300">&times;</span>
        <hr>
    </div>
    <div class="w-full py-2 ml-4">
        <p class="dark:text-white my-3 font-bold">
            {{ count($requests) }} lời mời đã gửi
        </p>
    </div>
    <div id="all" class=" w-full dark:bg-dark-second px-2 wrapper-content-right overflow-y-auto" style="max-height: 420px;height: 420px;">
        @foreach ($requests as $key => $value)
        <?php $paths = 'profile.' . $value->IDTaiKhoan; ?>
        <div class="rounded-lg w-full hover:bg-gray-200 dark:hover:bg-dark-third flex py-2.5 
        cursor-pointer">
            <div onclick="window.location.href='{{ url($paths) }}'" class="ml-3 mr-3">
                <div class="w-16 h-16 relative">
                    <img src="{{ $value->AnhDaiDien }}" class="w-16 h-16 object-cover 
                    cursor-pointer" alt="">
                    @include('Component\Child\Activity',
                    [
                    'padding' => 'p-1.5',
                    'bottom' => 'bottom-2',
                    'right' => 'right-1.5',
                    'IDTaiKhoan' => $value->IDTaiKhoan
                    ])
                </div>
            </div>
            <div onclick="window.location.href='{{ url($paths) }}'" class="w-7/12 items-center pt-2.5">
                <span class="dark:text-white font-bold py-2">{{ $value->Ho . ' ' . $value->Ten }}</span><br>
                <span id="{{ $value->IDTaiKhoan }}relationship" class="text-gray-500">{{ count(Functions::getMutualFriend($value->IDTaiKhoan,
                $idTaiKhoan)) }} bạn chung</span>
            </div>
            <div class="w-3/12 pt-3">
                <button onclick="CancelRequestFriendF('{{ $value->IDTaiKhoan }}',
                '{{ $idTaiKhoan }}',this)" type="button" class=" rounded-lg px-4 py-2.5 mb-3 dark:bg-gray-300 bg-gray-300 float-right">Hủy yêu cầu</button>
            </div>
        </div>
        @endforeach
    </div>
</div>