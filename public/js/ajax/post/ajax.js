//xem tất cả số lượng cảm xúc của bài đăng
function viewDetailFeel(IDBaiDang, Path) {
    $.ajax({
        method: "GET",
        url: Path + "/" + "ProcessViewDetailFeel",
        data: {
            IDBaiDang: IDBaiDang,
        },
        success: function (response) {
            $("#second").html(response);
            $("#modal-one").show();
            second.className += " fixed h-screen";
        },
    });
}
//xem số lượng mỗi cảm xúc của bài đăng
function viewOnlyDetailFeel(IDBaiDang, LoaiCamXuc, Path) {
    $.ajax({
        method: "GET",
        url: "/" + "ProcessViewOnlyDetailFeel",
        data: {
            IDBaiDang: IDBaiDang,
            LoaiCamXuc: LoaiCamXuc,
        },
        success: function (response) {
            $("#all").html(response);
        },
    });
}
// mở hộp thoại chỉnh sửa bài đăng
function openEditPost(ids) {
    $("#" + ids).show();
    document.getElementById(ids + "Main").addEventListener(
        "click",
        function () {
            $("#" + ids).hide();
        },
        true
    );
}
// chọn quyền riêng tư
function selectPrivacy() {
    $.ajax({
        method: "GET",
        url: "/ProcessSelecPrivacyPost",
        data: {},
        success: function (response) {
            var div = document.createElement("div");
            div.id = "modal-two";
            div.className =
                "shadow-sm border border-solid border-gray-500 py-3 pl-1.5 pr-1.5 pt-0" +
                " bg-white w-full fixed z-50 top-1/2 left-1/2 dark:bg-dark-second rounded-lg " +
                " sm:w-10/12 md:w-2/3 lg:w-2/3 xl:w-1/3";
            div.style.zIndex = "10";
            div.style.transform = "translate(-50%,-50%)";
            div.innerHTML = response;
            $("#second").append(div);
            $("#modal-one").hide();
            second.className += " fixed h-screen";
            $("#closeModalSelectPrivacy").click(function () {
                $("#modal-two").remove();
                $("#modal-one").show();
            });
        },
    });
}
// event onchange chọn quyền riêng tư của bài đăng
function handelOnChangeInput(IDQuyenRiengTu) {
    $.ajax({
        method: "GET",
        url: "/ProcessOnChangeInputPrivacy",
        data: {
            IDQuyenRiengTu: IDQuyenRiengTu,
        },
        success: function (response) {
            $("#selectPrivacyMain").html(response);
            $("#modal-two").remove();
            $("#modal-one").show();
            $("#IDQuyenRiengTu").val(IDQuyenRiengTu);
        },
    });
}
//chỉnh sửa bài đăng
function editPost(IDBaiDang) {
    document.getElementsByTagName("body")[0].classList.add("overflow-hidden");
    second.className += " fixed h-screen";
    $("#second").append(createElementFromHTML($("#myLoading").html()));
    $.ajax({
        method: "GET",
        url: "/ProcessViewEditPost",
        data: {
            IDBaiDang: IDBaiDang,
        },
        success: function (response) {
            second.innerHTML = response.view;
            new MeteorEmoji(
                document.getElementById("textarea-post"),
                document.getElementById("myTriggers"),
                document.getElementById("myEmojis")
            );
            if (response.json !== "")
                if (response.state !== "3") loadUIEditPostMain(response.json);
        },
    });
}
//thay đổi đối tượng quyền riêng tư của bài đăng
function changeObjectPrivacyPost(IDBaiDang) {
    document.getElementsByTagName("body")[0].classList.add("overflow-hidden");
    second.className += " fixed h-screen";
    $("#second").append(createElementFromHTML($("#myLoading").html()));
    $.ajax({
        method: "GET",
        url: "/ProcessViewObjectPrivacyPost",
        data: {},
        success: function (response) {
            second.innerHTML = response;
            $("#IDBaiDangs").val(IDBaiDang);
        },
    });
}
// event onchange bài đăng dialog
function handelOnChangeInputPost(IDQuyenRiengTu) {
    $.ajax({
        method: "GET",
        url: "/ProcessEditObjectPrivacyPost",
        data: {
            IDQuyenRiengTu: IDQuyenRiengTu,
            IDBaiDang: $("#IDBaiDangs").val(),
        },
        success: function (response) {
            $("#" + $("#IDBaiDangs").val() + "QRT").html(response);
            second.innerHTML = "";
            second.classList.remove("fixed");
            second.classList.remove("h-screen");
        },
    });
}
//xóa bài đăng
function deleteWarnPost(IDBaiDang, IDMain) {
    document.getElementsByTagName("body")[0].classList.add("overflow-hidden");
    second.className += " fixed h-screen";
    $("#second").append(createElementFromHTML($("#myLoading").html()));
    $.ajax({
        method: "GET",
        url: "/ProcessWarnDeletePost",
        data: {
            IDBaiDang: IDBaiDang,
        },
        success: function (response) {
            second.innerHTML = response;
            $("#huyXoaBaiDang").click(function () {
                second.innerHTML = "";
                second.classList.remove("fixed");
                second.classList.remove("h-screen");
            });
            $("#btnXoaBaiDang").click(function () {
                $.ajax({
                    method: "GET",
                    url: "ProcessDeletePost",
                    data: {
                        IDBaiDang: IDBaiDang,
                    },
                    success: function (response) {
                        $("#" + IDMain).remove();
                        second.innerHTML = "";
                        second.classList.remove("fixed");
                        second.classList.remove("h-screen");
                    },
                });
            });
        },
    });
}
//gắn thẻ bạn bè
function viewTagFriends() {
    $.ajax({
        method: "GET",
        url: "/ProcesViewTagFriend",
        success: function (response) {
            $("#second").append(response);
            $("#modal-one").hide();
            $("#modal-two").show();
        },
    });
}
function searchTagFriends(IDTaiKhoan) {
    $.ajax({
        method: "GET",
        url: "/ProcessSearchTagFriend",
        data: {
            IDTaiKhoan: IDTaiKhoan,
            HoTen: $("#searchTagFriends").val(),
        },
        success: function (response) {
            $("#tag-users").html(response);
        },
    });
}
function returnViewCreatePost() {
    $.ajax({
        method: "GET",
        url: "/ProcesViewCreatePost",
        success: function (response) {
            $("#second").html(response);
            new MeteorEmoji(
                document.getElementById("textarea-post"),
                document.getElementById("myTriggers"),
                document.getElementById("myEmojis")
            );
        },
    });
}
function tagFriends(IDTaiKhoan) {
    $.ajax({
        method: "GET",
        url: "/ProcessTagFriend",
        data: {
            IDTaiKhoan: IDTaiKhoan,
        },
        success: function (response) {
            $("#" + IDTaiKhoan + "Check").html(response.check);
            $("#usersTagPost").append(response.view);
            $("#tag").html(response.tag);
            if (response.view == "") {
                $("#" + IDTaiKhoan + "Check").html("");
                $("#" + IDTaiKhoan + "SelectedTagPost").remove();
                $("#tag").html(response.tag);
            }
        },
    });
}
function removeUserSelectedPostTag(IDTaiKhoan) {
    $.ajax({
        method: "GET",
        url: "/ProcessRemoveTagFriendPost",
        data: {
            IDTaiKhoan: IDTaiKhoan,
        },
        success: function (response) {
            $("#" + IDTaiKhoan + "Check").html(response.check);
            $("#" + IDTaiKhoan + "SelectedTagPost").remove();
            $("#tag").html(response.tag);
        },
    });
}
//tâm trạng hiện tại
function viewFeelCurrent(type) {
    $.ajax({
        method: "GET",
        url: "/ProcessViewFeelCurrent",
        success: function (response) {
            if (!$("#second").hasClass("fixed h-screen")) {
                $.ajax({
                    method: "GET",
                    url: "ProcessOpenPostDialog",
                    data: {
                        type: type,
                    },
                    success: function (responses) {
                        $("#second").append(responses);
                        $("#second").addClass("fixed h-screen");
                        new MeteorEmoji(
                            document.getElementById("textarea-post"),
                            document.getElementById("myTriggers"),
                            document.getElementById("myEmojis")
                        );
                        $("#second").append(response);
                    },
                });
            } else {
                $("#second").append(response);
                $("#modal-one").hide();
                $("#modal-two").show();
            }
        },
    });
}
function viewLocal() {
    $.ajax({
        method: "GET",
        url: "/ProcessViewLocalPost",
        success: function (response) {
            $("#second").append(response.view);
            $("#modal-one").hide();
            $("#modal-two").show();
        },
    });
}
function searchFeelCurrent() {
    $.ajax({
        method: "GET",
        url: "/ProcessSearchFeelCurrent",
        data: {
            TenCamXuc: $("#searchFeelCurrent").val(),
        },
        success: function (response) {
            $("#feelUserCurrent").html(response);
        },
    });
}
function tickFeel(IDCamXuc) {
    $.ajax({
        method: "GET",
        url: "/ProcessTickFeelCurrent",
        data: {
            IDCamXuc: IDCamXuc,
        },
        success: function (response) {
            $("#" + $("#IDCamXucPrev").val() + "Tick").html("");
            $("#" + IDCamXuc + "Tick").html(response.view);
            $("#IDCamXucPrev").val(IDCamXuc);
            $("#feelCur").html(response.feelCur);
        },
    });
}
function viewUserTagOfPost(IDBaiDang, user) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    document.getElementsByTagName("body")[0].classList.add("overflow-hidden");
    second.className += " fixed h-screen";
    $("#second").append(createElementFromHTML($("#myLoading").html()));
    $.ajax({
        method: "GET",
        url: "/ProcessViewUserTagOfPost",
        data: {
            IDBaiDang: IDBaiDang,
            user: user,
        },
        success: function (response) {
            $("#second").html(response);
        },
    });
}
function searchLocal() {
    $.ajax({
        method: "GET",
        url: "/ProcessSearchLocal",
        data: {
            Ten: $("#localInputPost").val(),
        },
        success: function (response) {
            $("#localPost").html(response.view);
        },
    });
}
function tickLocal(ID, Loai) {
    $.ajax({
        method: "GET",
        url: "/ProcessTickLocal",
        data: {
            ID: ID,
            Loai: Loai,
        },
        success: function (response) {
            $("#" + $("#IDViTriPrev").val() + "Tick").html("");
            $("#" + ID + "Tick").html(response.view);
            $("#IDViTriPrev").val(ID);
            $("#local").html(response.local);
        },
    });
}
function postTimeLine(IDNhan) {
    $("#button-post").html("");
    $("#button-post").prop("disabled", true);
    $("#button-post").css("cursor", "not-allowed");
    $("#button-post").append('<i class="fas fa-cog fa-spin text-xl"></i>');
    let formData = new FormData($("#formPost")[0]);
    formData.append("IDNhan", IDNhan);
    $.ajax({
        method: "POST",
        url: "/ProcessPostTimeLine",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            $(".timeline").prepend(response.view);
            second.innerHTML = "";
            second.classList.remove("fixed");
            second.classList.remove("h-screen");
        },
        error: function (response) {
            console.log(response);
        },
    });
}
