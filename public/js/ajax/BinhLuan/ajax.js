function CommentPost(IDTaiKhoan, IDBaiDang, event) {
    if (event.keyCode === 13) {
        console.log($('#' + IDTaiKhoan + IDBaiDang + "Write").html());
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
function ViewMoreCommentPost(IDTaiKhoan, IDBaiDang, Index) {
    $.ajax({
        method: "GET",
        url: 'ProcessViewMoreCommentPost',
        data: {
            IDBaiDang: IDBaiDang,
            Index: Index
        },
        success: function (response) {
            console.log(response)
            $('#' + IDTaiKhoan + IDBaiDang + "CommentLv1").append(response);
        }
    });
}
function RepCommentPost() {

}