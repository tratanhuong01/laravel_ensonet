function CommentPost(IDTaiKhoan, IDBaiDang, event) {
    if (event.keyCode === 13) {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        var formData = new FormData($("#" + IDBaiDang + "FormComment")[0]);
        formData.append("IDBaiDang", IDBaiDang);
        formData.append(
            "NoiDungBinhLuan",
            $("#" + IDTaiKhoan + IDBaiDang + "Write").html()
        );
        $.ajax({
            method: "POST",
            url: "/ProcessCommentPost",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                $("#" + IDTaiKhoan + IDBaiDang + "CommentLv1").prepend(
                    response
                );
                $("#" + IDTaiKhoan + IDBaiDang + "Write").html("");
                $("#" + IDBaiDang + "FormComment").html("");
                $("#" + IDBaiDang + "modalComment").html("");
                $("#" + IDBaiDang + "modalComment").addClass("hidden");
                $("#" + IDBaiDang + "CommentImage").html("");
            },
        });
    }
}
function ViewMoreCommentPost(IDTaiKhoan, IDBaiDang, Index, Num, Count) {
    $.ajax({
        method: "GET",
        url: "/ProcessViewMoreCommentPost",
        data: {
            IDBaiDang: IDBaiDang,
            Index: Index,
        },
        success: function (response) {
            console.log(response);
            $("#" + IDTaiKhoan + IDBaiDang + "CommentLv1").append(response);
        },
    });
    $.ajax({
        method: "GET",
        url: "/ProcessLoadViewMoreComment",
        data: {
            Index: Index,
            IDTaiKhoan: IDTaiKhoan,
            IDBaiDang: IDBaiDang,
            Num: Num,
            Count: Count,
        },
        success: function (response) {
            $("#" + IDTaiKhoan + IDBaiDang + "NumComment").html(response);
        },
    });
}
function RepViewCommentPost(IDTaiKhoan, IDBaiDang, IDBinhLuan) {
    $.ajax({
        method: "GET",
        url: "/ProcessRepViewCommentPost",
        data: {
            IDTaiKhoan: IDTaiKhoan,
            IDBaiDang: IDBaiDang,
            IDBinhLuan: IDBinhLuan,
        },
        success: function (response) {
            $("#" + IDTaiKhoan + IDBaiDang + IDBinhLuan + "ACommentLv2").append(
                response
            );
        },
    });
}
function RepViewCommentPost2(IDTaiKhoan, IDBaiDang, IDBinhLuan, IDBinhLuanRep) {
    $.ajax({
        method: "GET",
        url: "/ProcessRepViewCommentPost2",
        data: {
            IDTaiKhoan: IDTaiKhoan,
            IDBaiDang: IDBaiDang,
            IDBinhLuan: IDBinhLuan,
            IDBinhLuanRep: IDBinhLuanRep,
        },
        success: function (response) {
            $(
                "#" + IDTaiKhoan + IDBaiDang + IDBinhLuanRep + "ACommentLv2"
            ).append(response);
        },
    });
}
function RepCommentPost(
    IDTaiKhoan,
    IDBaiDang,
    IDBinhLuan,
    IDBinhLuanRep,
    event
) {
    if (event.keyCode === 13) {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        var formData = new FormData(
            $("#" + IDBaiDang + IDBinhLuan + "FormComment")[0]
        );
        formData.append("IDBaiDang", IDBaiDang);
        formData.append("IDBinhLuan", IDBinhLuan);
        formData.append("IDBinhLuanRep", IDBinhLuanRep);
        formData.append("IDTaiKhoan", IDTaiKhoan);
        formData.append(
            "NoiDungBinhLuan",
            $("#" + IDTaiKhoan + IDBaiDang + IDBinhLuan + "Write").html()
        );
        if ($("#" + IDBaiDang + IDBinhLuan + "IDNhanDan").length > 0) {
            postStickerRep(
                IDTaiKhoan,
                IDBaiDang,
                IDBinhLuan,
                IDBinhLuanRep,
                $("#" + IDBaiDang + IDBinhLuan + "IDNhanDan").val()
            );
        } else {
            $.ajax({
                method: "POST",
                url: "/ProcessRepCommentPost",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    $(
                        "#" +
                            IDTaiKhoan +
                            IDBaiDang +
                            IDBinhLuanRep +
                            "CommentLv2"
                    ).prepend(response);
                    $("#" + IDTaiKhoan + IDBaiDang + IDBinhLuan + "Write").html(
                        ""
                    );
                    $("#" + IDBaiDang + IDBinhLuan + "FormComment").html("");
                    $("#" + IDBaiDang + IDBinhLuan + "CommentImage").html("");
                },
            });
        }
    }
}
function FeelCommentPost(IDBinhLuan, LoaiCamXuc) {
    $.ajax({
        method: "GET",
        url: "/ProcessFeelCommentPost",
        data: {
            IDBinhLuan: IDBinhLuan,
            LoaiCamXuc: LoaiCamXuc,
        },
        success: function (response) {
            $("#" + IDBinhLuan).html(response);
        },
    });
    $.ajax({
        method: "GET",
        url: "/ProcessLoadNumFeelCommentPost",
        data: {
            IDBinhLuan: IDBinhLuan,
        },
        success: function (response) {
            $("#" + IDBinhLuan + "NumFeelCmt").html(response);
        },
    });
}
function ViewMoreCommentPostCmt(
    IDTaiKhoan,
    IDBinhLuan,
    IDBaiDang,
    Index,
    Num,
    Count
) {
    $.ajax({
        method: "GET",
        url: "/ProcessViewRepComment",
        data: {
            IDBinhLuan: IDBinhLuan,
            Index: Index,
        },
        success: function (response) {
            $("#" + IDTaiKhoan + IDBaiDang + IDBinhLuan + "CommentLv2").append(
                response
            );
        },
    });
    $.ajax({
        method: "GET",
        url: "/ProcessLoadNumRepComment",
        data: {
            Index: Index,
            IDTaiKhoan: IDTaiKhoan,
            IDBaiDang: IDBaiDang,
            IDBinhLuan: IDBinhLuan,
            Num: Num,
            Count: Count,
        },
        success: function (response) {
            $("#" + IDTaiKhoan + IDBaiDang + IDBinhLuan + "NumComment").html(
                response
            );
        },
    });
}
//xem tất cả số lượng cảm xúc của bài đăng
function viewDetailFeelCmt(IDBinhLuan, Path) {
    document.getElementsByTagName("body")[0].classList.add("overflow-hidden");
    second.className += " fixed h-screen";
    $("#second").append(createElementFromHTML($("#myLoading").html()));
    $.ajax({
        method: "GET",
        url: Path + "/" + "ProcessViewDetailFeelCmt",
        data: {
            IDBinhLuan: IDBinhLuan,
        },
        success: function (response) {
            $("#second").html(response);
        },
    });
}
//xem số lượng mỗi cảm xúc của bài đăng
function viewOnlyDetailFeelCmt(IDBinhLuan, LoaiCamXuc, Path) {
    $.ajax({
        method: "GET",
        url: Path + "/" + "ProcessViewOnlyDetailFeelCmt",
        data: {
            IDBinhLuan: IDBinhLuan,
            LoaiCamXuc: LoaiCamXuc,
        },
        success: function (response) {
            $("#all").html(response);
        },
    });
}

