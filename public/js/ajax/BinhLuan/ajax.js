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
                $('#' + IDTaiKhoan + IDBaiDang + "CommentLv1").append(response);
                $('#' + IDTaiKhoan + IDBaiDang + "Write").html('');
            }
        });
    }
}
function SharePost() {

}
function RepCommentPost() {

}