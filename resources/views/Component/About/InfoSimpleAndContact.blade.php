<?php

use App\Models\Gioithieu;
use App\Process\DataProcessFour;
use App\Process\DataProcessSecond;
use Illuminate\Support\Facades\Session;

$user = Session::get('user');
$json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $idTaiKhoan)->get()[0]->JsonGioiThieu;
$json = json_decode($json);
?>
<form action="" method="post" id="formTongQuan">
    <input type="hidden" id="IDTaiKhoanU" name="IDTaiKhoan" value="{{ $idTaiKhoan }}">
    <input type="hidden" name="IDQuyenRiengTu" value="CONGKHAI">
    <input name="IDSex" type="hidden" id="SexInput" value="">
    <input name="PrivacyInputSex" type="hidden" id="PrivacyInputSex" value="">
    <input name="DayBirth" type="hidden" id="DayBirth" value="">
    <input name="MonthBirth" type="hidden" id="MonthBirth" value="">
    <input name="YearBirth" type="hidden" id="YearBirth" value="">
    <input name="PrivacyInputDayAnMonthBirth" type="hidden" id="PrivacyInputDayAnMonthBirth" value="">
    <input name="PrivacyInputYearBirth" type="hidden" id="PrivacyInputYearBirth" value="">
    <input name="MonthBirth" type="hidden" id="MonthBirthInput" value="">
    <input name="DayBirth" type="hidden" id="DayBirthInput" value="">
    <input name="YearBirth" type="hidden" id="YearBirthInput" value="">
</form>
<div class="w-full">
    <ul class="w-full py-2 px-4  dark:text-white mainAboutFull">
        @if ($idMain == $idView)
            @include('Component.About.Main.NumberPhone',
            ['value' => $json->ThongTinCoBanVaLienHe->SoDienThoai,
            'idMain' => $idMain,
            'idView' => $idView])
        @else
            @php
                $privacy = $json->ThongTinCoBanVaLienHe->SoDienThoai->IDQuyenRiengTu;
            @endphp
            @if (DataProcessSecond::checkUserViewStateWithUserMain($idMain, $idView))

                @if ($privacy == 'CONGKHAI' || $privacy == 'CHIBANBE')
                    @include('Component.About.Main.NumberPhone',
                    ['value' => $json->ThongTinCoBanVaLienHe->SoDienThoai,
                    'idMain' => $idMain,
                    'idView' => $idView])
                @else
                @endif
            @else
                @if ($privacy == 'CONGKHAI')
                    @include('Component.About.Main.NumberPhone',
                    ['value' => $json->ThongTinCoBanVaLienHe->SoDienThoai,
                    'idMain' => $idMain,
                    'idView' => $idView])
                @else
                @endif
            @endif
        @endif

        @if ($idMain == $idView)
            @include('Component.About.Main.Email',
            ['value' => $json->ThongTinCoBanVaLienHe->Email,
            'idMain' => $idMain,
            'idView' => $idView])
        @else
            @php
                $privacy = $json->ThongTinCoBanVaLienHe->Email->IDQuyenRiengTu;
            @endphp
            @if (DataProcessSecond::checkUserViewStateWithUserMain($idMain, $idView))
                @if ($privacy == 'CONGKHAI' || $privacy == 'CHIBANBE')
                    @include('Component.About.Main.Email',
                    ['value' => $json->ThongTinCoBanVaLienHe->Email,
                    'idMain' => $idMain,
                    'idView' => $idView])
                @else
                @endif
            @else
                @if ($privacy == 'CONGKHAI')
                    @include('Component.About.Main.Email',
                    ['value' => $json->ThongTinCoBanVaLienHe->Email,
                    'idMain' => $idMain,
                    'idView' => $idView])
                @else
                @endif
            @endif
        @endif

        <div class="w-full" id="sexMain">
            @if ($idMain == $idView)
                @include('Component.About.Main.Sex',
                ['value' => $json->ThongTinCoBanVaLienHe->GioiTinh,
                'idMain' => $idMain,
                'idView' => $idView])
            @else
                @php
                    $privacy = $json->ThongTinCoBanVaLienHe->GioiTinh->IDQuyenRiengTu;
                @endphp
                @if (DataProcessSecond::checkUserViewStateWithUserMain($idMain, $idView))

                    @if ($privacy == 'CONGKHAI' || $privacy == 'CHIBANBE')
                        @include('Component.About.Main.Sex',
                        ['value' => $json->ThongTinCoBanVaLienHe->GioiTinh,
                        'idMain' => $idMain,
                        'idView' => $idView])
                    @else
                    @endif
                @else
                    @if ($privacy == 'CONGKHAI')
                        @include('Component.About.Main.Sex',
                        ['value' => $json->ThongTinCoBanVaLienHe->GioiTinh,
                        'idMain' => $idMain,
                        'idView' => $idView])
                    @else
                    @endif
                @endif
            @endif

        </div>

        <div class="w-ful" id="birthDayMain">
            @if ($idMain == $idView)
                @include('Component.About.Main.Birthday',
                ['value' => $json->ThongTinCoBanVaLienHe->NgaySinh,
                'idMain' => $idMain,
                'idView' => $idView])
            @else
                @include('Component.About.Main.Birthday',
                ['value' => $json->ThongTinCoBanVaLienHe->NgaySinh,
                'idMain' => $idMain,
                'idView' => $idView])
            @endif

        </div>
    </ul>
</div>
