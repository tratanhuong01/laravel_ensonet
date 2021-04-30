<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$year = explode('-', explode(' ', date("Y-m-d H:i:s"))[0])[0];
?>
<div class="w-full birthday" id="">
    <div class="w-full p-2 flex dark:text-white font-bold">
        <div class="w-32 text-center relative dark:text-white">
            <button onclick="EventClickYearAbout('birthDayFull',0)" class="px-4 py-2.5 dark:bg-dark-third dark:text-white bg-gray-300 
             font-bold rounded-lg" id="MonthBirths">Tháng 11 &nbsp;&nbsp;<i class="fas fa-caret-down"></i></button>
            <div class="MonthBirth z-50 absolute left-2 top-12 w-80 h-60 overflow-y-auto wrapper-content-right
            shadow-lg border-gray-300 dark:border-dark-main dark:bg-dark-second 
            bg-gray-200 hidden birthDayFull " style="max-height: 200px;">
                @for($i = 1 ; $i <= 12; $i++) <?php $dt = '&nbsp;&nbsp;<i class="fas fa-caret-down"></i>' ?> <div onclick="choose1('MonthBirth','{{ $i }} ','Tháng {{ $i.$dt }}',
                'MonthBirthInput','MonthBirths','MonthBirth')" class="w-full p-3 dark:text-white font-bold text-left
                cursor-pointer dark:bg-dark-third">{{$i}}
            </div>
            @endfor
        </div>
        <div class="w-24 text-center relative dark:text-white">
            <button onclick="EventClickYearAbout('birthDayFull',1)" class="px-4 py-2.5 dark:bg-dark-third dark:text-white bg-gray-300 
             font-bold rounded-lg" id="DayBirths">Tháng 11 &nbsp;&nbsp;<i class="fas fa-caret-down"></i></button>
            <div class="DayBirth z-50 absolute left-2 top-12 w-80 h-60 overflow-y-auto wrapper-content-right
            shadow-lg border-gray-300 dark:border-dark-main dark:bg-dark-second 
            bg-gray-200 hidden birthDayFull " style="max-height: 200px;">
                @for($i = 1 ; $i <= 31; $i++) <?php $dt = '&nbsp;&nbsp;<i class="fas fa-caret-down"></i>' ?> <div onclick="choose1('DayBirth',
                '{{ $i }} ',
                '{{ $i.$dt }}',
                'DayBirthInput',
                'DayBirths',
                'DayBirth')" class="w-full p-3 dark:text-white font-bold text-left
                cursor-pointer dark:bg-dark-third">
                    {{$i}} </div>
            @endfor
        </div>
    </div>

</div>
<div>
    <button onclick="PrivacyAbout(this,'PrivacyInputDayAnMonthBirth')" class="bg-gray-300  dark:bg-dark-third dark:text-white  rounded-lg p-2.5 font-bold">
        <i class="fas fa-globe-europe"></i>&nbsp;&nbsp;Công khai
    </button>
</div>
</div>
<div class="w-full p-2 flex dark:text-white font-bold">
    <div class="w-32 text-center relative dark:text-white">
        <button onclick="EventClickYearAbout('birthDayFull',2)" class="px-4 py-2.5 dark:bg-dark-third dark:text-white bg-gray-300 
             font-bold rounded-lg" id="YearBirths">Tháng 11 &nbsp;&nbsp;<i class="fas fa-caret-down"></i></button>
        <div class="YearBirth z-50 absolute left-2 top-12 w-80 h-60 overflow-y-auto wrapper-content-right
            shadow-lg border-gray-300 dark:border-dark-main dark:bg-dark-second 
            bg-gray-200 hidden birthDayFull " style="max-height: 200px;">
            @for($i = $year ; $i > $year - 80; $i--) <?php $dt = '&nbsp;&nbsp;<i class="fas fa-caret-down"></i>' ?> <div onclick="choose1('MonthBirth',
                '{{ $i }} ',
                '{{ $i.$dt }}',
                'YearBirthInput',
                'YearBirths',
                'YearBirth')" class="w-full p-3 dark:text-white font-bold text-left
                cursor-pointer dark:bg-dark-third">
                {{$i}}
            </div>
            @endfor
        </div>
    </div>
    <div class="w-24 text-center relative dark:text-white">

    </div>
    <div>
        <button onclick="PrivacyAbout(this,'PrivacyInputYearBirth')" class="bg-gray-300  dark:bg-dark-third dark:text-white  rounded-lg p-2.5 font-bold">
            <i class="fas fa-globe-europe"></i>&nbsp;&nbsp;Công khai
        </button>
    </div>
</div>
<div class="w-full flex relative h-16 pt-3 ">
    <div id="btnLuuBirthDay" class=" cursor-pointer bg-1877F2 text-white ml-3 rounded-lg p-2 absolute right-0 font-bold">
        Lưu
    </div>
    <div id="btnHuyBirthDay" class=" cursor-pointer bg-gray-200 dark:bg-dark-third dark:text-white  rounded-lg p-2 absolute right-12 font-bold">
        Hủy
    </div>
</div>
</div>