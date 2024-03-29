function changeAvatar(event) {
    var path = URL.createObjectURL(event.target.files[0]);
    let formData = new FormData($("#formAvatar")[0]);
    $.ajax({
        method: "POST",
        url: "/ProcessViewAvatar",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            second.innerHTML = response;
            second.className += " fixed h-screen";
            $("#avt-opactity").attr("src", path);
            $("#avt-opactity-none").attr("src", path);
            var child = $("#changeavt").clone();
            $("#formUpdateAvatar1").append(child);
        },
    });
}
function changeBia(event) {
    var path = URL.createObjectURL(event.target.files[0]);
    var showBia = document.getElementById("showSubmitBia");
    document.getElementById("anhBia").src = path;
    showBia.style.display = "block";
    document
        .getElementById("formUpdateCover")
        .appendChild(document.getElementById("changeB"));
}
function updateAvatar(element) {
    let formData = new FormData($("#formUpdateAvatar")[0]);
    element.disabled = true;
    element.classList.add("cursor-not-allowed");
    element.classList.add("bg-gray-500");
    element.classList.remove("bg-blue-600");
    element.innerHTML = '<i class="fas fa-cog fa-spin text-xl"></i>';
    $("#btnCancelUpdateAvatar").remove();
    $.ajax({
        method: "POST",
        url: "/ProcessUpdateAvatar",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            var re = document.getElementById("ajaxAnhDaiDien");
            var parent1 = document.createElement("div");
            parent1.className =
                "w-44 h-44 rounded-full mx-auto border-4 border-solid border-white pt-16 dark:bg-dark-third bg-gray-100";
            var child1 = document.createElement("i");
            child1.className =
                "fas fa-spinner fa-pulse text-5xl dark:text-white";
            parent1.appendChild(child1);
            var parent2 = document.createElement("div");
            parent2.className =
                "w-8 h-8 rounded-full mx-auto py-0.5 px-1.5 dark:bg-dark-third bg-gray-100";
            var child2 = document.createElement("i");
            child2.className =
                "fas fa-spinner fa-pulse text-xl dark:text-white";
            parent2.appendChild(child2);
            $("#ajaxAnhDaiDien").html("");
            $("#ajaxAnhDaiDien1").html("");
            re.appendChild(parent1);
            $("#ajaxAnhDaiDien1").append(parent2);
            second.innerHTML = "";
            $("#show__post").prepend(response.viewMain);
            second.classList.remove("fixed");
            second.classList.remove("h-screen");
            setTimeout(function () {
                $("#ajaxAnhDaiDien").html(response.viewChild);
                $("#ajaxAnhDaiDien1").html("");
                $("#ajaxAnhDaiDien1").append(
                    '<img class="w-8 h-8 rounded-full" id="ajaxAnhDaiDien2" src="" alt="" />'
                );
                var src = document.getElementById("anhDaiDien_Main").src;
                $("#ajaxAnhDaiDien2").attr("src", src);
            }, 1000);
        },
    });
}
function updateCoverImage() {
    let formData = new FormData($("#formUpdateCover")[0]);
    $("#showSubmitBia").hide();
    $("#loadingUpdateCover").removeClass("hidden");
    $.ajax({
        method: "POST",
        url: "/ProcessUpdateCoverImage",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            $("#loadingUpdateCover").addClass("hidden");
            $("#show__post").prepend(response.viewMain);
            $("#ajaxCover").html(response.viewChild);
        },
    });
}
function ajaxProfileFriend(ID, NameID) {
    $.ajax({
        method: "GET",
        url: "/ProcessProfileFriend",
        data: {
            IDView: ID,
        },
        success: function (response) {
            $("#post").removeClass(
                "border-b-4 border-blue-500 text-blue-500 text-blue-500"
            );
            $("#pictures").removeClass(
                "border-b-4 border-blue-500 text-blue-500"
            );
            $("#about").removeClass("border-b-4 border-blue-500 text-blue-500");
            $("#more").removeClass("border-b-4 border-blue-500 text-blue-500");
            $("#friends").addClass("border-b-4 border-blue-500 text-blue-500");
            $("#" + NameID).html(response);
            window.history.pushState("", "", "/profile." + ID + "/friends");
        },
    });
}
function ajaxProfilePicture(ID, NameID) {
    $.ajax({
        method: "GET",
        url: "/ProcessProfilePicture",
        data: {
            IDView: ID,
        },
        success: function (response) {
            $("#about").removeClass("border-b-4 border-blue-500 text-blue-500");
            $("#post").removeClass("border-b-4 border-blue-500 text-blue-500");
            $("#friends").removeClass(
                "border-b-4 border-blue-500 text-blue-500"
            );
            $("#pictures").addClass("border-b-4 border-blue-500 text-blue-500");
            $("#more").removeClass("border-b-4 border-blue-500 text-blue-500");
            $("#" + NameID).html(response);
            window.history.pushState("", "", "/profile." + ID + "/pictures");
        },
    });
}
function ajaxProfileAbout(ID, NameID) {
    $.ajax({
        method: "GET",
        url: "/ProcessProfileAbout",
        data: {
            IDView: ID,
        },
        success: function (response) {
            $("#about").addClass("border-b-4 border-blue-500 text-blue-500");
            $("#post").removeClass("border-b-4 border-blue-500 text-blue-500");
            $("#friends").removeClass(
                "border-b-4 border-blue-500 text-blue-500"
            );
            $("#pictures").removeClass(
                "border-b-4 border-blue-500 text-blue-500"
            );
            $("#more").removeClass("border-b-4 border-blue-500 text-blue-500");
            $("#" + NameID).html(response);
            window.history.pushState("", "", "/profile." + ID + "/about");
        },
    });
}
function searchFriend(IDView, event) {
    event.preventDefault();
    $.ajax({
        method: "GET",
        url: "/ProcessSearchFriend",
        data: {
            IDView: IDView,
            hoTen: $("#hoTen").val(),
        },
        success: function (response) {
            $("#place_load_about").html(response);
        },
    });
}
function requestFriendsM(IDTaiKhoan) {
    $.ajax({
        method: "GET",
        url: "/ProcessOpenRequestFriendsMain",
        data: {
            IDTaiKhoan: IDTaiKhoan,
        },
        success: function (response) {
            second.innerHTML = response.view;
            second.className += " fixed h-screen";
        },
    });
}
function editDescribeUser(IDTaiKhoan, Element) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    if (Element.state != "true") {
        Element.state = "true";
        Element.innerHTML = "Lưu";
        $("#DescribeUser").attr("contenteditable", "true");
    } else {
        Element.state = "true";
        let formData = new FormData();
        formData.append("IDTaiKhoan", IDTaiKhoan);
        formData.append("NoiDung", $("#DescribeUser").html());
        $.ajax({
            method: "POST",
            url: "/ProcessEditDescribeUser",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                console.log(formData);
                $("#DescribeUser").removeAttr("contenteditable");
                Element.innerHTML = "Chỉnh sửa";
            },
            error: function (response) {
                console.log(response);
            },
        });
    }
}
function loadAjaxProfileFriendsRequest(IDTaiKhoan) {
    $.ajax({
        method: "GET",
        url: "/ProcessLoadProfileFriendRequest",
        data: {
            IDTaiKhoan: IDTaiKhoan,
        },
        success: function (response) {
            window.history.pushState("", "", "/friends/" + IDTaiKhoan);
            $("#profileRight").html(response.view);
            $("#" + IDTaiKhoan + "profile").addClass(
                "bg-gray-200 dark:bg-dark-third"
            );
        },
    });
}
