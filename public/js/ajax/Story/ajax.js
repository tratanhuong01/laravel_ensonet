function wraptext(text) {
    var data = "";
    var num = Math.round(text.length / 25 + 1);
    for (var j = 0; j <= num; j++) {
        data +=
            text.substring(
                (j == 0 || j == 1 ? 1 : j) * 25,
                (j == 0 ? 0 : j + 1) * 25
            ) + "@";
    }
    return data;
}
function createStory(text, color) {
    var canvas = document.getElementById("myCanvas");
    var context = canvas.getContext("2d");
    context.drawImage(document.getElementById("myImage"), 0, 0, 345, 612);
    context.font = "20pt Tahoma";
    context.fillStyle = color;
    context.textAlign = "center";
    var arr = wraptext(text).split("@");
    for (var index = 0; index < arr.length; index++) {
        context.fillText(
            arr[index],
            172,
            canvas.height / 2 - (arr.length * 28) / 2 + (index + 1) * 28
        );
        context.fillStyle = color;
    }
}
function changeColorContent(color) {
    console.log(color);
    changeTexts(color);
    document.getElementsByClassName(
        "content-story-text"
    )[0].style.color = color;
    createStory(document.getElementsByClassName("place-type")[0].value, color);
}
function changeTexts(color) {
    color = color == "" ? "white" : color;
    createStory(document.getElementsByClassName("place-type")[0].value, color);
    document.getElementsByClassName(
        "content-story-text"
    )[0].innerText = document.getElementsByClassName("place-type")[0].value;
}
function clickChangeBackground(IDPhongNen, DuongDanPN) {
    $("#myImage").attr("src", DuongDanPN);
    $("#IDPhongNen").val(IDPhongNen);
}
function getLiHaveShowLi() {
    var parent = $("#storyView").children();
    for (var i = 0; i < parent.length; i++) {
        if (parent[i].classList.contains("showLi")) return parent[i];
    }
}
function changeStoryImage(element, index) {
    var el = getLiHaveShowLi();
    document.getElementById("storyView").scrollLeft =
        document.getElementById("storyView").scrollLeft + 128;
    if (el == element) {
    } else {
        el.classList.remove("showLi");
        el.classList.remove("mr-2");
        el.childNodes[1].classList.add("p-2");
        el.childNodes[1].classList.add("opacity-40");
        element.classList.add("showLi");
        element.childNodes[1].classList.remove("p-2");
        element.childNodes[1].classList.remove("opacity-40");
    }
}
function playMusicDemoStory(url) {
    $("#myAudio").attr("src", "/" + url);
    document.getElementById("myAudio").play();
}
function chooseMusic(ID) {
    $("#IDAmThanh").attr("value", ID);
}
function openPictureStory(event, IDTaiKhoan) {
    event.preventDefault();
    var path = URL.createObjectURL(event.target.files[0]);
    let formData = new FormData($("#formPictureStory")[0]);
    formData.append("IDTaiKhoan", IDTaiKhoan);
    $.ajax({
        method: "POST",
        url: config.routes.ProcessViewPictureStory,
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            var child = $("#createStoryImage").clone();
            $("#content").html(response);
            $("#myImage").attr("src", path);
            $("#formCreatePicture").append(child);
        },
        error: function (response) {
            console.log(response);
        },
    });
}
function postStoryPicture(event) {
    window.onbeforeunload = function () {};
    event.preventDefault();
    $("#dataURI").val(
        document.getElementById("myCanvas").toDataURL("image/png")
    );
    $("#formCreatePicture").submit();
    // $.ajax({
    //     method: "POST",
    //     url: config.routes.ProcessSavePictureStory,
    //     data: {
    //         dataURI: document.getElementById("myCanvas").toDataURL("image/png"),
    //         IDTaiKhoan: IDTaiKhoan,
    //         IDAmThanh: $("#IDAmThanh").val(),
    //     },
    //     success: function (response) {
    //         console.log("");
    //     },
    //     error: function (xhr) {
    //         console.log(xhr);
    //     },
    // });
}
function createStoryPictureMain(text, color, x, y, w, h) {
    var canvas = document.getElementById("myCanvas");
    var context = canvas.getContext("2d");
    context.drawImage(document.getElementById("myImage"), x, y, w, h);
    context.font = "20pt Tahoma";
    context.fillStyle = color;
    context.textAlign = "center";
    var arr = wraptext(text).split("@");
    for (var index = 0; index < arr.length; index++) {
        context.fillText(
            arr[index],
            172,
            canvas.height / 2 - (arr.length * 28) / 2 + (index + 1) * 28
        );
        context.fillStyle = color;
    }
}
function changeTextsPictureMain(color) {
    var x = 0;
    var y =
        document.getElementById("outer").offsetHeight -
        document.getElementById("myImage").offsetHeight;
    var w = document.getElementById("myImage").offsetWidth;
    var h = document.getElementById("myImage").offsetHeight;
    color = color == "" ? "white" : color;
    createStoryPictureMain(
        document.getElementsByClassName("place-type")[0].value,
        color,
        x,
        y / 2,
        w,
        h
    );
    document.getElementsByClassName(
        "content-story-text"
    )[0].innerText = document.getElementsByClassName("place-type")[0].value;
}
function changeColorContentPictureMain(color) {
    var x = 0;
    var y =
        document.getElementById("outer").offsetHeight -
        document.getElementById("myImage").offsetHeight;
    var w = document.getElementById("myImage").offsetWidth;
    var h = document.getElementById("myImage").offsetHeight;
    changeTextsPictureMain(color);
    document.getElementsByClassName(
        "content-story-text"
    )[0].style.color = color;
    createStoryPictureMain(
        document.getElementsByClassName("place-type")[0].value,
        color,
        x,
        y / 2,
        w,
        h
    );
}
