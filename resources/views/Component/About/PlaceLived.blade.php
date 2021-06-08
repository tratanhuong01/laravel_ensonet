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
    <div class="w-full">
        <ul class="w-full py-2 px-4 mainAboutFull">
            <div class="w-full">
                <li class="w-full pb-4 flex" style="font-size: 16px;">
                    <ul class="w-full">
                        <p class="font-bold text-xm py-2 dark:text-white" style="font-family: system-ui;">
                            Nơi từng sống</p>
                        <div class="w-full" id="placeLivedMain">
                            @if ($idMain == $idView)
                            @if (count($json->NoiTungSong->NoiTungSong) == 0)
                            @include('Component/About/Delete/DeletePlaceLived')
                            @include('Component/About/Add/AddPlaceLived')
                            @else
                            @include('Component/About/Delete/DeletePlaceLived')
                            @include('Component/About/Add/AddPlaceLived')
                            @foreach ($json->NoiTungSong->NoiTungSong as $key => $value)
                            @include('Component/About/Main/PlaceLived',['value'=> $value,
                            'idMain' => $idMain,
                            'idView' => $idView])
                            @endforeach
                            @endif
                            @else
                            @if (count($json->NoiTungSong->NoiTungSong) == 0)
                            <p class="w-full font-bold dark:text-gray-300 
                                text-gray-700 py-2">Không có gì để hiển thị.</p>
                            @else
                            @foreach ($json->NoiTungSong->NoiTungSong as $key => $value)
                            @php
                            $privacy = $value->IDQuyenRiengTu;
                            @endphp
                            @if (DataProcessSecond::checkUserViewStateWithUserMain($idMain, $idView))
                            @if ($privacy == 'CONGKHAI' || $privacy == 'CHIBANBE')
                            @include('Component/About/Main/PlaceLived',['value'=> $value,
                            'idMain' => $idMain,
                            'idView' => $idView])
                            @else
                            @endif
                            @else
                            @if ($privacy == 'CONGKHAI')
                            @include('Component/About/Main/PlaceLived',['value'=> $value,
                            'idMain' => $idMain,
                            'idView' => $idView])
                            @else
                            @endif
                            @endif
                            @endforeach
                            @endif
                            @endif
                        </div>
                        <p class="font-bold text-xm py-2 dark:text-white" style="font-family: system-ui;">
                            Nơi ở hiện tại</p>
                        <div class="w-full" id="placeCurrentMain">
                            @if ($idMain == $idView)
                            @if (count($json->NoiTungSong->NoiOHienTai) == 0)
                            @include('Component/About/Delete/DeletePlaceCurrent')
                            @include('Component/About/Add/AddPlaceCurrent')
                            @else
                            @include('Component/About/Main/PlaceCurrent',['value'=>
                            $json->NoiTungSong->NoiOHienTai[0],
                            'idMain' => $idMain,
                            'idView' => $idView])
                            @endif
                            @else
                            @if (count($json->NoiTungSong->NoiOHienTai) == 0)
                            <p class="w-full font-bold dark:text-gray-300 
                                text-gray-700 py-2">Không có gì để hiển thị.</p>
                            @else
                            @php
                            $privacy = $json->NoiTungSong->NoiOHienTai[0]->IDQuyenRiengTu;
                            @endphp
                            @if (DataProcessSecond::checkUserViewStateWithUserMain($idMain, $idView))
                            @if ($privacy == 'CONGKHAI' || $privacy == 'CHIBANBE')
                            @include('Component/About/Main/PlaceCurrent',['value'=>
                            $json->NoiTungSong->NoiOHienTai[0],
                            'idMain' => $idMain,
                            'idView' => $idView])
                            @else
                            @endif
                            @else
                            @if ($privacy == 'CONGKHAI')
                            @include('Component/About/Main/PlaceCurrent',['value'=>
                            $json->NoiTungSong->NoiOHienTai[0],
                            'idMain' => $idMain,
                            'idView' => $idView])
                            @else
                            @endif
                            @endif
                            @endif
                            @endif
                        </div>
                        <p class="font-bold text-xm py-2 dark:text-white" style="font-family: system-ui;">
                            Quê quán</p>
                        <div class="w-full" id="homeTownMain">
                            @if ($idMain == $idView)
                            @if (count($json->NoiTungSong->QueQuan) == 0)
                            @include('Component/About/Delete/DeleteHomeTown')
                            @include('Component/About/Add/AddHomeTown')
                            @else
                            @include('Component/About/Main/HomeTown',['value'=> $json->NoiTungSong->QueQuan[0],
                            'idMain' => $idMain,
                            'idView' => $idView])
                            @endif
                            @else
                            @if (count($json->NoiTungSong->QueQuan) == 0)
                            <p class="w-full font-bold dark:text-gray-300 
                                text-gray-700 py-2">Không có gì để hiển thị.</p>
                            @else
                            @php
                            $privacy = $json->NoiTungSong->QueQuan[0]->IDQuyenRiengTu;
                            @endphp
                            @if (DataProcessSecond::checkUserViewStateWithUserMain($idMain, $idView))
                            @if ($privacy == 'CONGKHAI' || $privacy == 'CHIBANBE')
                            @include('Component/About/Main/HomeTown',['value'=>
                            $json->NoiTungSong->QueQuan[0],
                            'idMain' => $idMain,
                            'idView' => $idView])
                            @else
                            @endif
                            @else
                            @if ($privacy == 'CONGKHAI')
                            @include('Component/About/Main/HomeTown',['value'=>
                            $json->NoiTungSong->QueQuan[0],
                            'idMain' => $idMain,
                            'idView' => $idView])
                            @else
                            @endif
                            @endif
                            @endif
                            @endif
                        </div>
                    </ul>
                </li>
            </div>
        </ul>
    </div>
</form>