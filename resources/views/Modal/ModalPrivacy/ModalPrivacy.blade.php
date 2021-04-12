<div class="w-full text-center relative">
    <p class="text-2xl font-bold p-2.5 dark:text-white">Quyền riêng tư</p>
    <span id="closeModalSelectPrivacy" class="p-2 rounded-full cursor-pointer absolute top-0.5 left-2">
        <i class='bx bxs-left-arrow-alt text-3xl dark:text-white'></i></span>
    <hr>
</div>
<ul class="w-full p-2">
    <li class="w-full flex p-2 cursor-pointer">
        <div class="w-2/12">
            <i class="fas fa-globe-europe text-3xl py-4 px-5 bg-gray-200 rounded-full"></i>
        </div>
        <div class="w-9/12">
            <p class="font-bold text-xl py-1 dark:text-white" style="font-family: system-ui;">Công khai</p>
            <p class="dark:text-white">Mọi người trên hoặc ngoài facebook</p>
        </div>
        <div class="w-1/12 p-6">
            <input onchange="handelOnChangeInput('CONGKHAI')" type="radio" class="text-3xl h-4" name="state" style="transform: scale(1.5);">
        </div>
    </li>
    <li class="w-full flex p-2 cursor-pointer">
        <div class="w-2/12">
            <i class="fas fa-user-friends text-3xl py-4 px-4 bg-gray-200 rounded-full"></i>
        </div>
        <div class="w-9/12">
            <p class="font-bold text-xl py-1 dark:text-white" style="font-family: system-ui;">Bạn bè</p>
            <p class="dark:text-white">Bạn bè của bạn trên facebook</p>
        </div>
        <div class="w-1/12 p-6">
            <input onchange="handelOnChangeInput('CHIBANBE')" type="radio" class="text-3xl h-4" name="state" style="transform: scale(1.5);">
        </div>
    </li>
    <li class="w-full flex p-2 cursor-pointer">
        <div class="w-2/12">
            <i class="fas fa-lock text-3xl py-4 px-5 bg-gray-200 rounded-full"></i>
        </div>
        <div class="w-9/12">
            <p class="font-bold text-xl py-1 dark:text-white" style="font-family: system-ui;">Riêng tư</p>
            <p class="dark:text-white">Chỉ mình bạn có thể thấy thông tin này</p>
        </div>
        <div class="w-1/12 p-6">
            <input onchange="handelOnChangeInput('RIENGTU')" type="radio" class="text-3xl h-4" name="state" style="transform: scale(1.5);">
        </div>
    </li>
</ul>