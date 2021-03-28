<?php

use App\Models\Gioithieu;
use App\Process\DataProcessFour;
use Illuminate\Support\Facades\Session;

$user = Session::get('user');
$json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $idTaiKhoan)->get()[0]->JsonGioiThieu;
$json = json_decode($json);
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
            @if (count($json->CongViecHocVan->CongViec) == 0)
            @include('Component/GioiThieu/Xoa/XoaNoiLamViec')
            @include('Component/GioiThieu/Them/ThemNoiLamViec')
            @else
            @include('Component/GioiThieu/Xoa/XoaNoiLamViec')
            @include('Component/GioiThieu/Them/ThemNoiLamViec')
            <li class="w-full pb-4 flex" style="font-size: 16px;">
                <ul class="w-full">
                    @foreach($json->CongViecHocVan->CongViec as $key => $value)
                    @include('Component/GioiThieu/Main/NoiLamViec',['value'=>$value])
                    @endforeach
                </ul>
            </li>
            @endif
        </div>
        <!--  -->
        <p class="font-bold text-xm py-2 dark:text-white" style="font-family: system-ui;">
            Đại học</p>
        <div class="w-full " id="schoolMain">
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
                    @include('Component/GioiThieu/Main/TruongHoc',['value',$value])
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
                    @include('Component/GioiThieu/Main/TruongHoc',['value',$value])
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
                    @include('Component/GioiThieu/Main/TruongHoc',['value',$value])
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
                    @include('Component/GioiThieu/Main/TruongHoc',['value',$value])
                    @endforeach
                </ul>
            </li>
            @endif
        </div>
    </ul>
</div>