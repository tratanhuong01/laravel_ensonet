<?php

use App\Process\DataProcessSecond;

$color = DataProcessSecond::getColorMessage();

?>
<div id="modal-one" class="shadow-sm border border-solid border-gray-500 py-3 pl-1.5 pr-1.5 pt-0
bg-white w-full fixed z-50 top-1/2 left-1/2 dark:bg-dark-second rounded-lg 
sm:w-10/12 md:w-2/3 lg:w-2/3 xl:w-1/3" style="transform: translate(-50%,-50%);z-index:10;">
    <div class="w-full text-center">
        <p class="text-xl font-bold py-2.5 pb-4 dark:text-white">
            Đổi tên đoạn chat
        </p>
        <span onclick="closePost()" class="rounded-full text-gray-300 px-3 py-1 text-2xl font-bold
                absolute right-2 bg-gray-600 top-2 cursor-pointer dark:text-gray-300">&times;</span>
        <hr>
    </div>
    <div class="w-full p-4">
        <p class="text-xs dark:text-white font-bold py-2">
            Mọi người đều biết khi tên nhóm chat thay đổi.
        </p>
        <input oninput="onChangeInputChangeNameChat(this)" type="text" class="w-full p-2.5 border-2 border-solid font-bold rounded-lg
        border-blue-500 bg-gray-100 dark:bg-dark-third dark:text-white" name="" id="inputChangeNameChat">
    </div>
    <div class="text-right pt-3">
        <input onclick="closePost()" type="button" id="" class="cursor-pointer w-1/5  border-none 
        font-bold text-blue-500 rounded-lg p-2 mx-2" value="Hủy">
        <input onclick="changeNameChat('{{ $idNhomTinNhan }}','{{ $user }}')" type="button" id="btnChangeNameChat" class="cursor-not-allowed 
        w-1/4 bg-gray-500 border-none 
        font-bold text-white rounded-lg p-2 mx-2" value="Lưu" disabled>
    </div>
</div>