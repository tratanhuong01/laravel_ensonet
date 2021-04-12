<?php

use App\Process\DataProcessSecond;

$color = DataProcessSecond::getColorMessage();

?>
<div id="modal-one" class="shadow-sm border border-solid border-gray-500 py-3 pl-1.5 pr-1.5 pt-0
bg-white w-full fixed z-50 top-1/2 left-1/2 dark:bg-dark-second rounded-lg 
sm:w-10/12 md:w-2/3 lg:w-2/3 xl:w-1/3" style="transform: translate(-50%,-50%);z-index:10;">
    <div class="w-full text-center">
        <p class="text-xl font-bold py-2.5 pb-4 dark:text-white">Màu</p>
        <span onclick="closePost()" class="rounded-full text-gray-300 px-3 py-1 text-2xl font-bold
                absolute right-2 bg-gray-600 top-2 cursor-pointer dark:text-gray-300">&times;</span>
        <hr>
    </div>
    <div class="w-full py-4">
        <ul class="w-full flex flex-wrap pl-2">
            @foreach($color as $key => $value)
            <li onclick="selectColorMessage('{{ $value->IDMauTinNhan }}','{{ $value->TenMau }}')" id="{{ $value->IDMauTinNhan }}Main" class="w-20 h-20 p-8 rounded-full hover:bg-gray-300 
            dark:hover:bg-dark-third relative cursor-pointer">
                <div id="{{ $value->IDMauTinNhan }}" class="mx-auto my-auto w-16 h-16 rounded-full 
                absolute top-2 right-2 bg-{{ $value->IDMauTinNhan }}">
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    <input type="hidden" value="" id="TenMau" name="TenMau">
    <input type="hidden" name="IDNhomTinNhan" id="IDNhomTinNhan" value="{{$IDNhomTinNhan}}">
    <input type="hidden" name="IDChat" id="IDChat" value="{{ $idChat }}">
    <div class="text-right pt-3">
        <input onclick="closePost()" type="button" id="btnHuyXoaTinNhan" class="cursor-pointer w-1/5  border-none 
        font-bold text-blue-500 rounded-lg p-2 mx-2" value="Hủy">
        <input onclick="changeColor()" type="button" id="btnXoaTinNhan" class="cursor-pointer w-1/4 bg-1877F2 border-none 
        font-bold text-white rounded-lg p-2 mx-2" value="Lưu">
    </div>
</div>