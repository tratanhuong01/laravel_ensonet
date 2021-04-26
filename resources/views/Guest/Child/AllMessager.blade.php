<?php

use App\Models\Functions;
use App\Models\Data;
use App\Process\DataProcess;
use Illuminate\Support\Facades\Session;
use App\Models\StringUtil;
use App\Process\DataProcessFive;
use App\Process\DataProcessSix;

?>
@if(count($allMess) == 0)
<p class="text-center font-bold dark:text-white">
    Không có tin nhắn nào để hiển thị.
</p>
@else
@foreach($allMess as $key => $value)
@php
$el = DataProcess::getUserOfGroupMessage($value[0]->IDNhomTinNhan);
$elMain = DataProcess::getUserOfGroupMessageReal($value[0]->IDNhomTinNhan);
@endphp
@if(count($el) == 1)
@if (DataProcessSix::checkOutOrKichGroup($value[0]->IDNhomTinNhan,
Session::get('user')[0]->IDTaiKhoan) == false && DataProcessSix::numberMessageNot($value[0]->IDNhomTinNhan,
Session::get('user')[0]->IDTaiKhoan) == false)
<div onclick="openChat('{{ $el[0]->IDTaiKhoan }}')" class="mess-person cursor-pointer flex relative dark:hover:bg-dark-third 
    hover:bg-gray-200 py-2 px-1">
    <div class="w-1/5">
        <div class="w-14 h-14 rounded-full relative">
            <img src="/{{ $el[0]->AnhDaiDien }}" alt="" class="w-14 h-14 rounded-full object-cover p-0.5">
            @include('Component\Child\Activity',
            [
            'padding' => 'p-1.5',
            'bottom' => 'bottom-0',
            'right' => 'right-0',
            'IDTaiKhoan' => $el[0]->IDTaiKhoan
            ])
        </div>
    </div>
    <div class="w-4/5">
        <div class="w-full">
            <span style="float: left;font-weight: bold;">
                <a href="" class="dark:text-white">
                    {{ $el[0]->Ho . ' ' . $el[0]->Ten }}
                </a></span>
        </div>
        <div class="w-full flex py-1 text-sm flex">
            <div class="w-4/5 text-sm">
                @isset($value[count($value) - 1])
                @php
                $sws = explode('#',DataProcess::getState($value[count($value) - 1]->TinhTrang,
                Session::get('user')[0]->IDTaiKhoan))[1];
                @endphp
                @if ($value[count($value) - 1]->IDTaiKhoan == Session::get('user')[0]->IDTaiKhoan)
                @switch($sws)
                @case('0')
                <span class="font-bold text-gray-500">
                    You : {{ 'Bạn ' . $value[count($value) - 1]->NoiDung  }}
                    &nbsp;&nbsp;
                    {{ StringUtil::CheckDateTimeRequest($value[count($value) - 1]->ThoiGianNhanTin) }}
                    @break
                </span>
                @case('1')
                <span class="text-gray-500 dark:text-white">
                    You :
                    @switch(json_decode($value[count($value) - 1]->NoiDung)[0]->LoaiTinNhan)
                    @case('0')
                    {{ substr(json_decode($value[count($value) - 1]->
                        NoiDung)[0]->NoiDungTinNhan,0,20) . '...' }}
                    @break
                    @case('1')
                    {{ 'Bạn đã gửi ' . count(json_decode($value[count($value) - 1]->NoiDung)) . ' ảnh .' }}
                    @break
                    @case('2')
                    {{ 'Bạn đã gửi ' . ' một nhãn dán .' }}
                    @break
                    @endswitch
                    &nbsp;&nbsp;
                    {{ StringUtil::CheckDateTimeRequest($value[count($value) - 1]->ThoiGianNhanTin) }}
                </span>
                @break
                @case('2')
                <span class="text-gray-500 dark:text-white">
                    You : Bạn đã thu hồi tin nhắn &nbsp;&nbsp;
                    {{ StringUtil::CheckDateTimeRequest($value[count($value) - 1]->ThoiGianNhanTin) }}
                </span>
                @break
                @case('3')
                @break
                @endswitch
                @else
                @switch($sws)
                @case('0')
                <span class="font-bold {{ DataProcessFive::checkMessageIsSeen($value[count($value) - 1]->IDTinNhan,
                    Session::get('user')[0]->IDTaiKhoan) == 1 ? 'text-gray-500 ' : 'text-blue-500 '}}">
                    {{$el[0]->Ten }} : {{ $value[count($value) - 1]->NoiDung  }}
                    &nbsp;&nbsp;
                    {{ StringUtil::CheckDateTimeRequest($value[count($value) - 1]->ThoiGianNhanTin) }}
                </span>
                @break
                @case('1')
                <span class="{{ DataProcessFive::checkMessageIsSeen($value[count($value) - 1]->IDTinNhan,
                    Session::get('user')[0]->IDTaiKhoan) == 1 ? 'text-gray-500 ' : 'text-blue-500 '}}  font-bold">

                    {{$el[0]->Ten }} :
                    @switch(json_decode($value[count($value) - 1]->NoiDung)[0]->LoaiTinNhan)
                    @case('0')
                    {{ substr(json_decode($value[count($value) - 1]->
                        NoiDung)[0]->NoiDungTinNhan,0,20) . '...' }}
                    @break
                    @case('1')
                    {{ ' đã gửi ' . count(json_decode($value[count($value) - 1]->NoiDung)) . ' ảnh .' }}
                    @break
                    @case('2')
                    {{ ' đã gửi ' . ' một nhãn dán .' }}
                    @break
                    @endswitch
                    &nbsp;&nbsp;
                    {{ StringUtil::CheckDateTimeRequest($value[count($value) - 1]->ThoiGianNhanTin) }}
                </span>
                @break
                @case('2')
                <span class="{{ DataProcessFive::checkMessageIsSeen($value[count($value) - 1]->IDTinNhan,
                    Session::get('user')[0]->IDTaiKhoan) == 1 ? 'text-gray-500 ' : 'text-blue-500 '}}  font-bold">
                    {{$el[0]->Ten}} : {{ $el[0]->Ten .' đã thu hồi tin nhắn' }} &nbsp;&nbsp;
                    {{ StringUtil::CheckDateTimeRequest($value[count($value) - 1]->ThoiGianNhanTin) }}
                </span>
                @break
                @case('3')
                @break
                @endswitch
                @endif
                @endisset
            </div>
            <div class="w-1/5">
                <!-- <img class="float-right w-5 h-5 rounded-full" src="/img/avatar.jpg" alt=""> -->
            </div>
        </div>
        <span class="mess-edit top-4 right-8 text-center absolute rounded-full bg-white">
            <i class="fas fa-ellipsis-h edit-mess"></i>
        </span>
    </div>

