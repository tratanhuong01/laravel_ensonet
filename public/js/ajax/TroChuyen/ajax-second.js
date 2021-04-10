function closeChatGroup(IDNhomTinNhan, IDTaiKhoan) {
    $('#' + IDNhomTinNhan + IDTaiKhoan + 'Chat').remove();
}
function minizeChatGroup(IDNhomTinNhan, IDTaiKhoan) {
    $.ajax({
        method: "GET",
        url: "/ProcessMinizeChat",
        data: {
            IDTaiKhoan: IDTaiKhoan
        },
        success: function (response) {
            $('#chatMinize').prepend(response);
            $('#' + IDNhomTinNhan + IDTaiKhoan + 'Chat').remove();
        }
    });
}
function closeMinizeChatGroup(IDTaiKhoan) {
    $('#' + IDTaiKhoan + 'Minize').remove();
}
function openMinizeChatGroup(IDTaiKhoan) {
    $.ajax({
        method: "GET",
        url: "/ProcessMinizeChat",
        data: {

        },
        success: function (response) {
            $('#chatMinize').prepend(response);
            $('#' + IDTaiKhoan + 'Chat').remove();
        }
    });
}
function openSettingChatGroup(IDTaiKhoan) {
    if (document.getElementById(IDTaiKhoan + "SettingChat").style.display == 'none')
        $('#' + IDTaiKhoan + "SettingChat").show();
    else
        $('#' + IDTaiKhoan + "SettingChat").hide();
}
function sendMessageGroup(IDNguoiNhan, IDNhomTinNhan, IDTaiKhoan, event) {
    if (event.keyCode === 13)
        if ($("#" + IDNhomTinNhan + "PlaceTypeText").html().length > 0)
            $.ajax({
                method: "GET",
                url: "/ProcessSendMessages",
                data: {
                    IDNguoiNhan: IDNguoiNhan,
                    NoiDungTinNhan: $("#" + IDNhomTinNhan + "PlaceTypeText").html(),
                    IDNhomTinNhan: IDNhomTinNhan
                },
                success: function (response) {
                    $('#' + IDNhomTinNhan + "Messenges").append(response);
                    $("#" + IDNhomTinNhan + "PlaceTypeText").html('');
                    var objDiv = document.getElementById(IDNhomTinNhan + "Messenges");
                    if (objDiv.scrollHeight > 352) objDiv.scrollTop = objDiv.scrollHeight;
                }
            });
}
function seenMessage(IDNhomTinNhan, IDTaiKhoan) {
    $.ajax({
        method: "GET",
        url: "/ProcessSeenMessage",
        data: {
            IDNhomTinNhan: IDNhomTinNhan,
            IDTaiKhoan: IDTaiKhoan
        },
        success: function(response) {

        }
    })
}
function openModalElementChildChat(type,IDTaiKhoan,IDNhomTinNhan) {
    if ($('#' + IDTaiKhoan + 'modalChatElement').hasClass('hidden')) {
        $.ajax({
            method : "GET",
            url : "/ProcessOpenModalStickerChat",
            data : {
                type : type,
                IDNhomTinNhan : IDNhomTinNhan,
                IDTaiKhoan:IDTaiKhoan
            },
            success : function(response) {
                $('#' + IDTaiKhoan + 'modalChatElement').removeClass('hidden')
                $('#' + IDTaiKhoan + 'modalChatElement').html(response.view);
            },
            error : function(response) {
    
            }
        });
    }
    else {
        $('#' + IDTaiKhoan + 'modalChatElement').addClass('hidden')
        $('#' + IDTaiKhoan + 'modalChatElement').html('');
    }
}
function removeElement(array, elem) {
    var index = array.indexOf(elem);
    if (index > -1) {
        array.splice(index, 1);
    }
    return array;
}
function onchangeViewSendImageChat(event,IDTaiKhoan) {
    var files = event.files;
    var arr = Array.from(files);
    var ul = $('#' + IDTaiKhoan + 'imageChat').children()[0];
    var array = store.get(IDTaiKhoan + 'arrayImage');
    for (var i = 0; i < arr.length; i++) {
        array[i] = arr[i];
        var li = document.createElement('li');
        li.setAttribute('class','w-16 h-16 rounded-lg text-center mr-4 relative flex-shrink-0');
        var img = document.createElement('img');
        img.setAttribute('src',URL.createObjectURL(arr[i]));
        img.setAttribute('class','w-16 h-16 mx-auto rounded-lg object-cover');
        var span = document.createElement('span')
        span.setAttribute('class','font-bold text-sm absolute -top-2 -right-2 p-0.5 px-2 ' +
        ' rounded-full bg-gray-300 dark:bg-dark-third cursor-pointer dark:text-white closeImageTimes');
        span.innerHTML = '&times;';
        span.setAttribute('data-index',i);
        span.setAttribute('data-id-user',IDTaiKhoan);
        span.addEventListener('click',function() {
            this.parentElement.remove();
            array = removeElement(array,array[this.getAttribute('data-index')]);
            var s = document.getElementsByClassName('closeImageTimes');
            for (let indexs = 0; indexs < s.length; indexs++) {
                const element = s[indexs];
                element.setAttribute('data-index',indexs);
            }
            if (array.length == 0) 
            $('#' + this.getAttribute('data-id-user') + 'imageChat').addClass('hidden')
        });
        li.appendChild(img);
        li.appendChild(span);
        ul.appendChild(li);
    }
    $('#' + IDTaiKhoan + 'liLoadAdd').clone().appendTo(ul);
    $('#' + IDTaiKhoan + 'liLoadAdd').remove();
    $('#' + IDTaiKhoan + 'imageChat').append(ul);
    $('#' + IDTaiKhoan + 'imageChat').removeClass('hidden')
    store.set(IDTaiKhoan +'arrayImage', array);
}
function loadAddImageChat(event,IDTaiKhoan) {
    var files = event.files;
    var arr = Array.from(files);
    var ul = $('#' + IDTaiKhoan + 'imageChat').children()[0];
    var array = store.get(IDTaiKhoan + 'arrayImage');
    var index = array.length;
    for (var i = 0; i < arr.length; i++) {
        array[index] = arr[i];
        var li = document.createElement('li');
        li.setAttribute('class','w-16 h-16 rounded-lg text-center mr-4 relative flex-shrink-0');
        var img = document.createElement('img');
        img.setAttribute('src',URL.createObjectURL(arr[i]));
        img.setAttribute('class','w-16 h-16 mx-auto rounded-lg object-cover');
        var span = document.createElement('span')
        span.setAttribute('class','font-bold mySpanClose text-sm absolute -top-2 -right-2 p-0.5 px-2 ' +
        ' rounded-full bg-gray-300 dark:bg-dark-third cursor-pointer dark:text-white');
        span.innerHTML = '&times;';
        span.setAttribute('data-index',index);
        span.setAttribute('data-id-user',IDTaiKhoan);
        span.addEventListener('click',function() {
            this.parentElement.remove();
            array = removeElement(array,array[this.getAttribute('data-index')]);
            var s = document.getElementsByClassName('closeImageTimes');
            for (let indexs = 0; indexs < s.length; indexs++) {
                const element = s[indexs];
                element.setAttribute('data-index',indexs);
            }
            if (array.length == 0) 
            $('#' + this.getAttribute('data-id-user') + 'imageChat').addClass('hidden')
        });
        li.appendChild(img);
        li.appendChild(span);
        ul.appendChild(li);
        index++;
    }
    $('#' + IDTaiKhoan + 'liLoadAdd').clone().appendTo(ul);
    $('#' + IDTaiKhoan + 'liLoadAdd').remove();
    store.set(IDTaiKhoan +'arrayImage', array);
    console.log(store.get(IDTaiKhoan + 'arrayImage'));
}
function feelViewMessage(IDTinNhan) {
    if ($('#' + IDTinNhan + 'Feel').hasClass('hidden')) 
        $('#' + IDTinNhan + 'Feel').removeClass('hidden')
    else 
        $('#' + IDTinNhan + 'Feel').addClass('hidden')
}
function onleaveHoverFeelHide(IDTinNhan) {
    $('#' + IDTinNhan + 'Feel').addClass('hidden')
}
function feelMessage(IDTinNhan,LoaiCamXuc) {
    $.ajax({
        method : "GET",
        url : "/ProcessFeelMessage",
        data : {
            IDTinNhan : IDTinNhan,
            LoaiCamXuc : LoaiCamXuc
        },
        success : function(response) {
            $('#' + IDTinNhan + 'NumFeelMessage').html(response.view);
        }
    });
}
//xem tất cả số lượng cảm xúc của bài đăng 
function viewDetailFeelMessage(IDTinNhan) {
    $.ajax({
        method: "GET",
        url:  '/ProcessViewDetailFeelMessage',
        data: {
            IDTinNhan: IDTinNhan,
        },
        success: function (response) {
            $('#second').html(response);
            second.className += ' fixed h-screen';
        }
    });
}
//xem số lượng mỗi cảm xúc của bài đăng 
function viewOnlyDetailFeelMessage(IDTinNhan, LoaiCamXuc) {
    $.ajax({
        method: "GET",
        url: '/ProcessViewOnlyDetailFeelMessage',
        data: {
            IDTinNhan: IDTinNhan,
            LoaiCamXuc: LoaiCamXuc
        },
        success: function (response) {
            $('#all').html(response);
        }
    });
}

function sendStickerMessage(IDNhomTinNhan,IDTaiKhoan,IDNhanDan) {
    $.ajax({
        method : "GET",
        url : "/ProcessSendStickerMessage",
        data : {
            IDNhomTinNhan,
            IDNhanDan : IDNhanDan
        },
        success : function(response) {
            $('#' + IDNhomTinNhan + IDTaiKhoan +'Messenges').append(response.view);
            $('#' + IDTaiKhoan + 'modalChatElement').html('');
            $('#' + IDTaiKhoan + 'modalChatElement').addClass('hidden');
            var objDiv = document.getElementById(IDNhomTinNhan + IDTaiKhoan + "Messenges");
                if (objDiv.scrollHeight > 352) objDiv.scrollTop = objDiv.scrollHeight;
        }
    });
}