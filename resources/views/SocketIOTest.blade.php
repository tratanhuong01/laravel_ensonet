<!DOCTYPE html>
<html class="dark">
<?php

use Illuminate\Support\Facades\Route;

?>

<head>
    <title>Ensonet</title>
    @include('Head/css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/js/jquery.animateSprite.min.js"></script>
</head>

<body>
    <style>
        #stick {
            animation: playv 1s steps(5) infinite, playh 0.666s steps(4) infinite;
        }

        .sticks {
            animation: playvs 1s steps(5) infinite, playhs 0.666s steps(4) infinite;
        }

        @keyframes playv {
            0% {
                background-position-y: 0%;
            }

            100% {
                background-position-y: 500%;
            }
        }

        @keyframes playh {
            0% {
                background-position-x: 0%;
            }

            100% {
                background-position-x: 400%;
            }
        }

        @keyframes playvs {
            0% {
                background-position-y: 0%;
            }

            100% {
                background-position-y: 500%;
            }
        }

        @keyframes playhs {
            0% {
                background-position-x: 0%;
            }

            100% {
                background-position-x: 400%;
            }
        }
    </style>

    <div id="modalComment" class="absolute top-0 right-1/2 bg-white my-2 absolute w-72 
            p-1 border-2 border-solid rounded-lg dark:bg-dark-second">
        @include('Component/Child/NhanDan')
    </div>
    <div id="modalComments" class="absolute top-0 left-0 bg-white my-2 absolute w-72 
            p-1 border-2 border-solid rounded-lg dark:bg-dark-second">
        @include('Component/Child/Gif')
    </div>
    <!-- <img src="" id="myImage" alt="" class="w-32 h-32 object-cover">
    <div id="stick" style="width: 80px;max-width: 80px;padding: 2px;max-height: 80px;
    height: 80px;overflow: hidden;position: relative;
    background-image: url('https://res.cloudinary.com/tratahuong01/image/upload/v1617693340/sticker/17640357_2041011572792983_353566758688260096_n_maxymp.png');background-size: 500% 400%;">

    </div>
    <div id="sticks" style="width: 80px;max-width: 80px;padding: 2px;max-height: 80px;
    height: 80px;overflow: hidden;position: relative;object-fit: cover;
    background-image: url('https://res.cloudinary.com/tratahuong01/image/upload/v1617697177/17633084_2041011739459633_7391660925691887616_n_szaems.png');background-size: 500% 400%;">

    </div> -->

    <script>
        //javascript, jQuery

        var xhr = $.get("https://api.giphy.com/v1/gifs/search?api_key=HJsBIegcLMTaOmm57ToYEZYEQdFqKPzT&limit=5&q=a");
        xhr.done(function(res) {
            console.log("success got data", res);
            for (let index = 0; index < res.data.length; index++) {
                var img = document.createElement('img')
                img.setAttribute('src', res.data[index].images.original.url);
                img.style.width = '100%';
                img.style.height = '150px';
                img.style.margin = '8px 0px';
                document.getElementById('gifMain').appendChild(img);
            }
        });
    </script>
</body>

</html>