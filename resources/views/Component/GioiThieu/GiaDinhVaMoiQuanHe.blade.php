<?php

use App\Models\Gioithieu;
use App\Process\DataProcessFour;

$json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', '1000000001')->get()[0]->JsonGioiThieu;
$json = json_decode($json);

?>
<form action="" method="post" id="formTongQuan">
    <input type="hidden" id="IDTaiKhoanU" name="IDTaiKhoan" value="{{ $idTaiKhoan }}">
    <input type="hidden" name="IDQuyenRiengTu" value="CONGKHAI">
</form>
<div class="w-full">
    <ul class="w-full py-2 px-4 mainAboutFull">
        <p class="font-bold text-xm pt-2 pb-3 dark:text-white" style="font-family: system-ui;">
            Mối quan hệ</p>
        <div class="w-full relative hidden">
            <div id="" class="w-full my-2 cursor-pointer border-2 border-solid border-gray-200 p-2.5
            dark:bg-dark-third flex font-bold dark:border-dark-main shadow-lg dark:text-white  rounded-lg">
                <div class="w-1/2">
                    Độc thân
                </div>
                <div class="w-1/2 text-right ml-3">
                    <i class="fas fa-caret-down"></i>
                </div>
            </div>
            <div class="absolute top-12 hidden z-30 w-80 h-48 bg-gray-200 dark:bg-dark-second overflow-y-auto border-gray-300 rounded-lg
             wrapper-content-right border-2 border-solid dark:border-dark-third shadow-lg" style="max-height: 176px;">
                <div class="w-full p-2 hover:bg-gray-300 dark:hover:bg-dark-third cursor-pointer 
                dark:text-white flex rounded-lg  font-bold">
                    <div class="w-1/2">
                        Độc thân
                    </div>
                    <div class="w-1/2">

                    </div>
                </div>
                <div class="w-full p-2 hover:bg-gray-300 dark:hover:bg-dark-third  cursor-pointer 
                dark:text-white flex rounded-lg  font-bold">
                    <div class="w-1/2">
                        Đã đính hôn
                    </div>
                    <div class="w-1/2">

                    </div>
                </div>
                <div class="w-full p-2 hover:bg-gray-300 dark:hover:bg-dark-third  cursor-pointer 
                dark:text-white flex rounded-lg  font-bold">
                    <div class="w-1/2">
                        Đã kết hôn
                    </div>
                    <div class="w-1/2">

                    </div>
                </div>
                <div class="w-full p-2 hover:bg-gray-300 dark:hover:bg-dark-third cursor-pointer 
                dark:text-white flex rounded-lg  font-bold">
                    <div class="w-1/2">
                        Độc thân
                    </div>
                    <div class="w-1/2">

                    </div>
                </div>
                <div class="w-full p-2 hover:bg-gray-300 dark:hover:bg-dark-third  cursor-pointer 
                dark:text-white flex rounded-lg  font-bold">
                    <div class="w-1/2">
                        Đã đính hôn
                    </div>
                    <div class="w-1/2">

                    </div>
                </div>
                <div class="w-full p-2 hover:bg-gray-300 dark:hover:bg-dark-third  cursor-pointer 
                dark:text-white flex rounded-lg  font-bold">
                    <div class="w-1/2">
                        Đã kết hôn
                    </div>
                    <div class="w-1/2">

                    </div>
                </div>
            </div>
            <div class="w-full flex relative h-16 mt-3">
                <div class="bg-gray-200  dark:bg-dark-third dark:text-white  rounded-lg p-2 absolute left-0 font-bold">
                    <i class="fas fa-globe-europe"></i>&nbsp;&nbsp;Công khai
                </div>
                <div class="bg-1877F2 text-white rounded-lg p-2 absolute right-0 font-bold">
                    Lưu
                </div>
                <div class="bg-gray-200  dark:bg-dark-third dark:text-white  rounded-lg p-2 absolute right-12 font-bold">
                    Hủy
                </div>
            </div>
        </div>

        <li class="w-full pb-2 pt-2 flex" style="font-size: 16px;">
            <div class="w-10/12 text-gray-600  dark:text-white ">
                &nbsp;<i class="fas fa-heart text-gray-600  dark:text-white   text-2xl"></i>
                &nbsp;&nbsp;&nbsp;Độc Thân
            </div>
            <div class="w-2/12">
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
        <p class="font-bold text-xm py-2 dark:text-white" style="font-family: system-ui;">
            Thành viên trong gia đình</p>
        @include('Component/GioiThieu/Them/ThemThanhVienGiaDinh')
        @if (sizeof($json->GiaDinhVaCacMoiQuanHe->ThanhVienGiaDinh) > 0)
        @include('Component/GioiThieu/Xoa/XoaThanhVienGiaDinh')
        @include('Component/GioiThieu/Them/ThemThanhVienGiaDinh')
        @else
        @include('Component/GioiThieu/Xoa/XoaThanhVienGiaDinh')
        @include('Component/GioiThieu/Them/ThemThanhVienGiaDinh')
        <li class="w-full pb-4 flex" style="font-size: 16px;">
            <ul class="w-full">
                @foreach($json->GiaDinhVaCacMoiQuanHe->ThanhVienGiaDinh as $key => $value)
                <li class="w-full py-2 flex relative" style="font-size: 16px;">
                    <div class="w-10/12 pb-2 flex">
                        <div class="mr-2">
                            <img src="/img/avatar.jpg" class="w-12 h-12 object-cover 
                            rounded-full" alt="">
                        </div>
                        <div class="">
                            <p class="dark:text-gray-300 text-xm text-gray-600 pb-2">Trà Tấn Hưởng</p>
                            <p class="text-sm dark:text-gray-300 text-gray-600" style="font-size:12px;">Anh Trai</p>
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
    </ul>
</div>