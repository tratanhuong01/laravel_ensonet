<?php

use App\Models\Gioithieu;
use App\Process\DataProcessFour;
use Illuminate\Support\Facades\Session;

if (isset($jsons))
    $json = $jsons;
else
    $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $idTaiKhoan)->get();

?>
<form action="" method="post" id="formTongQuan">
</form>
<div class="w-full">
    <ul class="w-full py-2 px-4 mainAboutFull">
        <div class="w-full " id="placeWorkMain">
            @if (DataProcessFour::checkPlaceWork(json_decode($json[0]->JsonGioiThieu)) == 0)
            <p onclick="AddView('placeWork')" class="placeWork font-bold text-xm py-4 text-1877F2 cursor-pointer">
                <i class="fas fa-plus border-2 py-1.5 px-1.5 text-xm border-solid rounded-full" style="border-color: #1877F2;"></i>&nbsp;&nbsp;
                Thêm nơi làm việc
            </p>
            @include('Component/GioiThieu/Child/ThemNoiLamViec')
            @else
            @include('Component/GioiThieu/Data/NoiLamViec',['data' =>
            json_decode($json[0]->JsonGioiThieu)->CongViecHocVan->CongViec[0]])
            @endif
        </div>
        <div class="w-full " id="schoolMain">
            @if (DataProcessFour::checkSchool(json_decode($json[0]->JsonGioiThieu)) == 0)
            <p onclick="AddView('school')" class="school font-bold text-xm py-4 text-1877F2 cursor-pointer">
                <i class="fas fa-plus border-2 py-1.5 px-1.5 text-xm border-solid rounded-full" style="border-color: #1877F2;"></i>&nbsp;&nbsp;
                Thêm trường học
            </p>
            @include('Component/GioiThieu/Child/ThemTruongHoc')
            @else
            @include('Component/GioiThieu/Data/NoiLamViec',['data' =>
            json_decode($json[0]->JsonGioiThieu)->CongViecHocVan->HocVan[0]])
            @endif
        </div>
        <p onclick="AddView('PlaceLiveCurrent')" class="PlaceLiveCurrent font-bold text-xm py-4 text-1877F2 cursor-pointer">
            <i class="fas fa-plus border-2 py-1.5 px-1.5 text-xm border-solid rounded-full" style="border-color: #1877F2;"></i>&nbsp;&nbsp;
            Thêm nơi ở hiện tại
        </p>
        @include('Component/GioiThieu/Child/ThemNoiOHienTai')
        <li class="w-full pb-4 flex hidden" style="font-size: 16px;">
            <div class="w-10/12 text text-gray-600  dark:text-white ">
                <i class="fas fa-home text-2xl"></i>
                &nbsp;&nbsp;&nbsp;Sống tại <b>Đà Nẵng</b>
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
        <p onclick="AddView('HomeTown')" class="HomeTown font-bold text-xm py-4 text-1877F2 cursor-pointer">
            <i class="fas fa-plus border-2 py-1.5 px-1.5 text-xm border-solid rounded-full" style="border-color: #1877F2;"></i>&nbsp;&nbsp;
            Thêm quê quán
        </p>
        @include('Component/GioiThieu/Child/ThemQueQuan')
        <li class="w-full pb-4 flex hidden" style="font-size: 16px;">
            <div class="w-10/12 text-gray-600  dark:text-white ">
                &nbsp;&nbsp;<i class="fas fa-map-marker-alt text-gray-600  dark:text-white  text-2xl"></i>
                &nbsp;&nbsp;&nbsp;&nbsp;Đến từ <b>Quảng Nam</b>
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
        <li class="w-full  pt-2 pb-4 flex" style="font-size: 16px;">
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
        @include('Component/GioiThieu/Child/ThemMoiQuanHe')
    </ul>
</div>

<script>
    var dashboard = {
        IDTaiKhoan: '{{ $idTaiKhoan }}',
        routes: {
            ProccessAddPlaceWorkAbout: "{{ route('ProccessAddPlaceWorkAbout') }}",
            ProcessAddSchoolAbout: "{{ route('ProcessAddSchoolAbout') }}",
            ProcessAddPlaceLiveCurrent: "{{ route('ProcessAddPlaceLiveCurrent') }}",
            ProcessAddHomeTown: "{{ route('ProcessAddHomeTown') }}"
        }
    }
</script>