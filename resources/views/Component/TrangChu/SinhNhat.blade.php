<div class="w-full">
    <div class="w-full">
        <span class="float-left">
            <p class="font-bold dark:text-white">Sinh nhật</p>
        </span>
    </div>
    <div class="w-full flex px-0 py-2.5">
        <div class="w-2/12">
            <i class="fas fa-gift text-4xl" style="color: #21A2F0;;"></i>
        </div>
        <div class="w-10/12 text-lg curor-pointer">
            @if (count($birthDay) == 1)
            <span class="dark:text-white">Hôm nay là sinh nhật của
                <b class="dark:text-white">{{ $birthDay[0]->Ho . ' ' . $birthDay[0]->Ten }}</b></span>
            @else
            <span class="dark:text-white">Hôm nay là sinh nhật của
                <b class="dark:text-white">{{ $birthDay[0]->Ten }}</b>
                và <b class="dark:text-white">{{ count($birthDay) - 1 }} người bạn khác</b></span>
            @endif
        </div>
    </div>
</div>