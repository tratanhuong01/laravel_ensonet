<?php

use App\Process\DataProcess;
use App\Process\DataProcessSix;
use Illuminate\Support\Facades\Session;

?>
<div id="modal-one" class="shadow-sm border border-solid border-gray-500 py-3 pl-1.5 pr-1.5 pt-0
bg-white w-full fixed z-50 top-1/2 left-1/2 dark:bg-dark-second rounded-lg 
sm:w-10/12 md:w-2/3 lg:w-2/3 xl:w-5/12" style="transform: translate(-50%,-50%);z-index:10;">
    <div class="w-full text-center">
        <p class="text-xl font-bold py-2.5 pb-4 dark:text-white">Biệt danh</p>
        <span onclick="closePost()" class="rounded-full dark:bg-dark-third text-gray-700 
        px-3 py-1 text-2xl font-bold absolute right-2 bg-gray-300 top-2 cursor-pointer 
        dark:text-white">&times;</span>
        <hr>
    </div>
    <div id="all" class="w-full dark:bg-dark-second wrapper-content-right 
    overflow-y-auto" style="max-height: 420px;">
        @foreach($member as $key => $value)
        <div class="w-full cursor-pointer p-2.5 flex hover:bg-gray-200 dark:hover:bg-dark-third 
        rounded-lg">
            <div class="w-1/12">
                <img src="/{{ $value->AnhDaiDien }}" class="w-12 h-12 object-cover rounded-full" alt="">
            </div>
            <div class="w-10/12 pl-3">
                <p onclick="eventOpenOrCloseEditNickName('{{ $value->IDTaiKhoan }}')" class="flex items-center flex-wrap " id="{{$value->IDTaiKhoan }}unactiveNickName">
                    <span id="{{ $value->IDTaiKhoan }}topNickName" class="w-full font-bold block dark:text-white">
                        {{ DataProcessSix::getNickNameByUser($idNhomTinNhan,$value->IDTaiKhoan) 
                        == "" ? $value->Ho . ' ' . $value->Ten : 
                        DataProcessSix::getNickNameByUser($idNhomTinNhan,$value->IDTaiKhoan) }}
                    </span><br>
                    <span id="{{ $value->IDTaiKhoan }}bottomNickName" class="w-full text-sm text-gray-700 dark:text-white py-0.5 
                    flex items-center">
                        {{ DataProcessSix::getNickNameByUser($idNhomTinNhan,$value->IDTaiKhoan) 
                        == "" ? 'Đặt biệt danh' : 
                        $value->Ho . ' ' . $value->Ten }}
                    </span>
                </p>
                <input type="text" id="{{$value->IDTaiKhoan }}inputNickName" class="w-full p-1.5 mt-1 border-2 border-solid 
                border-blue-500 rounded-xl bg-gray-100 dark:bg-dark-third hidden dark:text-white
                flex justify-center items-center" onkeyup="saveNickName(event,
                '{{ $value->IDTaiKhoan }}',
                '{{ $idNhomTinNhan }}',
                '{{ json_encode($user[0]) }}',
                this,
                '{{ json_encode($value) }}',
                '{{ $chatter[0]->IDTaiKhoan }}',
                '{{ count($chatter) }}')">
            </div>
            <div onclick="eventOpenOrCloseEditNickName('{{ $value->IDTaiKhoan }}')" class="w-1/12 text-center flex">
                <i class="fas fa-pen-nib cursor-pointer dark:text-white 
                ml-5 text-xl flex items-center" id="{{$value->IDTaiKhoan }}penEditNickName"></i>
                <i class="fas fa-check cursor-pointer dark:text-white 
                ml-5 text-xl flex items-center hidden" id="{{$value->IDTaiKhoan }}checkedEditNickName"></i>
            </div>
        </div>
        @endforeach
    </div>
</div>