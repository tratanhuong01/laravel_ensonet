<?php

use Illuminate\Support\Facades\Session;
?>

<div class="interface w-full dark:bg-dark-second">
    <p class="font-bold p-2.5 dark:text-white text-2xl">Đổi tên</p>
    <div class="w-full p-2.5 dark:text-white">
        <form action="{{ route('ProcessChangeNameAccount') }}" method="POST" id="formChangeName">
            {{ csrf_field() }}
            <table class="w-1/2 text-center mx-auto">
                <tr>
                    <td class="py-2"><label for="">Họ&nbsp;</label></td>
                    <td class="py-2"><input type="text" class="p-2.5 w-60 bg-gray-100 dark:bg-dark-third 
                                    rounded-lg ml-3" placeholder="Họ" name="Ho"></td>
                </tr>
                <tr>
                    <td class="py-2"><label for="">Tên</label></td>
                    <td class="py-2"><input type="text" class="p-2.5 w-60 bg-gray-100 dark:bg-dark-third 
                                     rounded-lg ml-3" placeholder="Tên" name="Ten"></td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit" class="px-5 py-2.5 bg-gray-300 dark:bg-dark-third 
                                    rounded-lg font-bold mx-28 my-2 justify-center">
                            Đổi tên</button></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<div class="interface w-full dark:bg-dark-second">
    <p class="font-bold p-2.5 dark:text-white text-2xl">Đổi mật khẩu</p>
    <div class="w-full p-2.5 dark:text-white">
        @if (session()->has('verify'))
        <form action="{{ route('ProcessVerifyChangePassword') }}" method="POST">
            {{ csrf_field() }}
            <div class="w-3/4 dark:text-white">
                <p class="font-bold p-2.5 dark:text-white text-2xl">Nhập mã bảo mật</p>
                <hr class="my-3">
                <p class="p-2.5 dark:text-white text-xm">
                    Vui lòng kiểm tra mã trong email của bạn. Mã này gồm 8 số.</p>
                <div class="w-full py-2 flex">
                    <div class="w-1/2 py-3">
                        <input type="text" name="MaDoi" class="text-2xl font-bold dark:text-white 
                        p-3.5 dark:bg-dark-third bg-gray-200 rounded-lg" placeholder="Nhập mã">
                        <br>
                        <span class="text-red-500">
                            {{ Session::get('err') }}
                        </span>
                    </div>
                    <div class="w-1/2">
                        <p class="font-bold dark:text-white">Chúng tôi đã gửi cho bạn mã đến:</p>
                        <p>{{ Session::get('emailSend') }}</p>
                    </div>
                    <input type="hidden" name="MaDoiRe" value="{{ Session::get('verify') }}">
                    <input type="hidden" name="MatKhau" value="{{ Session::get('typePassWordNew') }}">
                    <input type="hidden" name="IDTaiKhoan" value="{{ Session::get('user')[0]->IDTaiKhoan }}">
                </div>
                <hr class="my-2">
                <div class="w-full py-2 text-right">
                    <input type="submit" class="cursor-pointer w-1/5 p-2 bg-1877F2 border-none font-bold 
                    text-white rounded-lg" value="Xác nhận" id="btn-submit-veri">
                    <span onclick="sendCodeAgain()" class="cursor-pointer w-1/4 p-2.5 bg-1877F2 border-none font-bold 
                    text-white rounded-lg" id="btn-send-code">Gửi lại</span>
                </div>
            </div>
        </form>
        @else
        <form action="{{ route('ProcessChangePasswordAccount') }}" method="POST" id="formChangePassword">
            {{ csrf_field() }}
            <table class="w-1/2 text-center mx-auto">
                <tr>
                    <td class="py-2"><label for="">Mật khẩu cũ</label></td>
                    <td class="py-2"><input type="password" class="input-password p-2.5 w-60 bg-gray-100 dark:bg-dark-third 
                                     rounded-lg ml-3" placeholder="Mật khẩu cũ" name="passWordOld" value="{{session()->has('passWordOld')?Session::get('passWordOld'):''}}"></td>
                    <td><i class="far fa-eye-slash  eye1 text-xm pt-3 cursor-pointer" onclick="hideOrShow(0)"></i></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-red-500">@error('passWordOld'){{$message}} @enderror</td>
                </tr>
                <tr>
                    <td class="py-2"><label for="">Mật khẩu mới</label></td>
                    <td class="py-2"><input type="password" class="input-password p-2.5 w-60 bg-gray-100 dark:bg-dark-third 
                                    rounded-lg ml-3" placeholder="Mật khẩu mới" name="passWordNew" value="{{session()->has('passWordNew')?Session::get('passWordNew'):''}}"></td>
                    <td><i class="far fa-eye-slash  eye1 text-xm pt-3 cursor-pointer" onclick="hideOrShow(1)"></i></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-red-500">@error('passWordNew') {{$message}} @enderror</td>
                </tr>
                <tr>
                    <td class="py-2"><label for="">Nhập lại mật khẩu mới</label></td>
                    <td class="py-2"><input type="password" class="input-password p-2.5 w-60 bg-gray-100 dark:bg-dark-third 
                                    rounded-lg ml-3" placeholder="Nhập lại mật khẩu cũ" name="typePassWordNew" value="{{session()->has('typePassWordNew')?Session::get('typePassWordNew'):''}}"></td>
                    <td><i class="far fa-eye-slash  eye1 text-xm pt-3 cursor-pointer" onclick="hideOrShow(2)"></i></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-red-500">@error('typePassWordNew'){{$message}} @enderror</td>
                </tr>
                <tr class="my-2">
                    <td colspan="2" class="py-2"><button type="submit" class="px-5 py-2.5 bg-gray-300 dark:bg-dark-third 
                                    rounded-lg font-bold mx-28 my-2 justify-center">Đổi mật khẩu</button></td>
                </tr>
            </table>
        </form>
        @endif

    </div>
