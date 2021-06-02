function processCommentImage(IDBaiDang, IDBinhLuan, event) {
    $.ajax({
        method: "GET",
        url: "/ProcessLoadViewCommentImage",
        data: {
            type: 0,
            path: URL.createObjectURL(event.target.files[0]),
            IDBaiDang: IDBaiDang,
            IDBinhLuan: IDBinhLuan,
        },
        success: function (response) {
            $("#" + IDBaiDang + IDBinhLuan + "fileImagess")
                .clone()
                .appendTo("#" + IDBaiDang + IDBinhLuan + "FormComment");
            $("#" + IDBaiDang + IDBinhLuan + "CommentImage").html(
                response.view
            );
        },
        error: function (response) {
            console.log(response);
        },
    });
}
function closeCommentImage(IDBaiDang, IDBinhLuan) {
    $("#" + IDBaiDang + IDBinhLuan + "FormComment").html("");
    $("#" + IDBaiDang + IDBinhLuan + "CommentImage").html("");
}
function openStickerComment(
    IDBaiDang,
    IDBinhLuan,
    IDTaiKhoan,
    IDBinhLuanRep,
    LoaiBinhLuan,
    event
) {
    var y = event.clientY;
    $.ajax({
        method: "GET",
        url: "/ProcessOpenViewStickerCommnet",
        data: {
            IDBaiDang: IDBaiDang,
            IDTaiKhoan: IDTaiKhoan,
            IDBinhLuan: IDBinhLuan,
            IDBinhLuanRep: IDBinhLuanRep,
            LoaiBinhLuan: LoaiBinhLuan,
        },
        success: function (response) {
            if ($("#" + IDBaiDang + IDBinhLuan + "modalComment").length > 0) {
                if (
                    $("#" + IDBaiDang + IDBinhLuan + "modalComment").hasClass(
                        "hidden"
                    )
                ) {
                    if (y < $(window).height() / 2) {
                        $(
                            "#" + IDBaiDang + IDBinhLuan + "modalComment"
                        ).addClass("top-14");
                        $(
                            "#" + IDBaiDang + IDBinhLuan + "modalComment"
                        ).removeClass("bottom-14");
                    } else {
                        $(
                            "#" + IDBaiDang + IDBinhLuan + "modalComment"
                        ).addClass("bottom-14");
                        $(
                            "#" + IDBaiDang + IDBinhLuan + "modalComment"
                        ).removeClass("top-14");
                    }
                    $("#" + IDBaiDang + IDBinhLuan + "modalComment").html(
                        response
                    );
                    $(
                        "#" + IDBaiDang + IDBinhLuan + "modalComment"
                    ).removeClass("hidden");
                } else {
                    $("#" + IDBaiDang + IDBinhLuan + "modalComment").html("");
                    $("#" + IDBaiDang + IDBinhLuan + "modalComment").addClass(
                        "hidden"
                    );
                    $(
                        "#" + IDBaiDang + IDBinhLuan + "modalComment"
                    ).removeClass("bottom-14");
                    $(
                        "#" + IDBaiDang + IDBinhLuan + "modalComment"
                    ).removeClass("top-14");
                }
            }
        },
    });
}
function openGifComment(IDBaiDang, IDBinhLuan, IDTaiKhoan, event) {
    var y = event.clientY;
    $.ajax({
        method: "GET",
        url: "/ProcessOpenViewGifCommnet",
        data: {
            IDBaiDang: IDBaiDang,
            IDTaiKhoan: IDTaiKhoan,
            IDBinhLuan: IDBinhLuan,
        },
        success: function (response) {
            if ($("#" + IDBaiDang + IDBinhLuan + "modalComment").length > 0) {
                if (
                    $("#" + IDBaiDang + IDBinhLuan + "modalComment").hasClass(
                        "hidden"
                    )
                ) {
                    if (y < $(window).height() / 2) {
                        $(
                            "#" + IDBaiDang + IDBinhLuan + "modalComment"
                        ).addClass("top-14");
                        $(
                            "#" + IDBaiDang + IDBinhLuan + "modalComment"
                        ).removeClass("bottom-14");
                    } else {
                        $(
                            "#" + IDBaiDang + IDBinhLuan + "modalComment"
                        ).addClass("bottom-14");
                        $(
                            "#" + IDBaiDang + IDBinhLuan + "modalComment"
                        ).removeClass("top-14");
                    }
                    $("#" + IDBaiDang + IDBinhLuan + "modalComment").html(
                        response
                    );
                    $(
                        "#" + IDBaiDang + IDBinhLuan + "modalComment"
                    ).removeClass("hidden");
                } else {
                    $("#" + IDBaiDang + IDBinhLuan + "modalComment").html("");
                    $("#" + IDBaiDang + IDBinhLuan + "modalComment").addClass(
                        "hidden"
                    );
                    $(
                        "#" + IDBaiDang + IDBinhLuan + "modalComment"
                    ).removeClass("bottom-14");
                    $(
                        "#" + IDBaiDang + IDBinhLuan + "modalComment"
                    ).removeClass("top-14");
                }
            }
        },
    });
}
function postSticker(IDTaiKhoan, IDBaiDang, IDBinhLuan, IDNhanDan) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    var formData = new FormData();
    formData.append("IDTaiKhoan", IDTaiKhoan);
    formData.append("IDBaiDang", IDBaiDang);
    formData.append("IDNhanDan", IDNhanDan);
    formData.append(
        "NoiDungBinhLuan",
        $("#" + IDTaiKhoan + IDBaiDang + "Write").html()
    );
    $("#" + IDBaiDang + IDBinhLuan + "FormComment").html("");
    $("#" + IDBaiDang + IDBinhLuan + "modalComment").html("");
    $("#" + IDBaiDang + IDBinhLuan + "modalComment").addClass("hidden");
    $("#" + IDBaiDang + IDBinhLuan + "FormComment").html("");
    $("#" + IDTaiKhoan + IDBaiDang + "CommentLv1").prepend(
        createLoadingComment()
    );
    $.ajax({
        method: "POST",
        url: "/ProcessPostCommentSticker",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            $("#loadingCommentElement").remove();
            $("#" + IDTaiKhoan + IDBaiDang + "CommentLv1").prepend(response);
        },
    });
}
function postStickerRep(
    IDTaiKhoan,
    IDBaiDang,
    IDBinhLuan,
    IDBinhLuanRep,
    IDNhanDan
) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    var formData = new FormData();
    formData.append("IDTaiKhoan", IDTaiKhoan);
    formData.append("IDBaiDang", IDBaiDang);
    formData.append("IDBinhLuan", IDBinhLuan);
    formData.append("IDBinhLuanRep", IDBinhLuanRep);
    formData.append("IDNhanDan", IDNhanDan);
    formData.append(
        "NoiDungBinhLuan",
        $("#" + IDTaiKhoan + IDBaiDang + IDBinhLuan + "Write").html()
    );
    $.ajax({
        method: "POST",
        url: "/ProcessPostCommentStickerRep",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            $(
                "#" + IDTaiKhoan + IDBaiDang + IDBinhLuanRep + "CommentLv2"
            ).prepend(response);
            $("#" + IDBaiDang + IDBinhLuan + "modalComment").html("");
            $("#" + IDBaiDang + IDBinhLuan + "modalComment").addClass("hidden");
            $("#" + IDBaiDang + IDBinhLuan + "FormComment").html("");
            $("#" + IDBaiDang + IDBinhLuan + "CommentImage").html("");
            $("#" + IDTaiKhoan + IDBaiDang + IDBinhLuan + "Write").html("");
        },
    });
}
function postStickerRepView(IDBaiDang, IDBinhLuan, IDNhanDan) {
    $.ajax({
        method: "GET",
        url: "/ProcessLoadViewCommentImage",
        data: {
            type: 1,
            IDNhanDan: IDNhanDan,
            IDBaiDang: IDBaiDang,
            IDBinhLuan: IDBinhLuan,
        },
        success: function (response) {
            var input = document.createElement("input");
            input.setAttribute("id", IDBaiDang + IDBinhLuan + "IDNhanDan");
            input.setAttribute("class", "hidden");
            input.setAttribute("name", "IDNhanDan");
            input.setAttribute("value", IDNhanDan);
            $("#" + IDBaiDang + IDBinhLuan + "FormComment").html(input);
            $("#" + IDBaiDang + IDBinhLuan + "modalComment").html("");
            $("#" + IDBaiDang + IDBinhLuan + "modalComment").addClass("hidden");
            $("#" + IDBaiDang + IDBinhLuan + "CommentImage").html(
                response.view
            );
        },
        error: function (response) {
            console.log(response);
        },
    });
}
function postMain(IDTaiKhoan, IDBaiDang, IDBinhLuan, IDNhanDan, Loai) {
    switch (Loai) {
        case "1":
            postSticker(IDTaiKhoan, IDBaiDang, IDBinhLuan, IDNhanDan);
            break;
        case "2":
            postStickerRep(IDTaiKhoan, IDBaiDang, IDBinhLuan, IDNhanDan);
            break;
        default:
            break;
    }
}
function postGif() {}
function openModalEditComment(IDBaiDang, IDBinhLuan) {
    if (
        document.getElementById("editComments" + IDBinhLuan + IDBaiDang).style
            .display == "none"
    )
        document.getElementById(
            "editComments" + IDBinhLuan + IDBaiDang
        ).style.display = "block";
    else
        document.getElementById(
            "editComments" + IDBinhLuan + IDBaiDang
        ).style.display = "none";
}
//xóa bài đăng
function deleteWarnComment(IDBaiDang, IDBinhLuan, IDBinhLuanRep) {
    document.getElementsByTagName("body")[0].classList.add("overflow-hidden");
    second.className += " fixed h-screen";
    $("#second").append(createElementFromHTML($("#myLoading").html()));
    $.ajax({
        method: "GET",
        url: "/ProcessWarnDeleteComment",
        success: function (response) {
            second.innerHTML = response;
            $("#huyXoaBinhLuan").click(function () {
                second.innerHTML = "";
                second.classList.remove("fixed");
                second.classList.remove("h-screen");
            });
            $("#btnXoaBinhLuan").click(function () {
                $.ajax({
                    method: "GET",
                    url: "ProcessDeleteComment",
                    data: {
                        IDBinhLuan: IDBinhLuan,
                        IDBinhLuanRep: IDBinhLuanRep,
                    },
                    success: function (response) {
                        $("#" + IDBaiDang + IDBinhLuan).remove();
                        document
                            .getElementsByTagName("body")[0]
                            .classList.remove("overflow-hidden");
                        second.innerHTML = "";
                        second.classList.remove("fixed");
                        second.classList.remove("h-screen");
                    },
                });
            });
        },
    });
}
