
<div id="get-account-main" class="wrapper-scrollbar w-11/12 fixed top-50per left-50per transform-translate-50per
        p-4 opacity-100 bg-white z-50 border-2 border-solid border-gray-300 sm:w-4/5 sm:mt-12 
        lg:w-3/5 xl:w-5/12 xl:mt-4">
    <div class="w-full mx-auto">
        <span onclick="closeGetAcc()" class="cursor-pointer text-3xl top-4 right-4">&times;</span>
        <p class="py-2 font-bold">Xác nhận tài khoản</p>
        <hr>
        <br>
    </div>
    <div class="w-full">
    {{ csrf_field() }}
        <div class="w-70per mx-auto my-4">
            <p>Ensonet đã gửi một mã gồm 6 chữ số đến <span class="font-bold"> {{ $email_register }} </span> vui lòng nhập đúng để 
            tạo tài khoản</p>
            <input class="w-full p-4 my-4 border-2 border-solid border-gray-800" type="text" 
            name="code_veri" id="code_veri" placeholder="Nhập mã có 6 chữ số..">
            <input type="hidden" name="Email" id="Email" value="{{ $email_register }}">
        </div>
        <hr>
        <div class="w-full mt-4 text-right">
            <input type="submit" onclick="submitFormVerify()" 
            class="cursor-pointer w-1/5 p-2 bg-1877F2 border-none font-bold 
            text-white rounded-lg" value="Xác nhận">
            <span onclick="" class="cursor-pointer w-1/4 p-2.5 bg-1877F2 border-none font-bold 
            text-white rounded-lg">Gửi lại</span>
        </div>
    </div>
</div>