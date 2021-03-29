
// function addPlaceWorkSS() {
//     let formData = new FormData($('#formTongQuan')[0]);
//     $.ajax({
//         method : "POST",
//         url : dashboard.routes.ProccessAddPlaceWorkAbout,
//         data : formData,
//         contentType: false,
//         processData: false,
//         success : function(response) {
//             if ($('#ActiveIn').length > 0) {
//                 document.getElementsByClassName('placeWork')[1].classList.add('hidden');
//                 $('#placeWorkMain').append(response);
//             }
//            else {
//             document.getElementsByClassName('placeWork')[0].classList.remove('hidden');
//             document.getElementsByClassName('placeWork')[1].classList.add('hidden');
//             $('#placeWorkMain').append(response);
//            }
//         },
//         error : function(response) {
//             console.log(response)
//         }
//     });
// }
// function addSchoolSS() {
//     let formData = new FormData($('#formTongQuan')[0]);
//     $.ajax({
//         method : "POST",
//         url : dashboard.routes.ProcessAddSchoolAbout,
//         data : formData,
//         contentType: false,
//         processData: false,
//         success : function(response) {
//             if ($('#ActiveIn').length > 0) {
//                 document.getElementsByClassName('school')[1].classList.add('hidden');
//                 $('#schoolMain').append(response);
//             }
//             else {
//                 document.getElementsByClassName('school')[0].classList.remove('hidden');
//                 document.getElementsByClassName('school')[1].classList.add('hidden');
//                 $('#schoolMain').append(response);
//             }
//         },
//         error : function(response) {
//             console.log(response)
//         }
//     });
// }
// function addPlaceLiveCurrent() {
//     let formData = new FormData($('#formTongQuan')[0]);
//     $.ajax({
//         method : "POST",
//         url : dashboard.routes.ProcessAddPlaceLiveCurrent,
//         data : formData,
//         contentType: false,
//         processData: false,
//         success : function(response) {
//             if ($('#ActiveIn').length > 0) {
//                 document.getElementsByClassName('PlaceLiveCurrent')[1].classList.add('hidden');
//                 $('#placeLiveCurrentMain').append(response);
//             }
//             else {
//                 document.getElementsByClassName('PlaceLiveCurrent')[0].classList.remove('hidden');
//                 document.getElementsByClassName('PlaceLiveCurrent')[1].classList.add('hidden');
//                 $('#placeLiveCurrentMain').append(response);
//             }
//         },
//         error : function(response) {
//             console.log(response)
//         }
//     });
// }
// function addHomeTown() {
//     let formData = new FormData($('#formTongQuan')[0]);
//     $.ajax({
//         method : "POST",
//         url : dashboard.routes.ProcessAddHomeTown,
//         data : formData,
//         contentType: false,
//         processData: false,
//         success : function(response) {
//             if ($('#ActiveIn').length > 0) {
//                 document.getElementsByClassName('HomeTown')[1].classList.add('hidden');
//                 $('#homeTownMain').append(response);
//             }
//             else {
//                 document.getElementsByClassName('HomeTown')[0].classList.remove('hidden');
//                 document.getElementsByClassName('HomeTown')[1].classList.add('hidden');
//                 $('#homeTownMain').append(response);
//             }
//         },
//         error : function(response) {
//             console.log(response)
//         }
//     });
// }
// function addPlaceLived() {
//     let formData = new FormData($('#formTongQuan')[0]);
//     $.ajax({
//         method : "POST",
//         url : dashboard.routes.ProcessAddPlaceLived,
//         data : formData,
//         contentType: false,
//         processData: false,
//         success : function(response) {
//             document.getElementsByClassName('PlaceLivedSS')[0].classList.add('hidden');
//             document.getElementsByClassName('PlaceLivedSS')[1].classList.add('hidden');
//             $('#placeLivedMain').append(response);
//         },
//         error : function(response) {
//             console.log(response)
//         }
//     });
// }
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
function editViewAbout(ID,TypeEdit,Main,Type,IDTaiKhoan) {
    $.ajax({
        method : "GET",
        url: "/ProcessEditViewAbout",
        data : {
            ID : ID,
            TypeEdit : TypeEdit,
            IDTaiKhoan : IDTaiKhoan
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
            document.getElementById('btnLuu' + TypeEdit).addEventListener('click',function() {
                let formData = new FormData($('#formTongQuan')[0]);
                formData.append('TypeEdit',TypeEdit)
                $.ajax({
                    method : "POST",
                    url: dashboard.routes.ProcessEditAboutMain,
                    data : formData,
                    contentType: false,
                    processData: false,
                    success: function(responses) {
                        $('#' + ID + TypeEdit).replaceWith(responses);
                        document.getElementsByClassName(Type)[0].classList.add('hidden')
                    }
                });
            })
        }
    });
}
function editAbout(ID,TypeEdit,Main,IDTaiKhoan) {  
}
function editViewAboutChild(ID,TypeEdit,Main,Type,IDTaiKhoan) {
    $.ajax({
        method : "GET",
        url: "/ProcessEditViewAbout",
        data : {
            ID : ID,
            TypeEdit : TypeEdit,
            IDTaiKhoan : IDTaiKhoan
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
function add(routes,value,valueName) {
    let formData = new FormData($('#formTongQuan')[0]);
    $.ajax({
        method : "POST",
        url : routes,
        data : formData,
        contentType: false,
        processData: false,
        success : function(response) {
            if ($('#ActiveIn').length > 0) {
                document.getElementsByClassName(value)[1].classList.add('hidden');
                $('#' + valueName).append(response);
            }
           else {
               if ($('#placeLiveCurrentMain').children.length <= 2 && $('#placeLiveCurrentMain').length > 0) {
                document.getElementsByClassName(value)[1].classList.add('hidden');
               }
               else if ($('#homeTownMain').children.length <= 2 && $('#homeTownMain').length > 0) {
                document.getElementsByClassName(value)[1].classList.add('hidden');
               }
               else {
                   console.log(document.getElementsByClassName(value)[0])
                   document.getElementsByClassName(value)[0].classList.add('hidden');
                document.getElementsByClassName(value)[1].classList.remove('hidden');
               }
                $('#' + valueName).append(response);
           }
           
        },
        error : function(response) {
            console.log(response)
        }
    });
}
function addChild(routes,value,IDInput,Name,Main) {
    if ($('#' + IDInput).length > 0) {
        $('#' + IDInput).val($('#' + Name).val());
    }
    else {
        var input = document.createElement('input');
        input.setAttribute('name',IDInput);
        input.setAttribute('type','hidden');
        input.setAttribute('id',IDInput);
        input.setAttribute('value',$('#' + Name).val());
        $('#formTongQuan').append(input);
    }
    document.getElementsByClassName(value)[1].classList.add('hidden');
    let formData = new FormData($('#formTongQuan')[0]);
    $.ajax({
        method : "POST",
        url : routes,
        data : formData,
        contentType: false,
        processData: false,
        success : function(response) {
            document.getElementsByClassName(value)[1].classList.add('hidden');
            $('#' + Main).append(response);
        },
        error : function(response) {
            console.log(response)
        }
    });    
}
function addChildTwo(routes,value,IDInput1,IDInput2,Name1,Name2,Main) {
    if ($('#' + IDInput1).length > 0) {
        $('#' + IDInput1).val($('#' + Name1).val());
    }
    else {
        var input = document.createElement('input');
        input.setAttribute('name',IDInput1);
        input.setAttribute('type','hidden');
        input.setAttribute('id',IDInput1);
        input.setAttribute('value',$('#' + Name1).val());
        $('#formTongQuan').append(input);
    }
    if ($('#' + IDInput2).length > 0) {
        $('#' + IDInput2).val($('#' + Name2).val());
    }
    else {
        var input = document.createElement('input');
        input.setAttribute('name',IDInput2);
        input.setAttribute('type','hidden');
        input.setAttribute('id',IDInput2);
        input.setAttribute('value',$('#' + Name2).val());
        $('#formTongQuan').append(input);
    }
    document.getElementsByClassName(value)[1].classList.add('hidden');
    let formData = new FormData($('#formTongQuan')[0]);
    $.ajax({
        method : "POST",
        url : routes,
        data : formData,
        contentType: false,
        processData: false,
        success : function(response) {
            document.getElementsByClassName(value)[1].classList.add('hidden');
            $('#' + Main).append(response);
        },
        error : function(response) {
            console.log(response)
        }
    });    
}