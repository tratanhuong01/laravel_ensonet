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
function openModalElementChildChat(type,IDTaiKhoan) {
    if ($('#' + IDTaiKhoan + 'modalChatElement').hasClass('hidden')) {
        $.ajax({
            method : "GET",
            url : "/ProcessOpenModalStickerChat",
            data : {
                type : type
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
        ' rounded-full bg-gray-300 dark:bg-dark-third cursor-pointer dark:text-white');
        span.innerHTML = '&times;';
        span.setAttribute('data-index',i);
        span.addEventListener('click',function() {
            this.parentElement.remove();
            array = removeElement(array,array[this.getAttribute('data-index')]);
            console.log(array);
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
        span.addEventListener('click',function() {
            this.parentElement.remove();
            array = removeElement(array,array[this.getAttribute('data-index')]);
            console.log(array);
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