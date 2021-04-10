// chấp nhận kết bạn
function AcceptFriendIndex(UserMain, UserOther) {
    var nhanYeuCau = document.getElementsByClassName(UserMain + UserOther);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var i = document.createElement('i');
            i.className = 'fas fa-circle-notch fa-spin text-gray-300 text-xl';
            nhanYeuCau[0].innerHTML = '';
            nhanYeuCau[0].appendChild(i);
            var documents = this.responseText;
            setTimeout(function () {
                loiMoi.innerHTML = documents;
            }, 1500);

        }
    };
    xmlhttp.open("GET", '/ProcessAcceptFriendIndex?UserMain=' + UserMain + '&UserOther=' + UserOther, true);
    xmlhttp.send();

}

function AcceptFriendThis(UserMain, UserOther,Element) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var i = document.createElement('i');
            i.className = 'fas fa-circle-notch fa-spin text-gray-500 text-xm';
            Element.innerHTML = '';
            Element.appendChild(i);
            setTimeout(function () {
                $('#' + UserOther + 'profile').remove();
                if ($('#numberRequestwww').length > 0) {
                    var number = new Number($('#numberRequestwww').html());
                    number--;
                    $('#numberRequestwww').html(number);
                 }
            }, 1500);
            
        }
    };
    xmlhttp.open("GET", '/ProcessAcceptFriendIndex?UserMain=' + UserMain + '&UserOther=' + UserOther, true);
    xmlhttp.send();
}
function CancelRequestFriendThis(UserMain, UserOther,Element) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var i = document.createElement('i');
            i.className = 'fas fa-circle-notch fa-spin text-gray-500 text-xm';
            Element.innerHTML = '';
            Element.appendChild(i);
            setTimeout(function () {
                $('#' + UserOther + 'profile').remove();
                if ($('#numberRequestwww').length > 0) {
                    var number = new Number($('#numberRequestwww').html());
                    number--;
                    $('#numberRequestwww').html(number);
                 }
            }, 1500);
            
        }
    };
    xmlhttp.open("GET", '/ProcessCancelRequestFriendIndex?UserMain=' + UserMain + '&UserOther=' + UserOther, true);
    xmlhttp.send();
}

// hủy yêu cầu kết bạn
function CancelRequestFriendIndex(UserMain, UserOther) {
    var nhanYeuCau = document.getElementsByClassName(UserMain + UserOther + 'delete');
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var i = document.createElement('i');
            i.className = 'fas fa-circle-notch fa-spin text-gray-900 text-xl';
            nhanYeuCau[0].innerHTML = '';
            nhanYeuCau[0].appendChild(i);
            var documents = this.responseText;
            setTimeout(function () {
                loiMoi.innerHTML = documents;
            }, 1500);

        }
    };
    xmlhttp.open("GET", '/ProcessCancelRequestFriendIndex?UserMain=' + UserMain + '&UserOther=' + UserOther, true);
    xmlhttp.send();

}

function CancelRequestFriendF(UserOther,UserMain,el) {
    $.ajax({
        method: "GET",
        url : "/ProcessCancelRequestRFriend",
        data : {
            UserMain: UserMain,
            UserOther : UserOther
        },
        success : function(response) {
            el.remove();
            $('#'+ UserOther + "relationship").html(response);
        }
    });
}