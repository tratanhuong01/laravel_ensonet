var day_se = $("#day-se");
var month_se = $("#month-se");
var year_se = $("#year-se");
day_se.prop("disabled", true);
month_se.prop("disabled", true);
for (var i = 1920; i <= 2021; i++)
    year_se.append("<option>" + i + "</option>");
function checkYear(obj) {
    day_se.prop("disabled", true);
    var y = obj.value;
    if (y === "")
        month_se.prop("disabled", true);
    else {
        for (var i = 1; i <= 12; i++)
            month_se.append("<option>" + i + "</option>");
        month_se.prop("disabled", false);
    }
}
function checkMonth(obj) {
    day_se.prop("disabled", false);
    var y = obj.value;
    if (y == 1 || y == 3 || y == 5 || y == 7 || y == 8 || y == 10 || y == 12)
        for (var i = 1; i <= 31; i++)
            day_se.append("<option>" + i + "</option>");
    else if (y == 4 || y == 6 || y == 9 || y == 11)
        for (var i = 1; i <= 31; i++)
            day_se.append("<option>" + i + "</option>");
    else
        if (year_se.value % 4 == 0)
            for (var i = 1; i <= 29; i++)
                day_se.append("<option>" + i + "</option>");
        else
            for (var i = 1; i <= 28; i++)
                day_se.append("<option>" + i + "</option>");
}
function openRegister() {
    $("#form-register").show();
    $("#web").css("opacity", "0.2");
}
function closeRegister() {
    $("#form-register").hide();
    $("#web").css("opacity", "1");
}
function openGetAcc() {
    $("#get-account-main").show();
    $("#web").css("opacity", "0.2");
}
function closeGetAcc() {
    $("#get-account-main").hide();
    $("#web").css("opacity", "1");
}
function checkEmail(e) {
    var regex_email = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    var email_again = document.getElementById("email-again");
    var emailOrPhone = document.getElementById("emailOrPhone");
    if (regex_email.test(emailOrPhone.value)) {
        email_again.style.display = 'block';
    }
    else {
        email_again.style.display = 'none';
    }
}