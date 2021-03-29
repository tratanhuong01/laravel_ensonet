function changeAvatar(event) {
    var path = URL.createObjectURL(event.target.files[0]);
    let formData = new FormData($('#formAvatar')[0]);
    $.ajax({
        method: "POST",
        url: "/ProcessViewAvatar",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            second.innerHTML = response;
            second.className += ' fixed h-screen';
            $('#avt-opactity').attr('src', path);
            $('#avt-opactity-none').attr('src', path);
            var child = $('#changeavt').clone();
            $('#formUpdateAvatar1').append(child);
        },
    });
}
function changeBia(event) {
    var path = URL.createObjectURL(event.target.files[0]);
    var showBia = document.getElementById("showSubmitBia");
    document.getElementById("anhBia").src = path;
    showBia.style.display = 'block';
    document.getElementById('formUpdateCover').appendChild(document.getElementById('changeB'));
}
function updateAvatar() {
    $("#web").css("opacity", "1");
    let formData = new FormData($('#formUpdateAvatar')[0]);
    $.ajax({
        method: "POST",
        url: '/ProcessUpdateAvatar',
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            var re = document.getElementById('ajaxAnhDaiDien');
            var parent1 = document.createElement('div');
            parent1.className = 'w-44 h-44 rounded-full mx-auto border-4 border-solid border-white pt-16 dark:bg-dark-third bg-gray-100'
            var child1 = document.createElement('i');
            child1.className = 'fas fa-spinner fa-pulse text-5xl dark:text-white';
            parent1.appendChild(child1);
            var parent2 = document.createElement('div');
            parent2.className = 'w-8 h-8 rounded-full mx-auto py-0.5 px-1.5 dark:bg-dark-third bg-gray-100'
            var child2 = document.createElement('i');
            child2.className = 'fas fa-spinner fa-pulse text-xl dark:text-white';
            parent2.appendChild(child2);
            $('#ajaxAnhDaiDien').html('');
            $('#ajaxAnhDaiDien1').html('');
            re.appendChild(parent1);
            $('#ajaxAnhDaiDien1').append(parent2);
            second.innerHTML = '';
            second.classList.remove("fixed");
            second.classList.remove("h-screen");
            setTimeout(function () {
                $('#ajaxAnhDaiDien').html(response);
                $('#ajaxAnhDaiDien1').html('');
                $('#ajaxAnhDaiDien1').append('<img class="w-8 h-8 rounded-full" id="ajaxAnhDaiDien2" src="" alt="" />');
                var src = document.getElementById('anhDaiDien_Main').src;
                $('#ajaxAnhDaiDien2').attr('src', src);
            }, 1000);

        }
    });
}
function updateCoverImage() {
    $("#web").css("opacity", "1");
    let formData = new FormData($('#formUpdateCover')[0]);
    $.ajax({
        method: "POST",
        url: '/ProcessUpdateCoverImage',
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            $('#showSubmitBia').hide();
            $('#ajaxCover').html(response);
        }
    });
}
function ajaxProfileFriend(ID, NameID) {
    $.ajax({
        method: 'GET',
        url: '/ProcessProfileFriend',
        data: {
            IDView: ID
        },
        success: function (response) {
            $('#post').removeClass('border-b-4 border-blue-500');
            $('#pictures').removeClass('border-b-4 border-blue-500');
            $('#about').removeClass('border-b-4 border-blue-500');
            $('#more').removeClass('border-b-4 border-blue-500');
            $('#friends').addClass('border-b-4 border-blue-500');
            $('#' + NameID).html(response);
            window.history.pushState('', '', '/profile.' + ID + '/friends');
        }
    });
}
function ajaxProfilePicture(ID, NameID) {
    $.ajax({
        method: 'GET',
        url: '/ProcessProfilePicture',
        data: {
            IDView: ID
        },
        success: function (response) {
            $('#about').removeClass('border-b-4 border-blue-500');
            $('#post').removeClass('border-b-4 border-blue-500');
            $('#friends').removeClass('border-b-4 border-blue-500');
            $('#pictures').addClass('border-b-4 border-blue-500');
            $('#more').removeClass('border-b-4 border-blue-500');
            $('#' + NameID).html(response);
            window.history.pushState('', '', '/profile.' + ID + '/pictures');
        }
    });
}
function ajaxProfileAbout(ID, NameID) {
    $.ajax({
        method: 'GET',
        url: '/ProcessProfileAbout',
        data: {
            IDView: ID
        },
        success: function (response) {
            $('#about').addClass('border-b-4 border-blue-500');
            $('#post').removeClass('border-b-4 border-blue-500');
            $('#friends').removeClass('border-b-4 border-blue-500');
            $('#pictures').removeClass('border-b-4 border-blue-500');
            $('#more').removeClass('border-b-4 border-blue-500');
            $('#' + NameID).html(response);
            window.history.pushState('', '', '/profile.' + ID + '/about');
        }
    });
}
function searchFriend(IDView, event) {
    event.preventDefault();
    $.ajax({
        method: "GET",
        url: "/ProcessSearchFriend",
        data: {
            IDView: IDView,
            hoTen: $('#hoTen').val()
        },
        success: function (response) {
            $('#place_load_about').html(response);
        }
    });
}
function requestFriendsM(IDTaiKhoan) {
    $.ajax({
        method: "GET",
        url: "/ProcessOpenRequestFriendsMain",
        data : {
            IDTaiKhoan : IDTaiKhoan
        },
        success: function(response) {
            second.innerHTML = response.view;
            second.className += ' fixed h-screen';
        }
    });
}