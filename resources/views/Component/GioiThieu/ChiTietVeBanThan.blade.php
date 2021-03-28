<?php

use App\Models\Gioithieu;
use App\Process\DataProcessFour;
use Illuminate\Support\Facades\Session;

$user = Session::get('user');
$json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $idTaiKhoan)->get()[0]->JsonGioiThieu;
$json = json_decode($json);
?>

<form action="" method="POST" id="formTongQuan">
    <input type="hidden" id="IDTaiKhoanU" name="IDTaiKhoan" value="{{ $idTaiKhoan }}">
    <input type="hidden" name="IDQuyenRiengTu" value="CONGKHAI">
</form>
<div class="w-full mb-16 mainAboutFull">
    <div class="w-full ">
        <div class="w-full dark:text-white">
            <p class="font-bold text-xm py-2 " style="font-family: system-ui;">
                Giới thiệu bản thân</p>
            <div class="w-full" id="IntroYourSelfMain">
                @if (count($json->ChiTietBanThan->GioiThieu) == 0)
                @include('Component/GioiThieu/Xoa/XoaGioiThieuBanThan')
                @include('Component/GioiThieu/Them/ThemGioiThieuBanThan')
                @else
                @include('Component/GioiThieu/Main/GioiThieuBanThan',
                ['value' => $json->ChiTietBanThan->GioiThieu[0]])
                @include('Component/GioiThieu/Sua/SuaGioiThieuBanThan')
                @endif
            </div>
        </div>
    </div>
    <div class="w-full">
        <div class="w-full dark:text-white">
            <p class="font-bold text-xm py-1" style="font-family: system-ui;">
                Cách phát âm đọc tên</p>
            <div class="w-full" id="WayReadNameMain">
                @if (count($json->ChiTietBanThan->PhatAm) == 0)
                @include('Component/GioiThieu/Xoa/XoaPhatAm')
                @include('Component/GioiThieu/Them/ThemPhatAm')
                @else
                @include('Component/GioiThieu/Main/CachPhatAm',
                ['value' => $json->ChiTietBanThan->PhatAm[0]])
                @include('Component/GioiThieu/Them/ThemPhatAm')
                @endif
            </div>
        </div>
    </div>
    <div class="w-full">
        <div class="w-full dark:text-white">
            <p class="font-bold text-xm py-1" style="font-family: system-ui;">
                Các tên khác</p>
            <div class="w-full" id="NickNameMain">
                @include('Component/GioiThieu/Xoa/XoaTenKhac')
                @include('Component/GioiThieu/Them/ThemTenKhac')
            </div>
        </div>
    </div>
    <div class="w-full">
        <div class="w-full dark:text-white">
            <p class="font-bold text-xm py-1" style="font-family: system-ui;">
                Trích dẫn yêu thích</p>
            <div class="w-full" id="FavoriteQuoteMain">
                @include('Component/GioiThieu/Xoa/XoaTrichDanYeuThich')
                @include('Component/GioiThieu/Them/ThemTrichDanYeuThich')
            </div>
        </div>

    </div>
</div>