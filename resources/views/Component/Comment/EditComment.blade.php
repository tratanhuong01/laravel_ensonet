<?php

use App\Models\Nhandan;
?>
<div onkeyup="escapeEditComment(event,'{{ $idBaiDang }}',
        '{{ $comment->IDBinhLuan }}','{{ $comment->LoaiBinhLuan }}')" class="w-full flex flex-wrap" id="{{$comment->IDBinhLuan}}ElEditComments">
    <div class="w-full mx-0 my-2 flex relative">
        <div class="w-1/12">
            <a href=""><img class="w-12 h-12 p-0.5 object-cover
        rounded-full border-2 border-solid" src="{{ $anhDaiDien }}" alt="" srcset=""></a>
        </div>
        <form action="" method="get" id="{{$comment->IDBinhLuan}}FormComment" enctype="multipart/form-data">
            {{ csrf_field() }}
            @switch(json_decode($comment->NoiDungBinhLuan)->LoaiBinhLuan)
            @case('1')
            <input id="{{ $comment->IDBaiDang.$comment->IDBinhLuan }}DuongDanHinhAnh" class="hidden" value="{{ json_decode($comment->NoiDungBinhLuan)->DuongDan }}">
            @break
            @case('2')
            <input id="{{ $comment->IDBinhLuan }}IDNhanDan" class="hidden" name="IDNhanDan" value="{{ json_decode($comment->NoiDungBinhLuan)->DuongDan }}">
            @break
            @endswitch
        </form>
        <div class="w-11/12 ml-2 relative bg-gray-100 dark:bg-dark-third px-3 overflow-hidden" style="border-radius: 30px;">
            <div onkeyup="editComments(event,'{{ $comment->IDBaiDang }}',
            '{{ $comment->IDBinhLuan }}','{{ $comment->LoaiBinhLuan }}')" id="{{ $comment->IDBinhLuan }}Write" class="border-none outline-none bg-gray-100 dark:bg-dark-third dark:text-white py-3" style="min-height: 30px;width: 96%;" contenteditable>
                {{json_decode($comment->NoiDungBinhLuan)->NoiDungBinhLuan == NULL ? 
            'Viết bình luận....' : json_decode($comment->NoiDungBinhLuan)->NoiDungBinhLuan}}
            </div>
            <script>
                $("#{{ $comment->IDBinhLuan }}Write").keypress(function(e) {
                    return e.which != 13;
                });
            </script>
            <ul class="flex absolute bottom-1 right-0">
                <li class="py-2 pr-3 cursor-pointer">
                    <i class="far fa-smile dark:text-white text-gray-600"></i>
                </li>
                <li class="py-2 pr-3 cursor-pointer">
                    <input onchange="processCommentImage('','{{ $comment->IDBinhLuan }}',event)" name="fileImage" type="file" accept="image" id="{{ $comment->IDBinhLuan }}fileImagess" style="display: none" enctype="multipart/form-data">
                    <label for="{{ $comment->IDBinhLuan }}fileImagess">
                        <i class="fas fa-camera dark:text-white text-gray-600"></i>
                    </label>
                </li>
                <li onclick="openGifComment('','{{ $comment->IDBinhLuan }}','',event)" class="py-2 pr-3 cursor-pointer">
                    <i class="fas fa-radiation dark:text-white text-gray-600"></i>
                </li>
                <li onclick="openStickerComment('','{{ $comment->IDBinhLuan }}',
                '','','2',event)" class="py-2 pr-3 cursor-pointer">
                    <i class="far fa-sticky-note dark:text-white text-gray-600"></i>
                </li>
            </ul>
        </div>
        <div id="{{ $comment->IDBinhLuan }}modalComment" class="z-50 hidden absolute right-0 bg-white my-2 absolute w-72 dark:border-dark-second 
    shadow-lg border-gray-300 p-1 border-2 border-solid rounded-lg dark:bg-dark-second" style="max-height: 365px;height: 360px;">
        </div>
    </div>

    <div class="w-full" id="{{ $comment->IDBinhLuan }}CommentImage">
        @if (json_decode($comment->NoiDungBinhLuan)->LoaiBinhLuan == '0')
        @else
        @switch(json_decode($comment->NoiDungBinhLuan)->LoaiBinhLuan)
        @case('1')
        @include('Component/Child/CommentImage',[
        'path' => json_decode($comment->NoiDungBinhLuan)->DuongDan,
        'idBaiDang' => '',
        'idBinhLuan' => $comment->IDBinhLuan
        ])
        @break
        @case('2')
        @include('Component\Child\CommentSticker',[
        'value' => Nhandan::where('nhandan.IDNhanDan','=',
        json_decode($comment->NoiDungBinhLuan)->DuongDan)->get()[0],
        'idBaiDang' => '',
        'idBinhLuan' => $comment->IDBinhLuan
        ])
        @break
        @endswitch
        @endif
    </div>
    <div class="pl-16 py-2 dark:text-white font-bold text-xs">
        Bấm phím ESC để <span onclick="escapeEditComment(event,'{{ $idBaiDang }}',
        '{{ $comment->IDBinhLuan }}','{{ $comment->LoaiBinhLuan }}')" class="text-blue-500 cursor-pointer">hủy</span>
    </div>
</div>