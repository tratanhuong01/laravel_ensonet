<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$year = explode('-', explode(' ', date("Y-m-d H:i:s"))[0])[0];
?>
<div class="w-full hidden school">
    <input oninput="OninputValueInputAbout('school',this,'NameSchool')" onclick="EventClickInputAbout('school',this,'NameSchool')" name="" id="IDTruongHocs" class="w-full my-2 p-3 border-2 border-solid border-gray-200 
    dark:bg-dark-third dark:border-dark-main shadow-lg dark:text-white  
    resize-none outline-none rounded-lg" placeholder="Trường học">
    <div class=" top-16 z-30 bg-gray-200 dark:bg-dark-second overflow-y-auto NameSchool
    border-gray-300 rounded-lg wrapper-content-right border-2 border-solid dark:border-dark-third 
    shadow-lg w-full hidden" style="max-height: 320px;">
    </div>
    <input oninput="OninputValueInputAbout('school',this,'TypeSchool')" onclick="EventClickInputAbout('school',this,'TypeSchool')" name="" id="LoaiTruong" class="w-full my-2 p-3 border-2 border-solid border-gray-200 
    dark:bg-dark-third dark:border-dark-main shadow-lg dark:text-white  
    resize-none outline-none rounded-lg" placeholder="Loại Trường">
    <div class=" top-16 z-30 bg-gray-200 dark:bg-dark-second overflow-y-auto TypeSchool
    border-gray-300 rounded-lg wrapper-content-right border-2 border-solid dark:border-dark-third 
    shadow-lg w-full hidden" style="max-height: 320px;">
    </div>
    <p class="font-bold text-xm py-2 dark:text-white" style="font-family: system-ui;">
        Khoảng thời gian</p>
    <div class="py-2 px-2 w-full dark:text-white font-bold flex">
        <div class="w-10 h-10 p-2 text-center hover:bg-gray-200 
            dark:hover:bg-dark-third rounded-full">
            <input onchange="OnChangeCheckBoxAboutOffOrOn(this,'yearAboutSchool')" type="checkbox" class="" name="" id="" style="transform: scale(1.8);" checked>
        </div>
        <div class="pl-3 py-2">
            Đã tốt nghiệp
        </div>
    </div>
    <div class="w-full p-2 flex dark:text-white font-bold yearAboutSchool">
        <p class="py-2">Từ</p>
        <div class="w-24 text-center relative dark:text-white">
            <input type="button" onclick="EventClickYearAbout('YearSchoolInputss',0)" id="YearStartSchools" class="px-4 py-2.5 dark:bg-dark-third dark:text-white bg-gray-200 
                    font-bold rounded-lg " value="Năm">
            <div class="YearStartSchoolInputss YearSchoolInputss z-50 absolute left-2 top-12 w-80 h-60 overflow-y-auto wrapper-content-right
                     shadow-lg border-gray-300 dark:border-dark-main dark:bg-dark-second 
                     bg-gray-200 hidden  " style="max-height: 200px;">
                @for($i = $year ; $i > $year - 35; $i--)
                <div onclick="choose('YearStartSchoolInput',
                '{{ $i }}',
                '{{ $i }}',
                'YearStartSchoolInputs',
                'YearStartSchools',
                'YearStartSchoolInputss')" class="w-full p-3 dark:text-white font-bold text-left
                cursor-pointer dark:bg-dark-third">
                    {{$i}}
                </div>
                @endfor
            </div>
        </div>
        <p class="py-2">Đến</p>
        <div class="w-24 text-center relative dark:text-white">
            <input type="button" onclick="EventClickYearAbout('YearSchoolInputss',1)" class="px-4 py-2.5 dark:bg-dark-third dark:text-white bg-gray-200 
                    font-bold rounded-lg" value="Năm" id="YearEndSchools">
            <div class="YearEndSchoolInputss YearSchoolInputss z-50 hidden absolute left-3.5 top-12 w-80 h-60 overflow-y-auto wrapper-content-right
                     shadow-lg border-gray-300 dark:border-dark-main dark:bg-dark-second 
                     bg-gray-200 " style="max-height: 200px;">
                @for($i = $year ; $i > $year - 35; $i--)
                <div onclick="choose('YearEndSchoolInput',
                '{{ $i }}',
                '{{ $i }}',
                'YearEndSchoolInputs',
                'YearEndSchools',
                'YearEndSchoolInputss')" class="w-full p-3 dark:text-white font-bold text-left
                 cursor-pointer dark:bg-dark-third">
                    {{$i}}
                </div>
                @endfor
            </div>
        </div>
    </div>
    <div class="w-full flex relative h-16 pt-3 ">
        <div onclick="PrivacyAbout(this,'PrivacyInputSchool')" class="bg-gray-200 cursor-pointer dark:bg-dark-third dark:text-white  rounded-lg p-2 absolute left-0 font-bold">
            <i class="fas fa-globe-europe"></i>&nbsp;&nbsp;Công khai
        </div>
        <div onclick="add(dashboard.routes.ProcessAddSchoolAbout, 'school' , 'schoolMain' )" class=" cursor-pointer bg-1877F2 text-white ml-3 rounded-lg p-2 absolute right-0 font-bold">
            Lưu
        </div>
        <div onclick="AddView('school')" class=" cursor-pointer bg-gray-200 dark:bg-dark-third dark:text-white  rounded-lg p-2 absolute right-12 font-bold">
            Hủy
        </div>
    </div>
</div>
<!-- formData -->
<div id="formDataSchool">
    <input name="IDTruongHoc" type="hidden" id="schoolNameInput" value="">
    <input name="TypeSchool" type="hidden" id="schoolTypeInput" value="">
    <input name="YearStartSchoolInput" type="hidden" id="YearStartSchoolInputs" value="">
    <input name="YearEndSchoolInput" type="hidden" id="YearEndSchoolInputs" value="">
    <input name="PrivacyInputSchool" type="hidden" id="PrivacyInputSchool" value="">
</div>
<!-- formData -->