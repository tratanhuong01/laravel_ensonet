<?php

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Functions;
use App\Models\StringUtil;
use App\Process\DataProcess;
use App\Process\DataProcessSecond;
use App\Models\Gioithieu;

?>
<div class="pl-2.5 bg-white m-2.5 rounded-lg dark:bg-dark-third" style="width: 95%;">
    <div class="w-full flex">
        <div class="w-1/2">
            <p class="dark:text-white font-bold pt-2">Bạn bè <br></p>
            <span class="color-word">{{count($friendsGet)}} người bạn</span>
        </div>
        <div class="w-1/2 mt-2.5 mr-2.5 text-right">
            <?php $viewAllImage = "profile." . $users[0]->IDTaiKhoan . '/friends'; ?>
            <a href="{{ url($viewAllImage) }}"><b style="color: #1876F2;">Xem tất cả</b></a>
        </div>
    </div>
    <div class="w-full pt-4 flex flex-wrap">

        @if (count($friendsGet) == 0)
        <p class="text-center font-bold dark:text-white py-3">
            Không có bất kì bạn bè nào.
        </p>
        @else
        @foreach($friendsGet as $key => $value)
        <?php $pathProfile = 'profile.' . $value[0]->IDTaiKhoan; ?>
        <div class="fr-us">
            <a href="{{ url($pathProfile) }}"><img src="{{ $value[0]->AnhDaiDien }}" alt=""></a>
            <p class="font-bold py-2 dark:text-white text-sm">
                <a href="{{ url($pathProfile) }}">
                    {{ $value[0]->Ho . ' ' . $value[0]->Ten }}
                </a>
            </p>
        </div>
        @endforeach
        @endif
    </div>
</div>