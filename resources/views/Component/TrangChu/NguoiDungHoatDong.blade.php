<div onclick="openChat('{{ $data->IDTaiKhoan }}')" class="w-full flex p-2 relative friends-online relative cursor-pointer dark:hover:bg-dark-third">
    <div class="w-2/12 relative">
        <img onmouseenter="viewInfoHover('{{ $data->IDTaiKhoan }}',event)" onmouseleave="viewInfoLeave()" class="w-10 h-10 rounded-full object-cover" src="/{{ $data->AnhDaiDien }}" alt="">
        @include('Component/Child/HoatDong',[
        'IDTaiKhoan' => $data->IDTaiKhoan,
        'padding' => 'p-1',
        'bottom' => 'bottom-0',
        'right' => 'right-2.5',
        ])
    </div>
    <div class=" w-10/12 pt-2.5">
        <p class="font-bold dark:text-white">{{ $data->Ho . ' ' . $data->Ten }}</p>
    </div>
</div>
<!-- onmouseover="viewInfoHover(0,event)" onmouseleave="viewInfoLeave(0)" -->