</div>
<div class="interface w-full dark:text-white py-3">
    <p class="font-bold p-2.5 dark:text-white text-2xl">Xóa tài khoản</p>
    <p class="font-bold text-xl p-2">Điều gì xảy ra nếu tôi xóa tài khoản Facebook của mình?</p>
    <ul class="list-disc w-11/12 mx-auto text-xm text-gray-100">
        <li class="p-2">Bạn sẽ không thể kích hoạt lại tài khoản của mình.
            Trang cá nhân, ảnh, bài viết, video và tất cả nội dung khác bạn đã
            thêm đều bị xóa vĩnh viễn. Bạn sẽ không thể lấy lại bất kỳ nội dung
            nào mà mình đã thêm.</li>
        <li class="p-2">Bạn sẽ không sử dụng Facebook Messenger được nữa.</li>
        <li class="p-2">Bạn sẽ không dùng được tính năng Đăng nhập bằng Facebook cho những ứng
            dụng khác mà mình đã đăng ký bằng tài khoản Facebook, như Spotify hoặc
            Pinterest. Bạn có thể cần liên hệ với các ứng dụng và trang web này để
            khôi phục những tài khoản đó.</li>
        <li class="p-2">Một số thông tin, như tin nhắn bạn đã gửi cho bạn bè, vẫn có thể hiển thị
            với họ sau khi bạn xóa tài khoản của mình. Bản sao tin nhắn bạn đã gửi
            được lưu trữ trong hộp thư của bạn bè.Nếu sử dụng tài khoản Facebook để
            đăng nhập Oculus, khi bạn xóa tài khoản Facebook cùa mình thì cũng xóa
            luôn thông tin trên Oculus. Thông tin này bao gồm cả thành tích và nội
            dung bạn mua trong ứng dụng. Bạn không thể trả lại bất kỳ ứng dụng nào
            nữa và sẽ mất mọi khoản tín dụng hiện có tại cửa hàng.</li>
    </ul>
    <div class="w-full p-4">
        <div class="w-1/3 mx-auto text-center">
            <input onchange="onchangeVerifyDeleteAccount(this)" type="checkbox" name="" id="" class="transform scale-150">
            &nbsp;&nbsp;Vui lòng tích vào ô bên nếu bạn
            chắc chắn muốn xóa tài khoản của mình
        </div>
        <div class="w-1/3 mx-auto py-4 text-center">
            <button type="button" onclick="" id="btnDeleteAccount" class="px-7 py-2.5 bg-gray-300 
            cursor-not-allowed dark:bg-dark-third font-bold opacity-50" disabled='true'>Xóa tài khoản</button>
        </div>
    </div>
</div>
<script>
    var data = document.getElementsByClassName('interface');
    var number = new Number('{{$index}}');
    for (let index = 0; index < data.length; index++) {
        if (number == index) {

        } else {
            data[index].classList.add('hidden')
        }
    }
</script>