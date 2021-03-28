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
function addPlaceLiveCurrent() {
    let formData = new FormData($('#formTongQuan')[0]);
    $.ajax({
        method : "POST",
        url : dashboard.routes.ProcessAddPlaceLiveCurrent,
        data : formData,
        contentType: false,
        processData: false,
        success : function(response) {
            document.getElementsByClassName('PlaceLiveCurrent')[1].classList.add('hidden');
            $('#placeLiveCurrentMain').append(response);
        },
        error : function(response) {
            console.log(response)
        }
    });
}
function addHomeTown() {
    let formData = new FormData($('#formTongQuan')[0]);
    $.ajax({
        method : "POST",
        url : dashboard.routes.ProcessAddHomeTown,
        data : formData,
        contentType: false,
        processData: false,
        success : function(response) {
            document.getElementsByClassName('HomeTown')[1].classList.add('hidden');
            $('#homeTownMain').append(response);
        },
        error : function(response) {
            console.log(response)
        }
    });
}
function addPlaceLived() {
    let formData = new FormData($('#formTongQuan')[0]);
    $.ajax({
        method : "POST",
        url : dashboard.routes.ProcessAddPlaceLived,
        data : formData,
        contentType: false,
        processData: false,
        success : function(response) {
            document.getElementsByClassName('PlaceLivedSS')[1].classList.add('hidden');
            $('#placeLivedMain').append(response);
        },
        error : function(response) {
            console.log(response)
        }
    });
}
function changePrivacyAboutMain(TypeChange,ID,Element) {
    $.ajax({
        method: "GET",
        url : "/ProcessChangePrivacyAboutViewMain",
        data : {
            
        },
        success : function(response) {
            second.innerHTML = response;
            second.className += ' fixed h-screen';
            var inputPrivacy = document.getElementsByClassName('privacyAboutss');
            inputPrivacy[0].addEventListener('change',function(){
                $.ajax({
                    method : "GET",
                    url: "/ProcessChangePrivacyAboutMain",
                    data : {
                        IDQuyenRiengTu : 'CONGKHAI',
                        TypeChange : TypeChange,
                        ID : ID,
                        IDTaiKhoan : $('#IDTaiKhoanU').val()
                    },
                    success : function(responses) {
                        Element.parentElement.innerHTML = responses;
                        second.innerHTML = '';
                        second.classList.remove("fixed");
                        second.classList.remove("h-screen");
                    }
                })
            });
            inputPrivacy[1].addEventListener('change',function(){
                $.ajax({
                    method : "GET",
                    url: "/ProcessChangePrivacyAboutMain",
                    data : {
                        IDQuyenRiengTu : 'CHIBANBE',
                        TypeChange : TypeChange,
                        ID : ID,
                        IDTaiKhoan : $('#IDTaiKhoanU').val()
                    },
                    success : function(responses) {
                        Element.parentElement.innerHTML = responses;
                        second.innerHTML = '';
                        second.classList.remove("fixed");
                        second.classList.remove("h-screen");
                    }
                })
            });
            inputPrivacy[2].addEventListener('change',function(){
                $.ajax({
                    method : "GET",
                    url: "/ProcessChangePrivacyAboutMain",
                    data : {
                        IDQuyenRiengTu : 'RIENGTU',
                        TypeChange : TypeChange,
                        ID : ID,
                        IDTaiKhoan : $('#IDTaiKhoanU').val()
                    },
                    success : function(responses) {
                        Element.parentElement.innerHTML = responses;
                        second.innerHTML = '';
                        second.classList.remove("fixed");
                        second.classList.remove("h-screen");
                    }
                })
            });
        }
    });
}
function editViewAbout(ID,TypeEdit,Main,Type) {
    $.ajax({
        method : "GET",
        url: "/ProcessEditViewAbout",
        data : {
            ID : ID,
            TypeEdit : TypeEdit
        },
        success: function(response) {
            document.getElementById(Main).children[0].classList.add('hidden');
            $('#' + Main).append(response);
            document.getElementsByClassName(Type)[0].classList.remove('hidden');
            document.getElementById('btnHuy' + TypeEdit).addEventListener('click',function() {
                var cl = document.getElementsByClassName(Type)[0]
                if (cl.classList.contains('hidden')) {
                    
                    cl.classList.remove('hidden')
                }
                else {
                    document.getElementById(Main).children[0].classList.remove('hidden');
                    cl.classList.add('hidden')
                }
            })
        }
    });
}
function editAbout(ID,TypeEdit,Main) {
    $.ajax({
        method : "GET",
        url: "/ProcessEditAboutMain",
        data : {

        },
        success: function(response) {

        }
    });
}
function editViewAboutChild(ID,TypeEdit,Main,Type) {
    $.ajax({
        method : "GET",
        url: "/ProcessEditViewAbout",
        data : {
            ID : ID,
            TypeEdit : TypeEdit
        },
        success: function(response) {
            $('#' + Main).html(response);
            document.getElementById(Main.replace('Edit','')).children[0].classList.add('hidden');
            document.getElementsByClassName(Type)[0].classList.remove('hidden');
            document.getElementById('btnHuy' + TypeEdit).addEventListener('click',function() {
                var cl = document.getElementsByClassName(Type)[0]
                if (cl.classList.contains('hidden')) {
                    cl.classList.remove('hidden')
                }
                else {
                    document.getElementById(Main.replace('Edit','')).children[0].classList.remove('hidden');
                    cl.classList.add('hidden')
                }
            })
        }
    });
}