<ul class="w-full flex">
    <li class="w-10 h-10 mr-2 border-b-4 border-solid border-blue-500 flex items-center 
    dark:text-white justify-center cursor-pointer">
        <i class='bx bx-search text-2xl'></i>
    </li>
    <li class="w-10 h-10 mr-2  flex items-center dark:text-white justify-center 
    cursor-pointer">
        <i class="fas fa-history text-xl"></i>
    </li>
    <li class="w-10 h-10 mr-2  flex items-center dark:text-white justify-center 
    cursor-pointer">
        <img src="/img/sticker.png" class="w-8 h-8 p-0.5 object-cover mb-2">
    </li>
    <li class="w-10 h-10 mr-2  flex items-center dark:text-white justify-center 
    cursor-pointer">
        <img src="/img/sticker.png " class="w-8 h-8 p-0.5 object-cover mb-2">
    </li>
    <li class="w-10 h-10 mr-2  flex items-center dark:text-white justify-center 
    cursor-pointer">
        <img src="/img/sticker.png" class="w-8 h-8 p-0.5 object-cover mb-2">
    </li>
    <li class="w-10 h-10 flex items-center dark:text-white justify-center 
    cursor-pointer">
        <i class='bx bx-plus text-3xl'></i>
    </li>
</ul>
<div class="w-full p-2 text-center">
    <input type="text" class="w-11/12 mx-auto dark:border-dark-second 
    border-gray-200 border-solid border-2 my-1
    px-2.5 py-2 rounded-3xl dark:bg-dark-third " placeholder="Tìm kiếm">
</div>
<div class="w-full h-60 overflow-y-auto flex flex-wrap
wrapper-content-right px-2" style="max-height: 300px;">
    <?php

    use App\Models\Nhandan;

    $sticker = Nhandan::get();

    ?>
    @foreach($sticker as $key => $value)
    <div onclick="postMain('{{ $idTaiKhoan }}','{{ $idBaiDang }}' ,'{{$idBinhLuan}}','{{$value->IDNhanDan}}','{{ $loaiBinhLuan }}')" class="w-20 mr-1 cursor-pointer">
        <div class="w-20 h-20 max-w-20 max-h-20 p-1 overflow-hidden bg-size:{{ $value->Cot }}:{{ $value->Hang }} 
         stickerAnimation:{{ $value->Cot }}:{{ $value->Hang }} relative" style="background-image: url('{{ $value->DuongDanNhanDan }}');">
        </div>
    </div>
    @endforeach

