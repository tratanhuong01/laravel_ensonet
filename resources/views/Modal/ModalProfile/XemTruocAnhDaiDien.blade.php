<div id="get-account-main" class="w-2/5 p-4 border-2 border-solid border-gray-200 rounded-lg 
fixed top-1/2 left-1/2 bg-white dark:bg-dark-second z-10 mt-1" style="transform:translate(-50%,-50%);display:block;">
    <div class="w-full text-center text-xl py-4 font-bold dark:text-white">
        Cập nhật ảnh đại diện
        <span onclick="closePost()" class="cursor-pointer absolute text-3xl top-4 right-8">&times;</span>
    </div>
    <hr>
    <br>
    <form action="ProcessUpdateAvatar" id="formUpdateAvatar" method="POST" enctype="multipart/form-data">
        <div class="w-full">
            <textarea class="w-full mx-auto h-24 border-2 border-solid border-gray-200 
        p-4 resize-none dark:bg-dark-third dark:border-dark-main dark:text-white" name="content" id="" placeholder="Nhập mô tả"></textarea>

        </div>
        <div class="w-full opacity-50 pt-4 relative">
            <img id="avt-opactity" class="mx-auto object-cover" style="width:353px;height:334px;" src="img/avatar.jpg" alt="">
        </div>
        <div class="w-full text-center absolute" style="top: 214px;left:0px;">
            <img id="avt-opactity-none" class="object-cover w-7/12 mx-auto rounded-full border-none p-0.5" style="height:340px;" src="img/avatar.jpg" alt="">
        </div>
        <div class="w-11/12 text-right pt-8 pb-4" id="formUpdateAvatar1">
            {{ csrf_field() }}
            <input type="hidden" name="pathAvatar" id="" value="">
            <button type="button" onclick="closePost()" class="w-2/12 font-bold p-2 border-none rounded-lg 
            dark:text-white">Hủy</button>
            <button type="button" class="w-2/12 font-bold p-2 border-none rounded-lg bg-blue-600 
            text-white ml-4" onclick="updateAvatar()">Lưu</button>
        </div>
    </form>
</div>