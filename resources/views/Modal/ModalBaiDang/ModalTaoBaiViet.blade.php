<div id="modal-one" class="border-2 border-solid border-gray-300 py-3 pl-1.5 pr-1.5 pt-0
            bg-white w-1/3 fixed z-50 top-1/2 left-1/2"
        style="border-radius: 10px;transform: translate(-50%,-50%);display: none;z-index:100;">
    <div class="w-full text-center">
        <p class="text-2xl font-bold p-2.5">Tạo bài viết</p>
        <span onclick="closePost()" class=" rounded-full bg-aliceblue px-3 py-1 text-2xl font-bold
                absolute right-4 top-2 cursor-pointer">&times;</span>
        <hr>
    </div>
    <div class="w-full flex px-0 py-2">
        <div class="w-2/12 pt-1">
            <a href=""><img class="w-14 h-14 rounded-full object-contain" src="{{ $user[0]->AnhDaiDien }}" alt=""></a>
        </div>
        <div class="w-11/12">
            <p class="p-1 pt-0">Trà Hưởng</p>
            <div class="py-0 px-1 relative" style="width: 25%;border-radius: 30px;background-color: #DBDCE1;">
                <ul class="flex text-xs relative cursor-pointer">
                    <li class="px-0.5 py-1.5"><i class="fas fa-globe-europe"></i></li>
                    <li class="px-0.5 py-1.5"><b>&nbsp;Công Khai&nbsp;&nbsp;</b></li>
                    <li class="px-0.5 py-1.5"><i style="position: absolute;top: 6px;" class="fas fa-sort-down"></i>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="w-full mt-2.5 wrapper-content-right overflow-y-auto" style="max-height:365px;">
        <div class="w-full relative" id="main-textarea-post">
            <textarea id="textarea-post" oninput="checkValueTextAre()" 
            class="w-full border-none text-xm px-2 pt-2 py-6 outline-none overflow-hidden 
            resize-none"
            name="contentpost" id="" placeholder="Hưởng ơi, Bạn đang nghĩ gì thế?"></textarea>
            <button class="absolute right-2 bottom-2 bg-white outline-none">
            <i class="far fa-smile text-gray-600 text-2xl"></i>
            </button>
        </div>
        <div class="w-full mt-2.5 px-2">
            <img src="img/avatar.jpg" class="w-full" alt="" srcset="">
        </div>
    </div>
    
    <div class="w-full p-2 border-2 border-solid border-gray-300 mt-4">
        <ul class="w-full flex">
            <li onclick="clickOpenModal(0)" class=" pr-16">
                <h3 class="pl-2.5">Thêm vào bài viết</h3>
            </li>
            <li class=""><i style="color: #9567EF;font-size: 25px;padding: 2px 4px;" class="fas fa-video"></i>
                &nbsp;&nbsp;</li>
            <li class=""><i style="color: #45B560;font-size: 25px;padding: 2px 4px;" class="far fa-image"></i>
                &nbsp;&nbsp;</li>
            <li onclick="clickOpenModal(1)" class="eOpenModal"><i
                    style="color: #EAB026;font-size: 25px;padding: 2px 4px;" class="fas fa-smile"></i> &nbsp;&nbsp;
            </li>
            <li onclick="clickOpenModal(3)" class="eOpenModal"><i
                    style="color: #1771E6;font-size: 25px;padding: 2px 4px;" class="fas fa-user-tag"></i>
                &nbsp;&nbsp;</li>
            <li onclick="clickOpenModal(2)" class="eOpenModal"><i
                    style="color: #E94F3A;padding-right: 9px;font-size: 25px;padding: 2px 4px;"
                    class="fas fa-map-marker-alt"></i></li>
            <li onclick="clickOpenModal(4)" class="eOpenModal"><i
                    style="color: #28B19E;font-size: 25px;padding: 2px 4px;" class="fas fa-radiation"></i>
            </li>
        </ul>
    </div>
    <div class="w-full text-center my-2.5 mx-0">
        <button class="w-full p-2.5 border-none text-white cursor-pointer" id="button-post"
            style="background-color: gray;border-radius: 20px;cursor:not-allowed;"><b>Đăng</b></button>
    </div>
</div>