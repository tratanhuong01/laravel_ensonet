function openMessenger() {
    if ($('#modalHeaderRight').html() == '')
        $.ajax({
            method: "GET",
            url: "ProcessOpenMessenger",
            success: function (response) {
                $('#modalHeaderRight').html(response);
            }
        });
    else
        $('#modalHeaderRight').html('');
}
function openChat(IDTaiKhoan) {
    $.ajax({
        method: "GET",
        url: "ProcessOpenChat",
        data: {
            IDTaiKhoan: IDTaiKhoan
        },
        success: function (response) {
            if ($("#" + IDTaiKhoan + "Minize").length > 0) {
                $("#" + IDTaiKhoan + "Minize").remove();
            }
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
        url: "ProcessMinizeChat",
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
        url: "ProcessMinizeChat",
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
        if ($("#" + IDNguoiNhan + "PlaceTypeText").html().length > 0)
            $.ajax({
                method: "GET",
                url: "/ProcessSendMessages",
                data: {
                    IDNguoiNhan: IDNguoiNhan,
                    NoiDungTinNhan: $("#" + IDNguoiNhan + "PlaceTypeText").html()
                },
                success: function (response) {
                    $('#' + IDNhomTinNhan + IDTaiKhoan + "Messenges").append(response);
                    $("#" + IDNguoiNhan + "PlaceTypeText").html('');
                    var objDiv = document.getElementById(IDNhomTinNhan + IDTaiKhoan + "Messenges");
                    objDiv.scrollTop = objDiv.scrollHeight;
                }
            });
}
function viewRemoveMessage(IDTinNhan, IDTaiKhoan) {
    $.ajax({
        method: "GET",
        url: "ProcessViewRemoveMessage",
        data: {
            IDTinNhan: IDTinNhan,
            IDTaiKhoan: IDTaiKhoan
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
                    url: "ProcessRemoveMessage",
                    data: {
                        IDTinNhan: IDTinNhan,
                        IDTaiKhoan: IDTaiKhoan,
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