@include('Head.document')

<head>
    <title>Hoạt Động</title>
    @include('Head.css')
</head>

<body class="bg-gray-200">
    <div class="w-1/2 mx-auto p-3 bg-white relative rounded-lg mt-20">
        <div class="w-full py-4">
            <p class="font-bold text-xm" style="font-family: system-ui;">Vui lòng xác minh tài khoản tất cả
                các hoạt động gần đây là của bạn .
            </p>
        </div>
        <hr>
        <div class="w-full py-2 max-h-80 overflow-y-auto wrapper-content-right">
            @foreach($data as $key => $value)
            <div class="w-full flex pb-4">
                <div class="" style="width: 10%;">
                    <img src="{{ $value[0]->AnhDaiDien }}" class="w-16 h-16 object-cover rounded-full" alt="">
                </div>
                <div class="pl-2" style="width: 90%;">
                    <b>Bạn</b> {{ str_replace('của bạn.','',$value[0]->TenLoaiThongBao) }} của <b>{{ $value[0]->Ho . ' ' . $value[0]->Ten }}</b><br>
                    <span class="text-gray-600 text-sm">{{ $value[0]->NoiDung }}</span> <br>
                    <i class="fas fa-globe-europe color-word"></i> <b class="color-word">{{ $value[0]->IDQuyeRiengTu }}</b>
                </div>
            </div>
            @endforeach
        </div>
        <hr class="my-3 bg-gray-200">
        <div class="w-full py-2 text-right">
            <button onclick="window.location.href='change-password'" class="py-2 px-4 font-bold text-black bg-gray-200 mr-2">Không phải tôi</button>
            <button onclick="window.location.href='loadIndexVeriCheckpoint'" class="py-2 px-4 bg-blue-900 font-bold text-white">Đó là tôi</button>
        </div>
    </div>
</body>

</html>