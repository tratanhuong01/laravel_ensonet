<?php

use Illuminate\Support\Facades\Session;
use App\Process\DataProcess;
use App\Models\StringUtil;

?>
<div id="{{ $chater[0]->IDTaiKhoan }}Chat" class="relative bg-white w-1/2 m-2 p-2 dark:bg-dark-second rounded-lg 
dark:border-dark-third border-2 border-solid border-gray-300 ml-auto">
    <div class="w-full flex py-1 border-b-2 border-solid border-gray-200  dark:border-dark-third">
        <div class=" pb-0.5">
            <div class="w-10 h-10 relative">
                <img src="/{{ $chater[0]->AnhDaiDien }}" class="cursor-pointer w-10 h-10 rounded-full object-cover" alt="">
                @include('Component\Child\HoatDong',
                [
                'padding' => 'p-1',
                'bottom' => 'bottom-0',
                'right' => 'right-1',
                'IDTaiKhoan' => $chater[0]->IDTaiKhoan
                ])
            </div>
        </div>
        <div class="w-3/5 pl-2">
            @php
            $timeAcitivity = StringUtil::CheckDateTimeUserActivity($chater[0]->ThoiGianHoatDong)
            @endphp
            @if ($timeAcitivity == "")
            <p onclick="openSettingChat('{{ $chater[0]->IDTaiKhoan }}')" class="py-2.5 dark:text-white cursor-pointer text-sm font-bold">
                {{ $chater[0]->Ho . ' ' . $chater[0]->Ten }}&nbsp;&nbsp;<i class="fas fa-angle-down"></i><br>
            </p>
            @else
            <p onclick="openSettingChat('{{ $chater[0]->IDTaiKhoan }}')" class="dark:text-white cursor-pointer text-sm font-bold">
                {{ $chater[0]->Ho . ' ' . $chater[0]->Ten }}&nbsp;&nbsp;<i class="fas fa-angle-down"></i><br>
                <span class="text-gray-300 text-xs">{{ $timeAcitivity }}</span>
            </p>
            @endif
        </div>
        <div class="w-45per">
            <ul class="flex justify-end">
                <li class="cursor-pointer py-1.5 px-1.5 hover:bg-gray-200 rounded-full 
                dark:hover:bg-dark-third">
                    <svg role="presentation" height="26px" width="26px" viewBox="-5 -5 30 30">
                        <path id="callVideo{{ $idNhomTinNhan }}" fill="#{{ (count($messages)==0?'65676B':$messages[0]->IDMauTinNhan) }}" d="M19.492 4.112a.972.972 0 00-1.01.063l-3.052 2.12a.998.998 0 00-.43.822v5.766a1
                                        1 0 00.43.823l3.051 2.12a.978.978 0 001.011.063.936.936 0 00.508-.829V4.94a.936.936
                                        0 00-.508-.828zM10.996 18A3.008 3.008 0 0014 14.996V5.004A3.008 3.008 0 0010.996 
                                        2H3.004A3.008 3.008 0 000 5.004v9.992A3.008 3.008 0 003.004 18h7.992z" fill="#bec2c9"></path>
                    </svg>
                </li>
                <li class="cursor-pointer py-1.5 px-1.5 hover:bg-gray-200 rounded-full 
                dark:hover:bg-dark-third">
                    <svg fill="#{{ (count($messages)==0?0:$messages[0]->IDMauTinNhan) }}" role="presentation" height="26px" width="26px" viewBox="-5 -5 30 30">
                        <path id="callAudio1{{ $idNhomTinNhan }}" fill="#{{ (count($messages)==0?'65676B':$messages[0]->IDMauTinNhan) }}" d="M10.952 14.044c.074.044.147.086.22.125a.842.842 0 001.161-.367c.096-.195.167-.185.337-.42.204-.283.552-.689.91-.772.341-.078.686-.105.92-.11.435-.01 1.118.174 1.926.648a15.9 15.9 0 011.713 1.147c.224.175.37.43.393.711.042.494-.034 1.318-.754 2.137-1.135 1.291-2.859 1.772-4.942 1.088a17.47 17.47 0 01-6.855-4.212 17.485 17.485 0 01-4.213-6.855c-.683-2.083-.202-3.808 1.09-4.942.818-.72 1.642-.796 2.136-.754.282.023.536.17.711.392.25.32.663.89 1.146 1.714.475.808.681 1.491.65 1.926-.024.31-.026.647-.112.921-.11.35-.488.705-.77.91-.236.17-.226.24-.42.336a.841.841 0 00-.368 1.161c.04.072.081.146.125.22a14.012 14.012 0 004.996 4.996z" fill="#{{ (count($messages)==0?'65676B':$messages[0]->IDMauTinNhan) }}"></path>
                        <path id="callAudio2{{ $idNhomTinNhan }}" fill="#{{ (count($messages)==0?'65676B':$messages[0]->IDMauTinNhan) }}" d="M10.952 14.044c.074.044.147.086.22.125a.842.842 0 001.161-.367c.096-.195.167-.185.337-.42.204-.283.552-.689.91-.772.341-.078.686-.105.92-.11.435-.01 1.118.174 1.926.648.824.484 1.394.898 1.713 1.147.224.175.37.43.393.711.042.494-.034 1.318-.754 2.137-1.135 1.291-2.859 1.772-4.942 1.088a17.47 17.47 0 01-6.855-4.212 17.485 17.485 0 01-4.213-6.855c-.683-2.083-.202-3.808 1.09-4.942.818-.72 1.642-.796 2.136-.754.282.023.536.17.711.392.25.32.663.89 1.146 1.714.475.808.681 1.491.65 1.926-.024.31-.026.647-.112.921-.11.35-.488.705-.77.91-.236.17-.226.24-.42.336a.841.841 0 00-.368 1.161c.04.072.081.146.125.22a14.012 14.012 0 004.996 4.996z" fill="none" stroke="#{{ (count($messages)==0?'65676B':$messages[0]->IDMauTinNhan) }}"></path>
                    </svg>
                </li>
                <li onclick="minizeChat('{{ $chater[0]->IDTaiKhoan }}')" class="cursor-pointer py-1.5 px-1.5 hover:bg-gray-200 rounded-full 
                dark:hover:bg-dark-third">
                    <svg fill="#{{ (count($messages)==0?'65676B':$messages[0]->IDMauTinNhan) }}" height="26px" width="26px" viewBox="-4 -4 24 24">
                        <line id="minize{{ $idNhomTinNhan }}" stroke="#{{ (count($messages)==0?'65676B':$messages[0]->IDMauTinNhan) }}" stroke-linecap="round" stroke-width="2" x1="2" x2="14" y1="8" y2="8"></line>
                    </svg>
                </li>
                <li onclick="closeChat('{{ $chater[0]->IDTaiKhoan }}')" class="cursor-pointer py-1.5 px-1.5 hover:bg-gray-200 rounded-full 
                dark:hover:bg-dark-third">
                    <svg height="26px" width="26px" viewBox="-4 -4 24 24">
                        <line id="close1{{ $idNhomTinNhan }}" stroke="#{{ (count($messages)==0?'65676B':$messages[0]->IDMauTinNhan) }}" stroke-linecap="round" stroke-width="2" x1="2" x2="14" y1="2" y2="14"></line>
                        <line id="close2{{ $idNhomTinNhan }}" stroke="#{{ (count($messages)==0?'65676B':$messages[0]->IDMauTinNhan) }}" stroke-linecap="round" stroke-width="2" x1="2" x2="14" y1="14" y2="2"></line>
                    </svg>
                </li>
            </ul>
        </div>
    </div>
    <div id='{{ $idNhomTinNhan.$chater[0]->IDTaiKhoan }}Messenges' class="w-full p-1 wrapper-content-right h-88 overflow-y-auto overflow-x-hidden relative">
        @if (count($messages) == 0)
        @include('Modal/ModalTroChuyen/Child/NewChat',['chater' => $chater])
        @else
        @include('Modal/ModalTroChuyen/Child/NewChat',['chater' => $chater])
        @foreach($messages as $key => $value)
        @if(Session::get('user')[0]->IDTaiKhoan == $value->IDTaiKhoan)
        @if($value->LoaiTinNhan == 2)
        @include('Modal\ModalTroChuyen\Child\ChatCenter',['message' => $value])
        @else
        @switch(explode('#',DataProcess::getState($value->TinhTrang,Session::get('user')[0]->IDTaiKhoan))[1])
        @case('1')
        @include('Modal\ModalTroChuyen\Child\ChatRight',['message' => $value])
        @break
        @case('2')
        @include('Modal\ModalTroChuyen\Child\ThuHoiTinNhanR',['message' => $value])
        @break
        @endswitch
        @endif
        @else
        @if($value->LoaiTinNhan == 2)
        @include('Modal\ModalTroChuyen\Child\ChatCenter',['message' => $value])
        @else
        @switch(explode('#',DataProcess::getState($value->TinhTrang,Session::get('user')[0]->IDTaiKhoan))[1])
        @case('1')
        @include('Modal\ModalTroChuyen\Child\ChatLeft',['message' => $value])
        @break
        @case('2')
        @include('Modal\ModalTroChuyen\Child\ThuHoiTinNhanL',['message' => $value])
        @break
        @endswitch
        @endif
        @endif
        @endforeach
        @endif
    </div>
    <div class="w-full bg-white dark:bg-dark-second relative z-20 pb-2 pt-4 px-1 flex dark:border-dark-third border-t-2 border-solid border-gray-300">
        <div id="newExcen" class="w-auto px-1 absolute -top-full rounded-2xl py-2 z-10 bg-white 
        dark:bg-dark-second" style="display: none;">
            <ul class="w-full flex bg-white dark:bg-dark-second">
                <li class="cursor-pointer mr-2 p-2.5 pb-1.5  fill-65676B dark:bg-dark-third bg-gray-200 rounded-lg">
                    <svg class="a8c37x1j ms05siws hr662l2t b7h9ocf4" height="20px" width="20px" viewBox="0 -1 17 17">
                        <g fill="black" fill-rule="evenodd">
                            <path class=" fill-65676B " d="M2.882 13.13C3.476 4.743 3.773.48 3.773.348L2.195.516c-.7.1-1.478.647-1.478 1.647l1.092 11.419c0 .5.2.9.4 1.3.4.2.7.4.9.4h.4c-.6-.6-.727-.951-.627-2.151z" fill="gray"></path>
                            <circle cx="8.5" cy="4.5" r="1.5" fill="black"></circle>
                            <path class=" fill-65676B " d="M14 6.2c-.2-.2-.6-.3-.8-.1l-2.8 2.4c-.2.1-.2.4 0 .6l.6.7c.2.2.2.6-.1.8-.1.1-.2.1-.4.1s-.3-.1-.4-.2L8.3 8.3c-.2-.2-.6-.3-.8-.1l-2.6 2-.4 3.1c0 .5.2 1.6.7 1.7l8.8.6c.2 0 .5 0 .7-.2.2-.2.5-.7.6-.9l.6-5.9L14 6.2z" fill="black"></path>
                            <path class=" fill-65676B " d="M13.9 15.5l-8.2-.7c-.7-.1-1.3-.8-1.3-1.6l1-11.4C5.5 1 6.2.5 7 .5l8.2.7c.8.1 1.3.8 1.3 1.6l-1 11.4c-.1.8-.8 1.4-1.6 1.3z" stroke-linecap="round" stroke-linejoin="round" stroke="black"></path>
                        </g>
                    </svg>
                </li>
                <li class="cursor-pointer fill-65676B  mx-2 p-2.5 pb-1.5 dark:bg-dark-third bg-gray-200 rounded-lg">
                    <svg class="a8c37x1j ms05siws hr662l2t b7h9ocf4 crt8y2ji " height="20px" width="20px" viewBox="0 0 17 16" x="0px" y="0px">
                        <g fill-rule="evenodd">
                            <circle cx="5.5" cy="5.5" fill="none" r="1"></circle>
                            <circle cx="11.5" cy="4.5" fill="none" r="1"></circle>
                            <path class=" fill-65676B " d="M5.3 9c-.2.1-.4.4-.3.7.4 1.1 1.2 1.9 2.3 2.3h.2c.2 0 .4-.1.5-.3.1-.3 0-.5-.3-.6-.8-.4-1.4-1-1.7-1.8-.1-.2-.4-.4-.7-.3z" fill="none"></path>
                            <path class=" fill-65676B " d="M10.4 13.1c0 .9-.4 1.6-.9 2.2 4.1-1.1 6.8-5.1 6.5-9.3-.4.6-1 1.1-1.8 1.5-2 1-3.7 3.6-3.8 5.6z">
                            </path>
                            <path class=" fill-65676B " d="M2.5 13.4c.1.8.6 1.6 1.3 2 .5.4 1.2.6 1.8.6h.6l.4-.1c1.6-.4 2.6-1.5 2.7-2.9.1-2.4 2.1-5.4 4.5-6.6 1.3-.7 1.9-1.6 1.9-2.8l-.2-.9c-.1-.8-.6-1.6-1.3-2-.7-.5-1.5-.7-2.4-.5L3.6 1.5C1.9 1.8.7 3.4 1 5.2l1.5 8.2zm9-8.9c.6 0 1 .4 1 1s-.4 1-1 1-1-.4-1-1 .4-1 1-1zm-3.57 6.662c.3.1.4.4.3.6-.1.3-.3.4-.5.4h-.2c-1-.4-1.9-1.3-2.3-2.3-.1-.3.1-.6.3-.7.3-.1.5 0 .6.3.4.8 1 1.4 1.8 1.7zM5.5 5.5c.6 0 1 .4 1 1s-.4 1-1 1-1-.4-1-1 .4-1 1-1z" fill-rule="nonzero"></path>
                        </g>
                    </svg>
                </li>
                <li class="cursor-pointer fill-65676B  mx-2 p-2.5 pb-1.5 dark:bg-dark-third bg-gray-200 rounded-lg">
                    <svg class="a8c37x1j ms05siws hr662l2t b7h9ocf4 crt8y2ji" height="20px" width="20px" viewBox="0 0 16 16" x="0px" y="0px">
                        <path d="M.783 12.705c.4.8 1.017 1.206 1.817 1.606 0 0 1.3.594 2.5.694 1 .1 1.9.1 2.9.1s1.9 0 2.9-.1 1.679-.294 2.479-.694c.8-.4 1.157-.906 1.557-1.706.018 0 .4-1.405.5-2.505.1-1.2.1-3 0-4.3-.1-1.1-.073-1.976-.473-2.676-.4-.8-.863-1.408-1.763-1.808-.6-.3-1.2-.3-2.4-.4-1.8-.1-3.8-.1-5.7 0-1 .1-1.7.1-2.5.5s-1.417 1.1-1.817 1.9c0 0-.4 1.484-.5 2.584-.1 1.2-.1 3 0 4.3.1 1 .2 1.705.5 2.505zm10.498-8.274h2.3c.4 0 .769.196.769.696 0 .5-.247.68-.747.68l-1.793.02.022 1.412 1.252-.02c.4 0 .835.204.835.704s-.442.696-.842.696H11.82l-.045 2.139c0 .4-.194.8-.694.8-.5 0-.7-.3-.7-.8l-.031-5.631c0-.4.43-.696.93-.696zm-3.285.771c0-.5.3-.8.8-.8s.8.3.8.8l-.037 5.579c0 .4-.3.8-.8.8s-.8-.4-.8-.8l.037-5.579zm-3.192-.825c.7 0 1.307.183 1.807.683.3.3.4.7.1 1-.2.4-.7.4-1 .1-.2-.1-.5-.3-.9-.3-1 0-2.011.84-2.011 2.14 0 1.3.795 2.227 1.695 2.227.4 0 .805.073 1.105-.127V8.6c0-.4.3-.8.8-.8s.8.3.8.8v1.8c0 .2.037.071-.063.271-.7.7-1.57.991-2.47.991C2.868 11.662 1.3 10.2 1.3 8s1.704-3.623 3.504-3.623z" fill-rule="nonzero"></path>
                    </svg>
                </li>
                <li class="cursor-pointer  fill-65676B ml-2 p-2.5 px-3 pb-2 dark:bg-dark-third bg-gray-200 rounded-lg">
                    <i class="fas fa-paperclip " style="font-size: 18px;color:#65676B;"></i>
                </li>
            </ul>
        </div>
        <div class="w-1/12 flex py-1">
            <div class="cursor-pointer fill-65676B ">
                <div class="hover:bg-gray-200 rounded-full 
                dark:hover:bg-dark-third  p-1 ">
                    <svg id="addOrCancel{{ $idNhomTinNhan }}" fill="#{{ (count($messages)==0?0:$messages[0]->IDMauTinNhan) }}" id="addOrCancel" onclick="loadTextBoxType()" class="a8c37x1j ms05siws hr662l2t b7h9ocf4 crt8y2ji tftn3vyl" height="20px" width="20px" viewBox="0 0 24 24">
                        <g fill-rule="evenodd">
                            <polygon fill="none" points="-6,30 30,30 30,-6 -6,-6 "></polygon>
                            <path d="m18,11l-5,0l0,-5c0,-0.552 -0.448,-1 -1,-1c-0.5525,0 -1,0.448 -1,1l0,5l-5,0c-0.5525,0 -1,0.448 -1,1c0,0.552 0.4475,1 1,1l5,0l0,5c0,0.552 0.4475,1 1,1c0.552,0 1,-0.448 1,-1l0,-5l5,0c0.552,0 1,-0.448 1,-1c0,-0.552 -0.448,-1 -1,-1m-6,13c-6.6275,0 -12,-5.3725 -12,-12c0,-6.6275 5.3725,-12 12,-12c6.627,0 12,5.3725 12,12c0,6.6275 -5.373,12 -12,12">
                            </path>
                        </g>
                    </svg>
                </div>
            </div>
        </div>
        <ul class="three-exten w-1/3 py-1" style="display: block;">
            <li class="float-left cursor-pointer p-1 fill-65676B hover:bg-gray-200 rounded-full 
                dark:hover:bg-dark-third">
                <svg class="a8c37x1j ms05siws hr662l2t b7h9ocf4" height="20px" width="20px" viewBox="0 -1 17 17">
                    <g fill="gray" fill-rule="evenodd">
                        <path id="picture1{{ $idNhomTinNhan }}" fill="#{{ (count($messages)==0?'65676B':$messages[0]->IDMauTinNhan) }}" d="M2.882 13.13C3.476 4.743 3.773.48 3.773.348L2.195.516c-.7.1-1.478.647-1.478 1.647l1.092 11.419c0 .5.2.9.4 1.3.4.2.7.4.9.4h.4c-.6-.6-.727-.951-.627-2.151z" fill="gray"></path>
                        <circle cx="8.5" cy="4.5" r="1.5" fill="gray"></circle>
                        <path id="picture2{{ $idNhomTinNhan }}" fill="#{{ (count($messages)==0?'65676B':$messages[0]->IDMauTinNhan) }}" d="M14 6.2c-.2-.2-.6-.3-.8-.1l-2.8 2.4c-.2.1-.2.4 0 .6l.6.7c.2.2.2.6-.1.8-.1.1-.2.1-.4.1s-.3-.1-.4-.2L8.3 8.3c-.2-.2-.6-.3-.8-.1l-2.6 2-.4 3.1c0 .5.2 1.6.7 1.7l8.8.6c.2 0 .5 0 .7-.2.2-.2.5-.7.6-.9l.6-5.9L14 6.2z" fill="#{{ (count($messages)==0?0:$messages[0]->IDMauTinNhan) }}"></path>
                        <path id="picture3{{ $idNhomTinNhan }}" fill="#{{ (count($messages)==0?'65676B':$messages[0]->IDMauTinNhan) }}" d="M13.9 15.5l-8.2-.7c-.7-.1-1.3-.8-1.3-1.6l1-11.4C5.5 1 6.2.5 7 .5l8.2.7c.8.1 1.3.8 1.3 1.6l-1 11.4c-.1.8-.8 1.4-1.6 1.3z" stroke-linecap="round" stroke-linejoin="round" stroke="#{{ (count($messages)==0?0:$messages[0]->IDMauTinNhan) }}"></path>
                    </g>
                </svg>
            </li>
            <li class="float-left cursor-pointer p-1 fill-65676B  hover:bg-gray-200 rounded-full 
                dark:hover:bg-dark-third">
                <svg id="sticker{{ $idNhomTinNhan }}" fill="#{{ (count($messages)==0?'65676B':$messages[0]->IDMauTinNhan) }}" class="a8c37x1j ms05siws hr662l2t b7h9ocf4 crt8y2ji" height="20px" width="20px" viewBox="0 0 17 16" x="0px" y="0px">
                    <g fill-rule="evenodd">
                        <circle cx="5.5" cy="5.5" fill="none" r="1"></circle>
                        <circle cx="11.5" cy="4.5" fill="none" r="1"></circle>
                        <path d="M5.3 9c-.2.1-.4.4-.3.7.4 1.1 1.2 1.9 2.3 2.3h.2c.2 0 .4-.1.5-.3.1-.3 0-.5-.3-.6-.8-.4-1.4-1-1.7-1.8-.1-.2-.4-.4-.7-.3z" fill="none"></path>
                        <path d="M10.4 13.1c0 .9-.4 1.6-.9 2.2 4.1-1.1 6.8-5.1 6.5-9.3-.4.6-1 1.1-1.8 1.5-2 1-3.7 3.6-3.8 5.6z">
                        </path>
                        <path d="M2.5 13.4c.1.8.6 1.6 1.3 2 .5.4 1.2.6 1.8.6h.6l.4-.1c1.6-.4 2.6-1.5 2.7-2.9.1-2.4 2.1-5.4 4.5-6.6 1.3-.7 1.9-1.6 1.9-2.8l-.2-.9c-.1-.8-.6-1.6-1.3-2-.7-.5-1.5-.7-2.4-.5L3.6 1.5C1.9 1.8.7 3.4 1 5.2l1.5 8.2zm9-8.9c.6 0 1 .4 1 1s-.4 1-1 1-1-.4-1-1 .4-1 1-1zm-3.57 6.662c.3.1.4.4.3.6-.1.3-.3.4-.5.4h-.2c-1-.4-1.9-1.3-2.3-2.3-.1-.3.1-.6.3-.7.3-.1.5 0 .6.3.4.8 1 1.4 1.8 1.7zM5.5 5.5c.6 0 1 .4 1 1s-.4 1-1 1-1-.4-1-1 .4-1 1-1z" fill-rule="nonzero"></path>
                    </g>
                </svg>
            </li>
            <li class="float-left cursor-pointer p-1 fill-65676B hover:bg-gray-200 rounded-full 
                dark:hover:bg-dark-third">
                <svg id="gif{{ $idNhomTinNhan }}" fill="#{{ (count($messages)==0?'65676B':$messages[0]->IDMauTinNhan) }}" class="a8c37x1j ms05siws hr662l2t b7h9ocf4 crt8y2ji" height="20px" width="20px" viewBox="0 0 16 16" x="0px" y="0px">
                    <path d="M.783 12.705c.4.8 1.017 1.206 1.817 1.606 0 0 1.3.594 2.5.694 1 .1 1.9.1 2.9.1s1.9 0 2.9-.1 1.679-.294 2.479-.694c.8-.4 1.157-.906 1.557-1.706.018 0 .4-1.405.5-2.505.1-1.2.1-3 0-4.3-.1-1.1-.073-1.976-.473-2.676-.4-.8-.863-1.408-1.763-1.808-.6-.3-1.2-.3-2.4-.4-1.8-.1-3.8-.1-5.7 0-1 .1-1.7.1-2.5.5s-1.417 1.1-1.817 1.9c0 0-.4 1.484-.5 2.584-.1 1.2-.1 3 0 4.3.1 1 .2 1.705.5 2.505zm10.498-8.274h2.3c.4 0 .769.196.769.696 0 .5-.247.68-.747.68l-1.793.02.022 1.412 1.252-.02c.4 0 .835.204.835.704s-.442.696-.842.696H11.82l-.045 2.139c0 .4-.194.8-.694.8-.5 0-.7-.3-.7-.8l-.031-5.631c0-.4.43-.696.93-.696zm-3.285.771c0-.5.3-.8.8-.8s.8.3.8.8l-.037 5.579c0 .4-.3.8-.8.8s-.8-.4-.8-.8l.037-5.579zm-3.192-.825c.7 0 1.307.183 1.807.683.3.3.4.7.1 1-.2.4-.7.4-1 .1-.2-.1-.5-.3-.9-.3-1 0-2.011.84-2.011 2.14 0 1.3.795 2.227 1.695 2.227.4 0 .805.073 1.105-.127V8.6c0-.4.3-.8.8-.8s.8.3.8.8v1.8c0 .2.037.071-.063.271-.7.7-1.57.991-2.47.991C2.868 11.662 1.3 10.2 1.3 8s1.704-3.623 3.504-3.623z" fill-rule="nonzero"></path>
                </svg>
            </li>
        </ul>
        <div class="three-exten1 w-8/12">
            <?php $user = Session::get('user'); ?>
            <div onkeyup="sendMessage('{{ $chater[0]->IDTaiKhoan }}',
            '{{ $idNhomTinNhan }}',
            '{{ $user[0]->IDTaiKhoan }}',event)" id="{{ $chater[0]->IDTaiKhoan }}PlaceTypeText" class="place-input-type border-none rounded-2xl pl-2 outline-none
             bg-gray-200 py-1.5 break-all w-11/12 dark:bg-dark-third dark:text-white" style="min-height: 20px;" oninput="typeChat(0)" contenteditable placeholder="Aa">

            </div>
            <script>
                $("#{{ $chater[0]->IDTaiKhoan }}PlaceTypeText").keypress(function(e) {
                    return e.which != 13;
                });
            </script>
        </div>
        <div class="w-1/12 pt-1 zoom">
            <p class="cursor-pointer zoom text-xl">
                {{ (count($messages)==0?'🤝': $messages[0]->BieuTuong) }}
            </p>
        </div>
    </div>
    <div style="display: none;right:101%;top:0;" id="{{ $chater[0]->IDTaiKhoan }}SettingChat" class="setting-chat w-full absolute top-2 bg-white rounded-lg border-2 rounded-lg dark:bg-dark-second 
    dark:border-dark-third border-gray-300">
        <ul class="dark:border-dark-third w-full border-b-2 border-gray-200 border-solid p-2">
            @php
            $pathRerMessenger = "messages/$idNhomTinNhan"
            @endphp
            <li onclick="window.location.href='{{ url($pathRerMessenger) }}'" class="w-full p-1.5 text-lg hover:bg-gray-300 dark:hover:bg-dark-third cursor-pointer dark:text-white">
                <i class="fab fa-facebook-messenger pr-1.5"></i> Mở
                messager
            </li>
            @php
            $pathsss = "profile.".$chater[0]->IDTaiKhoan
            @endphp
            <li onclick="window.location.href='{{ url($pathsss) }}'" class="w-full p-1.5 text-lg hover:bg-gray-300 text-lg hover:bg-gray-100 dark:hover:bg-dark-third cursor-pointer dark:text-white"><i class="far fa-user-circle pr-1.5"></i>
                Xem trang cá nhân
            </li>
        </ul>
        <ul class="dark:border-dark-third w-full border-b-2 border-gray-200 border-solid p-2">
            <li onclick="openChangeColor('{{ $idNhomTinNhan }}',
            '{{ $chater[0]->IDTaiKhoan }}')" class="w-full p-1.5 text-lg hover:bg-gray-300 dark:hover:bg-dark-third  
            cursor-pointer dark:text-white"><i class="fas fa-palette pr-1.5"></i> Màu
            </li>
            <li class="w-full p-1.5 text-lg hover:bg-gray-300 dark:hover:bg-dark-third   
            cursor-pointer dark:text-white"><i class="far fa-smile pr-1.5"></i> Biểu
                tượng cảm xúc</li>
            <li class="w-full p-1.5 text-lg hover:bg-gray-300 dark:hover:bg-dark-third   
            cursor-pointer dark:text-white"><i class="fas fa-pen-alt pr-1.5"></i> Biệt
                danh</li>
        </ul>
        <ul class="dark:border-dark-third w-full border-b-2 border-gray-200 border-solid p-2">
            <li class="w-full p-1.5 text-lg hover:bg-gray-300 dark:hover:bg-dark-third   cursor-pointer dark:text-white"><i class="fas fa-users pr-1.5"></i> Tạo nhóm
            </li>
        </ul>
        <ul class="dark:border-dark-third w-full border-b-2 border-gray-200 border-solid p-2">
            <li class="w-full p-1.5 text-lg hover:bg-gray-300 dark:hover:bg-dark-third   cursor-pointer dark:text-white"><i class="far fa-bell pr-1.5"></i> Tắt cuộc
                trò chuyện</li>
            <li class="w-full p-1.5 text-lg hover:bg-gray-300 dark:hover:bg-dark-third   cursor-pointer dark:text-white"><i class="fab fa-rev pr-1.5"></i> Bỏ qua tin
                nhắn</li>
            <li class="w-full p-1.5 text-lg hover:bg-gray-300 dark:hover:bg-dark-third   cursor-pointer dark:text-white"><i class="fas fa-ban pr-1.5"></i> Chặn</li>
            <li class="w-full p-1.5 text-lg hover:bg-gray-300 dark:hover:bg-dark-third   cursor-pointer dark:text-white"><i class="far fa-trash-alt pr-1.5"></i> Xóa
                cuộc trò chuyện
            </li>
        </ul>

    </div>
