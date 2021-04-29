<div class="w-full">
    <div class="w-full p-1 flex">
        <div class="w-1/2 text-left pl-2 py-2">
            <b class="dark:text-white font-bold text-xm">Messenger</b>
        </div>
        <div class="w-1/2 text-right pr-2 py-2">
            <a href=""><b class="dark:text-white font-bold text-xm">Vào Messenger</b></a>
        </div>
    </div>
    <div class="w-full p-1" style="max-height: 671px;height: 671px;">
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
</div>
<div class="w-full py-2">
    <p class="text-center font-bold dark:text-white cursor-pointer">
        Xem thêm 10 tin nhắn
    </p>
</div>
</div>