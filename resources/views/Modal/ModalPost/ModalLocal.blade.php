<div id="modal-two" class="border-2 border-solid border-gray-300 py-3 pl-1.5 pr-1.5 pt-0
            bg-white w-full fixed z-50 top-1/2 left-1/2 dark:bg-dark-second rounded-lg 
            sm:w-10/12 md:w-2/3 lg:w-2/3 xl:w-1/3" style="transform: translate(-50%,-50%);display: none;z-index:10;">
    <p class="p-2.5 block text-center text-xl font-bold dark:text-white">Chọn vị trí</p>
    <span onclick="returnCreatePost()" class="p-2 rounded-full cursor-pointer absolute top-0.5">
        <i class='bx bxs-left-arrow-alt text-3xl dark:text-white'></i></span>
    <hr>
    <div class="w-full my-2 px-2">
        <input oninput="searchLocal()" class="w-full p-2 pl-4 bg-transparent dark:bg-dark-third
        dark:text-white font-bold rounded-3xl " type="text" placeholder="Tìm kiếm địa chỉ" id="localInputPost">
    </div>
    <div class="tac-user wrapper-content-right" id="localPost">
        @include('Modal/ModalPost/Child/Local',['local' => $local])
    </div>
</div>