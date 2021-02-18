function loadajax(value, nameID) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            $("#web").css("opacity", "0.2");
            document.getElementById(nameID).innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", value, true);
    xmlhttp.send();
}
function value(names) {
    return document.getElementById(names).value;
}
function submitFormRegister() {
    $("#web").css("opacity", "0.2");
    var i = document.createElement('i');
    document.getElementById('btn-submit-form').innerHTML = '';
    document.getElementById('btn-submit-form').disabled = true;
    document.getElementById('btn-submit-form').style.cursor = 'not-allowed';
    i.className = 'fas fa-cog fa-spin text-xl';
    document.getElementById('btn-submit-form').appendChild(i);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('register').innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", 'ProcessRegister?lastName=' + value('lastName') + '&firstName=' + value('firstName') +
        '&passWord=' + value('passWord') + '&emailOrPhone=' + value('emailOrPhone') +
        '&GioiTinh=' + document.querySelector('input[name="GioiTinh"]:checked').value +
        '&NgaySinh=' + value('NgaySinh') + '&emailAgain=' + value('emailAgain'), true);
    xmlhttp.send();
}
function submitFormVerify() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            $("#web").css("opacity", "0.1");
            document.getElementById('register').innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", 'ProcessVerify?emailOrPhone=' + value('emailOrPhone') + '&code_veri=' + value('code_veri'), true);
    xmlhttp.send();
}
function RequestFriend(UserMain, UserOther) {
    var themBanBe = document.getElementsByClassName('themBanBe');
    var main_themBanBe = document.getElementsByClassName('main_themBanBe');
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            themBanBe[0].className = 'fas fa-circle-notch fa-spin themBanBe';
            themBanBe[1].className = 'fas fa-circle-notch fa-spin themBanBe';
            var documents = this.responseText;
            setTimeout(function () {
                document.getElementById('moiQuanHe').innerHTML = documents;
            }, 1500);

        }
    };
    xmlhttp.open("GET", 'ProcessRequestFriend?UserMain=' + UserMain + '&UserOther=' + UserOther, true);
    xmlhttp.send();

}
function AcceptFriend(UserMain, UserOther) {
    var nhanYeuCau = document.getElementsByClassName('nhanYeuCau');
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            nhanYeuCau[0].className = 'fas fa-circle-notch fa-spin text-blue-600 nhanYeuCau';
            var documents = this.responseText;
            setTimeout(function () {
                document.getElementById('moiQuanHe').innerHTML = documents;
                nhanYeuCau[1].innerText = '';
            }, 1500);

        }
    };
    xmlhttp.open("GET", 'ProcessAcceptFriend?UserMain=' + UserMain + '&UserOther=' + UserOther, true);
    xmlhttp.send();

}
function CancelRequestFriend(UserMain, UserOther) {
    var guiYeuCau = document.getElementsByClassName('guiYeuCau');
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            guiYeuCau[0].className = 'fas fa-circle-notch fa-spin guiYeuCau';
            guiYeuCau[1].className = 'fas fa-circle-notch fa-spin guiYeuCau';
            var documents = this.responseText;
            setTimeout(function () {
                document.getElementById('moiQuanHe').innerHTML = documents;
            }, 1500);
        }
    };
    xmlhttp.open("GET", 'ProcessCancelRequestFriend?UserMain=' + UserMain + '&UserOther=' + UserOther, true);
    xmlhttp.send();

}
function DeleleRequestFriend(UserMain, UserOther) {
    var nhanYeuCau = document.getElementsByClassName('nhanYeuCau');
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            nhanYeuCau[0].className = 'fas fa-circle-notch fa-spin text-blue-600 nhanYeuCau';
            var documents = this.responseText;
            setTimeout(function () {
                document.getElementById('moiQuanHe').innerHTML = documents;
            }, 1500);
        }
    };
    xmlhttp.open("GET", 'ProcessCancelRequestFriend?UserMain=' + UserMain + '&UserOther=' + UserOther, true);
    xmlhttp.send();

}
function DeleteFriend(UserMain, UserOther) {
    var huyBanBe = document.getElementsByClassName('huyBanBe');
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            huyBanBe[0].className = 'fas fa-circle-notch fa-spin huyBanBe';
            var documents = this.responseText;
            setTimeout(function () {
                document.getElementById('moiQuanHe').innerHTML = documents;
            }, 1500);
        }
    };
    xmlhttp.open("GET", 'ProcessDeleteFriend?UserMain=' + UserMain + '&UserOther=' + UserOther, true);
    xmlhttp.send();
}
function darkMode() {
    if (document.getElementsByTagName("html")[0].classList == 'dark')
        document.getElementsByTagName("html")[0].classList = ''
    else
        document.getElementsByTagName("html")[0].classList = 'dark'
}
function CateGoryProfile(names) {
    var NamesCate = document.getElementsByClassName("NamesCate")[0];
    if (NamesCate.style.display == 'none')
        NamesCate.style.display = 'block';
    else
        NamesCate.style.display = 'none';
}
function sendCodeAgain() {
    $("#web").css("opacity", "0.2");
    var i = document.createElement('i');
    document.getElementById('btn-send-code').innerHTML = '';
    document.getElementById('btn-send-code').disabled = true;
    document.getElementById('btn-send-code').style.cursor = 'not-allowed';
    i.className = 'fas fa-cog fa-spin text-xl';
    document.getElementById('btn-send-code').appendChild(i);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('register').innerHTML = this.responseText;;
        }
    };
    xmlhttp.open("GET", 'ProcessSendCodeAgain?emailOrPhone=' + value('emailOrPhone'), true);
    xmlhttp.send();
}