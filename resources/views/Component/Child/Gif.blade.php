<input type="text" class="ml-2.5 w-11/12 mx-auto dark:border-dark-second 
    border-gray-200 border-solid border-2 my-1
    px-2.5 py-2 rounded-3xl dark:bg-dark-third " placeholder="Tìm kiếm">
<div class="w-full h-72 py-2 overflow-y-auto flex flex-wrap
wrapper-content-right px-2" style="max-height: 348px;" id="gifMain">

</div>
<script>
    var xhr = $.get("https://api.giphy.com/v1/gifs/search?api_key=HJsBIegcLMTaOmm57ToYEZYEQdFqKPzT&limit=10&q=data");
    xhr.done(function(res) {
        for (let index = 0; index < res.data.length; index++) {
            var img = document.createElement('img')
            img.setAttribute('src', res.data[index].images.original.url);
            img.style.width = '100%';
            img.style.height = '150px';
            img.style.margin = '8px 0px';
            document.getElementById('gifMain').appendChild(img);
        }
    });
</script>