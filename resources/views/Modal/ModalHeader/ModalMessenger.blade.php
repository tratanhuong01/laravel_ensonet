<?php

use App\Models\StringUtil;
use App\Process\DataProcess;
use App\Process\DataProcessFive;
use Illuminate\Support\Facades\Session;

$allMess = DataProcess::getFullMessageByID(Session::get('user')[0]->IDTaiKhoan);

?>
<div class="w-full flex">
    <div class="w-1/2 text-left pl-2 py-2">
        <b class="dark:text-white font-bold text-xm">Messenger</b>
    </div>
    <div class="w-1/2 text-right pr-2 py-2">
        <a href=""><b class="dark:text-white font-bold text-xm">Vào Messenger</b></a>
    </div>
</div>
<div class="w-full">
    <div class="w-full p-1">
        <input type="text" name="" class="w-full py-2.5 px-4 my-2 bg-gray-200 dark:bg-dark-third rounded-3xl" placeholder="Tìm kiếm trên messenger">
    </div>
    @include('Guest/Child/AllMessager',['allMess' => $allMess])
    <hr class="my-2.5 mx-auto w-full">
    <div class="w-full text-center py-2">
        <a href="" class="font-bold text-center dark:text-white">Xem tất cả trong messenger</a>
    </div>
</div>