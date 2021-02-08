function eventClick1() {
    var gui = document.getElementsByClassName("clone-info");

    if (gui[0].style.display == 'none') {
        gui[0].style.display = 'block'
        gui[1].style.display = 'none'
        gui[2].style.display = 'none'
    }
    else {
        gui[1].style.display = 'none'
        gui[2].style.display = 'none'
    }
}
function eventClick2() {
    var gui = document.getElementsByClassName("clone-info");

    if (gui[1].style.display == 'none') {
        gui[1].style.display = 'block'
        gui[0].style.display = 'none'
        gui[2].style.display = 'none'
    }
    else {
        gui[0].style.display = 'none'
        gui[2].style.display = 'none'
    }
}
function eventClick3() {
    var gui = document.getElementsByClassName("clone-info");

    if (gui[2].style.display == 'none') {
        gui[2].style.display = 'block'
        gui[0].style.display = 'none'
        gui[1].style.display = 'none'
    }
    else {
        gui[0].style.display = 'none'
        gui[1].style.display = 'none'
    }
}
