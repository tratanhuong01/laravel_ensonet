
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
        <span onclick="AcceptFriend('{{ $user[0]->IDTaiKhoan }}','{{ $users[0]->IDTaiKhoan }}')" class="p-3 mr-2 cursor-pointer bg-blue-200 text-blue-600"
            style="border-radius: 6px;line-height: 24px;"><i class="fas fa-user-plus text-blue-600 nhanYeuCau" 
                style="font: size 18px;"></i>&nbsp;&nbsp;Phản hồi</span>
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
<div class="w-7/12 mx-auto flex py-4 nhanYeuCau">
    <div class="w-7/12">
        <p class="text-2xl font-bold" style="font-family: system-ui;">
            {{ $users[0]->Ten }} đã gửi lời mời kết bạn cho bạn</p>
    </div>
    <div class="w-5/12 py-1.5 text-right">
        <span onclick="AcceptFriend('{{ $user[0]->IDTaiKhoan }}','{{ $users[0]->IDTaiKhoan }}')" class="p-2.5 mr-2 cursor-pointer text-white"
            style="background-color: #1095F4;border-radius: 6px;">
            &nbsp;&nbsp;Chấp nhận lời mời</span>
        <span onclick="DeleleRequestFriend('{{ $user[0]->IDTaiKhoan }}','{{ $users[0]->IDTaiKhoan }}')" class="p-2.5 mr-2 cursor-pointer bg-gray-200" style="border-radius: 6px;">&nbsp;&nbsp;Hủy lời
            mời</span>
    </div>
</div>