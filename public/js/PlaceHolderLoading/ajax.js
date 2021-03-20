function loadingPost(indexPost) {
    $.ajax({
        method: "GET",
        url: "ProcessLoadingPost",
        data: {
            indexPost: $('#indexPost').val()
        },
        success: function (response) {
            setTimeout(function () {
                $('#indexPost').remove();
                $('.removeTimeline').remove();
                if (response == '') {

                }
                else {
                    $('.timeline').append(response);
                    action = 'inactive';
                }
            }, 1000);
        }
    });
}
function loadingPostProfile(indexPost, IDTaiKhoan) {
    $.ajax({
        method: "GET",
        url: "ProcessLoadingPostProfile",
        data: {
            indexPost: $('#indexPost').val(),
            IDTaiKhoan: IDTaiKhoan
        },
        success: function (response) {
            setTimeout(function () {
                $('#indexPost').remove();
                $('.removeTimeline').remove();
                if (response == '') {

                }
                else {
                    $('.timeline').append(response);
                    action = 'inactive';
                }
            }, 1000);
        }
    });
}
function loading() {
    $.ajax({
        method: "GET",
        url: "ProcessLoading",
        success: function (response) {
            $('.timeline').append(response);
        }
    });
}