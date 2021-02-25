<div id="type-pass-new" class="wrapper-scrollbar w-11/12 fixed top-50per left-50per transform-translate-50per
        p-4 opacity-100 bg-white z-50 border-2 border-solid border-gray-300 block sm:w-4/5 sm:mt-12 
        lg:w-3/5 xl:w-5/12 xl:mt-2 hidden">
    <div class="w-full mx-auto">
        <span onclick="closeGetAcc()" class="cursor-pointer text-3xl top-4 right-4">&times;</span>
        <div class="w-full text-center flex pb-3">
            <img src="img/completed.png" class="w-24 h-24 mx-auto" alt="">
            <p class="font-bold pt-2 px-3">Bạn hiện đang lấy lại mật khẩu của mình , đang ở đoạn đổi mật khẩu
                mới .
                Vui lòng
                nhập mật mới để lấy lại tài khoản của mình , mật khẩu phải hơn 6 kí tự . Xin cảm ơn !!
            </p>
        </div>
        <div class="w-full">
            <form action="" class="w-full">
                <table class="mx-auto w-3/4">
                    <tr>
                        <td>Mật khẩu mới</td>
                        <td class="flex"><input class="input-password font-bold w-full p-2 border-2 border-gray-200 rounded-lg" type="password" placeholder="Nhập mật khẩu">&nbsp;&nbsp;&nbsp;<i class="far fa-eye eye1 text-xm pt-3 cursor-pointer" onclick="hideOrShow(0)"></i>
                        </td>
                    </tr>
                    <tr>
                        <td class="mt-2">Nhập lại mật khẩu mới</td>
                        <td class="mt-2 flex"><input class="input-password font-bold w-full p-2 border-2 border-gray-200 rounded-lg" type="password" placeholder="Nhập lại mật khẩu">&nbsp;&nbsp;&nbsp;<i class="far fa-eye eye1 text-xm pt-3 cursor-pointer" onclick="hideOrShow(1)"></i>
                        </td>
                    </tr>
                    <script>
                        var count = 0;

                        function hideOrShow(index) {
                            if (count == 0) {
                                count++;
                                var eye1 = document.getElementsByClassName("eye1")[index];
                                eye1.className = "far fa-eye-slash eye1 text-xm pt-3 cursor-pointer";
                                document.getElementsByClassName("input-password")[index].type = "text";
                            } else {
                                var eye1 = document.getElementsByClassName("eye1")[index];
                                eye1.className = "far fa-eye eye1 text-xm pt-3 cursor-pointer";
                                document.getElementsByClassName("input-password")[index].type = "password";
                                count = 0;
                            }
                        }
                    </script>
                </table>
                <div class="w-full p-3 text-right pt-4">
                    <button class="p-2 text-white font-bold bg-blue-700 rounded-lg 
                            mr-3" type="submit">Tiếp tục</button>
                    <span class="cursor-pointer p-3 bg-gray-400 text-black font-bold rounded-lg">Hủy</span>
                </div>
            </form>
        </div>
    </div>
</div>