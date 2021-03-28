<?php

use App\Models\Gioithieu;
use App\Process\DataProcessFour;
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
    <input name="PrivacyInputDayAndMonthBirth" type="hidden" id="PrivacyInputDayAndMonthBirth" value="">
    <input name="PrivacyInputYearBirth" type="hidden" id="PrivacyInputYearBirth" value="">
</form>
<div class="w-full">
    <ul class="w-full py-2 px-4  dark:text-white mainAboutFull">
        @include('Component/GioiThieu/Main/SoDienThoai',
        ['value' => $json->ThongTinCoBanVaLienHe->SoDienThoai])
        @include('Component/GioiThieu/Main/Email',
        ['value' => $json->ThongTinCoBanVaLienHe->Email])
        <div class="w-full" id="sexMain">
            @include('Component/GioiThieu/Main/GioiTinh',
            ['value' => $json->ThongTinCoBanVaLienHe->GioiTinh])
        </div>
        <div class="w-ful" id="birthDayMain">
            @include('Component/GioiThieu/Main/NgaySinh',
            ['value' => $json->ThongTinCoBanVaLienHe->NgaySinh])
        </div>
    </ul>
</div>