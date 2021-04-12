<div id="modal-one" class="shadow-sm border border-solid border-gray-500 py-3 pl-1.5 pr-1.5 pt-0
bg-white w-full fixed z-50 top-1/2 left-1/2 dark:bg-dark-second rounded-lg 
sm:w-10/12 md:w-2/3 lg:w-2/3 xl:w-1/3" style="transform: translate(-50%,-50%);z-index:10;">
    <div class="w-full text-center">
        <p class="text-xl font-bold p-2.5 dark:text-white">Xóa bình luận</p>
        <span onclick="closePost()" class="rounded-full text-gray-300 px-3 py-1 text-2xl font-bold
                absolute right-4 top-2 cursor-pointer dark:text-gray-300">&times;</span>
        <hr>
    </div>
    <p class="px-3 py-4 dark:text-white">Bạn có chắc chắn muốn xóa bình luận của mình . Bình luận
        sau khi xóa sẽ vĩnh viễn không thể khôi phục lại ..Bấm <b>XÓA</b> nếu bạn muốn xóa bình luận ,\
        bấm <b>HỦY</b> nếu bạn muốn thoát khỏi hộp thoại này</p>
    <div class="text-right">
        <input type="button" id="huyXoaBinhLuan" class="cursor-pointer w-1/5 bg-1877F2 border-none 
        font-bold text-white rounded-lg p-2 mx-2" value="Hủy">
        <input type="button" id="btnXoaBinhLuan" class="cursor-pointer w-1/4 bg-1877F2 border-none 
        font-bold text-white rounded-lg p-2 mx-2" value="Xóa">
    </div>
</div>