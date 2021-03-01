function CommentPost(IDTaiKhoan, IDBaiDang, event) {
    if (event.keyCode === 13) {
        $.ajax({
            method: "GET",
            url: 'ProcessCommentPost',
            data: {
                IDBaiDang: IDBaiDang,
                NoiDungBinhLuan: $('#' + IDTaiKhoan + IDBaiDang + "Write").html()
            },
            success: function (response) {
                $('#' + IDTaiKhoan + IDBaiDang + "CommentLv1").prepend(response);
                $('#' + IDTaiKhoan + IDBaiDang + "Write").html('');
            }
        });
    }
}
function ViewMoreCommentPost(IDTaiKhoan, IDBaiDang, Index, Num, Count) {
    $.ajax({
        method: "GET",
        url: 'ProcessViewMoreCommentPost',
        data: {
            IDBaiDang: IDBaiDang,
            Index: Index,
        },
        success: function (response) {
            console.log(response)
            $('#' + IDTaiKhoan + IDBaiDang + "CommentLv1").append(response);
        }
    });
    $.ajax({
        method: "GET",
        url: 'ProcessLoadViewMoreComment',
        data: {
            Index: Index,
            IDTaiKhoan: IDTaiKhoan,
            IDBaiDang: IDBaiDang,
            Num: Num,
            Count: Count
        },
        success: function (response) {
            $('#loadNumComment').html(response);
        }
    });
}
function RepViewCommentPost(IDTaiKhoan, IDBaiDang, IDBinhLuan) {
    $.ajax({
        method: "GET",
        url: 'ProcessRepViewCommentPost',
        data: {
            IDTaiKhoan: IDTaiKhoan,
            IDBaiDang: IDBaiDang,
            IDBinhLuan: IDBinhLuan
        },
        success: function (response) {
            $('#' + IDTaiKhoan + IDBaiDang + IDBinhLuan + "CommentLv2").append(response);
        }
    });
}
function RepCommentPost(IDTaiKhoan, IDBaiDang, IDBinhLuan, event) {
    if (event.keyCode === 13) {
        $.ajax({
            method: "GET",
            url: 'ProcessRepCommentPost',
            data: {
                IDTaiKhoan: IDTaiKhoan,
                IDBaiDang: IDBaiDang,
                IDBinhLuan: IDBinhLuan,
                NoiDungBinhLuan: $('#' + IDTaiKhoan + IDBaiDang + IDBinhLuan + "Write").html()
            },
            success: function (response) {
                $('#' + IDTaiKhoan + IDBaiDang + IDBinhLuan + "CommentLv2").prepend(response);
                $('#' + IDTaiKhoan + IDBaiDang + IDBinhLuan + "Write").html('');
            }
        });
    }
}