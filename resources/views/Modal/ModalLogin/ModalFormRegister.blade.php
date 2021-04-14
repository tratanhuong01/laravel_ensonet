<?php

use Illuminate\Support\MessageBag;
?>
<div id="form-register" style="height: 600px;" class="overflow-x-auto wrapper-scrollbar w-11/12 fixed top-50per left-50per transform-translate-50per
        p-3 opacity-100 bg-white z-50 border-2 border-solid border-gray-300 sm:w-11/12 sm:mt-12 
        lg:w-4/5 xl:w-1/3 xl:mt-4">

    <div class="w-full">
        <span onclick="closePost()" class="cursor-pointer absolute text-4xl top-4 right-2">&times;</span>
        <h1 class="py-2.5 text-3xl font-bold">Đăng Kí</h1>
    </div>
    <?php
    $w47 = "input_register w-47per p-2.5 rounded-lg border-2 border-solid border-gray-300";
    $w96 = "input_register w-96per p-2.5 rounded-lg border-2 border-solid  border-gray-300";
    ?>
    <p class="pb-2.5">Nhanh Chóng Dễ Dàng</p>
    <hr>
    <br>
    <form action="" id="formRegister">
        {{ csrf_field() }}
        <div class="w-full flex">
            <input type="text" name="firstName" id="firstName" onclick='onclickRegister("{{ $w47 }}",0)' class="input_register w-47per p-2.5 rounded-lg border-2 border-solid border-gray-300 
            @error('firstName') border-red-600 text-red-600 placeholder-red-600 @enderror" placeholder="Họ" value="@isset($requestRegister){{$requestRegister['firstName']}}@endisset">
            &nbsp;
            <input type="text" name="lastName" id="lastName" onclick='onclickRegister("{{ $w47 }}",1)' class="input_register w-47per ml-2.5 p-2.5 rounded-lg border-2 border-solid border-gray-300 
            @error('lastName') border-red-600 text-red-600 placeholder-red-600 @enderror" placeholder="Tên" value="@isset($requestRegister){{$requestRegister['lastName']}}@endisset">
        </div>
        <div class="w-full flex">
            <ul class="w-1/2 mb-2.5 mt-2.5 ">
                <li class="w-full text-red-600 value_error">@error('firstName') {{ $message  }} @enderror</li>
            </ul>
            <ul class="w-1/2 mb-2.5 mt-2.5 ">
                <li class="w-full text-red-600 value_error">@error('lastName') {{ $message  }} @enderror</li>
            </ul>
        </div>
        <div class="w-full">
            <input oninput="checkEmail()" type="text" name="emailOrPhone" class="input_register w-96per p-2.5 rounded-lg border-2 
            border-solid border-gray-300 @error('emailOrPhone') border-red-600 text-red-600 placeholder-red-600 @enderror" id="emailOrPhone" placeholder="Số Di Động Hoặc Email" onclick='onclickRegister("{{ $w96 }}",2)' value="@isset($requestRegister){{$requestRegister['emailOrPhone']}}@endisset">
        </div>
        <ul class="w-full mb-4 mt-4">
            <li class="w-full text-red-600 value_error">@error('emailOrPhone') {{ $message  }} @enderror</li>
        </ul>
        <div class="w-full email_again_one mb-4" style="display: none;@error('emailAgain') display:block!important; @enderror" id="email-again">
            <input type="text" name="emailAgain" id="emailAgain" class="
            input_register w-96per p-2.5 rounded-lg border-2 border-solid border-gray-300 @error('emailAgain') border-red-600 text-red-600 placeholder-red-600 @enderror" placeholder="Nhập Lại Email" onclick='onclickRegister("{{ $w96 }}",3)' value="@isset($requestRegister){{$requestRegister['emailAgain']}}@endisset">
            <ul class="w-full">
                <li class="w-full text-red-600 value_error mt-4 mb-4">@error('emailAgain') {{ $message  }} @enderror</li>
            </ul>
        </div>
        <div class="w-full">
            <input type="password" name="passWord" id="passWord" class="input_register w-96per p-2.5 rounded-lg border-2 
            border-solid border-gray-300 @error('passWord') border-red-600 text-red-600 placeholder-red-600 @enderror" placeholder="Mật Khẩu Mới" onclick='onclickRegister("{{ $w96 }}",4)' value="@isset($requestRegister){{$requestRegister['passWord']}}@endisset">
        </div>
        <ul class="w-full mb-4 mt-4">
            <li class="w-full text-red-600 value_error ">@error('passWord') {{ $message  }} @enderror</li>
        </ul>
        <div class="form_4">
            <p class="pb-4"><b class="text-sm">Ngày Sinh</b></p>
            <input type="date" name="NgaySinh" id="NgaySinh" class="w-96per border-2 border-solid border-gray-200 p-2 font-bold" value="1990-01-01">
        </div>
        <div class="w-full mb-2.5 mt-2.5">
            <p class="block"><b class="text-sm">Giới Tính</b></p>
            <div class="w-full flex mb-2.5">
                <div class="mt-2.5 w-30per mr-4 p-2 border-gray-300 
                        border-solid border-1">
                    <Label class="mr-16"><b>Nam</b></Label><input type="radio" name="GioiTinh" id="" value="Nam" checked>
                </div>
                <div class="mt-2.5 w-30per mr-4 p-2 border-gray-300 
                        border-solid border-1">
                    <Label class="mr-16"><b>Nữ</b></Label><input type="radio" name="GioiTinh" id="" value="Nữ">
                </div>
                <div class="mt-2.5 w-30per mr-4 p-2 border-gray-300 
                        border-solid border-1">
                    <Label class="mr-16"><b>Khác</b></Label><input type="radio" name="GioiTinh" id="" value="Khác">
                </div>
            </div>
        </div>
        <div class="form_5">
            <p style="font-size: 14px;color: #737373;">Bằng cách nhấp vào Đăng ký, bạn đồng ý với
                <a style="color: #385989;" href="">Điều khoản, Chính sách dữ liệu</a> và
                <a style="color: #385989;" href="">Chính sách cookie</a> của chúng tôi.
                Bạn có thể nhận được thông báo của chúng tôi qua SMS và hủy nhận bất kỳ lúc nào.
            </p>
        </div>
        <div class="form_5 text-center p-4">
            <button onclick="submitFormRegister()" type="button" id="btn-submit-form" style="font-size: 18px;width: 50%;background-color: #119F16;padding: 10px;border: none;
                                border-radius: 10px;color: white;cursor: pointer;
                                "><b>Đăng Kí</b></button>
        </div>
    </form>
</div>