<div id="get-account-main" class="wrapper-scrollbar w-11/12 fixed top-50per left-50per transform-translate-50per
        p-4 opacity-100 bg-white z-50 border-2 border-solid border-gray-300 sm:w-4/5 sm:mt-12 
        lg:w-3/5 xl:w-5/12 xl:mt-4">
    <div class="w-full">
        <div class="w-full text-center">
            <p class="text-2xl font-bold p-2.5 dark:text-white">Lấy lại tài khoản</p>
            <span onclick="closePost()" class="bg-gray-300 px-2.5 dark:text-white font-bold
            rounded-full dark:bg-dark-second cursor-pointer absolute text-3xl top-2 right-4">
                &times;
            </span>
        </div>
    </div>
    <div class="w-full flex">
        <div class="w-70per border-2 border-solid border-gray-200">
            <p class="m-2.5">
                <b>Bạn muốn nhận mã để đặt lại tài khoản bằng cách nào ?</b>
            </p>
            @if ($user[0]->SoDienThoai == NULL)
            <div class="w-full flex py-2.5">
                <input type="radio" name="getacc" id="" class="m-2.5">
                <div class="px-2.5">
                    <div class="my-1 font-bold"><i class="fas fa-envelope-open-text"></i>&nbsp;&nbsp;
                        Gởi mã qua email
                    </div>
                    <p class="">@isset($user){{$user[0]->Email}}@endisset</p>
                </div>
            </div>
            @elseif ($user[0]->Email == NULL)
            <div class="w-full flex py-2.5">
                <input type="radio" name="getacc" id="" class="m-2.5">
                <div class="px-2.5">
                    <div class="my-1 font-bold"><i class="fas fa-mobile-alt"></i>&nbsp;&nbsp;
                        Gởi mã qua số điện thoại
                    </div>
                    <p class="">@isset($user){{$user[0]->SoDienThoai}}@endisset</p>
                </div>
            </div>
            @else
            <div class="w-full flex py-2.5">
                <input type="radio" name="getacc" id="" class="m-2.5">
                <div class="px-2.5">
                    <div class="my-1 font-bold"><i class="fas fa-envelope-open-text"></i>&nbsp;&nbsp;
                        Gởi mã qua email
                    </div>
                    <p class="">@isset($user){{$user[0]->Email}}@endisset</p>
                </div>
            </div>
            <div class="w-full flex py-2.5">
                <input type="radio" name="getacc" id="" class="m-2.5">
                <div class="px-2.5">
                    <div class="my-1 font-bold"><i class="fas fa-mobile-alt"></i>&nbsp;&nbsp;
                        Gởi mã qua số điện thoại
                    </div>
                    <p class="">@isset($user){{$user[0]->SoDienThoai}}@endisset</p>
                </div>
            </div>
            @endif
        </div>
        <div class="w-30per text-center py-4">
            <img class="w-16 h-16 mx-auto" src="{{ $user[0]->AnhDaiDien }}" alt=""><br>
            <b>{{ $user[0]->Ho . ' ' . $user[0]->Ten }}</b><br>
            <span style="font-size: 12px;">Người dùng facebook</span>
        </div>
    </div>
    <hr class="mt-4">
    <div class="btn-search-acc text-right">
        <input type="button" class="cursor-pointer w-1/3 float-left bg-1877F2 border-none 
        font-bold text-white rounded-lg p-2 mx-2" value="Gửi phản hồi">
        <input type="button" class="cursor-pointer w-1/5 bg-1877F2 border-none 
        font-bold text-white rounded-lg p-2 mx-2" value="Tiếp tục">
        <input type="button" class="cursor-pointer w-1/4 bg-1877F2 border-none 
        font-bold text-white rounded-lg p-2 mx-2" value="Không phải bạn ?">
    </div>
</div>