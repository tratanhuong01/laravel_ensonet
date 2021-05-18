function loadCategoryAd(name, element) {
    $.ajax({
        method: "GET",
        url: "/admin/ProcessLoadCategoryAd",
        data: {
            name: name,
        },
        success: function (response) {
            $(".activeBorder").addClass("border-white");
            $(".activeBorder").removeClass(
                "activeBorder border-blue-500 bg-gray-300"
            );
            element.classList += " activeBorder border-blue-500 bg-gray-300";
            element.classList.remove("border-white");
            $("#content").html(response.view);
            window.history.pushState("", "", "/admin/" + name);
        },
    });
}
function openModalAd(name) {
    if ($("#" + name).length > 0) {
        if ($("#" + name).hasClass("hidden"))
            $("#" + name).removeClass("hidden");
        else $("#" + name).addClass("hidden");
    }
}
function closeModalAd() {
    second.innerHTML = "";
    second.classList.remove("fixed");
    second.classList.remove("h-screen");
}
function openModalViewDetailAd(name, IDTaiKhoan) {
    $.ajax({
        method: "GET",
        url: "/admin/ProcessLoadViewDetailAd",
        data: {
            name: name,
            IDTaiKhoan: IDTaiKhoan,
        },
        success: function (response) {
            second.innerHTML = response.view;
            second.className += " fixed h-screen";
        },
    });
}
function paginationAdmin(name, index) {
    $.ajax({
        method: "GET",
        url: "/admin/ProcessPaginationAdmin",
        data: {
            index: index,
            name: name,
        },
        success: function (response) {
            $("#tableMain").html(response.viewTable);
            $("#pageMain").html(response.viewPage);
        },
    });
}
function openPost(type) {
    document.getElementsByTagName("body")[0].classList.add("overflow-hidden");
    second.className += " fixed h-screen";
    $("#second").append(createElementFromHTML($("#myLoading").html()));
    $.ajax({
        method: "GET",
        url: "ProcessOpenPostDialog",
        data: {
            type: type,
        },
        success: function (response) {
            second.innerHTML = response;
            new MeteorEmoji(
                document.getElementById("textarea-post"),
                document.getElementById("myTriggers"),
                document.getElementById("myEmojis")
            );
        },
    });
}
function closePost() {
    document
        .getElementsByTagName("body")[0]
        .classList.remove("overflow-hidden");
    second.innerHTML = "";
    second.classList.remove("fixed");
    second.classList.remove("h-screen");
}
