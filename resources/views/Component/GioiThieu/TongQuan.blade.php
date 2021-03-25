<?php

use App\Models\Gioithieu;
use App\Process\DataProcessFour;
use Illuminate\Support\Facades\Session;

$json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', Session::get('users')[0]->IDTaiKhoan)->get();

?>
<div class="w-full">
    <ul class="w-full py-2 px-4">
        @if (DataProcessFour::checkPlaceWork(json_decode($json[0]->JsonGioiThieu)) == 0)
        <p class="font-bold text-xm py-4 text-1877F2">
            <a href=""><i class="fas fa-plus border-2 py-1.5 px-1.5 text-xm border-solid rounded-full" style="border-color: #1877F2;"></i>&nbsp;&nbsp;
                Thêm nơi làm việc</a>
        </p>
        <div class="w-full">
            <input name="" id="" class="w-full my-2 p-3 border-2 border-solid border-gray-200 
            dark:bg-dark-third dark:border-dark-main shadow-lg dark:text-white  
            resize-none outline-none rounded-lg" placeholder="Công ty">
            <input name="" id="" class="w-full my-2 p-3 border-2 border-solid border-gray-200 
            dark:bg-dark-third dark:border-dark-main shadow-lg dark:text-white  
            resize-none outline-none rounded-lg" placeholder="Chức vụ">
            <input name="" id="" class="w-full my-2 p-3 border-2 border-solid border-gray-200 
            dark:bg-dark-third dark:border-dark-main shadow-lg dark:text-white  
            resize-none outline-none rounded-lg" placeholder="Thành phố / thị xã">
            <p class="font-bold text-xm py-2 dark:text-white" style="font-family: system-ui;">
                Khoảng thời gian</p>
            <div class="py-2 px-2 w-full dark:text-white font-bold flex">
                <div class="w-10 h-10 p-2 text-center hover:bg-gray-200 
                dark:hover:bg-dark-third rounded-full">
                    <input type="checkbox" class="" name="" id="" style="transform: scale(1.8);">

                </div>
                <div class="pl-3 py-2">
                    Tôi đang làm việc tại đây
                </div>
            </div>
            <div class="w-full p-2 flex dark:text-white font-bold">
                <p class="py-2">Từ</p>
                <div class="w-24 text-center relative dark:text-white">
                    <button class="px-4 py-2.5 dark:bg-dark-third dark:text-white bg-gray-200 
                    font-bold rounded-lg">Năm</button>
                    <div class="z-50 absolute left-2 top-12 w-80 h-60 overflow-y-auto wrapper-content-right
                     shadow-lg border-gray-300 dark:border-dark-main dark:bg-dark-second 
                     bg-gray-200 hidden" style="max-height: 200px;">
                        <div class="w-full p-3 dark:text-white font-bold text-left cursor-pointer
                         border-gray-300 border-2 border-solid rounded-lg dark:bg-dark-third">
                            2021
                        </div>
                        <div class="w-full  p-3 dark:text-white font-bold text-left rounded-lg cursor-pointer">
                            2020
                        </div>
                        <div class="w-full p-3 dark:text-white font-bold text-left rounded-lg cursor-pointer">
                            2019
                        </div>
                        <div class="w-full p-3 dark:text-white font-bold text-left rounded-lg cursor-pointer">
                            2018
                        </div>
                        <div class="w-full p-3 dark:text-white font-bold text-left rounded-lg cursor-pointer">
                            2017
                        </div>
                    </div>
                </div>
                <p class="py-2">Đến</p>
                <div class="w-24 text-center relative dark:text-white">
                    <button class="px-4 py-2.5 dark:bg-dark-third dark:text-white bg-gray-200 
                    font-bold rounded-lg">Năm</button>
                    <div class="z-50 absolute left-2 top-12 w-80 h-60 overflow-y-auto wrapper-content-right
                     shadow-lg border-gray-300 dark:border-dark-main dark:bg-dark-second 
                     bg-gray-200" style="max-height: 200px;">
                        <div class="w-full p-3 dark:text-white font-bold text-left cursor-pointer
                         border-gray-300 border-2 border-solid rounded-lg dark:bg-dark-third">
                            2021
                        </div>
                        <div class="w-full  p-3 dark:text-white font-bold text-left rounded-lg cursor-pointer">
                            2020
                        </div>
                        <div class="w-full p-3 dark:text-white font-bold text-left rounded-lg cursor-pointer">
                            2019
                        </div>
                        <div class="w-full p-3 dark:text-white font-bold text-left rounded-lg cursor-pointer">
                            2018
                        </div>
                        <div class="w-full p-3 dark:text-white font-bold text-left rounded-lg cursor-pointer">
                            2017
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full flex relative h-16">
                <div class="bg-gray-200  dark:bg-dark-third dark:text-white  rounded-lg p-2 absolute left-0 font-bold">
                    <i class="fas fa-globe-europe"></i>&nbsp;&nbsp;Công khai
                </div>
                <div class="bg-1877F2 text-white rounded-lg p-2 absolute right-0 font-bold">
                    Lưu
                </div>
                <div class="bg-gray-200  dark:bg-dark-third dark:text-white  rounded-lg p-2 absolute right-12 font-bold">
                    Hủy
                </div>
            </div>
        </div>
        @else
        <p class="font-bold text-xm py-4 text-1877F2">
            <a href=""><i class="fas fa-plus border-2 py-1.5 px-1.5 text-xm border-solid rounded-full" style="border-color: #1877F2;"></i>&nbsp;&nbsp;
                Thêm nơi làm việc</a>
        </p>
        <li class="w-full py-4 flex relative" style="font-size: 16px;">
            <div class="w-10/12 dark:text-white">
                <i class="fas fa-briefcase text-gray-600  dark:text-white  text-2xl"></i>&nbsp;&nbsp;&nbsp;
                Làm việc tại <b>FacebookApp </b>
            </div>
            <div class="w-2/12">
                <ul class="w-full flex">
                    <li class="p-2  dark:text-white  text-gray-600">
                        <i class="fas fa-globe-europe text-xl cursor-pointer"></i>
                    </li>
                    <li class="p-2  dark:text-white  text-gray-600">
                        <i class="far fa-edit text-xl cursor-pointer"></i>
                    </li>
                    <li class="p-2  dark:text-white  text-gray-600">
                        <i class="far fa-trash-alt text-xl cursor-pointer"></i>
                    </li>
                </ul>
            </div>
        </li>
        @endif
        @if (DataProcessFour::checkSchool(json_decode($json[0]->JsonGioiThieu)) == 0)
        <p class="font-bold text-xm py-4 text-1877F2">
            <a href=""><i class="fas fa-plus border-2 py-1.5 px-1.5 text-xm border-solid rounded-full" style="border-color: #1877F2;"></i>&nbsp;&nbsp;
                Thêm trường học</a>
        </p>
        @else
        <p class="font-bold text-xm py-4 text-1877F2">
            <a href=""><i class="fas fa-plus border-2 py-1.5 px-1.5 text-xm border-solid rounded-full" style="border-color: #1877F2;"></i>&nbsp;&nbsp;
                Thêm trường học</a>
        </p>
        <li class="w-full pb-4 flex hidden" style="font-size: 16px;">
            <div class="w-10/12 text-gray-600  dark:text-white ">
                <i class="fas fa-graduation-cap text-2xl"></i>&nbsp;
                Học tại <b>Trường Cao Đẳng Công Nghệ Thông Tin - Đại Học Đà Nẵng</b>
            </div>
            <div class="w-2/12">
                <ul class="w-full flex">
                    <li class="p-2  dark:text-white  text-gray-600">
                        <i class="fas fa-globe-europe text-xl cursor-pointer"></i>
                    </li>
                    <li class="p-2  dark:text-white  text-gray-600">
                        <i class="far fa-edit text-xl cursor-pointer"></i>
                    </li>
                    <li class="p-2  dark:text-white  text-gray-600">
                        <i class="far fa-trash-alt text-xl cursor-pointer"></i>
                    </li>
                </ul>
            </div>
        </li>
        @endif

        <p class="font-bold text-xm py-4 text-1877F2">
            <a href=""><i class="fas fa-plus border-2 py-1.5 px-1.5 text-xm border-solid rounded-full" style="border-color: #1877F2;"></i>&nbsp;&nbsp;
                Thêm nơi ở hiện tại</a>
        </p>
        <li class="w-full pb-4 flex hidden" style="font-size: 16px;">
            <div class="w-10/12 text text-gray-600  dark:text-white ">
                <i class="fas fa-home text-2xl"></i>
                &nbsp;&nbsp;&nbsp;Sống tại <b>Đà Nẵng</b>
            </div>
            <div class="w-2/12">
                <ul class="w-full flex">
                    <li class="p-2  dark:text-white  text-gray-600">
                        <i class="fas fa-globe-europe text-xl cursor-pointer"></i>
                    </li>
                    <li class="p-2  dark:text-white  text-gray-600">
                        <i class="far fa-edit text-xl cursor-pointer"></i>
                    </li>
                    <li class="p-2  dark:text-white  text-gray-600">
                        <i class="far fa-trash-alt text-xl cursor-pointer"></i>
                    </li>
                </ul>
            </div>
        </li>
        <p class="font-bold text-xm py-4 text-1877F2">
            <a href=""><i class="fas fa-plus border-2 py-1.5 px-1.5 text-xm border-solid rounded-full" style="border-color: #1877F2;"></i>&nbsp;&nbsp;
                Thêm quê quán</a>
        </p>
        <li class="w-full pb-4 flex hidden" style="font-size: 16px;">
            <div class="w-10/12 text-gray-600  dark:text-white ">
                &nbsp;&nbsp;<i class="fas fa-map-marker-alt text-gray-600  dark:text-white  text-2xl"></i>
                &nbsp;&nbsp;&nbsp;&nbsp;Đến từ <b>Quảng Nam</b>
            </div>
            <div class="w-2/12">
                <ul class="w-full flex">
                    <li class="p-2  dark:text-white  text-gray-600">
                        <i class="fas fa-globe-europe text-xl cursor-pointer"></i>
                    </li>
                    <li class="p-2  dark:text-white  text-gray-600">
                        <i class="far fa-edit text-xl cursor-pointer"></i>
                    </li>
                    <li class="p-2  dark:text-white  text-gray-600">
                        <i class="far fa-trash-alt text-xl cursor-pointer"></i>
                    </li>
                </ul>
            </div>
        </li>
        <li class="w-full pb-4 flex" style="font-size: 16px;">
            <div class="w-10/12 text-gray-600  dark:text-white ">
                &nbsp;<i class="fas fa-heart text-gray-600  dark:text-white   text-2xl"></i>
                &nbsp;&nbsp;&nbsp;Độc Thân
            </div>
            <div class="w-2/12">
                <ul class="w-full flex">
                    <li class="p-2  dark:text-white  text-gray-600">
                        <i class="fas fa-globe-europe text-xl cursor-pointer"></i>
                    </li>
                    <li class="p-2  dark:text-white  text-gray-600">
                        <i class="far fa-edit text-xl cursor-pointer"></i>
                    </li>
                    <li class="p-2  dark:text-white  text-gray-600">
                        <i class="far fa-trash-alt text-xl cursor-pointer"></i>
                    </li>
                </ul>
            </div>
        </li>
        <li class="w-full pb-4 flex" style="font-size: 16px;">
            <div class="w-10/12 font-bold flex text-gray-600  dark:text-white ">
                <i class="fas fa-phone text-2xl text-gray-600  dark:text-white   mr-1" style="transform: rotate(90deg);"></i>
                <div class="pl-3 text-gray-600  dark:text-white ">
                    <p>0354114665</p>
                    <p class="text-sm text-gray-600  dark:text-white ">Di động</p>
                </div>
            </div>
            <div class="w-2/12">
                <ul class="w-full flex">
                    <li class="p-2  dark:text-white  text-gray-600">
                        <i class="fas fa-globe-europe text-xl cursor-pointer"></i>
                    </li>
                    <li class="p-2  dark:text-white  text-gray-600">
                        <i class="far fa-edit text-xl cursor-pointer"></i>
                    </li>
                    <li class="p-2  dark:text-white  text-gray-600">
                        <i class="far fa-trash-alt text-xl cursor-pointer"></i>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</div>