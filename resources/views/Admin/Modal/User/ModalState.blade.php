<div id="modal-two" class="shadow-sm border border-solid border-gray-500 py-3 pl-1.5 pr-1.5 pt-0
        bg-white w-full fixed z-50 top-1/2 left-1/2 dark:bg-dark-second rounded-lg 
        sm:w-10/12 md:w-2/3 lg:w-2/3 xl:w-1/3" style="transform: translate(-50%,-50%);z-index:10;">
    <div class="w-full text-center relative">
        <p class="text-2xl font-bold p-2.5 ">Cập nhật trạng thái người dùng</p>
        <span onclick="returnModal()" class="p-2 rounded-full cursor-pointer absolute top-0.5 left-2">
            <i class='bx bxs-left-arrow-alt text-3xl '></i></span>
        <hr>
    </div>
    <ul class="w-full p-2">
        <li class="w-full flex p-2 cursor-pointer">
            <div class="w-2/12 mr-3">
                <i class="fas fa-globe-europe text-3xl py-4 px-5 bg-gray-200 rounded-full"></i>
            </div>
            <div class="w-9/12">
                <p class="font-bold text-xl py-1 " style="font-family: system-ui;">Checkpoint</p>
                <p class="">Người dùng sẽ phải xác nhận các hoạt động của mình để mở tài khoản</p>
            </div>
            <div class="w-1/12 p-6">
                <input onchange="handelOnChangeStateUserAdmin('{{ $idTaiKhoan }}',1)" type="radio" class="text-3xl h-4" name="state" style="transform: scale(1.5);">
            </div>
        </li>
        <li class="w-full flex p-2 cursor-pointer">
            <div class="w-2/12 mr-3">
                <i class="fas fa-globe-europe text-3xl py-4 px-5 bg-gray-200 rounded-full"></i>
            </div>
            <div class="w-9/12">
                <p class="font-bold text-xl py-1 " style="font-family: system-ui;">Khóa</p>
                <p class="">Người dùng sẽ không thể truy cập được tài khoản</p>
            </div>
            <div class="w-1/12 p-6">
                <input onchange="handelOnChangeStateUserAdmin('{{ $idTaiKhoan }}',2)" type="radio" class="text-3xl h-4" name="state" style="transform: scale(1.5);">
            </div>
        </li>
        <li class="w-full flex p-2 cursor-pointer">
            <div class="w-2/12 mr-3">
                <i class="fas fa-user-friends text-3xl py-4 px-4 bg-gray-200 rounded-full"></i>
            </div>
            <div class="w-9/12">
                <p class="font-bold text-xl py-1 " style="font-family: system-ui;">Bình thường
                </p>
                <p class="">Người dùng sẽ có thể sử dụng đầy đủ chức năng của mạng xã hội</p>
            </div>
            <div class="w-1/12 p-6">
                <input onchange="handelOnChangeStateUserAdmin('{{ $idTaiKhoan }}',0)" type="radio" class="text-3xl h-4" name="state" style="transform: scale(1.5);">
            </div>
        </li>
        <li class="w-full flex p-2 cursor-pointer">
            <div class="w-2/12 mr-3">
                <i class="fas fa-lock text-3xl py-4 px-5 bg-gray-200 rounded-full"></i>
            </div>
            <div class="w-9/12">
                <p class="font-bold text-xl py-1 " style="font-family: system-ui;">Hạn chế</p>
                <p class="">Người dùng có thể bị hạn chế một số tính năng do vi phạm quyền sử
                    dụng mạng xã hội</p>
            </div>
            <div class="w-1/12 p-6">
                <input onchange="handelOnChangeStateUserAdmin('{{ $idTaiKhoan }}',4)" type="radio" class="text-3xl h-4" name="state" style="transform: scale(1.5);">
            </div>
        </li>
    </ul>
</div>