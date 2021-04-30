function AddView(Name) {
    var cl = document.getElementsByClassName(Name);
    if (cl[1].classList.contains("hidden")) {
        cl[1].classList.remove("hidden");
        cl[0].classList.add("hidden");
    } else {
        cl[1].classList.add("hidden");
        cl[0].classList.remove("hidden");
    }
}
function EventClickInputAbout(Name, Element, Condition) {
    if (Element.value.length >= 0)
        $.ajax({
            method: "GET",
            url: "/ProcessShowDataAboutCorresponding",
            data: {
                Type: Condition,
                Value: Element.value,
                Name: Name,
            },
            success: function (response) {
                document.getElementsByClassName(
                    Condition
                )[0].innerHTML = response;
                document
                    .getElementsByClassName(Condition)[0]
                    .classList.remove("hidden");
                document
                    .getElementsByClassName("mainAboutFull")[0]
                    .addEventListener("click", function () {
                        document
                            .getElementsByClassName(Condition)[0]
                            .classList.add("hidden");
                    });
            },
        });
}
function PrivacyAbout(Element, IDInput) {
    $.ajax({
        method: "GET",
        url: "/ProcessViewPrivacyAbout",
        success: function (response) {
            second.innerHTML = response;
            second.className += " fixed h-screen";
            var inputPrivacy = document.getElementsByClassName(
                "privacyAboutss"
            );
            inputPrivacy[0].addEventListener("change", function () {
                $.ajax({
                    method: "GET",
                    url: "/ProcessPrivacyAbouts",
                    data: {
                        IDQuyenRiengTu: "CONGKHAI",
                    },
                    success: function (responses) {
                        if ($("#" + IDInput).length > 0) {
                            $("#" + IDInput).val("CONGKHAI");
                            Element.innerHTML = responses;
                        } else {
                            var input = document.createElement("input");
                            input.setAttribute("name", IDInput);
                            input.setAttribute("type", "hidden");
                            input.setAttribute("id", IDInput);
                            input.setAttribute("value", "CONGKHAI");
                            Element.innerHTML = responses;
                            document
                                .getElementById("formTongQuan")
                                .append(input);
                        }
                        second.innerHTML = "";
                        second.classList.remove("fixed");
                        second.classList.remove("h-screen");
                    },
                });
            });
            inputPrivacy[1].addEventListener("change", function () {
                $.ajax({
                    method: "GET",
                    url: "/ProcessPrivacyAbouts",
                    data: {
                        IDQuyenRiengTu: "CHIBANBE",
                    },
                    success: function (responses) {
                        if ($("#" + IDInput).length > 0) {
                            $("#" + IDInput).val("CHIBANBE");
                            Element.innerHTML = responses;
                        } else {
                            var input = document.createElement("input");
                            input.setAttribute("name", IDInput);
                            input.setAttribute("type", "hidden");
                            input.setAttribute("id", IDInput);
                            input.setAttribute("value", "CHIBANBE");
                            Element.innerHTML = responses;
                            document
                                .getElementById("formTongQuan")
                                .append(input);
                        }
                        second.innerHTML = "";
                        second.classList.remove("fixed");
                        second.classList.remove("h-screen");
                    },
                });
            });
            inputPrivacy[2].addEventListener("change", function () {
                $.ajax({
                    method: "GET",
                    url: "/ProcessPrivacyAbouts",
                    data: {
                        IDQuyenRiengTu: "RIENGTU",
                    },
                    success: function (responses) {
                        if ($("#" + IDInput).length > 0) {
                            $("#" + IDInput).val("RIENGTU");
                            Element.innerHTML = responses;
                        } else {
                            var input = document.createElement("input");
                            input.setAttribute("name", IDInput);
                            input.setAttribute("type", "hidden");
                            input.setAttribute("id", IDInput);
                            input.setAttribute("value", "RIENGTU");
                            Element.innerHTML = responses;
                            document
                                .getElementById("formTongQuan")
                                .append(input);
                        }
                        second.innerHTML = "";
                        second.classList.remove("fixed");
                        second.classList.remove("h-screen");
                    },
                });
            });
        },
    });
}
function EventClickYearAbout(Name, Index) {
    var year = document.getElementsByClassName(Name);
    if (year[Index].classList.contains("hidden"))
        year[Index].classList.remove("hidden");
    else year[Index].classList.add("hidden");
}
function OnChangeCheckBoxAboutOnOrOff(Element, Name) {
    var data = document.getElementsByClassName(Name)[0].children;
    if (Element.checked) {
        data[2].classList.add("hidden");
        data[3].classList.add("hidden");
    } else {
        data[2].classList.remove("hidden");
        data[3].classList.remove("hidden");
    }
}
function OnChangeCheckBoxAboutOffOrOn(Element, Name) {
    var data = document.getElementsByClassName(Name)[0].children;
    if (Element.checked) {
        data[2].classList.remove("hidden");
        data[3].classList.remove("hidden");
    } else {
        data[2].classList.add("hidden");
        data[3].classList.add("hidden");
    }
}
function OninputValueInputAbout(Name, Element, Condition) {
    $.ajax({
        method: "GET",
        url: "/ProcessShowDataAboutCorresponding",
        data: {
            Type: Condition,
            Value: Element.value,
            Name: Name,
        },
        success: function (response) {
            document.getElementsByClassName(Condition)[0].innerHTML = response;
            document
                .getElementsByClassName(Condition)[0]
                .classList.remove("hidden");
        },
    });
}
function loadDataAbout(routes, IDTaiKhoan, el) {
    $.ajax({
        method: "POST",
        url: routes,
        data: {
            IDTaiKhoan: IDTaiKhoan,
            user: user,
            users: users,
        },
        success: function (response) {
            searchActiveAboutLi(el);
            $("#detailAbout").html(response);
            // window.History.pushState('','','')
        },
        error: function (response) {
            console.log(response);
        },
    });
}
function searchActiveAboutLi(el) {
    var activeAboutUl = $(".activeAboutUl").children();
    for (let index = 0; index < activeAboutUl.length; index++) {
        if (activeAboutUl[index].classList.contains("activeAboutLi")) {
            activeAboutUl[index].classList.remove("bg-blue-100");
            activeAboutUl[index].classList.remove("text-1877F2");
            activeAboutUl[index].classList.remove("dark:bg-dark-third");
            activeAboutUl[index].classList +=
                " dark:text-white hover:bg-gray-200 dark:hover:bg-dark-third";
        }
    }
    el.classList.remove("dark:text-white");
    el.classList +=
        " activeAboutLi bg-blue-100 dark:bg-dark-third text-1877F2 font-bold";
}
function choose(IDInput, ID, Name, ValueInput, IDS, Value) {
    if ($("#" + ValueInput).length > 0) {
        $("#" + ValueInput).val(ID);
        document.getElementById(IDS).value = Name;
        document.getElementsByClassName(Value)[0].classList.add("hidden");
    } else {
        var input = document.createElement("input");
        input.setAttribute("name", IDInput);
        input.setAttribute("type", "hidden");
        input.setAttribute("id", ValueInput);
        input.setAttribute("value", ID);
        document.getElementById(IDS).value = Name;
        document.getElementsByClassName(Value)[0].classList.add("hidden");
        document.getElementById("formTongQuan").append(input);
    }
}
function choose1(IDInput, ID, Name, ValueInput, IDS, Value) {
    if ($("#" + ValueInput).length > 0) {
        document.getElementById(ValueInput).value = ID;
        document.getElementById(IDS).innerHTML = Name;
        document.getElementsByClassName(Value)[0].classList.add("hidden");
    } else {
        var input = document.createElement("input");
        input.setAttribute("name", IDInput);
        input.setAttribute("type", "hidden");
        input.setAttribute("id", ValueInput);
        input.setAttribute("value", ID);
        document.getElementById(IDS).innerHTML = Name;
        document.getElementsByClassName(Value)[0].classList.add("hidden");
        document.getElementById("formTongQuan").append(input);
    }
}
function deleteAbout(ID, TypeDelete, Main) {
    $.ajax({
        method: "GET",
        url: "/ProcessDeleteAbout",
        data: {},
        success: function (response) {
            second.innerHTML = response;
            second.className += " fixed h-screen";
            document
                .getElementById("btnHuyXoaGioiThieu")
                .addEventListener("click", function () {
                    second.innerHTML = "";
                    second.classList.remove("fixed");
                    second.classList.remove("h-screen");
                });
            document
                .getElementById("btnXoaGioiThieu")
                .addEventListener("click", function (response) {
                    $.ajax({
                        method: "GET",
                        url: "/ProcessDeleteAboutMain",
                        data: {
                            ID: ID,
                            TypeDelete: TypeDelete,
                            user: user,
                            users: users,
                        },
                        success: function (response) {
                            if ($("#" + ID + TypeDelete).length > 0) {
                                if (
                                    document.getElementById(Main).children
                                        .length >= 3
                                )
                                    $("#" + ID + TypeDelete).remove();
                                else $("#" + Main).append(response);
                            } else $("#" + Main).html(response);
                            second.innerHTML = "";
                            second.classList.remove("fixed");
                            second.classList.remove("h-screen");
                        },
                    });
                });
        },
    });
}
