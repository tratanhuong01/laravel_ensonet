<?php

use App\Models\StringUtil;
use App\Models\Functions;
use Illuminate\Support\Facades\Session;

$u = Session::get('user');

?>
<div id="{{ $item[0]->IDTaiKhoan.$item[0]->IDBaiDang }}Main" class="w-full bg-white dark:bg-dark-second my-4 py-4 px-2 rounded-lg">
    <div class="w-full flex">
        <div class="mr-2">
            <a href="profile.{{ $item[0]->IDTaiKhoan }}"><img class="w-12 h-12 rounded-full 
                            border-4 border-solid border-gray-200" src="{{ $item[0]->AnhDaiDien }}"></a>
        </div>
        <div class="relative pl-1" style="width: 80%;">
            <p class="mb-2 dark:text-gray-300"><a href="profile.{{ $item[0]->IDTaiKhoan }}"><b class="dark:text-white">
                        {{ $item[0]->Ho . ' ' . $item[0]->Ten }}
                    </b>
                    &nbsp;</a> đã cập nhật ảnh bìa của anh ấy.</p>
            <div class="w-full flex">
                <div class="text-xs pt-0.5 pr-2">
                    <ul class="flex">
                        <li class="pt-1">
                            <a href="" class="dark:text-gray-300 font-bold">
                                {{ StringUtil::CheckDateTime($item[0]->NgayDang) }}</a>
                        </li>
                        <li class="pl-3 pt-0.5" id="{{ $item[0]->IDBaiDang }}QRT">
                            @include('Component\BaiDang\QuyenRiengTuBD',['idQuyenRiengTu' => $item[0]->IDQuyenRiengTu])
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="text-center relative" style="width: 10%;">
            @if ($item[0]->IDTaiKhoan != $u[0]->IDTaiKhoan)
            <i class="cursor-pointer fas fa-ellipsis-h pt-2 text-xl dark:text-gray-300"></i>
            @else
            <i onclick="openEditPost('{{ $item[0]->IDTaiKhoan.$item[0]->IDBaiDang }}')" class="cursor-pointer fas fa-ellipsis-h pt-2 text-xl dark:text-gray-300"></i>
            <div class="w-72 z-40 dark:bg-dark-second bg-gray-100 border-2 absolute top-10 right-4 
            border-solid border-gray-300 dark:border-dark-third shadow-1 hidden " id="{{ $item[0]->IDTaiKhoan.$item[0]->IDBaiDang }}">
                <ul class="w-full">
                    <li onclick="editPost('{{ $item[0]->IDBaiDang }}')" class="dark:text-white font-bold px-4 py-2.5 border-b-2 border-solid border-gray-200 
                    dark:border-dark-third cursor-pointer text-left dark:hover:bg-dark-third hover:bg-gray-200">
                        <i class="fas fa-pen text-xl"></i>&nbsp;&nbsp;&nbsp;Chỉnh sửa bài viết
                    </li>
                    <li onclick="changeObjectPrivacyPost('{{ $item[0]->IDBaiDang }}')" class="dark:text-white font-bold px-4 py-2.5 border-b-2 border-solid border-gray-200 
                    dark:border-dark-third cursor-pointer text-left dark:hover:bg-dark-third hover:bg-gray-200">
                        <i class="fas fa-globe-europe text-xl"></i>&nbsp;&nbsp;&nbsp;Chỉnh sửa đối tượng
                    </li>
                    <li onclick="deleteWarnPost('{{ $item[0]->IDBaiDang }}',
                    '{{ $item[0]->IDTaiKhoan.$item[0]->IDBaiDang }}Main')" class="dark:text-white font-bold px-4 py-2.5 cursor-pointer text-left 
                    dark:hover:bg-dark-third  hover:bg-gray-200">
                        <i class="far fa-trash-alt text-xl"></i>&nbsp;&nbsp;&nbsp;&nbsp;Xóa
                    </li>
                </ul>
            </div>
            @endif
        </div>
    </div>
    <div class="w-full mx-0 my-2.5">
        <p class="dark:text-white">{{ $item[0]->NoiDung }}</p>
    </div>
    <div class="w-full mx-0 my-2.5">
        <a href="photo/{{ $item[0]->IDBaiDang }}/{{ $item[0]->IDHinhAnh }}">
            <img src="{{ $item[0]->DuongDan }}" alt="" class="w-full h-72 object-cover">
        </a>
    </div>
    <div class="w-full my-4 mx-0">
        <div class="w-full flex">
            <div class="w-full flex pl-0.5 py-1" id="{{ $item[0]->IDBaiDang . 'post' }}" style="line-height: 40px;">
                <?php $data = Functions::getUserFeel($item[0]->IDBaiDang); ?>
                {!! Functions::getStringFeel($item[0]->IDBaiDang) !!}
            </div>
            <div class="w-full text-right pr-2 py-1">
                <p class="cursor-pointer dark:text-gray-300 text-gray-600 font-bold ">
                </p>
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
            text-center w-1/3 font-bold py-4 cursor-pointer justify-items-center"><i class="far fa-comment-alt dark:text-gray-300"></i> &nbsp; Bình Luận</li>
            <li class="dark:text-gray-300 dark:hover:bg-dark-third hover:bg-gray-200 
            text-center w-1/3 font-bold py-4 cursor-pointer justify-items-center"><i class="fas fa-share dark:text-gray-300"></i> &nbsp; Chia sẻ</li>
        </ul>
    </div>
</div>