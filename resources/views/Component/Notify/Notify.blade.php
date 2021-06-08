<?php

use App\Models\Functions;
use App\Models\Notify;
use App\Models\StringUtil;
use Illuminate\Support\Facades\Session;

$value = Notify::getNotify(Session::get('user')[0]->IDTaiKhoan)[0];
$path = "/post" . "/" . explode('&', $value[0][0]->IDContent)[0];
$key = 0;
?>
<div id="{{ $value[0][0]->IDThongBao }}" class="w-full bg-white dark:bg-dark-third shadow-lg py-3 px-2 relative my-2 rounded-lg">
    <span onclick="closePost()" class="bg-gray-300 px-1.5 dark:text-white font-bold
        rounded-full dark:bg-dark-second cursor-pointer absolute text-x, top-1 right-1">
        &times;
    </span>
    @switch($value[0][0]->IDLoaiThongBao)
    @case('WARNPOST00')
    <div class="w-full py-2 flex cursor-pointer 
        dark:hover:bg-dark-third text-gray-700 hover:bg-gray-100">
        <div class="relative pl-2">
            <div class="w-16 h-16 rounded-full mt-3 relative">
                <img src="/img/logo.png" class="w-14 h-14 rounded-full object-cover 
                    border-2 border-white" alt="">
            </div>
        </div>
        <div class="w-9/12 dark:text-gray-300 pl-3">
            {{ $value[0][0]->TenLoaiThongBao }}.
            <br>
            <p class="text-xs font-bold">{{ StringUtil::CheckDateTime($value[0][0]->ThoiGianThongBao) }}
                &nbsp;&nbsp;&nbsp;</p>
        </div>
        <div class="w-1/12 relative text-center dotNotView">
            @if ($value[0][0]->TinhTrang != 2)
            <span class="bg-blue-400 rounded-full p-1.5 absolute top-1/2" style="transform: translateY(-50%);"></span>
            @else
            @endif
        </div>
    </div>
    @break
    @case('CSBVCB123')
    <div onclick="window.location.href='{{ url($path) }}'" class="w-full py-2 flex cursor-pointer 
        dark:hover:bg-dark-third text-gray-700 hover:bg-gray-100">
        <div class="relative pl-2">
            <div class="w-16 h-16 rounded-full relative">
                <img src="{{ $value[0][0]->AnhDaiDien }}" class="w-14 h-14 rounded-full object-cover 
                border-2 border-white" alt="">
                <span class="absolute bottom-0 dark:bg-gray-300 right-0 text-xl">
                    <i class='bx bxs-share text-2xl dark:text-gray-300'></i>
                </span>
            </div>
        </div>
        <div class="w-9/12 dark:text-gray-300 pl-3">
            @if (count($value[$key]) <= 1) <b>
                {{ $value[0][0]->Ho . ' ' . $value[0][0]->Ten }} </b>
                {{ $value[0][0]->TenLoaiThongBao }}.
                @else
                <b>{{ $value[0][0]->Ho . ' ' . $value[0][0]->Ten }} và
                    {{ count($value[$key]) - 1 }} người khác </b>
                {{ $value[0][0]->TenLoaiThongBao }}.
                @endif
                <br>
                <p class="text-xs font-bold">{{ StringUtil::CheckDateTime($value[0][0]->ThoiGianThongBao) }}
                    &nbsp;&nbsp;&nbsp;</p>
        </div>
        <div class="w-1/12 relative text-center dotNotView">
            @if ($value[0][0]->TinhTrang != 2)
            <span class="bg-blue-400 rounded-full p-1.5 absolute top-1/2" style="transform: translateY(-50%);"></span>
            @else
            @endif
        </div>
    </div>
    @break
    @case('DGTBTMBV1')
    <div onclick="window.location.href='{{ url($path) }}'" class="w-full py-2 flex cursor-pointer 
        dark:hover:bg-dark-third text-gray-700 hover:bg-gray-100">
        <div class="relative pl-2">
            <div class="w-16 h-16 rounded-full relative">
                <img src="{{ $value[0][0]->AnhDaiDien }}" class="w-14 h-14 rounded-full object-cover 
                border-2 border-white" alt="">
                <span class="absolute bottom-0 dark:bg-gray-300 right-0 text-xl">
                    <i class='bx bxs-purchase-tag text-2xl dark:text-gray-300'></i>
                </span>
            </div>
        </div>
        <div class="w-9/12 dark:text-gray-300 pl-3">
            @if (count($value[$key]) <= 1) <b>
                {{ $value[0][0]->Ho . ' ' . $value[0][0]->Ten }} </b>
                {{ $value[0][0]->TenLoaiThongBao }}.
                @else
                <b>{{ $value[0][0]->Ho . ' ' . $value[0][0]->Ten }} và
                    {{ count($value[$key]) - 1 }} người khác </b>
                {{ $value[0][0]->TenLoaiThongBao }}.
                @endif
                <br>
                <p class="text-xs font-bold">{{ StringUtil::CheckDateTime($value[0][0]->ThoiGianThongBao) }}
                    &nbsp;&nbsp;&nbsp;</p>
        </div>
        <div class="w-1/12 relative text-center dotNotView">
            @if ($value[0][0]->TinhTrang != 2)
            <span class="bg-blue-400 rounded-full p-1.5 absolute top-1/2" style="transform: translateY(-50%);"></span>
            @else
            @endif
        </div>
    </div>
    @break
    @case('CXP1234567')
    <div onclick="window.location.href='{{ url($path) }}'" class="w-full py-2 flex cursor-pointer 
        dark:hover:bg-dark-third text-gray-700 hover:bg-gray-100">
        <div class="relative pl-2">
            <div class="w-16 h-16 rounded-full relative">
                <img src="{{ $value[0][0]->AnhDaiDien }}" class="w-14 h-14 rounded-full object-cover 
                border-2 border-white" alt="">
                <span class="absolute bottom-0 right-0 text-xl">
                    {{ Functions::getFeelMain($value['loaiCamXuc']) }}
                </span>
            </div>
        </div>
        <div class="w-9/12 dark:text-gray-300 pl-3">
            @if (count($value[$key]) <= 1) <b>
                {{ $value[0][0]->Ho . ' ' . $value[0][0]->Ten }} </b>
                {{ $value[0][0]->TenLoaiThongBao . ' ' . $value['noiDung']}}.
                @else
                <b>{{ $value[0][0]->Ho . ' ' . $value[0][0]->Ten }} và
                    {{ count($value[$key]) - 1 }} người khác </b>
                {{ $value[0][0]->TenLoaiThongBao . ' ' . $value['noiDung']}}.
                @endif
                <br>
                <p class="text-xs font-bold">{{ StringUtil::CheckDateTime($value[0][0]->ThoiGianThongBao) }}
                    &nbsp;&nbsp;&nbsp;</p>
        </div>
        <div class="w-1/12 relative text-center dotNotView">
            @if ($value[0][0]->TinhTrang != 2)
            <span class="bg-blue-400 rounded-full p-1.5 absolute top-1/2" style="transform: translateY(-50%);"></span>
            @else
            @endif
        </div>
    </div>
    @break;
    @case('CXVBVCS123')
    <div onclick="window.location.href='{{ url($path) }}'" class="w-full py-2 flex cursor-pointer 
        dark:hover:bg-dark-third text-gray-700 hover:bg-gray-100">
        <div class="relative pl-2">
            <div class="w-16 h-16 rounded-full relative">
                <img src="{{ $value[0][0]->AnhDaiDien }}" class="w-14 h-14 rounded-full object-cover 
                border-2 border-white" alt="">
                <span class="absolute bottom-0 right-0 text-xl">
                    {{ Functions::getFeelMain($value['loaiCamXuc']) }}
                </span>
            </div>
        </div>
        <div class="w-9/12 dark:text-gray-300 pl-3">
            @if (count($value[$key]) <= 1) <b>
                {{ $value[0][0]->Ho . ' ' . $value[0][0]->Ten }} </b>
                {{ $value[0][0]->TenLoaiThongBao . ' ' . $value['noiDung']}}.
                @else
                <b>{{ $value[0][0]->Ho . ' ' . $value[0][0]->Ten }} và
                    {{ count($value[$key]) - 1 }} người khác </b>
                {{ $value[0][0]->TenLoaiThongBao . ' ' . $value['noiDung']}}.
                @endif
                <br>
                <p class="text-xs font-bold">{{ StringUtil::CheckDateTime($value[0][0]->ThoiGianThongBao) }}
                    &nbsp;&nbsp;&nbsp;</p>
        </div>
        <div class="w-1/12 relative text-center dotNotView">
            @if ($value[0][0]->TinhTrang != 2)
            <span class="bg-blue-400 rounded-full p-1.5 absolute top-1/2" style="transform: translateY(-50%);"></span>
            @else
            @endif
        </div>
    </div>
    @break;
    @case('ADD1234567')
    <div onclick="window.location.href='{{ url($path) }}'" class="w-full py-2 flex cursor-pointer 
        dark:hover:bg-dark-third text-gray-700 hover:bg-gray-100">
        <div class="relative pl-2">
            <div class="w-16 h-16 rounded-full relative">
                <img src="{{ $value[0][0]->AnhDaiDien }}" class="w-14 h-14 rounded-full object-cover 
                border-2 border-white" alt="">
                <span class="absolute bottom-0 right-0 text-xl">
                    {{ Functions::getFeelMain($value['loaiCamXuc']) }}
                </span>
            </div>
        </div>
        <div class="w-9/12 dark:text-gray-300 pl-3">
            @if (count($value[$key]) <= 1) <b>
                {{ $value[0][0]->Ho . ' ' . $value[0][0]->Ten }} </b> {{ $value[0][0]->TenLoaiThongBao }}.
                @else
                <b>{{ $value[0][0]->Ho . ' ' . $value[0][0]->Ten }} và {{ count($value[$key]) - 1 }} người khác </b> {{ $value[0][0]->TenLoaiThongBao }}.
                @endif
                <br>
                <p class="text-xs font-bold">{{ StringUtil::CheckDateTime($value[0][0]->ThoiGianThongBao) }}
                    &nbsp;&nbsp;&nbsp;</p>
        </div>
        <div class="w-1/12 relative text-center dotNotView">
            @if ($value[0][0]->TinhTrang != 2)
            <span class="bg-blue-400 rounded-full p-1.5 absolute top-1/2" style="transform: translateY(-50%);"></span>
            @else
            @endif
        </div>
    </div>
    @break;
    @case('AB12345678')
    <div onclick="window.location.href='{{ url($path) }}'" class="w-full py-2 flex cursor-pointer 
        dark:hover:bg-dark-third text-gray-700 hover:bg-gray-100">
        <div class="relative pl-2">
            <div class="w-16 h-16 rounded-full relative">
                <img src="{{ $value[0][0]->AnhDaiDien }}" class="w-14 h-14 rounded-full object-cover 
                border-2 border-white" alt="">
                <span class="absolute bottom-0 right-0 text-xl">
                    {{ Functions::getFeelMain($value['loaiCamXuc']) }}
                </span>
            </div>
        </div>
        <div class="w-9/12 dark:text-gray-300 pl-3">
            @if (count($value[$key]) <= 1) <b>
                {{ $value[0][0]->Ho . ' ' . $value[0][0]->Ten }} </b> {{ $value[0][0]->TenLoaiThongBao }}.
                @else
                <b>{{ $value[0][0]->Ho . ' ' . $value[0][0]->Ten }} và {{ count($value[$key]) - 1 }} người khác </b> {{ $value[0][0]->TenLoaiThongBao }}.
                @endif
                <br>
                <p class="text-xs font-bold">{{ StringUtil::CheckDateTime($value[0][0]->ThoiGianThongBao) }}
                    &nbsp;&nbsp;&nbsp;</p>
        </div>
        <div class="w-1/12 relative text-center dotNotView">
            @if ($value[0][0]->TinhTrang != 2)
            <span class="bg-blue-400 rounded-full p-1.5 absolute top-1/2" style="transform: translateY(-50%);"></span>
            @else
            @endif
        </div>
    </div>
    @break;
    @case('BINHLUANPO')
    <div onclick="window.location.href='{{ url($path) }}'" class="w-full py-2 flex cursor-pointer 
        dark:hover:bg-dark-third text-gray-700 hover:bg-gray-100">
        <div class="pl-2">
            <div class="w-16 h-16 rounded-full relative">
                <img src="{{ $value[0][0]->AnhDaiDien }}" class="w-14 h-14 rounded-full object-cover 
                border-2 border-white" alt="">
                <span class="absolute bottom-0 right-0 text-xl rounded-full bg-dark-third">
                    💭
                </span>
            </div>
        </div>
        <div class="w-9/12 dark:text-gray-300 pl-3">
            @if (count($value[$key]) <= 1) <b>{{ $value[0][0]->Ho . ' ' . $value[0][0]->Ten }} </b> {{ $value[0][0]->TenLoaiThongBao }}.
                @else

                <b>{{ $value[0][0]->Ho . ' ' . $value[0][0]->Ten }} và {{ count($value[$key]) - 1 }} người khác </b> {{ $value[0][0]->TenLoaiThongBao }}.
                @endif
                <br>
                <p class="text-xs font-bold">{{ StringUtil::CheckDateTime($value[0][0]->ThoiGianThongBao) }}
                    <?php $wriCom = Notify::getContentComment(
                        $value[0][0]->IDTaiKhoan,
                        explode('&', $value[0][0]->IDContent)[0],
                        $value[0][0]->ThoiGianThongBao
                    )[0]->NoiDungBinhLuan; ?>
                    &nbsp;&nbsp;&nbsp; . {{ json_decode($wriCom)->NoiDungBinhLuan }}</p>
        </div>
        <div class="w-1/12 relative text-center dotNotView">
            @if ($value[0][0]->TinhTrang != 2)
            <span class="bg-blue-400 rounded-full p-1.5 absolute top-1/2" style="transform: translateY(-50%);"></span>
            @else
            @endif
        </div>
    </div>
    @break;
    @case('NDBTBLCH12')
    <div onclick="window.location.href='{{ url($path) }}'" class="w-full py-2 flex cursor-pointer 
        dark:hover:bg-dark-third text-gray-700 hover:bg-gray-100">
        <div class=" pt-2 relative pl-2">
            <div class="w-16 h-16 rounded-full relative">
                <img src="{{ $value[0][0]->AnhDaiDien }}" class="w-14 h-14 rounded-full object-cover 
                border-2 border-white" alt="">
                <span class="absolute bottom-0 right-0 text-xl">
                    💭
                </span>
            </div>
        </div>
        <div class="w-9/12 dark:text-gray-300 pl-3">
            @if (count($value[$key]) <= 1) <b>
                {{ $value[0][0]->Ho . ' ' . $value[0][0]->Ten }} </b> {{ $value[0][0]->TenLoaiThongBao }}
                {{ $value[0][0]->GioiTinh == 'Nam' ? 'anh ấy.' : 'cô ấy' }}
                @else
                <b>{{ $value[0][0]->Ho . ' ' . $value[0][0]->Ten }} và {{ count($value[$key]) - 1 }} người khác </b> {{ $value[0][0]->TenLoaiThongBao }}
                {{ $value[0][0]->GioiTinh == 'Nam' ? 'anh ấy.' : 'cô ấy' }}
                @endif
                <br>
                {{ StringUtil::CheckDateTime($value[0][0]->ThoiGianThongBao) }}
        </div>
        <div class="w-1/12 relative text-center dotNotView">
            @if ($value[0][0]->TinhTrang != 2)
            <span class="bg-blue-400 rounded-full p-1.5 absolute top-1/2" style="transform: translateY(-50%);"></span>
            @else
            @endif
        </div>
    </div>
    @break;
    @case('BLVBVMBDGT')
    <div onclick="window.location.href='{{ url($path) }}'" class="w-full py-2 flex cursor-pointer 
        dark:hover:bg-dark-third text-gray-700 hover:bg-gray-100">
        <div class=" pt-2 relative pl-2">
            <div class="w-16 h-16 rounded-full relative">
                <img src="{{ $value[0][0]->AnhDaiDien }}" class="w-14 h-14 rounded-full object-cover 
                border-2 border-white" alt="">
                <span class="absolute bottom-0 right-0 text-xl">
                    💭
                </span>
            </div>
        </div>
        <div class="w-9/12 dark:text-gray-300 pl-3">
            @if (count($value[$key]) <= 1) <b>
                {{ $value[0][0]->Ho . ' ' . $value[0][0]->Ten }} </b> {{ $value[0][0]->TenLoaiThongBao }}.
                @else
                <b>{{ $value[0][0]->Ho . ' ' . $value[0][0]->Ten }} và {{ count($value[$key]) - 1 }} người khác </b> {{ $value[0][0]->TenLoaiThongBao }}.
                @endif
                <br>
                {{ StringUtil::CheckDateTime($value[0][0]->ThoiGianThongBao) }}
        </div>
        <div class="w-1/12 relative text-center dotNotView">
            @if ($value[0][0]->TinhTrang != 2)
            <span class="bg-blue-400 rounded-full p-1.5 absolute top-1/2" style="transform: translateY(-50%);"></span>
            @else
            @endif
        </div>
    </div>
    @break;
    @case('NDBTBLC123')
    <div onclick="window.location.href='{{ url($path) }}'" class="w-full py-2 flex cursor-pointer 
        dark:hover:bg-dark-third text-gray-700 hover:bg-gray-100">
        <div class="relative pl-2">
            <div class="w-16 h-16 rounded-full relative">
                <img src="{{ $value[0][0]->AnhDaiDien }}" class="w-14 h-14 rounded-full object-cover 
                border-2 border-white" alt="">
                <span class="absolute bottom-0 right-0 text-xl">
                    💭
                </span>
            </div>
        </div>
        <div class="w-9/12 dark:text-gray-300 pl-3">
            @if (count($value[$key]) <= 1) <b>
                {{ $value[0][0]->Ho . ' ' . $value[0][0]->Ten }} </b> {{ $value[0][0]->TenLoaiThongBao }}
                {{ $value[0][0]->GioiTinh == 'Nam' ? 'anh ấy.' : 'cô ấy' }}
                @else
                <b>{{ $value[0][0]->Ho . ' ' . $value[0][0]->Ten }} và {{ count($value[$key]) - 1 }} người khác </b> {{ $value[0][0]->TenLoaiThongBao }}
                {{ $value[0][0]->GioiTinh == 'Nam' ? 'anh ấy.' : 'cô ấy' }}
                @endif
                <br>
                {{ StringUtil::CheckDateTime($value[0][0]->ThoiGianThongBao) }}
        </div>
        <div class="w-1/12 relative text-center dotNotView">
            @if ($value[0][0]->TinhTrang != 2)
            <span class="bg-blue-400 rounded-full p-1.5 absolute top-1/2" style="transform: translateY(-50%);"></span>
            @else
            @endif
        </div>
    </div>
    @break;
    @case('TLBLC12345')
    <div onclick="window.location.href='{{ url($path) }}'" class="w-full py-2 flex cursor-pointer 
        dark:hover:bg-dark-third text-gray-700 hover:bg-gray-100">
        <div class="relative pl-2">
            <div class="w-16 h-16 rounded-full relative">
                <img src="{{ $value[0][0]->AnhDaiDien }}" class="w-14 h-14 rounded-full object-cover 
                border-2 border-white" alt="">
                <span class="absolute bottom-0 right-0 text-xl">
                    💭
                </span>
            </div>
        </div>
        <div class="w-9/12 dark:text-gray-300 pl-3">
            @if (count($value[$key]) <= 1) <b>
                {{ $value[0][0]->Ho . ' ' . $value[0][0]->Ten }} </b> {{ $value[0][0]->TenLoaiThongBao }}.
                @else
                <b>{{ $value[0][0]->Ho . ' ' . $value[0][0]->Ten }} và {{ count($value[$key]) - 1 }} người khác </b> {{ $value[0][0]->TenLoaiThongBao }}.
                @endif
                <br>
                {{ StringUtil::CheckDateTime($value[0][0]->ThoiGianThongBao) }}
        </div>
        <div class="w-1/12 relative text-center dotNotView">
            @if ($value[0][0]->TinhTrang != 2)
            <span class="bg-blue-400 rounded-full p-1.5 absolute top-1/2" style="transform: translateY(-50%);"></span>
            @else
            @endif
        </div>
    </div>
    @break;
    @case('BTCXVBLC12')
    <div onclick="window.location.href='{{ url($path) }}'" class="w-full py-2 flex cursor-pointer 
        dark:hover:bg-dark-third text-gray-700 hover:bg-gray-100">
        <div class="relative pl-2">
            <div class="w-16 h-16 rounded-full relative">
                <img src="{{ $value[0][0]->AnhDaiDien }}" class="w-14 h-14 rounded-full object-cover 
                border-2 border-white" alt="">
                <span class="absolute bottom-0 right-0 text-xl">
                    {{ Functions::getFeelMain($value['loaiCamXuc']) }}
                </span>
            </div>
        </div>
        <div class="w-9/12 dark:text-gray-300 pl-3">
            @if (count($value[$key]) <= 1) <b>
                {{ $value[0][0]->Ho . ' ' . $value[0][0]->Ten }} </b> {{ $value[0][0]->TenLoaiThongBao }} của bạn.
                @else
                <b>{{ $value[0][0]->Ho . ' ' . $value[0][0]->Ten }} và {{ count($value[$key]) - 1 }} người khác </b> {{ $value[0][0]->TenLoaiThongBao }} của bạn.
                @endif
                <br>
                {{ StringUtil::CheckDateTime($value[0][0]->ThoiGianThongBao) }}
        </div>
        <div class="w-1/12 relative text-center dotNotView">
            @if ($value[0][0]->TinhTrang != 2)
            <span class="bg-blue-400 rounded-full p-1.5 absolute top-1/2" style="transform: translateY(-50%);"></span>
            @else
            @endif
        </div>
    </div>
    @break;
    @endswitch
</div>
<script>
    setTimeout(() => {
        $('#{{ $value[0][0]->IDThongBao }}').fadeOut("slow");
        setTimeout(() => {
            $('#{{ $value[0][0]->IDThongBao }}').remove();
        }, 1000);
    }, 3000);
</script>