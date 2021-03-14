<!DOCTYPE html>
<html class="dark">

<head>
    <title>Ensonet</title>
    @include('Head/css')
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/css/emojis.css">
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="dark:bg-dark-main w-full h-screen">
        @include('Modal\ModalTroChuyen\Child\GUICreateGroup')
    </div>
</body>

</html>