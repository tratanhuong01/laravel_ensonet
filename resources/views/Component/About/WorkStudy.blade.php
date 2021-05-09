<?php

use App\Models\Gioithieu;
use App\Process\DataProcessFour;
use Illuminate\Support\Facades\Session;
use App\Process\DataProcessSecond;

$json = json_decode(Gioithieu::where('gioithieu.IDTaiKhoan', '=', $idTaiKhoan)->get()[0]->JsonGioiThieu);
?>
<form action="" method="post" id="formTongQuan">
    <input type="hidden" id="IDTaiKhoanU" name="IDTaiKhoan" value=" {{ $idTaiKhoan }}">
    <input type="hidden" name="IDQuyenRiengTu" value="{{ 'CONGKHAI' }}">
    <input name="IDNoiTungSong" type="hidden" id="placeLivedInput" value="">
    <input name="PrivacyInputPlaceLived" type="hidden" id="PrivacyInputPlaceLived" value="">
    <input name="IDDiaChiLive" type="hidden" id="liveCurrentInput" value="">
    <input name="PrivacyInputLiveCurrent" type="hidden" id="PrivacyInputLiveCurrent" value="">
    <input name="IDDiaChiHome" type="hidden" id="homeTownInput" value="">
    <input name="PrivacyInputHomeTown" type="hidden" id="PrivacyInputHomeTown" value="">
