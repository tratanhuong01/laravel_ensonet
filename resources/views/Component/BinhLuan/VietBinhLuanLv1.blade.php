<div class="w-full mx-0 my-2 flex relative">
    <div class="w-1/12">
        <a href=""><img class="w-12 h-12 p-0.5 object-cover
        rounded-full border-2 border-solid" src="/{{ Session::get('user')[0]->AnhDaiDien }}" alt="" srcset=""></a>
    </div>
    <div class="w-11/12 ml-2 relative bg-gray-100 dark:bg-dark-third px-3 overflow-hidden" style="border-radius: 30px;">
        <div onkeyup="CommentPost('{{$item[0]->IDTaiKhoan}}',
        '{{$item[0]->IDBaiDang}}',event)" id="{{ $item[0]->IDTaiKhoan.$item[0]->IDBaiDang }}Write" class="border-none outline-none bg-gray-100 dark:bg-dark-third dark:text-white py-3" style="min-height: 30px;width: 96%;" contenteditable>
            Viết bình luận....
        </div>
        <script>
            $("#{{ $item[0]->IDTaiKhoan.$item[0]->IDBaiDang }}Write").keypress(function(e) {
                return e.which != 13;
            });
        </script>
        <ul class="flex absolute bottom-1 right-0">
            <li class="py-2 pr-3 cursor-pointer">
                <i class="far fa-smile dark:text-white text-gray-600"></i>
            </li>
            <li class="py-2 pr-3 cursor-pointer">
                <input onchange="" name="" type="file" accept="image" id="fileImagess" style="display: none" enctype="multipart/form-data">
                <label for="fileImagess">
                    <i class="fas fa-camera dark:text-white text-gray-600"></i>
                </label>
            </li>
            <li onclick="openGifComment('','',event)" class="py-2 pr-3 cursor-pointer">
                <i class="fas fa-radiation dark:text-white text-gray-600"></i>
            </li>
            <li onclick="openStickerComment('','',event)" class="py-2 pr-3 cursor-pointer">
                <i class="far fa-sticky-note dark:text-white text-gray-600"></i>
            </li>

        </ul>
    </div>
    <div id="modalComment" class="z-50 hidden absolute right-0 bg-white my-2 absolute w-72 dark:border-dark-second 
    shadow-lg border-gray-300 p-1 border-2 border-solid rounded-lg dark:bg-dark-second" style="max-height: 365px;height: 360px;">
    </div>
</div>
<div class="w-full">
    <div class="w-10/12 ml-16 mt-5">
        <img src="/img/avatarImage/100000000120000001473000000132.jpg" class="w-24 h-24 object-cover">
    </div>
</div>