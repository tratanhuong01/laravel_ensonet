function openModalUpdateStateUserChange(IDTaiKhoan) {
    $.ajax({
        method: "GET",
        url : "/admin/ProcessViewModalUpdateState",
        data : {
            IDTaiKhoan : IDTaiKhoan
        },
        success : function(response) {
            $('#modal-one').hide();
            $('#second').append(response.view);
            $('#modal-two').show();
        }
    });
}
function handelOnChangeStateUserAdmin(IDTaiKhoan,state) {
    $.ajax({
        method : "GET",
        url : "/admin/ProcessHandelChangeState",
        data : {
            IDTaiKhoan : IDTaiKhoan,
            state : state
        },
        success : function(response) {
            $('#stateUser').html(response.view);
            $('#modal-two').remove();
            $('#modal-one').show();
        }
    });
}
function returnModal() {
    $('#modal-two').remove();
    $('#modal-one').show();
}