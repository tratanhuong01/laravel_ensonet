function openPost() {
  var register = document.getElementById("modal-one");
  register.style.display = "block";
  document.getElementById("second").className += ' fixed';
}
function closePost() {
  var register = document.getElementById("modal-one");
  register.style.display = "none";
  second.classList.remove("fixed");
}
function viewInfoHover(index, event) {
  var d = document.getElementsByClassName("friends-online-info");
  var topPos = event.clientY;
  d[index].style.display = 'flex';
  d[index].style.top = topPos - 144 + "px";
}
function viewInfoLeave(index) {
  var d = document.getElementsByClassName("friends-online-info");
  d[index].style.display = 'none';
}
var cmt = document.getElementsByClassName("comment-per");
var tym_cmt = document.getElementsByClassName("tym-comment");
for (var index = 0; index < cmt.length; index++) {
  var width_cmt = cmt[index].offsetWidth;
  if (width_cmt <= 135) {
    tym_cmt[index].style.right = -24 + "px";
    tym_cmt[index].style.bottom = -8 + "px";
  }
  else {
    tym_cmt[index].style.right = 16 + "px";
    tym_cmt[index].style.bottom = -20 + "px";
  }
}
function openEditFriend(index) {
  var editFriend = document.getElementsByClassName("edit-friend");
  editFriend[index].style.display = 'block';
  document.getElementsByClassName("main-friends")[0].addEventListener("click", function () {
    editFriend[index].style.display = 'none';
  }, true);
}
function searchAccount() {
  document.getElementById("show-gui-getacc").style.display = "block";
  document.getElementById("get-account-main").style.display = "none";
  document.getElementById("web").style.opacity = "0.2";
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

function guiVeri(index) {
  var content_veri = document.getElementsByClassName("content-veri");
  if (content_veri[index].style.display == 'none')
    content_veri[index].style.display = 'block';
  else
    content_veri[index].style.display = 'none';
}