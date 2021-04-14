<div id="get-account-main" class="wrapper-scrollbar w-11/12 fixed top-50per left-50per transform-translate-50per
        p-4 opacity-100 bg-white z-50 border-2 border-solid border-gray-300 sm:w-4/5 sm:mt-12 
        lg:w-3/5 xl:w-5/12 xl:mt-4">
    <div class="w-full mx-auto">
        <span onclick="closePost()" class="cursor-pointer absolute text-4xl top-4 right-4">&times;</span>
        <p class="py-2 font-bold">Xác nhận tài khoản</p>
        <hr>
        <br>
    </div>
    <div class="w-full">
        {{ csrf_field() }}
        <div class="w-70per mx-auto my-4">
            <p>Ensonet đã gửi một mã gồm 6 chữ số đến <span class="font-bold"> {{ $emailOrPhoneRegister }} </span> vui lòng nhập đúng để
                tạo tài khoản</p>
            <input oninput="checkValueTypeCode()" class="w-full p-4 my-4 border-2 border-solid border-gray-800" type="text" name="code_veri" id="code_veri" placeholder="Nhập mã có 6 chữ số..">
            <ul class="w-full mb-4 mt-4">
                <li class="w-full text-red-600 value_error">@isset($errors) {{ $errors }} @endisset</li>
            </ul>
        </div>
        <hr>
        <div class="w-full mt-4 text-right">
            <form action="" id="formSendAgainCode">
                <input type="hidden" name="emailOrPhone" id="emailOrPhone" value="{{ $emailOrPhoneRegister }}">
                <input type="button" onclick="submitFormVerify()" class="cursor-pointer w-1/5 p-2 bg-1877F2 border-none font-bold 
                text-white rounded-lg" value="Xác nhận" id="btn-submit-veri">
                <span onclick="sendCodeAgain()" class="cursor-pointer w-1/4 p-2.5 bg-1877F2 border-none font-bold 
                text-white rounded-lg" id="btn-send-code">Gửi lại</span>
            </form>
        </div>
    </div>
</div>