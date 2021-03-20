function wraptext(text) {
    var data = "";
    var num = Math.round(text.length / 25 + 1);
    for (var j = 0; j <= num; j++) {
        data += text.substring((j == 0 || j == 1 ? 1 : j) * 25,
            (j == 0 ? 0 : (j + 1)) * 25) + "@";
    }
    return data;
}
function createStory(text) {
    var canvas = document.getElementById("myCanvas");
    var context = canvas.getContext("2d");
    context.drawImage(document.getElementById('myImage'), 0, 0, 345, 612);
    context.font = "20pt Tahoma";
    context.fillStyle = "white";
    context.textAlign = "center";
    var arr = wraptext(text).split('@');
    for (var index = 0; index < arr.length; index++) {
        context.fillText(arr[index], 172, ((canvas.height / 2) - ((arr.length * 28) / 2)) + (index + 1) * 28);
        context.fillStyle = 'white';
    }
}
function display() {
    var heightScreen = header.clientHeight;
    document.getElementsByClassName("preview")[0].style.height = heightScreen - 64 + "px";
}

function changeTexts() {
    createStory(document.getElementsByClassName("place-type")[0].value)
    document.getElementsByClassName("content-story-text")[0].innerText = document.getElementsByClassName("place-type")[0].value;
}
display();
function clickChangeBackground(IDPhongNen, DuongDanPN) {
    $('#myImage').attr('src', '/' + DuongDanPN);
    $('#IDPhongNen').val(IDPhongNen);
}
