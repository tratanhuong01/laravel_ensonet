<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="/css/app.css" />
    <link rel="stylesheet" href="/css/emojis.css" />
    <link rel="stylesheet" href="/css/loading.css" />
    <link rel="stylesheet" href="/css/style.css" />
    <link rel="stylesheet" href="/css/tailwind_second.css" />
    <link rel="stylesheet" href="/tailwind/tailwind.css" />
    <link rel="stylesheet" href="/tailwind/tailwind.custom.css" />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <style>
        * {
            font-family: "Lato", sans-serif;
        }
    </style>
</head>

<body>
    <div class="w-full h-screen relative bg-gray-100">
        <div class="w-1/4 items-center absolute left-1/2" style="transform: translate(-50%,-50%);top: 42%;">
            <div class="w-20 h-20 object-cover rounded-full mx-auto my-7">
                <img src="/img/logo.png" class="w-20 h-20 object-cover rounded-full" alt="">
            </div>
            <div class="w-full px-4 py-6 bg-white">
                <form action="{{ route('ProcessLoginAd') }}" method="POST">
                    {{ csrf_field() }}
                    <p class="my-2">Tên đăng nhập</p>
                    <input type="text" class="w-full mx-auto border-2 border-gray-100 p-2.5 
                    border-solid" placeholder="Tên đăng nhập" name="username"><br>
                    <p class="my-2">Mật khẩu</p>
                    <input type="password" class="w-full mx-auto border-2 border-gray-100 p-2.5 
                    border-solid" placeholder="Mật khẩu" name="password"><br>
                    <div class="w-full flex py-4">
                        <div class="w-1/2">
                            <input type="checkbox" name="" id="" class="mr-3 my-3">Lưu đăng nhập
                        </div>
                        <div class="w-1/2 text-right">
                            <button type="submit" class="p-2 bg-blue-500 font-bold 
                            text-white">Đăng nhập</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>