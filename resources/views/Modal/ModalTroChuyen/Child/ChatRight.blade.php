<?php

use App\Models\Nhandan;
use App\Models\Process;
use App\Models\Taikhoan;
use App\Process\DataProcess;
use App\Process\DataProcessFive;

$member = DataProcess::getUserOfGroupMessage($message->IDNhomTinNhan);

?>
<div id="{{ $message->IDTinNhan }}" onmouseleave="onleaveHoverFeelHide('{{ $message->IDTinNhan }}')" class="mess-user chat-rights w-full py-1 flex relative">
    <div class="mess-user-feel z-50 hidden h-auto relative">
        <div class="cursor-pointer color-word absolute top-1/2 pl-2" style="transform: translateY(-50%);">
            <ul class="w-full flex relative">
                <ul id="{{$message->IDTinNhan}}Feel" class="-left-2 absolute bottom-full flex flex-column 
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
    <div class="mess-user-r1 pl-2 flex mr-4" style="width: inherit;">
        <div class="mess-right {{ json_decode($message->NoiDung)[0]->LoaiTinNhan == 0 ? 
        ' mess-right-child-'.$message->IDNhomTinNhan : '' }} relative
         break-all ml-auto border-none outline-none p-1.5 rounded-lg relative
                text-white " style="max-width:75%;font-size: 15px;">
            @switch(json_decode($message->NoiDung)[0]->LoaiTinNhan)
            @case('0')
            {{json_decode($message->NoiDung)[0]->NoiDungTinNhan}}
            @break
            @case('1')
            @include('Modal/ModalTroChuyen/Child/Anh',['json' => json_decode($message->NoiDung)])
            @break
            @case('2')
            @include('Modal/ModalTroChuyen/Child/ChatNhanDan',[
            'value' => Nhandan::where('nhandan.IDNhanDan', '=', json_decode($message->NoiDung)[0]->DuongDan)->get()[0],
            'json' => json_decode($message->NoiDung)[0]
            ])
            @break
            @endswitch
        </div>
        <span id="{{ $message->IDTinNhan }}NumFeelMessage" class=" z-10
            absolute cursor-pointer" style="border-radius: 20px;bottom:-13px;left:82%;white-space: nowrap;">
            {{Process::getFeelMesage($message->IDTinNhan)}}
        </span>
    </div>
    <div class=" mess-user-r2 mess-user-r2{{$message->IDNhomTinNhan}} " id="{{ $message->IDTinNhan }}right" style=" width: 4%;">
        <div class="w-full clear-both">
            @if ($message->TrangThai == 0)
            @else
            @php
            $trangThais = explode('#',DataProcess::getTrangThaiTinNhan($message->TrangThai,$message->IDTaiKhoan));
            @endphp
            @switch($trangThais[1])
            @case('0')
            <i class="far fa-check-circle img-mess-right absolute bottom-1.5 text-gray-300"></i>
            @break
            @case('1')
            <i class="fas fa-check-circle img-mess-right absolute bottom-1.5 text-gray-300"></i>
            @break
            @case('2')
            @if (DataProcessFive::checkShowOrHideMessageRight($message->IDNhomTinNhan,
            $member[0]->IDTaiKhoan) != $message->IDTinNhan)
            @else
            <img src="/{{ Taikhoan::where('IDTaiKhoan','=',$trangThais[0])->get()[0]->AnhDaiDien }}" class="img-mess-right absolute right-3 w-6 h-6 p-0.5 mt-1 mr-7 object-cover rounded-full bottom-2 -right-8" alt="">
            @endif
            @break
            @endswitch
            @endif
        </div>
    </div>
</div>