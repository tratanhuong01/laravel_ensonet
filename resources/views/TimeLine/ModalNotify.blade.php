<div class="w-full">
    <div class="w-full flex">
        <div class="w-1/3">
            <p class="dark:text-white text-xl py-2 pl-2 cursor-pointer">
                <b>Thông Báo</b>
            </p>
        </div>
        <div class="w-2/3">
            <p class="dark:text-white text-xm py-2 pl-2 pr-2 cursor-pointer text-right">
                <b>Đánh dấu tất cả là đã đọc</b>
            </p>
        </div>
    </div>
    <div class="w-full p-1 " style="max-height: 671px;height: 671px;">
        @for( $i = 0 ; $i < 8 ; $i++ ) <div class="cursor-pointer flex relative py-2 px-1">
            <div class="w-1/5">
                <div class="w-14 h-14 rounded-full object-cover p-0.5 
            bg-gray-300 linear-background dark:linear-background">
                </div>
            </div>
            <div class="w-4/5 flex items-center">
                <div class="w-10/12 mx-auto h-3 flex items-center rounded-lg bg-gray-300 
            linear-background dark:linear-background">
                </div>
            </div>
    </div>
    @endfor
    <div class="w-full py-2">
        <p class="text-center font-bold dark:text-white cursor-pointer">
            Xem thêm 10 thông báo
        </p>
    </div>
</div>