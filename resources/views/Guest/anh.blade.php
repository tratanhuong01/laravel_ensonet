<!DOCTYPE html>
<html lang="en" class="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/tailwind_second.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="tailwind/tailwind.css">
    <style>
        * {
            font-family: 'Lato', sans-serif;
        }
    </style>
</head>

<body>
    <div class="w-full dark:bg-dark-main" id="main">
        <div class="w-full flex h-screen bg-gray-100" id="content">
            <div class="w-9/12 flex bg-black relative" id="leftImage">
                <div class="w-1/12">
                    <i class="fas fa-chevron-left cursor-pointer px-5 py-3 bg-gray-300 relative 
                    top-1/2 left-1/2 rounded-full  hover:bg-white text-xl" style="transform: translate(-50%,-50%);"></i>
                </div>
                <div class="w-10/12">
                    <div class="w-9/12 mx-auto">
                        <img class="mx-auto object-cover h-screen" src="/../../img/avatar.jpg" alt="">
                    </div>
                </div>
                <div class="w-1/12">
                    <i class="fas fa-chevron-right cursor-pointer px-5 py-3 bg-gray-300 relative 
                    top-1/2 left-1/2 rounded-full  hover:bg-white text-xl" style="transform: translate(-50%,-50%);"></i>
                </div>
                <i onclick="zoom()" class="fas fa-expand-arrows-alt cursor-pointer text-2xl text-white absolute
                top-4 right-6"></i>
            </div>
            <div class="w-3/12 bg-white dark:bg-dark-third" id="rightImage">
                <div class="w-full pl-3">
                    <div class="absolute right-4 top-1 pt-2 pb-2">
                        <ul class="w-full flex">
                            <li class="w-10 bg-gray-200 text-center rounded-full cursor-pointer 
                            h-10 ml-1 mr-1">
                                <div class="pt-1.5 relative">
                                    <i class="fas fa-plus text-xm pt-1.5"></i>
                                </div>
                            </li>
                            <li class="w-10 bg-gray-200 text-center rounded-full cursor-pointer 
                            h-10 ml-1 mr-1">
                                <div onclick="openMessenger()" class="pt-1.5 relative">
                                    <i class="fab fa-facebook-messenger text-xl"></i>
                                    <span class="text-white bg-red-600 font-bold rounded-full text-xs px-1 py-0.5 absolute
                                     -top-2 -right-1">
                                        99+
                                    </span>
                                </div>
                            </li>
                            <li class="w-10 bg-gray-200 text-center rounded-full cursor-pointer 
                            h-10 ml-1 mr-1">
                                <div onclick="openRequestFriend()" class="pt-1.5 relative">
                                    <i class="far fa-bell text-xl"></i>
                                    <span class="text-white bg-red-600 font-bold rounded-full text-xs px-1 py-0.5 absolute
                                     -top-2 -right-1">
                                        99+
                                    </span>
                                </div>
                            </li>
                            <li class="w-10 bg-gray-200 text-center rounded-full cursor-pointer 
                            h-10 ml-1 mr-1">
                                <div onclick="openRequestFriend()" class="pt-1.5">
                                    <a href="logout"><i class="fas fa-sign-out-alt text-xl"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <hr>
                    <br>
                    <div class="pt-16"></div>
                    <div class="w-full flex">
                        <hr>
                        <br>
                        <div class="mr-2">
                            <a href="">
                                <img class="w-12 h-12 object-cover rounded-full 
                                border-4 border-solid border-gray-200" src="/../../img/avatar.jpg"></a>
                        </div>
                        <div class="relative pl-1 w-3/4">
                            <div class="dark:text-gray-300 text-left"><a href=""><b class="dark:text-white">
                                        Trà Hưởng</b>
                                    &nbsp;</a></div>
                            <div class="w-full flex">
                                <div class="text-xs pt-0.5 pr-2">
                                    <ul class="flex">
                                        <li class="pt-1">
                                            <a href="" class="dark:text-gray-300 font-bold">
                                                25 phút trước</a>
                                        </li>
                                        <li class="pl-3 pt-0.5" id="">
                                            @
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="relative text-center pr-4" style="width: 10%;">
                            <i class="cursor-pointer fas fa-ellipsis-h pt-2 text-xl dark:text-gray-300"></i>
                        </div>
                    </div>
                    <div class="w-full py-5">
                        hêhe
                    </div>
                    <div class="w-full my-4 mx-0">
                        <div class="w-full flex">
                            <div class="w-full flex pl-0.5 py-1" id="" style="line-height: 40px;">
                            </div>
                            <div class="w-full text-right pr-2 py-1">
                                <p class="cursor-pointer dark:text-gray-300 text-gray-600 font-bold ">
                                </p>
                            </div>
                        </div>
                        <style>
                            .show-feels {
                                display: none;
                            }

                            .feels:hover>.show-feels {
                                display: flex;
                            }
                        </style>
                        <ul class="w-full flex border-t-2 border-b-2 border-solid border-gray-300 
                        dark:border-dark-third relative">
                            <div class="w-1/3 dark:hover:bg-dark-third hover:bg-gray-200 feels">
                                <li class="dark:text-gray-300 dark:hover:bg-dark-third hover:bg-gray-200 
                            text-center w-full font-bold py-3 cursor-pointer justify-items-center" id="}" onclick="">
                                    <span class="text-xl" style="color: transparent;text-shadow: 0 0 0 gray;">👍</span>
                                    &nbsp;
                                    <span class="font-bold">Thích</span>
                                </li>

                            </div>
                            <li class="dark:text-gray-300 dark:hover:bg-dark-third hover:bg-gray-200 
                            text-center w-1/3 font-bold py-4 cursor-pointer justify-items-center"><i class="far fa-comment-alt dark:text-gray-300"></i> &nbsp; Bình Luận</li>
                            <li class="dark:text-gray-300 dark:hover:bg-dark-third hover:bg-gray-200 
                            text-center w-1/3 font-bold py-4 cursor-pointer justify-items-center"><i class="fas fa-share dark:text-gray-300"></i> &nbsp; Chia sẻ</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function zoom() {
            if (document.getElementById('rightImage').style.display == 'none') {
                document.getElementById('rightImage').style.display = 'block';
                document.getElementById('leftImage').style.width = '75%';
            } else {
                document.getElementById('rightImage').style.display = 'none';
                document.getElementById('leftImage').style.width = '100%';
            }
        }
    </script>
    <script src="js/scrollbar1.js"></script>
    <script src="js/scrollbar.js"></script>
</body>

</html>