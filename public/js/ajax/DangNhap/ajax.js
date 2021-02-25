function forgetAccount() {
    $("#web").css("opacity", "0.2");
    $.ajax({
        method: "GET",
        url: 'ProcessForgetAccount',
        data: $('#formNhapTT').serialize(),
        success: function (response) {
            $('#register').html(response);
        }
    });
}