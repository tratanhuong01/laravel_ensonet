<?php $user = Session::get('user'); ?>
<div class="w-7/12 mx-auto flex py-2">
    <div class="w-7/12">
        <ul class="w-full flex">
            <li class="text-center py-2 px-4  cursor-pointer"
                style="font-size:15px; border-bottom: 3px solid #1877F2;">
                <a class="font-bold" style="color: #1877F2;">Bài viết</a>
            </li>
            <li class="text-center py-2 px-4 cursor-pointer" style="font-size:15px;">
                <a class="font-bold">Giới thiệu</a>
            </li>
            <li class="text-center py-2 px-4 cursor-pointer" style="font-size:15px;">
                <a class="font-bold">Bạn bè &nbsp;
                    <span style="font-size: 13px;font-weight: normal !important;">
                        4.999
                    </span>
                </a>
            </li>
            <li class="text-center py-2 px-4 cursor-pointer" style="font-size:15px;">
                <a class="font-bold">Ảnh</a>
            </li>
            <li class="text-center py-2 px-4 cursor-pointer" style="font-size:15px;">
                <a class="font-bold">Xem thêm&nbsp;&nbsp;<i class="fas fa-caret-down"></i></a>
            </li>
        </ul>
    </div>
    <div class="w-5/12 py-1.5 text-right">
        <span onclick="RequestFriend('{{ $user[0]->IDTaiKhoan }}','{{ $users[0]->IDTaiKhoan }}')" class="p-3 mr-2 cursor-pointer " style="background-color: #E7F3FF;
        color:#1095F4;font-weight:bold;border-radius: 6px;line-height: 24px;"><i
                class="fas fa-user-plus themBanBe" style="font-size: 18px;"></i>&nbsp;&nbsp;<span class="main_themBanBe">Thêm bạn bè</span></span>
        <span class="p-3 mr-2 cursor-pointer" style="background-color: #D8DADF;border-radius: 6px;">
            <i class="fab fa-facebook-messenger" style="font-size: 19px;"></i>
        </span>
        <span class="cursor-pointer mr-2 relative"
            style="padding: 11px 23px;background-color: #D8DADF;border-radius: 6px;">
            <img src="img/follows.png" alt="" class="w-5 h-5 absolute top-2.5 right-3"></span>
        <span class="p-3 cursor-pointer" style="background-color: #D8DADF;border-radius: 6px;"><i
                class="fas fa-ellipsis-h"></i></span>
    </div>
</div>
<div class="w-7/12 mx-auto flex py-2">
    <div class="w-3/4">
        <p class="text-2xl font-bold" style="font-family: system-ui;">
            Bạn có biết {{ $users[0]->Ten }} không ? </p>
        <p class="text-xm color-word">
            Hãy gửi lời mời kết bạn để xem những gì anh ấy chia sẻ với bạn bè.</p>
        <div class="w-full py-2">
            <ul class="flex relative h-10">
                <li class="df_new w-9 h-9">
                    <img class="w-9 h-9 rounded-full absolute left-16" src="img/avatar.jpg" alt="">
                </li>
                <li><i style="font-size: 14px;"
                        class="rounded-full absolute left-18 pl-1 top-3 text-white fas fa-ellipsis-h"></i>
                </li>
                <li><img class="w-9 h-9 rounded-full absolute left-8"
                        src="img/boy.jpg" alt=""></li>
                <li><img class="w-9 h-9 rounded-full absolute left-0"
                        src="img/girl.jpg" alt=""></li>
                <li class="p-2"><span class="color-word text-xm absolute left-28"> 8 bạn chung</span></li>
            </ul>
        </div>
    </div>
    <div class="w-1/4 py-2 text-right my-8">
        <span onclick="RequestFriend('{{ $user[0]->IDTaiKhoan }}','{{ $users[0]->IDTaiKhoan }}')" class="p-3 mr-2 cursor-pointer text-white "
            style="background-color: #1095F4;border-radius: 6px;line-height: 24px;"><i
                class="fas fa-user-plus text-white themBanBe" style="font: size 18px;"></i>&nbsp;&nbsp;
                <span class="main_themBanBe">Thêm bạn bè</span></span>
    </div>
</div>