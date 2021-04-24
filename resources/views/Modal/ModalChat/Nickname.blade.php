<?php

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
        <div class="w-full cursor-pointer p-2.5 flex hover:bg-gray-200 dark:hover:bg-dark-third 
        rounded-lg">
            <div class="w-1/12">
                <img src="/img/avatar.jpg" class="w-12 h-12 object-cover rounded-full" alt="">
            </div>
            <div class="w-10/12 pl-3">
                <p class="flex items-center flex-wrap hidden">
                    <span class="w-full font-bold block">Trà Hưởng</span><br>
                    <span class="w-full text-sm text-gray-700 dark:text-white py-0.5 
                    flex items-center">Đặt biệt danh</span>
                </p>
                <input type="text" class="w-full p-1.5 mt-1 border-2 border-solid 
                border-blue-500 rounded-xl bg-gray-100 dark:bg-dark-third 
                flex justify-center items-center" placeholder="Trà Hưởng">
            </div>
            <div class="w-1/12 text-center flex">
                <i class="fas fa-pen-nib cursor-pointer dark:text-white 
                ml-5 text-xl flex items-center hidden" id=""></i>
                <i class="fas fa-check cursor-pointer dark:text-white 
                ml-5 text-xl flex items-center" id=""></i>
            </div>
        </div>
    </div>
</div>