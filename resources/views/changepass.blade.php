<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        * {
            font-family: 'Lato', sans-serif;
        }
    </style>
</head>

<body>
    <img src="/img/logo.png" class="w-12 h-12" alt="">
    &nbsp;&nbsp;<span class="font-bold text-xl text-blue-600">ENSONET - ENTERTAINT SOCIAL NETWORK</span>
    <h3>Ensonet gửi mã xác nhận đến cho bạn</h3>
    <p class="font-bold">Bạn đang yêu cầu đổi mật khẩu vui lòng kiểm tra và nhập mã xác nhận bên
        dưới để đổi mật khẩu</p>
    <p style="font-weight:bold;">Mã xác nhận của bạn là <span style="color:red;">
            {{ $code_veri }}</span> vui lòng không cung cấp mã này cho bất kì ai.</p>
</body>

</html>