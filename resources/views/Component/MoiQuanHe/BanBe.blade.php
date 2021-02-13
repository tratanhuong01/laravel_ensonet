<?php $user = Session::get('user'); ?>
<div class="w-7/12 mx-auto flex py-2">
    <div class="w-7/12">
        <ul class="w-full flex">
            <li class="text-center py-2 px-4  cursor-pointer"
                style="font-size:15px; border-bottom: 3px solid #1877F2;">
                <a class="font-bold dark:text-white" style="color: #1877F2;">Bài viết</a>
            </li>
            <li class="text-center py-2 px-4 cursor-pointer" style="font-size:15px;">
                <a class="font-bold dark:text-white">Giới thiệu</a>
            </li>
            <li class="text-center py-2 px-4 cursor-pointer" style="font-size:15px;">
                <a class="font-bold dark:text-white">Bạn bè &nbsp;
                    <span style="font-size: 13px;font-weight: normal !important;">
                        4.999
                    </span>
                </a>
            </li>
            <li class="text-center py-2 px-4 cursor-pointer" style="font-size:15px;">
                <a class="font-bold dark:text-white">Ảnh</a>
            </li>
            <li class="text-center py-2 px-4 cursor-pointer" style="font-size:15px;">
                <a class="font-bold dark:text-white">Xem thêm&nbsp;&nbsp;<i class="fas fa-caret-down"></i></a>
            </li>
        </ul>  
    </div>
    <div class="w-5/12 py-1.5 text-right">
        <span class="p-3 mr-2 cursor-pointer dark:bg-dark-third dark:text-white bg-gray-200 font-bold rounded-lg"
            style="line-height: 24px;"><i
                class="fab fa-facebook-messenger dark:text-white" style="font-size: 20px;"></i>&nbsp;&nbsp;Nhắn tin</span>
        <span class="p-3 mr-2 cursor-pointer dark:bg-dark-third dark:text-white bg-gray-200 font-bold rounded-lg">
            <i class="fas fa-phone dark:text-white" style="transform: rotate(90deg);"></i>
        </span>
        <span class="p-3 mr-2 cursor-pointer dark:bg-dark-third dark:text-white bg-gray-200 font-bold rounded-lg">
            <i class="fas fa-user-friends dark:text-white"></i></span>
        <span onclick="DeleteFriend('{{ $user[0]->IDTaiKhoan }}','{{ $users[0]->IDTaiKhoan }}')" 
        class="p-3 cursor-pointer dark:bg-dark-third dark:text-white bg-gray-200 font-bold rounded-lg"><i
                class="fas fa-user-slash huyBanBe dark:text-white"></i></span>
    </div>
</div>