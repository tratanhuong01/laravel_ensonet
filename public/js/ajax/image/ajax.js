function loadPicture(type, IDTaiKhoan) {
    $.ajax({
        method: "GET",
        url: "/ProcessLoadPictures",
        data: {
            Type: type,
            IDTaiKhoan: IDTaiKhoan,
        },
        success: function (response) {
            $("#main-friends").html(response);
            $("#indexOfPicture").val(0);
            $("#typeViewOfPicture").val(type);
        },
    });
}
function loadTimeLinePicture(index, type, IDTaiKhoan) {
    $.ajax({
        method: "GET",
        url: "/ProcessLoadTimeLineAndViewPictures",
        data: {
            Index: $("#indexOfPicture").val(),
            Type: $("#typeViewOfPicture").val(),
            IDTaiKhoan: IDTaiKhoan,
        },
        success: function (response) {
            if (response == "") {
            } else {
                $("#indexOfPicture").val(response.index);
                $("#mainPic").append(response.view);
                action = "inactive";
            }
        },
    });
}
