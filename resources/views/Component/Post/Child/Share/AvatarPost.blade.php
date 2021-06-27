<?php

use App\Models\StringUtil;
use App\Process\DataProcess;

?>
@if (count($item) == 0)
<div class="w-full mx-0 my-4">
    <div class="w-11/12  p-4 mb-4 ml-4 bg-white dark:bg-dark-second" style="border: 1px solid #ccc;">
        @include('Component.Post.Child.PostDeleted')
    </div>
</div>
@else
<div class="w-full mx-0 my-4">
    @include('Component.Post.Child.AvatarImage',['item'=>$item])
</div>
<div class="w-full mx-0 my-4">
    <div class="w-11/12  p-4 mb-4 ml-4 bg-white dark:bg-dark-second" style="border: 1px solid #ccc;">
        <div class="w-full flex">
            <div class="mr-2">
                <div class="w-14 h-14 relative">
                    <a href="profile.{{ $item[0]->IDTaiKhoan }}"><img class="w-12 h-12 
                rounded-full object-cover border-4 border-solid border-gray-200" src="{{ $item[0]->AnhDaiDien }}"></a>
                    @include('Component\Child\Activity',
                    [
                    'padding' => 'p-1.5',
                    'bottom' => 'bottom-2',
                    'right' => 'right-1.5',
                    'IDTaiKhoan' => $item[0]->IDTaiKhoan
                    ])
                </div>
            </div>
            <div class="relative pl-1 w-4/5">
                <p class="dark:text-gray-300"><a href="profile.{{ $item[0]->IDTaiKhoan }}"><b class="dark:text-white">
                            {{ $item[0]->Ho . ' ' . $item[0]->Ten }}
                    </a>
                    <?php $tag = array();
                    $feelCur[$item[0]->IDCamXuc] = $item[0]->IDCamXuc;
                    $tags = explode('&', $item[0]->GanThe);
                    ?>
                    @if (count($tags) == 0)
                    @else
                    <?php $tags = explode('&', $item[0]->GanThe) ?>
                    @foreach($tags as $key => $value)
                    <?php $tag[$value] = $value ?>
                    @endforeach
                    <?php unset($tag['']); ?>
                    <span class="font-bold dark:text-white">
                        @if($item[0]->IDCamXuc != NULL)
                        {{ DataProcess::getFeel($feelCur) }}
                        @else
                        @endif
                    </span>
                    <span class="font-bold dark:text-white">{{ DataProcess::getFriendTags($tag,$item[0]->IDBaiDang) }}
                    </span>
                    @endif
                </p>
                <div class="w-full flex">
                    <div class="text-xs pt-0.5 pr-2">
                        <ul class="flex">
                            <li class="pt-1">
                                <a href="" class="dark:text-gray-300 font-bold">
                                    {{ StringUtil::CheckDateTime($item[0]->NgayDang) }}</a>
                            </li>
                            <li class="pl-3 pt-0.5" id="{{ $item[0]->IDBaiDang }}QRT">
                                @include('Component\Post\PrivacyPost',['idQuyenRiengTu' => $item[0]->IDQuyenRiengTu])
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="relative text-center" style="width: 10%;">
                <i class="cursor-pointer fas fa-ellipsis-h pt-2 text-xl dark:text-gray-300"></i>
            </div>
        </div>
        <div class="w-full py-1.5 dark:text-white">
            {{ $item[0]->NoiDung }}
        </div>
    </div>
</div>
@endif