var audio = document.createElement("audio");
var music = true;
var state = true;
function loadCategoryAd(name, element) {
    $.ajax({
        method: "GET",
        url: "/admin/ProcessLoadCategoryAd",
        data: {
            name: name,
        },
        success: function (response) {
            $(".activeBorder").addClass("border-white");
            $(".activeBorder").removeClass(
                "activeBorder border-blue-500 bg-gray-300"
            );
            element.classList += " activeBorder border-blue-500 bg-gray-300";
            element.classList.remove("border-white");
            $("#content").html(response.view);
            window.history.pushState("", "", "/admin/" + name);
        },
    });
}
function openModalAd(name) {
    if ($("#" + name).length > 0) {
        if ($("#" + name).hasClass("hidden"))
            $("#" + name).removeClass("hidden");
        else $("#" + name).addClass("hidden");
    }
}
function closeModalAd() {
    second.innerHTML = "";
    second.classList.remove("fixed");
    second.classList.remove("h-screen");
}
function openModalViewDetailAd(name, IDTaiKhoan) {
    $.ajax({
        method: "GET",
        url: "/admin/ProcessLoadViewDetailAd",
        data: {
            name: name,
            IDTaiKhoan: IDTaiKhoan,
        },
        success: function (response) {
            second.innerHTML = response.view;
            second.className += " fixed h-screen";
        },
    });
}
function paginationAdmin(name, index) {
    $.ajax({
        method: "GET",
        url: "/admin/ProcessPaginationAdmin",
        data: {
            index: index,
            name: name,
        },
        success: function (response) {
            $("#tableMain").html(response.viewTable);
            $("#pageMain").html(response.viewPage);
        },
    });
}
function paginationAdminCategory(name, index) {
    $.ajax({
        method: "GET",
        url: "/admin/ProcessPaginationAdmin",
        data: {
            index: index,
            name: name,
        },
        success: function (response) {
            $("#categoryLoad").html(response.viewCategory);
            $("#pageMain").html(response.viewPagination);
        },
    });
}
function openPost(type) {
    document.getElementsByTagName("body")[0].classList.add("overflow-hidden");
    second.className += " fixed h-screen";
    $("#second").append(createElementFromHTML($("#myLoading").html()));
    $.ajax({
        method: "GET",
        url: "ProcessOpenPostDialog",
        data: {
            type: type,
        },
        success: function (response) {
            second.innerHTML = response;
            new MeteorEmoji(
                document.getElementById("textarea-post"),
                document.getElementById("myTriggers"),
                document.getElementById("myEmojis")
            );
        },
    });
}
function closePost() {
    document
        .getElementsByTagName("body")[0]
        .classList.remove("overflow-hidden");
    second.innerHTML = "";
    second.classList.remove("fixed");
    second.classList.remove("h-screen");
}
function onChangePreviewImageDemo(event) {
    var path = URL.createObjectURL(event.target.files[0]);
    $("#imageDemo").attr("src", path);
}
function onChangePreviewSoundDemo(event) {
    var { name } = event.target.files[0];
    $("#nameSound").html(name);
    audio.pause();
    audio.currentTime = 0;
    state = true;
    music = true;
    $("#btnPlay").html("Phát");
    $("#btnPlay").addClass("bg-gray-500");
    $("#btnPlay").removeClass("bg-red-500");
}
function playMusic(element) {
    var path = URL.createObjectURL(document.getElementById("File").files[0]);
    if (music === true) {
        if (state == true) {
            audio.src = path;
            audio.play();
        } else {
            audio.play();
        }
        element.innerHTML = "Dừng";
        element.classList.remove("bg-gray-500");
        element.classList.add("bg-red-500");
        music = false;
    } else {
        state = false;
        music = true;
        audio.pause();
        element.innerHTML = "Phát";
        element.classList.add("bg-gray-500");
        element.classList.remove("bg-red-500");
    }
}

function playMusics(element, ID, URL) {
    if (element.classList.contains("activeMusic")) {
        $("#soundShow").val(ID);
        if (element.classList.contains("music" + ID)) {
            if (element.classList.contains("state" + ID)) {
                audio.src = URL;
                audio.play();
            } else {
                audio.play();
            }
            element.innerHTML = "Dừng";
            element.classList.remove("bg-gray-500");
            element.classList.add("bg-red-500");
            !element.classList.remove("music" + ID);
        } else {
            element.classList.add("music" + ID);
            element.classList.remove("state" + ID);
            audio.pause();
            element.innerHTML = "Phát";
            element.classList.add("bg-gray-500");
            element.classList.remove("bg-red-500");
        }
    } else {
        let soundBtn = document.getElementsByClassName("sound");
        for (let index = 0; index < soundBtn.length; index++) {
            const elements = soundBtn[index];
            elements.innerHTML = "Phát";
            elements.classList.add("bg-gray-500");
            elements.classList.remove("bg-red-500");
            elements.classList.remove("activeMusic");
        }
        element.classList.add("activeMusic");
        audio.src = URL;
        audio.play();
        if (
            $("#play" + $("#soundShow").val()).hasClass(
                "music" + $("#soundShow").val()
            )
        ) {
        } else {
            $("#play" + $("#soundShow").val()).addClass(
                "music" + $("#soundShow").val()
            );
        }
        if (
            $("#play" + $("#soundShow").val()).hasClass(
                "state" + $("#soundShow").val()
            )
        ) {
        } else {
            $("#play" + $("#soundShow").val()).addClass(
                "state" + $("#soundShow").val()
            );
        }
        $("#soundShow").val(ID);
        element.innerHTML = "Dừng";
        element.classList.remove("bg-gray-500");
        element.classList.add("bg-red-500");
        element.classList.remove("music" + ID);
    }
}

function playMusicss(element, path) {
    if (document.getElementById("File").files.length > 0) {
        path = URL.createObjectURL(document.getElementById("File").files[0]);
    } else {
    }
    if (music === true) {
        if (state == true) {
            audio.src = path;
            audio.play();
        } else {
            audio.play();
        }
        element.innerHTML = "Dừng";
        element.classList.remove("bg-gray-500");
        element.classList.add("bg-red-500");
        music = false;
    } else {
        state = false;
        music = true;
        audio.pause();
        element.innerHTML = "Phát";
        element.classList.add("bg-gray-500");
        element.classList.remove("bg-red-500");
    }
}
