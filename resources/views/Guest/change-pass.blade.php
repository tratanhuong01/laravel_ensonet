@include('Head.document')

<head>
    <title>Thay đổi mật khẩu</title>
    @include('Head.css')
</head>

<body class="bg-gray-200">
    <div class="w-1/2 mx-auto p-3 bg-white relative rounded-lg mt-20">
        <div class="w-full py-4">
            <p class="font-bold text-xm" style="font-family: system-ui;">Thay đổi mật khẩu.</p>
        </div>
        <hr>
        <div class="w-full py-2 max-h-80 overflow-y-auto wrapper-content-right">
            <form action="" class="w-full">
                <table class="mx-auto w-3/5">
                    <tr>
                        <td>Mật khẩu cũ</td>
                        <td class="flex">
                            <input class="input-password font-bold w-full p-2 border-2 border-gray-200 rounded-lg" type="password" placeholder="Nhập mật khẩu cũ">&nbsp;&nbsp;&nbsp;
                            <i class="far fa-eye-slash  eye1 text-xm pt-3 cursor-pointer" onclick="hideOrShow(0)"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>Mật khẩu mới</td>
                        <td class="mt-2 flex">
                            <input class="input-password font-bold w-full p-2 border-2 border-gray-200 rounded-lg" type="password" placeholder="Nhập mật khẩu mới">&nbsp;&nbsp;&nbsp;
                            <i class="far fa-eye-slash  eye1 text-xm pt-3 cursor-pointer" onclick="hideOrShow(1)"></i>
                        </td>
                    </tr>
                    <tr>
                        <td class="mt-2">Nhập lại mật khẩu mới</td>
                        <td class="mt-2 flex">
                            <input class="input-password font-bold w-full p-2 border-2 border-gray-200 rounded-lg" type="password" placeholder="Nhập lại mật khẩu mới">&nbsp;&nbsp;&nbsp;
                            <i class="far fa-eye-slash  eye1 text-xm pt-3 cursor-pointer" onclick="hideOrShow(2)"></i>
                        </td>
                    </tr>
                    <script>
                        var count = 0;

                        function hideOrShow(index) {
                            if (document.getElementsByClassName("input-password")[index].type == "password") {
                                var eye1 = document.getElementsByClassName("eye1")[index];
                                eye1.className = "far fa-eye eye1 text-xm pt-3 cursor-pointer";
                                document.getElementsByClassName("input-password")[index].type = "text";
                            } else {
                                var eye1 = document.getElementsByClassName("eye1")[index];
                                eye1.className = "far fa-eye-slash eye1 text-xm pt-3 cursor-pointer";
                                document.getElementsByClassName("input-password")[index].type = "password";
                                count = 0;
                            }
                        }
                    </script>
                </table>
            </form>
        </div>
        <hr class="my-3 bg-gray-200">
        <div class="w-full py-2 text-right">
            <button class="cursor-pointer p-2 bg-gray-400 text-black font-bold mr-2">Hủy</button>
            <button class="p-2 text-white font-bold bg-blue-700 " type="submit">Tiếp tục</button>
        </div>
    </div>
</body>

</html>