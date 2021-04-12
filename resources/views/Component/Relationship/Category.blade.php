<?php

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Functions;

$users = session()->has('users') ? Session::get('users') : $users;
$paths = explode('/', parse_url(url()->current())['path']);
$border = "border-b-4 border-blue-500";
$text = "text-blue-500";
$data = ($paths[count($paths) - 1]);
$arr = array();
switch ($data) {
    case 'about':
        $arr['about']['border'] = $border;
        $arr['about']['text'] = $text;
        break;
    case 'friends':
        $arr['friends']['border'] = $border;
        $arr['friends']['text'] = $text;
        break;
    case 'pictures':
        $arr['pictures']['border'] = $border;
        $arr['pictures']['text'] = $text;
        break;
    case 'profile.' . $users[0]->IDTaiKhoan:
        $arr['post']['border'] = $border;
        $arr['post']['text'] = $text;
        break;
}

?>
<div class="w-7/12">
    <ul class="w-full flex">
        <?php $baiViet = 'profile.' . $users[0]->IDTaiKhoan; ?>
        <li id="post" onclick="window.location.href='{{ url($baiViet) }}'" class="text-center py-2 px-4 cursor-pointer 
        @isset($arr['post']) {{ $arr['post']['border'] }} @endisset hover:bg-gray-200 dark:hover:bg-dark-third
        dark:text-white font-bold @isset($arr['post']) {{ $arr['post']['text'] }} @endisset cursor-pointer" style="font-size:15px;">
            Bài viết
        </li>
        <li id="about" onclick="ajaxProfileAbout('{{ $users[0]->IDTaiKhoan }}','place_load_about')" class="text-center py-2 px-4 cursor-pointer 
        @isset($arr['about']) {{ $arr['about']['border'] }} @endisset cursor-pointer hover:bg-gray-200 dark:hover:bg-dark-third
        dark:text-white font-bold @isset($arr['about']) {{ $arr['about']['text'] }} @endisset" style="font-size:15px;">
            Giới thiệu
        </li>
        <li id="friends" onclick="ajaxProfileFriend('{{ $users[0]->IDTaiKhoan }}','place_load_about')" class="text-center py-2 px-4 cursor-pointer 
        @isset($arr['friends']) {{ $arr['friends']['border'] }} @endisset  hover:bg-gray-200 dark:hover:bg-dark-third
        font-bold @isset($arr['friends']) {{ $arr['friends']['text'] }} @endisset dark:text-white" style="font-size:15px;">
            Bạn bè &nbsp;
            <span style="font-size: 13px;font-weight: normal !important;">
                {{ sizeof(Functions::getListFriendsUser($users[0]->IDTaiKhoan))}}
            </span>
        </li>
        <li id="pictures" onclick="ajaxProfilePicture('{{ $users[0]->IDTaiKhoan }}','place_load_about')" class="text-center py-2 px-4 cursor-pointer font-bold dark:text-white
        @isset($arr['pictures']) {{ $arr['pictures']['text'] }} @endisset hover:bg-gray-200 dark:hover:bg-dark-third
        @isset($arr['pictures']) {{ $arr['pictures']['border'] }} @endisset " style="font-size:15px;">
            Ảnh
        </li>
        <li id="more" class="text-center py-2 px-4 cursor-pointer dark:text-white
        @isset($arr['more']) {{ $arr['more']['text'] }} @endisset hover:bg-gray-200 dark:hover:bg-dark-third
        @isset($arr['more']) {{ $arr['more']['border'] }} @endisset " style="font-size:15px;">
            Xem thêm&nbsp;&nbsp;<i class="fas fa-caret-down"></i>
        </li>
    </ul>
</div>