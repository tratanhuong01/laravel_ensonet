function onChangeFileSticker(event) {
    var file = event.target.files[0];
    $.ajax({
        method: "GET",
        url: "ProcessOnChangeSticker",
        data: {
            Hang: $("#Hang").val(),
            Cot: $("#Cot").val(),
            DuongDanNhanDan: URL.createObjectURL(file),
        },
        success: function (response) {
            $("#show").html(response.view);
        },
    });
}
