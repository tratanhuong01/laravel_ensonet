<?php

use App\Models\Data;
use App\Models\Functions;
use Illuminate\Support\Facades\Session;

?>
@foreach($datas as $key => $value)
@for ($i = 0; $i < count($value) ; $i++) @if ($value[$i][0]->IDTaiKhoan == Session::get('user')[0]->IDTaiKhoan)
    <div class="w-full py-2 flex">
        <div class="w-3/5 flex">
            <div class="w-14 h-14 relative">
                <a href="">
                    <img src="/{{ $value[$i][0]->AnhDaiDien }}" class="w-12 h-12 object-cover
                                            rounded-full border-2 border-solid border-gray-300" alt="">
                </a>
                <span class="absolute bottom-2 right-1">{{ Functions::getFeelMain($key) }}</span>
            </div>
            <div class="px-3">
                <p class="py-3"><a href="" class="dark:text-white font-bold">{{ $value[$i][0]->Ho . ' ' . $value[$i][0]->Ten }}</a></p>
            </div>
        </div>
        <div class="w-2/5 text-right">
        </div>
    </div>
    @else
    <div class="w-full py-2 flex">
        <div class="w-3/5 flex">
            <div class="w-14 h-14 relative">
                <a href="">
                    <img src="/{{ $value[$i][0]->AnhDaiDien }}" class="w-12 h-12 object-cover
                                            rounded-full border-2 border-solid border-gray-300" alt="">
                </a>
                <span class="absolute bottom-2 right-1">{{ Functions::getFeelMain($key) }}</span>
            </div>
            <div class="px-3">
                <p><a href="" class="dark:text-white font-bold font-bold">{{ $value[$i][0]->Ho . ' ' . $value[$i][0]->Ten }}</a></p>
                <p><a href="" class="dark:text-gray-300 font-bold text-gray-700 text-sm">
                        {{ count(Functions::getMutualFriend($value[$i][0]->IDTaiKhoan,Session::get('user')[0]->IDTaiKhoan)) }} bạn chung
                    </a></p>
            </div>
        </div>
        <div class="w-2/5 text-right">
            <button class=" px-3 py-2 bg-gray-300 rounded-lg font-bold">Bạn
                Bè</button>
        </div>
    </div>
    @endif
    @endfor
    @endforeach