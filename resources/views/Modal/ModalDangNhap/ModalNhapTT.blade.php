<div id="get-account-main" class="wrapper-scrollbar w-11/12 fixed top-50per left-50per transform-translate-50per
        p-4 opacity-100 bg-white z-50 border-2 border-solid border-gray-300 sm:w-4/5 sm:mt-12 
        lg:w-3/5 xl:w-5/12 xl:mt-4">
    <div class="w-full">
        <div class="w-full">
            <span onclick="closeGetAcc()" class="cursor-pointer absolute text-4xl top-4 right-4">&times;</span>
            <p class="py-2.5 text-xl text-center font-bold">Quên tài khoản</p>
        </div>
        <div class="w-70per my-4 mx-auto">
            <p>Vui lòng nhập số điện thoại hoặc email để lấy mật khẩu</p>
            <input class="w-full p-4 my-4" type="text" name="emailOrPhone_Type" id="emailOrPhone_Type" placeholder="Email hoặc số điện thoại">
        </div>
        <p class="w-70per text-red-600 font-bold py-4 mx-auto">@isset($errors){{$errors}}@endisset</p>
        <hr>
        <div class="w-full mt-4 text-right">
            <input type="button" onclick="forgetAccount()" class="cursor-pointer w-1/4 p-2.5 bg-1877F2 border-none font-bold 
            text-white rounded-lg" type="submit" value="Tìm kiếm">
            <input type="button" onclick="closeGetAcc()" class="cursor-pointer w-1/5 p-2.5 bg-1877F2 border-none font-bold 
            text-white rounded-lg" type="submit" value="Hủy">
        </div>
    </div>
</div>