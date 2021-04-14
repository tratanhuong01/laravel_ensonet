<div id="get-account-main" class="wrapper-scrollbar w-11/12 fixed top-50per left-50per transform-translate-50per
        p-4 opacity-100 bg-white z-50 border-2 border-solid border-gray-300 sm:w-4/5 sm:mt-12 
        lg:w-3/5 xl:w-5/12 xl:mt-4">
    <div class="w-full mx-auto">
        <span onclick="closePost()" class="cursor-pointer text-3xl top-4 right-4">&times;</span>
        <p class="py-2 font-bold">Đã xác nhận thành công</p>
        <hr>
        <br>
    </div>
    <div class="w-full hidden">
        Bạn đã xác nhận thành công tài khoản của mình
        bằng số điện thoại 085 243 6786. Bạn sẽ sử dụng số điện thoại này để đăng nhập.
    </div>
    <div class="w-full">
        Bạn đã xác nhận thành công tài khoản của mình
        bằng email <b>{{ $arr['emailOrPhone'] }}</b>. Bạn sẽ sử dụng email này để đăng nhập.
    </div>
    <hr>
    <div class="w-full">
        <form action="{{ route('NewBieLogin') }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="emailOrPhone" id="" value="{{ $arr['emailOrPhone'] }}">
            <input type="hidden" name="passWord" id="" value="{{ $arr['passWord'] }}">
            <button type="submit" class="p-2 bg-blue-300 text-white float-right mr-3">OK</button>
        </form>
    </div>
</div>