function editCommentView(IDBaiDang, IDBinhLuan, LoaiBinhLuan) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    let formData = new FormData();
    formData.append("IDBinhLuan", IDBinhLuan);
    formData.append("IDBaiDang", IDBaiDang);
    formData.append("type", 0);
    formData.append("LoaiBinhLuan", LoaiBinhLuan);
    $.ajax({
        method: "POST",
        url: "/ProcessEditViewComment",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            $("#" + IDBaiDang + IDBinhLuan).html(response.view);
        },
    });
}
function escapeEditComment(event, IDBaiDang, IDBinhLuan, LoaiBinhLuan) {
    if (event.key === "Escape") {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        let formData = new FormData();
        formData.append("IDBinhLuan", IDBinhLuan);
        formData.append("type", 1);
        formData.append("LoaiBinhLuan", LoaiBinhLuan);
        $.ajax({
            method: "POST",
            url: "/ProcessEditViewComment",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                $("#" + IDBaiDang + IDBinhLuan).html(response.view);
            },
        });
    }
}

function editComments(event, IDBaiDang, IDBinhLuan, Level) {
    if (event.keyCode === 13) {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        let formData = new FormData($("#" + IDBinhLuan + "FormComment")[0]);
        formData.append("IDBinhLuan", IDBinhLuan);
        var LoaiBinhLuan = 0;
        if (
            $("#" + IDBaiDang + IDBinhLuan + "DuongDanHinhAnh").length > 0 ||
            checkIDForm(IDBinhLuan) == true
        )
            LoaiBinhLuan = 1;
        else if ($("#" + IDBinhLuan + "IDNhanDan").length > 0) LoaiBinhLuan = 2;
        else LoaiBinhLuan = 0;
        formData.append(
            "NoiDungBinhLuan",
            $("#" + IDBinhLuan + "Write").html()
        );
        formData.append("LoaiBinhLuan", LoaiBinhLuan);
        formData.append("Level", Level);
        $.ajax({
            method: "POST",
            url: "/ProcessEditComment",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                $("#" + IDBaiDang + IDBinhLuan).html(response.view);
            },
        });
    }
}
function checkIDForm(IDBinhLuan) {
    for (
        let index = 0;
        index <
        document.getElementById(IDBinhLuan + "FormComment").children.length;
        index++
    ) {
        if (
            document.getElementById(IDBinhLuan + "FormComment").children[index]
                .id ==
            IDBinhLuan + "fileImagess"
        ) {
            return true;
            break;
        }
    }
}
