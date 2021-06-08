function loadPicture(type, IDTaiKhoan, ele) {
    $.ajax({
        method: "GET",
        url: "/ProcessLoadPictures",
        data: {
            Type: type,
            IDTaiKhoan: IDTaiKhoan,
        },
        success: function (response) {
            var array = document.getElementsByClassName("activePictureText");
            for (let index = 0; index < array.length; index++) {
                document.getElementsByClassName("activePictureText")[
                    index
                ].classList =
                    "activePictureText cursor-pointer py-2 px-4 text-center text-gray-600 dark:text-white";
            }
            ele.classList =
                "activePictureText cursor-pointer py-2 px-4 text-center border-blue-500 border-solid border-b-4 text-blue-500";
            $("#main-friends").html(response.view);
            $("#main-friends").append(response.viewMore);
            $("#indexOfPicture").val(1);
            $("#typeViewOfPicture").val(type);
        },
    });
}
function loadTimeLinePicture(IDTaiKhoan) {
    $.ajax({
        method: "GET",
        url: "/ProcessLoadTimeLineAndViewPictures",
        data: {
            Index: $("#indexOfPicture").val(),
            Type: $("#typeViewOfPicture").val(),
            IDTaiKhoan: IDTaiKhoan,
        },
        success: function (response) {
            if (response.view == "") {
            } else {
                $("#loadingViewPictureMore").remove();
                $("#indexOfPicture").val(response.index);
                $(".mainChild").append(response.view);
                $("#main-friends").append(response.viewMore);
            }
        },
    });
}
