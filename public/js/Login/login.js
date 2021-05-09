function checkEmail() {
    var regex_email = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    var regex_phone = /((09|03|07|08|05)+([0-9]{8})\b)/g;
    var email_again = document.getElementsByClassName("email_again_one");
    var emailOrPhone = document.getElementById("emailOrPhone");
    var emailAgain = document.getElementById("emailAgain");
    if (regex_email.test(emailOrPhone.value)) {
        email_again[0].style.cssText += ";display:block !important;";
        emailAgain.className =
            "input_register w-96per p-2.5 rounded-lg border-2 border-solid border-gray-300";
        document.getElementsByClassName("value_error")[3].innerText = "";
        // document.getElementById('emailOrPhone').name = 'email';
    }
    // else if (regex_phone.test(emailOrPhone.value)){
    //     document.getElementById('emailOrPhone').name = 'phone';

    // }
    else {
        email_again[0].style.display = "none";
    }
}
function uncheckEmail() {
    var emailAgain = document.getElementById("emailAgain");
    var emailOrPhone = document.getElementById("emailOrPhone");
}
function onclickRegister(classNames, index) {
    document.getElementsByClassName("value_error")[index].innerHTML = " ";
    document.getElementsByClassName("input_register")[
        index
    ].className = classNames;
}
function loginlogin() {}
