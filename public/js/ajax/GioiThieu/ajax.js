function workAndStudy() {
    $.ajax({
        method : "POST",
        url : config.routes.ProcessAjaxWorkAndStudyAbout,
        data : {
            
        },
        success: function(response) {

        }
    });
}
function dashboard() {
    $.ajax({
        method : "POST",
        url : config.routes.ProcessAjaxWorkAndStudyAbout,
        data : {
            
        },
        success: function(response) {

        }
    });
}
function placeLived() {
    $.ajax({
        method : "POST",
        url : config.routes.ProcessAjaxWorkAndStudyAbout,
        data : {
            
        },
        success: function(response) {

        }
    });
}
function infoSimpleAndContact() {
    $.ajax({
        method : "POST",
        url : config.routes.ProcessAjaxWorkAndStudyAbout,
        data : {
            
        },
        success: function(response) {

        }
    });
}
function familyAndRelationship() {
    $.ajax({
        method : "POST",
        url : config.routes.ProcessAjaxWorkAndStudyAbout,
        data : {
            
        },
        success: function(response) {

        }
    });
}
function detailAboutUser() {
    $.ajax({
        method : "POST",
        url : config.routes.ProcessAjaxWorkAndStudyAbout,
        data : {
            
        },
        success: function(response) {

        }
    });
}
function eventLife() {
    $.ajax({
        method : "POST",
        url : config.routes.ProcessAjaxWorkAndStudyAbout,
        data : {
            
        },
        success: function(response) {

        }
    });
}
function loadDataAbout(routes,IDTaiKhoan,el) {
    $.ajax({
        method : "POST",
        url : routes,
        data : {
            IDTaiKhoan : IDTaiKhoan
        },
        success: function(response) {
            searchActiveAboutLi(el);
            $('#detailAbout').html(response);
            // window.History.pushState('','','')
        }
    });
}
function searchActiveAboutLi(el) {
    var activeAboutUl = $('.activeAboutUl').children();
    for (let index = 0; index < activeAboutUl.length; index++) {
        if (activeAboutUl[index].classList.contains('activeAboutLi')) {
            activeAboutUl[index].classList.remove('bg-blue-100');
            activeAboutUl[index].classList.remove('text-1877F2');
            activeAboutUl[index].classList.remove('dark:bg-dark-third');
            activeAboutUl[index].classList += ' dark:text-white hover:bg-gray-200 dark:hover:bg-dark-third';
        }
    }
    el.classList.remove('dark:text-white');
    el.classList += ' activeAboutLi bg-blue-100 dark:bg-dark-third text-1877F2 font-bold';
}