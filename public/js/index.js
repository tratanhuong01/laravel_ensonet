document.addEventListener("DOMContentLoaded", () => {
    const coDinh = document.getElementById("header");
    const main_full = document.getElementById("content");
    const main_left_allinfo1 = document.getElementById("wrapper-scrollbar");
    function style_load1() {
        var padding_codinh = getComputedStyle(coDinh).height;
        var st = padding_codinh.replace("px", "");
        var height_ = window.innerHeight - parseInt(st);
    }
    style_load1();
    window.onresize = () => {
        style_load1();
    };
});
document.addEventListener("DOMContentLoaded", () => {
    const coDinh = document.getElementById("header");
    const main_full = document.getElementById("content");
    const main_left_allinfo1 = document.getElementsByClassName(
        "wrapper-content-right"
    )[0];
    function style_load2() {
        var padding_codinh = getComputedStyle(coDinh).height;
        var st = padding_codinh.replace("px", "");
        var height_ = window.innerHeight - parseInt(st);
        main_left_allinfo1.style.maxHeight = height_.toString() + "px";
        console.log();
    }
    style_load2();
    window.onresize = () => {
        style_load2();
    };
});
