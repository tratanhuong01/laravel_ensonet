<?php

use App\Models\Gioithieu;
use App\Process\DataProcessFour;
use App\Process\DataProcessSecond;

$json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', $idTaiKhoan)->get();
$json = json_decode($json);
?>
<form action="" method="post" id="formTongQuan">
    <input type="hidden" id="IDTaiKhoanU" name="IDTaiKhoan" value="{{ $idTaiKhoan }}">
    <input type="hidden" name="IDQuyenRiengTu" value="CONGKHAI">
</form>
<div class="w-full">
    <ul class="w-full py-2 px-4 mainAboutFull">
        <p class="font-bold text-xm pt-2 pb-3 dark:text-white" style="font-family: system-ui;">
            Mối quan hệ</p>
        <div class="w-full relative hidden">
            <div id="" class="w-full my-2 cursor-pointer border-2 border-solid border-gray-200 p-2.5
            dark:bg-dark-third flex font-bold dark:border-dark-main shadow-lg dark:text-white  rounded-lg">
                <div class="w-1/2">
                    Độc thân
                </div>
                <div class="w-1/2 text-right ml-3">
                    <i class="fas fa-caret-down"></i>
                </div>
            </div>
            <div class="absolute top-12 hidden z-30 w-80 h-48 bg-gray-200 dark:bg-dark-second overflow-y-auto border-gray-300 rounded-lg
             wrapper-content-right border-2 border-solid dark:border-dark-third shadow-lg" style="max-height: 176px;">
                <div class="w-full p-2 hover:bg-gray-300 dark:hover:bg-dark-third cursor-pointer 
                dark:text-white flex rounded-lg  font-bold">
                    <div class="w-1/2">
                        Độc thân
                    </div>
                    <div class="w-1/2">

                    </div>
                </div>
                <div class="w-full p-2 hover:bg-gray-300 dark:hover:bg-dark-third  cursor-pointer 
                dark:text-white flex rounded-lg  font-bold">
                    <div class="w-1/2">
                        Đã đính hôn
                    </div>
                    <div class="w-1/2">

                    </div>
                </div>
                <div class="w-full p-2 hover:bg-gray-300 dark:hover:bg-dark-third  cursor-pointer 
                dark:text-white flex rounded-lg  font-bold">
                    <div class="w-1/2">
                        Đã kết hôn
                    </div>
                    <div class="w-1/2">

                    </div>
                </div>
                <div class="w-full p-2 hover:bg-gray-300 dark:hover:bg-dark-third cursor-pointer 
                dark:text-white flex rounded-lg  font-bold">
                    <div class="w-1/2">
                        Độc thân
                    </div>
                    <div class="w-1/2">

                    </div>
                </div>
                <div class="w-full p-2 hover:bg-gray-300 dark:hover:bg-dark-third  cursor-pointer 
                dark:text-white flex rounded-lg  font-bold">
                    <div class="w-1/2">
                        Đã đính hôn
                    </div>
                    <div class="w-1/2">

                    </div>
                </div>
                <div class="w-full p-2 hover:bg-gray-300 dark:hover:bg-dark-third  cursor-pointer 
                dark:text-white flex rounded-lg  font-bold">
                    <div class="w-1/2">
                        Đã kết hôn
                    </div>
                    <div class="w-1/2">

                    </div>
                </div>
            </div>
            <div class="w-full flex relative h-16 mt-3">
                <div class="bg-gray-200  dark:bg-dark-third dark:text-white  rounded-lg p-2 absolute left-0 font-bold">
                    <i class="fas fa-globe-europe"></i>&nbsp;&nbsp;Công khai
                </div>
                <div class="bg-1877F2 text-white rounded-lg p-2 absolute right-0 font-bold">
                    Lưu
                </div>
                <div class="bg-gray-200  dark:bg-dark-third dark:text-white  rounded-lg p-2 absolute right-12 font-bold">
                    Hủy
                </div>
            </div>
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
        <p class="font-bold text-xm py-2 dark:text-white" style="font-family: system-ui;">
            Thành viên trong gia đình
        </p>
        <div class="w-full" id="memberFamilyMain">
            @if ($idMain == $idView)
            @if (sizeof(json_decode($json[0]->JsonGioiThieu)->GiaDinhVaCacMoiQuanHe->ThanhVienGiaDinh) < 0) @include('Component/About/Delele/DeleteMemberFamily') @include('Component/About/Add/AddMemberFamily') @else @include('Component/About/Delete/DeleteMemberFamily') @include('Component/About/Add/AddMemberFamily') <li class="w-full pb-4 flex" style="font-size: 16px;">
                <ul class="w-full">
                    @foreach (json_decode($json[0]->JsonGioiThieu)->GiaDinhVaCacMoiQuanHe->ThanhVienGiaDinh as $key => $value)
                    @include('Component/About/Main/MemberFamily',[
                    'value'=>$value
                    ])
                    @endforeach
                </ul>
                </li>
                @endif
                @else
                @include('Component/About/Add/AddMemberFamily')
                @if (sizeof(json_decode($json[0]->JsonGioiThieu)->GiaDinhVaCacMoiQuanHe->ThanhVienGiaDinh) < 0) <p class="w-full font-bold dark:text-gray-300 
                text-gray-700 py-2">Không có gì để hiển thị.</p>
                    @else
                    <li class="w-full pb-4 flex" style="font-size: 16px;">
                        <ul class="w-full">
                            @foreach (json_decode($json[0]->JsonGioiThieu)->GiaDinhVaCacMoiQuanHe->ThanhVienGiaDinh as $key => $value)
                            @php
                            $privacy = $value->IDQuyenRiengTu;
                            @endphp
                            @if (DataProcessSecond::checkUserViewStateWithUserMain($idMain, $idView))
                            @if ($privacy == 'CONGKHAI' || $privacy == 'CHIBANBE')
                            @include('Component/About/Main/MemberFamily',[
                            'value'=>$value,
                            'idMain' => $idMain,
                            'idView' => $idView])
                            @else
                            @endif
                            @else
                            @if ($privacy == 'CONGKHAI')
                            @include('Component/About/Main/MemberFamily',[
                            'value'=>$value,
                            'idMain' => $idMain,
                            'idView' => $idView])
                            @else
                            @endif
                            @endif
                            @endforeach
                        </ul>
                    </li>
                    @endif
                    @endif
        </div>
    </ul>
</div>