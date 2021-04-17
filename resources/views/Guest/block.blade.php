@include('Head/document')

<head>
    <title>Khóa Tài Khoản</title>
    @include('Head/css')
</head>

<body class="bg-gray-200">
    <div class="w-1/2 mx-auto p-3 bg-white absolute top-1/3 left-1/2 rounded-lg" style="transform: translate(-50%,-50%);">
        <div class="w-full py-2">
            <p class="font-bold text-xm" style="font-family: system-ui;">
                Tài khoản của bạn đã bị khóa tạm thời
            </p>
        </div>
        <hr>
        <div class="w-full py-2">
            <p class="pt-2">Chúng tôi phát hiện rằng tài khoản của bạn có những thay đổi bất thường vui lòng cho chúng
                tôi biết bạn đang gặp sự cố gì. Vui lòng bấm tiếp tục để mở tài khoản vui lòng kiểm tra
                các hoạt động gần đây của bạn.
            </p>
            <p class="pt-2">
                Có vẻ như đã có người xâm nhập vào tài khoản của bạn , có thể nhập vào một website được thiết kế
                giống <b>&nbsp;
                    Ensonet</b>. Loại tấn công này là lừa đảo . <a href="" class="text-blue-600">Tìm hiểu thêm</a>
            </p>
            <p class="pt-2">Qua vài bước bạn có thể mở lại tài khoản của mình . Hãy nhớ cẩn trọng với tài khoản của mình , không
                cung cấp bất kì thông tin gì cho người khác .
            </p>
        </div>
        <hr class="">
        <div class="w-full py-2 text-right">
            <a href="{{ route('activity') }}"><button class="py-2 px-4 bg-blue-900 font-bold text-white">Tiếp tục</button></a>
        </div>
    </div>
</body>

</html>
