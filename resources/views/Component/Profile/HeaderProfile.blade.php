<form action="action" class="dark:bg-dark-second w-full md:w-4/5 lg:w-3/4 md:mx-auto xl:w-full">
    <div class="w-full relative">
        <div class="w-full mx-auto relative">
            <div class="w-full relative h-60 lg:h-96">
                <a href="photo/"><img class="w-full h-60 object-cover  lg:h-96" style="border-radius: 10px;" src="{{ $users[0]->AnhBia }}" alt=""></a>
            </div>
            <div class="w-full absolute text-center top-20 lg:top-6/10">
                <img class="w-44 h-44 rounded-full mx-auto
                                border-4 border-solid border-white object-cover" src="{{ $users[0]->AnhDaiDien }}" alt=""></a>
                <p class="font-bold flex text-center text-3xl py-2 dark:text-white 
                            justify-center" style="font-family: system-ui;">{{ $users[0]->Ho . ' ' . $users[0]->Ten }}
                    <span class="ml-3 mt-3.5 bg-blue-500 rounded-full 
                                text-sm font-bold text-white w-4 h-4 flex">
                        <i class='bx bx-check flex justiy-center items-center '></i>
                    </span>
                </p>
            </div>
        </div>
    </div>
</form>
<div class="w-full relative">
    <div class="mx-auto text-center py-4 dark:text-white w-63%" style="margin-top: 68px;">
        <span class="outline-none">{{ $users[0]->MoTa }}</span>
        <br>
    </div>
</div>
<hr class="w-full md:w-4/5 lg:w-3/4 md:mx-auto xl:w-full mb-2 bg-gray-200 
                    dark:border-dark-second border-solid border-t-2">