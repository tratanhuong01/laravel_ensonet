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