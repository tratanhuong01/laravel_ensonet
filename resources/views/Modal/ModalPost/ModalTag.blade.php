<?php

use App\Models\Taikhoan;
use Illuminate\Support\Facades\Session;

$user = Session::get('user');

?>
<div id="modal-two" class="shadow-sm border border-solid border-gray-500 py-3 pl-1.5 pr-1.5 pt-0
bg-white w-full fixed z-50 top-1/2 left-1/2 dark:bg-dark-second rounded-lg 
sm:w-10/12 md:w-2/3 lg:w-2/3 xl:w-1/3" style="transform: translate(-50%,-50%);z-index:10;">
    <p class="p-2.5 block text-center text-xl font-bold dark:text-white">Gắn thẻ bạn bè</p>
    <span onclick="returnCreatePost()" class="p-2 rounded-full cursor-pointer absolute top-0.5">
        <i class='bx bxs-left-arrow-alt 
        cursor-pointer text-3xl dark:text-white'></i></span>
    <hr>
    <div class="w-full my-2 px-2">
        <input oninput="searchTagFriends('{{ $user[0]->IDTaiKhoan }}')" class="dark:text-white 
        font-bold w-10/12 p-2 pl-4 bg-transparent dark:bg-dark-third rounded-3xl" type="text" placeholder="Tìm kiếm bạn bè" name="hoTen" id="searchTagFriends">&nbsp;&nbsp;&nbsp;
        <span onclick="returnCreatePost()" class="font-bold ml-4 text-blue-500 cursor-pointer">Xong</span>
    </div>
    <div class="w-full pb-3">
        <p class="w-11/12 mx-auto dark:text-gray-300 font-bold py-1">Đã gắn thẻ</p>
        <div class="w-11/12 mx-auto">
            <div class="w-auto flex flex-wrap max-h-32 overflow-y-auto" id="usersTagPost">
                @if(session()->has('tag'))
                @php
                $tags = Session::get('tag')
                @endphp
                @if (count($tags) > 0)
                @foreach($tags as $key => $value)
                @php
                $us = TaiKhoan::where('taikhoan.IDTaiKhoan','=',$value)->get()
                @endphp
                @include('Modal/ModalPost/Child/UserTaged',['user' => $us])
                @endforeach
                @endif
                @endif
            </div>
        </div>
    </div>
    <div class="tac-user wrapper-content-right" id="tag-users">
        <p class="w-11/12 mx-auto dark:text-gray-300 font-bold py-2">Gợi ý</p>
        @foreach($friends as $key => $value)
        <div id="{{ $value->IDTaiKhoan }}Tag" onclick="tagFriends('{{ $value->IDTaiKhoan }}')" class="w-full relative flex py-2 px-4 cursor-pointer hover:bg-gray-200 rounded-4xl dark:hover:bg-dark-third">
            <div class="" style="text-align: center;padding-right: 10px">
                <img class="w-12 h-12 rounded-full object-cover" src="/{{ $value->AnhDaiDien }}" alt="">
            </div>
            <div class="tac-user-2" style="padding-top: 1%;padding-left: 2%;">
                <p class="font-bold dark:text-white">{{ $value->Ho .' ' .$value->Ten }}</p>
            </div>
            <span class="absolute top-5 right-8" id="{{ $value->IDTaiKhoan }}Check">
                @isset(Session::get('tag')[$value->IDTaiKhoan])
                <i class="fas fa-check text-green-400 text-xl"></i>
                @endisset
            </span>
        </div>
        @endforeach
    </div>
</div>