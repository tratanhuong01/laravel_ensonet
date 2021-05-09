// quên tài khoản
function forgetAccount() {
    $("#web").css("opacity", "0.2");
    $.ajax({
        method: "GET",
        url: "/ProcessForgetAccount",
        data: $("#formNhapTT").serialize(),
        success: function (response) {
            $("#register").html(response);
        },
    });
}
function openAddAccount() {
    document.getElementsByTagName("body")[0].classList.add("overflow-hidden");
    second.className += " fixed h-screen";
    $("#second").append(createElementFromHTML($("#myLoading").html()));
    $.ajax({
        method: "GET",
        url: "/ProcessOpenModalAddAccountLogin",
        success: function (response) {
            second.innerHTML = response.view;
            second.classList.add("fixed");
            second.classList.add("h-screen");
        },
    });
}
function onChangeCheckBoxSavePassword(element) {
    element.value = element.checked ? "true" : "false";
}
function loginSubmit(event, type) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    event.preventDefault();
    let formData = new FormData($("#modalFormLogin")[0]);
    formData.append("type", type);
    formData.append(
        "remember",
        document.getElementById("save_password").checked ? "true" : "false"
    );
    $.ajax({
        method: "POST",
        url: "/ProcessLoginModal",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            if (response.status === "0") {
                $("#get-account-main").replaceWith(
                    createElementFromHTML(response.view)
                );
            } else {
                $("#modalFormLogin").submit();
            }
        },
    });
}

function removeAccountSave(ID) {
    $.ajax({
        method: "GET",
        url: "/ProcessRemoveAccountSave",
        data: {
            ID: ID,
        },
        success: function (response) {
            if (response.state === "Done") {
                $("#leftLogin").html(response.view);
            } else {
                $("#cookie" + ID).remove();
            }
        },
    });
}

function clickLoginAccountSave(ID, account, status) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    if (status === "true") {
        let formData = new FormData();
        console.log(account);
        var account = JSON.parse(account);
        formData.append("emailOrPhone", account.EmailOrPhone);
        formData.append("passWord", account.Password);
        $.ajax({
            method: "POST",
            url: "/ProcessLogin",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                window.location.href = "index";
            },
        });
    } else {
        document
            .getElementsByTagName("body")[0]
            .classList.add("overflow-hidden");
        second.classList.add("fixed");
        second.classList.add("h-screen");
        $("#second").append(createElementFromHTML($("#myLoading").html()));
        $.ajax({
            method: "GET",
            url: "/ProcessViewAddAccountSave",
            data: {
                account: account,
                status: status,
            },
            success: function (response) {
                second.innerHTML = response.view;
            },
        });
    }
}
