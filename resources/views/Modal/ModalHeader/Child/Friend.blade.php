<div class="w-full hover:bg-gray-200 dark:hover:bg-dark-third cursor-pointer">
    <ul class="w-full relative flex py-2">
        <li class="pl-3">
            <img class="w-11 h-11 object-cover rounded-full p-0.5" src="/{{ $value->AnhDaiDien }}" alt="">
        </li>
        <li class="pl-3 items-center font-bold dark:text-white">
            {{ $value->Ho . ' ' . $value->Ten }}
            <p class="font-bold dark:text-gray-300 text-gray-600 text-sm">Bạn bè</p>
        </li>
        <li class="cursor-pointer w-7 h-7 items-center
                rounded-full absolute right-3 my-2.5 text-center text-white text-xl pb-1.5">
        </li>
    </ul>
</div>