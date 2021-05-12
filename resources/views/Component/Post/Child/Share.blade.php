<?php

use App\Models\StringUtil;
use App\Process\DataProcess;

?>
@if (count($postShare) == 0)
<div class="w-full mx-0 my-4">
    <div class="w-11/12  p-4 mb-4 ml-4 bg-white dark:bg-dark-second" style="border: 1px solid #ccc;">
        @include('Component.Post.Child.PostDeleted')
    </div>
</div>
@else
<div class="w-full mx-0 my-4">
    @switch($postShare[0]->LoaiBaiDang)
    @case('0')
    @include('Component/Post/Child/AvatarImage',['item' => $postShare])
    @break
    @case('1')
    @include('Component/Post/Child/CoverImage',['item' => $postShare])
    @break
    @case('2')
    @include('Component/Post/Child/Normal',['item' => $postShare])
    @break
    @endswitch
</div>
<div class="w-full mx-0 my-4">
    <div class="w-11/12  p-4 mb-4 ml-4 bg-white dark:bg-dark-second" style="border: 1px solid #ccc;">
        <div class="w-full flex">
            <div class="mr-2">
                <div class="w-14 h-14 relative">
                    <a href="profile.{{ $postShare[0]->IDTaiKhoan }}"><img class="w-12 h-12 
                rounded-full object-cover border-4 border-solid border-gray-200" src="{{ $postShare[0]->AnhDaiDien }}"></a>
                    @include('Component\Child\Activity',
                    [
                    'padding' => 'p-1.5',
                    'bottom' => 'bottom-2',
                    'right' => 'right-1.5',
                    'IDTaiKhoan' => $postShare[0]->IDTaiKhoan
                    ])
                </div>
            </div>
            <div class="relative pl-1 w-4/5">
                <p class="dark:text-gray-300"><a href="profile.{{ $postShare[0]->IDTaiKhoan }}"><b class="dark:text-white">
                            {{ $postShare[0]->Ho . ' ' . $postShare[0]->Ten }}
                    </a>
                    <?php $tag = array();
                    $feelCur[$postShare[0]->IDCamXuc] = $postShare[0]->IDCamXuc;
                    $tags = explode('&', $postShare[0]->GanThe);
                    ?>
                    @if (count($tags) == 0)
                    @else
                    <?php $tags = explode('&', $postShare[0]->GanThe) ?>
                    @foreach($tags as $key => $value)
                    <?php $tag[$value] = $value ?>
                    @endforeach
                    <?php unset($tag['']); ?>
                    <span class="font-bold dark:text-white">
                        @if($postShare[0]->IDCamXuc != NULL)
                        {{ DataProcess::getFeel($feelCur) }}
                        @else
                        @endif
                    </span>
                    <span class="font-bold dark:text-white">{{ DataProcess::getFriendTags($tag,$postShare[0]->IDBaiDang) }}
                    </span>
                    @endif
                </p>
                <div class="w-full flex">
                    <div class="text-xs pt-0.5 pr-2">
                        <ul class="flex">
                            <li class="pt-1">
                                <a href="" class="dark:text-gray-300 font-bold">
                                    {{ StringUtil::CheckDateTime($postShare[0]->NgayDang) }}</a>
                            </li>
                            <li class="pl-3 pt-0.5" id="{{ $postShare[0]->IDBaiDang }}QRT">
                                @include('Component\Post\PrivacyPost',['idQuyenRiengTu' => $postShare[0]->IDQuyenRiengTu])
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
            {{ $postShare[0]->NoiDung }}
        </div>
    </div>
</div>
@endif