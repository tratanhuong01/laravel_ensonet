<div class="w-full">
    <span onclick="closeRegister()" class="cursor-pointer text-3xl top-4 right-4">&times;</span>
    <h1 class="py-2.5 text-3xl font-bold">Đăng Kí</h1>
</div>
<p class="pb-2.5">Nhanh Chóng Dễ Dàng</p>
<hr>
<br>
<form action="dang-nhap" method="POST">
    <p class="text-red my-2.5">

    </p>
    <div class="w-full flex mb-4">
        <input type="text" name="firstName" class="w-47per p-2.5 rounded-lg border-1 
        border-solid border-gray-300" placeholder="Họ">
        <input type="text" name="lastName" class="w-47per ml-2.5 p-2.5 rounded-lg border-1 
        border-solid border-gray-300" placeholder="Tên">
    </div>
    <div class="w-full mb-4">
        <input oninput="checkEmail(event)" type="text" name="emailOrPhone" class="w-96per p-2.5 rounded-lg border-1 
        border-solid border-gray-300" id="emailOrPhone" placeholder="Số Di Động Hoặc Email">
    </div>
    <div class="w-full mb-4" style="display: none;" id="email-again">
        <input type="text" name="email-again" class="w-96per p-2.5 rounded-lg border-1 
        border-solid border-gray-300" placeholder="Nhập Lại Email">
    </div>
    <div class="w-full mb-4">
        <input type="password" name="passWord" class="w-96per p-2.5 rounded-lg border-1 
        border-solid border-gray-300" placeholder="Mật Khẩu Mới">
    </div>
    <div class="form_4">
        <p><b class="text-sm">Ngày Sinh</b></p>
        <select class="mt-2.5 w-30per mr-4 p-2 border-gray-300 
        border-solid border-1" onchange="checkYear(this)" name="year" id="year-se">
            <option value=""></option>
        </select>
        <select class="mt-2.5 w-30per mr-4 p-2 border-gray-300 
        border-solid border-1" onchange="checkMonth(this)" name="month" id="month-se">
        </select>
        <select class="mt-2.5 w-30per mr-4 p-2 border-gray-300 
        border-solid border-1" name="day" id="day-se">
            <option value="">Ngày</option>
        </select>
    </div>
    <div class="w-full mb-2.5 mt-2.5">
        <p class="block"><b class="text-sm">Giới Tính</b></p>
        <div class="w-full flex mb-2.5">
            <div class="mt-2.5 w-30per mr-4 p-2 border-gray-300 
            border-solid border-1">
                <Label class="mr-16"><b>Nam</b></Label><input type="radio" name="GioiTinh" id="" value="Nam">
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
        <button type="submit" style="font-size: 18px;width: 50%;background-color: #119F16;padding: 10px;border: none;
                    border-radius: 10px;color: white;cursor: pointer;
                    "><b>Đăng Kí</b></button>
    </div>
</form>