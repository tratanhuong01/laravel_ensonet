<div class="w-full relative relationShip" id="{{ $data->IDHonNhan }}relationShipEdit">

    <input oninput="OninputValueInputAbout('',this,'RelationShip')" onclick="EventClickInputAbout('',this,'RelationShip')" name="" id="IDRelationShips" class="w-full my-2 p-3 border-2 border-solid border-gray-200 
        dark:bg-dark-third dark:border-dark-main shadow-lg dark:text-white  
        resize-none outline-none rounded-lg" placeholder="Độc Thân" id="IDRelationShips">
    <div class="RelationShip top-16 z-30 bg-gray-200 dark:bg-dark-second overflow-y-auto postionA
    border-gray-300 rounded-lg wrapper-content-right border-2 border-solid dark:border-dark-third 
    shadow-lg w-full hidden" style="max-height: 320px;">
    </div>
    <div class="w-full flex relative h-16 mt-3">
        <div onclick="PrivacyAbout(this,'PrivacyInputRelationShip')" class="bg-gray-200 cursor-pointer dark:bg-dark-third dark:text-white  rounded-lg p-2 absolute left-0 font-bold">
            <i class="fas fa-globe-europe"></i>&nbsp;&nbsp;Công khai
        </div>
        <div id="btnLuuRelationShip" class="bg-1877F2 cursor-pointer text-white rounded-lg p-2 absolute right-0 font-bold">
            Lưu
        </div>
        <div id="btnHuyRelationShip" class="bg-gray-200 cursor-pointer dark:bg-dark-third dark:text-white  rounded-lg p-2 absolute right-12 font-bold">
            Hủy
        </div>
    </div>
</div>