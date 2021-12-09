<?php

use Illuminate\Support\Facades\Session;
use App\Models\Functions;
use Illuminate\Support\Facades\DB;

$users = Session::get('users');

?>
<div class="w-full mx-auto py-2 pt-3 dark:bg-dark-second rounded-lg">
    <div class="w-full flex py-4">
        <div class="font-bold w-2/12 py-2.5">
            <p style="font-size: 15px;" class="dark:text-white font-bold pl-6">Bạn Bè</p>
        </div>

        @if (explode('/', parse_url(url()->current())['path'])[count(explode('/', parse_url(url()->current())['path']))-1] =='friends')
        <div class="w-5/12 font-bold py-2.5 text-right">
            <a style="color: #1876F2;font-size: 15px;" href="{{ url('friends') }}">Lời mời
                kết bạn</a>
        </div>
        <div class="w-5/12 pr-2 pl-2">
            {{ csrf_field() }}
            <input class="w-7/12 p-2 border-none outline-none bg-gray-100 
                dark:bg-dark-third rounded-lg dark:text-white" type="text" name="hoTen" id="hoTen" placeholder="Tìm kiếm">
            <button onclick="searchFriend('{{ $users[0]->IDTaiKhoan }}',event)" type="button" class="w-4/12 p-2 border-none font-bold text-white rounded-lg" style="background-color: #139DF7;">Tìm bạn bè</button>
        </div>
        @else
        <div class="w-5/12 font-bold py-2.5 text-right">
            <a style="color: #1876F2;font-size: 15px;" href="{{ url('friends') }}">Lời mời
                kết bạn</a>
        </div>
        <div class="w-5/12 pr-2 pl-2">
            {{ csrf_field() }}
            <input class="w-7/12 p-2 border-none outline-none bg-gray-100 
                dark:bg-dark-third rounded-lg dark:text-white" type="text" name="hoTen" id="hoTen" placeholder="Tìm kiếm">
            <button onclick="searchFriend('{{ $users[0]->IDTaiKhoan }}',event)" type="button" class="w-4/12 p-2 border-none font-bold text-white rounded-lg" style="background-color: #139DF7;">Tìm bạn bè</button>
        </div>
        @endif
    </div>
    <div class="main-friends w-full flex border-2 border-solid border-gray-200 dark:border-dark-second rounded-lg flex-wrap 
    dark:bg-gray-main">
        @if (count($data) == 0) <p class="font-bold dark:text-white text-center mx-auto py-4">Không có bạn bè để hiển thị</p>
        @else
        @for ($i = 0 ; $i < count($data) ; $i++) <div class="relative flex border-2 border-solid dark:border-dark-second  
        border-gray-200 rounded-lg" style="width: 48.5%;margin: 6px;padding: 2%;">
            <?php $path = "profile." . $data[$i][0]->IDTaiKhoan; ?>
            <div class="w-1/4">
                <a href="{{ url($path) }}"><img class="w-24 h-24 rounded-lg object-cover" src="{{ $data[$i][0]->AnhDaiDien }}" alt=""></a>
            </div>
            <div class="w-5/12 flex pl-4">
                <div class="flex flex-wrap items-center">
                    <p style="font-family: Arial, Helvetica, sans-serif"><b>
                            <a style="font-size: 17px;" class="dark:text-white" href="{{ url($path) }}">
                                {{ $data[$i][0]->Ho . ' ' .  $data[$i][0]->Ten }}</a></b><br>
                        <span style="color: #65687B;font-size: 14px;">
                            @php
                            $number = count(Functions::getMutualFriend($data[$i][0]->IDTaiKhoan,$users[0]->IDTaiKhoan))
                            @endphp
                            {{ $number == 0 ? '' : $number . ' bạn chung' }} </span>
                    </p>
                </div>
            </div>
            <div class="w-1/3  pt-2 text-right">
                <?php $relationShip = DB::table('moiquanhe')->where('IDTaiKhoan', '=', Session::get('user')[0]->IDTaiKhoan)
                    ->where('IDBanBe', '=', $data[$i][0]->IDTaiKhoan)->get(); ?>
                @if (count($relationShip) != 0)
                @switch($relationShip[0]->TinhTrang)
                @case('0')
                @include('Component.Child.Button.ChuaKetBan')
                @break;
                @case('1')
                <button onclick="CancelRequestFriend()" class="p-2.5 my-6 cursor-pointer 
                font-bold rounded-lg bg-blue-500 text-white" style="line-height: 24px;">
                    Hủy kết bạn</button>
                @break;
                @case('2')
                <button onclick="AcceptFriend()" class="p-2 px-2.5 mb-2 mr-2 cursor-pointer 
                font-bold rounded-lg bg-blue-500 text-white">Chấp nhận</button>
                <button onclick="DeleleRequestFriend()" class="p-2 mr-2 cursor-pointer 
                font-bold rounded-lg bg-blue-500 text-white">Hủy lời
                    mời</button>
                @break;
                @case('3')
                <button onclick="openEditFriend('{{ $i }}')" class="my-6 px-3 py-2 bg-gray-300 rounded-lg font-bold">Bạn
                    Bè</button>
                @break;
                @endswitch
                @else
                @endif
                <div style="display: none;" class="edit-friend bg-white my-2 absolute 
                w-80 p-2 border-2 border-solid rounded-lg dark:bg-dark-second">
                    <ul class="w-full">
                        <!-- <li class="w-full flex p-3 cursor-pointer dark:text-white dark:hover:bg-dark-third">
                            <i class="far fa-star text-xl pr-2"></i>
                            Yêu thích
                        </li>
                        <li class="w-full flex p-3 cursor-pointer dark:text-white dark:hover:bg-dark-third">
                            <i class="fas fa-user-edit text-xl pr-2"></i>
                            Chỉnh sửa danh sách bạn bè
                        </li> -->
                        <li class="w-full flex p-3 cursor-pointer dark:text-white dark:hover:bg-dark-third">
                            <i class="fas fa-user-edit text-xl pr-2"></i>
                            Bỏ theo dõi
                        </li>
                        <li class="w-full flex p-3 cursor-pointer dark:text-white dark:hover:bg-dark-third">
                            <i class="fas fa-user-slash text-xl pr-2"></i>
                            Hủy kết bạn
                        </li>
                    </ul>
                </div>
            </div>
    </div>
    @endfor
    <div class="w-full mx-auto my-2">
        <a class="block p-2.5 text-center font-bold rounded-lg bg-gray-300 dark:bg-dark-third dark:text-white" href="">Xem tất cả</a>
    </div>
    @endif
</div>