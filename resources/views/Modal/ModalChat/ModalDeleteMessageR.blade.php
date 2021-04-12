<div id="modal-one" class="shadow-sm border border-solid border-gray-500 py-3 pl-1.5 pr-1.5 pt-0
bg-white w-full fixed z-50 top-1/2 left-1/2 dark:bg-dark-second rounded-lg 
sm:w-10/12 md:w-2/3 lg:w-2/3 xl:w-2/5" style="transform: translate(-50%,-50%);z-index:10;">
    <div class="w-full text-center py-2">
        <p class="text-xl font-bold py-2.5 pb-4 dark:text-white">Bạn muốn ai không nhìn thấy tin nhắn này nữa?</p>
        <span onclick="closePost()" class="rounded-full text-gray-300 px-3 py-1 text-2xl font-bold
                absolute right-2 bg-gray-600 top-2.5 cursor-pointer dark:text-gray-300">&times;</span>
        <hr>
    </div>
    <div class="w-full">
        <div class="w-full">
            <div class="w-full p-6 pb-2 inline-block ">
                <input onchange="onchangeInputRemoveMessage('ThuHoi')" type="radio" class="text-4xl pb-1" style="transform: scale(1.5);" name="state" checked>
                &nbsp; &nbsp; &nbsp;<span class="font-bold dark:text-white">Thu hồi với mọi người
                </span>
            </div>
            <div class="w-11/12 pl-3 ml-auto dark:text-white">
                Bạn sẽ gỡ vĩnh viễn tin nhắn này đối với tất cả các thành viên trong đoạn chat. Họ sẽ thấy rằng bạn đã thu hồi tin nhắn và vẫn có thể báo cáo tin nhắn đó.
            </div>
        </div>
        <div class="w-full">
            <div class="w-full p-6 pb-2 inline-block ">
                <input onchange="onchangeInputRemoveMessage('Xoa')" type="radio" class="text-4xl pb-1" style="transform: scale(1.5);" name="state">
                &nbsp; &nbsp; &nbsp;<span class="font-bold dark:text-white">Gỡ ở phía bạn
                </span>
            </div>
            <div class="w-11/12 pl-3 ml-auto dark:text-white">
                Chúng tôi sẽ gỡ tin nhắn này cho bạn. Những thành viên khác trong đoạn chat vẫn có thể xem được.
            </div>
        </div>
    </div>
    <input type="hidden" name="thuHoiOrXoa" id="thuHoiOrXoa" value="ThuHoi">
    <div class="text-right pt-5">
        <input type="button" id="btnHuyXoaTinNhan" class="cursor-pointer w-1/5  border-none 
        font-bold text-blue-500 rounded-lg p-2 mx-2" value="Hủy">
        <input type="button" id="btnXoaTinNhan" class="cursor-pointer w-1/4 bg-1877F2 border-none 
        font-bold text-white rounded-lg p-2 mx-2" value="Xóa , gỡ bỏ">
    </div>
</div>