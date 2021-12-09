<?php

use App\Models\StringUtil;
use Illuminate\Support\Facades\Session;

?>
@if (count($viewStory) == 0)
<p class="font-bold dark:text-white">
    <i class="fas fa-eye"></i>&nbsp;&nbsp;
    <span>Chưa có người xem</span>
</p>
<p class="font-bold dark:text-white px-2 text-xm py-2">
    Thông tin chi tiết về những người xem tin của bạn sẽ hiển thị ở đây.
</p>
@else
<p class="font-bold dark:text-white">
    <i class="fas fa-eye"></i>&nbsp;&nbsp;
    <span>{{ count($viewStory) }} người xem</span>
</p>
<ul class="w-full py-2">
    @foreach($viewStory as $key => $value)
    <li class="cursor-pointer w-full flex py-2 hover:bg-gray-300
                                dark:hover:bg-dark-third pl-3">
        <div class="pr-2 pt-1">
            <div class="w-10 h-10 rounded-full relative">
                <img src="{{ $value->AnhDaiDien }}" class="w-10 h-10 object-cover
                                            rounded-full" alt="">
                @include('Component.Child.Activity',
                [
                'padding' => 'p-1',
                'bottom' => 'bottom-0',
                'right' => 'right-1.5',
                'IDTaiKhoan' => $value->IDTaiKhoan
                ])
            </div>
        </div>
        <div class="dark:text-white pb-1">
            <p class="dark:text-white font-bold">
                <a href="">{{ $value->Ho . ' ' . $value->Ten }}</a>
            </p>
            <p class="dark:text-white font-bold text-sm">
                {{ StringUtil::CheckDateTimeUserActivity($value->ThoiGianHoatDong) }}
            </p>
        </div>
    </li>
    @endforeach
</ul>
@endif