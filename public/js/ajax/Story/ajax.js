function wraptext(text) {
    var data = "";
    var num = Math.round(text.length / 25 + 1);
    for (var j = 0; j <= num; j++) {
        data += text.substring((j == 0 || j == 1 ? 1 : j) * 25,
            (j == 0 ? 0 : (j + 1)) * 25) + "@";
    }
    return data;
}
function createStory(text,color) {
    var canvas = document.getElementById("myCanvas");
    var context = canvas.getContext("2d");
    context.drawImage(document.getElementById('myImage'), 0, 0, 345, 612);
    context.font = "20pt Tahoma";
    context.fillStyle = color;
    context.textAlign = "center";
    var arr = wraptext(text).split('@');
    for (var index = 0; index < arr.length; index++) {
        context.fillText(arr[index], 172, ((canvas.height / 2) - ((arr.length * 28) / 2)) + (index + 1) * 28);
        context.fillStyle = color;
    }
}
function changeColorContent(color) {
    changeTexts(color);
    document.getElementsByClassName('content-story-text')[0].style.color = color;
    createStory(document.getElementsByClassName("place-type")[0].value,color);
}
function changeTexts(color) {
    color = color ==  '' ? 'white' : color;
    createStory(document.getElementsByClassName("place-type")[0].value,color);
    document.getElementsByClassName("content-story-text")[0].innerText = document.getElementsByClassName("place-type")[0].value;
}
function clickChangeBackground(IDPhongNen, DuongDanPN) {
    $('#myImage').attr('src', '/' + DuongDanPN);
    $('#IDPhongNen').val(IDPhongNen);
}
function getLiHaveShowLi() {
    var parent = $('#storyView').children();
    for (var i = 0; i < parent.length; i++) {
        if (parent[i].classList.contains('showLi'))
            return parent[i];
    }
}
function changeStoryImage(element, index) {
    var el = getLiHaveShowLi();
    document.getElementById('storyView').scrollLeft = document.getElementById('storyView').scrollLeft + 128
    if (el == element) {

    }
    else {
        el.classList.remove('showLi')
        el.classList.remove('mr-2')
        el.childNodes[1].classList.add('p-2')
        el.childNodes[1].classList.add('opacity-40')
        element.classList.add('showLi')
        element.childNodes[1].classList.remove('p-2')
        element.childNodes[1].classList.remove('opacity-40')
    }
}
function playMusicDemoStory(url) {
    $('#myAudio').attr('src','/' + url);
    document.getElementById('myAudio').play();
}
function chooseMusic(ID) {
    $('#IDAmThanh').attr('value',ID);
}
