function openModalNickName(IDNhomTinNhan, IDTaiKhoan) {
    document.getElementsByTagName("body")[0].classList.add("overflow-hidden");
    second.className += " fixed h-screen";
    $("#second").append(createElementFromHTML($("#myLoading").html()));
    $.ajax({
        method: "GET",
        url: "/ProcessViewChangeNickName",
        data: {
            IDNhomTinNhan: IDNhomTinNhan,
            IDTaiKhoan: IDTaiKhoan,
        },
        success: function (response) {
            second.innerHTML = response.view;
        },
    });
}
function eventOpenOrCloseEditNickName(IDTaiKhoan) {
    if ($("#" + IDTaiKhoan + "unactiveNickName").hasClass("hidden")) {
        $("#" + IDTaiKhoan + "unactiveNickName").removeClass("hidden");
        $("#" + IDTaiKhoan + "checkedEditNickName").addClass("hidden");
        $("#" + IDTaiKhoan + "inputNickName").addClass("hidden");
        $("#" + IDTaiKhoan + "penEditNickName").removeClass("hidden");
    } else {
        $("#" + IDTaiKhoan + "unactiveNickName").addClass("hidden");
        $("#" + IDTaiKhoan + "checkedEditNickName").removeClass("hidden");
        $("#" + IDTaiKhoan + "inputNickName").removeClass("hidden");
        $("#" + IDTaiKhoan + "penEditNickName").addClass("hidden");
    }
}
function saveNickName(
    event,
    IDTaiKhoan,
    IDNhomTinNhan,
    user,
    element,
    value,
    IDMain,
    numberMember
) {
    if (event.keyCode === 13) {
        numberMember = Number(numberMember);
        $.ajax({
            method: "GET",
            url: "/ProcessEditNickNameUserChat",
            data: {
                IDNhomTinNhan: IDNhomTinNhan,
                IDTaiKhoan: IDTaiKhoan,
                NickName: element.value,
                user: user,
            },
            success: function (response) {
                $(
                    "#" +
                        IDNhomTinNhan +
                        (numberMember === 1 ? IDMain : "") +
                        "Messenges"
                ).append(response.view);
                console.log(
                    IDNhomTinNhan +
                        (numberMember === 1 ? IDMain : "") +
                        "Messenges"
                );
                $("#" + IDTaiKhoan + "unactiveNickName").removeClass("hidden");
                $("#" + IDTaiKhoan + "checkedEditNickName").addClass("hidden");
                $("#" + IDTaiKhoan + "inputNickName").addClass("hidden");
                $("#" + IDTaiKhoan + "penEditNickName").removeClass("hidden");
                $("#" + IDMain + "SettingChat").addClass("hidden");
                if ($("#" + IDTaiKhoan + "nameChat").length > 0) {
                    $("#" + IDTaiKhoan + "nameChat").html(element.value);
                }

                if (element.value === null || element.value === "") {
                    $("#" + IDTaiKhoan + "topNickName").html(
                        JSON.parse(value).Ho + " " + JSON.parse(value).Ten
                    );
                    $("#" + IDTaiKhoan + "bottomNickName").html(
                        "Đặt biệt danh"
                    );
                    $("#" + IDTaiKhoan + "inputNickName").attr(
                        "placeholder",
                        JSON.parse(value).Ho + " " + JSON.parse(value).Ten
                    );
                } else {
                    $("#" + IDTaiKhoan + "topNickName").html(element.value);
                    $("#" + IDTaiKhoan + "bottomNickName").html(
                        JSON.parse(value).Ho + " " + JSON.parse(value).Ten
                    );
                    $("#" + IDTaiKhoan + "inputNickName").attr(
                        "placeholder",
                        element.value
                    );
                }
                $("#" + IDTaiKhoan + "inputNickName").val("");
                var objDiv = document.getElementById(
                    IDNhomTinNhan +
                        (numberMember === 1 ? IDMain : "") +
                        "Messenges"
                );
                if (objDiv.scrollHeight > 352)
                    objDiv.scrollTop = objDiv.scrollHeight;
            },
        });
    }
}
function openModalIconFeelChange(IDNhomTinNhan, user) {
    document.getElementsByTagName("body")[0].classList.add("overflow-hidden");
    second.className += " fixed h-screen";
    $("#second").append(createElementFromHTML($("#myLoading").html()));
    $.ajax({
        method: "GET",
        url: "/ProcessViewChangeIconFeelChat",
        data: {
            IDNhomTinNhan: IDNhomTinNhan,
            user: user,
        },
        success: function (response) {
            second.innerHTML = response.view;
            new MeteorEmojiChat(
                document.getElementById("idNhomTinNhanChatIconFeel"),
                document.getElementById("button"),
                document.getElementById("all")
            );
        },
    });
}
function openModalChangeNameChat(IDNhomTinNhan, user) {
    document.getElementsByTagName("body")[0].classList.add("overflow-hidden");
    second.className += " fixed h-screen";
    $("#second").append(createElementFromHTML($("#myLoading").html()));
    $.ajax({
        method: "GET",
        url: "/ProcessViewChangeNameChat",
        data: {
            IDNhomTinNhan: IDNhomTinNhan,
            user: user,
        },
        success: function (response) {
            second.innerHTML = response.view;
        },
    });
}
function onChangeInputChangeNameChat(element) {
    if (element.value.length > 0) {
        $("#btnChangeNameChat").removeClass("cursor-not-allowed");
        $("#btnChangeNameChat").attr("disabled", false);
        $("#btnChangeNameChat").removeClass("bg-gray-500");
        $("#btnChangeNameChat").addClass("bg-blue-500");
        $("#btnChangeNameChat").addClass("cursor-pointer");
    } else {
        $("#btnChangeNameChat").removeClass("cursor-pointer");
        $("#btnChangeNameChat").addClass("cursor-not-allowed");
        $("#btnChangeNameChat").attr("disabled", true);
        $("#btnChangeNameChat").addClass("bg-gray-500");
        $("#btnChangeNameChat").removeClass("bg-blue-500");
    }
}
function changeNameChat(IDNhomTinNhan, user) {
    $.ajax({
        method: "GET",
        url: "/ProcessChangeNameChat",
        data: {
            IDNhomTinNhan: IDNhomTinNhan,
            data: $("#inputChangeNameChat").val(),
            user: user,
        },
        success: function (response) {
            $(
                "#" +
                    IDNhomTinNhan +
                    (response.numberMembers === 1 ? response.IDMain : "") +
                    "Messenges"
            ).append(response.view);
            document
                .getElementsByTagName("body")[0]
                .classList.remove("overflow-hidden");
            second.innerHTML = "";
            second.classList.remove("fixed");
            second.classList.remove("h-screen");
            var objDiv = document.getElementById(
                IDNhomTinNhan +
                    (response.numberMembers === 1 ? response.IDMain : "") +
                    "Messenges"
            );
            if (objDiv.scrollHeight > 352)
                objDiv.scrollTop = objDiv.scrollHeight;
            // $("#" + response.IDMain + "SettingChat").addClass("hidden");
            $("#" + IDNhomTinNhan + "nameChatGroup").html(response.nameChat);
        },
    });
}
function openModalMemberChatGroup(IDNhomTinNhan, user) {
    document.getElementsByTagName("body")[0].classList.add("overflow-hidden");
    second.className += " fixed h-screen";
    $("#second").append(createElementFromHTML($("#myLoading").html()));
    $.ajax({
        method: "GET",
        url: "/ProcessViewMemberGroupChat",
        data: {
            IDNhomTinNhan: IDNhomTinNhan,
            user: user,
        },
        success: function (response) {
            second.innerHTML = response.view;
        },
    });
}
function outGroupChatMain(IDNhomTinNhan, user) {
    document.getElementsByTagName("body")[0].classList.add("overflow-hidden");
    second.className += " fixed h-screen";
    $("#second").append(createElementFromHTML($("#myLoading").html()));
    $.ajax({
        method: "GET",
        url: "/ProcessViewOutGroupChat",
        data: {
            IDNhomTinNhan: IDNhomTinNhan,
            user: user,
        },
        success: function (response) {
            second.innerHTML = response.view;
            document
                .getElementById("btnOutGroup")
                .addEventListener("click", function () {
                    $.ajax({
                        method: "GET",
                        url: "/ProcessOutGroupChat",
                        data: {
                            IDNhomTinNhan: IDNhomTinNhan,
                            user: user,
                        },
                        success: function (responses) {
                            document
                                .getElementsByTagName("body")[0]
                                .classList.remove("overflow-hidden");
                            second.innerHTML = "";
                            second.classList.remove("fixed");
                            second.classList.remove("h-screen");
                            $(
                                "#" +
                                    IDNhomTinNhan +
                                    JSON.parse(user).IDTaiKhoan +
                                    "Chat"
                            ).remove();
                        },
                    });
                });
        },
    });
}
function deleteAllChatByUser(IDNhomTinNhan, user) {
    document.getElementsByTagName("body")[0].classList.add("overflow-hidden");
    second.className += " fixed h-screen";
    $("#second").append(createElementFromHTML($("#myLoading").html()));
    $.ajax({
        method: "GET",
        url: "/ProcessViewDeleteAllChat",
        data: {
            IDNhomTinNhan: IDNhomTinNhan,
            user: user,
        },
        success: function (response) {
            second.innerHTML = response.view;
            document
                .getElementById("btnDeleteAllChat")
                .addEventListener("click", function () {
                    $.ajax({
                        method: "GET",
                        url: "/ProcessDeleteAllChat",
                        data: {
                            IDNhomTinNhan: IDNhomTinNhan,
                            user: user,
                        },
                        success: function (responses) {
                            document
                                .getElementsByTagName("body")[0]
                                .classList.remove("overflow-hidden");
                            second.innerHTML = "";
                            second.classList.remove("fixed");
                            second.classList.remove("h-screen");
                            $(
                                "#" +
                                    IDNhomTinNhan +
                                    JSON.parse(user).IDTaiKhoan +
                                    "Chat"
                            ).remove();
                        },
                    });
                });
        },
    });
}
