function submitFormRegister() {
    $('#btn-submit-form').html('');
    $('#btn-submit-form').prop("disabled", true);
    $('#btn-submit-form').css('cursor', 'not-allowed');
    $('#btn-submit-form').append('<i class="fas fa-cog fa-spin text-xl"></i>');
    $.ajax({
        method: "GET",
        url: 'ProcessRegister',
        data: $('#formRegister').serialize(),
        success: function (response) {
            $('#register').html(response);
        }
    });
}
function submitFormVerify() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            $("#web").css("opacity", "0.1");
            document.getElementById('register').innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", 'ProcessVerify?emailOrPhone=' + value('emailOrPhone') + '&code_veri=' + value('code_veri'), true);
    xmlhttp.send();
}
function sendCodeAgain() {
    $('#btn-send-code').html('');
    $('#btn-send-code').prop("disabled", true);
    $('#btn-send-code').css('cursor', 'not-allowed');
    $('#btn-send-code').append('<i class="fas fa-cog fa-spin text-xl"></i>');
    $.ajax({
        method: "GET",
        url: 'ProcessSendCodeAgain',
        data: $('#formSendAgainCode').serialize(),
        success: function (response) {
            $('#register').html(response);
        }
    });
}