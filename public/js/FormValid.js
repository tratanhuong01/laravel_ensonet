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


