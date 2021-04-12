<?php

use Illuminate\Support\Facades\Session;

?>
@include('Head/document')

<head>
    <title>Ensonet</title>
    @include('Head/css')
</head>

<body class="bg-gray-100">
    <div class="w-1/2 mx-auto p-3 bg-white mt-8 rounded overflow-y-auto
     wrapper-scrollbar" id="modal" style="max-height: 719px;">
        <div class="w-full py-2">
            <p class="font-bold  text-xl" style="font-family: system-ui;">Tài khoản của bạn đã bị vô hiệu hóa</p>
        </div>
        <hr>
        <div class="w-full py-2">
            <p class="pt-2 py-1 font-bold text-xm">
                Vui lòng cung cấp cho chúng tôi giấy tờ tùy thân của bạn
            </p>
            <p class="pt-2">
                <b class="text-blue-600 cursor-pointer" onclick="guiVeri(0)">Ensonet chỉ chấp nhận những loại giấy tờ
                    tùy thân gì?</b> <br>
                <span class="content-veri" style="display: none;">
                    Bạn có một số lựa chọn khác nhau bao gồm giấy tờ tùy thân có ảnh do chính phủ cấp, giấy tờ nhận dạng
                    từ các tổ chức phi chính phủ, giấy phép hoặc chứng chỉ chính thức có tên bạn hoặc giấy tờ khác như
                    phiếu
                    đăng ký tạp chí hoặc thư từ. <br>
                    Hãy nhớ chỉ gửi giấy tờ được yêu cầu. Việc bạn gửi giấy tờ nhiều hơn cần thiết có thể làm chậm quy
                    trình
                    xem xét.
                </span>
            </p>
            <p class="pt-2">
                <b class="text-blue-600 cursor-pointer" onclick="guiVeri(1)">Ensonet chỉ chấp nhận những loại giấy tờ
                    tùy thân gì?</b> <br>
                <span class="content-veri" style="display: none;">
                    Cách tải lên bản sao giấy tờ tùy thân của bạn :
                    <br>1. Dùng camera hoặc thiết bị di động chụp ảnh cận cảnh giấy tờ tùy thân của bạn trong phòng có
                    đủ
                    ánh sáng.
                    <br>2. Lưu ảnh vào thiết bị di động hoặc máy tính.
                    <br>3. Làm theo hướng dẫn trên màn hình để tải giấy tờ tùy thân của bạn lên.
                </span>
            </p>
            <p class="pt-2">
                <b class="text-blue-600 cursor-pointer" onclick="guiVeri(2)">Tại sao Ensonet lại yêu cầu tôi tải giấy tờ
                    tùy thân ?</b> <br>
                <span class="content-veri" style="display: none;">
                    Chúng tôi yêu cầu bạn gửi bản sao giấy tờ tùy thân lên Facebook vì một số lý do sau: Ví dụ như: <br>

                    * Xác nhận rằng tài khoản mà bạn đang truy cập thuộc về bạn: Vấn đề bảo mật của bạn rất quan trọng
                    với
                    chúng tôi. Chúng tôi yêu cầu giấy tờ tùy thân để ngoài bạn ra, không ai có thể đăng nhập được vào
                    tài
                    khoản của bạn. <br>
                    * Xác nhận tên bạn: Chúng tôi đề nghị mọi người trên Facebook sử dụng tên thường gọi trong đời thực.
                    Điều
                    này sẽ bảo vệ bạn và cộng đồng của chúng ta khỏi hành vi mạo danh. <br>
                    Một số lý do khác mà mọi người có thể được yêu cầu xác minh danh tính bao gồm: <br>
                    Góp phần ngăn chặn hành vi lạm dụng chẳng hạn như lừa đảo, giả mạo và ảnh hưởng chính trị nước
                    ngoài.
                    Tiếp cận nhanh chóng với một lượng lớn đối tượng bằng trang cá nhân, Trang hoặc bài viết trong nhóm,
                    đồng thời hiển thị các dấu hiệu của hành vi giả tạo trên trang Facebook cá nhân.
                </span>
            </p>
            <p class="pt-2 mb-2">
                <b class="text-blue-600 cursor-pointer" onclick="guiVeri(3)">Điều gì sẽ xảy ra với giấy tờ tùy thân của
                    tôi khi gởi cho Ensonet ?</b> <br>
                <span class="content-veri" style="display: none;">
                    Sau khi bạn gửi bản sao giấy tờ tùy thân cho chúng tôi, tài liệu này sẽ được mã hóa và lưu trữ an
                    toàn.
                    Giấy tờ tùy thân của bạn sẽ không hiển thị trên trang cá nhân của bạn cho bạn bè hay những người
                    khác
                    trên Facebook. <br>

                    Để đảm bảo giấy tờ tùy thân dùng cho việc xác nhận danh tính là giấy tờ thật, chúng tôi sử dụng cả
                    hệ
                    thống xét duyệt thủ công và tự động. Mục đích là để phát hiện và ngăn chặn các nguy cơ như mạo danh
                    hoặc
                    đánh cắp danh tính, qua đó giữ an toàn cho bạn và cộng đồng Facebook. <br>

                    Để cải thiện hệ thống phát hiện giấy tờ tùy thân giả và hành vi lạm dụng liên quan, chúng tôi có thể
                    lưu
                    trữ an toàn giấy tờ tùy thân của bạn trong vòng tối đa 1 năm. Chúng tôi sẽ luôn thông báo lập tức
                    cho
                    bạn nếu thực hiện điều này.
                </span>
            </p>
        </div>
        <hr class="pb-2">
        <form action="{{ route('ProcessSendRequestUser') }}" id="formRequest" class="w-full" method="POST" enctype="multipart/form-data">

            {{ csrf_field() }}
            <input type="hidden" name="IDTaiKhoan" value="{{ Session::get('idblock') }}" id="">
            <div class="w-full">
                <p class="text-gray-600 font-bold ">Giấy tờ tùy thân</p>
                <p class="text-sm text-gray-400">Đã lưu dưới dạng JPE, nếu có thể. Bạn có thể đính kèm tối đa là 3 tệp.
                </p>
                <p class="py-2">
                    <input type="file" name="cmnd[]" id="upfileCMND" multiple>
                </p>
                <p class="text-gray-600 font-bold">
                    Địa chỉ email đăng nhập <br>
                    <input type="text" name="email" class="w-3/5 p-1 my-2 border-2 border-solid border-gray-300">
                </p>
                <p class="text-gray-600 font-bold">
                    Ngày sinh của bạn : <br>
                    <input type="date" name="ngaySinh" class="w-3/5 p-1 my-2 border-2 border-solid border-gray-300">
                </p>
                <p class="text-gray-600 font-bold">
                    Nội Dụng của bạn : <br>
                    <textarea class="w-3/5 p-1 my-2 border-2 border-solid border-gray-300 resize-none" name="noiDung" id="" cols="30" rows="4" placeholder="Nhập nội dung cần yêu cầu..."></textarea>
                </p>

            </div>
            <div class="w-full py-2 text-right">
                <button type="submit" class="py-2 px-4 bg-blue-900 font-bold text-white">Gửi</button>
            </div>
        </form>
    </div>
    <script src="js/scrollbar.js"></script>
</body>

</html>