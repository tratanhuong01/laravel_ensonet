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
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            $("#web").css("opacity", "0.2");
            document.getElementById('register').innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", 'ProcessRegister?lastName=' + value('lastName') + '&firstName=' + value('firstName') +
        '&passWord=' + value('passWord') + '&emailOrPhone=' + value('emailOrPhone') +
        '&GioiTinh=' + document.querySelector('input[name="GioiTinh"]:checked').value +
        '&NgaySinh=' + value('NgaySinh'), true);
    xmlhttp.send();
}
function submitFormVerify() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            $("#web").css("opacity", "1");
            document.getElementById('register').innerHTML = ''
        }
    };
    xmlhttp.open("GET", 'ProcessVerify?Email=' + value('Email') + '&code_veri=' + value('code_veri'), true);
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
