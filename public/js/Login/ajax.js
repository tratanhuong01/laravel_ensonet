function loadajax(value, nameID) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            second.innerHTML = this.responseText;
            $('#second').addClass('fixed h-screen');
        }
    };
    xmlhttp.open("GET", value, true);
    xmlhttp.send();
}
function value(names) {
    return document.getElementById(names).value;
}
function submitFormRegister() {
    $('#btn-submit-form').html('');
    $('#btn-submit-form').prop("disabled", true);
    $('#btn-submit-form').css('cursor', 'not-allowed');
    $('#btn-submit-form').append('<i class="fas fa-cog fa-spin text-xl"></i>');
    $.ajax({
        method: "GET",
        url: '/ProcessRegister',
        data: $('#formRegister').serialize(),
        success: function (response) {
            second.className += ' fixed h-screen';
            $('#second').html(response);
        }
    });
}
function submitFormVerify() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            second.className += ' fixed h-screen';
            second.innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", '/ProcessVerify?emailOrPhone=' + value('emailOrPhone') + '&code_veri=' + value('code_veri'), true);
    xmlhttp.send();
}
function sendCodeAgain() {
    $('#btn-send-code').html('');
    $('#btn-send-code').prop("disabled", true);
    $('#btn-send-code').css('cursor', 'not-allowed');
    $('#btn-send-code').append('<i class="fas fa-cog fa-spin text-xl"></i>');
    $.ajax({
        method: "GET",
        url: '/ProcessSendCodeAgain',
        data: $('#formSendAgainCode').serialize(),
        success: function (response) {
            $('#second').html(response);
        }
    });
}
function forgetAccount() {
    $.ajax({
        method: "GET",
        url: '/ProcessForgetAccount',
        data: $('#formNhapTT').serialize(),
        success: function (response) {
            $('#second').html(response);
            second.className += ' fixed h-screen';
        }
    });
}