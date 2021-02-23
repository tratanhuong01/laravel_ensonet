function changeAvatar(event) {
    var path = URL.createObjectURL(event.target.files[0]);
    let formData = new FormData($('#formAvatar')[0]);
    $.ajax({
        method: "POST",
        url: "ProcessViewAvatar",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            $('#web').css('opactity', '0.2');
            $('#main').html(response);
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
        url: 'ProcessUpdateAvatar',
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            $('#main').html('');
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
        url: 'ProcessUpdateCoverImage',
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            $('#showSubmitBia').hide();
            $('#ajaxCover').html(response);
        }
    });
}