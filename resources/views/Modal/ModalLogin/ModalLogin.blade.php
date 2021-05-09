<div id="get-account-main" class="wrapper-scrollbar w-11/12 fixed top-50per left-50per transform-translate-50per
        p-4 opacity-100 bg-white z-50 border-2 border-solid border-gray-300 sm:w-4/5 sm:mt-12 
        lg:w-3/5 xl:w-3/10 xl:mt-4">
    <div class="w-full mx-auto">
        <div class="w-full text-center">
            <span onclick="closePost()" class="bg-gray-300 px-2.5 dark:text-white font-bold
            rounded-full dark:bg-dark-second cursor-pointer absolute text-3xl top-2 right-4">
                &times;
            </span>
        </div>
    </div>
    <div class="w-full my-2">
        <div class="w-52 mx-auto mt-3">
            <img src="{{ $account->AnhDaiDien }}" class="w-full h-52 object-cover rounded-full" alt="">
            <p class="text-center py-1 font-bold text-xm">
                {{ $account->Ho . " " . $account->Ten }}
            </p>
        </div>
        <form class="w-full bg-white" action="{{ route('ProcessLoginModal') }}" method="post" id="modalFormLogin">
            {{ csrf_field() }}
            <input type="hidden" name="emailOrPhone" value="{{ $account->EmailOrPhone }}">
            <input type="hidden" name="account" value="{{ json_encode($account) }}">
            <input type="text" name="passWord" placeholder="Mật khẩu" class="p-2.5 
            rounded-lg w-full mx-auto my-2 border-2 border-solid border-blue-500 
            @error('passWord') border-red-600 text-red-600 placeholder-red-600 @enderror">
            <p class="py-2 text-left pl-3 font-bold text-red-600">
                @error('passWord') {{ $message  }} @enderror
                @isset($message){{$message}}@endisset
            </p>
            @if ($remember == 0)
            <input type="checkbox" onchange="onChangeCheckBoxSavePassword(this)" value="false" name="remember" id="save_password" class="transform scale-125 ml-0.5 my-2 mr-3 mb-2">
            Nhớ mật khẩu <br>
            @else
            <input type="checkbox" onchange="onChangeCheckBoxSavePassword(this)" value="false" name="remember" class="transform scale-125 ml-0.5 my-2 mr-3 mb-2" checked>
            Nhớ mật khẩu <br>
            @endif
            <button onclick="loginSubmit(event,'1')" class="mx-auto w-full p-3 my-2.5 border-none rounded-lg bg-1877F2 
            text-sm text-white font-bold" type="button">Đăng Nhập</button>
            <p onclick="loadajax('LoadForgetAccount','second')" class="text-1877F2 bg-white p-4 pb-0 
            bg-white cursor-pointer text-center font-bold">
                Quên Tài khoản
            </p>
        </form>
    </div>
</div>