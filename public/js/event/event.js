function checkValueTextAre() {
    var textarea_post = document.getElementById("textarea-post");
    var main_textarea_post = document.getElementById("main_textarea-post");
    var button_post = document.getElementById("button-post");
    if (textarea_post.value.length == 0) {
        button_post.style.cursor = 'not-allowed';
        button_post.disabled = true;
        button_post.style.backgroundColor = 'gray';
    }
    else {
        button_post.style.backgroundColor = '#1771E6';
        button_post.style.cursor = 'pointer';
        button_post.disabled = false;
        textarea_post.style.height = 1 + "px";
        textarea_post.style.height = (25 + textarea_post.scrollHeight) + "px";
        main_textarea_post.style.height = (25 + textarea_post.scrollHeight) + "px";
    }
}
function eModalHeaderRight() {
    if ($('#modalHeaderRight').html() == '')
        $.ajax({
            method: "GET",
            url: 'ProcessModalLast',
            success: function (response) {
                $('#modalHeaderRight').html(response);
            }
        });
    else
        $('#modalHeaderRight').html('');
}
function checkValueTypeCode() {
    if (document.getElementById('code_veri').value.length <= 5) {
        document.getElementById('btn-submit-veri').style.cursor = 'not-allowed';
        document.getElementById('btn-submit-veri').disabled = true;
        document.getElementById('btn-submit-veri').style.backgroundColor = 'gray';
    }
    else {
        document.getElementById('btn-submit-veri').style.backgroundColor = '#1877F2';
        document.getElementById('btn-submit-veri').style.cursor = 'pointer';
        document.getElementById('btn-submit-veri').disabled = false;
    }
}
// function changeAvatar(event) {
//     document.getElementById('web').style.opacity = '0.2';
//     document.getElementById("get-account-main").style.display = 'block';
//     var path = URL.createObjectURL(event.target.files[0]);
//     document.getElementById("avt-opactity").src = path;
//     document.getElementById("avt-opactity-none").src = path;
// }
// function changeBia(event) {
//     var path = URL.createObjectURL(event.target.files[0]);
//     var showBia = document.getElementById("showSubmitBia");
//     document.getElementById("anhBia").src = path;
//     showBia.style.display = 'block';
// }