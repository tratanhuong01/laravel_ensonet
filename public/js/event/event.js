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
        textarea_post.style.height = 1+"px";
        textarea_post.style.height = (25 + textarea_post.scrollHeight)+"px";
        main_textarea_post.style.height = (25 + textarea_post.scrollHeight)+"px";
    }
}
function eModalHeaderRight() {
    var modal = document.getElementById("header-right-modal");
    if (modal.style.display == 'none') 
    modal.style.display = 'block';
    else
    modal.style.display = 'none';
}