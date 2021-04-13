<?php

use App\Models\Data;
use App\Models\Functions;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

?>
<div id="modal-one" class=" w-11/12 fixed top-50per left-50per dark:bg-dark-second 
transform-translate-50per pb-2 pt-2 opacity-100 bg-white z-50 border-2 border-solid border-gray-300 
 sm:w-4/5 sm:mt-12 lg:w-3/5 xl:w-5/12 xl:mt-4 dark:border-dark-main shadow-1 rounded-lg">
    <div class="w-full bg-white dark:bg-dark-second pl-2 pr-4 fixed top-2 block z-10">
        <span onclick="closePost()" class="bg-gray-300 px-2.5 dark:text-white font-bold
                     rounded-full dark:bg-dark-second cursor-pointer absolute text-3xl top-2 right-4">&times;</span>
        <p class="font-bold text-center text-2xl dark:text-white">Mọi người</p>
    </div>
    <div id="all" class="w-full dark:bg-dark-second px-2 pt-16 wrapper-content-right overflow-y-auto" style="max-height: 420px;height: 420px;">
        @foreach($data as $key => $value)
        @if ($value->IDTaiKhoan == Session::get('user')[0]->IDTaiKhoan)
        <div class="w-full py-2 flex">
            <div class="w-3/5 flex">
                <div class="w-14 h-14 relative">
                    <a href="">
                        <img src="/{{ $value->AnhDaiDien }}" class="w-12 h-12 object-cover
                                            rounded-full border-2 border-solid border-gray-300" alt="">
                    </a>
                </div>
                <div class="px-3">
                    <p class="py-3"><a href="" class="dark:text-white font-bold">{{ $value->Ho . ' ' . $value->Ten }}</a></p>
                </div>
            </div>
            <div class="w-2/5 text-right">
            </div>
        </div>
        @else
        <div class="w-full py-2 flex">
            <div class="w-3/5 flex">
                <div class="w-14 h-14 relative">
                    <a href="">
                        <img src="/{{ $value->AnhDaiDien }}" class="w-12 h-12 object-cover
                                            rounded-full border-2 border-solid border-gray-300" alt="">
                    </a>
                </div>
                <div class="px-3">
                    <p><a href="" class="dark:text-white font-bold font-bold">{{ $value->Ho . ' ' . $value->Ten }}</a></p>
                    <p><a href="" class="dark:text-gray-300 font-bold text-gray-700 text-sm">
                            {{ count(Functions::getMutualFriend($value->IDTaiKhoan,Session::get('user')[0]->IDTaiKhoan)) }} bạn chung
                        </a></p>
                </div>
            </div>
            <?php $datas = DB::table('moiquanhe')->where('IDTaiKhoan', '=', Session::get('users')[0]->IDTaiKhoan)
                ->where('IDBanBe', '=', $value->IDTaiKhoan)->get(); ?>
            @if (count($datas) == 0)
            <div class="w-2/5 text-right">
                <ul class="flex pt-1.5 float-right">
                    <li onclick="RequestFriend('','')" class="p-2.5 mr-2  cursor-pointer dark:bg-dark-third dark:text-white bg-gray-200 font-bold 
                    rounded-lg" style="background-color: #E7F3FF;color:#1095F4;line-height: 24px;"><i class="fas fa-user-plus themBanBe" style="font-size: 18px;"></i>&nbsp;&nbsp;
                        <span class="main_themBanBe">Thêm bạn bè</span>
                    </li>
                </ul>
            </div>
            @else
            @switch ($datas[0]->TinhTrang)
            @case('1')
            <div class="w-2/5 text-right">
                <ul class="flex pt-1 float-right">
                    <li onclick="CancelRequestFriend('','')" class="p-3 mr-2 cursor-pointer " style="background-color: #E7F3FF;
            color:#1095F4;font-weight:bold;border-radius: 6px;line-height: 24px;"><i class="fas fa-user-times guiYeuCau" style="font-size: 18px;"></i>&nbsp;&nbsp;
                        <span class="main_themBanBe">Hủy kết bạn</span>
                    </li>
                </ul>
            </div>
            @break
            @case('2')
            <div class="w-2/5 text-right">
                <ul class="flex pt-2 float-right">
                    <li onclick="AcceptFriend('','')" class="p-2.5 mr-2 cursor-pointer text-white" style="background-color: #1095F4;border-radius: 6px;">
                        &nbsp;&nbsp;Chấp nhận</li>
                    <li onclick="DeleleRequestFriend('','')" class="p-2.5 mr-2 cursor-pointer bg-gray-200" style="border-radius: 6px;">&nbsp;
                        Xóa</li>
                </ul>
            </div>
            @break
            @case('3')
            <div class="w-2/5 text-right">
                <ul class="flex pt-1 float-right">
                    <li class="p-3 mr-2 cursor-pointer dark:bg-dark-third dark:text-white bg-gray-200 font-bold rounded-lg">
                        <i class="fas fa-user-friends dark:text-white"></i>&nbsp;&nbsp;Bạn bè
                    </li>
                </ul>
            </div>
            @break
            @endswitch
            @endif
        </div>
        @endif
        @endforeach
    </div>
</div>