function openModalUpdateStateUserChange(IDTaiKhoan) {
    $.ajax({
        method: "GET",
        url: "/admin/ProcessViewModalUpdateState",
        data: {
            IDTaiKhoan: IDTaiKhoan,
        },
        success: function (response) {
            $("#modal-one").hide();
            $("#second").append(response.view);
            $("#modal-two").show();
        },
    });
}
function handelOnChangeStateUserAdmin(IDTaiKhoan, state) {
    $.ajax({
        method: "GET",
        url: "/admin/ProcessHandelChangeState",
        data: {
            IDTaiKhoan: IDTaiKhoan,
            state: state,
        },
        success: function (response) {
            $("#stateUser").html(response.view);
            $("#modal-two").remove();
            $("#modal-one").show();
        },
    });
}
function returnModal() {
    $("#modal-two").remove();
    $("#modal-one").show();
}
function createElementFromHTML(htmlString) {
    var div = document.createElement("div");
    div.innerHTML = htmlString.trim();

    // Change this to div.childNodes to support multiple top-level nodes
    return div.firstChild;
}
function onClickFilter(type, valueFilter, json, table, ele) {
    json = JSON.parse(json);
    $("#filter").html("");
    $("#showSecondFilter").html(ele.innerHTML);
    for (let index = 0; index < json.length; index++) {
        const element = json[index];
        var div = document.createElement("div");
        div.classList = "w-full p-2";
        div.innerHTML = element;
        div.setAttribute("data-filter", element);
        $("#filter").append(div);
        div.addEventListener("click", function () {
            $.ajax({
                method: "GET",
                url: "/admin/ProcessFilterAdmin",
                data: {
                    type: type,
                    dataFilter: this.getAttribute("data-filter"),
                    table: table,
                    valueFilter: valueFilter,
                },
                success: function (response) {
                    $("#tableMain").html(response.view);
                    if ($("#" + response.query).length > 0)
                        $("#" + response.query).replaceWith(
                            createElementFromHTML(response.viewChild)
                        );
                    else $("#filterAndSortMainData").append(response.viewChild);
                },
            });
            $("#showFirstFilter").html(element);
        });
    }
    $("#showFirstFilter").html(json[0]);
}
function onClickSort(type, valueSort, json, table, ele) {
    json = JSON.parse(json);
    $("#sort").html("");
    $("#showSecondSort").html(ele.innerHTML);
    for (let index = 0; index < json.length; index++) {
        const element = json[index];
        var div = document.createElement("div");
        div.classList = "w-full p-2";
        div.innerHTML = element;
        div.setAttribute("data-sort", element);
        $("#sort").append(div);
        div.addEventListener("click", function () {
            $.ajax({
                method: "GET",
                url: "/admin/ProcessSortAdmin",
                data: {
                    type: type,
                    dataSort: this.getAttribute("data-sort"),
                    table: table,
                    valueSort: valueSort,
                },
                success: function (response) {
                    if (response.FilterOrSort === "Sort") {
                        if ($("#sortDataChild").length > 0) {
                            $("#sortDataChild").replaceWith(
                                createElementFromHTML(response.viewChild)
                            );
                        } else {
                            $("#filterAndSortMainData").append(
                                response.viewChild
                            );
                        }
                    } else {
                        if ($("#" + response.query).length > 0)
                            $("#" + response.query).replaceWith(
                                createElementFromHTML(response.viewChild)
                            );
                        else
                            $("#filterAndSortMainData").append(
                                response.viewChild
                            );
                    }
                    $("#tableMain").html(response.view);
                },
            });
            $("#showFirstSort").html(element);
        });
    }
    $("#showFirstSort").html(json[0]);
}
function openFilterOrSort(index) {
    var filterOrSort = document.getElementsByClassName("filterOrSort");
    if (filterOrSort[index].classList.contains("hidden")) {
        filterOrSort[index].classList.remove("hidden");
    } else {
        filterOrSort[index].classList.add("hidden");
    }
}
function onChangeSearch(type, element) {
    $.ajax({
        method: "GET",
        url: "/admin/ProcessSearchAdmin",
        data: {
            type: type,
            valueSearch: element.value,
        },
        success: function (response) {
            $("#tableMain").html(response.view);
        },
    });
}
function onClickChangeCategory(key, name) {
    $.ajax({
        method: "GET",
        url: "/admin/ProcessClickLoadCategoryChild",
        data: {
            key: key,
        },
        success: function (response) {
            $("#categoryLoad").html(response.view);
            $("#modalCategorySelect").addClass("hidden");
            $("#contentView").html(name);
        },
    });
}
function openModalAddCategoryDetail(type) {
    document.getElementsByTagName("body")[0].classList.add("overflow-hidden");
    second.className += " fixed h-screen";
    $("#second").append(createElementFromHTML($("#myLoading").html()));
    $.ajax({
        method: "GET",
        url: "/admin/ProcessOpenModalAddCategoryDetail",
        data: {
            type: type,
        },
        success: function (response) {
            second.innerHTML = response.view;
        },
    });
}
function openModaEditCategoryDetail(type, ID) {
    document.getElementsByTagName("body")[0].classList.add("overflow-hidden");
    second.className += " fixed h-screen";
    $("#second").append(createElementFromHTML($("#myLoading").html()));
    $.ajax({
        method: "GET",
        url: "/admin/ProcessOpenModalEditCategoryDetail",
        data: {
            type: type,
            ID: ID,
        },
        success: function (response) {
            second.innerHTML = response.view;
        },
    });
}
function openModaDeleteCategoryDetail(type) {
    document.getElementsByTagName("body")[0].classList.add("overflow-hidden");
    second.className += " fixed h-screen";
    $("#second").append(createElementFromHTML($("#myLoading").html()));
    $.ajax({
        method: "GET",
        url: "/admin/ProcessOpenModalDeleteCategoryDetail",
        data: {
            type: type,
        },
        success: function (response) {
            second.innerHTML = response.view;
        },
    });
}
