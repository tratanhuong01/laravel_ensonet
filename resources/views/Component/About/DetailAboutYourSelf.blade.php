<?php

use App\Models\Gioithieu;
use App\Process\DataProcessFour;
use App\Process\DataProcessSecond;
use Illuminate\Support\Facades\Session;

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
                @if ($idMain == $idView)
                @if (count($json->ChiTietBanThan->GioiThieu) == 0)
                @include('Component.About.Delete.DeleteIntroYourSelf')
                @include('Component.About.Add.AddIntroYourSelf')
                @else
                @include('Component.About.Main.IntroYourSelf',
                ['value' => $json->ChiTietBanThan->GioiThieu[0],
                'idMain' => $idMain,
                'idView' => $idView])
                @include('Component.About.Edit.EditIntroYourSelf')
                @endif
                @else
                @if (count($json->ChiTietBanThan->GioiThieu) == 0)
                <p class="w-full font-bold dark:text-gray-300 
                        text-gray-700 py-2">Không có gì để hiển thị.<.p>
                @else
                @php
                $privacy = $json->ChiTietBanThan->GioiThieu[0]->IDQuyenRiengTu;
                @endphp
                @if (DataProcessSecond::checkUserViewStateWithUserMain($idMain, $idView))
                @if ($privacy == 'CONGKHAI' || $privacy == 'CHIBANBE')
                @include('Component.About.Main.IntroYourSelf',
                ['value' => $json->ChiTietBanThan->GioiThieu[0],
                'idMain' => $idMain,
                'idView' => $idView])
                @else
                @endif
                @else
                @if ($privacy == 'CONGKHAI')
                @include('Component.About.Main.IntroYourSelf',
                ['value' => $json->ChiTietBanThan->GioiThieu[0],
                'idMain' => $idMain,
                'idView' => $idView])
                @else
                @endif
                @endif
                @endif
                @endif
            </div>
        </div>
    </div>
    <div class="w-full">
        <div class="w-full dark:text-white">
            <p class="font-bold text-xm py-1" style="font-family: system-ui;">
                Cách phát âm đọc tên</p>
            <div class="w-full" id="WayReadNameMain">
                @if ($idMain == $idView)
                @if (count($json->ChiTietBanThan->PhatAm) == 0)
                @include('Component.About.Delete.DeleteWaySpeak')
                @include('Component.About.Add.AddWaySpeak')
                @else
                @include('Component.About.Main.WaySpeak',
                ['value' => $json->ChiTietBanThan->PhatAm[0],
                'idMain' => $idMain,
                'idView' => $idView])
                @include('Component.About.Add.AddWaySpeak')
                @endif
                @else
                @if (count($json->ChiTietBanThan->PhatAm) == 0)
                <p class="w-full font-bold dark:text-gray-300 
                        text-gray-700 py-2">Không có gì để hiển thị.</p>
                @else
                @php
                $privacy = $json->ChiTietBanThan->PhatAm[0]->IDQuyenRiengTu;
                @endphp
                @if (DataProcessSecond::checkUserViewStateWithUserMain($idMain, $idView))
                @if ($privacy == 'CONGKHAI' || $privacy == 'CHIBANBE')
                @include('Component.About.Main.WaySpeak',
                ['value' => $json->ChiTietBanThan->PhatAm[0],
                'idMain' => $idMain,
                'idView' => $idView])
                @include('Component.About.Add.AddWaySpeak')
                @else
                @endif
                @else
                @if ($privacy == 'CONGKHAI')
                @include('Component.About.Main.WaySpeak',
                ['value' => $json->ChiTietBanThan->PhatAm[0],
                'idMain' => $idMain,
                'idView' => $idView])
                @include('Component.About.Add.AddWaySpeak')
                @else
                @endif
                @endif
                @endif
                @endif
            </div>
        </div>
    </div>
    <div class="w-full">
        <div class="w-full dark:text-white">
            <p class="font-bold text-xm py-1" style="font-family: system-ui;">
                Các tên khác</p>
            <div class="w-full" id="NickNameMain">
                @if ($idMain == $idView)
                @if (count($json->ChiTietBanThan->BietDanh) == 0)
                @include('Component.About.Delete.DeleteNameOther')
                @include('Component.About.Add.AddNameOther')
                @else
                @include('Component.About.Delete.DeleteNameOther')
                @include('Component.About.Add.AddNameOther')
                @foreach ($json->ChiTietBanThan->BietDanh as $key => $value)
                @include('Component.About.Main.Nickname',
                ['value' => $value,
                'idMain' => $idMain,
                'idView' => $idView])
                @endforeach
                @endif
                @else
                @if (count($json->ChiTietBanThan->BietDanh) == 0)
                <p class="w-full font-bold dark:text-gray-300 
                        text-gray-700 py-2">Không có gì để hiển thị.<.p>
                @else
                @php
                $privacy = $json->ChiTietBanThan->BietDanh[0]->IDQuyenRiengTu;
                @endphp
                @if (DataProcessSecond::checkUserViewStateWithUserMain($idMain, $idView))
                @if ($privacy == 'CONGKHAI' || $privacy == 'CHIBANBE')
                @include('Component.About.Main.Nickname',
                ['value' => $json->ChiTietBanThan->BietDanh[0],
                'idMain' => $idMain,
                'idView' => $idView])
                @else
                @endif
                @else
                @if ($privacy == 'CONGKHAI')
                @include('Component.About.Main.Nickname',
                ['value' => $json->ChiTietBanThan->BietDanh[0],
                'idMain' => $idMain,
                'idView' => $idView])
                @else
                @endif
                @endif
                @endif
                @endif
            </div>
        </div>
    </div>
    <div class="w-full">
        <div class="w-full dark:text-white">
            <p class="font-bold text-xm py-1" style="font-family: system-ui;">
                Trích dẫn yêu thích</p>
            <div class="w-full" id="FavoriteQuoteMain">
                @if ($idMain == $idView)
                @if (count($json->ChiTietBanThan->TrichDanYeuThich) == 0)
                @include('Component.About.Delete.DeleteFavoriteQuote')
                @include('Component.About.Add.AddFavoriteQuote')
                @else
                @include('Component.About.Main.FavoriteQuote',
                ['value' => $json->ChiTietBanThan->TrichDanYeuThich[0],
                'idMain' => $idMain,
                'idView' => $idView])
                @include('Component.About.Add.AddFavoriteQuote')
                @endif
                @else
                @if (count($json->ChiTietBanThan->TrichDanYeuThich) == 0)
                <p class="w-full font-bold dark:text-gray-300 
                    text-gray-700 py-2">Không có gì để hiển thị.<.p>
                @else
                @php
                $privacy = $json->ChiTietBanThan->TrichDanYeuThich[0]->IDQuyenRiengTu;
                @endphp
                @if (DataProcessSecond::checkUserViewStateWithUserMain($idMain, $idView))
                @if ($privacy == 'CONGKHAI' || $privacy == 'CHIBANBE')
                @include('Component.About.Main.FavoriteQuote',
                ['value' => $json->ChiTietBanThan->TrichDanYeuThich[0],
                'idMain' => $idMain,
                'idView' => $idView])
                @else
                @endif
                @else
                @if ($privacy == 'CONGKHAI')
                @include('Component.About.Main.FavoriteQuote',
                ['value' => $json->ChiTietBanThan->TrichDanYeuThich[0],
                'idMain' => $idMain,
                'idView' => $idView])
                @else
                @endif
                @endif
                @endif
                @endif
            </div>
        </div>

    </div>
</div>