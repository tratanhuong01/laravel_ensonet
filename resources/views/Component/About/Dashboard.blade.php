<?php

use App\Models\Gioithieu;
use App\Process\DataProcessFour;
use Illuminate\Support\Facades\Session;
use App\Process\DataProcessSecond;

if (isset($jsons)) {
    $json = $jsons;
} else {
    $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $idTaiKhoan)->get();
}
?>
<!-- <form action="" method="post" id="formTongQuan">
    <input type="hidden" id="IDTaiKhoanU" name="IDTaiKhoan" value="{{ $idTaiKhoan }}">
    <input type="hidden" id="ActiveIn" name="ActiveIn" value="{{ 'Dashboard' }}">
    <input type="hidden" name="IDQuyenRiengTu" value="CONGKHAI">
    <input name="IDCongTy" type="hidden" id="companiesInput" value="">
    <input name="IDDiaChi" type="hidden" id="cityAndTownInput" value="">
    <input name="YearStartPlaceWork" type="hidden" id="YearStartPlaceWorkInput" value="">
    <input name="YearEndPlaceWork" type="hidden" id="YearEndPlaceWorkInput" value="">
    <input name="PrivacyInputPlaceWork" type="hidden" id="PrivacyInputPlaceWork" value="">
    <input name="IDTruongHoc" type="hidden" id="schoolNameInput" value="">
    <input name="TypeSchool" type="hidden" id="schoolTypeInput" value="">
    <input name="YearStartSchoolInput" type="hidden" id="YearStartSchoolInputs" value="">
    <input name="YearEndSchoolInput" type="hidden" id="YearEndSchoolInputs" value="">
    <input name="PrivacyInputSchool" type="hidden" id="PrivacyInputSchool" value="">
    <input name="IDDiaChiLive" type="hidden" id="liveCurrentInput" value="">
    <input name="PrivacyInputLiveCurrent" type="hidden" id="PrivacyInputLiveCurrent" value="">
    <input name="IDDiaChiHome" type="hidden" id="homeTownInput" value="">
    <input name="PrivacyInputHomeTown" type="hidden" id="PrivacyInputHomeTown" value="">
