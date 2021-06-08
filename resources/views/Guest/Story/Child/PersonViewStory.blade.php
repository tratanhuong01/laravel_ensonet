<?php

use App\Process\DataProcessThird;

?>
<p class="dark:text-white py-4">Chi tiết về tin</p>
<ul class="flex whitespace-nowrap overflow-x-hidden" id="storyView" style="max-width: 368px;">
    @foreach($allStory[0] as $key => $value)
    @if ($key == 0)
    <li onclick="changeStoryImage(this,0)" id="{{$value->IDStory}}" class="mr-2 cursor-pointer flex-shrink-0 showLi " style="width: 120px;">
        <img class="w-32 h-40 object-cover showImg" src="{{ $value->DuongDan }}">
    </li>
    @else
    <li id="{{$value->IDStory}}" onclick="changeStoryImage(this,1)" class="cursor-pointer 
    flex-shrink-0 mx-2" style="width: 120px;">
        <img class="w-32 h-40  opacity-40 object-cover " src="{{ $value->DuongDan }}">
    </li>
    @endif
    @endforeach
    <li onclick="window.location.href='{{ url('stories/create') }}'" class="cursor-pointer flex-shrink-0 " style="width: 120px;">
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
<div class="w-full my-2 wrapper-scrollbar overflow-y-auto" style="max-height: 460px;" id="viewStoryDetailFull">

</div>