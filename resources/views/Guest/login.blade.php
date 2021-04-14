@include('Head/document')

<head>
    <title>Ensonet - Login Or Register</title>
    @include('Head/css')
    <script src="/js/login/login.js"></script>
    <script src="/js/login/ajax.js"></script>
</head>

<body>
    <!-- main -->
    <div class="w-full bg-gray-100 dark:bg-dark-main h-screen relative" id="web">
        <div class="w-full mx-auto sm:w-full md:w-full lg:w-full xl:w-3/4 2xl:w-3/4">
            <div class="w-full flex flex-col py-2 mx-auto sm:flex-col sm:pt-4 lg:flex-row lg:pt-20">
                <div class="w-full p-8 sm:w-11/12 sm:mx-auto lg:w-7/12 ">
                    <span class="text-55px font-bold text-1877F2">Ensonet <br></span>
                    <p class="text-2xl color-word font-bold">Mạng Xã Hội Lớn Nhất Thế Giới</p>
                    <br>
                    <br>
                    <h2>Ensonet giúp bạn kết nối và chia sẻ với mọi người trong cuộc sống của bạn.</h2>
                </div>
                <div class="w-full bg-white rounded-lg mr-8 sm:w-11/12 sm:mx-auto lg:w-5/12
                lg:mr-8">
                    <div class="w-full text-center p-4 bg-white rounded-lg">
                        <div class="w-full">
                            <form class="w-full bg-white" action="{{ route('ProcessLogin') }}" method="post">
                                {{ csrf_field() }}
                                <input type="text" name="emailOrPhone" class="w-96per p-3 m-2.5 rounded-lg border-2 border-solid border-gray-200 
                                @error('emailOrPhone') border-red-600 text-red-600 placeholder-red-600 @enderror" id="" placeholder="Email Hoặc Số Điện Thoại" value="{{ session()->has('emailOrPhone') ? Session::get('emailOrPhone') : '' }}">
                                <p class="py-2 text-left pl-3 font-bold text-red-600">
                                    @error('emailOrPhone') {{ $message  }} @enderror
                                </p>
                                <?php
                                if (session()->has('emailOrPhone'))
                                    session()->forget('emailOrPhone');
                                ?>
                                <input type="password" name="passWord" class="w-96per p-3 m-2.5 rounded-lg border-2 border-solid border-gray-200 
                                @error('passWord') border-red-600 text-red-600 placeholder-red-600 @enderror" id="" placeholder="Mật Khẩu" value="">
                                <p class="py-2 text-left pl-3 font-bold text-red-600">
                                    @error('passWord') {{ $message  }} @enderror
                                    @isset($message){{$message}}@endisset
                                </p>
                                <button class="mx-auto ml-2 w-93per p-3 my-2.5 border-none rounded-lg bg-1877F2 text-sm text-white font-bold" type="submit">Đăng Nhập</button>
                                <p onclick="loadajax('LoadForgetAccount','second')" class="text-1877F2 bg-white p-4 bg-white cursor-pointer">
                                    Quên Tài khoản
                                </p>
                            </form>
                        </div>
                        <hr class="w-90%;mx-auto mb-4">
                        <div class="w-full">
                            <div class="bg-white mb-4">
                                <input type="button" onclick="loadajax('LoadFormRegister','second')" value="Tạo Tài Khoản" class="outline-none mb-8 px-8 py-3 bg-36A420 text-15px
                             font-bold text-white rounded-lg cursor-pointer">
                            </div>
                        </div>
                    </div>
                    <div class="w-full text-center pb-6 px-3">
                        <a class="text-black" href=""><b>Tạo Trang</b>&nbsp;dành cho người nổi tiếng, nhãn hiệu hoặc
                            doanh nghiệp.</a>
                    </div>
                </div>
            </div>
            <div class="w-full sm:p-4">
                <ul class="list-none flex flex-wrap">
                    <li class="text-14px p-2"><a class="text-737373" href="">Tiếng Việt</a></li>
                    <li class="text-14px p-2"><a class="text-737373" href="">English (UK)</a></li>
                    <li class="text-14px p-2"><a class="text-737373" href="">中文(台灣)</a></li>
                    <li class="text-14px p-2"><a class="text-737373" href="">日本語</a></li>
                    <li class="text-14px p-2"><a class="text-737373" href="">한국어</a></li>
                    <li class="text-14px p-2"><a class="text-737373" href="">ภาษาไทย</a></li>
                    <li class="text-14px p-2"><a class="text-737373" href="">Français (France)</a></li>
                    <li class="text-14px p-2"><a class="text-737373" href="">Español</a></li>
                    <li class="text-14px p-2"><a class="text-737373" href="">Português (Brasil)</a></li>
                    <li class="text-14px p-2"><a class="text-737373" href="">Deutsch</a></li>
                    <li class="text-14px p-2"><a class="text-737373" href="">Italiano</a></li>
                    <li class=""><button class="w-5 h-5 border-1 border-solid border-gray-600 mt-1">+</button></li>
                </ul>
                <hr class="m-4">
                <ul class="list-none flex flex-wrap">
                    <li class="text-14px p-2"><a class="text-737373" href="">Đăng Kí</a></li>
                    <li class="text-14px p-2"><a class="text-737373" href="">Đăng Nhập</a></li>
                    <li class="text-14px p-2"><a class="text-737373" href="">Messager</a></li>
                    <li class="text-14px p-2"><a class="text-737373" href="">Facebook Lite</a></li>
                    <li class="text-14px p-2"><a class="text-737373" href="">Watch</a></li>
                    <li class="text-14px p-2"><a class="text-737373" href="">Danh Bạ</a></li>
                    <li class="text-14px p-2"><a class="text-737373" href="">Trang</a></li>
                    <li class="text-14px p-2"><a class="text-737373" href="">Hạng Mục Trang</a></li>
                    <li class="text-14px p-2"><a class="text-737373" href="">Địa Điểm</a></li>
                    <li class="text-14px p-2"><a class="text-737373" href="">Trò Chơi</a></li>
                    <li class="text-14px p-2"><a class="text-737373" href="">Vị Trí</a></li>
                    <li class="text-14px p-2"><a class="text-737373" href="">MarketPlace</a></li>
                    <li class="text-14px p-2"><a class="text-737373" href="">Facebook Pay</a></li>
                    <li class="text-14px p-2"><a class="text-737373" href="">Nhóm</a></li>
                    <li class="text-14px p-2"><a class="text-737373" href="">Oculus</a></li>
                    <li class="text-14px p-2"><a class="text-737373" href="">Instagram</a></li>
                    <li class="text-14px p-2"><a class="text-737373" href="">Chiến Dịch Gây Quỹ</a></li>
                    <li class="text-14px p-2"><a class="text-737373" href="">Dịch Vụ</a></li>
                    <li class="text-14px p-2"><a class="text-737373" href="">Giới Thiệu</a></li>
                    <li class="text-14px p-2"><a class="text-737373" href="">Tạo Quảng Cáo</a></li>
                    <li class="text-14px p-2"><a class="text-737373" href="">Nhà Phát Triển</a></li>
                    <li class="text-14px p-2"><a class="text-737373" href="">Tuyển Dụng</a></li>
                    <li class="text-14px p-2"><a class="text-737373" href="">Quyền Riêng Tư</a></li>
                    <li class="text-14px p-2"><a class="text-737373" href="">Cookie</a></li>
                    <li class="text-14px p-2"><a class="text-737373" href="">Lựa Chọn Quảng Cáo</a></li>
                    <li class="text-14px p-2"><a class="text-737373" href="">Điều Khoản</a></li>
                    <li class="text-14px p-2"><a class="text-737373" href="">Trợ Giúp</a></li>
                </ul>
                <br>
                <b>&nbsp;&nbsp;Facebook @2020</b>
                <br>
                <br>
            </div>
        </div>
    </div>
    <!-- main -->

    <!-- place show modal -->
    <div class="w-full bg-gray-500 top-0 left-0 z-50 bg-opacity-50" id="second"></div>
    <!-- place show modal -->
</body>

</html>