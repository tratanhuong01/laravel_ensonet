<div class="w-full bg-white mb-3 mt-2 dark:bg-dark-second m-auto rounded-lg mb-2">
    <div class="w-full flex p-2.5 ">
        <div class="w-2/12 md:w-1/12 mr-3 pt-1">
            <a href=""><img class="w-12 rounded-full h-12 object-cover " src="/{{ $users[0]->AnhDaiDien }}"></a>
        </div>
        <div class="w-11/12">
            <input class="w-full p-3 border-none outline-none bg-gray-200 
            dark:bg-dark-third" style="border-radius: 40px;" onclick="openPost('Have')" type="text" placeholder="Viết gì đó cho ,{{ $users[0]->Ten }}">
        </div>
    </div>
    <hr>
    <div class="w-full">
        <ul class="w-full flex">
            <li class="w-1/2 md:w-1/3 xl:w-1/3 cursor-pointer py-4 text-center dark:hover:bg-dark-third hover:bg-gray-200"><i style="color: #E42645;font-size: 18px;" class="fas fa-video"></i>
                &nbsp;<b class="dark:text-white">Video Trực Tiếp</b></li>
            <li class="w-1/2 md:w-1/3 xl:w-1/3  cursor-pointer py-4 text-center dark:hover:bg-dark-third hover:bg-gray-200"><i style="color: #41B35D;font-size: 18px;" class="far fa-image"></i>
                &nbsp;<b class="dark:text-white">Ảnh / Video</b>
            </li>
            <li class="w-1/3 md:w-1/3 xl:w-1/3 md:block hidden cursor-pointer py-4 text-center dark:hover:bg-dark-third hover:bg-gray-200 pr-0"><i style="color: #F7B928;font-size: 18px;" class="fas fa-smile"></i>
                &nbsp;<b class="dark:text-white">Cảm Xúc / Hoạt Động</b></li>
        </ul>
    </div>
</div>