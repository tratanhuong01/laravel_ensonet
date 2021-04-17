<?php

use Illuminate\Support\Facades\Session;

$user = Session::get('user');

?>
<div id="modal-two" class="shadow-sm border border-solid border-gray-500 py-3 pl-1.5 pr-1.5 pt-0
bg-white w-full fixed z-50 top-1/2 left-1/2 dark:bg-dark-second rounded-lg 
sm:w-10/12 md:w-2/3 lg:w-2/3 xl:w-1/3" style="transform: translate(-50%,-50%);z-index:10;">
    <p class="p-2.5 block text-center text-xl font-bold dark:text-white">Bạn cảm thấy thế nào ?</p>
    <span onclick="returnCreatePost()" class="p-2 rounded-full cursor-pointer absolute top-0.5">
        <i class='bx bxs-left-arrow-alt 
        cursor-pointer text-3xl dark:text-white'></i></span>
    <hr>
    <div class="w-full my-2 px-2">
        <input oninput="searchFeelCurrent('{{ $user[0]->IDTaiKhoan }}')" class="dark:text-white font-bold w-full p-2 pl-4 bg-transparent dark:bg-dark-third rounded-3xl" type="text" placeholder="Tìm kiếm" id="searchFeelCurrent">
    </div>
    <div class="tac-user wrapper-content-right" id="feelUserCurrent">
        @foreach($feel as $key => $value)
        <div onclick="tickFeel('{{ $value->IDCamXuc }}')" class="tac-user-clone pl-4  dark:hover:bg-dark-third rounded-lg
         cursor-pointer relative" id=" feelUserCurrent">
            <div class="tac-user-1 pt-0.5 bg-gray-300 rounded-full dark:bg-dark-third">
                <span class=" text-2xl">{{ $value->BieuTuong }}</span>
            </div>
            <div class="tac-user-2">
                <p class="dark:text-white">{{ $value->TenCamXuc }}</p>
            </div>
            <span class="absolute top-4 right-6" id="{{ $value->IDCamXuc }}Tick">
                @isset(Session::get('feelCur')[$value->IDCamXuc])
                <i class="fas fa-check text-green-400 text-xm"></i>
                @endisset
            </span>
        </div>
        @endforeach
    </div>

</div>