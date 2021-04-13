<?php

use App\Models\Nhandan;
use App\Models\Process;
use App\Models\Taikhoan;
use App\Process\DataProcess;
use App\Process\DataProcessFive;

?>
<div id="{{ $message->IDTinNhan }}" onmouseleave="onleaveHoverFeelHide('{{ $message->IDTinNhan }}')" class="mess-user chat-lefts w-full py-2 flex relative">
    <div class="w-12 relative">
        <a href=""><img class="absolute bottom-1 w-9 h-9 object-cover rounded-full" src="/{{ $message->AnhDaiDien }}" alt="" srcset=""></a>
    </div>
    <div class=" pl-2 flex z-50" style="width: inherit;">
        <div class="border-none relative outline-none  {{ json_decode($message->NoiDung)[0]->LoaiTinNhan == 0 ? 
        ' bg-gray-200 ' : '' }}  p-1.5 rounded-lg" style="max-width:75%;font-size: 15px;word-break: break-all;">
            @switch(json_decode($message->NoiDung)[0]->LoaiTinNhan)
            @case('0')
            {{json_decode($message->NoiDung)[0]->NoiDungTinNhan}}
            @break
            @case('1')
            @include('Modal/ModalChat/Child/Image',['json' => json_decode($message->NoiDung)])
            @break
            @case('2')
            @include('Modal/ModalChat/Child/ChatSticker',[
            'value' => Nhandan::where('nhandan.IDNhanDan', '=', json_decode($message->NoiDung)[0]->DuongDan)->get()[0],
            'json' => json_decode($message->NoiDung)[0]
            ])
            @break
            @endswitch
            <span id="{{ $message->IDTinNhan }}NumFeelMessage" class=" z-0
            absolute cursor-pointer" style="border-radius: 20px;bottom:-13px;left:90%;white-space: nowrap;">
                {{Process::getFeelMesage($message->IDTinNhan)}}
            </span>
        </div>

        <div class="mess-user-feel hidden h-auto relative ml-2">
            <div class="cursor-pointer color-word absolute top-1/2 pl-2" style="transform: translateY(-50%);">
                <ul class="w-full flex relative">
                    <ul id="{{$message->IDTinNhan}}Feel" class="-left-52 absolute bottom-full flex flex-column 
                    dark:bg-dark-second bg-white rounded-lg border-solid dark:border-dark-third 
                    border-gray-300 border rounded-3xl hidden">
                        <li class="px-2 py-2 text-xl cursor-pointer rounded-full hover:bg-gray-300 
                        dark:hover:bg-dark-third" onclick="feelMessage('{{$message->IDTinNhan}}','0@1')">👍</li>
                        <li class="px-2 py-2 text-xl cursor-pointer rounded-full hover:bg-gray-300 
                        dark:hover:bg-dark-third" onclick="feelMessage('{{$message->IDTinNhan}}','1@1')">❤️</li>
                        <li class="px-2 py-2 text-xl cursor-pointer rounded-full hover:bg-gray-300 
                        dark:hover:bg-dark-third" onclick="feelMessage('{{$message->IDTinNhan}}','2@1')">😆</li>
                        <li class="px-2 py-2 text-xl cursor-pointer rounded-full hover:bg-gray-300 
                        dark:hover:bg-dark-third" onclick="feelMessage('{{$message->IDTinNhan}}','3@1')">😥</li>
                        <li class="px-2 py-2 text-xl cursor-pointer rounded-full hover:bg-gray-300 
                        dark:hover:bg-dark-third" onclick="feelMessage('{{$message->IDTinNhan}}','4@1')">😮</li>
                        <li class="px-2 py-2 text-xl cursor-pointer rounded-full hover:bg-gray-300 
                        dark:hover:bg-dark-third" onclick="feelMessage('{{$message->IDTinNhan}}','5@1')">😡</li>
                    </ul>
                    <li onclick="feelViewMessage('{{ $message->IDTinNhan }}')" class="feel-mess px-1 mr-1 rounded-full hover:bg-gray-300 dark:hover:bg-dark-third">
                        <i class="far fa-smile text-xm"></i>
                    </li>
                    <li onclick="viewRemoveMessage(
                        '{{ $message->IDTinNhan }}',
                        '{{ $message->IDTaiKhoan }}',
                        '{{ $message->IDNhomTinNhan }}')" class="px-1.5 rounded-full hover:bg-gray-300 dark:hover:bg-dark-third">
                        <i class="far fa-trash-alt text-xm"></i>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>