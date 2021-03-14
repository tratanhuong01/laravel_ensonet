if (navigator.onLine) {
    console.log('We\'re online!');
    $.ajax({
        method: "GET",
        url: "ProcessStateUsersOnline",
        success: function (response) {

        }
    });
} else {

}

window.addEventListener('online', function (e) {
    console.log('We\'re online!');
    $.ajax({
        method: "GET",
        url: "ProcessStateUsersOnline",
        success: function (response) {

        }
    });
});

window.addEventListener('offline', function (e) {
    console.log('We\'re offline...');
    $.ajax({
        method: "GET",
        url: "ProcessStateUsersOffline",
        success: function (response) {

        }
    });
});