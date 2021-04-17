<div id="modal-one" class=" w-11/12 fixed top-50per left-50per transform-translate-50per pb-2 pt-2 
opacity-100 bg-white z-50 border-2 border-solid border-gray-300 sm:w-4/5 sm:mt-12 lg:w-3/4 xl:w-2/3
xl:mt-4 dark:border-dark-main shadow-1 rounded-lg">
    <div class="w-full bg-white dark:bg-dark-second pl-2 pr-4  block z-10 text-center 
    relative">
        <p class="font-bold text-2xl pt-1 text-gray-700">Chi tiết về bài đăng
        </p>
        <span onclick="closeModalAd()" class="bg-gray-300 px-2.5 dark:text-white font-bold 
        rounded-full cursor-pointer text-3xl absolute top-0 right-3">&times;</span>
        <hr class="my-3">
    </div>
    <div class="w-full flex flex-wrap">
        <div class="w-1/2 px-3">
            <div class="w-full flex mb-3">
                <div class="w-1/12 relative">
                    <span class="cursor-pointer absolute top-1/2 left-1/2" style="transform: translate(-50%,-50%);">
                        <i class="bx bxs-chevrons-left text-xl rounded-full 
                        px-2.5 py-1.5 bg-gray-200"></i>
                    </span>
                </div>
                <div class="w-10/12 px-2">
                    <img src="/{{ $post[0]->DuongDan }}" class="w-auto mx-auto max-h-80" alt="">
                </div>
                <div class="w-1/12 relative">
                    <span class="cursor-pointer absolute top-1/2 left-1/2" style="transform: translate(-50%,-50%);">
                        <i class="bx bxs-chevrons-right text-xl rounded-full 
                        px-2.5 py-1.5 bg-gray-200"></i>
                    </span>
                </div>
            </div>
            <div class="w-full flex">
                <div class="w-1/4">
                    <img src="/img/avatar.jpg" class="w-full h-full 
                    object-cover p-1" alt="">
                </div>
                <div class="w-1/4">
                    <img src="/img/avatar.jpg" class="w-full h-full 
                    object-cover p-1" alt="">
                </div>
                <div class="w-1/4">
                    <img src="/img/avatar.jpg" class="w-full h-full 
                    object-cover p-1" alt="">
                </div>
                <div class="w-1/4">
                    <img src="/img/avatar.jpg" class="w-full h-full 
                    object-cover p-1" alt="">
                </div>
            </div>
        </div>
        <div class="w-1/2 border-solid border-gray-200 border-l-2 
        shadow-xl px-3">
            <ul class="w-full">
                <li class="w-full p-2">ID Tài Khoản :
                    <span class="cursor-pointer bg-green-500 px-3 py-1.5 text-sm rounded-3xl 
                        font-bold text-white">{{ $post[0]->IDTaiKhoan }}</span>
                </li>
                <li class="w-full p-2">Nguời đăng :
                    <span class="cursor-pointer bg-green-500 px-3 py-1.5 text-sm rounded-3xl 
                        font-bold text-white">{{ $post[0]->Ho . ' ' . $post[0]->Ten }}</span>
                </li>
                <li class="w-full p-2">Gắn Thẻ :
                    <?php $tag = explode('@', $post[0]->GanThe); ?>
                    @if (count($tag) > 0)
                    <span class="cursor-pointer bg-yellow-500 px-3 py-1.5 text-sm rounded-3xl 
                        font-bold text-white">{{ count($tag) . ' người dùng khác' }} được gắn thẻ</span>
                    @else
                    <span class="cursor-pointer bg-red-500 px-3 py-1.5 text-sm rounded-3xl 
                        font-bold text-white">{{ 'Không ' }} có gắn thẻ</span>
                    @endif
                </li>
                <li class="w-full p-2">Quyền Riêng Tư :
                    <span class="font-bold"></span>
                </li>
                <li class="w-full p-2">Loại Bài Đăng:
                    <span class="font-bold"></span>
                </li>
                <li class="w-full p-2 max-h-32 overflow-y-auto border-gray-200 shadow-lg
                wrapper-content-right border-2 border-solid">Nội Dung :
                    <span class="font-bold">chào ae </span>
                </li>
                <li class="w-full mt-2 p-2">Số Lượt Cảm Xúc :
                    <span class="cursor-pointer bg-green-500 px-3 py-1.5 text-sm rounded-3xl 
                        font-bold text-white">1.022</span>
                </li>
                <li class="w-full p-2">Số Lượt Bình Luận :
                    <span class="cursor-pointer bg-green-500 px-3 py-1.5 text-sm rounded-3xl 
                        font-bold text-white">210</span>
                </li>
                <li class="w-full p-2">Số Lượt Chia Sẽ :
                    <span class="cursor-pointer bg-green-500 px-3 py-1.5 text-sm rounded-3xl 
                        font-bold text-white">32</span>
                </li>
            </ul>
            <div class="w-full my-10 text-center">
                <button class="w-32 p-2.5 rounded-lg font-bold text-white 
                bg-red-500 ">Xóa bài đăng</button>
            </div>
        </div>
    </div>
</div>