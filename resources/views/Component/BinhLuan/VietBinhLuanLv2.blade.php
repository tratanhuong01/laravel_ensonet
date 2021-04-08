<?php

use Illuminate\Support\Facades\Session;


$user = Session::get('user');

?>
<div class="w-full mx-0 my-2 flex relative">
    <div class="">
        <a href=""><img class="w-12 h-12 p-0.5 object-cover
        rounded-full border-2 border-solid" src="/{{ $user[0]->AnhDaiDien }}" alt="" srcset=""></a>
    </div>
    <form action="" method="get" id="{{$comment->IDBaiDang.$comment->IDBinhLuan }}FormComment" enctype="multipart/form-data">
        {{ csrf_field() }}
    </form>
    <div class="w-11/12 ml-2 relative bg-gray-100 dark:bg-dark-third px-3 overflow-hidden" style="border-radius: 30px;">
        <div onkeyup="RepCommentPost('{{ $cmt[0]->IDTaiKhoan }}',
        '{{ $comment->IDBaiDang }}','{{ $comment->IDBinhLuan }}',
        '{{ $cmt[0]->IDBinhLuan }}',event)" id="{{ $cmt[0]->IDTaiKhoan.$comment->IDBaiDang.$comment->IDBinhLuan }}Write" class="border-none outline-none bg-gray-100 dark:bg-dark-third dark:text-white py-3" style="min-height: 30px;width: 96%;" contenteditable>
            @if ($idTag == $user[0]->IDTaiKhoan)
            @else
            {!! $name !!}
            @endif

        </div>
        <script>
            $("#{{ $cmt[0]->IDTaiKhoan.$comment->IDBaiDang.$comment->IDBinhLuan }}Write").keypress(function(e) {
                return e.which != 13;
            });
        </script>
        <ul class="flex absolute bottom-1 right-0">
            <li class="py-2 pr-3 cursor-pointer">
                <i class="far fa-smile dark:text-white text-gray-600"></i>
            </li>
            <li class="py-2 pr-3 cursor-pointer">
                <input onchange="processCommentImage('{{ $comment->IDBaiDang }}',
                '{{ $comment->IDBinhLuan }}',event)" name="fileImage" type="file" accept="image" id="{{ $comment->IDBaiDang.$comment->IDBinhLuan }}fileImagess" style="display: none" enctype="multipart/form-data">
                <label for="{{ $comment->IDBaiDang.$comment->IDBinhLuan }}fileImagess">
                    <i class="fas fa-camera dark:text-white text-gray-600"></i>
                </label>
            </li>
            <li onclick="openGifComment('{{$comment->IDBaiDang}}','{{$comment->IDBinhLuan}}'
            ,'',event)" class="py-2 pr-3 cursor-pointer">
                <i class="fas fa-radiation dark:text-white text-gray-600"></i>
            </li>
            <li onclick="openStickerComment('{{$comment->IDBaiDang}}','{{$comment->IDBinhLuan}}'
            ,'{{$cmt[0]->IDTaiKhoan}}','{{ $cmt[0]->IDBinhLuan }}','2',event)" class="py-2 pr-3 cursor-pointer">
                <i class="far fa-sticky-note dark:text-white text-gray-600"></i>
            </li>

        </ul>
    </div>
    <div id="{{ $comment->IDBaiDang.$comment->IDBinhLuan }}modalComment" class="z-50 hidden absolute right-0 bg-white my-2 absolute w-72 dark:border-dark-second 
    shadow-lg border-gray-300 p-1 border-2 border-solid rounded-lg dark:bg-dark-second" style="max-height: 365px;height: 360px;">
    </div>
</div>
<div class="w-full" id="{{ $comment->IDBaiDang.$comment->IDBinhLuan }}CommentImage">

</div>