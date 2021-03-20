<!DOCTYPE html>
<html class="">
<?php

use Illuminate\Support\Facades\Route;

?>

<head>
    <title>Ensonet</title>
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    @include('Head/css')
</head>

<body>
    <div class="dark:bg-dark-main w-full h-screen">
        <div class="w-3/4 bg-gray-200 dark:bg-dark-main story-right shadow-3xl">
            <div class="w-11/12 p-1.5 top-6 mx-auto rounded-2xl dark:bg-dark-main bg-white relative 
                border-4 border-solid border-gray-200 dark:border-dark-third mt-1" style="height: 665px;">
                <canvas class="mx-auto bg-gray-300" id="myCanvas" width="345" height="612">

                </canvas>
                <img id="myImage" class="w-1/3 top-1/2 left-1/2 mt-1 rounded-lg" style="transform: translate(-50%,-50%); height: 612px;" src="/img/bgText/3.jpg" alt="">
            </div>
        </div>
    </div>
    <script>
        function wraptext(text) {
            var data = "";
            var num = Math.round(text.length / 25 + 1);
            for (var j = 0; j <= num; j++) {
                data += text.substring((j == 0 || j == 1 ? 1 : j) * 25,
                    (j == 0 ? 0 : (j + 1)) * 25) + "@";
            }
            return data;
        }
        window.onload = function() {
            var canvas = document.getElementById("myCanvas");
            var context = canvas.getContext("2d");
            context.drawImage(document.getElementById('myImage'), 0, 0, 345, 612);
            context.font = "20pt Tahoma";
            context.textAlign = "center";
            var arr = wraptext(text).split('@');
            for (var index = 0; index < arr.length; index++) {
                context.fillText(arr[index], 172, ((canvas.height / 2) - ((arr.length * 28) / 2)) + (index + 1) * 28);
            }
            var dataURI = canvas.toDataURL("image/png")
        };
    </script>
</body>

</html>