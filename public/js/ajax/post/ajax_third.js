function loadUIEditPostMain(json) {
    $("#imagePost").html("");
    var edit = document.createElement("div");
    edit.classList =
        "w-24 absolute dark:text-white top-3 z-50 cursor-pointer left-4 p-1.5 bg-gray-200 rounded-lg dark:bg-dark-third text-center font-bold";
    edit.innerHTML = "Chỉnh sửa";
    edit.addEventListener("click", function () {
        $("#modal-one").hide();
        second.appendChild(editFileUploadMainEdit());
    });
    var arrayImageAndVideoPostEdit = new Array();
    for (let index = 0; index < json.length; index++) {
        arrayImageAndVideoPostEdit[index] = {
            Loai: 0,
            DuongDan: json[index].DuongDan,
            IDHinhAnh: json[index].ID,
        };
    }
    $("#imagePost").addClass("relative");
    $("#imagePost").append(edit);
    store.set("imageAndVideoPostEdit", arrayImageAndVideoPostEdit);
    console.log(json);
    for (var i = 0; i < json.length; i++) {
        var img;
        var div;
        if (
            checkTypeEditPostImgVidFirst(json[i]) === "MOV" ||
            checkTypeEditPostImgVidFirst(json[i]) === "MP4" ||
            checkTypeEditPostImgVidFirst(json[i]) === "mp4"
        ) {
            div = document.createElement("div");
            div.classList = "divImage relative flex justify-center";
            img = document.createElement("video");
            var divChilds = document.createElement("div");
            divChilds.classList =
                "bg-transparent cursor-pointer w-10 h-10 left-48% rounded-full flex justify-center absolute top-45per ml-5 ";
            var iChilds = document.createElement("i");
            iChilds.classList =
                "far fa-play-circle text-4xl flex items-center text-white";
            divChilds.appendChild(iChilds);
            div.appendChild(divChilds);
        } else {
            div = document.createElement("div");
            div.classList = "divImage relative";
            img = document.createElement("img");
            img.style.objectFit = "cover";
        }
        if (json.length <= 1) {
            div.className = "w-full";
            img.className = "w-full";
            img.src = json[i].DuongDan;
            div.appendChild(img);
            $("#imagePost").append(div);
        } else {
            img.className = "p-1 object-cover";
            div.style.width = "232px";
            div.style.height = "250px";
            img.style.width = "241px";
            img.style.height = "248px";
            img.src = json[i].DuongDan;
            div.appendChild(img);
            $("#imagePost").append(div);
            if (json.length > 4 && i == 3) {
                var divs = document.createElement("div");
                divs.className = "relative";
                var span = document.createElement("span");
                var num = json.length - 4;
                span.innerHTML = "+ " + num;
                span.className =
                    "text-3xl font-bold absolute top-1/2 left-1/2 text-white";
                span.style.transform = "translate(-50%,-50%)";
                divs.appendChild(span);
                divs.style.width = "224px";
                divs.style.height = "239px";
                divs.style.background = "rgba(0, 0, 0, 0.5)";
                divs.className = "absolute bottom-2 right-4";
                $("#imagePost").append(divs);
                break;
            }
        }
    }
}
function checkTypeEditPostImgVid(arr) {
    if (arr.Loai === 1) return arr.DuongDan.name.split(".")[1];
    else return arr.DuongDan.substr(arr.DuongDan.length - 4);
}
function checkTypeEditPostImgVidFirst(arr) {
    return arr.DuongDan.substr(arr.DuongDan.length - 3);
}
function returnUrlImageVideoEdit(arr) {
    if (arr.Loai === 1) return URL.createObjectURL(arr.DuongDan);
    else return arr.DuongDan;
}
function loadUIPostMainEdit(arr) {
    var edit = document.createElement("div");
    edit.classList =
        "w-24 absolute dark:text-white top-3 z-50 cursor-pointer left-4 p-1.5 bg-gray-200 rounded-lg dark:bg-dark-third text-center font-bold";
    edit.innerHTML = "Chỉnh sửa";
    edit.addEventListener("click", function () {
        $("#modal-one").hide();
        second.appendChild(editFileUploadMainEdit());
    });
    document.getElementById("imagePost").innerHTML = "";
    for (var i = 0; i < arr.length; i++) {
        var data;
        var div;
        if (
            checkTypeEditPostImgVid(arr[i]) === "MOV" ||
            checkTypeEditPostImgVid(arr[i]) === "MP4" ||
            checkTypeEditPostImgVid(arr[i]) === "mp4" ||
            checkTypeEditPostImgVidFirst(arr[i]) === "MOV" ||
            checkTypeEditPostImgVidFirst(arr[i]) === "MP4" ||
            checkTypeEditPostImgVidFirst(arr[i]) === "mp4"
        ) {
            div = document.createElement("div");
            div.classList = "divImage relative flex justify-center";
            data = document.createElement("video");
            var divChilds = document.createElement("div");
            divChilds.classList =
                "bg-transparent cursor-pointer w-10 h-10 left-48% rounded-full flex justify-center absolute top-45per ml-5 ";
            var iChilds = document.createElement("i");
            iChilds.classList =
                "far fa-play-circle text-4xl flex items-center text-white";
            divChilds.appendChild(iChilds);
            div.appendChild(divChilds);
        } else {
            div = document.createElement("div");
            div.classList = "divImage relative";
            data = document.createElement("img");
            data.style.objectFit = "cover";
        }
        if (arr.length <= 1) {
            div.className = "w-full";
            data.className = "w-full";
            data.src = returnUrlImageVideoEdit(arr[i]);
            div.appendChild(data);
            $("#imagePost").append(div);
        } else {
            data.className = "p-1 object-cover";
            div.style.width = "232px";
            div.style.height = "250px";
            data.style.width = "241px";
            data.style.height = "248px";
            data.src = returnUrlImageVideoEdit(arr[i]);
            div.appendChild(data);
            $("#imagePost").append(div);
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
                $("#imagePost").append(divs);
                break;
            }
        }
    }
    document.getElementById("imagePost").classList.add("relative");
    $("#imagePost").append(edit);
}
function editFileUploadMainEdit() {
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
    var array = store.get("imageAndVideoPostEdit");
    if (array.length <= 0) divContent.append(endImageVideo());
    else addImageVideoEdit(0, array, divContent);
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
        var indexs = store.get("imageAndVideoPostEdit").length;
        var array = store.get("imageAndVideoPostEdit");
        for (let index = 0; index < arr.length; index++) {
            array[indexs] = {
                Loai: 1,
                DuongDan: arr[index],
            };
            indexs++;
        }
        var newArr = new Array();
        for (let index = 0; index < arr.length; index++) {
            const element = arr[index];
            newArr[index] = {
                Loai: 1,
                DuongDan: element,
            };
        }
        addImageVideoEdit(indexs, newArr, divContent);
        store.set("imageAndVideoPostEdit", array);
        divContent.scrollTop = divContent.scrollHeight;
        loadUIPostMainEdit(array);
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
function addImageVideoEdit(indexMain, array, divContent) {
    for (let index = 0; index < array.length; index++) {
        const element = array[index];
        var url = element.DuongDan;
        var divChild = document.createElement("div");
        var data;
        if (
            checkTypeEditPostImgVid(element) === "MOV" ||
            checkTypeEditPostImgVid(element) === "MP4" ||
            checkTypeEditPostImgVid(element) === "mp4" ||
            checkTypeEditPostImgVidFirst(element) === "MOV" ||
            checkTypeEditPostImgVidFirst(element) === "MP4" ||
            checkTypeEditPostImgVidFirst(element) === "mp4"
        ) {
            var videoChild = document.createElement("video");
            videoChild.setAttribute("src", returnUrlImageVideoEdit(element));
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
            imgChild.setAttribute("src", returnUrlImageVideoEdit(element));
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
            var newArray = store.get("imageAndVideoPostEdit");
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
            loadUIPostMainEdit(newArray);
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
function changeUploadFileEdit(el) {
    document.getElementById("imagePost").innerHTML = "";
    store.set("imageAndVideoPostEdit", new Array());
    var files = el.files;
    var arr = Array.from(files);
    var array = store.get("imageAndVideoPostEdit");
    var edit = document.createElement("div");
    edit.classList =
        "w-24 absolute dark:text-white top-3 z-50 cursor-pointer left-4 p-1.5 bg-gray-200 rounded-lg dark:bg-dark-third text-center font-bold";
    edit.innerHTML = "Chỉnh sửa";
    edit.addEventListener("click", function () {
        $("#modal-one").hide();
        second.appendChild(editFileUploadMainEdit());
    });
    loadUIPostMainEdit(arr);
    document.getElementById("imagePost").classList.add("relative");
    $("#imagePost").append(edit);
    for (let index = 0; index < arr.length; index++) {
        array[index] = arr[index];
    }
    store.get("arrayImageAndVideoEdit", array);
}
function EditPostMain(IDTaiKhoan, IDBaiDang) {
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
    var array = store.get("imageAndVideoPostEdit");
    var countAdd = 0;
    var countIsset = 0;
    var newArray = new Array();
    for (let index = 0; index < array.length; index++) {
        if (array[index].Loai === 1) {
            formData.append("files_" + countAdd, array[index].DuongDan);
            countAdd++;
        } else {
            newArray[countIsset] = array[index];
            countIsset++;
        }
    }
    formData.append("fileIsset", JSON.stringify(newArray));
    formData.append("numberImage", countAdd);
    formData.append("IDBaiDang", IDBaiDang);
    $.ajax({
        method: "POST",
        url: "/ProcessEditPost",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            $("#" + IDTaiKhoan + IDBaiDang + "Main").replaceWith(response.view);
            document
                .getElementsByTagName("body")[0]
                .classList.remove("overflow-hidden");
            second.innerHTML = "";
            second.classList.remove("fixed");
            second.classList.remove("h-screen");
            store.set("imageAndVideoPost", new Array());
        },
    });
}
