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
    <input type="hidden" id="IDTaiKhoanU" name="IDTaiKhoan" value="{{ $idTaiKhoan }}">
    <input type="hidden" id="ActiveIn" name="ActiveIn" value="{{ 'Dashboard' }}">
    <input type="hidden" name="IDQuyenRiengTu" value="CONGKHAI">
</form>
<div class="w-full">
    <ul class="w-full py-2 px-4 mainAboutFull">
        <div class="w-full " id="placeWorkMain">
            @if (DataProcessFour::checkPlaceWork(json_decode($json[0]->JsonGioiThieu)) == 0)
            <p onclick="AddView('placeWork')" class="placeWork font-bold text-xm py-4 text-1877F2 cursor-pointer">
                <i class="fas fa-plus border-2 py-1.5 px-1.5 text-xm border-solid rounded-full" style="border-color: #1877F2;"></i>&nbsp;&nbsp;
                Thêm nơi làm việc
            </p>
            @include('Component/GioiThieu/Them/ThemNoiLamViec')
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
            @include('Component/GioiThieu/Them/ThemTruongHoc')
            @else
            @include('Component/GioiThieu/Data/TruongHoc',['data' =>
            json_decode($json[0]->JsonGioiThieu)->CongViecHocVan->HocVan[0]])
            @endif
        </div>
        <div class="w-full" id="placeLiveCurrentMain">
            @if (DataProcessFour::checkPlaceLiveCurrent(json_decode($json[0]->JsonGioiThieu)) == 0)
            <p onclick="AddView('PlaceLiveCurrent')" class="PlaceLiveCurrent font-bold text-xm py-4 text-1877F2 cursor-pointer">
                <i class="fas fa-plus border-2 py-1.5 px-1.5 text-xm border-solid rounded-full" style="border-color: #1877F2;"></i>&nbsp;&nbsp;
                Thêm nơi ở hiện tại
            </p>
            @include('Component/GioiThieu/Them/ThemNoiOHienTai')
            @else
            @include('Component/GioiThieu/Data/NoiOHienTai',['data' =>
            json_decode($json[0]->JsonGioiThieu)->NoiTungSong->NoiOHienTai[0]])
            @endif
        </div>
        <div class="w-full" id="homeTownMain">
            @if (DataProcessFour::checkHomeTown(json_decode($json[0]->JsonGioiThieu)) == 0)
            <p onclick="AddView('HomeTown')" class="HomeTown font-bold text-xm py-4 text-1877F2 cursor-pointer">
                <i class="fas fa-plus border-2 py-1.5 px-1.5 text-xm border-solid rounded-full" style="border-color: #1877F2;"></i>&nbsp;&nbsp;
                Thêm quê quán
            </p>
            @include('Component/GioiThieu/Them/ThemQueQuan')
            @else
            @include('Component/GioiThieu/Data/QueQuan',['data' =>
            json_decode($json[0]->JsonGioiThieu)->NoiTungSong->QueQuan[0]])
            @endif
        </div>
        <div class="w-full" id="marriageMain">
            @include('Component/GioiThieu/Data/HonNhan',['data' => json_decode($json[0]->JsonGioiThieu)->GiaDinhVaCacMoiQuanHe->HonNhan])
            <div class="w-full" id="marriageMainEdit">
            </div>
        </div>
    </ul>
</div>

<script>
    var dashboard = {
        IDTaiKhoan: '{{ $idTaiKhoan }}',
        routes: {
            ProccessAddPlaceWorkAbout: "{{ route('ProccessAddPlaceWorkAbout') }}",
            ProcessAddSchoolAbout: "{{ route('ProcessAddSchoolAbout') }}",
            ProcessAddPlaceLiveCurrent: "{{ route('ProcessAddPlaceLiveCurrent') }}",
            ProcessAddHomeTown: "{{ route('ProcessAddHomeTown') }}",
            ProcessAddPlaceLived: "{{ route('ProcessAddPlaceLived') }}"
        }
    }
</script>