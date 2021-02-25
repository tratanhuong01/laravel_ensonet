function viewDetailFeel(IDBaiDang) {
    $.ajax({
        method: "GET",
        url: 'ProcessViewDetailFeel',
        data: {
            IDBaiDang: IDBaiDang,
        },
        success: function (response) {
            $('#second').html(response);
            $('#modal-one').show();
            second.className += ' fixed h-screen';
        }
    });
}
function viewOnlyDetailFeel(IDBaiDang, LoaiCamXuc) {
    $.ajax({
        method: "GET",
        url: 'ProcessViewOnlyDetailFeel',
        data: {
            IDBaiDang: IDBaiDang,
            LoaiCamXuc: LoaiCamXuc
        },
        success: function (response) {
            $('#all').html(response);
        }
    });
}