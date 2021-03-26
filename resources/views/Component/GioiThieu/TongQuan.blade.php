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
        @include('Component/GioiThieu/Child/ThemNoiLamViec')
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
        @include('Component/GioiThieu/Child/ThemTruongHoc')
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
        @include('Component/GioiThieu/Child/ThemNoiOHienTai')
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
        @include('Component/GioiThieu/Child/ThemQueQuan')
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
        <li class="w-full  pt-2 pb-4 flex" style="font-size: 16px;">
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
        @include('Component/GioiThieu/Child/ThemMoiQuanHe')
        <!-- <li class="w-full pb-4 flex" style="font-size: 16px;">
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
        </li> -->
    </ul>
</div>