<div class="w-full hidden NameOtherss">
    <input type="button" onclick="EventClickInputAbout('',this,'NameOthers')" name="" id="TypeNickNamess" class="w-full my-2 cursor-pointer border-2 border-solid border-gray-200 p-2.5
            dark:bg-dark-third flex font-bold dark:border-dark-main shadow-lg dark:text-white  rounded-lg">
    <div class="NameOthers hidden z-30 w-full bg-gray-200 dark:bg-dark-second overflow-y-auto border-gray-300 rounded-lg
    wrapper-content-right border-2 border-solid dark:border-dark-third shadow-lg" style="max-height: 176px;">
    </div>
    <input name="" id="NickNameText" class="w-full my-2 p-2 border-2 border-solid border-gray-200 
            dark:bg-dark-third dark:border-dark-main shadow-lg dark:text-white  resize-none outline-none h-16 rounded-lg
                        " placeholder="Biệt danh">
    <div class="w-full flex relative h-16 pt-3 ">
        <div onclick="PrivacyAbout(this,'PrivacyInputNameOtherss')" class="bg-gray-200 cursor-pointer dark:bg-dark-third dark:text-white  rounded-lg p-2 absolute left-0 font-bold">
            <i class="fas fa-globe-europe"></i>&nbsp;&nbsp;Công khai
        </div>
        <div onclick="addChild(dashboard.routes.ProcessAddNickName,'NameOtherss',
        'NameNickName','NickNameText','NickNameMain')" class=" cursor-pointer bg-1877F2 text-white ml-3 rounded-lg p-2 absolute right-0 font-bold">
            Lưu
        </div>
        <div onclick="AddView('NameOtherss')" class=" cursor-pointer bg-gray-200 dark:bg-dark-third dark:text-white  rounded-lg p-2 absolute right-12 font-bold">
            Hủy
        </div>
    </div>
</div>