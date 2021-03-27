function addPlaceWorkSS() {
    let formData = new FormData($('#formTongQuan')[0]);
    $.ajax({
        method : "POST",
        url : dashboard.routes.ProccessAddPlaceWorkAbout,
        data : formData,
        contentType: false,
        processData: false,
        success : function(response) {
            document.getElementsByClassName('placeWork')[1].classList.add('hidden');
            $('#placeWorkMain').append(response);
        },
        error : function(response) {
            console.log(response)
        }
    });
}
function addSchoolSS() {
    let formData = new FormData($('#formTongQuan')[0]);
    $.ajax({
        method : "POST",
        url : dashboard.routes.ProcessAddSchoolAbout,
        data : formData,
        contentType: false,
        processData: false,
        success : function(response) {
            document.getElementsByClassName('school')[1].classList.add('hidden');
            $('#schoolMain').append(response);
        },
        error : function(response) {
            console.log(response)
        }
    });
}