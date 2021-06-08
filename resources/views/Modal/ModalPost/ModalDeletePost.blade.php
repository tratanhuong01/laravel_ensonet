<div id="modal-one" class="shadow-sm border border-solid border-gray-500 py-3 pl-1.5 pr-1.5 pt-0
bg-white w-full fixed z-50 top-1/2 left-1/2 dark:bg-dark-second rounded-lg 
sm:w-10/12 md:w-2/3 lg:w-2/3 xl:w-1/3" style="transform: translate(-50%,-50%);z-index:10;">
    <div class="w-full relative">
        <div class="w-full text-center">
            <p class="text-xl font-bold p-2.5 dark:text-white">Xóa bài viết</p>
            <<span onclick="closePost()" class="bg-gray-300 px-2.5 dark:text-white font-bold
                     rounded-full dark:bg-dark-second cursor-pointer absolute text-3xl top-2 right-4">&times;</span>
                <hr>
        </div>
        <p class="px-3 py-4 dark:text-white">Bạn có chắc chắn muốn xóa bài viết của mình . Bài viết sau khi xóa sẽ
            vĩnh viễn không thể khôi phục lại ..Bấm <b>XÓA</b> nếu bạn muốn xóa bài viết , bấm <b>HỦY</b>
            nếu bạn muốn thoát khỏi hộp thoại này</p>
        <div class="text-right">
            <input type="button" id="huyXoaBaiDang" class="cursor-pointer w-1/5 bg-1877F2 border-none 
        font-bold text-white rounded-lg p-2 mx-2" value="Hủy">
            <input type="button" id="btnXoaBaiDang" class="cursor-pointer w-1/4 bg-1877F2 border-none 
        font-bold text-white rounded-lg p-2 mx-2" value="Xóa">
        </div>
        <div class="w-full h-full bg-opacity-50 bg-white absolute top-0 left-0 hidden" id="cover">
            <div class="w-full h-full relative">
                <i class='fas fa-cog fa-spin text-5xl text-gray-700 cursor-pointer
                absolute  left-1/2 transform -translate-x-1/2 -translate-y-1/2' style="top: 40%;"></i>
            </div>
        </div>
    </div>
</div>