<?php

use Illuminate\Support\Facades\Session;


$user = Session::get('user');

?>
<div class="w-full mx-0 my-2 flex">
    <div class="">
        <a href=""><img class="w-12 h-12 p-0.5 object-cover
        rounded-full border-2 border-solid" src="/{{ $user[0]->AnhDaiDien }}" alt="" srcset=""></a>
    </div>
    <div class="w-11/12 ml-2 relative bg-gray-100 dark:bg-dark-third px-3 overflow-hidden" style="border-radius: 30px;">
        <div onkeyup="RepCommentPost('{{ $cmt[0]->IDTaiKhoan }}',
        '{{ $comment->IDBaiDang }}','{{ $comment->IDBinhLuan }}','{{ $cmt[0]->IDBinhLuan }}',event)" id="{{ $cmt[0]->IDTaiKhoan.$comment->IDBaiDang.$comment->IDBinhLuan }}Write" class="border-none outline-none bg-gray-100 dark:bg-dark-third dark:text-white py-3" style="min-height: 30px;width: 96%;" contenteditable>
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
            <li class="py-2 pr-3 cursor-pointer"><i class="far fa-smile dark:text-white text-gray-600"></i></li>
            <li class="py-2 pr-3 cursor-pointer"><i class="fas fa-camera dark:text-white text-gray-600"></i></li>
            <li class="py-2 pr-3 cursor-pointer"><i class="fas fa-radiation dark:text-white text-gray-600"></i>
            </li>
            <li class="py-2 pr-3 cursor-pointer"><i class="far fa-sticky-note dark:text-white text-gray-600"></i>
            </li>
        </ul>
    </div>
</div>