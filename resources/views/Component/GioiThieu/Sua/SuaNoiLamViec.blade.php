<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$year = explode('-', explode(' ', date("Y-m-d H:i:s"))[0])[0];
?>
<div class="w-full placeWork hidden relative">
    <input oninput="OninputValueInputAbout('placeWork',this,'Companies')" onclick="EventClickInputAbout('placeWork',this,'Companies')" name="" id="IDCongTys" class="w-full my-2 p-3 border-2 border-solid border-gray-200 
    dark:bg-dark-third dark:border-dark-main shadow-lg dark:text-white  
    resize-none outline-none rounded-lg" placeholder="Công ty" value="{{ $data->TenCongTy }}">
    <div class=" top-16 z-30 bg-gray-200 dark:bg-dark-second overflow-y-auto Companies
    border-gray-300 rounded-lg wrapper-content-right border-2 border-solid dark:border-dark-third 
    shadow-lg w-full hidden" style="max-height: 320px;">
    </div>
    <input name="" id="" class="w-full my-2 p-3 border-2 border-solid border-gray-200 
    dark:bg-dark-third dark:border-dark-main shadow-lg dark:text-white  
    resize-none outline-none rounded-lg" placeholder="Chức vụ" value="{{ $data->ChucVu }}">
    <div class=" top-16 z-30 bg-gray-200 dark:bg-dark-second overflow-y-auto postionA
    border-gray-300 rounded-lg wrapper-content-right border-2 border-solid dark:border-dark-third 
    shadow-lg w-full hidden" style="max-height: 320px;">
    </div>
    <input oninput="OninputValueInputAbout('placeWork',this,'CityAndTown')" onclick="EventClickInputAbout('placeWork',this,'CityAndTown')" name="" id="IDDiaChis" class="w-full my-2 p-3 border-2 border-solid border-gray-200 
    dark:bg-dark-third dark:border-dark-main shadow-lg dark:text-white  
    resize-none outline-none rounded-lg" placeholder="Thành phố / thị xã" value="{{ $data->TenDiaChi }}">
    <div class=" top-16 z-30 bg-gray-200 dark:bg-dark-second overflow-y-auto CityAndTown
    border-gray-300 rounded-lg wrapper-content-right border-2 border-solid dark:border-dark-third 
    shadow-lg w-full hidden" style="max-height: 320px;">
    </div>
    <p class="font-bold text-xm py-2 dark:text-white" style="font-family: system-ui;">
        Khoảng thời gian</p>
    <div class="py-2 px-2 w-full dark:text-white font-bold flex">
        <div class="w-10 h-10 p-2 text-center hover:bg-gray-200 
                dark:hover:bg-dark-third rounded-full">
            <input onchange="OnChangeCheckBoxAboutOnOrOff(this,'yearAboutPlaceWork')" type="checkbox" class="" name="" id="" style="transform: scale(1.8);">
        </div>
        <div class="pl-3 py-2">
            Tôi đang làm việc tại đây
        </div>
    </div>
    <div class="w-full p-2 flex dark:text-white font-bold yearAboutPlaceWork">
        <p class="py-2">Từ</p>
        <div class="w-24 text-center relative dark:text-white">
            <input type="button" onclick="EventClickYearAbout('yearPlaceWorks',0)" id="YearStartPlaceWorks" class="px-4 py-2.5 dark:bg-dark-third dark:text-white bg-gray-200 
                    font-bold rounded-lg " value="{{ $data->NamBatDau }}">
            <div class="YearStartPlaceWorkss z-50 absolute left-2 top-12 w-80 h-60 overflow-y-auto wrapper-content-right
                     shadow-lg border-gray-300 dark:border-dark-main dark:bg-dark-second 
                     bg-gray-200 hidden yearPlaceWorks " style="max-height: 200px;">
                @for($i = $year ; $i > $year - 35; $i--)
                <div onclick="choose('YearStartPlaceWork',
                '{{ $i }}',
                '{{ $i }}',
                'YearStartPlaceWorkInput',
                'YearStartPlaceWorks',
                'YearStartPlaceWorkss')" class="w-full p-3 dark:text-white font-bold text-left
                cursor-pointer dark:bg-dark-third">
                    {{$i}}
                </div>
                @endfor
            </div>
        </div>
        <p class="py-2">Đến</p>
        <div class="w-24 text-center relative dark:text-white">
            <input type="button" onclick="EventClickYearAbout('yearPlaceWorks',1)" class="px-4 py-2.5 dark:bg-dark-third dark:text-white bg-gray-200 
                    font-bold rounded-lg" value="{{ $data->NamKetThuc }}" id="YearEndPlaceWorks">
            <div class="YearEndPlaceWorkss z-50 hidden absolute left-3.5 top-12 w-80 h-60 overflow-y-auto wrapper-content-right
                     shadow-lg border-gray-300 dark:border-dark-main dark:bg-dark-second 
                     bg-gray-200 yearPlaceWorks" style="max-height: 200px;">
                @for($i = $year ; $i > $year - 35; $i--)
                <div onclick="choose('YearEndPlaceWork',
                '{{ $i }}',
                '{{ $i }}',
                'YearEndPlaceWorkInput',
                'YearEndPlaceWorks',
                'YearEndPlaceWorkss')" class="w-full p-3 dark:text-white font-bold text-left
                 cursor-pointer dark:bg-dark-third">
                    {{$i}}
                </div>
                @endfor
            </div>
        </div>
    </div>
    <div class="w-full flex relative h-16 pt-3 ">
        <div onclick="PrivacyAbout(this,'PrivacyInputPlaceWork')" class="bg-gray-200 cursor-pointer dark:bg-dark-third dark:text-white  rounded-lg p-2 absolute left-0 font-bold">
            <i class="fas fa-globe-europe"></i>&nbsp;&nbsp;Công khai
        </div>
        <div onclick="addPlaceWorkSS()" class=" cursor-pointer bg-1877F2 text-white ml-3 rounded-lg p-2 absolute right-0 font-bold">
            Lưu
        </div>
        <div id="btnHuyPlaceWork" onclick="" class=" cursor-pointer bg-gray-200 dark:bg-dark-third dark:text-white  rounded-lg p-2 absolute right-12 font-bold">
            Hủy
        </div>
    </div>
</div>