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
    $('#btn-submit-form').html('');
    $('#btn-submit-form').prop("disabled", true);
    $('#btn-submit-form').css('cursor', 'not-allowed');
    $('#btn-submit-form').append('<i class="fas fa-cog fa-spin text-xl"></i>');
    $.ajax({
        method: "GET",
        url: 'ProcessRegister',
        data: $('#formRegister').serialize(),
        success: function (response) {
            $('#register').html(response);
        }
    });
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
    $('#btn-send-code').html('');
    $('#btn-send-code').prop("disabled", true);
    $('#btn-send-code').css('cursor', 'not-allowed');
    $('#btn-send-code').append('<i class="fas fa-cog fa-spin text-xl"></i>');
    $.ajax({
        method: "GET",
        url: 'ProcessSendCodeAgain',
        data: $('#formSendAgainCode').serialize(),
        success: function (response) {
            $('#register').html(response);
        }
    });
}
function forgetAccount() {
    $("#web").css("opacity", "0.2");
    $.ajax({
        method: "GET",
        url: 'ProcessForgetAccount',
        data: $('#formNhapTT').serialize(),
        success: function (response) {
            $('#register').html(response);
        }
    });
}
function changeAvatar(event) {
    var path = URL.createObjectURL(event.target.files[0]);
    let formData = new FormData($('#formAvatar')[0]);
    $.ajax({
        method: "POST",
        url: "ProcessViewAvatar",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            second.innerHTML = response;
            second.className += ' fixed h-screen';
            $('#avt-opactity').attr('src', path);
            $('#avt-opactity-none').attr('src', path);
            var child = $('#changeavt').clone();
            $('#formUpdateAvatar1').append(child);
        },
    });
}
function changeBia(event) {
    var path = URL.createObjectURL(event.target.files[0]);
    var showBia = document.getElementById("showSubmitBia");
    document.getElementById("anhBia").src = path;
    showBia.style.display = 'block';
    document.getElementById('formUpdateCover').appendChild(document.getElementById('changeB'));
}
function updateAvatar() {
    $("#web").css("opacity", "1");
    let formData = new FormData($('#formUpdateAvatar')[0]);
    $.ajax({
        method: "POST",
        url: 'ProcessUpdateAvatar',
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            second.innerHTML = '';
            var re = document.getElementById('ajaxAnhDaiDien');
            var parent1 = document.createElement('div');
            parent1.className = 'w-44 h-44 rounded-full mx-auto border-4 border-solid border-white pt-16 dark:bg-dark-third bg-gray-100'
            var child1 = document.createElement('i');
            child1.className = 'fas fa-spinner fa-pulse text-5xl dark:text-white';
            parent1.appendChild(child1);
            var parent2 = document.createElement('div');
            parent2.className = 'w-8 h-8 rounded-full mx-auto py-0.5 px-1.5 dark:bg-dark-third bg-gray-100'
            var child2 = document.createElement('i');
            child2.className = 'fas fa-spinner fa-pulse text-xl dark:text-white';
            parent2.appendChild(child2);
            $('#ajaxAnhDaiDien').html('');
            $('#ajaxAnhDaiDien1').html('');
            re.appendChild(parent1);
            $('#ajaxAnhDaiDien1').append(parent2);
            setTimeout(function () {
                $('#ajaxAnhDaiDien').html(response);
                $('#ajaxAnhDaiDien1').html('');
                $('#ajaxAnhDaiDien1').append('<img class="w-8 h-8 rounded-full" id="ajaxAnhDaiDien2" src="" alt="" />');
                var src = document.getElementById('anhDaiDien_Main').src;
                $('#ajaxAnhDaiDien2').attr('src', src);
            }, 1000);
        }
    });
}
function updateCoverImage() {
    $("#web").css("opacity", "1");
    let formData = new FormData($('#formUpdateCover')[0]);
    $.ajax({
        method: "POST",
        url: 'ProcessUpdateCoverImage',
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            $('#showSubmitBia').hide();
            $('#ajaxCover').html(response);
        }
    });
}
function changeUploadFiles(el) {
    var files = el.files;
    var arr = Array.from(files);
    for (var i = 0; i < arr.length; i++) {
        var div = document.createElement('div');
        div.className = 'divImage';
        var img = document.createElement('img');
        img.style.objectFit = 'cover';
        div.addEventListener('click', function () {
            arr.splice(i, 0);
            this.remove();
            loadUI();
        });
        if (arr.length <= 1) {
            div.className = 'w-full';
            img.className = 'w-full';
            img.src = URL.createObjectURL(arr[i]);
            div.appendChild(img);
            document.getElementById('imagePost').appendChild(div);
        }
        else {
            img.className = 'p-1 object-cover';
            div.style.width = '232px';
            div.style.height = '250px';
            img.style.width = '241px';
            img.style.height = '248px';
            img.src = URL.createObjectURL(arr[i]);
            div.appendChild(img);
            document.getElementById('imagePost').appendChild(div);
            if (files.length > 4 && i == 3) {
                var divs = document.createElement('div');
                divs.className = 'relative';
                var span = document.createElement('span');
                var num = arr.length - 4;
                span.innerHTML = '+ ' + num;
                span.className = 'text-3xl font-bold absolute top-1/2 left-1/2 text-white';
                span.style.transform = 'translate(-50%,-50%)';
                divs.appendChild(span);
                divs.style.width = '224px';
                divs.style.height = '239px';
                divs.style.background = 'rgba(0, 0, 0, 0.5)';
                divs.className = 'absolute bottom-2 right-4';
                document.getElementById('imagePost').appendChild(divs);
                break;
            }
        }
    }
}
function postFiles() {
    $('#button-post').html('');
    $('#button-post').prop("disabled", true);
    $('#button-post').css('cursor', 'not-allowed');
    $('#button-post').append('<i class="fas fa-cog fa-spin text-xl"></i>');
    let formData = new FormData($('#formPost')[0]);
    $.ajax({
        method: "POST",
        url: 'ProcessPostNormal',
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            $('#second').html(response);
        }
    });
}
function ajaxProfileFriend(ID, NameID) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById(NameID).innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", 'ProcessProfileFriend?IDView=' + ID, true);
    xmlhttp.send();
}
function FeelPost(nameID, loaiCamXuc) {
    $.ajax({
        method: "GET",
        url: 'ProcessFeelPost',
        data: {
            IDBaiDang: nameID,
            LoaiCamXuc: loaiCamXuc
        },
        success: function (response) {
            $('#' + nameID).html(response);
        }
    });
    $.ajax({
        method: "GET",
        url: 'ProcessViewFeelPost',
        data: {
            IDBaiDang: nameID,
            LoaiCamXuc: loaiCamXuc
        },
        success: function (response) {
            $('#' + nameID + 'post').html(response);
        }
    });
}
function CommentPost() {

}
function SharePost() {

}
function RepCommentPost() {

}