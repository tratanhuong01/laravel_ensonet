<div class="w-full py-2  mx-auto flex">
    @include('Component/MoiQuanHe/DanhMuc')
    <div class="w-4/5 pb-1.5 xl:w-5/12 text-right mr-3">
        <span onclick="AcceptFriend('{{ $user[0]->IDTaiKhoan }}','{{ $users[0]->IDTaiKhoan }}')" class="p-3 mr-2 cursor-pointer bg-blue-200 text-blue-600" style="border-radius: 6px;line-height: 24px;"><i class="fas fa-user-plus text-blue-600 nhanYeuCau" style="font: size 18px;"></i>&nbsp;&nbsp;Phản hồi</span>
        <span class="p-3 mr-2  cursor-pointer dark:bg-dark-third dark:text-white bg-gray-200 font-bold rounded-lg">
            <i class="fab fa-facebook-messenger dark:text-white" style="font-size: 19px;"></i>
        </span>
        <span class="p-3 mr-2 cursor-pointer dark:bg-dark-third text-center dark:text-white bg-gray-200 font-bold rounded-lg">
            <i class="fab fa-foursquare dark:text-white pl-1" style="font-size: 19px;"></i>
        </span>
        <span class="p-3 cursor-pointer dark:bg-dark-third dark:text-white bg-gray-200 font-bold rounded-lg"><i class="fas fa-ellipsis-h dark:text-white"></i></span>
    </div>
</div>
<div class="w-full py-2 hidden sm:flex nhanYeuCau">
    <div class="w-7/12">
        <p class="text-2xl font-bold dark:text-white" style="font-family: system-ui;">
            {{ $users[0]->Ten }} đã gửi lời mời kết bạn cho bạn
        </p>
    </div>
    <div class="w-5/12 py-1.5 text-right">
        <span onclick="AcceptFriend('{{ $user[0]->IDTaiKhoan }}','{{ $users[0]->IDTaiKhoan }}')" class="p-2.5 mr-2 cursor-pointer text-white" style="background-color: #1095F4;border-radius: 6px;">
            &nbsp;&nbsp;Chấp nhận lời mời</span>
        <span onclick="DeleleRequestFriend('{{ $user[0]->IDTaiKhoan }}','{{ $users[0]->IDTaiKhoan }}')" class="p-2.5 mr-2 cursor-pointer bg-gray-200" style="border-radius: 6px;">&nbsp;&nbsp;Hủy lời
            mời</span>
    </div>
</div>