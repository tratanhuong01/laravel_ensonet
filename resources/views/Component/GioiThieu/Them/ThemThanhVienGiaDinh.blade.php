<div class="w-full hidden memberFamily">
    <div class="w-full relative">
        <input oninput="OninputValueInputAbout('{{$idTaiKhoan}}',this,'MemberFamily')" onclick="EventClickInputAbout('{{$idTaiKhoan}}',this,'MemberFamily')" name="" id="IDMemberFamilys" class="w-full my-2 p-3 border-2 border-solid border-gray-200 
                dark:bg-dark-third dark:border-dark-main shadow-lg dark:text-white  resize-none outline-none rounded-lg" placeholder="Thành viên gia đình">
        <div class="MemberFamily hidden z-30 bg-gray-200 dark:bg-dark-second overflow-y-auto border-gray-300 rounded-lg
        wrapper-content-right border-2 border-solid dark:border-dark-third shadow-lg w-full" style="max-height: 288px;">

        </div>
    </div>
    <div class="w-full relative">
        <input oninput="OninputValueInputAbout('{{$idTaiKhoan}}',this,'RelationShipFamily')" onclick="EventClickInputAbout('{{$idTaiKhoan}}',this,'RelationShipFamily')" name="" id="IDRelationShipFamilys" class="w-full my-2 p-3 border-2 border-solid border-gray-200 
                dark:bg-dark-third dark:border-dark-main shadow-lg dark:text-white  resize-none outline-none rounded-lg" placeholder="Mối quan hệ">
        <div class="RelationShipFamily hidden z-30 bg-gray-200 dark:bg-dark-second overflow-y-auto border-gray-300 rounded-lg
        wrapper-content-right border-2 border-solid dark:border-dark-third shadow-lg w-full" style="max-height: 288px;">

        </div>
    </div>
    <div class="w-full flex pb-1 pt-3 relative h-16">
        <div onclick="PrivacyAbout(this,'PrivacyInputMemberFamily')" class="bg-gray-200 cursor-pointer dark:bg-dark-third dark:text-white  rounded-lg p-2 absolute left-0 font-bold">
            <i class="fas fa-globe-europe"></i>&nbsp;&nbsp;Công khai
        </div>
        <div onclick="add(dashboard.routes.ProcessAddSchoolAbout, 'school' , 'schoolMain' )" class=" cursor-pointer bg-1877F2 text-white ml-3 rounded-lg p-2 absolute right-0 font-bold">
            Lưu
        </div>
        <div onclick="AddView('memberFamily')" class=" cursor-pointer bg-gray-200 dark:bg-dark-third dark:text-white  rounded-lg p-2 absolute right-12 font-bold">
            Hủy
        </div>
    </div>
</div>