function openPost(type) {
  $.ajax({
    method: "GET",
    url: 'ProcessOpenPostDialog',
    data: {
      type : type
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
    url: '/ProcessViewInfo',
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
function openEditPicture(index) {
  var editFriend = document.getElementsByClassName("edit-friend");
  if (editFriend[index].style.display == 'none') {
    editFriend[index].style.display = 'block'
  }
  else {
    editFriend[index].style.display = 'none'
  }
  
}
function loadTextBoxType(index) {
  if (document.getElementById('newExcen').style.display == 'none') {
    $('#newExcen').show();
    $('#addOrCancel').addClass('transform rotate-45');
  }
  else {
    $('#newExcen').hide();
    $('#addOrCancel').removeClass('transform rotate-45');
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
function typeKeyDown(IDNhomTinNhan,IDTaiKhoan) {
  count++;
  if (count == 1) {
    $.ajax({
      method: "GET",
      url : "/ProcessLoadingChatTypingMessenge",
      data : {
        state : 'ON',
        IDNhomTinNhan : IDNhomTinNhan,
        IDTaiKhoan : IDTaiKhoan
      },
      success : function(response) {
      }
    })
  }
}
function typeKeyUp(IDNhomTinNhan,IDTaiKhoan) {
  count = 0;
  if (count == 0) {
    $.ajax({
      method: "GET",
      url : "/ProcessLoadingChatTypingMessenge",
      data : {
        state : 'OFF',
        IDNhomTinNhan : IDNhomTinNhan,
        IDTaiKhoan : IDTaiKhoan
      },
      success : function(response) {
      }
    })
  }
  
}
function typeChat(IDTaiKhoan) {
  if ($('#' + IDTaiKhoan + 'PlaceTypeText').html().length > 0) {
    document.getElementById(IDTaiKhoan + 'threeexten1').classList.remove('w-8/12')
    document.getElementById(IDTaiKhoan + 'threeexten1').classList.add('w-11/12')
    document.getElementById(IDTaiKhoan + 'threeexten1').classList.add('pl-4')
    $('#' + IDTaiKhoan + 'threeexten').hide();
  }
  else {
    document.getElementById(IDTaiKhoan + 'threeexten1').classList.remove('w-11/12')
    document.getElementById(IDTaiKhoan + 'threeexten1').classList.add('w-8/12')
    document.getElementById(IDTaiKhoan + 'threeexten1').classList.remove('pl-4')
    $('#' + IDTaiKhoan + 'threeexten').show();
  }
}
function showEmojii(name) {
  $("#emojis").disMojiPicker();
  $("#emojis").picker(emoji => {
    $('#' + name).append(emoji)
  });
  twemoji.parse(document.body);
}
function checkEmail(e) {
  var regex_email = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  var email_again = document.getElementById("email-again");
  var emailOrPhone = document.getElementById("emailOrPhone");
  if (regex_email.test(emailOrPhone.value)) {
    email_again.style.display = 'block';
  }
  else {
    email_again.style.display = 'none';
  }
}
function guiVeri(index) {
  var content_veri = document.getElementsByClassName("content-veri");
  if (content_veri[index].style.display == 'none')
    content_veri[index].style.display = 'block';
  else
    content_veri[index].style.display = 'none';
}