//xem tất cả số lượng cảm xúc của bài đăng 
function viewDetailFeel(IDBaiDang, Path) {
    $.ajax({
        method: "GET",
        url: Path + '/' + 'ProcessViewDetailFeel',
        data: {
            IDBaiDang: IDBaiDang,
        },
        success: function (response) {
            $('#second').html(response);
            $('#modal-one').show();
            second.className += ' fixed h-screen';
        }
    });
}

//xem số lượng mỗi cảm xúc của bài đăng 
function viewOnlyDetailFeel(IDBaiDang, LoaiCamXuc, Path) {
    $.ajax({
        method: "GET",
        url: '/' + 'ProcessViewOnlyDetailFeel',
        data: {
            IDBaiDang: IDBaiDang,
            LoaiCamXuc: LoaiCamXuc
        },
        success: function (response) {
            $('#all').html(response);
        }
    });
}

// mở hộp thoại chỉnh sửa bài đăng  
function openEditPost(ids) {
    $('#' + ids).show();
    document.getElementById(ids + "Main").addEventListener("click", function () {
        $('#' + ids).hide();
    }, true);
}
// chọn quyền riêng tư
function selectPrivacy() {
    $.ajax({
        method: "GET",
        url: '/ProcessSelecPrivacyPost',
        data: {
        },
        success: function (response) {
            var div = document.createElement('div');
            div.id = 'modal-two';
            div.className = "shadow-sm border border-solid border-gray-500 py-3 pl-1.5 pr-1.5 pt-0" +
                " bg-white w-full fixed z-50 top-1/2 left-1/2 dark:bg-dark-second rounded-lg " +
                " sm:w-10/12 md:w-2/3 lg:w-2/3 xl:w-1/3";
            div.style.zIndex = '10';
            div.style.transform = 'translate(-50%,-50%)';
            div.innerHTML = response;
            $('#second').append(div);
            $('#modal-one').hide();
            second.className += ' fixed h-screen';
            $('#closeModalSelectPrivacy').click(function () {
                $('#modal-two').remove();
                $('#modal-one').show();
            });
        }
    });
}

// event onchange chọn quyền riêng tư của bài đăng
function handelOnChangeInput(IDQuyenRiengTu) {
    $.ajax({
        method: "GET",
        url: '/ProcessOnChangeInputPrivacy',
        data: {
            IDQuyenRiengTu: IDQuyenRiengTu,
        },
        success: function (response) {
            $('#selectPrivacyMain').html(response);
            $('#modal-two').remove();
            $('#modal-one').show();
            $('#IDQuyenRiengTu').val(IDQuyenRiengTu);
        }
    });
}

//chỉnh sửa bài đăng 
function editPost(IDBaiDang) {
    $.ajax({
        method: "GET",
        url: '/ProcessViewEditPost',
        data: {
            IDBaiDang: IDBaiDang
        },
        success: function (response) {
            second.innerHTML = response;
            second.className += ' fixed h-screen';
            $('#dongSuaBaiViet').click(function () {
                second.innerHTML = '';
                second.classList.remove("fixed");
                second.classList.remove("h-screen");
            });
        }
    });
}

//thay đổi đối tượng quyền riêng tư của bài đăng
function changeObjectPrivacyPost(IDBaiDang) {
    $.ajax({
        method: "GET",
        url: '/ProcessViewObjectPrivacyPost',
        data: {
        },
        success: function (response) {
            second.innerHTML = response;
            second.className += ' fixed h-screen';
            $('#IDBaiDangs').val(IDBaiDang)
        }
    });
}

// event onchange bài đăng dialog
function handelOnChangeInputPost(IDQuyenRiengTu) {
    $.ajax({
        method: "GET",
        url: '/ProcessEditObjectPrivacyPost',
        data: {
            IDQuyenRiengTu: IDQuyenRiengTu,
            IDBaiDang: $('#IDBaiDangs').val(),
        },
        success: function (response) {
            $('#' + $('#IDBaiDangs').val() + "QRT").html(response);
            second.innerHTML = '';
            second.classList.remove("fixed");
            second.classList.remove("h-screen");
        }
    });
}

//xóa bài đăng
function deleteWarnPost(IDBaiDang, IDMain) {
    $.ajax({
        method: "GET",
        url: '/ProcessWarnDeletePost',
        data: {
            IDBaiDang: IDBaiDang
        },
        success: function (response) {
            second.innerHTML = response;
            second.className += ' fixed h-screen';
            $('#huyXoaBaiDang').click(function () {
                second.innerHTML = '';
                second.classList.remove("fixed");
                second.classList.remove("h-screen");
            });
            $('#btnXoaBaiDang').click(function () {
                $.ajax({
                    method: "GET",
                    url: 'ProcessDeletePost',
                    data: {
                        IDBaiDang: IDBaiDang
                    },
                    success: function (response) {
                        $('#' + IDMain).remove();
                        second.innerHTML = '';
                        second.classList.remove("fixed");
                        second.classList.remove("h-screen");
                    }
                });
            });
        }
    });
}

//gắn thẻ bạn bè
function viewTagFriends() {
    $.ajax({
        method: "GET",
        url: "/ProcesViewTagFriend",
        success: function (response) {
            $('#second').html(response);
        }
    });
}
function searchTagFriends(IDTaiKhoan) {
    $.ajax({
        method: "GET",
        url: "/ProcessSearchTagFriend",
        data: {
            IDTaiKhoan: IDTaiKhoan,
            HoTen: $('#searchTagFriends').val()
        },
        success: function (response) {
            $('#tag-users').html(response);
        }
    });
}
function returnViewCreatePost() {
    $.ajax({
        method: "GET",
        url: "/ProcesViewCreatePost",
        success: function (response) {
            $('#second').html(response);
        }
    });
}
function tagFriends(IDTaiKhoan) {
    $.ajax({
        method: "GET",
        url: "/ProcessTagFriend",
        data: {
            IDTaiKhoan: IDTaiKhoan,
        },
        success: function (response) {
            $('#' + IDTaiKhoan + "Check").html(response);
        }
    });
}

//tâm trạng hiện tại
function viewFeelCurrent() {
    $.ajax({
        method: "GET",
        url: "/ProcessViewFeelCurrent",
        success: function (response) {
            $('#second').html(response);
        }
    });
}
function searchFeelCurrent() {
    $.ajax({
        method: "GET",
        url: "/ProcessSearchFeelCurrent",
        data: {
            TenCamXuc: $('#searchFeelCurrent').val()
        },
        success: function (response) {
            $('#feelUserCurrent').html(response);
        }
    });
}
function tickFeel(IDCamXuc) {
    $.ajax({
        method: "GET",
        url: "/ProcessTickFeelCurrent",
        data: {
            IDCamXuc: IDCamXuc,
        },
        success: function (response) {
            $('#' + $('#IDCamXucPrev').val() + "Tick").html('');
            $('#' + IDCamXuc + "Tick").html(response);
            $('#IDCamXucPrev').val(IDCamXuc);
        }
    });
}