</div>
@endif
@else
@php
$sws = $value[count($value) - 1]->TinhTrang == 0 ? '0' : explode('#',DataProcess::getTrangThaiTinNhan($value[count($value) - 1]->TinhTrang,
Session::get('user')[0]->IDTaiKhoan))[1];
@endphp
@if (DataProcessSix::checkOutOrKichGroup($value[0]->IDNhomTinNhan,
Session::get('user')[0]->IDTaiKhoan) == false && DataProcessSix::numberMessageNot($value[0]->IDNhomTinNhan,
Session::get('user')[0]->IDTaiKhoan) == false)
<div onclick="openChatGroup('{{ $value[0]->IDNhomTinNhan }}')" class="mess-person cursor-pointer flex relative dark:hover:bg-dark-third 
    hover:bg-gray-200 py-2 px-1">
    <div class="w-1/5">
        <div class="w-14 h-14 relative mx-auto">
            <img src="/{{ $elMain[0]->AnhDaiDien }}" class="w-10 h-10 rounded-full object-cover 
                absolute top-0 right-0" alt="">
            <img src="/{{ $elMain[1]->AnhDaiDien }}" class="w-10 h-10 rounded-full object-cover 
                absolute bottom-0 left-0" alt="">
        </div>
    </div>
    <div class="w-4/5">
        <div class="w-full">
            <span class="dark:text-white float-left font-bold">
                @if ($value[0]->TenNhomTinNhan == "" ||
                $value[0]->TenNhomTinNhan == NULL)
                @php
                $name = "";
                @endphp
                @foreach($el as $keys => $values)
                @php
                $name .= $values->Ten . ' , '
                @endphp
                @endforeach
                {{ $name }}
                @else
                {{ $value[0]->TenNhomTinNhan }}
                @endif
            </span>
        </div>
        <div class="w-full flex py-1 text-sm flex">
            <div class="w-4/5 ">
                @isset($value[count($value) - 1])
                @php
                $sws = explode('#',DataProcess::getState($value[count($value) - 1]->TinhTrang,
                Session::get('user')[0]->IDTaiKhoan))[1];
                @endphp
                @if ($value[count($value) - 1]->IDTaiKhoan == Session::get('user')[0]->IDTaiKhoan)
                @switch($sws)
                @case('0')
                <span class="font-bold text-gray-500">
                    You : {{ 'Bạn ' . $value[count($value) - 1]->NoiDung  }}
                    &nbsp;&nbsp;
                    {{ StringUtil::CheckDateTimeRequest($value[count($value) - 1]->ThoiGianNhanTin) }}
                    @break
                </span>
                @case('1')
                <span class="text-gray-500 dark:text-white">
                    You :
                    @switch(json_decode($value[count($value) - 1]->NoiDung)[0]->LoaiTinNhan)
                    @case('0')
                    {{ substr(json_decode($value[count($value) - 1]->
                        NoiDung)[0]->NoiDungTinNhan,0,20) . '...' }}
                    @break
                    @case('1')
                    {{ 'Bạn đã gửi ' . count(json_decode($value[count($value) - 1]->NoiDung)) . ' ảnh .' }}
                    @break
                    @case('2')
                    {{ 'Bạn đã gửi ' . ' một nhãn dán .' }}
                    @break
                    @endswitch
                    &nbsp;&nbsp;
                    {{ StringUtil::CheckDateTimeRequest($value[count($value) - 1]->ThoiGianNhanTin) }}
                </span>
                @break
                @case('2')
                <span class="text-gray-500 dark:text-white">
                    You : Bạn đã thu hồi tin nhắn &nbsp;&nbsp;
                    {{ StringUtil::CheckDateTimeRequest($value[count($value) - 1]->ThoiGianNhanTin) }}
                </span>
                @break
                @case('3')
                @break
                @endswitch
                @else
                @switch($sws)
                @case('0')
                <span class="font-bold {{ DataProcessFive::checkMessageIsSeen($value[count($value) - 1]->IDTinNhan,
                    Session::get('user')[0]->IDTaiKhoan) == 1 ? 'text-gray-500 ' : 'text-blue-500 '}}">
                    {{$el[0]->Ten }} : {{ $value[count($value) - 1]->NoiDung  }}
                    &nbsp;&nbsp;
                    {{ StringUtil::CheckDateTimeRequest($value[count($value) - 1]->ThoiGianNhanTin) }}
                </span>
                @break
                @case('1')
                <span class="{{ DataProcessFive::checkMessageIsSeen($value[count($value) - 1]->IDTinNhan,
                    Session::get('user')[0]->IDTaiKhoan) == 1 ? 'text-gray-500 ' : 'text-blue-500 '}}  font-bold">
                    {{$el[0]->Ten }} :
                    @switch(json_decode($value[count($value) - 1]->NoiDung)[0]->LoaiTinNhan)
                    @case('0')
                    {{ substr(json_decode($value[count($value) - 1]->
                        NoiDung)[0]->NoiDungTinNhan,0,20) . '...' }}
                    @break
                    @case('1')
                    {{ ' đã gửi ' . count(json_decode($value[count($value) - 1]->NoiDung)) . ' ảnh .' }}
                    @break
                    @case('2')
                    {{ ' đã gửi ' . ' một nhãn dán .' }}
                    @break
                    @endswitch
                    &nbsp;&nbsp;
                    {{ StringUtil::CheckDateTimeRequest($value[count($value) - 1]->ThoiGianNhanTin) }}
                </span>
                @break
                @case('2')
                <span class="{{ DataProcessFive::checkMessageIsSeen($value[count($value) - 1]->IDTinNhan,
                    Session::get('user')[0]->IDTaiKhoan) == 1 ? 'text-gray-500 ' : 'text-blue-500 '}}  font-bold">
                    {{$el[0]->Ten}} : {{ $el[0]->Ten .' đã thu hồi tin nhắn' }} &nbsp;&nbsp;
                    {{ StringUtil::CheckDateTimeRequest($value[count($value) - 1]->ThoiGianNhanTin) }}
                </span>
                @break
                @case('3')
                @break
                @endswitch
                @endif
                @endisset
            </div>
            <div class="w-1/5">
                <!-- <img class="float-right w-5 h-5 rounded-full" src="/img/avatar.jpg" alt=""> -->
            </div>
        </div>
        <span class="mess-edit top-4 right-8 text-center absolute rounded-full bg-white">
            <i class="fas fa-ellipsis-h edit-mess"></i>
        </span>
    </div>
</div>
@endif
@endif
@endforeach
@endif