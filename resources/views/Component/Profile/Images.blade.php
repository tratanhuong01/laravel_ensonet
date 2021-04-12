<?php

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Functions;
use App\Models\StringUtil;
use App\Process\DataProcess;
use App\Process\DataProcessSecond;
use App\Models\Gioithieu;

?>
<div class="pl-2.5 bg-white m-2.5 rounded-lg  dark:bg-dark-third" style="width: 95%;">
    <div class="w-full flex">
        <div class="w-full mt-2.5 mr-2.5">
            <p class="font-bold dark:text-white">Ảnh<br></p>
        </div>
        <div class="w-full text-right mt-2.5 mr-2.5">
            <a href=""><b style="color: #1876F2;">Xem tất cả</b></a>
        </div>
    </div>
    <div class="w-full pt-4 pl-0.5 flex flex-wrap">
        @if (count($images) == 0)
        <p class="text-center font-bold dark:text-white py-3">
            Không có bất kì ảnh nào.
        </p>
        @else
        @foreach($images as $key => $value)
        <?php $pathImg = 'photo/' . $value->IDBaiDang . '/' . $value->IDHinhAnh; ?>
        <div class="fr-us">
            <a href="{{ url($pathImg) }}"><img class="object-cover rounded-lg" src="{{ $value->DuongDan }}" alt=""></a>
        </div>
        @endforeach
        @endif
    </div>
</div>