<div class="w-full hover:bg-gray-200 dark:hover:bg-dark-third cursor-pointer">
    <ul class="w-full relative flex py-2">
        <li class="w-10 h-10 ml-3">
            <div class="border-2 border-solid w-9 h-9 object-cover rounded-full 
                    text-center border-gray-400 mx-auto relative">
                <i class='bx bx-search text-2xl text-gray-400 absolute left-1 bottom-0'></i>
            </div>
        </li>
        <li class="pl-3 items-center font-bold dark:text-white py-2">
            {{ mb_strtolower($value->Ho . ' ' . $value->Ten) }}
        </li>
        <li class="cursor-pointer w-7 h-7 items-center
                rounded-full absolute right-3 my-2.5 text-center text-white text-xl pb-1.5">

        </li>
    </ul>
</div>