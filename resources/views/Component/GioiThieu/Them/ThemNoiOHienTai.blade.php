<div class="w-full hidden PlaceLiveCurrent">
    <input oninput="OninputValueInputAbout('placeWork',this,'LiveCurrents')" onclick="EventClickInputAbout('placeWork',this,'LiveCurrents')" name="" id="IDDiaChiLive" class="w-full my-2 p-3 border-2 border-solid border-gray-200 
            dark:bg-dark-third dark:border-dark-main shadow-lg dark:text-white  
            resize-none outline-none rounded-lg" placeholder="Tỉnh / Thành phố hiện tại">
    <div class=" top-16 z-30 bg-gray-200 dark:bg-dark-second overflow-y-auto LiveCurrents
    border-gray-300 rounded-lg wrapper-content-right border-2 border-solid dark:border-dark-third 
    shadow-lg w-full hidden" style="max-height: 320px;">
    </div>
    <div class="w-full flex relative h-16 pt-3 ">
        <div onclick="PrivacyAbout(this,'PrivacyInputLiveCurrent')" class="bg-gray-200 cursor-pointer dark:bg-dark-third dark:text-white  rounded-lg p-2 absolute left-0 font-bold">
            <i class="fas fa-globe-europe"></i>&nbsp;&nbsp;Công khai
        </div>
        <div onclick="addPlaceLiveCurrent()" class=" cursor-pointer bg-1877F2 text-white ml-3 rounded-lg p-2 absolute right-0 font-bold">
            Lưu
        </div>
        <div onclick="AddView('PlaceLiveCurrent')" class=" cursor-pointer bg-gray-200 dark:bg-dark-third dark:text-white  rounded-lg p-2 absolute right-12 font-bold">
            Hủy
        </div>
    </div>
</div>