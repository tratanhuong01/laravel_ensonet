@include('Head/document')

<head>
    <title>Ensonet</title>
    @include('Head/css')
    <script src="/js/ajax/header/ajax.js"></script>
    <script src="/js/ajax/setting/ajax.js"></script>
</head>

<body class="dark:bg-dark-main">
    <div class="w-full bg-gray-100 dark:bg-dark-main h-screen relative" id="main">
        @include('Header')
        <div class="w-full flex z-10 flex pt-16 bg-gray-100 dark:bg-dark-third lg:w-full lg:mx-auto xl:w-full" id="content">
            <div class="w-10/12 mx-auto flex" style="height: 728px;">
                <div class="w-1/4 pt-3">
                    <?php $paths = explode('/', parse_url(url()->current())['path']); ?>
                    <p class="font-bold p-2.5 dark:text-white text-2xl">Cài đặt</p>
                    <ul class="w-full py-3 font-bold">
                        <li onclick="eventSetting(this)" class="actives on w-full p-2.5 
                        {{ $paths[count($paths)-1] == 'change-name' ? ' bg-gray-300 dark:bg-dark-main ' : 
                        ' hover:bg-gray-200 dark:hover:bg-dark-second ' }}  
                        dark:text-white cursor-pointer text-xm items-center flex rounded-lg">
                            <i class="fas fa-pen-square text-2xl mr-4"></i>Đổi tên
                        </li>
                        <li onclick="eventSetting(this)" class="actives w-full p-2.5 
                        {{ $paths[count($paths)-1] == 'change-password' ? ' bg-gray-300 dark:bg-dark-main ' : 
                        ' hover:bg-gray-200 dark:hover:bg-dark-second ' }}  
                        dark:text-white cursor-pointer text-xm items-center flex rounded-lg">
                            <i class="fas fa-unlock-alt text-2xl mr-4"></i>Đổi mật khẩu
                        </li>
                        <li onclick="eventSetting(this)" class="actives w-full 
                        p-2.5 {{ $paths[count($paths)-1] == 'delete-account' ? ' bg-gray-300 dark:bg-dark-main ' : 
                        ' hover:bg-gray-200 dark:hover:bg-dark-second ' }}  
                        dark:text-white cursor-pointer text-xm items-center flex rounded-lg">
                            <i class="far fa-trash-alt text-2xl mr-4"></i>Xóa tài khoản
                        </li>
                        <!-- <li class="w-full p-2.5 hover:bg-gray-300 dark:hover:bg-dark-second 
                    dark:text-white cursor-pointer text-xm items-center flex rounded-lg">
                            <i class="far fa-user text-2xl mr-4"></i>Tên người dùng
                        </li> -->
                    </ul>
                </div>
                <div class="w-3/4 pt-3 px-2.5 dark:bg-dark-main rounded-lg shadow-lg font-bold">
                    @switch($paths[count($paths)-1])
                    @case('change-name')
                    @include('Guest/Child/Setting',['index' => 0])
                    @break
                    @case('change-password')
                    @include('Guest/Child/Setting',['index' => 1])
                    @break
                    @case('delete-account')
                    @include('Guest/Child/Setting',['index' => 2])
                    @break
                    @endswitch
                </div>
            </div>
        </div>
    </div>
</body>
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

</html>