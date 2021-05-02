<?php

use App\Models\Process;
use Illuminate\Support\Facades\Session;
use App\Models\StringUtil;
use App\Models\Functions;
use App\Models\Nhandan;

$user = Session::get('user');

?>

<div class="w-full mx-0 flex my-2" id="{{$comment->IDBaiDang.$comment->IDBinhLuan}}">
    <div class="w-1/12 pt-2">
        <a href=""><img class="w-12 h-12 p-0.5 object-cover rounded-full" src="{{ $comment->AnhDaiDien }}" alt="" srcset=""></a>
    </div>
    <div class="w-11/12 ml-2 relative main-comment">
        <div id="comment.{{ $comment->IDBinhLuan.$comment->IDBaiDang }}" class="comment-per 
        w-max p-2 {{ json_decode($comment->NoiDungBinhLuan)->LoaiBinhLuan == 0 ? 
        ' dark:bg-dark-third bg-gray-100 ' : '' }} relative 
        rounded-lg" style="max-width: 91%;">
            <p><a href="" class="font-bold dark:text-white">{{ $comment->Ho . ' ' . $comment->Ten }}</a></p>
            <p class="dark:text-white" style="font-size: 15px;clear: both;word-wrap: break-word;">
                @switch(json_decode($comment->NoiDungBinhLuan)->LoaiBinhLuan)
                @case('0')
                {!! json_decode($comment->NoiDungBinhLuan)->NoiDungBinhLuan !!}
                @break
                @case('1')
                @include('Component/Comment/CommentImage',['json' => json_decode($comment->NoiDungBinhLuan)])
                @break
                @case('2')
                @include('Component/Comment/Sticker',[
                'value' => Nhandan::where('nhandan.IDNhanDan', '=', json_decode($comment->NoiDungBinhLuan)->DuongDan)->get()[0],
                'json' => json_decode($comment->NoiDungBinhLuan)
                ])
                @break
                @endswitch
            </p>
            <span id="{{ $comment->IDBinhLuan }}NumFeelCmt" class=" 
            absolute cursor-pointer" style="border-radius: 20px;bottom:-5px;left:92%;white-space: nowrap;">
                {{ Process::getFeelComment($comment->IDBinhLuan) }}
            </span>
            @if ($comment->IDTaiKhoan == $user[0]->IDTaiKhoan)
            <div onclick="openModalEditComment('{{ $comment->IDBaiDang }}','{{ $comment->IDBinhLuan }}'
            )" id="editComments.{{ $comment->IDBinhLuan.$comment->IDBaiDang }}" class=" 
                editCommentsss px-2 dark:text-white cursor-pointer bg-gray-100 dark:bg-dark-third w-8 h-8
                rounded-full absolute -right-24 " style="padding-top: 9px;">
                <i class="fas fa-ellipsis-h flex items-center"></i>
                <div id="editComments{{ $comment->IDBinhLuan.$comment->IDBaiDang }}" class="w-36 py-2 dark:bg-dark-main
                bg-gray-100 z-50 absolute hidden" style="display: none;">
                    <ul class="w-full">
                        <li onclick="editCommentView('{{ $comment->IDBaiDang }}',
                        '{{ $comment->IDBinhLuan }}',1)" class="w-full dark:text-white p-2 border-2 cursor-pointer font-bold
                        border-gray-200 border-solid dark:border-dark-second 
                        hover:bg-gray-300 dark:hover:bg-dark-second">Chỉnh sửa</li>
                        <li onclick="deleteWarnComment('{{ $comment->IDBaiDang }}',
                        '{{ $comment->IDBinhLuan }}','{{ $comment->IDBinhLuan }}')" class="w-full dark:text-white p-2 cursor-pointer font-bold 
                        hover:bg-gray-300 dark:hover:bg-dark-second">Xóa</li>
                    </ul>
                </div>
            </div>
            @else

            @endif
        </div>
        <script>
            var comment = document.getElementById("comment." + "{{ $comment->IDBinhLuan.$comment->IDBaiDang }}");
            var editComment = document.getElementById("editComments." + "{{ $comment->IDBinhLuan.$comment->IDBaiDang }}");
            editComment.style.top = (comment.offsetHeight - 32) / 2 + "px";
        </script>
        <ul class="flex pl-2">
            <li class="relative feels font-bold text-sm py-1 
                pr-2 cursor-pointer dark:text-white">
                <span onclick="FeelCommentPost('{{ $comment->IDBinhLuan }}','0@0')" id="{{ $comment->IDBinhLuan }}">
                    {!! Functions::checkIsFeelCmt($user[0]->IDTaiKhoan,$comment->IDBinhLuan) !!}</span>
                @include('Component\Comment\FeelComment',['comment' => $comment])
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
                        @include('Component\Comment\CommentLv2',[
                        'comment'=> $commentLimit[$i],
                        'comment_main'=> $comment,
                        ])
                        @endfor

                </div>
            </div>
            <div class="w-full" id="{{ $comment->IDTaiKhoan.$comment->IDBaiDang.$comment->IDBinhLuan }}NumComment">
                <?php $comments = Process::getCommentNewCmt($comment->IDBinhLuan); ?>
                @include('Component\Comment\ViewReply',
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