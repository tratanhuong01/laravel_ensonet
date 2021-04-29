<div class="w-full mx-auto">
    <p class="text-3xl py-2 font-bold">
        Đăng nhập gần đây
    </p>
    <p class="pb-3 text-gray-500 tex-xm">
        Nhấp vào ảnh của bạn hoặc thêm tài khoản.
    </p>
    <div class="w-full flex flex-wrap">
        <div id="session1" class="w-1/4 mr-5 mt-5 relative border-2 border-solid border-gray-300 
		shadow-lg cursor-pointer">
            <img src="/img/gai.jpg" class="w-full mx-auto object-cover h-40" alt="">
            <p class="font-bold my-3 text-center text-xm">
                Trà Hưởng
            </p>
            <span onclick="removeUserSession('1')" class="absolute top-0 left-0 cursor-pointer 
				px-1.5 flex  items-center hover:bg-white hover:-left-2 rounded-full bg-gray-300 font-bold
				justify-center transform hover:scale-125 hover:-top-2 ">
                &times;
            </span>
        </div>
        <div id="session2" class="w-1/4  mr-5 mt-5 relative border-2 border-solid border-gray-300 
			shadow-lg cursor-pointer">
            <img src="/img/gai.jpg" class="w-full mx-auto object-cover h-40" alt="">
            <p class="font-bold my-3 text-center text-xm">
                Trà Hưởng
            </p>
            <span onclick="removeUserSession('2')" class="absolute top-0 left-0 cursor-pointer 
				px-1.5 flex  items-center hover:bg-white hover:-left-2 rounded-full bg-gray-300 font-bold
				justify-center transform hover:scale-125 hover:-top-2 ">
                &times;
            </span>
        </div>
        <div class="w-1/4 mr-5 relative border-2 mt-5 border-solid border-gray-300 
			shadow-lg cursor-pointer">
            <div class="w-full mx-auto relative h-40 bg-gray-300">
                <div class="w-10 h-10 rounded-full bg-blue-500 flex justify-center top-1/2
                    left-1/2 transform -translate-y-1/2 -translate-x-1/2 absolute">
                    <i class="bx bx-plus text-3xl text-white my-1"></i>
                </div>
            </div>
            <p class="font-bold my-3 text-center text-blue-500 text-xm">
                Thêm tài khoản
            </p>
        </div>
    </div>
</div>