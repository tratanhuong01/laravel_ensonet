<div id="modal-one" class="shadow-sm border border-solid border-gray-500 py-3 pl-1.5 pr-1.5 pt-0
bg-white w-full fixed z-50 top-1/2 left-1/2 dark:bg-dark-second rounded-lg 
sm:w-10/12 md:w-2/3 lg:w-2/3 xl:w-1/3" style="transform: translate(-50%,-50%);
display: none;z-index:10;">
    <div class="w-full text-center">
        <p class="text-2xl font-bold p-2.5 dark:text-white">Quyền riêng tư</p>
        <span onclick="closePost()" class=" rounded-full bg-aliceblue px-3 py-1 text-2xl font-bold
                absolute right-4 top-2 cursor-pointer dark:text-gray-300">&times;</span>
        <hr>
    </div>
    <ul class="w-full p-2">
        <li class="w-full flex p-2 cursor-pointer">
            <div class="w-2/12">
                <i class="fas fa-globe-europe text-3xl py-4 px-5 bg-gray-200 rounded-full"></i>
            </div>
            <div class="w-9/12">
                <p class="font-bold text-xl py-1" style="font-family: system-ui;">Công khai</p>
                <p>Mọi người trên hoặc ngoài facebook</p>
            </div>
            <div class="w-1/12 p-6">
                <input type="radio" class="text-3xl h-4" name="state" style="transform: scale(1.5);">
            </div>
        </li>
        <li class="w-full flex p-2 cursor-pointer">
            <div class="w-2/12">
                <i class="fas fa-user-friends text-3xl py-4 px-4 bg-gray-200 rounded-full"></i>
            </div>
            <div class="w-9/12">
                <p class="font-bold text-xl py-1" style="font-family: system-ui;">Bạn bè</p>
                <p>Bạn bè của bạn trên facebook</p>
            </div>
            <div class="w-1/12 p-6">
                <input type="radio" class="text-3xl h-4" name="state" style="transform: scale(1.5);">
            </div>
        </li>
        <li class="w-full flex p-2 cursor-pointer">
            <div class="w-2/12">
                <i class="fas fa-lock text-3xl py-4 px-5 bg-gray-200 rounded-full"></i>
            </div>
            <div class="w-9/12">
                <p class="font-bold text-xl py-1" style="font-family: system-ui;">Riêng tư</p>
                <p>Chỉ mình bạn có thể thấy thông tin này</p>
            </div>
            <div class="w-1/12 p-6">
                <input type="radio" class="text-3xl h-4" name="state" style="transform: scale(1.5);">
            </div>
        </li>
    </ul>
</div>