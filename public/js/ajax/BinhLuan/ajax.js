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
            $('#' + IDTaiKhoan + IDBaiDang + 'NumComment').html(response);
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
            console.log('sussess');
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
function FeelCommentPost(IDBinhLuan, LoaiCamXuc) {
    $.ajax({
        method: "GET",
        url: "ProcessFeelCommentPost",
        data: {
            IDBinhLuan: IDBinhLuan,
            LoaiCamXuc: LoaiCamXuc
        },
        success: function (response) {
            $('#' + IDBinhLuan).html(response);
        }
    });
    $.ajax({
        method: "GET",
        url: "ProcessLoadNumFeelCommentPost",
        data: {
            IDBinhLuan: IDBinhLuan
        },
        success: function (response) {
            $('#' + IDBinhLuan + 'NumFeelCmt').html(response);
        }
    });
}
function ViewMoreCommentPostCmt(IDTaiKhoan, IDBinhLuan, IDBaiDang, Index, Num, Count) {
    $.ajax({
        method: "GET",
        url: 'ProcessViewRepComment',
        data: {
            IDBinhLuan: IDBinhLuan,
            Index: Index,
        },
        success: function (response) {
            $('#' + IDTaiKhoan + IDBaiDang + IDBinhLuan + "CommentLv2").append(response);
        }
    });
    $.ajax({
        method: "GET",
        url: 'ProcessLoadNumRepComment',
        data: {
            Index: Index,
            IDTaiKhoan: IDTaiKhoan,
            IDBaiDang: IDBaiDang,
            IDBinhLuan: IDBinhLuan,
            Num: Num,
            Count: Count
        },
        success: function (response) {
            $('#' + IDTaiKhoan + IDBaiDang + IDBinhLuan + 'NumComment').html(response);
        }
    });
}
//xem tất cả số lượng cảm xúc của bài đăng 
function viewDetailFeelCmt(IDBinhLuan, Path) {
    $.ajax({
        method: "GET",
        url: Path + '/' + 'ProcessViewDetailFeelCmt',
        data: {
            IDBinhLuan: IDBinhLuan,
        },
        success: function (response) {
            $('#second').html(response);
            $('#modal-one').show();
            second.className += ' fixed h-screen';
        }
    });
}

//xem số lượng mỗi cảm xúc của bài đăng 
function viewOnlyDetailFeelCmt(IDBinhLuan, LoaiCamXuc, Path) {
    $.ajax({
        method: "GET",
        url: Path + '/' + 'ProcessViewOnlyDetailFeelCmt',
        data: {
            IDBinhLuan: IDBinhLuan,
            LoaiCamXuc: LoaiCamXuc
        },
        success: function (response) {
            $('#all').html(response);
        }
    });
}