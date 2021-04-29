function openNotifications(element) {
    if ($("#notifyModal").length === 0) {
        $("#modalHeaderRight").html("");
        $("#modalHeaderRight").html(
            createElementFromHTML($("#notifyLoading").html())
        );
        $.ajax({
            method: "GET",
            url: "/ProcessShowModalNotifications",
            success: function (response) {
                $("#modalHeaderRight").html(response);
                $.ajax({
                    method: "GET",
                    url: "/ProcessUpdateStateNotifications",
                    success: function (responses) {
                        $("#numNotification").html(responses);
                    },
                });
            },
        });
        $("#modalHeaderRight").removeClass("hidden");
        activeHeader(element, 1);
        findAcitveHeader(element);
    } else {
        $("#modalHeaderRight").html("");
        $("#modalHeaderRight").addClass("hidden");
        activeHeader(element, 0);
    }
}
function openMessenger(element) {
    if ($("#messengerModal").length === 0) {
        $("#modalHeaderRight").html("");
        $("#modalHeaderRight").append(
            createElementFromHTML($("#messengerLoading").html())
        );
        $.ajax({
            method: "GET",
            url: "/ProcessOpenMessenger",
            success: function (response) {
                $("#modalHeaderRight").html(response);
                $("#numMessager").html("");
            },
        });
        $("#modalHeaderRight").removeClass("hidden");
        activeHeader(element, 1);
        findAcitveHeader(element);
    } else {
        $("#modalHeaderRight").addClass("hidden");
        activeHeader(element, 0);
    }
}
function eModalHeaderRight(element) {
    if ($("#lastModal").length === 0) {
        $("#modalHeaderRight").html(
            createElementFromHTML($("#lastModalLoading").html())
        );
        $.ajax({
            method: "GET",
            url: "/ProcessModalLast",
            success: function (response) {
                $("#modalHeaderRight").html(response);
            },
        });
        findAcitveHeader(element);
        activeHeader(element, 1);
        $("#modalHeaderRight").removeClass("hidden");
    } else {
        $("#modalHeaderRight").html("");
        activeHeader(element, 0);
        $("#modalHeaderRight").addClass("hidden");
    }
}
function tickAllIsReaded(element) {
    $.ajax({
        method: "GET",
        url: "/ProcessTickAllIsRead",
        success: function (response) {
            console.log(response);
            $(".dotNotView")
                .map(function () {
                    this.remove();
                })
                .get();
        },
    });
}
function findAcitveHeader(ele) {
    var activeHeader = document.getElementsByClassName("activeHeader");
    for (let index = 0; index < activeHeader.length; index++) {
        const element = activeHeader[index];
        if (element === ele) {
            console.log(element);
        } else {
            element.classList.remove("text-blue-500");
            element.classList.remove("bg-blue-200");
            element.classList.add("dark:text-white");
            element.classList.add("bg-gray-200");
        }
    }
}
function activeHeader(element, state) {
    if (state === 0) {
        element.classList.remove("text-blue-500");
        element.classList.remove("bg-blue-200");
        element.classList.add("dark:text-white");
        element.classList.add("bg-gray-200");
        element.classList.remove("activeHeader");
    } else {
        element.classList.add("text-blue-500");
        element.classList.add("bg-blue-200");
        element.classList.remove("dark:text-white");
        element.classList.remove("bg-gray-200");
        element.classList.add("activeHeader");
    }
}
