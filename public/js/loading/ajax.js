function loadingPost(indexPost) {
    $.ajax({
        method: "GET",
        url: "/ProcessLoadingPost",
        data: {
            indexPost: $("#indexPost").val(),
        },
        success: function (response) {
            setTimeout(function () {
                $("#indexPost").remove();
                $(".removeTimeline").remove();
                if (response === "") {
                } else {
                    $(".timeline").append(response);
                    action = "inactive";
                }
            }, 1000);
        },
    });
}
function loadingPostProfile(indexPost, IDTaiKhoan) {
    $.ajax({
        method: "GET",
        url: "/ProcessLoadingPostProfile",
        data: {
            indexPost: $("#indexPost").val(),
            IDTaiKhoan: IDTaiKhoan,
        },
        success: function (response) {
            setTimeout(function () {
                $("#indexPost").remove();
                $(".removeTimeline").remove();
                if (response === "") {
                } else {
                    $(".timeline").append(response);
                    action = "inactive";
                }
            }, 1000);
        },
    });
}
function loading() {
    $.ajax({
        method: "GET",
        url: "/ProcessLoading",
        success: function (response) {
            $(".timeline").append(response);
        },
    });
}
function createLoadingComment() {
    let user = userJson;
    //div Main
    let divMain = document.createElement("div");
    divMain.classList = "w-full mx-0 flex my-2";
    divMain.id = "loadingCommentElement";
    //div Main
    //div Left
    let divLeft = document.createElement("div");
    divLeft.classList = "w-1/12 pt-2";
    let image = document.createElement("img");
    image.classList = "w-12 h-12 p-0.5 object-cover rounded-full";
    image.src = user.AnhDaiDien;
    //div Left
    //div Right
    let divRight = document.createElement("div");
    divRight.classList = "w-11/12 ml-2 relative main-comment";
    let divRightChildren = document.createElement("div");
    divRightChildren.classList = "comment-per w-max p-2 relative rounded-lg";
    divRightChildren.style.maxWidth = "91%";
    let pRightOne = document.createElement("p");
    pRightOne.classList = "font-bold dark:text-white";
    pRightOne.innerHTML = user.Ho + " " + user.Ten;
    let pRightTwo = document.createElement("p");
    pRightTwo.classList = "dark:text-white clear-both text-base";
    pRightTwo.style.wordWrap = "break-word";
    let ulRight = document.createElement("ul");
    ulRight.classList = "flex pl-2";
    let liRightOne = document.createElement("li");
    let liRightTwo = document.createElement("li");
    let liRightThree = document.createElement("li");
    liRightOne.classList =
        "relative feels font-bold text-sm py-1 pr-2 cursor-pointer dark:text-white";
    liRightOne.innerHTML = "Thích";
    ulRight.append(liRightOne);
    liRightTwo.classList =
        "font-bold text-sm py-1 pr-2 cursor-pointer dark:text-white";
    liRightTwo.innerHTML = "Trả lời";
    ulRight.append(liRightTwo);
    liRightThree.classList =
        "py-1 pr-2 cursor-pointer dark:text-white font-bold text-xs";
    liRightThree.innerHTML = "Vừa xong";
    ulRight.append(liRightThree);
    //div Right
    divMain.append(divLeft);
    divLeft.append(image);
    divMain.append(divRight);
    divRight.append(divRightChildren);
    divRightChildren.append(pRightOne);
    divRightChildren.append(pRightTwo);
    divRight.append(ulRight);
    return divMain;
}
function createLoadingChat(IDNhomTinNhan, IDNguoiNhan, TypeGroupMessage) {
    let divMain = document.createElement("div");
    divMain.id = "loadingChatElement" + IDNhomTinNhan;
    divMain.classList = "w-full py-1 flex relative";
    let divLeft = document.createElement("div");
    divLeft.classList = "mess-user-r1 pl-2 flex mr-4";
    divLeft.style.width = "inherit";
    let divLeftChildren = document.createElement("div");
    divLeftChildren.classList =
        "mess-right relative break-all ml-auto border-none outline-none p-1.5 " +
        " rounded-lg relative text-white ";
    let divRight = document.createElement("div");
    divRight.classList = "mess-user-r2 mess-user-r2";
    divRight.style.width = "4%";
    let divRightChildren = document.createElement("div");
    divRightChildren.classList = "w-full clear-both";
    var divRightChildrenTagI = document.createElement("i");
    divRightChildrenTagI.classList =
        "bx bx-circle  img-mess-right absolute bottom-1.5 text-gray-300";
    divMain.append(divLeft);
    divMain.append(divRight);
    switch (TypeGroupMessage) {
        case 0:
            divLeftChildren.classList.add("mess-right-child-" + IDNhomTinNhan);
            divLeftChildren.innerHTML = $(
                "#" + IDNguoiNhan + "PlaceTypeText"
            ).html();
            break;
        case 1:
            let ulDivLeftChildren1 = document.createElement("div");
            ulDivLeftChildren1.classList = "w-20 my-1";
            let liOfulDivLeftChildren1 = document.createElement("li");
            liOfulDivLeftChildren1.classList = "w-full";
            let liOfulDivLeftChildrenChildren1 = document.createElement("div");
            liOfulDivLeftChildrenChildren1.classList =
                "w-20 z-0 h-20 max-w-20 max-h-20 p-1 bg-gray-200 dark:bg-dark-third";
            liOfulDivLeftChildren1.append(liOfulDivLeftChildrenChildren1);
            ulDivLeftChildren1.append(liOfulDivLeftChildren1);
            divLeftChildren.append(ulDivLeftChildren1);
            break;
        case 2:
            let ulDivLeftChildren2 = document.createElement("div");
            ulDivLeftChildren2.classList = "w-20 my-1";
            let liOfulDivLeftChildren2 = document.createElement("li");
            liOfulDivLeftChildren2.classList = "w-full";
            let liOfulDivLeftChildrenChildren2 = document.createElement("div");
            liOfulDivLeftChildrenChildren2.classList =
                "w-20 z-0 h-20 max-w-20 max-h-20 p-1 bg-gray-200 dark:bg-dark-third";
            liOfulDivLeftChildren2.append(liOfulDivLeftChildrenChildren2);
            ulDivLeftChildren2.append(liOfulDivLeftChildren2);
            divLeftChildren.append(ulDivLeftChildren2);
            break;
    }
    divLeft.append(divLeftChildren);
    divRight.append(divRightChildren);
    divRightChildren.append(divRightChildrenTagI);
    return divMain;
}
