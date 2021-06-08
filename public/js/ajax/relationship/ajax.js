// chấp nhận kết bạn
function AcceptFriendIndex(UserMain, UserOther) {
    var nhanYeuCau = document.getElementsByClassName(UserMain + UserOther);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var i = document.createElement("i");
            i.className = "fas fa-circle-notch fa-spin text-gray-300 text-xl";
            nhanYeuCau[0].innerHTML = "";
            nhanYeuCau[0].appendChild(i);
            var documents = this.responseText;
            setTimeout(function () {
                loiMoi.innerHTML = documents;
            }, 1500);
        }
    };
    xmlhttp.open(
        "GET",
        "/ProcessAcceptFriendIndex?UserMain=" +
            UserMain +
            "&UserOther=" +
            UserOther,
        true
    );
    xmlhttp.send();
}
function AcceptFriendThis(UserMain, UserOther, Element) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var i = document.createElement("i");
            i.className = "fas fa-circle-notch fa-spin text-gray-500 text-xm";
            Element.innerHTML = "";
            Element.appendChild(i);
            setTimeout(function () {
                $("#" + UserOther + "profile").remove();
                if ($("#numberRequestwww").length > 0) {
                    var number = new Number($("#numberRequestwww").html());
                    number--;
                    $("#numberRequestwww").html(number);
                }
            }, 1500);
        }
    };
    xmlhttp.open(
        "GET",
        "/ProcessAcceptFriendIndex?UserMain=" +
            UserMain +
            "&UserOther=" +
            UserOther,
        true
    );
    xmlhttp.send();
}
function CancelRequestFriendThis(UserMain, UserOther, Element) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var i = document.createElement("i");
            i.className = "fas fa-circle-notch fa-spin text-gray-500 text-xm";
            Element.innerHTML = "";
            Element.appendChild(i);
            setTimeout(function () {
                $("#" + UserOther + "profile").remove();
                if ($("#numberRequestwww").length > 0) {
                    var number = new Number($("#numberRequestwww").html());
                    number--;
                    $("#numberRequestwww").html(number);
                }
            }, 1500);
        }
    };
    xmlhttp.open(
        "GET",
        "/ProcessCancelRequestFriendIndex?UserMain=" +
            UserMain +
            "&UserOther=" +
            UserOther,
        true
    );
    xmlhttp.send();
}
function CancelRequestFriendIndex(UserMain, UserOther) {
    var nhanYeuCau = document.getElementsByClassName(
        UserMain + UserOther + "delete"
    );
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var i = document.createElement("i");
            i.className = "fas fa-circle-notch fa-spin text-gray-900 text-xl";
            nhanYeuCau[0].innerHTML = "";
            nhanYeuCau[0].appendChild(i);
            var documents = this.responseText;
            setTimeout(function () {
                loiMoi.innerHTML = documents;
            }, 1500);
        }
    };
    xmlhttp.open(
        "GET",
        "/ProcessCancelRequestFriendIndex?UserMain=" +
            UserMain +
            "&UserOther=" +
            UserOther,
        true
    );
    xmlhttp.send();
}
function CancelRequestFriendF(UserOther, UserMain, el) {
    $.ajax({
        method: "GET",
        url: "/ProcessCancelRequestRFriend",
        data: {
            UserMain: UserMain,
            UserOther: UserOther,
        },
        success: function (response) {
            el.remove();
            $("#" + UserOther + "relationship").html(response);
        },
    });
}
function RequestFriend(UserMain, UserOther) {
    var themBanBe = document.getElementsByClassName("themBanBe");
    var main_themBanBe = document.getElementsByClassName("main_themBanBe");
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            themBanBe[0].className = "fas fa-circle-notch fa-spin themBanBe";
            themBanBe[1].className = "fas fa-circle-notch fa-spin themBanBe";
            var documents = this.responseText;
            setTimeout(function () {
                document.getElementById("moiQuanHe").innerHTML = documents;
            }, 1500);
        }
    };
    xmlhttp.open(
        "GET",
        "/ProcessRequestFriend?UserMain=" +
            UserMain +
            "&UserOther=" +
            UserOther,
        true
    );
    xmlhttp.send();
}
function AcceptFriend(UserMain, UserOther) {
    var nhanYeuCau = document.getElementsByClassName("nhanYeuCau");
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            nhanYeuCau[0].className =
                "fas fa-circle-notch fa-spin text-blue-600 nhanYeuCau";
            var documents = this.responseText;
            setTimeout(function () {
                document.getElementById("moiQuanHe").innerHTML = documents;
                nhanYeuCau[1].innerText = "";
            }, 1500);
        }
    };
    xmlhttp.open(
        "GET",
        "/ProcessAcceptFriend?UserMain=" + UserMain + "&UserOther=" + UserOther,
        true
    );
    xmlhttp.send();
}
function CancelRequestFriend(UserMain, UserOther) {
    var guiYeuCau = document.getElementsByClassName("guiYeuCau");
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            guiYeuCau[0].className = "fas fa-circle-notch fa-spin guiYeuCau";
            guiYeuCau[1].className = "fas fa-circle-notch fa-spin guiYeuCau";
            var documents = this.responseText;
            setTimeout(function () {
                document.getElementById("moiQuanHe").innerHTML = documents;
            }, 1500);
        }
    };
    xmlhttp.open(
        "GET",
        "/ProcessCancelRequestFriend?UserMain=" +
            UserMain +
            "&UserOther=" +
            UserOther,
        true
    );
    xmlhttp.send();
}
function DeleleRequestFriend(UserMain, UserOther) {
    var nhanYeuCau = document.getElementsByClassName("nhanYeuCau");
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            nhanYeuCau[0].className =
                "fas fa-circle-notch fa-spin text-blue-600 nhanYeuCau";
            var documents = this.responseText;
            setTimeout(function () {
                document.getElementById("moiQuanHe").innerHTML = documents;
            }, 1500);
        }
    };
    xmlhttp.open(
        "GET",
        "/ProcessCancelRequestFriend?UserMain=" +
            UserMain +
            "&UserOther=" +
            UserOther,
        true
    );
    xmlhttp.send();
}
function DeleteFriend(UserMain, UserOther) {
    var huyBanBe = document.getElementsByClassName("huyBanBe");
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            huyBanBe[0].className = "fas fa-circle-notch fa-spin huyBanBe";
            var documents = this.responseText;
            setTimeout(function () {
                document.getElementById("moiQuanHe").innerHTML = documents;
            }, 1500);
        }
    };
    xmlhttp.open(
        "GET",
        "/ProcessDeleteFriend?UserMain=" + UserMain + "&UserOther=" + UserOther,
        true
    );
    xmlhttp.send();
}
