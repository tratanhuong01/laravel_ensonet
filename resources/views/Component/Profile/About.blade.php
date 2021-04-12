<?php

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Functions;
use App\Models\StringUtil;
use App\Process\DataProcess;
use App\Process\DataProcessSecond;
use App\Models\Gioithieu;

?>
<div class="mx-2.5 mt-4 bg-white p-2.5 pt-0 rounded-lg dark:bg-dark-third" style="width:95%;">
    <p class="font-bold text-xl py-2 dark:text-white" style="font-family: system-ui;">Giới thiệu</p>
    <ul class="w-full ">
        @if (count($json->CongViecHocVan->CongViec) == 0)
        @else
        <li class="w-full pb-3" style="font-size: 15px;">
            <p class="dark:text-gray-300"><i class="fas fa-briefcase 
                                    text-gray-600 text-xl dark:text-gray-300"></i>&nbsp;&nbsp;&nbsp;
                @if ($json->CongViecHocVan->CongViec[0]->NamKetThuc == NULL)
                {{ 'Làm việc tại ' }}
                @else
                {{ 'Từng làm việc tại ' }}
                @endif
                <b class="dark:text-gray-300">{{ $json->CongViecHocVan->CongViec[0]->TenCongTy }}</b>
            </p>
        </li>
        @endif
        @if (count($json->CongViecHocVan->HocVan) == 0)
        @else
        <li class="w-full pb-3" style="font-size: 15px;">
            <p class="dark:text-gray-300"><i class="fas fa-graduation-cap text-gray-600 dark:text-gray-300 text-xl"></i>&nbsp;
                Học tại <b class="dark:text-gray-300">
                    {{ $json->CongViecHocVan->HocVan[0]->TenTruongHoc }}
                </b>
            </p>
        </li>
        @endif
        @if (count($json->NoiTungSong->NoiOHienTai) == 0)
        @else
        <li class="w-full pb-3" style="font-size: 15px;">
            <p class="dark:text-gray-300"><i class="fas fa-home text-gray-600 dark:text-gray-300
                                     text-xl"></i>&nbsp;&nbsp;Sống tại
                <b class="dark:text-gray-300">
                    {{ $json->NoiTungSong->NoiOHienTai[0]->TenDiaChi }}</b>
            </p>
        </li>
        @endif
        @if (count($json->NoiTungSong->QueQuan) == 0)
        @else
        <li class="w-full pb-3" style="font-size: 15px;">
            <p class="dark:text-gray-300">&nbsp;<i class="fas fa-map-marker-alt text-gray-600 dark:text-gray-300 text-xl"></i>&nbsp;&nbsp;
                Đến từ <b class="dark:text-gray-300">
                    {{ $json->NoiTungSong->NoiOHienTai[0]->TenDiaChi }}</b></p>
        </li>
        @endif
        <li class="w-full pb-3" style="font-size: 15px;">
            <p class="dark:text-gray-300"><i class="fas fa-heart text-gray-600 dark:text-gray-300
                                text-xl"></i></i>&nbsp;&nbsp; Độc Thân</p>
        </li>
        <li class="w-full pb-3" style="font-size: 15px;">
            <p class="dark:text-gray-300"><i class="fas fa-clock text-gray-600 text-xl 
                                dark:text-gray-300"></i>&nbsp;&nbsp;
                {{ StringUtil::getDateUse($users[0]->NgayTao) }}
            </p>
        </li>
        @php
        $numberUserFollow = DataProcessSecond::getUserFollowByID($users[0]->IDTaiKhoan)
        @endphp
        @if (count($numberUserFollow) == 0)
        @else
        <li class="w-full pb-3 flex" style="font-size: 15px;">
            <p class="dark:text-gray-300">&nbsp;<i class="fab fa-foursquare text-gray-600 text-xl 
                                dark:text-gray-300"></i>&nbsp;&nbsp;
                <span>Có &nbsp;<b class="dark:text-gray-300">{{ count($numberUserFollow) }}</b>&nbsp; người theo dõi</span>
            </p>
        </li>
        @endif

    </ul>
</div>