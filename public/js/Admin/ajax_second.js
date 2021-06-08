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
function onChangeFileImage(event) {
    var file = event.target.files[0];
    $("#imageDemo").attr("src", URL.createObjectURL(file));
}
function onChangeColorMessage() {
    document.getElementById("colorMessageChange").style.backgroundColor =
        document.getElementById("TenMau").value;
}
function deleteWarnPost(IDBaiDang) {
    document.getElementsByTagName("body")[0].classList.add("overflow-hidden");
    second.className += " fixed h-screen";
    $("#second").append(createElementFromHTML($("#myLoading").html()));
    $.ajax({
        method: "GET",
        url: "/ProcessWarnDeletePost",
        data: {
            IDBaiDang: IDBaiDang,
        },
        success: function (response) {
            second.innerHTML = response;
            $("#huyXoaBaiDang").click(function () {
                document
                    .getElementsByTagName("body")[0]
                    .classList.remove("overflow-hidden");
                second.innerHTML = "";
                second.classList.remove("fixed");
                second.classList.remove("h-screen");
            });
            $("#btnXoaBaiDang").click(function () {
                $("#cover").removeClass("hidden");
                $.ajax({
                    method: "GET",
                    url: "ProcessDeletePostAPIAmin",
                    data: {
                        IDBaiDang: IDBaiDang,
                    },
                    success: function (response) {
                        document
                            .getElementsByTagName("body")[0]
                            .classList.remove("overflow-hidden");
                        $("#" + IDBaiDang).remove();
                        second.innerHTML = "";
                        second.classList.remove("fixed");
                        second.classList.remove("h-screen");
                    },
                });
            });
        },
    });
}
function clickChangeImage(ele) {
    $("#imageMain").attr("src", ele.childNodes[1].src);
    var image__item = document.getElementsByClassName("image__item");
    for (let index = 0; index < image__item.length; index++) {
        const element = image__item[index];
        element.classList =
            "w-1/4 h-32 object-cover flex-shrink-0 mr-2 image__item border-4 border-solid border-gray-100 cursor-pointer hover:border-gray-300";
    }
    ele.classList =
        "w-1/4 h-32 object-cover flex-shrink-0 mr-2 image__item border-4 border-solid border-gray-300 cursor-pointer ";
}
function deleteStoryUser() {
    $.ajax({
        method: "GET",
        url: "/ProcessDeleteStory",
        data: {
            IDStory: $("#IDStoryCurrent").val(),
        },
        success: function (response) {},
    });
}
