function openPost() {
  $.ajax({
    method: "GET",
    url: 'ProcessOpenPostDialog',
    data: {
    },
    success: function (response) {
      $('#modal-one').show();
      second.innerHTML = response;
      second.className += ' fixed h-screen';
    }
  });

}
function closePost() {
  $('#modal-one').hide();
  second.innerHTML = '';
  second.classList.remove("fixed");
  second.classList.remove("h-screen");
}
function viewInfoHover(IDTaiKhoan, event) {
  var d = document.getElementById("friends-online-info");
  var topPos = event.clientY;
  d.style.top = topPos - 144 + "px";
  $.ajax({
    method: "GET",
    url: 'ProcessViewInfo',
    data: {
      IDTaiKhoan: IDTaiKhoan
    },
    success: function (response) {
      $('#friends-online-info').html('');
      $('#friends-online-info').html(response);
      d.style.display = 'flex';
    }
  });

}
function viewInfoLeave() {
  var d = document.getElementById("friends-online-info");
  d.innerHTML = '';
  d.style.display = 'none';
}

function openEditFriend(index) {
  var editFriend = document.getElementsByClassName("edit-friend");
  editFriend[index].style.display = 'block';
  document.getElementsByClassName("main-friends")[0].addEventListener("click", function () {
    editFriend[index].style.display = 'none';
  }, true);
}
function loadTextBoxType(index) {
  var d = document.getElementsByClassName("newExcen");
  var e = document.getElementsByClassName("addOrCancel")
  if (d[index].style.display == 'none') {
    d[index].style.display = 'block';
  }
  else {
    d[index].style.display = 'none';
  }
}
var mess_right = document.getElementsByClassName("mess-right");
var mess_user = document.getElementsByClassName("mess-user");
var img_mess_right = document.getElementsByClassName("img-mess-right");
var mess_user_r = document.getElementsByClassName("mess-user-r");
var mess_user_r1 = document.getElementsByClassName("mess-user-r1");
var mess_user_r2 = document.getElementsByClassName("mess-user-r2");
for (var a = 0; a < mess_right.length; a++) {
  img_mess_right[a].style.top = mess_right[a].offsetHeight - 16 + "px";
  mess_right[a].style.minWidth = mess_right[a].offsetWidth + 6 + "px";
  mess_user_r1[a].style.width = mess_right[a].offsetWidth + "px";
  mess_user_r[a].style.width = mess_user[a].offsetWidth - 50 - mess_user_r1[a].offsetWidth + mess_user_r2[a].offsetWidth + "px";
}
function openSettingChat(index) {
  var setting_chat = document.getElementsByClassName("setting-chat");
  if (setting_chat[index].style.display == 'none') {
    setting_chat[index].style.display = 'block';
    setting_chat[index].style.zIndex = 99;
  }
  else
    setting_chat[index].style.display = 'none';
}
function typeChat(index) {
  var three_exten = document.getElementsByClassName("three-exten");
  var three_exten1 = document.getElementsByClassName("three-exten1");
  var place_input_type = document.getElementsByClassName("place-input-type");
  if (place_input_type[index].innerText.length > 0) {
    three_exten[index].style.display = 'none';
    three_exten1[index].style.width = "83%";
    three_exten1[index].style.paddingLeft = "1em";
  }
  else {
    three_exten1[index].style.width = "50%";
    three_exten1[index].style.paddingLeft = "0em";
    three_exten[index].style.display = 'block';
  }
}
function showEmojii(name) {
  $("#emojis").disMojiPicker();
  $("#emojis").picker(emoji => $('#' + name).append(emoji));
  twemoji.parse(document.body);
}