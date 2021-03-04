<!DOCTYPE html>

<head>
    <title>Pusher Test</title>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
</head>

<body>
    <h1>Pusher Test</h1>
    <p>
        Try publishing an event to channel <code>my-channel</code>
        with event name <code>my-event</code>.
    </p>

    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('d8a8c897ed00512a1cd4', {
            cluster: 'ap1'
        });

        console.log("pusher======", pusher)
        var channel = pusher.subscribe('ensonet');
        channel.bind('new-noti', function(data) {
            alert(JSON.stringify(data));
        });
    </script>
</body>