<?php

use App\Process\DataProcess;
use App\Process\DataProcessSix;
use Illuminate\Support\Facades\Session;

?>
<div id="modal-one" class="shadow-sm border border-solid border-gray-500 py-3 pl-1.5 pr-1.5 pt-0
bg-white w-full fixed z-50 top-1/2 left-1/2 dark:bg-dark-second rounded-lg 
sm:w-10/12 md:w-2/3 lg:w-2/3 xl:w-1/4" style="transform: translate(-50%,-50%);z-index:10;">
    <div class="w-full text-center">
        <p class="text-xl font-bold py-2.5 pb-4 dark:text-white">Biểu tượng cảm xúc</p>
        <span onclick="closePost()" class="rounded-full dark:bg-dark-third text-gray-700 
        px-3 py-1 text-2xl font-bold absolute right-2 bg-gray-300 top-2 cursor-pointer 
        dark:text-white">&times;</span>
        <hr>
    </div>
    <button id="button" class="hidden">Click</button>
    <input type="text" class="hidden" id="jsonUserMain" value="{{ $json }}">
    <input type="text" id="idNhomTinNhanChatIconFeel" class="hidden" value="{{ $idNhomTinNhan }}">
    <div id="all" class="w-full dark:bg-dark-second wrapper-content-right 
    overflow-y-auto" style="max-height: 420px;">
    </div>
</div>