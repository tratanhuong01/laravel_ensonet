<?php

use App\Models\StringUtil;
use App\Models\Functions;
use Illuminate\Support\Facades\Session;
use App\Models\Process;
use App\Models\Taikhoan;
use App\Process\DataProcess;

$u = Session::get('user');

$per = Taikhoan::where('taikhoan.IDTaiKhoan', '=', $item[0]->ChiaSe)->get();

?>
@if (count($per) > 0)
<div onclick="" id="{{ $item[0]->IDTaiKhoan.$item[0]->IDBaiDang }}Main" class="w-full bg-white dark:bg-dark-second my-4 py-4 px-2 rounded-lg">
    <div class="w-full flex">
        <div class="mr-2">
            <div class="w-14 h-14 relative">
                <a href="profile.{{ $per[0]->IDTaiKhoan }}"><img class="w-12 h-12 
                rounded-full object-cover border-4 border-solid border-gray-200" src="{{ $per[0]->AnhDaiDien }}"></a>
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
            <div class="flex">
                <div class="mr-3">
                    <a href="profile.{{ $item[0]->IDTaiKhoan }}">
                        <b class="dark:text-white">{{ $per[0]->Ho . ' ' . $per[0]->Ten }}</b>
                    </a>
                </div>
                <div class="mx-1.5 flex ">
                    <i class="fas fa-caret-right items-center text-xl dark:text-white"></i>
                </div>
                <div class="ml-3">
                    <a href="profile.{{ $item[0]->IDTaiKhoan }}">
                        <b class="dark:text-white">{{ $item[0]->Ho . ' ' . $item[0]->Ten }}</b>
                    </a>
                </div>

            </div>
            <div class="w-full flex">
                <div class="text-xs pt-0.5 pr-2">
                    <ul class="flex">
                        <li class="pt-1">
                            <a href="" class="dark:text-gray-300 font-bold">
                                {{ StringUtil::CheckDateTime($item[0]->NgayDang) }}</a>
                        </li>
                        @if ($u[0]->IDTaiKhoan == $item[0]->IDTaiKhoan)
                        <li onclick="changeObjectPrivacyPost('{{ $item[0]->IDBaiDang }}')" class="pl-3 pt-0.5" id="{{ $item[0]->IDBaiDang }}QRT">
                            @include('Component\Post\PrivacyPost',['idQuyenRiengTu' => $item[0]->IDQuyenRiengTu])
                        </li>
                        @else
                        <li class="pl-3 pt-0.5" id="{{ $item[0]->IDBaiDang }}QRT">
                            @include('Component\Post\PrivacyPost',['idQuyenRiengTu' => $item[0]->IDQuyenRiengTu])
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="relative text-center" style="width: 10%;">
            @if ($item[0]->IDTaiKhoan != $u[0]->IDTaiKhoan)
            <!-- <i class="cursor-pointer fas fa-ellipsis-h pt-2 text-xl dark:text-gray-300"></i> -->
            @else
            <i onclick="openEditPost('{{ $item[0]->IDTaiKhoan.$item[0]->IDBaiDang }}')" class="cursor-pointer fas fa-ellipsis-h pt-2 text-xl dark:text-gray-300"></i>
            <div class="w-72 z-40 dark:bg-dark-second bg-gray-100 border-2 absolute top-10 right-4 
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
    <div class="w-full mx-0 my-4">
        <ul class="w-full flex flex-wrap relative">
            @for ($i = 0 ; $i < sizeof($item) ; $i++) @if ($item[$i]->DuongDan == NULL)
                @elseif (sizeof($item) == 1 && $item[$i]->DuongDan != NULL)
                <li class="w-full">
                    <a href="photo/{{ $item[0]->IDBaiDang }}/{{ $item[$i]->IDHinhAnh }}">
                        <img class="w-full p-1 object-cover" style="max-height:650px;" src="{{ $item[$i]->DuongDan }}" alt=""></a>
                </li>
                @else
                @if (sizeof($item) > 4 && $i == 3)
                <li class="relative"><a href="photo/{{ $item[0]->IDBaiDang }}/{{ $item[$i]->IDHinhAnh }}"><img class="p-1 object-cover rounded-lg" style="width:278px;height:285px;" src="{{ $item[$i]->DuongDan }}" alt=""></a></li>
                <a href="photo/{{ $item[0]->IDBaiDang }}/{{ $item[$i]->IDHinhAnh }}">
                    <div class="rounded-lg absolute bottom-1 left-1/2" style="width:273px;height:280px;background:rgba(0, 0, 0, 0.5);">
                        <span class="text-5xl font-bold absolute top-1/2 left-1/2 text-white" style="transform:translate(-50%,-50%);">{{ '+'. (sizeof($item) - 4) }}</span>
                    </div>
                </a>
                @break;
                @else
                <li class=""><a href="photo/{{ $item[0]->IDBaiDang }}/{{ $item[$i]->IDHinhAnh }}"><img class="p-1 object-cover rounded-lg" style="width:278px;height:285px;" src="{{ $item[$i]->DuongDan }}" alt=""></a></li>
                @endif
                @endif
                @endfor
        </ul>
    </div>
    @include('Component\Post\FeelPost',[
    'item' => $item
    ])
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
@endif