</form>
<div class="w-full">
    <ul class="w-full py-2 px-4 mainAboutFull">
        <p class="font-bold text-xm py-2 dark:text-white" style="font-family: system-ui;">
            Công Việc</p>
        <div class="w-full " id="placeWorkMain">
            @if ($idMain != $idView)
            @if (count($json->CongViecHocVan->CongViec) == 0)
            <p class="w-full font-bold dark:text-gray-300 
                    text-gray-700 py-2">Không có gì để hiển thị.</p>
            @else
            <li class="w-full pb-4 flex" style="font-size: 16px;">
                <ul class="w-full">
                    @foreach ($json->CongViecHocVan->CongViec as $key => $value)
                    @php
                    $privacy = $value->IDQuyenRiengTu;
                    @endphp
                    @if (DataProcessSecond::checkUserViewStateWithUserMain($idMain, $idView))
                    @if ($privacy == 'CONGKHAI' || $privacy == 'CHIBANBE')
                    @include('Component/About/Main/PlaceWork',['value'=>$value,
                    'idMain' => $idMain,
                    'idView' => $idView])
                    @else
                    @endif
                    @else
                    @if ($privacy == 'CONGKHAI')
                    @include('Component/About/Main/PlaceWork',['value'=>$value,
                    'idMain' => $idMain,
                    'idView' => $idView])
                    @else
                    @endif
                    @endif
                    @endforeach
                </ul>
            </li>
            @endif
            @else
            @if (count($json->CongViecHocVan->CongViec) == 0)
            @include('Component/About/Delete/DeletePlaceWork')
            @include('Component/About/Add/AddPlaceWork')
            @else
            @include('Component/About/Delete/DeletePlaceWork')
            @include('Component/About/Add/AddPlaceWork')
            <li class="w-full pb-4 flex" style="font-size: 16px;">
                <ul class="w-full">
                    @foreach ($json->CongViecHocVan->CongViec as $key => $value)
                    @include('Component/About/Main/PlaceWork',['value'=>$value,
                    'idMain' => $idMain,
                    'idView' => $idView])
                    @endforeach
                </ul>
            </li>
            @endif
            @endif
        </div>
        <!--  -->
        <p class="font-bold text-xm py-2 dark:text-white" style="font-family: system-ui;">
            Đại học</p>
        <div class="w-full " id="schoolMain">
            <?php $daiHoc = DataProcessFour::getTypeSchoolByType('Đại Học', '1000000001'); ?>
            @if ($idMain != $idView)
            @if (count($daiHoc) == 0)
            <p class="w-full font-bold dark:text-gray-300 
                    text-gray-700 py-2">Không có gì để hiển thị.</p>
            @else
            <li class="w-full pb-4 flex" style="font-size: 16px;">
                <ul class="w-full">
                    @foreach ($daiHoc as $key => $value)
                    @php
                    $privacy = $value->IDQuyenRiengTu;
                    @endphp
                    @if (DataProcessSecond::checkUserViewStateWithUserMain($idMain, $idView))
                    @if ($privacy == 'CONGKHAI' || $privacy == 'CHIBANBE')
                    @include('Component/About/Main/School',['value',$value,
                    'idMain' => $idMain,
                    'idView' => $idView])
                    @else
                    @endif
                    @else
                    @if ($privacy == 'CONGKHAI')
                    @include('Component/About/Main/School',['value',$value,
                    'idMain' => $idMain,
                    'idView' => $idView])
                    @else
                    @endif
                    @endif
                    @endforeach
                </ul>
            </li>
            @endif
            @else
            @if (count($daiHoc) == 0)
            @include('Component/About/Delete/DeleteSchool')
            @include('Component/About/Add/AddSchool')
            @else
            @include('Component/About/Delete/DeleteSchool')
            @include('Component/About/Add/AddSchool')
            <li class="w-full pb-4 flex" style="font-size: 16px;">
                <ul class="w-full">
                    @foreach ($daiHoc as $key => $value)
                    @include('Component/About/Main/School',['value',$value,
                    'idMain' => $idMain,
                    'idView' => $idView])
                    @endforeach
                </ul>
            </li>
            @endif
            @endif
        </div>

        <!-- a -->
        <p class="font-bold text-xm py-2 dark:text-white" style="font-family: system-ui;">
            Cao đẳng</p>
        <div class="w-full " id="">
            <?php $caoDang = DataProcessFour::getTypeSchoolByType('Cao Đẳng', '1000000001'); ?>
            @if ($idMain != $idView)
            @if (count($caoDang) == 0)
            <p class="w-full font-bold dark:text-gray-300 
                    text-gray-700 py-2">Không có gì để hiển thị.</p>
            @else
            <li class="w-full pb-4 flex" style="font-size: 16px;">
                <ul class="w-full">
                    @foreach ($caoDang as $key => $value)
                    @php
                    $privacy = $value->IDQuyenRiengTu;
                    @endphp
                    @if (DataProcessSecond::checkUserViewStateWithUserMain($idMain, $idView))
                    @if ($privacy == 'CONGKHAI' || $privacy == 'CHIBANBE')
                    @include('Component/About/Main/School',['value',$value,
                    'idMain' => $idMain,
                    'idView' => $idView])
                    @else
                    @endif
                    @else
                    @if ($privacy == 'CONGKHAI')
                    @include('Component/About/Main/School',['value',$value,
                    'idMain' => $idMain,
                    'idView' => $idView])
                    @else
                    @endif
                    @endif
                    @endforeach
                </ul>
            </li>
            @endif
            @else
            @if (count($caoDang) == 0)
            @include('Component/About/Delete/DeleteSchool')
            @include('Component/About/Add/AddSchool')
            @else
            @include('Component/About/Delete/DeleteSchool')
            @include('Component/About/Add/AddSchool')
            <li class="w-full pb-4 flex" style="font-size: 16px;">
                <ul class="w-full">
                    @foreach ($caoDang as $key => $value)
                    @include('Component/About/Main/School',['value',$value,
                    'idMain' => $idMain,
                    'idView' => $idView])
                    @endforeach
                </ul>
            </li>
            @endif
            @endif
        </div>
        <!-- a -->
        <p class="font-bold text-xm py-2 dark:text-white" style="font-family: system-ui;">
            Trung Học Phổ Thông</p>
        <div class="w-full " id="">
            <?php $thpt = DataProcessFour::getTypeSchoolByType('Trung Học Phổ Thông', '1000000001'); ?>
            @if ($idMain != $idView)
            @if (count($thpt) == 0)
            <p class="w-full font-bold dark:text-gray-300 
                    text-gray-700 py-2">Không có gì để hiển thị.</p>
            @else
            <li class="w-full pb-4 flex" style="font-size: 16px;">
                <ul class="w-full">
                    @foreach ($thpt as $key => $value)
                    @php
                    $privacy = $value->IDQuyenRiengTu;
                    @endphp
                    @if (DataProcessSecond::checkUserViewStateWithUserMain($idMain, $idView))
                    @if ($privacy == 'CONGKHAI' || $privacy == 'CHIBANBE')
                    @include('Component/About/Main/School',['value',$value,
                    'idMain' => $idMain,
                    'idView' => $idView])
                    @else
                    @endif
                    @else
                    @if ($privacy == 'CONGKHAI')
                    @include('Component/About/Main/School',['value',$value,
                    'idMain' => $idMain,
                    'idView' => $idView])
                    @else
                    @endif
                    @endif
                    @endforeach
                </ul>
            </li>
            @endif
            @else
            @if (count($thpt) == 0)
            @include('Component/About/Delete/DeleteSchool')
            @include('Component/About/Add/AddSchool')
            @else
            @include('Component/About/Delete/DeleteSchool')
            @include('Component/About/Add/AddSchool')
            <li class="w-full pb-4 flex" style="font-size: 16px;">
                <ul class="w-full">
                    @foreach ($thpt as $key => $value)
                    @include('Component/About/Main/School',['value',$value,
                    'idMain' => $idMain,
                    'idView' => $idView])
                    @endforeach
                </ul>
            </li>
            @endif
            @endif
        </div>
        <!-- a -->
        <p class="font-bold text-xm py-2 dark:text-white" style="font-family: system-ui;">
            Trung Học Cơ Sở</p>
        <div class="w-full " id="">
            <?php $thcs = DataProcessFour::getTypeSchoolByType('Trung Học Cơ Sở', '1000000001'); ?>
            @if ($idMain != $idView)
            @if (count($thcs) == 0)
            <p class="w-full font-bold dark:text-gray-300 
                    text-gray-700 py-2">Không có gì để hiển thị.</p>
            @else
            <li class="w-full pb-4 flex" style="font-size: 16px;">
                <ul class="w-full">
                    @foreach ($thcs as $key => $value)
                    @php
                    $privacy = $value->IDQuyenRiengTu;
                    @endphp
                    @if (DataProcessSecond::checkUserViewStateWithUserMain($idMain, $idView))
                    @if ($privacy == 'CONGKHAI' || $privacy == 'CHIBANBE')
                    @include('Component/About/Main/School',['value',$value,
                    'idMain' => $idMain,
                    'idView' => $idView])
                    @else
                    @endif
                    @else
                    @if ($privacy == 'CONGKHAI')
                    @include('Component/About/Main/School',['value',$value,
                    'idMain' => $idMain,
                    'idView' => $idView])
                    @else
                    @endif
                    @endif
                    @endforeach
                </ul>
            </li>
            @endif
            @else
            @if (count($thcs) == 0)
            @include('Component/About/Delete/DeleteSchool')
            @include('Component/About/Add/AddSchool')
            @else
            @include('Component/About/Delete/DeleteSchool')
            @include('Component/About/Add/AddSchool')
            <li class="w-full pb-4 flex" style="font-size: 16px;">
                <ul class="w-full">
                    @foreach ($thcs as $key => $value)
                    @include('Component/About/Main/School',['value',$value,
                    'idMain' => $idMain,
                    'idView' => $idView])
                    @endforeach
                </ul>
            </li>
            @endif
            @endif
        </div>
    </ul>
</div>