<?php

use App\Models\Functions;
use Illuminate\Support\Facades\Session;

$getMutualFriend = Functions::getMutualFriend($data->IDTaiKhoan, Session::get('user')[0]->IDTaiKhoan)

?>
<div class="w-1/3 relative py-2 pl-2">
    <img class="rounded-full object-cover" style="width: 84px;height: 84px;" src="/{{ $data->AnhDaiDien }}" alt="">
    <span class="bg-green-600 p-2 border-2 border-solid border-white rounded-full
        absolute bottom-12 right-4 ">
    </span>
</div>
<div class="w-2/3">
    <p class="font-bold dark:text-white" style="font-size: 20px;">{{ $data->Ho . ' ' . $data->Ten }}</p>
    <div class="w-full py-2">
        <p class=" dark:text-white">
            <i class="fas fa-user-friends dark:text-white"></i>&nbsp;&nbsp;
            @if (count($getMutualFriend) == 0)
            <span class="font-bold dark:text-white">Không có bạn bè chung</span>
            @elseif(count($getMutualFriend) == 1)
            1 bạn bè chung : {{ $getMutualFriend[0][0]->Ho . ' ' . $getMutualFriend[0][0]->Ten }}
            @else
            {{ count($getMutualFriend) }} bạn bè chung gồm
            <b>{{ $getMutualFriend[0][0]->Ho . ' ' . $getMutualFriend[0][0]->Ten }}</b> và
            <b>{{ count($getMutualFriend) - 1 }} người khác</b>
            @endif
        </p>
    </div>
    <div class="w-full py-2">
        <p class="dark:text-white"><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;
            Sống tại <b>Quảng Nam</b></p>
    </div>
</div>