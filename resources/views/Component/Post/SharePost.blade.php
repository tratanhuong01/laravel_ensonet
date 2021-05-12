<?php

use App\Models\Baidang;
use App\Models\Process;
use App\Models\StringUtil;
use App\Process\DataProcess;
use Illuminate\Support\Facades\Session;

$u = Session::get('user');

$postShare = Baidang::where('baidang.IDbaiDang', '=', $item[0]->ChiaSe)
    ->join('taikhoan', 'baidang.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
    ->leftjoin('hinhanh', 'baidang.IDBaiDang', 'hinhanh.IDBaiDang')->get();
?>
<div onclick="" id="{{ $item[0]->IDTaiKhoan.$item[0]->IDBaiDang }}Main" class="w-full bg-white dark:bg-dark-second my-4 py-4 px-2 rounded-lg">
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
                        {{ $item[0]->Ho . ' ' . $item[0]->Ten }} &nbsp;đã chia sẽ bài viết</b>
                </a>

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
            @if ($item[0]->IDTaiKhoan != $u[0]->IDTaiKhoan)

            @else
            <i onclick="openEditPost('{{ $item[0]->IDTaiKhoan.$item[0]->IDBaiDang }}')" class="cursor-pointer fas fa-ellipsis-h pt-2 text-xl dark:text-gray-300"></i>
            <div class="w-72 z-50 dark:bg-dark-second bg-gray-100 border-2 absolute top-10 right-4 
            border-solid border-gray-300 dark:border-dark-third shadow-1 hidden " id="{{ $item[0]->IDTaiKhoan.$item[0]->IDBaiDang }}">
                <ul class="w-full">
                    <li onclick="editPost('{{ $item[0]->IDBaiDang }}')" class="dark:text-white font-bold px-4 py-2.5 border-b-2 border-solid border-gray-200 
                    dark:border-dark-third cursor-pointer text-left dark:hover:bg-dark-third hover:bg-gray-200">
                        <i class="fas fa-pen text-xl"></i>&nbsp;&nbsp;&nbsp;Chỉnh sửa bài viết
                    </li>
                    <li onclick="changeObjectPrivacyPost('{{ $item[0]->IDBaiDang }}')" class="dark:text-white font-bold px-4 py-2.5 border-b-2 border-solid border-gray-200 
                    dark:border-dark-third cursor-pointer text-left dark:hover:bg-dark-third hover:bg-gray-200">
                        <i class="fas fa-globe-europe text-xl"></i>&nbsp;&nbsp;&nbsp;Chỉnh sửa đối tượng
                    </li>
                    <li onclick="deleteWarnPost('{{ $item[0]->IDBaiDang }}',
                    '{{ $item[0]->IDTaiKhoan.$item[0]->IDBaiDang }}Main')" class="dark:text-white font-bold px-4 py-2.5 cursor-pointer text-left 
                    dark:hover:bg-dark-third  hover:bg-gray-200">
                        <i class="far fa-trash-alt text-xl"></i>&nbsp;&nbsp;&nbsp;&nbsp;Xóa
                    </li>
                </ul>
            </div>
            @endif
        </div>
    </div>
    <div class="w-full mx-0 my-2.5">
        <p class="dark:text-white">{!! $item[0]->NoiDung !!}</p>
    </div>

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
        @case('3')
        @include('Component/Post/Child/Share',['item' => $postShare])
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
                                <li class="pl-3 pt-0.5" id="{{ $item[0]->IDBaiDang }}QRT">
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
    @include('Component\Post\FeelPost',['item' => $item])
    <div class="w-full" id="{{ $item[0]->IDTaiKhoan.$item[0]->IDBaiDang }}CommentLv1">
        <?php $commentLimit = Process::getCommentLimitFromTo($item[0]->IDBaiDang, 0);
        $comment = Process::getCommentNew($item[0]->IDBaiDang); ?>
        @if (count($commentLimit) == 0)
        @else
        <div class=w-full>
            @for($i = 0;$i < count($commentLimit) ;$i++) </p>
                @include('Component\Comment\CommentLv1',[
                'comment'=> $commentLimit[$i],
                'item' => $item
                ])
                @endfor
        </div>
        @endif
    </div>
    @if (count($commentLimit) > 0)
    <div class="w-11/12 ml-2" id="{{ $item[0]->IDTaiKhoan.$item[0]->IDBaiDang }}NumComment">
        @include('Component\Comment\ViewMoreComment',
        ['num' => count($comment),
        'idTaiKhoan' => $item[0]->IDTaiKhoan,
        'idBaiDang' => $item[0]->IDBaiDang ,
        'count' => count($comment)
        ])
    </div>
    @else
    @endif
    @include('Component\Comment\WriteCommentLv1',['item' => $item])
</div>