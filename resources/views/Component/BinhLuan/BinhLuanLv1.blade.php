<?php

use App\Models\Process;
use Illuminate\Support\Facades\Session;
use App\Models\StringUtil;
use App\Models\Functions;

$user = Session::get('user');

?>

<div class="w-full mx-0 my-2 flex">
    <div class="w-1/12 pt-2">
        <a href=""><img class="w-12 h-12 p-0.5 object-cover rounded-full" src="/{{ $comment->AnhDaiDien }}" alt="" srcset=""></a>
    </div>
    <div class="w-11/12 ml-2 relative main-comment">
        <div id="comment.{{ $comment->IDBinhLuan.$comment->IDBaiDang }}" class="comment-per w-max p-2 dark:bg-dark-third bg-gray-100 relative rounded-lg" style="max-width: 91%;">
            <p><a href="" class="font-bold dark:text-white">{{ $comment->Ho . ' ' . $comment->Ten }}</a></p>
            <p class="dark:text-white" style="font-size: 15px;clear: both;word-wrap: break-word;">
                {!! $comment->NoiDungBinhLuan !!}
            </p>
            <span id="{{ $comment->IDBinhLuan }}NumFeelCmt" class=" 
            absolute cursor-pointer" style="border-radius: 20px;bottom:-5px;left:92%;white-space: nowrap;">
                {{ Process::getFeelComment($comment->IDBinhLuan) }}
            </span>
            <div id="editComments.{{ $comment->IDBinhLuan.$comment->IDBaiDang }}" class="hidden 
                editCommentsss px-2 dark:text-white cursor-pointer bg-gray-300 dark:bg-dark-third w-8 h-8
                rounded-full absolute top-1/2 right-0" style="padding-top: 9px;">
                <i class="fas fa-ellipsis-h"></i>

            </div>
            <div class="w-36 py-2 dark:bg-dark-main z-50 absolute hidden">
                <ul class="w-full">
                    <li class="w-full dark:text-white p-2">Chỉnh sửa</li>
                    <li class="w-full dark:text-white p-2">Xóa</li>
                </ul>
            </div>
        </div>

        <style>
            .main-comment:hover .editCommentsss {
                display: flex;
            }
        </style>
        <script>
            var comment = document.getElementById("comment." + "{{ $comment->IDBinhLuan.$comment->IDBaiDang }}");
            var editComment = document.getElementById("editComments." + "{{ $comment->IDBinhLuan.$comment->IDBaiDang }}");
            editComment.style.left = comment.offsetWidth + 20 + "px";
            editComment.style.top = 5 + "px";
        </script>
        <ul class="flex pl-2">
            <li class="relative feels font-bold text-sm py-1 
                pr-2 cursor-pointer dark:text-white">
                <span onclick="FeelCommentPost('{{ $comment->IDBinhLuan }}','0@0')" id="{{ $comment->IDBinhLuan }}">
                    {!! Functions::checkIsFeelCmt($user[0]->IDTaiKhoan,$comment->IDBinhLuan) !!}</span>
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
        <div class="w-full" id="{{ $comment->IDTaiKhoan.$comment->IDBaiDang.$comment->IDBinhLuan }}ACommentLv2">
            <div class="w-full" id="{{ $comment->IDTaiKhoan.$comment->IDBaiDang.$comment->IDBinhLuan }}CommentLv2">
                <div class=w-full>
                    <?php $commentLimit = Process::getRepCommentLimit($comment->IDBinhLuan, 0);
                    ?>
                    @for($i = 0;$i < count($commentLimit) ;$i++) </p>
                        @include('Component\BinhLuan\BinhLuanLv2',[
                        'comment'=> $commentLimit[$i],
                        'comment_main'=> $comment,
                        ])
                        @endfor

                </div>
            </div>
            <div class="w-full" id="{{ $comment->IDTaiKhoan.$comment->IDBaiDang.$comment->IDBinhLuan }}NumComment">
                <?php $comments = Process::getCommentNewCmt($comment->IDBinhLuan); ?>
                @include('Component\BinhLuan\XemPhanHoi',
                ['num' => count($comments),
                'idTaiKhoan' => $comment->IDTaiKhoan,
                'idBaiDang' => $comment->IDBaiDang,
                'idBinhLuan' => $comment->IDBinhLuan ,
                'count' => count($comments)
                ])
            </div>
        </div>

    </div>
</div>