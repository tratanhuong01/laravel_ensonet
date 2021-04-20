<?php

use Illuminate\Support\Facades\Session;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/tailwind_second.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        * {
            font-family: 'Lato', sans-serif;
        }
    </style>
    <script src="/js/ajax/DangNhap/ajax.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body class="bg-gray-100">
    <div class="w-1/2 mx-auto p-3 bg-white absolute top-1/3 left-1/2 rounded overflow-y-auto
     wrapper-scrollbar mt-8" id="modal" style="max-height: 719px;transform: translate(-50%,-50%);">
        <div class="w-full">
            <p class="p-2.5 block text-center text-xl font-bold dark:text-white">
                Bạn đã gửi yêu cầu
            </p>
            <hr>
            <br>
            <p class="text-center">Cảm ơn bạn đã phản hồi. Chúng tôi sẽ phản hồi lại yêu cầu của
                bạn sớm nhất có thể .
            </p>
            <p class="text-center py-4">
                <a href="{{ url('login') }}" class="text-blue-600">Đi đến trang chủ</a>
            </p>
        </div>
    </div>
</body>

</html>