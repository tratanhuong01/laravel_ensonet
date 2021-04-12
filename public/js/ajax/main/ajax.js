function loadajax(value, nameID) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            $("#web").css("opacity", "0.2");
            document.getElementById(nameID).innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", value, true);
    xmlhttp.send();
}
function value(names) {
    return document.getElementById(names).value;
}
function darkMode() {
    $.ajax({
        method: "GET",
        url: "/ProcessDarkMode",
        success: function (response) {
            document.getElementsByTagName("html")[0].classList = response;
        }
    });
}
function CateGoryProfile(names) {
    var NamesCate = document.getElementsByClassName("NamesCate")[0];
    if (NamesCate.style.display == 'none')
        NamesCate.style.display = 'block';
    else
        NamesCate.style.display = 'none';
}


