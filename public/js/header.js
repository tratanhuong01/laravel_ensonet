function openNotifications() {
    if ($('#modalHeaderRight').html() == '') {
        $.ajax({
            method: "GET",
            url: "/ProcessShowModalNotifications",
            success: function (response) {
                $('#modalHeaderRight').html(response);
            }
        });
        $.ajax({
            method: "GET",
            url: "/ProcessUpdateStateNotifications",
            success: function (response) {
                $('#numNotification').html(response);
            }
        });
    }
    else {
        $('#modalHeaderRight').html('');
    }
}
function tickAllIsReaded() {
    $.ajax({
        method: "GET",
        url: "/ProcessTickAllIsRead",
        success: function (response) {
            console.log(response);
            $(".dotNotView").map(function () {
                this.remove();
            }).get();
        }
    });
}