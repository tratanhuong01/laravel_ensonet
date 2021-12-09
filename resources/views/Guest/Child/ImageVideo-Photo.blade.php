<div class="w-full flex">
    <hr>
    <br>
    <div class="mr-2">
        <a href="">
            <img class="w-12 h-12 object-cover rounded-full 
                                border-4 border-solid border-gray-200" src="{{ $data[0]->AnhDaiDien }}"></a>
    </div>
    <div class="relative pl-1 w-3/4">
        <div class="dark:text-gray-300 text-left"><a href=""><b class="dark:text-white">
                    {{ $data[0]->Ho . ' ' . $data[0]->Ten }}</b>
                &nbsp;</a></div>
        <div class="w-full flex">
            <div class="text-xs pt-0.5 pr-2">
                <ul class="flex">
                    <li class="pt-1">
                        <a href="" class="dark:text-gray-300 font-bold">
                            {{ StringUtil::CheckDateTime($data[0]->NgayDang) }}</a></a>
                    </li>
                    <li class="pl-3 pt-0.5" id="{{ $data[0]->IDBaiDang }}QRT">
                        @include('Component.Post.PrivacyPost',['idQuyenRiengTu' => $data[0]->IDQuyenRiengTu])
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="relative text-center pr-4" style="width: 10%;">
        <i class="cursor-pointer fas fa-ellipsis-h pt-2 text-xl dark:text-gray-300"></i>
    </div>
</div>
@include('Component.Child.FeelComment',['item' => $data])