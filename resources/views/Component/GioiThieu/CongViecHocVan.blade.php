<?php

use App\Models\Gioithieu;
use App\Process\DataProcessFour;
use Illuminate\Support\Facades\Session;

$user = Session::get('user');
$json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', '1000000001')->get()[0]->JsonGioiThieu;
$json = json_decode($json);
?>
<div class="w-full">
    <ul class="w-full py-2 px-4">
        <p class="font-bold text-xm py-2 dark:text-white" style="font-family: system-ui;">
            Công Việc</p>
        <div class="w-full " id="placeWorkMain">
            @if (count($json->CongViecHocVan->CongViec) == 0)
            @include('Component/GioiThieu/Xoa/XoaNoiLamViec')
            @include('Component/GioiThieu/Them/ThemNoiLamViec')
            @else
            @include('Component/GioiThieu/Xoa/XoaNoiLamViec')
            @include('Component/GioiThieu/Them/ThemNoiLamViec')
            <li class="w-full pb-4 flex" style="font-size: 16px;">
                <ul class="w-full">
                    @foreach($json->CongViecHocVan->CongViec as $key => $value)
                    <li class="w-full py-2 flex relative" style="font-size: 16px;">
                        <div class="w-10/12 pb-2 flex">
                            <div class="mr-2 pt-0.5">
                                <img src="/{{ $value->DuongDanImg }}" class="w-12 h-12 object-cover 
                            rounded-full" alt="">
                            </div>
                            <div class="">
                                <p class="dark:text-gray-300 text-xm text-gray-600 pb-2">
                                    @if ($value->NamKetThuc == NULL)
                                    {{ 'Làm việc tại ' }}
                                    @else
                                    {{ 'Từng làm việc tại ' }}
                                    @endif
                                    {{ $value->TenCongTy }}
                                </p>
                                <p class="text-sm dark:text-gray-300 text-gray-600" style="font-size:12px;">
                                    {{ $value->NamBatDau }} - {{ $value->NamKetThuc == NULL ? ' Hiện tại ' : $value->NamKetThuc }}
                                    ·
                                    {{ $value->TenDiaChi }}
                                </p>
                            </div>
                        </div>
                        <div class="w-2/12 py-2.5">
                            <ul class="w-full flex">
                                <li class="p-2  dark:text-white  text-gray-600">
                                    <i class="fas fa-globe-europe text-xl cursor-pointer"></i>
                                </li>
                                <li class="p-2  dark:text-white  text-gray-600">
                                    <i class="far fa-edit text-xl cursor-pointer"></i>
                                </li>
                                <li class="p-2  dark:text-white  text-gray-600">
                                    <i class="far fa-trash-alt text-xl cursor-pointer"></i>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </li>
            @endif
        </div>
        <!--  -->
        <p class="font-bold text-xm py-2 dark:text-white" style="font-family: system-ui;">
            Đại học</p>
        <div class="w-full " id="">
            <?php $daiHoc = DataProcessFour::getTypeSchoolByType('Đại Học', '1000000001') ?>
            @if (count($daiHoc) == 0)
            @include('Component/GioiThieu/Xoa/XoaTruongHoc')
            @include('Component/GioiThieu/Them/ThemTruongHoc')
            @else
            @include('Component/GioiThieu/Xoa/XoaTruongHoc')
            @include('Component/GioiThieu/Them/ThemTruongHoc')
            <li class="w-full pb-4 flex" style="font-size: 16px;">
                <ul class="w-full">
                    @foreach($daiHoc as $key => $value)
                    <li class="w-full py-2 flex relative" style="font-size: 16px;">
                        <div class="w-10/12 pb-2 flex">
                            <div class="mr-2 pt-0.5">
                                <img src="/{{ $value->DuongDanImg }}" class="w-12 h-12 object-cover 
                            rounded-full" alt="">
                            </div>
                            <div class="">
                                <p class="dark:text-gray-300 text-xm text-gray-600 pb-2">
                                    @if ($value->NamKetThuc == NULL)
                                    {{ 'Học tại ' }}
                                    @else
                                    {{ 'Đã tốt nghiệp tại' }}
                                    @endif
                                    {{ $value->TenTruongHoc }}
                                </p>
                                <p class="text-sm dark:text-gray-300 text-gray-600" style="font-size:12px;">
                                    {{ $value->NamBatDau }} - {{ $value->NamKetThuc == NULL ? ' Hiện tại ' : $value->NamKetThuc }}
                                </p>
                            </div>
                        </div>
                        <div class="w-2/12 py-2.5">
                            <ul class="w-full flex">
                                <li class="p-2  dark:text-white  text-gray-600">
                                    <i class="fas fa-globe-europe text-xl cursor-pointer"></i>
                                </li>
                                <li class="p-2  dark:text-white  text-gray-600">
                                    <i class="far fa-edit text-xl cursor-pointer"></i>
                                </li>
                                <li class="p-2  dark:text-white  text-gray-600">
                                    <i class="far fa-trash-alt text-xl cursor-pointer"></i>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </li>
            @endif
        </div>

        <!-- a -->
        <p class="font-bold text-xm py-2 dark:text-white" style="font-family: system-ui;">
            Cao đẳng</p>
        <div class="w-full " id="">
            <?php $caoDang = DataProcessFour::getTypeSchoolByType('Cao Đẳng', '1000000001') ?>
            @if (count($caoDang) == 0)
            @include('Component/GioiThieu/Xoa/XoaTruongHoc')
            @include('Component/GioiThieu/Them/ThemTruongHoc')
            @else
            @include('Component/GioiThieu/Xoa/XoaTruongHoc')
            @include('Component/GioiThieu/Them/ThemTruongHoc')
            <li class="w-full pb-4 flex" style="font-size: 16px;">
                <ul class="w-full">
                    @foreach($caoDang as $key => $value)
                    <li class="w-full py-2 flex relative" style="font-size: 16px;">
                        <div class="w-10/12 pb-2 flex">
                            <div class="mr-2 pt-0.5">
                                <img src="/{{ $value->DuongDanImg }}" class="w-12 h-12 object-cover 
                            rounded-full" alt="">
                            </div>
                            <div class="">
                                <p class="dark:text-gray-300 text-xm text-gray-600 pb-2">
                                    @if ($value->NamKetThuc == NULL)
                                    {{ 'Học tại ' }}
                                    @else
                                    {{ 'Đã tốt nghiệp tại' }}
                                    @endif
                                    {{ $value->TenTruongHoc }}
                                </p>
                                <p class="text-sm dark:text-gray-300 text-gray-600" style="font-size:12px;">
                                    {{ $value->NamBatDau }} - {{ $value->NamKetThuc == NULL ? ' Hiện tại ' : $value->NamKetThuc }}
                                </p>
                            </div>
                        </div>
                        <div class="w-2/12 py-2.5">
                            <ul class="w-full flex">
                                <li class="p-2  dark:text-white  text-gray-600">
                                    <i class="fas fa-globe-europe text-xl cursor-pointer"></i>
                                </li>
                                <li class="p-2  dark:text-white  text-gray-600">
                                    <i class="far fa-edit text-xl cursor-pointer"></i>
                                </li>
                                <li class="p-2  dark:text-white  text-gray-600">
                                    <i class="far fa-trash-alt text-xl cursor-pointer"></i>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </li>
            @endif
        </div>
        <!-- a -->
        <p class="font-bold text-xm py-2 dark:text-white" style="font-family: system-ui;">
            Trung Học Phổ Thông</p>
        <div class="w-full " id="">
            <?php $thpt = DataProcessFour::getTypeSchoolByType('Trung Học Phổ Thông', '1000000001') ?>
            @if (count($thpt) == 0)
            @include('Component/GioiThieu/Xoa/XoaTruongHoc')
            @include('Component/GioiThieu/Them/ThemTruongHoc')
            @else
            @include('Component/GioiThieu/Xoa/XoaTruongHoc')
            @include('Component/GioiThieu/Them/ThemTruongHoc')
            <li class="w-full pb-4 flex" style="font-size: 16px;">
                <ul class="w-full">
                    @foreach($thpt as $key => $value)
                    <li class="w-full py-2 flex relative" style="font-size: 16px;">
                        <div class="w-10/12 pb-2 flex">
                            <div class="mr-2 pt-0.5">
                                <img src="/{{ $value->DuongDanImg }}" class="w-12 h-12 object-cover 
                            rounded-full" alt="">
                            </div>
                            <div class="">
                                <p class="dark:text-gray-300 text-xm text-gray-600 pb-2">
                                    @if ($value->NamKetThuc == NULL)
                                    {{ 'Học tại ' }}
                                    @else
                                    {{ 'Đã tốt nghiệp tại' }}
                                    @endif
                                    {{ $value->TenTruongHoc }}
                                </p>
                                <p class="text-sm dark:text-gray-300 text-gray-600" style="font-size:12px;">
                                    {{ $value->NamBatDau }} - {{ $value->NamKetThuc == NULL ? ' Hiện tại ' : $value->NamKetThuc }}
                                </p>
                            </div>
                        </div>
                        <div class="w-2/12 py-2.5">
                            <ul class="w-full flex">
                                <li class="p-2  dark:text-white  text-gray-600">
                                    <i class="fas fa-globe-europe text-xl cursor-pointer"></i>
                                </li>
                                <li class="p-2  dark:text-white  text-gray-600">
                                    <i class="far fa-edit text-xl cursor-pointer"></i>
                                </li>
                                <li class="p-2  dark:text-white  text-gray-600">
                                    <i class="far fa-trash-alt text-xl cursor-pointer"></i>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </li>
            @endif
        </div>
        <!-- a -->
        <p class="font-bold text-xm py-2 dark:text-white" style="font-family: system-ui;">
            Trung Học Cơ Sở</p>
        <div class="w-full " id="">
            <?php $thcs = DataProcessFour::getTypeSchoolByType('Trung Học Cơ Sở', '1000000001') ?>
            @if (count($thcs) == 0)
            @include('Component/GioiThieu/Xoa/XoaTruongHoc')
            @include('Component/GioiThieu/Them/ThemTruongHoc')
            @else
            @include('Component/GioiThieu/Xoa/XoaTruongHoc')
            @include('Component/GioiThieu/Them/ThemTruongHoc')
            <li class="w-full pb-4 flex" style="font-size: 16px;">
                <ul class="w-full">
                    @foreach($thcs as $key => $value)
                    <li class="w-full py-2 flex relative" style="font-size: 16px;">
                        <div class="w-10/12 pb-2 flex">
                            <div class="mr-2 pt-0.5">
                                <img src="/{{ $value->DuongDanImg }}" class="w-12 h-12 object-cover 
                            rounded-full" alt="">
                            </div>
                            <div class="">
                                <p class="dark:text-gray-300 text-xm text-gray-600 pb-2">
                                    @if ($value->NamKetThuc == NULL)
                                    {{ 'Học tại ' }}
                                    @else
                                    {{ 'Đã tốt nghiệp tại' }}
                                    @endif
                                    {{ $value->TenTruongHoc }}
                                </p>
                                <p class="text-sm dark:text-gray-300 text-gray-600" style="font-size:12px;">
                                    {{ $value->NamBatDau }} - {{ $value->NamKetThuc == NULL ? ' Hiện tại ' : $value->NamKetThuc }}
                                </p>
                            </div>
                        </div>
                        <div class="w-2/12 py-2.5">
                            <ul class="w-full flex">
                                <li class="p-2  dark:text-white  text-gray-600">
                                    <i class="fas fa-globe-europe text-xl cursor-pointer"></i>
                                </li>
                                <li class="p-2  dark:text-white  text-gray-600">
                                    <i class="far fa-edit text-xl cursor-pointer"></i>
                                </li>
                                <li class="p-2  dark:text-white  text-gray-600">
                                    <i class="far fa-trash-alt text-xl cursor-pointer"></i>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </li>
            @endif
        </div>
    </ul>
</div>