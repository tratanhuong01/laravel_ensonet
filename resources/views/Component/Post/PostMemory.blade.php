<?php

use App\Models\StringUtil;
use App\Process\DataProcess;

date_default_timezone_set('Asia/Ho_Chi_Minh');
$datetime = date("Y-m-d H:i:s");
$year = explode('-', explode(' ', $datetime)[0])[0] -
    explode('-', explode(' ', $item[0]->NgayDang)[0])[0]
?>
<div class="w-full my-3 bg-white dark:bg-dark-second rounded-lg p-2">
    <div class="w-full p-2">
        <p class="text-sm py-0.5 font-bold text-gray-900 dark:text-white">
            VÀO NGÀY NÀY
        </p>
        <p class="text-xl font-bold dark:text-white">{{ $year }} năm trước</p>
    </div>
    <div onclick="" id="{{ $item[0]->IDTaiKhoan.$item[0]->IDBaiDang }}Main" class="w-full pt-2">
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
                <p class="dark:text-gray-300"><a href="profile.{{ $item[0]->IDTaiKhoan }}">
                        <b class="dark:text-white">
                            {{ $item[0]->Ho . ' ' . $item[0]->Ten }}</b>
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
                    <span class="font-bold dark:text-white">
                        {{ DataProcess::getFriendTags($tag,$item[0]->IDBaiDang) }}
                    </span>
                    @endif
                    <span class="font-bold dark:text-white">
                        @if ($item[0]->IDDiaChi != NULL)
                        {!! DataProcess::getLocal($item[0]->IDDiaChi) !!}
                        @endif
                    </span>
                </p>
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
                <link href="https://vjs.zencdn.net/7.11.4/video-js.css" rel="stylesheet" />
                <script src="https://vjs.zencdn.net/7.11.4/video.min.js"></script>
                @for ($i = 0 ; $i < sizeof($item) ; $i++) @if ($item[$i]->DuongDan == NULL)
                    @elseif (sizeof($item) == 1 && $item[$i]->DuongDan != NULL)
                    @if ($item[$i]->Loai == 0)
                    <li class="w-full">
                        <a href="photo/{{ $item[0]->IDBaiDang }}/{{ $item[$i]->IDHinhAnh }}">
                            <img class="w-full p-1 object-cover" style="max-height:350px;height: 350px;" src="{{ $item[$i]->DuongDan }}" alt=""></a>
                    </li>
                    @else
                    <li class="w-full relative" id="{{$item[0]->IDBaiDang.$item[0]->IDHinhAnh}}Video">
                        <video id="my-video" class="video-js" controls preload="auto" poster="/video/review.mp4" data-setup="{}" style="width: 100%;max-height:350px;height: 350px;">
                            <source src="{{ $item[$i]->DuongDan }}" type="video/mp4" />
                        </video>
                    </li>
                    @endif
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
    </div>
    <div onclick="SharePostMainSView('{{ $item[0]->IDBaiDang }}',5)" class="dark:text-gray-300 dark:bg-dark-third bg-gray-200
    text-center  font-bold w-full mx-2 py-2 mx-auto cursor-pointer">
        <i class="fas fa-share dark:text-gray-300"></i> &nbsp; Chia sẻ
    </div>
</div>