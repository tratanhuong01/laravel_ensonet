<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="checked" method="POST">
        {{csrf_field()}}
        <input type="submit" value="submit">
    </form>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.1/socket.io.js"></script>
    <script>
        var socket = io('http://localhost:6001')
        socket.on('message', function(data) {
            console.log('Đã có tin nhắn')
        })
    </script>
</body>

</html>