<div class="w-11/12 dark:bg-dark-second bg-gray-200 absolute -top-1 -left-3 flex z-30 hidden
 flex-wrap shadow-lg" id="searchDataEnsonet">
    <div class="w-full h-16 flex">
        <div onclick="inputSearchEvent()" class="w-11 h-11 rounded-full 
    text-center items-center pt-1 mt-1 cursor-pointer ml-1 ">
            <i class='bx bxs-left-arrow-alt text-3xl dark:text-gray-300'></i>
        </div>
        <div class="mt-1 pl-1">
            <div class="relative bg-gray-100 dark:bg-dark-third px-2 py-2 w-11 h-11 lg:w-10 xl:w-max xl:pl-3 xl:pr-8 rounded-full flex items-center justify-center cursor-pointer">
                <input type="text" oninput="searchData()" placeholder="Tìm kiếm trên Ensonet" id="valueSearchData" class="w-56 outline-none bg-transparent hidden xl:inline-block dark:text-white">
            </div>
        </div>
    </div>
    <hr class="my-2">
    <div class="w-full" id="loadDataSearch">
        <div class="w-full py-2">
            <ul class="w-full flex py-3">
                <li class="w-1/2 text-left font-bold pl-3 dark:text-white">
                    Tìm kiếm gần đây
                </li>
                <li class="w-1/2 text-right font-bold pr-3 text-blue-500">
                    Chỉnh sửa
                </li>
            </ul>
        </div>
        <div class="w-full py-1">

            <div class="w-full hover:bg-gray-200 dark:hover:bg-dark-third cursor-pointer">
                <ul class="w-full relative flex py-2">
                    <li class="w-11 h-11 ml-3">
                        <div class="border-2 border-solid w-10 h-10 object-cover rounded-full 
                    text-center border-gray-400 mx-auto relative">
                            <i class='bx bx-time-five text-3xl text-gray-400 absolute left-1 bottom-0'></i>
                        </div>
                    </li>
                    <li class="pl-3 items-center font-bold dark:text-white py-2.5">
                        huy quần hoa
                    </li>
                    <li class="cursor-pointer w-7 h-7 items-center
                rounded-full absolute right-3 my-2.5 text-center text-white text-xl pb-1.5">
                        &times;
                    </li>
                </ul>
            </div>
            <div class="w-full hover:bg-gray-200 dark:hover:bg-dark-third cursor-pointer">
                <ul class="w-full relative flex py-2">
                    <li class="pl-3">
                        <img class="w-11 h-11 object-cover rounded-full p-0.5" src="/img/gai1.jpg" alt="">
                    </li>
                    <li class="pl-3 items-center font-bold dark:text-white py-2.5">
                        Hồ Thiên Kim
                    </li>
                    <li class="cursor-pointer w-7 h-7 items-center 
                rounded-full absolute right-3 my-2.5 text-center text-white text-xl pb-1.5">
                        &times;
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>