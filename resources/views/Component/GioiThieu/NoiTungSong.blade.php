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
            Nơi từng sống</p>
        <div class="w-full" id="">
            @include('Component/GioiThieu/Xoa/XoaNoiOHienTai')
            @include('Component/GioiThieu/Them/ThemNoiOHienTai')
            <li class="w-full pb-4 flex" style="font-size: 16px;">
                <ul class="w-full">
                    @if (count($json->NoiTungSong->NoiOHienTai) == 0)
                    @else
                    <li class="w-full py-2 flex relative" style="font-size: 16px;">
                        <div class="w-10/12 pb-2 flex">
                            <div class="mr-2 pt-0.5">
                                <img src="/{{ $json->NoiTungSong->NoiOHienTai[0]->DuongDanImg }}" class="w-12 h-12 object-cover 
                            rounded-full" alt="">
                            </div>
                            <div class="">
                                <p class="dark:text-gray-300 text-xm text-gray-600 pb-2">
                                    {{ $json->NoiTungSong->NoiOHienTai[0]->TenDiaChi }}
                                </p>
                                <p class="text-sm dark:text-gray-300 text-gray-600" style="font-size:12px;">
                                    Tỉnh / Thành phố hiện tại
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
                    @endif
                    @if (count($json->NoiTungSong->QueQuan) == 0)
                    @else
                    <li class="w-full py-2 flex relative" style="font-size: 16px;">
                        <div class="w-10/12 pb-2 flex">
                            <div class="mr-2 pt-0.5">
                                <img src="/{{ $json->NoiTungSong->QueQuan[0]->DuongDanImg }}" class="w-12 h-12 object-cover 
                            rounded-full" alt="">
                            </div>
                            <div class="">
                                <p class="dark:text-gray-300 text-xm text-gray-600 pb-2">
                                    {{ $json->NoiTungSong->QueQuan[0]->TenDiaChi }}
                                </p>
                                <p class="text-sm dark:text-gray-300 text-gray-600" style="font-size:12px;">
                                    Quê quán
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
                    @endif
                </ul>
            </li>
        </div>
    </ul>
</div>