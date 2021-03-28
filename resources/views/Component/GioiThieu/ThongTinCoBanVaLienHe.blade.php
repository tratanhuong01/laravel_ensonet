<form action="" method="post" id="formTongQuan">
    <input type="hidden" id="IDTaiKhoanU" name="IDTaiKhoan" value="{{ $idTaiKhoan }}">
    <input type="hidden" name="IDQuyenRiengTu" value="CONGKHAI">
</form>
<div class="w-full">
    <ul class="w-full py-2 px-4  dark:text-white mainAboutFull">
        <li class="w-full pb-6 flex  dark:text-white" style="font-size: 16px;">
            <div class="w-1/12 py-3">
                <i class="fas fa-phone text-2xl" style="transform: rotate(90deg);"></i>
            </div>
            <div class="w-3/4">
                <p class="font-bold text-xm py-1" style="font-family: system-ui;">0354114665</p>
                <p>Di động</p>
            </div>
            <div class="w-2/12">
                <ul class="w-full flex">
                    <li class="p-2 color-word"><i class="fas fa-globe-europe text-xl cursor-pointer"></i>
                    </li>
                    <li class="p-2 color-word"><i class="far fa-edit text-xl cursor-pointer"></i></li>
                    <li class="p-2 color-word"><i class="far fa-trash-alt text-xl cursor-pointer"></i></li>
                </ul>
            </div>
        </li>
        <li class="w-full pb-6 flex" style="font-size: 16px;">
            <div class="w-1/12 py-3">
                <i class="far fa-envelope text-2xl"></i>
            </div>
            <div class="w-3/4">
                <p class="font-bold text-xm py-1" style="font-family: system-ui;">tratanhuong01@gmail.com
                </p>
                <p>Email</p>
            </div>
            <div class="w-2/12">
                <ul class="w-full flex">
                    <li class="p-2 color-word"><i class="fas fa-globe-europe text-xl cursor-pointer"></i>
                    </li>
                    <li class="p-2 color-word"><i class="far fa-edit text-xl cursor-pointer"></i></li>
                    <li class="p-2 color-word"><i class="far fa-trash-alt text-xl cursor-pointer"></i></li>
                </ul>
            </div>
        </li>
        <li class="w-full pb-6 flex" style="font-size: 16px;">
            <div class="w-1/12 py-3">
                <i class="fas fa-transgender-alt text-2xl"></i>
            </div>
            <div class="w-3/4">
                <p class="font-bold text-xm py-1" style="font-family: system-ui;">Nam
                </p>
                <p>Giới tính</p>
            </div>
            <div class="w-2/12">
                <ul class="w-full flex">
                    <li class="p-2 color-word"><i class="fas fa-globe-europe text-xl cursor-pointer"></i>
                    </li>
                    <li class="p-2 color-word"><i class="far fa-edit text-xl cursor-pointer"></i></li>
                    <li class="p-2 color-word"><i class="far fa-trash-alt text-xl cursor-pointer"></i></li>
                </ul>
            </div>
        </li>
        @include('Component/GioiThieu/Them/ThemGioiTinh')
        <li class="w-full pb-6 flex flex-wrap" style="font-size: 16px;">
            <div class="w-1/12 py-3">
                <i class="fas fa-birthday-cake text-2xl"></i>
            </div>
            <div class="w-3/4">
                <p class="font-bold text-xm py-1" style="font-family: system-ui;">1 tháng 10
                </p>
                <p>Ngày sinh</p>
            </div>
            <div class="w-2/12">
                <ul class="w-full flex">
                    <li class="p-2 color-word"><i class="fas fa-globe-europe text-xl cursor-pointer"></i>
                    </li>
                    <li class="p-2 color-word"><i class="far fa-edit text-xl cursor-pointer"></i></li>
                    <li class="p-2 color-word"><i class="far fa-trash-alt text-xl cursor-pointer"></i></li>
                </ul>
            </div>
            <div class="w-1/12 py-3">

            </div>
            <div class="w-3/4">
                <p class="font-bold text-xm py-1" style="font-family: system-ui;">2001
                </p>
                <p>Năm sinh</p>
            </div>
            <div class="w-2/12">
                <ul class="w-full flex">
                    <li class="p-2 color-word"><i class="fas fa-globe-europe text-xl cursor-pointer"></i>
                    </li>
                    <li class="p-2 color-word"><i class="far fa-edit text-xl cursor-pointer"></i></li>
                    <li class="p-2 color-word"><i class="far fa-trash-alt text-xl cursor-pointer"></i></li>
                </ul>
            </div>
        </li>
        @include('Component/GioiThieu/Them/ThemNgaySinh')
    </ul>
</div>