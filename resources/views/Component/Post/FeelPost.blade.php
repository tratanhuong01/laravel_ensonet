<?php

use App\Models\Functions;
use App\Models\Process;

?>
<div class="w-full my-4 mx-0">
    <div class="w-full flex">
        <div class="w-2/3 flex pl-0.5 py-1" id="{{ $item[0]->IDBaiDang . 'post' }}" style="line-height: 40px;">
            <?php $data = Functions::getUserFeel($item[0]->IDBaiDang);
            $comment = Process::getAllComment($item[0]->IDBaiDang);
            ?>
            {!! Functions::getStringFeel($item[0]->IDBaiDang) !!}
        </div>
        <div class="w-1/3 text-right pr-2 py-1 font-bold dark:text-white pt-3">
            @if (count($comment) == 0)
            @else
            {{count($comment)}} bình luận
            @endif
        </div>
    </div>
    <style>
        .show-feels {
            display: none;
        }

        .feels:hover>.show-feels {
            display: flex;
        }
    </style>
    <ul class="w-full flex border-t-2 border-b-2 border-solid border-gray-300 
        dark:border-dark-third relative">
        @if ($user[0]->IDTaiKhoan == $item[0]->IDTaiKhoan || $item[0]->IDQuyenRiengTu == 'CONGKHAI')
        <div class="w-1/3 dark:hover:bg-dark-third hover:bg-gray-200 feels">
            <li class="dark:text-gray-300 dark:hover:bg-dark-third hover:bg-gray-200 
            text-center w-full font-bold py-3 cursor-pointer justify-items-center" id="{{ $item[0]->IDBaiDang }}" onclick="FeelPost('{{ $item[0]->IDBaiDang }}','0@0')">
                {!! Functions::checkIsFeel($u[0]->IDTaiKhoan,$item[0]->IDBaiDang) !!}
            </li>
            <ul class=" show-feels absolute bottom-full flex flex-column dark:bg-dark-second bg-white rounded-lg border-solid 
            dark:border-dark-third border-gray-300 border rounded-3xl">
                <li class="px-2 py-2 text-3xl cursor-pointer rounded-full hover:bg-gray-300 
                dark:hover:bg-dark-third" onclick="FeelPost('{{ $item[0]->IDBaiDang }}','0@1')">👍</li>
                <li class="px-2 py-2 text-3xl cursor-pointer rounded-full hover:bg-gray-300 
                dark:hover:bg-dark-third" onclick="FeelPost('{{ $item[0]->IDBaiDang }}','1@1')">❤️</li>
                <li class="px-2 py-2 text-3xl cursor-pointer rounded-full hover:bg-gray-300 
                dark:hover:bg-dark-third" onclick="FeelPost('{{ $item[0]->IDBaiDang }}','2@1')">😆</li>
                <li class="px-2 py-2 text-3xl cursor-pointer rounded-full hover:bg-gray-300 
                dark:hover:bg-dark-third" onclick="FeelPost('{{ $item[0]->IDBaiDang }}','3@1')">😥</li>
                <li class="px-2 py-2 text-3xl cursor-pointer rounded-full hover:bg-gray-300 
                dark:hover:bg-dark-third" onclick="FeelPost('{{ $item[0]->IDBaiDang }}','4@1')">😮</li>
                <li class="px-2 py-2 text-3xl cursor-pointer rounded-full hover:bg-gray-300 
                dark:hover:bg-dark-third" onclick="FeelPost('{{ $item[0]->IDBaiDang }}','5@1')">😡</li>
            </ul>
        </div>
        <li class="dark:text-gray-300 dark:hover:bg-dark-third hover:bg-gray-200 
            text-center w-1/3 font-bold py-4 cursor-pointer justify-items-center">
            <i class="far fa-comment-alt dark:text-gray-300"></i> &nbsp; Bình Luận
        </li>
        <div class="w-1/3 z-40 
        relative cursor-pointer justify-items-center">
            <li onclick="openModalSharePost('{{ $item[0]->IDBaiDang }}',event)" class="dark:text-gray-300 dark:hover:bg-dark-third hover:bg-gray-200
            text-center w-full font-bold py-4 ">
                <i class="fas fa-share dark:text-gray-300"></i> &nbsp; Chia sẻ
            </li>
            <div id="{{ $item[0]->IDBaiDang }}Share" class="hidden bg-white my-2 absolute w-80 
            p-1 border-2 border-solid rounded-lg dark:bg-dark-second">
                @include('Component/Post/Child/ModalShare',['item' => $item])
            </div>
        </div>

        @elseif ($item[0]->IDQuyenRiengTu == 'CHIBANBE')
        <div class="w-1/2 dark:hover:bg-dark-third hover:bg-gray-200 feels">
            <li class="dark:text-gray-300 dark:hover:bg-dark-third hover:bg-gray-200 
            text-center w-full font-bold py-3 cursor-pointer justify-items-center" id="{{ $item[0]->IDBaiDang }}" onclick="FeelPost('{{ $item[0]->IDBaiDang }}','0@0')">
                {!! Functions::checkIsFeel($u[0]->IDTaiKhoan,$item[0]->IDBaiDang) !!}
            </li>
            <ul class=" show-feels absolute bottom-full flex flex-column dark:bg-dark-second bg-white rounded-lg border-solid 
            dark:border-dark-third border-gray-300 border rounded-3xl">
                <li class="px-2 py-2 text-3xl cursor-pointer rounded-full hover:bg-gray-300 
                dark:hover:bg-dark-third" onclick="FeelPost('{{ $item[0]->IDBaiDang }}','0@1')">👍</li>
                <li class="px-2 py-2 text-3xl cursor-pointer rounded-full hover:bg-gray-300 
                dark:hover:bg-dark-third" onclick="FeelPost('{{ $item[0]->IDBaiDang }}','1@1')">❤️</li>
                <li class="px-2 py-2 text-3xl cursor-pointer rounded-full hover:bg-gray-300 
                dark:hover:bg-dark-third" onclick="FeelPost('{{ $item[0]->IDBaiDang }}','2@1')">😆</li>
                <li class="px-2 py-2 text-3xl cursor-pointer rounded-full hover:bg-gray-300 
                dark:hover:bg-dark-third" onclick="FeelPost('{{ $item[0]->IDBaiDang }}','3@1')">😥</li>
                <li class="px-2 py-2 text-3xl cursor-pointer rounded-full hover:bg-gray-300 
                dark:hover:bg-dark-third" onclick="FeelPost('{{ $item[0]->IDBaiDang }}','4@1')">😮</li>
                <li class="px-2 py-2 text-3xl cursor-pointer rounded-full hover:bg-gray-300 
                dark:hover:bg-dark-third" onclick="FeelPost('{{ $item[0]->IDBaiDang }}','5@1')">😡</li>
            </ul>
        </div>
        <li class="dark:text-gray-300 dark:hover:bg-dark-third hover:bg-gray-200 
            text-center w-1/2 font-bold py-4 cursor-pointer justify-items-center">
            <i class="far fa-comment-alt dark:text-gray-300"></i> &nbsp; Bình Luận
        </li>
        @endif
    </ul>
</div>