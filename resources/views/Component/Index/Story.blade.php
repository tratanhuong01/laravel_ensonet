<?php

use App\Process\DataProcessThird;

$allStory = array_slice($allStory, 0, 4);

?>
<div class="flex my-4 relative" id="fourStoryDemo">
    <?php $pathSS = 'stories/create' ?>
    <div onclick="window.location.href = '{{ url($pathSS) }}'" class=" flex-shrink-0 w-1/4 md:w-1/5 p-2 pl-0 relative text-center h-44 cursor-pointer">
        <div class="w-full">
            <img class="w-full rounded-t-lg object-cover" style="height: 125px;" src="{{ $user[0]->AnhDaiDien }}" alt="">
        </div>
        <div class="w-full rounded-b-lg bg-gray-100 dark:bg-dark-second" style="height:50px;">
            <div class="w-11 h-11 rounded-full border-4 border-solid 
            border-white dark:border-dark-second absolute dark:bg-dark-second 
            bottom-0 pt-1" style="background-color: #3A80DC;transform:translate(-50%,-50%);left:46%;">
                <i class="fas fa-plus pt-1.5 text-white"></i>
            </div>
            <p class="text-center text-sm font-bold pt-6 pb-0 dark:text-white">Tạo Tin</p>
        </div>
    </div>
    @if (count($allStory) == 0)

    @else
    @foreach($allStory as $key => $value)
    @if (count($value) == 0)

    @else
    @php
    $pathStorys = 'stories/'.$value[0]->IDTaiKhoan
    @endphp
    <div onclick="window.location.href = '{{ url($pathStorys) }}'" class="w-1/4 md:w-1/5 p-1.5">
        <div class="h-44 rounded-xl overflow-hidden relative cursor-pointer flex-shrink-0 
        bg-black">
            <div class="relative h-full group cursor-pointer">
                <img class="group-hover:transform group-hover:scale-110 transition-all duration-700 h-full w-full object-cover " src="{{ $value[0]->DuongDan }}" alt="">
            </div>
            <div class="w-full absolute text-left pl-1.5 break-all" style="bottom: 8px;">
                <a href=""><b class="text-white text-sm">{{ $value[0]->Ho . ' ' . $value[0]->Ten }}</b></a>
            </div>
            <div class="w-full text-left absolute top-2 left-1">
                <img class="w-10 h-10 rounded-full object-cover border-4 border-solid 
            {{ DataProcessThird::checkIsViewStoryOfUser(
            $value[0]->IDTaiKhoan
            ,$user[0]->IDTaiKhoan ) == 0 ? 'border-white' : 'border-blue-500' }} " src="{{ $value[0]->AnhDaiDien }}" alt="">
            </div>
        </div>
    </div>
    @endif
    @endforeach
    @endif
    @include('Component/Index/ViewAllStory')
</div>

<script>
    $('#viewAllStoryButton').css('right', ((6 - $('#fourStoryDemo').children().length) * 118) - 18 + "px")
</script>