$.ajax({
    method: "GET",
    data: {
        IDTaiKhoan: getUserID()
    },
    url: "ProcessStateUsersOnline",
    success: function (response) {

    }
});
setInterval(function () {
    $.ajax({
        method: "GET",
        data: {
            IDTaiKhoan: getUserID()
        },
        url: "ProcessStateUsersOnline",
        success: function (response) {

        }
    });
}, 30000)
