Pusher.logToConsole = true;

var pusher = new Pusher('5064fc09fcd20f23d5c1', {
    cluster: 'ap1'
});

var channel = pusher.subscribe('test.' + '1000000007');
channel.bind('tests', function () {
    $.ajax({
        method: "GET",
        url: "/ProcessNotificationShow",
        success: function (response) {
            $('#numNotification').html(response);
        }
    });
});