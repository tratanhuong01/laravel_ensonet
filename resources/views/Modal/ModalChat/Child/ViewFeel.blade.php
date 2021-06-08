<?php

use App\Models\Functions;

?>
@foreach($data as $key => $value)
@foreach($value as $keys => $values)
@if ($values[0]->IDTaiKhoan == Session::get('user')[0]->IDTaiKhoan)
<div class="w-full py-2 flex">
    <div class="w-3/5 flex">
        <div class="w-14 h-14 relative">
            <a href="">
                <img src="{{ $values[0]->AnhDaiDien }}" class="w-12 h-12 object-cover
                                            rounded-full border-2 border-solid border-gray-300" alt="">
            </a>
            <span class="absolute bottom-2 right-1">{{ Functions::getFeelMain($key) }}</span>
        </div>
        <div class="px-3 cursor-pointer">
            <p class="pb-1"><a href="" class="dark:text-white font-bold">{{ $values[0]->Ho . ' ' . $values[0]->Ten }}</a></p>
            <p class="text-sm font-bold dark:text-white">Nhấn để gỡ</p>
        </div>
    </div>
    <div class=" w-2/5 text-right relative">
        <span class="absolute py-2 text-3xl right-3">{{ Functions::getFeelMain($key) }}</span>
    </div>
</div>
@else
<div class="w-full py-2 flex">
    <div class="w-3/5 flex">
        <div class="w-14 h-14 relative">
            <a href="">
                <img src="{{ $values[0]->AnhDaiDien }}" class="w-12 h-12 object-cover
                                            rounded-full border-2 border-solid border-gray-300" alt="">
            </a>
            <span class="absolute bottom-2 right-1">{{ Functions::getFeelMain($key) }}</span>
        </div>
        <div class="px-3 flex cursor-pointer">
            <p class=" flex items-center">
                <a href="" class="dark:text-white font-bold">
                    {{ $values[0]->Ho . ' ' . $values[0]->Ten }}
                </a>
            </p>
        </div>
    </div>
    <div class=" w-2/5 text-right relative">
        <span class="absolute py-2 text-3xl right-3">{{ Functions::getFeelMain($key) }}</span>
    </div>
</div>
@endif
@endforeach
@endforeach