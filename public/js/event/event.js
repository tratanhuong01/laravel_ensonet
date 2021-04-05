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
            url: '/ProcessModalLast',
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
function inputSearchEvent() {
    if ($('#searchDataEnsonet').hasClass('hidden')) {
        $('#searchDataEnsonet').removeClass('hidden');
        $('#searchDataEnsonet').addClass('flex');
    }
    else {
        $('#searchDataEnsonet').removeClass('flex');
        $('#searchDataEnsonet').addClass('hidden');
    }
}
function openModalSharePost(element,event) {
    var y = event.clientY;
    $.ajax({
        method : "GET",
        url : "/ProcessShareViewPost",
        data : {
            IDBaiDang : element
        },
        success : function(response) {
            if ($('#' + element + 'Share').length > 0) {
                if ( $('#' + element + 'Share').hasClass('hidden')) {
                    if (y < $(window).height()/2) {
                        $('#' + element + 'Share').addClass('top-14')
                        $('#' + element + 'Share').removeClass('bottom-14')
                    }
                    else {
                        $('#' + element + 'Share').addClass('bottom-14')
                        $('#' + element + 'Share').removeClass('top-14')
                    }
                    $('#' + element + 'Share').html(response.view)
                    $('#' + element + 'Share').removeClass('hidden')
                }
                else {
                    $('#' + element + 'Share').html('')
                    $('#' + element + 'Share').addClass('hidden')
                    $('#' + element + 'Share').removeClass('bottom-14')
                    $('#' + element + 'Share').removeClass('top-14')
                }
            }
        }
    });
}
function sharePost(IDBaiDang,IDQuyenRiengTu) {
    $.ajax({
        method : "GET",
        url : "/ProcessSharePost",
        data : {
            IDBaiDang : IDBaiDang,
            IDQuyenRiengTu: IDQuyenRiengTu
        },
        success : function(response) {
            $('#' + IDBaiDang + 'Share').html('');
            $('#' + IDBaiDang + 'Share').html('')
            $('#' + IDBaiDang + 'Share').addClass('hidden')
            $('#' + IDBaiDang + 'Share').removeClass('bottom-14')
            $('#' + IDBaiDang + 'Share').removeClass('top-14')
        }
    });
}
function copyLinkPost(element,IDBaiDang) {
    var clipboard = new Clipboard('#' + element.id, {
        text: function() {
            return document.getElementById('post-shortlink' + IDBaiDang).value;
        }
    });
    clipboard.on('success', function(event) {
      alert("Copied!");
      event.clearSelection();
    });
}
