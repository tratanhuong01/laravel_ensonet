<div class="w-full HomeTown" id="{{ $data->IDQueQuan }}homeTownEdit">
    <input oninput="OninputValueInputAbout('',this,'PlaceHomeTown')" onclick="EventClickInputAbout('',this,'PlaceHomeTown')" name="" id="IDDiaChiHome" class="w-full my-2 p-3 border-2 border-solid border-gray-200 
            dark:bg-dark-third dark:border-dark-main shadow-lg dark:text-white  
            resize-none outline-none rounded-lg" placeholder="Quê quán" value="{{ $data->TenDiaChi }}">
    <div class=" top-16 z-30 bg-gray-200 dark:bg-dark-second overflow-y-auto PlaceHomeTown 
    border-gray-300 rounded-lg wrapper-content-right border-2 border-solid dark:border-dark-third 
    shadow-lg w-full hidden" style="max-height: 320px;">
    </div>
    <div class="w-full flex relative h-16 pt-3 ">
        <div onclick="PrivacyAbout(this,'PrivacyInputHomeTown')" class="bg-gray-200 cursor-pointer dark:bg-dark-third dark:text-white  rounded-lg p-2 absolute left-0 font-bold">
            <i class="fas fa-globe-europe"></i>&nbsp;&nbsp;Công khai
        </div>
        <div id="btnLuuHomeTown" class=" cursor-pointer bg-1877F2 text-white ml-3 rounded-lg p-2 absolute right-0 font-bold">
            Lưu
        </div>
        <div id="btnHuyHomeTown" class=" cursor-pointer bg-gray-200 dark:bg-dark-third dark:text-white  rounded-lg p-2 absolute right-12 font-bold">
            Hủy
        </div>
    </div>
    <!-- formData -->
    <div id="formDataHomeTown">
        <input name="IDDiaChiHome" type="hidden" id="homeTownInput" value="{{ $data->IDDiaChi }}">
        <input name="PrivacyInputHomeTown" type="hidden" id="PrivacyInputHomeTown" value="{{ $data->IDQuyenRiengTu }}">
    </div>
    <!-- formData -->
</div>