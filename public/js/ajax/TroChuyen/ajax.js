
function openMessenger() {
    if ($('#modalHeaderRight').html() == '')
        $.ajax({
            method: "GET",
            url: "/ProcessOpenMessenger",
            success: function (response) {
                $('#numMessager').html('')
                $('#modalHeaderRight').html(response);
            }
        });
    else
        $('#modalHeaderRight').html('');
}
function openChat(IDTaiKhoan) {
    $.ajax({
        method: "GET",
        url: "/ProcessOpenChat",
        data: {
            IDTaiKhoan: IDTaiKhoan
        },
        success: function (response) {
            $('#modalHeaderRight').html('');
            if ($("#" + IDTaiKhoan + "Minize").length > 0) {
                $("#" + IDTaiKhoan + "Minize").remove();
            }
            $('#placeChat').append(response);

        }
    });
}
function openChatGroup(IDNhomTinNhan) {
    $.ajax({
        method: "GET",
        url: "/ProcessOpenMessageGroup",
        data: {
            IDNhomTinNhan: IDNhomTinNhan
        },
        success: function (response) {
            $('#modalHeaderRight').html('');
            $('#placeChat').append(response);
        }
    });
}
function closeChat(IDTaiKhoan) {
    $('#' + IDTaiKhoan + 'Chat').remove();
}
function minizeChat(IDTaiKhoan) {
    $.ajax({
        method: "GET",
        url: "/ProcessMinizeChat",
        data: {
            IDTaiKhoan: IDTaiKhoan
        },
        success: function (response) {
            $('#chatMinize').prepend(response);
            $('#' + IDTaiKhoan + 'Chat').remove();
        }
    });
}
function closeMinizeChat(IDTaiKhoan) {
    $('#' + IDTaiKhoan + 'Minize').remove();
}
function openMinizeChat(IDTaiKhoan) {
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
function openSettingChat(IDTaiKhoan) {
    if (document.getElementById(IDTaiKhoan + "SettingChat").style.display == 'none')
        $('#' + IDTaiKhoan + "SettingChat").show();
    else
        $('#' + IDTaiKhoan + "SettingChat").hide();
}
function sendMessage(IDNguoiNhan, IDNhomTinNhan, IDTaiKhoan, event) {
    if (event.keyCode === 13)
        if (store.get(IDNguoiNhan + 'arrayImage').length > 0) {
            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });
            var formData = new FormData();
            formData.append('IDNguoiNhan',IDNguoiNhan);
            formData.append('NoiDungTinNhan',$("#" + IDNguoiNhan + "PlaceTypeText").html());
            formData.append('IDNhomTinNhan',IDNhomTinNhan);
            for (let index = 0; index < store.get(IDNguoiNhan + 'arrayImage').length; index++) {
                const element = store.get(IDNguoiNhan + 'arrayImage')[index];
                formData.append('image_'+ index,element);
            }
            formData.append('numberArray',store.get(IDNguoiNhan + 'arrayImage').length);
            $.ajax({
                method: "POST",
                url: "/ProcessSendMessages",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    $('#' + IDNhomTinNhan + IDNguoiNhan + "Messenges").append(response);
                    $("#" + IDNguoiNhan + "PlaceTypeText").html('');
                    var objDiv = document.getElementById(IDNhomTinNhan + IDNguoiNhan + "Messenges");
                    if (objDiv.scrollHeight > 352) objDiv.scrollTop = objDiv.scrollHeight;
                },
                error: function(response) {
                    console.log(response)
                }
            });       
        }    
        else 
            if ($("#" + IDNguoiNhan + "PlaceTypeText").html().length > 0) {
                $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                  });
                var formData = new FormData();
                formData.append('IDNguoiNhan',IDNguoiNhan);
                formData.append('NoiDungTinNhan',$("#" + IDNguoiNhan + "PlaceTypeText").html());
                formData.append('IDNhomTinNhan',IDNhomTinNhan);
                $.ajax({
                    method: "POST",
                    url: "/ProcessSendMessages",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        $('#' + IDNhomTinNhan + IDNguoiNhan + "Messenges").append(response);
                        $("#" + IDNguoiNhan + "PlaceTypeText").html('');
                        var objDiv = document.getElementById(IDNhomTinNhan + IDNguoiNhan + "Messenges");
                        if (objDiv.scrollHeight > 352) objDiv.scrollTop = objDiv.scrollHeight;
                    },
                    error : function(response) {
                        console.log(response)
                    }
                });  
            }
                      
}
function sendMessageIcon(IDNguoiNhan, IDNhomTinNhan,Element) {
    $.ajax({
        method: "GET",
        url: "/ProcessSendMessages",
        data: {
            IDNguoiNhan: IDNguoiNhan,
            NoiDungTinNhan: Element.innerText,
            IDNhomTinNhan: IDNhomTinNhan
        },
        success: function (response) {
            $('#' + IDNhomTinNhan + IDNguoiNhan + "Messenges").append(response);
            $("#" + IDNguoiNhan + "PlaceTypeText").html('');
            var objDiv = document.getElementById(IDNhomTinNhan + IDNguoiNhan + "Messenges");
            if (objDiv.scrollHeight > 352) objDiv.scrollTop = objDiv.scrollHeight;
        }
    });
}
function sendMessageIconGroup(IDNguoiNhan, IDNhomTinNhan,Element) {
    $.ajax({
        method: "GET",
        url: "/ProcessSendMessages",
        data: {
            IDNguoiNhan: IDNguoiNhan,
            NoiDungTinNhan: Element.innerText,
            IDNhomTinNhan: IDNhomTinNhan
        },
        success: function (response) {
            $('#' + IDNhomTinNhan + "Messenges").append(response);
            $("#" + IDNguoiNhan + "PlaceTypeText").html('');
            var objDiv = document.getElementById(IDNhomTinNhan  + "Messenges");
            if (objDiv.scrollHeight > 352) objDiv.scrollTop = objDiv.scrollHeight;
        }
    });
}
function viewRemoveMessage(IDTinNhan, IDTaiKhoan, IDNhomTinNhan) {
    $.ajax({
        method: "GET",
        url: "/ProcessViewRemoveMessage",
        data: {
            IDTinNhan: IDTinNhan,
            IDTaiKhoan: IDTaiKhoan,
            IDNhomTinNhan: IDNhomTinNhan
        },
        success: function (response) {
            second.innerHTML = response;
            second.className += ' fixed h-screen';
            $('#btnHuyXoaTinNhan').click(function () {
                second.innerHTML = '';
                second.classList.remove("fixed");
                second.classList.remove("h-screen");
            });
            $('#btnXoaTinNhan').click(function () {
                $.ajax({
                    method: "GET",
                    url: "/ProcessRemoveMessage",
                    data: {
                        IDTinNhan: IDTinNhan,
                        IDTaiKhoan: IDTaiKhoan,
                        IDNhomTinNhan: IDNhomTinNhan,
                        Type: $('#thuHoiOrXoa').val()
                    },
                    success: function (responses) {
                        second.innerHTML = '';
                        second.classList.remove("fixed");
                        second.classList.remove("h-screen");
                        $('#' + IDTinNhan).html(responses);
                    }
                });
            })
        }
    })
}
function onchangeInputRemoveMessage(val) {
    $('#thuHoiOrXoa').val(val);
}
function selectColorMessage(IDMauTinNhan, TenMau) {
    var tenMau = $('#TenMau').val().split('@');
    if ($('#' + IDMauTinNhan + "Main").length > 0) {
        $('#' + IDMauTinNhan + "Main").addClass('dark:bg-dark-third bg-gray-300');
        $('#' + tenMau[0] + "Main").removeClass('dark:bg-dark-third bg-gray-300')
        $('#TenMau').val(IDMauTinNhan + "@" + TenMau);
    } else {
        $('#TenMau').val(IDMauTinNhan + "@" + TenMau);
        $('#' + IDMauTinNhan + "Main").addClass('dark:bg-dark-third bg-gray-300');
        $('#' + IDMauTinNhan + "Main").removeClass('dark:bg-dark-third bg-gray-300')
    }
}
function openChangeColor(IDNhomTinNhan, IDChat) {
    $.ajax({
        method: "GET",
        url: "/ProcessOpenChangeColor",
        data: {
            IDNhomTinNhan: IDNhomTinNhan,
            IDChat: IDChat
        },
        success: function (response) {
            second.innerHTML = response;
            second.className += ' fixed h-screen';
            $('#IDNhomTinNhan').val(IDNhomTinNhan);
        }
    });
}
function changeColor() {
    var val = $('#TenMau').val();
    var tenMau = val.split('@');
    var IDNhomTinNhan = $('#IDNhomTinNhan').val();
    var IDTaiKhoan = $('#IDChat').val();
    $.ajax({
        method: "GET",
        url: "/ProcessChangeColor",
        data: {
            IDMauTinNhan: tenMau[0],
            IDNhomTinNhan: IDNhomTinNhan
        },
        success: function (response) {
            console.log(IDNhomTinNhan + IDTaiKhoan + 'Messenges');
            $('#' + IDTaiKhoan + "SettingChat").hide();
            $('#' + IDNhomTinNhan + IDTaiKhoan + "Messenges").append(response);
            if ($('#' + IDNhomTinNhan + 'Messenges').length > 0) {
                var objDiv = $('#' + IDNhomTinNhan + 'Messenges');
                if (objDiv.scrollHeight > 352) objDiv.scrollTop = objDiv.scrollHeight;
            }

            if ($('#' + IDNhomTinNhan + IDTaiKhoan + 'Messenges').length > 0) {
                var objDiv = $('#' + IDNhomTinNhan + IDTaiKhoan + 'Messenges');
                if (objDiv.scrollHeight > 352) objDiv.scrollTop = objDiv.scrollHeight;
            }

            second.innerHTML = '';
            second.classList.remove("fixed");
            second.classList.remove("h-screen");
            changeColorSVG(IDNhomTinNhan, tenMau[1]);
        }
    });
}
function changeColorSVG(IDNhomTinNhan, TenMau) {
    document.getElementById('callVideo' + IDNhomTinNhan).setAttribute('fill', TenMau)
    document.getElementById('callAudio1' + IDNhomTinNhan).setAttribute('fill', TenMau)
    document.getElementById('callAudio2' + IDNhomTinNhan).setAttribute('fill', TenMau)
    document.getElementById('callAudio2' + IDNhomTinNhan).setAttribute('stroke', TenMau)
    document.getElementById('minize' + IDNhomTinNhan).setAttribute('stroke', TenMau)
    document.getElementById('close1' + IDNhomTinNhan).setAttribute('stroke', TenMau)
    document.getElementById('close2' + IDNhomTinNhan).setAttribute('stroke', TenMau)
    document.getElementById('addOrCancel' + IDNhomTinNhan).setAttribute('fill', TenMau)
    document.getElementById('picture1' + IDNhomTinNhan).setAttribute('fill', TenMau)
    document.getElementById('picture2' + IDNhomTinNhan).setAttribute('fill', TenMau)
    document.getElementById('picture3' + IDNhomTinNhan).setAttribute('fill', TenMau)
    document.getElementById('picture3' + IDNhomTinNhan).setAttribute('stroke', TenMau)
    document.getElementById('sticker' + IDNhomTinNhan).setAttribute('fill', TenMau)
    document.getElementById('gif' + IDNhomTinNhan).setAttribute('fill', TenMau)
}
function searchUserChating() {
    $.ajax({
        method: "GET",
        url: "ProcessSearchUserChat",
        data: {
            HoTen: $('#valueSearchUChat').html()
        },
        success: function (response) {
            $('#placeShowUserSearchChat').html(response);
        }
    });
}
function addUserIntoGroup(IDTaiKhoan) {
    $.ajax({
        method: "GET",
        url: "ProcessAddViewUserChatting",
        data: {
            IDTaiKhoan: IDTaiKhoan
        },
        success: function (response) {
            $('#placeShowUserSearchChat').html('');
            if (response == '') {
                $('#' + IDTaiKhoan + "Selected").remove();
                $('#' + IDTaiKhoan + "Tick").remove();
                $('#valueSearchUChat').html('');
            }
            else {
                $('#usersChats').append(response);
                $('#valueSearchUChat').html('');
            }
            if (document.getElementById('usersChats').children.length > 0) {
                $('#typeChatNewChat').css('opacity', '1');
                $('#typeChatNewChat').css('pointerEvents', 'auto');
            }
            else {
                $('#typeChatNewChat').css('opacity', '0.5');
                $('#typeChatNewChat').css('pointerEvents', 'none');
            }
            $.ajax({
                method: "GET",
                url: "ProcessLoadGUINewChatAdd",
                data: {
                    IDTaiKhoan: IDTaiKhoan
                },
                success: function (responses) {
                    $('#placeShowUserSearchChat').html(responses);
                }
            });
        }
    });
}
function openCreateChat() {
    $.ajax({
        method: "GET",
        url: "/ProcessOpenCreateChat",
        success: function (response) {
            $('#placeChat').append(response);
            $('#typeChatNewChat').css('opacity', '0.5');
            $('#typeChatNewChat').css('pointerEvents', 'none');
        }
    });
}
function removeUserSelectedGroup(IDTaiKhoan) {
    $.ajax({
        method: "GET",
        url: "ProcessRemoveUserSelectedGroup",
        data: {
            IDTaiKhoan: IDTaiKhoan
        },
        success: function (response) {
            $.ajax({
                method: "GET",
                url: "ProcessLoadGUINewChatRemove",
                data: {
                    IDTaiKhoan: IDTaiKhoan
                },
                success: function (responses) {
                    $('#placeShowUserSearchChat').html(responses);
                }
            });
            $('#' + IDTaiKhoan + 'Selected').remove();
            $('#' + IDTaiKhoan + "Tick").remove();
            if (document.getElementById('usersChats').children.length > 0) {
                $('#typeChatNewChat').css('opacity', '1');
                $('#typeChatNewChat').css('pointerEvents', 'auto');
            }
            else {
                $('#typeChatNewChat').css('opacity', '0.5');
                $('#typeChatNewChat').css('pointerEvents', 'none');
            }
        }
    });
}
function sendMessageGroups(event) {
    if (event.keyCode === 13)
        $.ajax({
            method: "GET",
            url: "ProcessSendMessageGroup",
            data: {
                NoiDungTinNhan: $('#PlaceTypeTextNewChat').html()
            },
            success: function (response) {
                $('#CreateNewChatChat').remove();
                $('#placeChat').append(response.viewGroup);
            }
        });
}
