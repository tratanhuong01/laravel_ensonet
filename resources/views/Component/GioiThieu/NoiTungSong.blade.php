<?php

use App\Models\Gioithieu;
use App\Process\DataProcessFour;
use Illuminate\Support\Facades\Session;

$user = Session::get('user');
$json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', '1000000001')->get()[0]->JsonGioiThieu;
$json = json_decode($json);
?>
<form action="" method="post" id="formTongQuan">
    <input type="hidden" id="IDTaiKhoanU" name="IDTaiKhoan" value="{{ $idTaiKhoan }}">
    <input type="hidden" name="IDQuyenRiengTu" value="CONGKHAI">
</form>
<div class="w-full">
    <ul class="w-full py-2 px-4 mainAboutFull">
        <div class="w-full">
            <li class="w-full pb-4 flex" style="font-size: 16px;">
                <ul class="w-full">
                    <p class="font-bold text-xm py-2 dark:text-white" style="font-family: system-ui;">
                        Nơi từng sống</p>
                    <div class="w-full" id="placeLivedMain">
                        @if (count($json->NoiTungSong->NoiTungSong) == 0)
                        @include('Component/GioiThieu/Xoa/XoaNoiTungSong')
                        @include('Component/GioiThieu/Them/ThemNoiTungSong')
                        @else
                        @include('Component/GioiThieu/Xoa/XoaNoiTungSong')
                        @include('Component/GioiThieu/Them/ThemNoiTungSong')
                        @foreach($json->NoiTungSong->NoiTungSong as $key => $value)
                        @include('Component/GioiThieu/Main/NoiTungSong',['value'=> $value])
                        @endforeach
                        @endif
                    </div>
                    <p class="font-bold text-xm py-2 dark:text-white" style="font-family: system-ui;">
                        Nơi ở hiện tại</p>
                    <div class="w-full" id="placeLiveCurrentMain">
                        @if (count($json->NoiTungSong->NoiOHienTai) == 0)
                        @include('Component/GioiThieu/Xoa/XoaNoiOHienTai')
                        @include('Component/GioiThieu/Them/ThemNoiOHienTai')
                        @else
                        @include('Component/GioiThieu/Main/NoiOHienTai',['value'=> $json->NoiTungSong->NoiOHienTai[0]])
                        @endif
                    </div>
                    <p class="font-bold text-xm py-2 dark:text-white" style="font-family: system-ui;">
                        Quê quán</p>
                    <div class="w-full" id="homeTownMain">
                        @if (count($json->NoiTungSong->QueQuan) == 0)
                        @include('Component/GioiThieu/Xoa/XoaQueQuan')
                        @include('Component/GioiThieu/Them/ThemQueQuan')
                        @else
                        @include('Component/GioiThieu/Main/QueQuan',['value'=> $json->NoiTungSong->QueQuan[0]])
                        @endif
                    </div>
                </ul>
            </li>
        </div>
    </ul>
</div>