</div>
<div class="w-full h-60 overflow-y-hidden flex flex-wrap hidden
    wrapper-content-right px-2" style="max-height: 300px;">
    <li class="w-48% cursor-pointer mr-1.5 my-1 flex p-1.5 rounded-3xl bg-yellow-500 text-white 
    text-sm" style="max-width: 120px;">
        <div class="w-full flex items-center font-bold">
            <div class="w-1/4 pl-3">
                <img src="img/icon_comment/vuive.png" class="w-7 h-7 object-cover mr-3" alt="">
            </div>
            <div class="w-2/3 pl-3 break-all whitespace-nowrap overflow-ellipsis overflow-hidden">
                Vui vẻ
            </div>
        </div>
    </li>
    <li class="w-48% cursor-pointer ml-1.5 my-1 flex p-1.5 rounded-3xl bg-pink-500 text-white 
    text-sm" style="max-width: 120px;">
        <div class="w-full flex items-center font-bold">
            <div class="w-1/4 pl-3">
                <img src="img/icon_comment/dangyeu.png" class="w-7 h-7 object-cover mr-3" alt="">
            </div>
            <div class="w-2/3 pl-3 break-all whitespace-nowrap overflow-ellipsis overflow-hidden">
                Đáng yêu
            </div>
        </div>
    </li>
    <li class="w-48% cursor-pointer mr-1.5 my-1 flex p-1.5 rounded-3xl bg-gray-300 text-white 
    text-sm" style="max-width: 120px;">
        <div class="w-full flex items-center font-bold">
            <div class="w-1/4 pl-3">
                <img src="img/icon_comment/buon.png" class="w-7 h-7 object-cover mr-3" alt="">
            </div>
            <div class="w-2/3 pl-3 break-all whitespace-nowrap overflow-ellipsis overflow-hidden">
                Buồn
            </div>
        </div>
    </li>
    <li class="w-48% cursor-pointer ml-1.5 my-1 flex p-1.5 rounded-3xl bg-yellow-600 text-white 
    text-sm" style="max-width: 120px;">
        <div class="w-full flex items-center font-bold">
            <div class="w-1/4 pl-3">
                <img src="img/icon_comment/dangan.png" class="w-7 h-7 object-cover mr-3" alt="">
            </div>
            <div class="w-2/3 pl-3 break-all whitespace-nowrap overflow-ellipsis overflow-hidden">
                Đang ăn
            </div>
        </div>
    </li>
    <li class="w-48% cursor-pointer mr-1.5 my-1 flex p-1.5 rounded-3xl bg-green-300 text-white 
    text-sm" style="max-width: 120px;">
        <div class="w-full flex items-center font-bold">
            <div class="w-1/4 pl-3">
                <img src="img/icon_comment/dangchuc.png" class="w-7 h-7 object-cover mr-3" alt="">
            </div>
            <div class="w-2/3 pl-3 break-all whitespace-nowrap overflow-ellipsis overflow-hidden">
                Đang chúc mừng
            </div>
        </div>
    </li>
    <li class="w-48% cursor-pointer ml-1.5 my-1 flex p-1.5 rounded-3xl bg-blue-300 text-white 
    text-sm" style="max-width: 120px;">
        <div class="w-full flex items-center font-bold">
            <div class="w-1/4 pl-3">
                <img src="img/icon_comment/danghoatdong.png" class="w-7 h-7 object-cover mr-3" alt="">
            </div>
            <div class="w-2/3 pl-3 break-all whitespace-nowrap overflow-ellipsis overflow-hidden">
                Đang hoạt động
            </div>
        </div>
    </li>
    <li class="w-48% cursor-pointer mr-1.5 my-1 flex p-1.5 rounded-3xl bg-blue-400 text-white 
    text-sm" style="max-width: 120px;">
        <div class="w-full flex items-center font-bold">
            <div class="w-1/4 pl-3">
                <img src="img/icon_comment/danglamviec.png" class="w-7 h-7 object-cover mr-3" alt="">
            </div>
            <div class="w-2/3 pl-3 break-all whitespace-nowrap overflow-ellipsis overflow-hidden">
                Đang làm việc
            </div>
        </div>
    </li>
    <li class="w-48% cursor-pointer ml-1.5 my-1 flex p-1.5 rounded-3xl bg-indigo-500 text-white 
    text-sm" style="max-width: 120px;">
        <div class="w-full flex items-center font-bold">
            <div class="w-1/4 pl-3">
                <img src="img/icon_comment/buonngu.png" class="w-7 h-7 object-cover mr-3" alt="">
            </div>
            <div class="w-2/3 pl-3 break-all whitespace-nowrap overflow-ellipsis overflow-hidden">
                Buồn ngủ
            </div>
        </div>
    </li>
    <li class="w-48% cursor-pointer mr-1.5 my-1 flex p-1.5 rounded-3xl bg-red-500 text-white
    text-sm" style="max-width: 120px;">
        <div class="w-full flex items-center font-bold">
            <div class="w-1/4 pl-3">
                <img src="img/icon_comment/giandu.png" class="w-7 h-7 object-cover mr-3" alt="">
            </div>
            <div class="w-2/3 pl-3 break-all whitespace-nowrap overflow-ellipsis overflow-hidden">
                Giận dữ
            </div>
        </div>
    </li>
    <li class="w-48% cursor-pointer ml-1.5 my-1 flex p-1.5 rounded-3xl bg-yellow-900 text-white 
    text-sm" style="max-width: 120px;">
        <div class="w-full flex items-center font-bold">
            <div class="w-1/4 pl-3">
                <img src="img/icon_comment/boiroi.png" class="w-7 h-7 object-cover mr-3" alt="">
            </div>
            <div class="w-2/3 pl-3 break-all whitespace-nowrap overflow-ellipsis overflow-hidden">
                Bối rối
            </div>
        </div>
    </li>
</div>