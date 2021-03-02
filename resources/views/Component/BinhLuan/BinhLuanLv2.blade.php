<?php

use App\Models\Process;
use Illuminate\Support\Facades\Session;
use App\Models\StringUtil;
use App\Models\Functions;

?>

<div class="w-full mx-0 my-2 flex">
    <div class="pt-2">
        <a href=""><img class="w-12 h-12 p-0.5 object-cover rounded-full" src="/{{ $comment->AnhDaiDien }}" alt="" srcset=""></a>
    </div>
    <div class="w-11/12 ml-2">
        <div class="comment-per w-max p-2 dark:bg-dark-third bg-gray-100 relative rounded-lg" style="max-width: 91%;">
            <p><a href="" class="font-bold dark:text-white">{{ $comment->Ho . ' ' . $comment->Ten }}</a></p>
            <p class="dark:text-white" style="font-size: 15px;clear: both;word-wrap: break-word;">
                {{ $comment->NoiDungBinhLuan }}
            </p>
            <span class="tym-comment dark:bg-dark-main bg-white color-word px-2 py-1 
            absolute cursor-pointer" style="border-radius: 20px;bottom:-5px;right:-24px;">
                <i class="fas fa-heart text-xm cursor-pointer pt-0.5" style="color: red;">
                </i>&nbsp;&nbsp;<b class="dark:text-white" style="font-size: 14px;">2</b>
            </span>
        </div>
        <ul class="flex pl-2">
            <li id="{{ $comment->IDBinhLuan }}" class="relative feels font-bold text-sm py-1 
                pr-2 cursor-pointer dark:text-white">
                {!! Functions::checkIsFeelCmt($user[0]->IDTaiKhoan,$comment->IDBinhLuan) !!}
                @include('Component\BinhLuan\CamXucBinhLuan',['comment' => $comment])
            </li>
            <li onclick="RepViewCommentPost(
                '{{ $comment->IDTaiKhoan }}',
                '{{ $comment->IDBaiDang }}',
                '{{ $comment->IDBinhLuan }}'
                )" class="font-bold text-sm py-1 pr-2 cursor-pointer dark:text-white">Trả lời</li>
            <li class="py-1 pr-2 cursor-pointer dark:text-white font-bold" style="font-size: 13px;">
                {{ StringUtil::CheckDateTime($comment->ThoiGianBinhLuan) }}
            </li>
        </ul>
        <p style="font-size: 15px;display: none;" class="color-word font-bold cursor-pointer pl-2">
            <i style="color: #65676B;" class="fas fa-angle-double-down"></i>&nbsp;&nbsp;
            Xem 19 bình luận
        </p>
        <p style="font-size: 15px;display: none;" class="color-word font-bold cursor-pointer pl-2">
            <i style="color: #65676B;" class="fas fa-angle-double-up"></i>&nbsp;&nbsp;
            Thu gọn
        </p>
        <div class="w-full" id="{{ $comment->IDTaiKhoan.$comment->IDBaiDang.$comment->IDBinhLuan }}CommentLv2">

        </div>
    </div>
</div>