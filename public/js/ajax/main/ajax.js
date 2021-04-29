function darkMode() {
    $.ajax({
        method: "GET",
        url: "/ProcessDarkMode",
        success: function (response) {
            document.getElementsByTagName("html")[0].classList = response;
        },
    });
}
function CateGoryProfile(names) {
    var NamesCate = document.getElementsByClassName("NamesCate")[0];
    if (NamesCate.style.display == "none") NamesCate.style.display = "block";
    else NamesCate.style.display = "none";
}
