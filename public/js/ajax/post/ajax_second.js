function changeUploadFiles(el) {
    document.getElementById("imagePost").innerHTML = "";
    store.set("imageAndVideoPost", new Array());
    var files = el.files;
    var arr = Array.from(files);
    var array = store.get("imageAndVideoPost");
    var edit = document.createElement("div");
    edit.classList =
        "w-24 absolute dark:text-white top-3 z-50 cursor-pointer left-4 p-1.5 bg-gray-200 rounded-lg dark:bg-dark-third text-center font-bold";
    edit.innerHTML = "Chỉnh sửa";
    edit.addEventListener("click", function () {
        $("#modal-one").hide();
        second.appendChild(editFileUplopad());
    });
    loadUICreatePostMain(arr);
    document.getElementById("imagePost").classList.add("relative");
    document.getElementById("imagePost").appendChild(edit);
    for (let index = 0; index < arr.length; index++) {
        array[index] = arr[index];
    }
    store.get("arrayImageAndVideo", array);
}
function changeUploadFileMain(el, type) {
    document.getElementsByTagName("body")[0].classList.add("overflow-hidden");
    second.className += " fixed h-screen";
    $("#second").append(createElementFromHTML($("#myLoading").html()));
    $.ajax({
        method: "GET",
        url: "ProcessOpenPostDialog",
        data: {
            type: type,
        },
        success: function (response) {
            second.innerHTML = response;
            new MeteorEmoji(
                document.getElementById("textarea-post"),
                document.getElementById("myTriggers"),
                document.getElementById("myEmojis")
            );
            $("#placeSelection").prepend(el);
            changeUploadFiles(el);
        },
    });
}
function loadUICreatePostMain1(arr) {
    document.getElementById("imagePost").innerHTML = "";
    for (var i = 0; i < arr.length; i++) {
        var div = document.createElement("div");
        div.classList = "divImage relative";
        var img = document.createElement("img");
        img.style.objectFit = "cover";
        if (arr.length <= 1) {
            div.className = "w-full";
            img.className = "w-full";
            img.src = URL.createObjectURL(arr[i]);
            div.appendChild(img);
            document.getElementById("imagePost").appendChild(div);
        } else {
            img.className = "p-1 object-cover";
            div.style.width = "232px";
            div.style.height = "250px";
            img.style.width = "241px";
            img.style.height = "248px";
            img.src = URL.createObjectURL(arr[i]);
            div.appendChild(img);
            document.getElementById("imagePost").appendChild(div);
            if (arr.length > 4 && i == 3) {
                var divs = document.createElement("div");
                divs.className = "relative";
                var span = document.createElement("span");
                var num = arr.length - 4;
                span.innerHTML = "+ " + num;
                span.className =
                    "text-3xl font-bold absolute top-1/2 left-1/2 text-white";
                span.style.transform = "translate(-50%,-50%)";
                divs.appendChild(span);
                divs.style.width = "224px";
                divs.style.height = "239px";
                divs.style.background = "rgba(0, 0, 0, 0.5)";
                divs.className = "absolute bottom-2 right-4";
                document.getElementById("imagePost").appendChild(divs);
                break;
            }
        }
    }
}
function loadUICreatePostMain(arr) {
    document.getElementById("imagePost").innerHTML = "";
    for (var i = 0; i < arr.length; i++) {
        var data;
        var div;
        if (
            arr[i].name.split(".")[1] == "MOV" ||
            arr[i].name.split(".")[1] == "MP4"
        ) {
            div = document.createElement("div");
            div.classList = "divImage relative flex justify-center";
            data = document.createElement("video");
            var divChilds = document.createElement("div");
            divChilds.classList =
                "bg-transparent cursor-pointer w-10 h-10 left-44% rounded-full flex justify-center absolute top-45per ml-5 ";
            var iChilds = document.createElement("i");
            iChilds.classList =
                "far fa-play-circle text-4xl flex items-center text-white";
            divChilds.appendChild(iChilds);
            div.appendChild(divChilds);
            capture(URL.createObjectURL(arr[i]), data);
        } else {
            div = document.createElement("div");
            div.classList = "divImage relative";
            data = document.createElement("img");
            data.style.objectFit = "cover";
        }
        if (arr.length <= 1) {
            div.className = "w-full";
            data.className = "w-full";
            div.appendChild(data);
            data.src = URL.createObjectURL(arr[i]);
            document.getElementById("imagePost").appendChild(div);
        } else {
            data.className = "p-1 object-cover";
            div.style.width = "232px";
            div.style.height = "250px";
            data.style.width = "241px";
            data.style.height = "248px";
            data.src = URL.createObjectURL(arr[i]);
            div.appendChild(data);
            document.getElementById("imagePost").appendChild(div);
            if (arr.length > 4 && i == 3) {
                var divs = document.createElement("div");
                divs.className = "relative";
                var span = document.createElement("span");
                var num = arr.length - 4;
                span.innerHTML = "+ " + num;
                span.className =
                    "text-3xl font-bold absolute top-1/2 left-1/2 text-white";
                span.style.transform = "translate(-50%,-50%)";
                divs.appendChild(span);
                divs.style.width = "224px";
                divs.style.height = "239px";
                divs.style.background = "rgba(0, 0, 0, 0.5)";
                divs.className = "absolute bottom-2 right-4";
                document.getElementById("imagePost").appendChild(divs);
                break;
            }
        }
    }
}
function addEdit() {
    var edit = document.createElement("div");
    edit.classList =
        "w-24 absolute dark:text-white top-3 z-50 cursor-pointer left-4 p-1.5 bg-gray-200 rounded-lg dark:bg-dark-third text-center font-bold";
    edit.innerHTML = "Chỉnh sửa";
    edit.addEventListener("click", function () {
        $("#modal-one").hide();
        second.appendChild(editFileUplopad());
    });
    document.getElementById("imagePost").classList.add("relative");
    document.getElementById("imagePost").appendChild(edit);
}
function editFileUplopad() {
    var divMain = document.createElement("div");
    divMain.classList =
        "shadow-sm border border-solid border-gray-500 py-3 pl-1.5 pr-1.5 pt-0 " +
        " bg-white w-full fixed z-50 top-1/2 left-1/2 dark:bg-dark-second rounded-lg " +
        " sm:w-10/12 md:w-2/3 lg:w-2/3 xl:w-1/3 z-30";
    divMain.style.transform = "translate(-50%,-50%)";
    divMain.id = "modal-two";
    divMain.innerHTML =
        '<div class="w-full text-center relative"> ' +
        ' <p class="text-xl text-gray-900 font-bold p-2.5 dark:text-white">Ảnh/Video</p> ' +
        ' <span onclick="returnCreatePost()" class="p-2 rounded-full cursor-pointer absolute top-0.5 left-2"> ' +
        " <i class='bx bxs-left-arrow-alt text-3xl dark:text-white'></i></span><hr> </div>'";
    var divContent = document.createElement("div");
    divContent.classList = "w-full py-3 wrapper-content-right overflow-y-auto";
    divContent.style.maxHeight = "576px";
    divMain.append(divContent);
    var array = store.get("imageAndVideoPost");
    if (array.length <= 0) divContent.append(endImageVideo());
    else addImageVideoContinues(0, array, divContent);
    var divFooter = document.createElement("div");
    divFooter.classList = "w-full flex justify-end mr-1";
    var ulFooter = document.createElement("ul");
    ulFooter.classList = "w-8/12 flex justify-end mr-3";
    var inputFileAdd = document.createElement("input");
    inputFileAdd.setAttribute("type", "file");
    inputFileAdd.setAttribute("name", "myFile[]");
    inputFileAdd.setAttribute("class", "hidden");
    inputFileAdd.setAttribute("id", "inputFileAddImageVideo");
    inputFileAdd.setAttribute("multiple", "multiple");
    var labelLiFooterLeft = document.createElement("label");
    labelLiFooterLeft.setAttribute("for", "inputFileAddImageVideo");
    var liFooterLeft = document.createElement("li");
    liFooterLeft.classList =
        " w-7/2 mr-4 text-center flex py-2 text-blue-500 font-bold cursor-pointer ";
    liFooterLeft.innerHTML =
        "<span class='flex items-center'><i class='bx bxs-file-plus text-3xl '></i>" +
        " &nbsp;&nbsp;Thêm ảnh/video</span>";
    labelLiFooterLeft.appendChild(liFooterLeft);
    ulFooter.appendChild(inputFileAdd);
    inputFileAdd.addEventListener("change", function () {
        var files = this.files;
        var arr = Array.from(files);
        var indexs = store.get("imageAndVideoPost").length;
        var array = store.get("imageAndVideoPost");
        addImageVideoContinues(indexs, arr, divContent);
        for (let index = 0; index < arr.length; index++) {
            array[indexs] = arr[index];
            indexs++;
        }
        store.set("imageAndVideoPost", array);
        divContent.scrollTop = divContent.scrollHeight;
        loadUICreatePostMain(array);
        addEdit();
    });
    var liFooterRight = document.createElement("li");
    liFooterRight.innerHTML =
        '<button class="px-6 py-2 rounded-lg bg-blue-500 text-white ' +
        'font-bold">Xong</button>';
    liFooterRight.classList = "w-5/2 text-center py-2 cursor-pointer";
    liFooterRight.addEventListener("click", function () {
        returnCreatePost();
    });
    ulFooter.append(labelLiFooterLeft);
    ulFooter.append(liFooterRight);
    divFooter.append(ulFooter);
    divMain.append(divFooter);
    return divMain;
}
function endImageVideo() {
    var div = document.createElement("div");
    div.classList = " w-full text-center h-40 py-2 ";
    div.innerHTML =
        '<svg class="mx-auto w-24 h-24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 112 112"> ' +
        "<defs>" +
        '<clipPath id="a">' +
        '<rect width="81.38" height="68.11" x="12.34" y="18.4" fill="none" rx="6.69"/>' +
        "</clipPath>" +
        "</defs>" +
        '<rect width="81.38" height="68.11" x="20.91" y="27.89" fill="#7a7d81" rx="6.69"/>' +
        '<g clip-path="url(#a)">' +
        '<rect width="81.38" height="68.11" x="12.34" y="18.4" fill="#bcc0c4" rx="6.69"/>' +
        '<path fill="#fff" d="M7.44 89.57l32.5-42.76 13.09 13.04 27.89-31.9 21.42 27.71 1.06 37.49H8.5l-1.06-3.58z"/>' +
        "</g>" +
        '<circle cx="27.57" cy="35.69" r="6.65" fill="#1876f2"/>' +
        "</svg>";
    var p = document.createElement("p");
    p.classList = "font-bold text-gray-500 text-center";
    p.innerHTML = "Thêm ảnh/video để bắt đầu";
    div.append(p);
    return div;
}
function addImageVideoContinues(indexMain, array, divContent) {
    for (let index = 0; index < array.length; index++) {
        const element = array[index];
        var url = URL.createObjectURL(element);
        var divChild = document.createElement("div");
        var data;
        if (
            array[index].name.split(".")[1] == "MOV" ||
            array[index].name.split(".")[1] == "MP4"
        ) {
            var videoChild = document.createElement("video");
            videoChild.setAttribute("src", url);
            videoChild.setAttribute(
                "class",
                "max-w-full mx-auto h-52 object-cover"
            );
            var divChilds = document.createElement("div");
            divChilds.classList =
                "bg-transparent cursor-pointer z-50 w-10 h-10 left-48% rounded-full flex justify-center absolute top-45per ml-5 ";
            divChilds.style.transform = "translate(-50%, -28%)";
            var iChilds = document.createElement("i");
            iChilds.classList =
                "far fa-play-circle text-4xl flex items-center text-white";
            divChilds.appendChild(iChilds);
            divChild.appendChild(divChilds);
            data = videoChild;
            divChilds.setAttribute("url", url);
            divChilds.id = "file_" + index;
            divChilds.addEventListener("click", function () {
                $.ajax({
                    method: "GET",
                    url: "/ProcessPreviewBeforeUploadFile",
                    data: {
                        url: this.getAttribute("url"),
                        type: "video",
                    },
                    success: function (response) {
                        $("#modal-two").hide();
                        $("#second").append(response.view);
                        $("#modal-three").show();
                    },
                });
            });
        } else {
            var imgChild = document.createElement("img");
            imgChild.setAttribute("src", url);
            imgChild.setAttribute(
                "class",
                "max-w-full mx-auto h-52 object-cover"
            );
            data = imgChild;
        }
        divChild.classList =
            "w-full text-center bg-gray-100 dark:bg-dark-second  relative";
        var spanChild = document.createElement("span");
        spanChild.classList =
            "font-bold text-xl absolute top-2 right-2  px-2 " +
            " rounded-full bg-gray-300 dark:bg-dark-third cursor-pointer dark:text-white " +
            "closeTimeImgVid";
        spanChild.setAttribute("data-index", indexMain);
        spanChild.innerHTML = "&times;";
        spanChild.addEventListener("click", function () {
            this.parentElement.parentElement.remove();
            var newArray = store.get("imageAndVideoPost");
            newArray = removeElement(
                newArray,
                newArray[this.getAttribute("data-index")]
            );
            var s = document.getElementsByClassName("closeTimeImgVid");
            for (let indexs = 0; indexs < s.length; indexs++) {
                const elements = s[indexs];
                elements.setAttribute("data-index", indexs);
            }
            if (newArray.length == 0) divContent.append(endImageVideo());
            store.set("imageAndVideoPost", newArray);
            loadUICreatePostMain(newArray);
            addEdit();
        });
        var input = document.createElement("input");
        input.classList =
            "w-full my-2 p-3 border-2 border-solid border-gray-200 " +
            " dark:bg-dark-third dark:border-dark-main shadow-lg dark:text-white " +
            " resize-none outline-none rounded-lg border-blue-500 ";
        input.setAttribute("placeHolder", "Chú thích");
        var divParent = document.createElement("div");
        divParent.classList = "w-full";
        divChild.appendChild(data);
        divChild.appendChild(spanChild);
        divParent.appendChild(divChild);
        divParent.appendChild(input);
        divContent.appendChild(divParent);
        indexMain++;
    }
}
function postFiles() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $("#button-post").html("");
    $("#button-post").prop("disabled", true);
    $("#button-post").css("cursor", "not-allowed");
    $("#button-post").append('<i class="fas fa-cog fa-spin text-xl"></i>');
    let formData = new FormData($("#formPost")[0]);
    var array = store.get("imageAndVideoPost");
    for (let index = 0; index < array.length; index++) {
        formData.append("files_" + index, array[index]);
    }
    formData.append("numberImage", array.length);

    $.ajax({
        method: "POST",
        url: "/ProcessPostNormal",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            document
                .getElementsByTagName("body")[0]
                .classList.remove("overflow-hidden");
            second.innerHTML = "";
            second.classList.remove("fixed");
            second.classList.remove("h-screen");
            $("#show__post").prepend(response.view);
            store.set("imageAndVideoPost", new Array());
        },
    });
}
function FeelPost(nameID, loaiCamXuc) {
    $.ajax({
        method: "GET",
        url: "/ProcessFeelPost",
        data: {
            IDBaiDang: nameID,
            LoaiCamXuc: loaiCamXuc,
        },
        success: function (response) {
            $("#" + nameID).html(response);
        },
    });
    $.ajax({
        method: "GET",
        url: "/ProcessViewFeelPost",
        data: {
            IDBaiDang: nameID,
            LoaiCamXuc: loaiCamXuc,
        },
        success: function (response) {
            $("#" + nameID + "post").html(response);
        },
    });
}
function returnCreatePosts(first, second) {
    $("#" + first).show();
    $("#" + second).remove();
}
function returnCreatePost() {
    $("#modal-one").show();
    $("#modal-two").remove();
}
function capture(url, data) {
    var canvas = document.createElement("canvas");
    var video = document.createElement("video");
    video.src = url;
    video.currentTime = 3;
    setTimeout(() => {
        var context = canvas.getContext("2d");
        context.drawImage(video, 0, 0, data.videoWidth, data.videoHeight);
        return canvas.toDataURL("image/png");
    }, 500);
}
