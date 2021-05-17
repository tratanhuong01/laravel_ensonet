<?php

use App\Admin\Category;

$category = Category::category();

?>
<div class="w-full p-2 relative">
    <div onclick="openFilterOrSort(0)" class="w-60 p-3 mr-5 font-bold flex bg-white 
    cursor-pointer relative ml-3.5">
        <p class="items-center" id="contentView">Chọn</p>
        <i class="fas fa-caret-down absolute right-3 top-4"></i>
        <div class="w-60 bg-white border-2 border-solid border-gray-200 h-80 max-h-80 overflow-y-auto
        p-1 font-bold absolute top-full left-0 shadow-lg hidden filterOrSort z-50 
        " id="modalCategorySelect">
            @foreach ($category as $key => $item)
            <div onclick="onClickChangeCategory('{{ $key }}','{{ $item->Name }}')" class="p-2 w-full hover:bg-gray-200">
                {{$item->Name}}
            </div>
            @endforeach

        </div>
    </div>
    <div class="w-full" id="categoryLoad">
        @include('Admin.Component.DetailCategory.Address')
    </div>
</div>