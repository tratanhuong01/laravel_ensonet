<?php

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Functions;

$user = Session::get('user');
?>
<div class="w-7/12">
    <ul class="w-full flex">
        <li class="text-center py-2 px-4  cursor-pointer" style="font-size:15px; border-bottom: 3px solid #1877F2;">
            <a class="font-bold dark:text-white" style="color: #1877F2;">Bài viết</a>
        </li>
        <li class="text-center py-2 px-4 cursor-pointer" style="font-size:15px;">
            <a class="font-bold dark:text-white">Giới thiệu</a>
        </li>
        <li onclick="ajaxProfileFriend('{{ $user[0]->IDTaiKhoan }}','place_load_about')" class="text-center py-2 px-4 cursor-pointer" style="font-size:15px;">
            <a class="font-bold dark:text-white">Bạn bè &nbsp;
                <span style="font-size: 13px;font-weight: normal !important;">
                    4.999
                </span>
            </a>
        </li>
        <li class="text-center py-2 px-4 cursor-pointer" style="font-size:15px;">
            <a class="font-bold dark:text-white">Ảnh</a>
        </li>
        <li class="text-center py-2 px-4 cursor-pointer" style="font-size:15px;">
            <a class="font-bold dark:text-white">Xem thêm&nbsp;&nbsp;<i class="fas fa-caret-down"></i></a>
        </li>
    </ul>
</div>