<p class="dark:text-white py-4">Chi tiết về tin</p>
<ul class="flex whitespace-nowrap overflow-x-hidden" id="storyView" style="max-width: 368px;">
    @foreach($allStory[0] as $key => $value)
    @if ($key == 0)
    <li onclick="changeStoryImage(this,0)" class="mr-2 cursor-pointer flex-shrink-0 showLi" style="width: 120px;">
        <img class="w-32 h-40 object-cover showImg" src="/{{ $value->DuongDan }}">
    </li>
    @else
    <li onclick="changeStoryImage(this,1)" class="cursor-pointer flex-shrink-0 " style="width: 120px;">
        <img class="w-32 h-40 p-2 opacity-40 object-cover " src="/{{ $value->DuongDan }}">
    </li>
    @endif
    @endforeach
    <li class="cursor-pointer flex-shrink-0 " style="width: 120px;">
        <div class="w-32 h-40 p-2">
            <div class="w-full dark:bg-dark-third bg-gray-100 h-36 py-8">
                <div class=" dark:bg-dark-main bg-gray-300 w-10 h-10 rounded-full mx-auto text-center cursor-pointer pt-1">
                    <i class='bx bx-plus text-2xl dark:text-white'></i>
                </div>
                <p class="text-center font-bold dark:text-white py-3">
                    Tạo tin
                </p>
            </div>
        </div>
    </li>
</ul>
<hr class="my-6 dark:bg-dark-second">
<div class="w-full my-2">
    <p class="font-bold dark:text-white">
        <i class="fas fa-eye"></i>&nbsp;&nbsp;
        <span>8 người xem</span>
    </p>
    <ul class="w-full py-2">
        <li class="cursor-pointer w-full flex py-2 hover:bg-gray-300
                                dark:hover:bg-dark-third pl-3">
            <div class="pr-2 pt-1">
                <div class="w-10 h-10 rounded-full">
                    <img src="/img/avatar.jpg" class="w-10 h-10 object-cover
                                            rounded-full" alt="">
                </div>
            </div>
            <div class="dark:text-white pb-1">
                <p class="dark:text-white font-bold">
                    <a href="">Trà Hưởng</a>
                </p>
                <p class="dark:text-white font-bold text-sm">
                    Đang hoạt động
                </p>
            </div>
        </li>
    </ul>
</div>