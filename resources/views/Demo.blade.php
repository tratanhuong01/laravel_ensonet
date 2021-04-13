<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include('Head/css')
</head>

<body>

    <video id="my-videos" class="video-js" controls preload="auto" width="640" height="264" poster="/video/review.mp4" data-setup="{}">
        <source src="/video/review.mp4" type="video/mp4" />
    </video>
</body>

</html>