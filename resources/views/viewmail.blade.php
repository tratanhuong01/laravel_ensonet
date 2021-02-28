<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <img src="img/logo.png" class="w-10 h-10 rounded-full object-cover" alt="">
    &nbsp;&nbsp;<span class="font-bold text-xl text-blue-600">ENSONET - ENTERTAINT SOCIAL NETWORK</span>
    <h3>Ensonet gửi mã xác nhận đến cho bạn</h3>
    <p style="font-weight:bold;">Mã xác nhận của bạn là <span style="color:red;">{{ $code_veri }}</span> vui lòng không cung cấp
        mã này cho bất kì ai.</p>
</body>

</html>