</form> -->
<form action="" method="post" id="formTongQuan" class="w-full">
    <input type="hidden" id="IDTaiKhoanU" name="IDTaiKhoan" value="{{ $idTaiKhoan }}">
    <input type="hidden" id="ActiveIn" name="ActiveIn" value="{{ 'Dashboard' }}">
    <input type="hidden" name="IDQuyenRiengTu" value="CONGKHAI">
    <div class="w-full">
        <ul class="w-full py-2 px-4 mainAboutFull">
            <div class="w-full " id="placeWorkMain">
                @if (DataProcessFour::checkPlaceWork(json_decode($json[0]->JsonGioiThieu)) == 0)
                @if ($idMain == $idView)
                <p onclick="AddView('placeWork')" class="placeWork font-bold text-xm py-4 text-1877F2 cursor-pointer">
                    <i class="fas fa-plus border-2 py-1.5 px-1.5 text-xm border-solid rounded-full" style="border-color: #1877F2;"></i>&nbsp;&nbsp;
                    Thêm nơi làm việc
                </p>
                @include('Component/About/Add/AddPlaceWork')
                @endif
                @else
                @if ($idMain == $idView)
                @include('Component/About/Data/PlaceWork',['data' =>
                json_decode($json[0]->JsonGioiThieu)->CongViecHocVan->CongViec[0],
                'idTaiKhoan'=>$idTaiKhoan,
                'idMain' => $idMain,
                'idView' => $idView])
                @else
                @php
                $privacy = json_decode($json[0]->JsonGioiThieu)->CongViecHocVan->CongViec[0]->IDQuyenRiengTu;
                @endphp
                @if (DataProcessSecond::checkUserViewStateWithUserMain($idMain, $idView))
                @if ($privacy == 'CONGKHAI' || $privacy == 'CHIBANBE')
                @include('Component/About/Data/PlaceWork',['data' =>
                json_decode($json[0]->JsonGioiThieu)->CongViecHocVan->CongViec[0],
                'idTaiKhoan'=>$idTaiKhoan,
                'idMain' => $idMain,
                'idView' => $idView])
                @else
                @endif
                @else
                @if ($privacy == 'CONGKHAI')
                @include('Component/About/Data/PlaceWork',['data' =>
                json_decode($json[0]->JsonGioiThieu)->CongViecHocVan->CongViec[0],
                'idTaiKhoan'=>$idTaiKhoan,
                'idMain' => $idMain,
                'idView' => $idView])
                @else
                @endif
                @endif
                @endif
                @endif
            </div>
            <div class="w-full " id="schoolMain">
                @if (DataProcessFour::checkSchool(json_decode($json[0]->JsonGioiThieu)) == 0)
                @if ($idMain == $idView)
                <p onclick="AddView('school')" class="school font-bold text-xm py-4 text-1877F2 cursor-pointer">
                    <i class="fas fa-plus border-2 py-1.5 px-1.5 text-xm border-solid rounded-full" style="border-color: #1877F2;"></i>&nbsp;&nbsp;
                    Thêm trường học
                </p>
                @include('Component/About/Add/AddSchool')
                @endif
                @else
                @if ($idMain == $idView)
                @include('Component/About/Data/School',[
                'data' => json_decode($json[0]->JsonGioiThieu)->CongViecHocVan->HocVan[0],
                'idMain' => $idMain,
                'idView' => $idView])
                @else
                @php
                $privacy = json_decode($json[0]->JsonGioiThieu)->CongViecHocVan->HocVan[0]->IDQuyenRiengTu;
                @endphp
                @if (DataProcessSecond::checkUserViewStateWithUserMain($idMain, $idView))
                @if ($privacy == 'CONGKHAI' || $privacy == 'CHIBANBE')
                @include('Component/About/Data/School',[
                'data' => json_decode($json[0]->JsonGioiThieu)->CongViecHocVan->HocVan[0],
                'idMain' => $idMain,
                'idView' => $idView])
                @else
                @endif
                @else
                @if ($privacy == 'CONGKHAI')
                @include('Component/About/Data/School',[
                'data' => json_decode($json[0]->JsonGioiThieu)->CongViecHocVan->HocVan[0],
                'idMain' => $idMain,
                'idView' => $idView])
                @else
                @endif
                @endif
                @endif
                @endif
            </div>
            <div class="w-full" id="placeCurrentMain">
                @if (DataProcessFour::checkPlaceLiveCurrent(json_decode($json[0]->JsonGioiThieu)) == 0)
                @if ($idMain == $idView)
                <p onclick="AddView('PlaceLiveCurrent')" class="PlaceLiveCurrent font-bold text-xm py-4 text-1877F2 cursor-pointer">
                    <i class="fas fa-plus border-2 py-1.5 px-1.5 text-xm border-solid rounded-full" style="border-color: #1877F2;"></i>&nbsp;&nbsp;
                    Thêm nơi ở hiện tại
                </p>
                @include('Component/About/Add/AddPlaceCurrent')
                @endif
                @else
                @if ($idMain == $idView)
                @include('Component/About/Data/PlaceCurrent',['data' =>
                json_decode($json[0]->JsonGioiThieu)->NoiTungSong->NoiOHienTai[0],
                'idMain' => $idMain,
                'idView' => $idView])
                @else
                @php
                $privacy = json_decode($json[0]->JsonGioiThieu)->NoiTungSong->NoiOHienTai[0]->IDQuyenRiengTu;
                @endphp
                @if (DataProcessSecond::checkUserViewStateWithUserMain($idMain, $idView))
                @if ($privacy == 'CONGKHAI')
                @include('Component/About/Data/PlaceCurrent',['data' =>
                json_decode($json[0]->JsonGioiThieu)->NoiTungSong->NoiOHienTai[0],
                'idMain' => $idMain,
                'idView' => $idView])
                @else
                @endif
                @else
                @if ($privacy == 'CONGKHAI' || $privacy == 'CHIBANBE')
                @include('Component/About/Data/PlaceCurrent',['data' =>
                json_decode($json[0]->JsonGioiThieu)->NoiTungSong->NoiOHienTai[0],
                'idMain' => $idMain,
                'idView' => $idView])
                @else
                @endif
                @endif
                @endif
                @endif
            </div>
            <div class="w-full" id="homeTownMain">
                @if (DataProcessFour::checkHomeTown(json_decode($json[0]->JsonGioiThieu)) == 0)
                @if ($idMain == $idView)
                <p onclick="AddView('HomeTown')" class="HomeTown font-bold text-xm py-4 text-1877F2 cursor-pointer">
                    <i class="fas fa-plus border-2 py-1.5 px-1.5 text-xm border-solid rounded-full" style="border-color: #1877F2;"></i>&nbsp;&nbsp;
                    Thêm quê quán
                </p>
                @include('Component/About/Add/AddHomeTown')
                <p class="w-full font-bold dark:text-gray-300 
                    text-gray-700 py-2">Không có gì để hiển thị.</p>
                @endif
                @else
                @if ($idMain == $idView)
                @include('Component/About/Data/HomeTown',['data' =>
                json_decode($json[0]->JsonGioiThieu)->NoiTungSong->QueQuan[0],
                'idMain' => $idMain,
                'idView' => $idView])
                @else
                @php
                $privacy = json_decode($json[0]->JsonGioiThieu)->NoiTungSong->QueQuan[0]->IDQuyenRiengTu;
                @endphp
                @if (DataProcessSecond::checkUserViewStateWithUserMain($idMain, $idView))
                @if ($privacy == 'CONGKHAI' || $privacy == 'CHIBANBE')
                @include('Component/About/Data/HomeTown',['data' =>
                json_decode($json[0]->JsonGioiThieu)->NoiTungSong->QueQuan[0],
                'idMain' => $idMain,
                'idView' => $idView])
                @else
                @endif
                @else
                @if ($privacy == 'CONGKHAI')
                @include('Component/About/Data/HomeTown',['data' =>
                json_decode($json[0]->JsonGioiThieu)->NoiTungSong->QueQuan[0],
                'idMain' => $idMain,
                'idView' => $idView])
                @else
                @endif
                @endif
                @endif
                @endif
            </div>
            <div class="w-full" id="relationShipMain">
                @if ($idMain == $idView)
                @include('Component/About/Data/Marriage',['data' =>
                json_decode($json[0]->JsonGioiThieu)->GiaDinhVaCacMoiQuanHe->HonNhan,
                'idTaiKhoan'=> $idTaiKhoan,
                'idMain' => $idMain,
                'idView' => $idView])
                @else
                @php
                $privacy = json_decode($json[0]->JsonGioiThieu)->GiaDinhVaCacMoiQuanHe->HonNhan->IDQuyenRiengTu;
                @endphp
                @if (DataProcessSecond::checkUserViewStateWithUserMain($idMain, $idView))
                @if ($privacy == 'CONGKHAI' || $privacy == 'CHIBANBE')
                @include('Component/About/Data/Marriage',['data' =>
                json_decode($json[0]->JsonGioiThieu)->GiaDinhVaCacMoiQuanHe->HonNhan,
                'idTaiKhoan'=> $idTaiKhoan,
                'idMain' => $idMain,
                'idView' => $idView])
                @else
                @endif
                @else
                @if ($privacy == 'CONGKHAI')
                @include('Component/About/Data/Marriage',['data' =>
                json_decode($json[0]->JsonGioiThieu)->GiaDinhVaCacMoiQuanHe->HonNhan,
                'idTaiKhoan'=> $idTaiKhoan,
                'idMain' => $idMain,
                'idView' => $idView])
                @else
                @endif
                @endif
                @endif
            </div>
        </ul>
    </div>
</form>