</div>
<script>
    var objDiv = document.getElementById('{{ (count($messages)==0?0:$messages[0]->IDNhomTinNhan).$chater[0]->IDTaiKhoan }}Messenges');
    if (objDiv.scrollHeight > 352) objDiv.scrollTop = objDiv.scrollHeight;
    Pusher.logToConsole = true;

    var pusher = new Pusher('5064fc09fcd20f23d5c1', {
        cluster: 'ap1'
    });
    var channel = pusher.subscribe('test.' + '{{ Session::get("user")[0]->IDTaiKhoan }}');
    channel.bind('chatNorl', function() {
        var aud = new Audio("/mp3/ring-mess.mp3");
        aud.play();
        $.ajax({
            method: "GET",
            url: "/ProcessChatEvent",
            data: {
                IDNhomTinNhan: '{{ (count($messages)==0?0:$messages[0]->IDNhomTinNhan) }}',
                IDTaiKhoan: '{{ $chater[0]->IDTaiKhoan }}'
            },
            success: function(response) {
                if ($('#{{ (count($messages)==0?0:$messages[0]->IDNhomTinNhan).$chater[0]->IDTaiKhoan }}Messenges').length > 0)
                    $('#{{ (count($messages)==0?0:$messages[0]->IDNhomTinNhan).$chater[0]->IDTaiKhoan }}Messenges').append(response);
                if (objDiv.scrollHeight > 352) objDiv.scrollTop = objDiv.scrollHeight;
            }
        });
    });
</script>