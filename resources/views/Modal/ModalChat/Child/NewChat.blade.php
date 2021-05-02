<div class="w-full p-2 text-center">
    <div class="w-16 h-16 relative mx-auto">
        <img src="{{ $chater[0]->AnhDaiDien }}" class="w-16 h-16 rounded-full object-cover mx-auto" alt="">
        @include('Component\Child\Activity',
        [
        'padding' => 'p-1',
        'bottom' => 'bottom-0',
        'right' => 'right-1.5',
        'IDTaiKhoan' => $chater[0]->IDTaiKhoan
        ])
    </div>
    <p class="text-center text-gray-900 font-bold dark:text-white">
        <span class="py-1.5 text-sm font-bold dark:text-gray-300 ">Ensonet</span> <br>
        <span class="text-sm font-bold dark:text-gray-300">
            Các bạn là bạn bè trên Ensonet</span>
    </p>
</div>