@include('Head/document')

<head>
    @include('Head/css')
</head>

<body>
    &nbsp;&nbsp;<span class="font-bold text-xl text-blue-600">ENSONET - ENTERTAINT SOCIAL NETWORK</span>
    <h3>Ensonet gửi mã xác nhận đến cho bạn</h3>
    <p style="font-weight:bold;">Mã xác nhận của bạn là <span style="color:red;">
            {{ $code_veri }}</span> vui lòng không cung cấp mã này cho bất kì ai.</p>
</body>

</html>