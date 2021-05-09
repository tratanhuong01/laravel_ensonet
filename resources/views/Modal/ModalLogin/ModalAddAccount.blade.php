<div id="get-account-main" class="wrapper-scrollbar w-11/12 fixed top-50per left-50per transform-translate-50per
        p-4 opacity-100 bg-white z-50 border-2 border-solid border-gray-300 sm:w-4/5 sm:mt-12 
        lg:w-3/5 xl:w-3/10 xl:mt-4">
    <div class="w-full mx-auto">
        <div class="w-full text-center">
            <p class="text-2xl font-bold p-2.5 dark:text-white">Đăng nhập ensonet</p>
            <span onclick="closePost()" class="bg-gray-300 px-2.5 dark:text-white font-bold
            rounded-full dark:bg-dark-second cursor-pointer absolute text-3xl top-2 right-4">
                &times;
            </span>
        </div>
    </div>
    <div class="w-full my-2">
        <form class="w-full bg-white" action="{{ route('ProcessLoginModal') }}" id="modalFormLogin" method="post" autocomplete="off">
            {{ csrf_field() }}
            <input type="text" name="emailOrPhone" class="w-96per p-3 m-2.5 rounded-lg border-2 border-solid border-gray-200 
            @error('emailOrPhone') border-red-600 text-red-600 placeholder-red-600 @enderror" placeholder="Email Hoặc Số Điện Thoại" value="{{ session()->has('emailOrPhone') ? Session::get('emailOrPhone') : '' }}" autocomplete="false" readonly onfocus="this.removeAttribute('readonly');">
            {{Session::forget('emailOrPhone')}}
            <p class="py-2 text-left pl-3 font-bold text-red-600">
                @error('emailOrPhone'){{$message }}@enderror
            </p>
            <?php
            if (session()->has('emailOrPhone'))
                session()->forget('emailOrPhone');
            ?>
            <input type="password" name="passWord" class="w-96per p-3 m-2.5 rounded-lg border-2 border-solid border-gray-200 
            " placeholder="Mật Khẩu" value="" autocomplete="false" readonly onfocus="this.removeAttribute('readonly');">
            <p class="py-2 text-left pl-3 font-bold text-red-600">
                @error('passWord') {{ $message  }} @enderror
                @isset($message){{$message}}@endisset
            </p>
            <button onclick="loginSubmit(event,'0')" class="mx-auto ml-2 w-93per p-3 my-2.5 border-none rounded-lg 
            bg-1877F2 text-sm text-white font-bold" type="button">Đăng Nhập</button>
            <p onclick="loadajax('LoadForgetAccount','second')" class="text-1877F2 bg-white p-4 bg-white 
            cursor-pointer text-center font-bold">
                Quên Tài khoản
            </p>
        </form>
    </div>
</div>