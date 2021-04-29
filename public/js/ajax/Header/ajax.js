function searchData() {
    $.ajax({
        method: "POST",
        url: config.routes.ProcessSearchData,
        data: {
            Value: $("#valueSearchData").val(),
            IDTaiKhoan: "1000000001",
        },
        success: function (response) {
            $("#loadDataSearch").html(response?.view);
        },
        error: function (response) {
            console.log(response);
        },
    });
}
