<div class="w-1/4 border-r-2 px-2 border-solid border-gray-200">
    <p class="font-bold text-xl py-2 dark:text-white" style="font-family: system-ui;">Giới thiệu</p>
    <ul class="w-full py-2 activeAboutUl">
        <li onclick="loadDataAbout(config.routes.ProcessAjaxDashboardAbout,
        '{{ $data[0]->IDTaiKhoan }}',this)" class="activeAboutLi cursor-pointer bg-blue-100 dark:bg-dark-third text-1877F2 p-2 rounded-lg text-15px font-bold">
            Tổng quan
        </li>
        <li onclick="loadDataAbout(config.routes.ProcessAjaxWorkAndStudyAbout,
        '{{ $data[0]->IDTaiKhoan }}',this)" class="cursor-pointer hover:bg-gray-200 dark:hover:bg-dark-third dark:text-white p-2 mt-2 rounded-lg text-15px font-bold">
            Công việc và học vấn
        </li>
        <li onclick="loadDataAbout(config.routes.ProcessAjaxPlaceLivedAbout,
        '{{ $data[0]->IDTaiKhoan }}',this)" class="cursor-pointer hover:bg-gray-200 dark:hover:bg-dark-third  dark:text-white p-2 mt-2 rounded-lg text-15px font-bold">
            Nơi từng sống
        </li>
        <li onclick="loadDataAbout(config.routes.ProcessAjaxInfoSimpleAndContactAbout,
        '{{ $data[0]->IDTaiKhoan }}',this)" class="cursor-pointer hover:bg-gray-200 dark:hover:bg-dark-third  dark:text-white p-2 mt-2 rounded-lg text-15px font-bold">
            Thông tin cơ bản và liên hệ
        </li>
        <li onclick="loadDataAbout(config.routes.ProcessAjaxFamilyAndRelationshipAbout,
        '{{ $data[0]->IDTaiKhoan }}',this)" class="cursor-pointer hover:bg-gray-200 dark:hover:bg-dark-third  dark:text-white p-2 mt-2 rounded-lg text-15px font-bold">
            Gia đình và các mối liên hệ
        </li>
        <li onclick="loadDataAbout(config.routes.ProcessAjaxDetailAboutUserAbout,
        '{{ $data[0]->IDTaiKhoan }}',this)" class="cursor-pointer hover:bg-gray-200 dark:hover:bg-dark-third  dark:text-white p-2 mt-2 rounded-lg text-15px font-bold">
            Chi tiết về Hưởng
        </li>
        <li onclick="loadDataAbout(config.routes.ProcessAjaxEventLifeAbout,
        '{{ $data[0]->IDTaiKhoan }}',this)" class="cursor-pointer hover:bg-gray-200 dark:hover:bg-dark-third  dark:text-white p-2 mt-2 rounded-lg text-15px font-bold">
            Sự kiện trong đời
        </li>
    </ul>
</div>
<script>
    var dashboard = {
        IDTaiKhoan: '{{ $idTaiKhoan }}',
        routes: {
            ProccessAddPlaceWorkAbout: "{{ route('ProccessAddPlaceWorkAbout') }}",
            ProcessAddSchoolAbout: "{{ route('ProcessAddSchoolAbout') }}",
            ProcessAddPlaceLiveCurrent: "{{ route('ProcessAddPlaceLiveCurrent') }}",
            ProcessAddHomeTown: "{{ route('ProcessAddHomeTown') }}",
            ProcessAddPlaceLived: "{{ route('ProcessAddPlaceLived') }}",

            ProcessAddIntroYouSelf: "{{ route('ProcessAddIntroYouSelf') }}",
            ProcessAddWayReadName: "{{ route('ProcessAddWayReadName') }}",
            ProcessAddNickName: "{{ route('ProcessAddNickName') }}",
            ProcessAddFavoriteQuote: "{{ route('ProcessAddFavoriteQuote') }}",
            ProcessEditAboutMain: "{{ route('ProcessEditAboutMain') }}"
        }
    }
</script>