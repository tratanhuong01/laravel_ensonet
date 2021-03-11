<div onclick="openChat('{{ $data->IDTaiKhoan }}')" onmouseenter="viewInfoHover('{{ $data->IDTaiKhoan }}',event)" onmouseleave="viewInfoLeave()" class="w-full flex p-2 relative friends-online relative cursor-pointer dark:hover:bg-dark-third">
    <div class="w-2/12 relative">
        <img class="w-10 h-10 rounded-full object-cover" src="/{{ $data->AnhDaiDien }}" alt="">
        <span class="bg-green-600 p-1 border-2 border-solid border-white rounded-full
            absolute bottom-0 right-2.5 ">
        </span>
    </div>
    <div class=" w-10/12 pt-2.5">
        <p class="font-bold dark:text-white">{{ $data->Ho . ' ' . $data->Ten }}</p>
    </div>
</div>
<!-- onmouseover="viewInfoHover(0,event)" onmouseleave="viewInfoLeave(0)" -->